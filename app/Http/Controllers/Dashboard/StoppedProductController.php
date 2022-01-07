<?php

namespace App\Http\Controllers\Dashboard;


use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StoppedProduct;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateProductStatusRequest;

class StoppedProductController extends Controller
{

    public function index(): view
    {
        $products = Product::has('stopped_product')->get();
        $avilableStatus = collect([Product::ACTIVE , Product::INACTIVE]);
        return view('dashboard.stopped_product.index' , compact('products' , 'avilableStatus'));
    }
    public function update(UpdateProductStatusRequest $request , Product $stopped_product): RedirectResponse
    {
        $stopped_product->update($request->validated());
        if ($request->status === Product::ACTIVE) {
            $stopped_product->stopped_product()->delete();
        }
        toastr()->success('Product status updated successfuly');
        return back();
    }

}
