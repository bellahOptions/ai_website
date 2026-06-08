<?php

namespace App\Providers;

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
        // This app uses a custom admin auth system — disable all Fortify routes
        // so they don't conflict with our /admin/* routes.
        Fortify::ignoreRoutes();
    }
}
