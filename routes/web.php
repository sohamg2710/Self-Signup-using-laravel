<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SignupController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/self-signup', [UserController::class,'selfSignup']);


Route::get('/verify-mobile',[UserController::class,'verifyMobile']);
Route::post('/verify-mobile',[SignupController::class,'sendOtp']);

Route::get('/verify-otp',[UserController::class,'verifyOtp']);
Route::post('/verify-otp',[SignupController::class,'verifyOtp']);

Route::get('/tell-us-about-yourself', [UserController::class,'tellUsAboutYourself']);
Route::post('/tell-us-about-yourself', [SignupController::class,'savePersonal']);

Route::get('/where-do-you-live',[UserController::class,'whereDoYouLive']);
Route::post('/where-do-you-live',[SignupController::class,'saveADDress']);

Route::get('/contact-and-employment-details',[UserController::class,'contactAndEmploymentDetails']);
Route::post('/contact-and-employment-details',[SignupController::class,'saveContact']);

Route::get('/upload-your-documents', [UserController::class,'uploadYourDocuments']);
Route::post('/upload-your-documents', [SignupController::class,'uploadDocs']);

Route::get('/signup-success',[UserController::class,'signupSuccess']);



