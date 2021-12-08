<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __invoke()
    {
        $id = Auth::user()->id;
        $data['account'] = Account::findOrFail($id);
        $data['user'] = User::select('email')->findOrFail($id);
        return view('front.profile.show')->with($data);
    }
}
