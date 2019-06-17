<?php

namespace App\Mail\Frontend\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BecomeOurClientMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data, $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $details)
    {
        $this->data = $data;
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('frontend.mail.become_our_client.client_email')
                    ->subject($this->details['subject'])
                    ->from(env('NOREPLY_EMAIL', 'nico.halcyondigital@gmail.com'))
                    ->to($this->details['to']);
    }
}
