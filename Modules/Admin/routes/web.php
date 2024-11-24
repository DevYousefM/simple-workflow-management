<?php

use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\DashboardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::admin(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
}, function () {
    require __DIR__ . '/auth.php';
});
