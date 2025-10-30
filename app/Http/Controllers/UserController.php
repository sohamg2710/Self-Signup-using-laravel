<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    //
    function selfSignup(request $request) {
        return view('self-signup');
    }

   function verifyMobile(request $request) {
        return view ('verify-mobile');
   }

   function verifyOtp(request $request) {
    return view ('verify-otp');
   }

   function tellUsAboutYourself(request $request) {
    return view ('tell-us-about-yourself');
   }

   function whereDoYouLive(request $request) {
    return view ('where-do-you-live');
   }

   function contactAndEmploymentDetails(request $request) {
    return view ('contact-and-employment-details');
   }
}
