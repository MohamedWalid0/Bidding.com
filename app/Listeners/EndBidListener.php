<?php

namespace App\Listeners;

use App\Events\EndBidEvent;
use App\Notifications\ProductOwnerNotification;
use App\Notifications\TellBiddersTheProductIsFinishedNotification;
use Illuminate\Support\Facades\Notification;

class EndBidListener
{

    public function handle(EndBidEvent $event)
    {
        Notification::send(
            $event->product->user_bids,
            new TellBiddersTheProductIsFinishedNotification($event->product)
        );
        $event->product->user->notify(new ProductOwnerNotification($event->product));
    }


}
