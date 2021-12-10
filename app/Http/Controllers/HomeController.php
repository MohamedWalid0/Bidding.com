<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductProperty;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
            DB::beginTransaction();
            $data['mostOfViewProducts'] = Product::mostOfViewProducts(15);

            $data['latest_products'] = Product::latestProducts(15)->get();
            $data['hot_products'] = Product::hottestProducts(15)->get();

            DB::commit();
            return view('home', with($data));

        } catch (\Throwable $th) {

        }

    }



}
