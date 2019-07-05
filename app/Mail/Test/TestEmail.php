<?php

namespace App\Mail\Test;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('frontend.mail.test.test_email')
                    ->subject('Halcyon Digital Test Email')
                    ->from('concierge@mellahotels.com')
                    // ->cc('nico.halcyondigital@gmail.com')
                    ->to($this->email);
    }
}
