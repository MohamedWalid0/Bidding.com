<?php

namespace App\Observers;

use App\Models\Bid;
use App\Models\Product;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class BidObserver
{
    // will check the product status before saving bids
    public function creating(Bid $bid)
    {
        $product = Product::find($bid->product_id);
        if ($product->status === Product::INACTIVE) {
            abort(ResponseAlias::HTTP_FORBIDDEN);
        }
    }

    // will check the product deadline after saving bids
    public function created(Bid $bid)
    {
        $product = Product::find($bid->product_id);
        if (Carbon::now()->diffInRealMinutes($product->deadline) < 60) {
            $product->update([
                'deadline' => $product->deadline->addHour()
            ]);
        }
    }


}
