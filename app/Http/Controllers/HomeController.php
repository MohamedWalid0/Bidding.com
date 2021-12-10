<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $data['mostOfViewProducts'] = Product::mostOfViewProducts(15)->get();
            $data['latest_products'] = Product::latestProducts(15)->get();
            $data['hot_products']= Product::hottestProducts(15)->get();
            return view('home', with($data));
        } catch (\Throwable $th) {

        }


    }


}
