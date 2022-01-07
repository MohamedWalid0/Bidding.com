<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function __invoke()
    {
        if (Gate::denies('access-dashboard')) {
            abort(404);
        }
        return view('dashboard');
    }
}
