<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\EmployerProfileController;
use App\Http\Controllers\HomeController;

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
Route::get('/home', [HomeController::class, 'index'])->name('home');

//job (Company)
Route::get('/',[JobController::class,'index'])->name('job.index');
Route::get('jobs/{id}/{job}',[JobController::class,'show'])->name('jobs.show');
Route::get('jobs/create',[JobController::class,'create'])->name('jobs.create');
Route::post('jobs/store',[JobController::class,'store'])->name('jobs.store');
Route::get('jobs/myjobs',[JobController::class,'myjobs'])->name('jobs.myjobs');
Route::post('jobs/apply/{id}',[JobController::class,'apply'])->name('jobs.apply');
Route::get('jobs/applicants',[JobController::class,'applicants'])->name('jobs.applicants');
Route::get('jobs/alljobs',[JobController::class,'alljobs'])->name('jobs.alljobs');


//company
Route::get('company/{id}/{company}',[CompanyController::class,'index'])->name('company.index');
Route::get('company/create',[CompanyController::class,'create'])->name('company.create');
Route::post('company/store',[CompanyController::class,'store'])->name('company.store');
Route::post('company/coverphoto',[CompanyController::class,'coverphoto'])->name('company.coverphoto');
Route::post('company/logo',[CompanyController::class,'logo'])->name('company.logo');

//userProfile
Route::get('user/profile', [UserProfileController::class, 'index'])->name('user.profile');
Route::post('profile/store',[UserProfileController::class, 'store'])->name('profile.store');
Route::post('profile/coverletter',[UserProfileController::class, 'coverletter'])->name('profile.coverletter');
Route::post('profile/resume',[UserProfileController::class, 'resume'])->name('profile.resume');
Route::post('profile/avatar',[UserProfileController::class, 'avatar'])->name('profile.avatar');

//employer
Route::view('employer/profile','auth.employer-reg')->name('employer.reg');
Route::post('employer/profile/store',[EmployerProfileController::class, 'store'])->name('employer.store');
