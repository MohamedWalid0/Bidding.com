<?php

namespace App\Observers;

use App\Models\Bid;
use App\Models\Product;
use App\Notifications\NewBidAddedNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response as Response;


class BidObserver
{
    // will check the product status before saving bids
    public function creating(Bid $bid)
    {
        $product = $bid->load('product')->product;
        abort_if($product->status === Product::INACTIVE, Response::HTTP_FORBIDDEN);
        abort_if($product->status === Product::ACTIVE && Carbon::now()->greaterThanOrEqualTo($product->deadline), Response::HTTP_FORBIDDEN);
    }

    // will check the product deadline after saving bids
    public function created(Bid $bid)
    {

        $product = $bid->load('product')->product;
        $this->notify($product, $bid);
        if (Carbon::now()->diffInRealMinutes($product->deadline) < 60) {
            $product->updateQuietly([
                'deadline' => $product->deadline->addHour()
            ]);
        }
    }

    /**
     * @param $product
     * @param Bid $bid
     * @return void
     * notify all user related to this product
     */
    public function notify($product, Bid $bid): void
    {
        $users = $product->user_bids()
            ->where('user_id', '!=', $bid->user_id)
            ->get()
            ->merge($product->wishlists()->withoutGlobalScopes()->where('user_id', '!=', $bid->user_id)->get()->load('user')->pluck('user'));
        // this will be sent notification to all bidders
        Notification::send(
            $users,
            new NewBidAddedNotification($bid)
        );
        // this will be sent notification to the product owner
        $product->user->notify(new NewBidAddedNotification($bid));
    }


    // will check the product status before updating bids
    public function updating(Bid $bid)
    {
        $product = $bid->load('product')->product;
        abort_if($product->status === Product::INACTIVE, Response::HTTP_FORBIDDEN);
        abort_if($product->status === Product::ACTIVE && Carbon::now()->greaterThanOrEqualTo($product->deadline), Response::HTTP_FORBIDDEN);
    }

// will check the product deadline after updating bids
    public function updated(Bid $bid)
    {
        $product = $bid->load('product')->product;
        $this->notify($product, $bid);
        if (Carbon::now()->diffInRealMinutes($product->deadline) < 60) {
            $product->updateQuietly([
                'deadline' => $product->deadline->addHour()
            ]);
        }
    }


}
