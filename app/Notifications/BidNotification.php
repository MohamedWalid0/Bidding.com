<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BidNotification extends Notification
{
    use Queueable;

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     * this method used for what channel want to send [mail , database , broadcast]
     */
    public function via($notifiable)
    {
        return ['database' , 'broadcast'];
    }
//
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//            ->subject('new Bid')
//            ->greeting('hello ya kosmak' .$notifiable->name ) // رسالة ترحيب
//            ->from('hoda.adel@yahoo.com' , 'admin name') // override the data from env
//            ->line('hi there is a new bid')
//            ->action('go to this product now' , url('/'))
//            ->line('kosmak kosh el mazad');
//    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'New Bid',
            'body' => 'body of',
            'icon' => 'icon is',
            'url' => route('test'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => 'New Bid',
            'body' => 'body of',
            'icon' => 'icon is',
            'url' => route('test'),
        ]);
    }


}
