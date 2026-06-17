<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminOtpMail;
use App\Models\AdminOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TwoFactorController extends Controller
{
    public function showForm(Request $request)
    {
        if (!$request->session()->has('pending_2fa_user_id')) {
            return redirect()->route('admin.login');
        }

        return view('admin.two-factor');
    }

    public function verify(Request $request)
    {
        $request->validate(['code' => ['required', 'digits:6']]);

        $userId = $request->session()->get('pending_2fa_user_id');

        if (!$userId) {
            return redirect()->route('admin.login');
        }

        $otp = AdminOtp::where('user_id', $userId)
                       ->where('code', $request->code)
                       ->latest('created_at')
                       ->first();

        if (!$otp || $otp->isExpired()) {
            return back()->withErrors(['code' => 'Invalid or expired code. Please try again.']);
        }

        $otp->delete();

        $user = User::find($userId);
        Auth::login($user);
        $request->session()->forget('pending_2fa_user_id');
        $request->session()->put('2fa_verified', true);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function resend(Request $request)
    {
        $userId = $request->session()->get('pending_2fa_user_id');

        if (!$userId) {
            return redirect()->route('admin.login');
        }

        $user = User::find($userId);
        $this->sendOtp($user);

        return back()->with('status', 'A new code has been sent to ' . $user->email);
    }

    public static function sendOtp(User $user): void
    {
        AdminOtp::where('user_id', $user->id)->delete();

        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        AdminOtp::create([
            'user_id'    => $user->id,
            'code'       => $code,
            'expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new AdminOtpMail($user, $code));
    }
}
