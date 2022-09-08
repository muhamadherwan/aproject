<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AcademicContinuousAssessmentController;
use App\Http\Controllers\AcademicFinalAssessmentController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\GradeAcademicController;
use App\Http\Controllers\GradeVocationalController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

// Akademikid
Route::prefix('marks-academic')->group(function () {
    Route::resource('continuous', AcademicContinuousAssessmentController::class);
    Route::resource('final', AcademicFinalAssessmentController::class);
});

// Penjanaan Gred

Route::prefix('grade')->group(function () {
    Route::resource('academics', ScoreAcademicController::class);
});

Route::prefix('grade')->group(function () {
    Route::resource('academics', GradeAcademicController::class);

    Route::resource('vocationals', GradeVocationalController::class);
    Route::get('getColleges/', [GradeVocationalController::class, 'getColleges']);
//    Route::get('getCourses/', [GradeVocationalController::class, 'getCourses']);
});


// Pentadbiran
Route::prefix('administration')->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
    Route::post('users/ajax', [UserController::class, 'getAjax'])->name('users.ajax');
});


