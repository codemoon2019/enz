<?php

namespace App\Mail\Frontend\Course;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CourseMail extends Mailable implements ShouldQueue
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

            $this->markdown('frontend.mail.course.course_mail')
            ->subject($this->details['subject'])
            ->from(env('NOREPLY_EMAIL', 'noreply@enz.com.ph'), env('APP_NAME'))
            // ->attach($this->model->getFirstMedia('document')->getPath())
            ->attach(storage_path("app/public/course/" . $file[1]), ['as' => $file[0]])
            // ->cc('qahdmd2@gmail.com')
            // ->cc('nico.halcyondigital@gmail.com')
            ->to($this->details['to']);

        }else{

            $this->markdown('frontend.mail.course.course_mail')
            ->subject($this->details['subject'])
            ->from(env('NOREPLY_EMAIL', 'noreply@enz.com.ph'), env('APP_NAME'))
            // ->cc('nico.halcyondigital@gmail.com')
            ->to($this->details['to']);

        }
    }
}
