<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\UserVerification;
use Illuminate\Support\Facades\Auth;


class VerificationServices
{
    /** set OTP code for mobile
     * @param $data
     *
     * @return UserVerification
     */
    public function setVerificationCode($data)
    {
        $code = mt_rand(100000, 999999);
        $data['code'] = $code;
        UserVerification::whereNotNull('user_id')->where(['user_id' => $data['user_id']])->delete();
        return UserVerification::create($data);
    }

    public function getSMSVerifyMessageByAppName( $code)
    {
        $message = " is your verification code for your account";
        return $code.$message;
    }


    public function checkOTPCode ($code){

        if (Auth::guard()->check()) {
            $verificationData = UserVerification::where('user_id',Auth::id()) -> first();

            if($verificationData -> code == $code){
                User::whereId(Auth::id()) -> update(['phone_verified_at' => now()]);
                return true;

            }else{
                return false;
            }
        }
        return false ;
    }


    public function removeOTPCode($code)
    {
        UserVerification::where('code',$code) -> delete();
    }

}
