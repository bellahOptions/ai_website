<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider;
use Laravel\Fortify\Fortify;

class TwoFactorController extends Controller
{
    public function showForm(Request $request)
    {
        if (!$request->user()) {
            return redirect()->route('admin.login');
        }

        if (is_null($request->user()->two_factor_confirmed_at)) {
            return redirect()->route('admin.2fa.setup');
        }

        return view('admin.two-factor');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => ['nullable', 'digits:6'],
            'recovery_code' => ['nullable', 'string'],
        ]);

        $user = $request->user();

        if ($request->filled('recovery_code')) {
            $match = collect($user->recoveryCodes())->first(
                fn ($code) => hash_equals($code, $request->input('recovery_code'))
            );

            if (!$match) {
                return back()->withErrors(['recovery_code' => 'Invalid recovery code.']);
            }

            $user->replaceRecoveryCode($match);
        } else {
            $valid = $request->filled('code') && app(TwoFactorAuthenticationProvider::class)->verify(
                Fortify::currentEncrypter()->decrypt($user->two_factor_secret),
                $request->input('code')
            );

            if (!$valid) {
                return back()->withErrors(['code' => 'Invalid or expired code. Please try again.']);
            }
        }

        $request->session()->put('2fa_verified', true);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function showSetup(Request $request)
    {
        // Only bounce to the dashboard once this session has actually completed
        // the flow — a confirmed account with no session flag yet means the user
        // is still mid-setup (e.g. refreshed the page after confirming but before
        // clicking "Continue"), and redirecting them into AdminMiddleware here
        // would force-logout them for failing the 2fa_verified check.
        if ($request->session()->get('2fa_verified')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.two-factor-setup', [
            'confirmed' => !is_null($request->user()->two_factor_confirmed_at),
        ]);
    }

    public function completeSetup(Request $request)
    {
        abort_unless(!is_null($request->user()->two_factor_confirmed_at), 403);

        $request->session()->put('2fa_verified', true);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')->with('success', 'Two-factor authentication is now active.');
    }
}
