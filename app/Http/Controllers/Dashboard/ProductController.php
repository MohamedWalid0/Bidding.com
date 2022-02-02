<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\StopBidEvent;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateProductStatusRequest;

class ProductController extends Controller
{
    public function index(): view
    {
        $products = Product::get();
        $avilableStatus = collect([Product::ACTIVE , Product::INACTIVE]);
        return view('dashboard.product.index' , compact('products' , 'avilableStatus'));
    }
    public function update(UpdateProductStatusRequest $request , Product $product): RedirectResponse
    {
        $product->update($request->validated());
        if ($request->status === Product::INACTIVE) {
            $product->stopped_product()->create();
            broadcast(new StopBidEvent($product));
        }
        toastr()->success('Product status updated successfuly');
        return back();
    }

}
