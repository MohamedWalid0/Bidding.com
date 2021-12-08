<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductProperty;
use Carbon\Carbon;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latest_products = Product::latestProducts(15)->get();
        $hot_products = Product::hottestProducts(15)->get();
        return view('home', compact('latest_products' , 'hot_products'));
    }
}
