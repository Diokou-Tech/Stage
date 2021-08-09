<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AffecterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $affecter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($affecter)
    {   
        $this->affecter = $affecter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('emails.affecter',['enseignant' => $this->affecter]);
    }
}
