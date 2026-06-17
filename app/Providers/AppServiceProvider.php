<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\ConfirmPasswordViewResponse;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Laravel\Fortify\Contracts\RequestPasswordResetLinkViewResponse;
use Laravel\Fortify\Contracts\ResetPasswordViewResponse;
use Laravel\Fortify\Contracts\TwoFactorChallengeViewResponse;
use Laravel\Fortify\Contracts\VerifyEmailViewResponse;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Responses\SimpleViewResponse;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(LoginViewResponse::class, fn() => new SimpleViewResponse('admin.login'));
        $this->app->singleton(VerifyEmailViewResponse::class, fn() => new SimpleViewResponse('admin.verify-email'));
        $this->app->singleton(TwoFactorChallengeViewResponse::class, fn() => new SimpleViewResponse('admin.two-factor'));
        $this->app->singleton(RequestPasswordResetLinkViewResponse::class, fn() => new SimpleViewResponse('admin.passwords.email'));
        $this->app->singleton(ResetPasswordViewResponse::class, fn() => new SimpleViewResponse('admin.passwords.reset'));
        $this->app->singleton(RegisterViewResponse::class, fn() => new SimpleViewResponse('admin.login'));
        $this->app->singleton(ConfirmPasswordViewResponse::class, fn() => new SimpleViewResponse('admin.login'));
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        ResetPassword::createUrlUsing(function ($user, string $token) {
            return route('admin.password.reset', ['token' => $token, 'email' => $user->email]);
        });

        VerifyEmail::createUrlUsing(function ($notifiable) {
            return URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
            );
        });

        // This app uses a custom admin auth system — disable all Fortify routes
        // so they don't conflict with our /admin/* routes.
        Fortify::ignoreRoutes();
    }
}
