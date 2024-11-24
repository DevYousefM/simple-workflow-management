<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\User\Auth\AuthenticatedSessionController;
use Modules\User\Http\Controllers\User\Auth\NewPasswordController;


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {

    Route::post('change-password', [NewPasswordController::class, 'changePassword'])
        ->name('change.password');
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
