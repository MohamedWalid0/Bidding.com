<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke()
    {
        return view('front.profile.show');
    }
}
