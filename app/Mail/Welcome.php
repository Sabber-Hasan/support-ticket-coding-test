<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $subject;
    // public $ticket;

    public function __construct($message, $subject, Ticket $ticket)
    {
        $this->message = $message;
        $this->subject = $subject;
        // $this->ticket = $ticket;
    }

    public function build()
    {
        return $this->view('emails.welcome')
                    ->subject($this->subject);
    }
}