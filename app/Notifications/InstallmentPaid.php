<?php 
namespace App\Notifications;

use App\Models\Installment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class InstallmentPaid extends Notification implements ShouldQueue
{
    use Queueable;

    protected $installment;

    public function __construct(Installment $installment)
    {
        $this->installment = $installment;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new \App\Mail\InstallmentReminder($this->installment))->to($notifiable->email);
    }
}
?>