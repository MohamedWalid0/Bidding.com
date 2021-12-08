<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use function PHPUnit\Framework\isEmpty;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::first();
        return view('front.wishlist.index', compact('wishlist'));
    }

    public function toggleProductInWishlist(Product $product)
    {
        if (!empty(auth()->user()->wishlist->products()->toggle(request('productId'))['attached'])) {

            return response()->json(['wished' => true, 'status' => true , 'message' => "Added To Wishlist Successfully"]);
        }
        return response()->json(['wished' => true,  'status' => false ,'message' => "Removed From Wishlist Successfully"]);
    }


}
