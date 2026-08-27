<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPaymentSubmission extends Mailable
{
    use Queueable, SerializesModels;

    public $type;       
    public $record;      

    public function __construct($type, $record)
    {
        $this->type = $type;
        $this->record = $record;
    }

    public function build()
    {
        $subject = $this->type === 'mass_booking'
            ? 'New Mass Booking Submitted — Awaiting Confirmation'
            : 'New Donation Submitted — Awaiting Confirmation';

        $mail = $this->subject($subject)
            ->view('emails.new-payment-submission');

        if ($this->record->proof_of_payment) {
            $mail->attach(storage_path('app/public/' . $this->record->proof_of_payment));
        }

        return $mail;
    }
}