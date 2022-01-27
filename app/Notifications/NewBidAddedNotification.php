<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class NewBidAddedNotification extends Notification
{
//    use Queueable;

    protected $product;
    protected $user;
    protected $cost;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($bid)
    {
        $this->product = $bid->product;
        $this->user = User::find($bid->user_id);
        $this->cost = $bid->getDirty()['cost'] ?? $bid->cost;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database' ,  'broadcast'];
    }


    public function toDatabase($notifiable)
    {
        $body = sprintf(
            '%s added or updated the on %s with price %s',
            $this->user->account->full_name,
            $this->product->name,
            $this->cost
        );

        return [
            'title' => "Bid Notification",
            'body' => $body,
            'image' => auth()->user()->avatarUrl(),
            'url' => route('products.index', $this->product->id),
        ];
    }

    public function toBroadcast($notifiable)
    {
        $body = sprintf(
            '%s added or updated the on %s with price %s',
            $this->user->account->full_name,
            $this->product->name,
            $this->cost
        );

        return new BroadcastMessage([
            'title' => "Bid Notification",
            'body' => $body,
            'image' => auth()->user()->avatarUrl(),
            'url' => route('products.index', $this->product->id),
        ]);
    }
}
