<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentAndReplyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $product;
    protected $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product , String $message)
    {
        $this->product = $product;
        $this->message = $message;
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
        $message = $this->message;

        $body = sprintf(
            $message,
            auth()->user()->account->full_name,
            $this->product->name,
        );

        return [
            'title' => "New Comment Added",
            'body' => $body,
            'icon' => 'icon is',
            'url' => route('products.index', $this->product->id),
        ];
    }

    public function toBroadcast($notifiable)
    {
        $message = $this->message;

        $body = sprintf(
            $message,
            auth()->user()->account->full_name,
            $this->product->name,
        );
        return new BroadcastMessage([
            'title' => "New Comment Added",
            'body' => $body,
            'icon' => 'icon is',
            'url' => route('products.index', $this->product->id),
        ]);
    }

}
