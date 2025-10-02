<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after login.
     */
     public const HOME = '/dashboard';
    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Load API routes with 'api' middleware and '/api' prefix
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Load web routes with 'web' middleware
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
