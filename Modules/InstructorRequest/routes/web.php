<?php

use Illuminate\Support\Facades\Route;
use Modules\InstructorRequest\app\Http\Controllers\InstructorRequestController;
use Modules\InstructorRequest\app\Http\Controllers\InstructorRequestSettingController;
use Modules\InstructorRequest\app\Models\InstructorRequestSetting;

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

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin', 'translation']], function () {
    Route::resource('instructor-request', InstructorRequestController::class)->names('instructor-request');
    Route::resource('instructor-request-setting', InstructorRequestSettingController::class)->names('instructor-request-setting');

});
