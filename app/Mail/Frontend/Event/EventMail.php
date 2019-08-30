<?php

namespace App\Mail\Frontend\Event;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventMail extends Mailable implements ShouldQueue
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
        return $this->markdown('frontend.mail.event.event_email')
                    ->subject($this->details['subject'])
                    ->from(env('NOREPLY_EMAIL', 'noreply@enz.com.ph'), env('APP_NAME'))
                    ->cc('qahdmd2@gmail.com ')
                    ->to($this->details['to']);
    }
}
