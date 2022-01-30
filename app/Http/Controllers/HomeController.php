<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

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
        $mostOfViewProducts = Product::with('user_bids:id')->mostOfViewProducts(15)->get();
        $latest_products = Product::with('user_bids:id')->latestProducts(15)->get();
        $hot_products = Product::with('user_bids:id')->hottestProducts(15)->get();
        $randCategories = Category::inRandomOrder()->limit(4)->get();
        $randSubCategories = SubCategory::with('products.user_bids:id')->get()->sortByDesc('products')->take(2);

        return view('home', compact('mostOfViewProducts', 'hot_products', 'latest_products' , 'randCategories' , 'randSubCategories' ));
    }


}
