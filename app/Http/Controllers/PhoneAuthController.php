<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhoneAuthController extends Controller
{
    public function index(Request $request){
        return view('phone_otp');
    }
}
