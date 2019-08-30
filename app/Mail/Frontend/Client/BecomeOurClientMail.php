<?php

namespace App\Mail\Frontend\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BecomeOurClientMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data, $details, $model;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $details, $model)
    {
        $this->data = $data;
        $this->details = $details;
        $this->model = $model;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if ($this->details['type']) {

            $file = json_decode($this->model['file']);

            return $this->markdown('frontend.mail.become_our_client.client_email')
                        ->subject($this->details['subject'])
                        ->from(env('NOREPLY_EMAIL', 'noreply@enz.com.ph'), env('APP_NAME'))
                        ->attach(storage_path("app/public/client_inquiry/" . $file[1]), ['as' => $file[0]])
                        ->cc('qahdmd2@gmail.com')
                        ->cc('nico.halcyondigital@gmail.com')
                        ->to($this->details['to']);

        }else{
            
            return $this->markdown('frontend.mail.become_our_client.client_email')
                        ->subject($this->details['subject'])
                        ->from(env('NOREPLY_EMAIL', 'noreply@enz.com.ph'), env('APP_NAME'))
                        // ->cc('nico.halcyondigital@gmail.com')
                        ->to($this->details['to']);


        }

    }
}
