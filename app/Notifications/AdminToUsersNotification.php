<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminToUsersNotification extends Notification implements ShouldQueue
{
    use Queueable;


    protected string $message;
    protected $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $message, string $type)
    {
        $this->message = $message;
        $this->type = $type === 'database' ? NULL : $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', $this->type ];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Message From Admin')
            ->greeting('hello :' . $notifiable->account->full_name) // رسالة ترحيب
            ->from('hoda.adel@yahoo.com') // override the data from env
            ->line($this->message)
            ->action('visit profile Now', url('profile'))
            ->line('Thank You Have a Nice Day');
    }

    public function toDatabase($notifiable): array
    {
        return [
            'title' => "Admin Message",
            'body' => $this->message,
            'icon' => 'icon is',
            'url' => url('profile'),
        ];
    }

    public function toBroadcast($notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'title' => "Admin Message",
            'body' =>  $this->message,
            'icon' => 'icon is',
            'url' => url('profile'),
        ]);
    }

}
