<?php

namespace App\Listeners;

use App\Events\EndBidEvent;
use App\Models\User;
use App\Notifications\EndBidNotification;

class BidFinishedListener
{
    public function handle(EndBidEvent $event)
    {
        $event->product->last_bid->notify(
            new EndBidNotification(
                $event->product,
                $event->product->user,
                "You Are The Winner in The Bid On Product {$event->product->name} This Product Belongs To {$event->product->user->account->full_name}"
            )
        );
        $event->product->user->notify(
            new EndBidNotification(
                $event->product,
                $event->product->last_bid,
                "The Winner For Your Product {$event->product->name} Is {$event->product->last_bid->account->full_name}"
            )
        );
    }


}
