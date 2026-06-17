<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
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
