<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\EmailOtp;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider;
use Laravel\Fortify\Fortify;

/**
 * Second factor for the admin portal.
 *
 * Email OTP is the primary method for everyone. Users who have also enrolled an
 * authenticator app (TOTP) can switch to it, or to a recovery code, on the challenge page.
 */
class TwoFactorController extends Controller
{
    public function __construct(private EmailOtp $emailOtp) {}

    public function showForm(Request $request)
    {
        $user = $request->user();

        if ($request->session()->get('2fa_verified')) {
            return redirect()->route('admin.dashboard');
        }

        $hasTotp = !is_null($user->two_factor_confirmed_at);
        $method = $request->query('method', 'email');
        if (!in_array($method, ['email', 'totp', 'recovery'], true) || (!$hasTotp && $method !== 'email')) {
            $method = 'email';
        }

        $sendFailed = false;
        if ($method === 'email' && !$this->emailOtp->hasActive($user)) {
            $sendFailed = !$this->trySend($user);
        }

        return view('admin.two-factor', [
            'method' => $method,
            'hasTotp' => $hasTotp,
            'maskedEmail' => $this->emailOtp->maskedEmail($user),
            'resendIn' => $this->emailOtp->secondsUntilResend($user),
            'sendFailed' => $sendFailed,
        ]);
    }

    public function resend(Request $request)
    {
        $user = $request->user();

        if ($this->emailOtp->secondsUntilResend($user) > 0) {
            return redirect()->route('admin.2fa.form')
                ->withErrors(['code' => 'Please wait a moment before requesting another code.']);
        }

        if (!$this->trySend($user)) {
            return redirect()->route('admin.2fa.form')
                ->withErrors(['code' => "We couldn't send the email. Try again shortly."]);
        }

        return redirect()->route('admin.2fa.form')->with('status', 'A new code has been sent to ' . $this->emailOtp->maskedEmail($user) . '.');
    }

    public function verify(Request $request)
    {
        $data = $request->validate([
            'method' => ['required', 'in:email,totp,recovery'],
            'code' => ['nullable', 'digits:6'],
            'recovery_code' => ['nullable', 'string'],
        ]);

        $user = $request->user();
        $method = $data['method'];
        $back = fn (string $field, string $message) => redirect()
            ->route('admin.2fa.form', ['method' => $method])
            ->withErrors([$field => $message]);

        if ($method !== 'email' && is_null($user->two_factor_confirmed_at)) {
            return redirect()->route('admin.2fa.form');
        }

        if ($method === 'recovery') {
            $match = collect($user->recoveryCodes())->first(
                fn ($code) => hash_equals($code, (string) $request->input('recovery_code'))
            );

            if (!$match) {
                return $back('recovery_code', 'Invalid recovery code.');
            }

            $user->replaceRecoveryCode($match);
        } elseif ($method === 'totp') {
            $valid = $request->filled('code') && app(TwoFactorAuthenticationProvider::class)->verify(
                Fortify::currentEncrypter()->decrypt($user->two_factor_secret),
                $request->input('code')
            );

            if (!$valid) {
                return $back('code', 'Invalid or expired code. Please try again.');
            }
        } else {
            if (!$request->filled('code') || !$this->emailOtp->verify($user, $request->input('code'))) {
                return $back('code', 'That code is incorrect or has expired. Check your email or request a new code.');
            }
        }

        $request->session()->put('2fa_verified', true);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    /** Authenticator app enrollment. Only reachable after passing the email OTP. */
    public function showSetup(Request $request)
    {
        return view('admin.two-factor-setup', [
            'confirmed' => !is_null($request->user()->two_factor_confirmed_at),
        ]);
    }

    public function completeSetup(Request $request)
    {
        abort_unless(!is_null($request->user()->two_factor_confirmed_at), 403);

        return redirect()->route('admin.dashboard')->with('success', 'Authenticator app enabled. You can now switch to it when signing in.');
    }

    private function trySend($user): bool
    {
        try {
            $this->emailOtp->send($user);

            return true;
        } catch (\Throwable $e) {
            report($e);

            return false;
        }
    }
}
