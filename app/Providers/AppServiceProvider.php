<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Schema;
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

        // This app uses a custom admin auth system — disable all Fortify routes
        // so they don't conflict with our /admin/* routes.
        Fortify::ignoreRoutes();
    }
}
