<?php

use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\User\CourseController;
use Modules\User\Http\Controllers\User\UserController;


Route::user(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('take-action/course/{course_id}/step/{step_id}', [CourseController::class, 'takeAction'])->name('take.action');
    Route::post('store-action/step/{step_id}', [CourseController::class, 'storeAction'])->name('store.action');
}, function () {
    require __DIR__ . '/auth.php';
});
