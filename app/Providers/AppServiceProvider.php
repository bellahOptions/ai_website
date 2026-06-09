<?php

namespace App\Providers;

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

        // This app uses a custom admin auth system — disable all Fortify routes
        // so they don't conflict with our /admin/* routes.
        Fortify::ignoreRoutes();
    }
}
