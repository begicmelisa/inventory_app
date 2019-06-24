<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DatabaseNotification extends Notification
{
    use Queueable;
 private $subscription;

    public function __construct($letter)
    {
        $this->subscription=$letter;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'letter'=>$this->subscription
        ];
    }
}
