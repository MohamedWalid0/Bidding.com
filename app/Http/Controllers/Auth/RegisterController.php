<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric',  'min:10','unique:accounts'],
            'address' => ['required', 'string',  'max:255'],
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
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


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

        return $user;
    }

}
