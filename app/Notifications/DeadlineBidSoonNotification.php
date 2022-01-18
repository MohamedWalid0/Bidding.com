<?php

namespace App\Notifications;

use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeadlineBidSoonNotification extends Notification implements ShouldQueue
{
    use Queueable;

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
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database' ,  'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        $body = sprintf(
            'this product %s deadline time left is ( %s )',
            $this->product->name,
            $this->product->deadline->diffForHumans(),
        );

        return [
            'title' => "Deadline Bid Notification",
            'body' => $body,
            'icon' => 'icon is',
            'url' => route('products.index', $this->product->id),
        ];
    }

    public function toBroadcast($notifiable)
    {
        $body = sprintf(
            'this product %s deadline time left is ( %s )',
            $this->product->name,
            $this->product->deadline->diffForHumans(),
        );
        return new BroadcastMessage([
            'title' => "Deadline Bid Notification",
            'body' => $body,
            'icon' => 'icon is',
            'url' => route('products.index', $this->product->id),
        ]);
    }
}
