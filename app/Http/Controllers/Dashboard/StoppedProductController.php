<?php

namespace App\Http\Controllers\Dashboard;


use App\Events\StartBidEvent;
use App\Events\StopBidEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductStatusRequest;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StoppedProductController extends Controller
{

    public function index(): view
    {
        $products = Product::has('stopped_product')->withoutGlobalScopes()->get();
        $avilableStatus = collect([Product::ACTIVE, Product::INACTIVE]);
        return view('dashboard.stopped_product.index', compact('products', 'avilableStatus'));
    }

    public function update(UpdateProductStatusRequest $request, $stopped_product): RedirectResponse
    {
        $stopped_product = Product::withoutGlobalScopes()->findOrFail($stopped_product);
        $stopped_product->update($request->validated());
        if ($request->status === Product::ACTIVE) {
            $stopped_product->stopped_product()->delete();
            broadcast(new StartBidEvent($stopped_product));
        }
        toastr()->success('Product status updated successfully');
        return back();
    }

}
