<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Locker;

class LowStockNotification extends Notification
{
    use Queueable;

    protected $locker;

    public function __construct(Locker $locker)
    {
        $this->locker = $locker;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Alerte Stock Faible - Casier ' . $this->locker->code)
            ->line('Le casier ' . $this->locker->code . ' a un stock faible.')
            ->line('Localisation: ' . $this->locker->location)
            ->line('Nombre de pneus: ' . $this->locker->tyres()->count())
            ->action('Voir le rapport', url('/reports/stock-summary'))
            ->line('Merci d\'utiliser notre application!');
    }

    public function toArray($notifiable)
    {
        return [
            'locker_id' => $this->locker->id,
            'locker_code' => $this->locker->code,
            'message' => 'Stock faible dans le casier ' . $this->locker->code,
            'tyre_count' => $this->locker->tyres()->count(),
        ];
    }
} 