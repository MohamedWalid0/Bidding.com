<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('dashboard');
    }

    public function productsChart()
    {
        $products = Product::withoutGlobalScopes()
            ->whereYear('created_at' , request()->year)
            ->select(
                '*',
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(id) as total_products'),
            )
            ->groupBy('month')
            ->get();
        return view('dashboard_includes._products_chart' , compact('products'));
    }
}
