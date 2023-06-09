<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//show index page
Route::get('/',[App\Http\Controllers\RegistrationController::class,'index'])->name('show-registration');
//get district by division id
Route::get('/district/{id?}',[App\Http\Controllers\RegistrationController::class,'getDistrict'])->name('get-district');
//get thanas by district id
Route::get('/thanas/{id?}',[App\Http\Controllers\RegistrationController::class,'getThanas'])->name('get-thanas');
//store applican information
Route::post('registration-store',[App\Http\Controllers\RegistrationController::class,'store'])->name('store-registration');
//get applicant list
Route::get('/applicants-list',[App\Http\Controllers\RegistrationController::class,'list'])->name('list-applicant');
//delete specefic applicant
Route::get('/delete-applicant/{id}',[App\Http\Controllers\RegistrationController::class,'destroy'])->name('delete-applicant');
