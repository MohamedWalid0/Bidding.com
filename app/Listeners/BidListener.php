<?php

namespace App\Listeners;

use App\Events\BidEvent;
use App\Notifications\NewBidAddedNotification;
use Illuminate\Support\Facades\Notification;

class BidListener
{
    public function handle(BidEvent $event)
    {
        $users = $event->bid->product->user_bids()
            ->where('user_id', '!=', $event->bid->user_id)
            ->get()
            ->merge($event->bid->product->wishlists()->withoutGlobalScopes()->where('user_id', '!=', $event->bid->user_id)
                ->get()
                ->load('user')
                ->pluck('user')
            );
        // this will be sent notification to all bidders
        Notification::send(
            $users,
            new NewBidAddedNotification($event->bid)
        );
        // this will be sent notification to the product owner
        $event->bid->product->user->notify(new NewBidAddedNotification($event->bid));
    }
}
