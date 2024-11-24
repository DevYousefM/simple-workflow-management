<?php

namespace App\Providers;

use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\User\Http\Middleware\User\RedirectIfNotUser;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::macro('admin', function ($callback, $excludeMiddlewareCallback = null) {
            Route::prefix('yf-admin')
                ->name('dashboard.')
                ->middleware('web')
                ->group(function () use ($callback, $excludeMiddlewareCallback) {
                    Route::middleware(RedirectIfNotAdmin::class)->group($callback);
                    if ($excludeMiddlewareCallback) {
                        $excludeMiddlewareCallback();
                    }
                });
        });
        Route::macro('user', function ($callback, $excludeMiddlewareCallback = null) {
            Route::prefix('user')
                ->name('user.')
                ->middleware('web')
                ->group(function () use ($callback, $excludeMiddlewareCallback) {
                    Route::middleware(RedirectIfNotUser::class)->group($callback);
                    if ($excludeMiddlewareCallback) {
                        $excludeMiddlewareCallback();
                    }
                });
        });
    }
}
