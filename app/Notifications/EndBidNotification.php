<?php

namespace App\Notifications;

use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EndBidNotification extends Notification
{
    protected $product;
    protected $message;
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Product $product ,User $user ,$message)
    {
        $this->product = $product;
        $this->message = $message;
        $this->user = $user;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database' ,  'broadcast' , 'mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Bid Mail')
            ->greeting('hello :' . $notifiable->account->full_name)
            ->from('hoda.adel@yahoo.com')
            ->line($this->message)
            ->line('Information\'s About this User :')
            ->line('name :' . $this->user->account->full_name)
            ->line('Phone :' . $this->user->account->phone)
            ->line('address :' . $this->user->account->address)
            ->line('Email :' . $this->user->email)
            ->action('visit profile Now', route('profile.show', $this->user->id))
            ->line('Thank You Have a Nice Day');
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => "Bid Notification",
            'body' => $this->message,
            'image' => $this->user->avatarUrl(),
            'url' => route('profile.show', $this->user->id),
        ];
    }

    public function toBroadcast($notifiable)
    {

        return new BroadcastMessage([
            'title' => "Bid Notification",
            'body' => $this->message,
            'image' => $this->user->avatarUrl(),
            'url' => route('profile.show', $this->user->id),
        ]);
    }


}
