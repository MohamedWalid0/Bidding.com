<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class TellBiddersTheProductIsFinishedNotification extends Notification
{


    protected $product;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        $body = sprintf(
            'your product %s is finished at %s see the winner ',
            $this->product->name,
            $this->product->deadline->diffForHumans(),
        );

        return [
            'title' => "Product Bidding is finished",
            'body' => $body,
            'image' => $this->product->images()->exists()
                ? asset('img/front/products/' . $this->product->id . '/thump-' . $this->product->images[0]->image_path)
                : 'https://source.unsplash.com/random',
            'url' => route('products.index', $this->product->id),
        ];
    }

    public function toBroadcast($notifiable)
    {
        $body = sprintf(
            'your product %s is finished at %s see the winner ',
            $this->product->name,
            $this->product->deadline->diffForHumans(),
        );
        return new BroadcastMessage([
            'title' => "Product Bidding is finished",
            'body' => $body,
            'image' => $this->product->images()->exists()
                ? asset('img/front/products/' . $this->product->id . '/thump-' . $this->product->images[0]->image_path)
                : 'https://source.unsplash.com/random',
            'url' => route('products.index', $this->product->id),
        ]);
    }
}
