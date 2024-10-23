<?php
namespace App\Mail;

use App\Models\Installment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InstallmentReminder extends Mailable
{
    use Queueable, SerializesModels;

    protected $installment;

    public function __construct(Installment $installment)
    {
        $this->installment = $installment;
    }

    public function build()
    {
        return $this->view('emails.installment_reminder')
                    ->with([
                        'investorName' => $this->installment->investor->name,
                        'amountDue' => $this->installment->amount,
                        'dueDate' => $this->installment->due_date,
                    ]);
    }
}

?>