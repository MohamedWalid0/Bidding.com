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
            // toastr()->info('Data has been saved successfully!');
            return response()->json(['wished' => true, 'message' => "Completed Successfully"]);
        }
        return response()->json(['wished' => false, 'message' => "Completed Successfully !"]);
    }


}
