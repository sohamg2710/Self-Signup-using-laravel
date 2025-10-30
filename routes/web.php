<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/self-signup', [UserController::class,'selfSignup']);
Route::get('/verify-mobile',[UserController::class,'verifyMobile']);
