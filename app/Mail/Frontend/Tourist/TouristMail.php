<?php

namespace App\Mail\Frontend\Tourist;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TouristMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $model, $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($model, $details)
    {
        $this->model = $model;
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('frontend.mail.tourist.tourist_email')
                    ->subject($this->details['subject'])
                    ->from(env('NOREPLY_EMAIL', 'noreply@enz.com.ph'), env('APP_NAME'))
                    ->cc('nico.halcyondigital@gmail.com')
                    ->to($this->details['to']);
    }
}
