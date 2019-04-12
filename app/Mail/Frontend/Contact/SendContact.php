<?php

namespace App\Mail\Frontend\Contact;

use App\Models\Core\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class SendContact.
 */
class SendContact extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var \App\Models\Core\Inquiry
     */
    public $inquiry;
    public $type;

    /**
     * SendContact constructor.
     *
     * @param \App\Models\Core\Inquiry $inquiry
     */
    public function __construct(Inquiry $inquiry, $type)
    {
        $this->inquiry = $inquiry;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return \App\Mail\Frontend\Contact\SendContact
     * @throws \Exception
     */
    public function build()
    {
        $industrial = setting('contact-sender') . ',carmelo.centeno@filinvestland.com';
        $general = setting('contact-sender') . ',marty.villegas@filinvestcity.com';

        $emailCC = $this->type == "industrial" ? $industrial  :  $general;
        $emails = explode(',', preg_replace('#\s+#', ',', trim($emailCC)));
        $main = $emails[0];
        array_forget($emails, 0);
        return $this->to($main, app_name())
            ->cc($emails)
            ->markdown('frontend.mail.contact')
            ->subject($this->inquiry->subject)
            ->from($this->inquiry->email, $this->inquiry->full_name)
            ->replyTo($this->inquiry->email, $this->inquiry->full_name);
    }
}
