<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::first();
        return view('front.wishlist.index' , compact('wishlist'));
    }

    public function toggleProductInWishlist(Product $product)
    {


        if (auth()->user()->wishlist->products()->toggle(request('productId'))) {

            // toastr()->info('Data has been saved successfully!');

            return response() -> json(['wished' => true , 'message' => "Completed Successfully"]);

        }

        return response() -> json(['wished' => false , 'message' => "Completed Successfully"]);





    }


}
