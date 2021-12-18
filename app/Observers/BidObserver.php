<?php

namespace App\Observers;

use App\Models\Bid;
use App\Models\Product;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response as Response;


class BidObserver
{
    // will check the product status before saving bids
    public function creating(Bid $bid)
    {
        $product = $bid->load('product')->product;
//        if ($product->status === Product::INACTIVE) {
//            abort(Response::HTTP_FORBIDDEN);
//        }
        abort_if($product->status === Product::INACTIVE , Response::HTTP_FORBIDDEN);
        abort_if($product->status === Product::ACTIVE &&  Carbon::now()->greaterThanOrEqualTo($product->deadline), Response::HTTP_FORBIDDEN);
    }

    // will check the product deadline after saving bids
    public function created(Bid $bid)
    {
        $product = $bid->load('product')->product;
        if (Carbon::now()->diffInRealMinutes($product->deadline) < 60) {
            $product->updateQuietly([
                'deadline' => $product->deadline->addHour()
            ]);
        }
    }

        // will check the product status before updating bids
        public function updating(Bid $bid)
        {
            $product = $bid->load('product')->product;
//            if ($product->status === Product::INACTIVE) {
//                abort(Response::HTTP_FORBIDDEN);
//            }
            abort_if($product->status === Product::INACTIVE , Response::HTTP_FORBIDDEN);
            abort_if($product->status === Product::ACTIVE &&  Carbon::now()->greaterThanOrEqualTo($product->deadline), Response::HTTP_FORBIDDEN);
        }

        // will check the product deadline after updating bids
        public function updated(Bid $bid)
        {
            $product = $bid->load('product')->product;
            if (Carbon::now()->diffInRealMinutes($product->deadline) < 60) {
                $product->updateQuietly([
                    'deadline' => $product->deadline->addHour()
                ]);
            }
        }


}
