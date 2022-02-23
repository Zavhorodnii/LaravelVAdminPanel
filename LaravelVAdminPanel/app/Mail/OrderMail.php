<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bodyEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $bodyEmail = null)
    {
        $this->bodyEmail = $bodyEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order')
            ->subject('New order');
    }
}
