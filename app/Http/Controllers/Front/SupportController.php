<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class SupportController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        auth()->user()->supports()->create($request->all());
        toastr()->success('report sending successfully');
        return back();
    }
}
