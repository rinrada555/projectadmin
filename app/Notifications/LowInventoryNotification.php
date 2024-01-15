<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class LowInventoryNotification extends Notification
{
    public $carPartName;

    public function __construct($carPartName)
    {
        $this->carPartName = $carPartName;
    }

    public function toPush($notifiable)
    {
        return [
            'title' => 'Low Inventory Alert',
            'body' => 'The inventory of ' . $this->carPartName . ' is running low. Please check and reorder.',
        ];
    }
}
