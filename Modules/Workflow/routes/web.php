<?php

use Illuminate\Support\Facades\Route;
use Modules\Workflow\Http\Controllers\StepController;
use Modules\Workflow\Http\Controllers\WorkflowController;

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
    Route::resource('workflows', WorkflowController::class)->names('workflows');
    Route::get('get-step-row', [StepController::class, 'getStepRow'])->name('workflows.get_step_row');
    Route::delete('/{step_id}', [StepController::class, 'destroy'])->name('workflows.delete_step');
});
