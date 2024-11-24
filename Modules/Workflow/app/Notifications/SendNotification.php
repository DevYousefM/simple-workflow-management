<?php

namespace Modules\Workflow\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendNotification extends Notification
{
    use Queueable;
    protected $message;
    /**
     * Create a new notification instance.
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['database'];
    }


    public function toArray($notifiable): array
    {
        return [
            'message' => $this->message,
            'url' => url('/'),
        ];
    }
}
