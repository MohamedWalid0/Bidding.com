<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;


class ReportProductController extends Controller
{

    public function index(): view
    {
        $products = Product::has('reports')
            ->withCount('reports')
            ->orderByDesc('reports_count')
            ->get();
        return view('dashboard.report.product.index', compact('products'));
    }

    public function show(Product $report_product): view
    {
        $reportProduct = $report_product->load(
            [
                'reports:user_id,product_id,created_at',
                'reports.user:id',
                'reports.user.account:user_id,full_name'
            ]
        );

        return view('dashboard.report.product.show', compact('reportProduct'));
    }

}
