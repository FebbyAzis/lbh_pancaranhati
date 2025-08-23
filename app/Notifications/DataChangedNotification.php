<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class DataChangedNotification extends Notification
{
    use Queueable;

    protected $model;
    protected $action;

    /**
     * Create a new notification instance.
     */
    public function __construct($model, $action)
    {
        $this->model = $model;
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['database']; // bisa tambahkan 'mail' atau 'broadcast'
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable)
    {
        return [
            'model' => $this->model,
            'action' => $this->action,
            'time' => now()->toDateTimeString(),
        ];
    }
}
