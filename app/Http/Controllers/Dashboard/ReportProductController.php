<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ReportProduct;
use Illuminate\Contracts\View\View;


class ReportProductController extends Controller
{

    public function index(): view
    {
        $products = Product::has('reports')->withCount('reports')
        ->orderByDesc('reports_count')->get();
        return view('dashboard.report.product.index' , compact( 'products'));
    }

    public function show($id): view
    {
        $reportProduct = Product::with('reports.user' , 'reports.user.account')
        ->findOrFail($id);
        return view('dashboard.report.product.show' , compact( 'reportProduct'));
    }

}
