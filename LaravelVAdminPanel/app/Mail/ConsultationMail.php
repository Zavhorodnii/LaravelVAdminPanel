<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsultationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name = null, $phone = null, $email = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.consultation')
            ->subject('Consultation');
    }
}
