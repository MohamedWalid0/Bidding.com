<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\VerificationServices;
use App\Models\Account;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public $sms_services;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VerificationServices $sms_services)
    {
        $this->middleware('guest');
        $this->sms_services = $sms_services;

    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        dd($user);

        // use name because facebook not redirect user email

        // $username = $user->name ;

        // $db_user = User::where('email' , '=' , $username)->first() ;


        // if ($db_user == null){

        //     $register = User::create([
        //         'username' => $username ,
        //         'email' => $username ,
        //         'password' => Hash::make('111111') ,
        //         'oAuth_token' => $user->token
        //     ]);

        //     Auth::guard('admin')->login($register);

        //     // send mail


        //     // $user->email instance of 'mohamed@gmail.com' but fb not give access for user email
        //     // Mail::to('mohamed@gmail.com')->send(new RegisterMail($user->name)) ;


        // }
        // else{
        //     Auth::guard('admin')->login($db_user);


        // }

        // return redirect( route('admin.homepage') );


    }


    public function redirectToTwitter(): RedirectResponse
    {
        return Socialite::driver('twitter')->redirect();
    }
    public function callbackToTwitter()
    {
        $user = Socialite::driver('twitter')->user();

        dd($user);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'min:10', 'unique:accounts'],
            'address' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric'],
            'city' => ['required', 'exists:cities,id'],
            'role_id' => ['required', 'exists:roles,id'],
            'gender_id' => ['required', 'exists:genders,id'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        try {

            DB::beginTransaction();

            $verification = [];

            $user = User::create([
                'email' => $data['email'],
                'role_id' => $data['role_id'],
                'rate' => 0,
                'password' => Hash::make($data['password']),
            ]);


            Account::create([
                'full_name' => $data['name'],
                'user_id' => $user->id,
                'phone' => $data['phone'],
                'address' => $data['address'],
                'gender_id' => $data['gender_id'],
                'city_id' => $data['city'],
                'age' => $data['age'],
            ]);


            // send OTP SMS code to user

            $verification['user_id'] = $user->id;
            $verification_data = $this->sms_services->setVerificationCode($verification);
            $message = $this->sms_services->getSMSVerifyMessageByAppName($verification_data->code);

            DB::commit();
            return $user;


        } catch (\Exception $ex) {
            DB::rollback();
        }


    }


}
