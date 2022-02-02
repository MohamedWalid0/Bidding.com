<?php

namespace App\Providers;

use App\Events\BidEvent;
use App\Events\EndBidEvent;
use App\Listeners\BidFinishedListener;
use App\Listeners\BidListener;
use App\Listeners\EndBidListener;
use App\Listeners\SendPhoneVerificationCodeListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            SendPhoneVerificationCodeListener::class,
        ],
        EndBidEvent::class => [
            EndBidListener::class,
            BidFinishedListener::class,
        ],
        BidEvent::class => [
            BidListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
