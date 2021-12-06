<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latest_products = Product::latestProducts(5)->get();
        $hot_products = Product::hottestProducts(5)->get();
        return view('home', compact('latest_products' , 'hot_products'));
    }
}
