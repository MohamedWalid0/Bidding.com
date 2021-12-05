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

    public function addToWishlist(Product $product): RedirectResponse
    {
        auth()->user()->wishlist->products()->attach($product);
        return back();
    }

    public function deleteFromWishlist(Product $product): RedirectResponse
    {
        auth()->user()->wishlist->products()->detach($product);
        return back();
    }


}
