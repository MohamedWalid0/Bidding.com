<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Notifications\ProductOwnerNotification;
use App\Notifications\TellBiddersTheProductIsFinishedNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class HandleBidCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watch:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Product Status when deadline is end';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle(): void
    {
        Product::query()
            ->whereStatus('active')
            ->get()
            ->each(function ($product) {
                $product->when(
                    Carbon::now()->greaterThanOrEqualTo($product->deadline),
                    function () use ($product) {
                        $product->update([
                            'status' => 'inactive'
                        ]);
                        $this->notifyOnewerAndBidders($product);
                    }
                );
            });
    }

    /**
     * @param $product
     * @return void
     */
    public function notifyOnewerAndBidders($product): void
    {
        Notification::send(
            $product->user_bids,
            new TellBiddersTheProductIsFinishedNotification($product)
        );
        $product->user->notify(new ProductOwnerNotification($product));
    }
}
