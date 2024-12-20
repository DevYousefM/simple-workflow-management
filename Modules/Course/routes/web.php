<?php

use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\CourseController;


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
    Route::resource('courses', CourseController::class)->names('courses');
});
