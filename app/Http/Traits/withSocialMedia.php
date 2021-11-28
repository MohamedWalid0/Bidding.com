<?php

namespace App\Http\Traits;

use App\Models\User;

use Auth;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;

trait withSocialMedia
{
    // Facebook
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $data['callback'] = $user;
        return view('auth.register')->with($data);
    }

    // Github
    public function gitRedirect(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }
    public function gitCallback()
    {
        try {

            $user = Socialite::driver('github')->user();
            $data['callback'] = $user;
            return view('auth.register')->with($data);


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    // Twitter
    public function redirectToTwitter(): RedirectResponse
    {
        return Socialite::driver('twitter')->redirect();
    }
    public function callbackToTwitter()
    {
        $user = Socialite::driver('twitter')->user();
        $data['callback'] = $user;

        $user_data = User::where('oAuthToken', $user->token)->get();

        if (!empty($user_data->toArray()))
        {
            if ( !is_null($user_data[0]->oAuthToken) ) {
                Auth::login($user_data[0]);
                return redirect(route('home'));
            }
        }
        return view('auth.register')->with($data);
    }
}
