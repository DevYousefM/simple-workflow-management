<?php

use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Auth\AuthenticatedSessionController;
use Modules\Admin\Http\Controllers\Auth\NewPasswordController;




Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(RedirectIfNotAdmin::class)->group(function () {

    Route::post('change-password', [NewPasswordController::class, 'changePassword'])
        ->name('change.password');
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
