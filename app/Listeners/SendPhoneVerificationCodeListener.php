<?php

namespace App\Listeners;

use App\Http\Services\VerificationServices;
use Illuminate\Auth\Events\Registered;

class SendPhoneVerificationCodeListener
{
    public function handle(Registered $event)
    {
        $verification = [];
        // send OTP SMS code to user
        $verification['user_id'] = $event->user->id;
        (new VerificationServices)->setVerificationCode($verification);
    }
}
