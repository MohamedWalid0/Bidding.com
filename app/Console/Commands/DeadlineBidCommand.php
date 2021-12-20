<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Notifications\DeadlineBidSoonNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class DeadlineBidCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bid:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command for sending notifications for bidders before 120 minutes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Product::query()
            ->whereStatus('active')
            ->get()
            ->each(function (Product $product) {
                $product->when(
                    Carbon::now()->diffInRealMinutes($product->deadline) < 120,
                    function () use ($product) {
                        Notification::send(
                            $product->user_bids ,
                            new DeadlineBidSoonNotification($product)
                        );
                    }
                );
            });

    }
}
