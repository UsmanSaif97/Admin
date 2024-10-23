<?php
namespace App\Jobs;

use App\Models\Installment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendInstallmentReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $installment;

    public function __construct(Installment $installment)
    {
        $this->installment = $installment;
    }

    public function handle()
    {
        // Logic to send reminder
        \Mail::to($this->installment->investor->email)->send(new \App\Mail\InstallmentReminder($this->installment));
    }
}
?>