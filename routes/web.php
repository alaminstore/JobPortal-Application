<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserProfileController;

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




//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//job
Route::get('/',[JobController::class,'index']);
Route::get('jobs/{id}/{job}',[JobController::class,'show'])->name('jobs.show');

//company
Route::get('company/{id}/{company}',[CompanyController::class,'index'])->name('company.index');

//userProfile
Route::get('user/profile', [UserProfileController::class, 'index']);
Route::post('profile/store',[UserProfileController::class, 'store'])->name('profile.store');
Route::post('profile/coverletter',[UserProfileController::class, 'coverletter'])->name('profile.coverletter');
Route::post('profile/resume',[UserProfileController::class, 'resume'])->name('profile.resume');
Route::post('profile/avatar',[UserProfileController::class, 'avatar'])->name('profile.avatar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

