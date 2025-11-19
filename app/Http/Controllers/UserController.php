<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdType;
use App\Models\Gender;
use App\Models\Province;
use App\Models\Country;


class UserController extends Controller
{
    //
    function selfSignup(Request $request) {
        return view('self-signup');
    }

   function verifyMobile(Request $request) {
        return view ('verify-mobile');
   }

   function verifyOtp(Request $request) { 
    return view ('verify-otp');
   }

   function tellUsAboutYourself(Request $request) {
     $validId = IdType::pluck('name')->toArray();
     $validGender = Gender::pluck('name')->toArray();
    return view ('tell-us-about-yourself',compact('validId','validGender'));
   }




function whereDoYouLive(Request $request) {
    $countries = Country::all();
    $provinces = Province::where('country_id', $request->country )->get();  // 

    return view('where-do-you-live', compact('countries', 'provinces'));
}

public function getProvinces($countryId)
    {
        return Province::where('country_id', $countryId)->get();
    }

   function contactAndEmploymentDetails(Request $request) {
    return view ('contact-and-employment-details');
   }

   function uploadYourDocuments(Request $request) {
    return view ('upload-your-documents');
   }

   function signupSuccess(Request $request) {
    return view ('signup-success');
   }
}


