<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/self-signup', [UserController::class,'selfSignup']);
Route::get('/verify-mobile',[UserController::class,'verifyMobile']);
Route::get('/verify-otp',[UserController::class,'verifyOtp']);
Route::get('/tell-us-about-yourself', [UserController::class,'tellUsAboutYourself']);
Route::get('/where-do-you-live',[UserController::class,'whereDoYouLive']);
Route::get('/contact-and-employment-details',[UserController::class,'contactAndEmploymentDetails']);
Route::get('/upload-your-documents', [UserController::class,'uploadYourDocuments']);
Route::get('/signup-success',[UserController::class,'signupSuccess']);