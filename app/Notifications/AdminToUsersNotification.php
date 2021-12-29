<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminToUsersNotification extends Notification
{
    use Queueable;


    protected $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(String $message)
    {
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
            auth()->user()->account->full_name
        );

        return [
            'title' => "Admin Message",
            'body' => $body,
            'icon' => 'icon is',
            'url' => url('profile'),
        ];
    }

    public function toBroadcast($notifiable): BroadcastMessage
    {
        $message = $this->message;

        $body = sprintf(
            $message,
            auth()->user()->account->full_name
        );
        return new BroadcastMessage([
            'title' => "Admin Message",
            'body' => $body,
            'icon' => 'icon is',
            'url' => url('profile'),
        ]);
    }

}
