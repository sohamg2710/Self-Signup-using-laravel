<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    //
    function selfSignup(request $request) {
        return view('self-signup');
    }

   
}
