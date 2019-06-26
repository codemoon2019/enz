<?php

namespace App\Mail\Frontend\Contact;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable implements ShouldQueue
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
        if ($this->details['type']) {

            $file = json_decode($this->model['resume']);

            $this->markdown('frontend.mail.contact.contact_email')
            ->subject($this->details['subject'])
            ->from(env('NOREPLY_EMAIL', 'nico.halcyondigital@gmail.com'), env('APP_NAME'))
            ->attach(storage_path("app/public/inquiry/" . $file[1]))
            ->cc('nico.halcyondigital@gmail.com')
            ->to($this->details['to']);

        }else{

            $this->markdown('frontend.mail.contact.contact_email')
            ->subject($this->details['subject'])
            ->from(env('NOREPLY_EMAIL', 'nico.halcyondigital@gmail.com'), env('APP_NAME'))
            ->cc('nico.halcyondigital@gmail.com')
            ->to($this->details['to']);

        }
    }
}
