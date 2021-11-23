<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationCodeRequest;
use App\Http\Services\VerificationServices;
use Illuminate\Http\Request;

class VerificationCodeController extends Controller
{
    public $verificationService;

    public function __construct(VerificationServices $verificationService){

        $this  -> verificationService = $verificationService;
    }


    public function verify(VerificationCodeRequest $request){

        $check = $this ->  verificationService -> checkOTPCode($request -> code);

        if(!$check){

            return redirect() -> route('verificationCodeForm')-> withErrors(['code' => 'wrong code']);

        }else {
            $this ->  verificationService -> removeOTPCode($request -> code);
            return redirect()->route('home');
        }

    }

    public function getVerifyPage(){

        return view('auth.codeVerification') ;
    }
}
