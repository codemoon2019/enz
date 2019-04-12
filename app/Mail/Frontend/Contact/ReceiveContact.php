<?php

namespace App\Mail\Frontend\Contact;

use App\Models\Core\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ReceiveContact.
 */
class ReceiveContact extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var \App\Models\Core\Inquiry
     */
    public $inquiry;

    /**
     * ReceiveContact constructor.
     *
     * @param \App\Models\Core\Inquiry $inquiry
     */
    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Build the message.
     *
     * @return \App\Mail\Frontend\Contact\ReceiveContact
     * @throws \Exception
     */
    public function build()
    {
        $emails = explode(',', preg_replace('#\s+#', ',', trim(setting('contact-sender'))));
        $main = $emails[0];
        return $this->to($this->inquiry->email, $this->inquiry->subject)
            ->markdown('frontend.mail.receive')
            ->subject($this->inquiry->subject)
            ->from($main, app_name())
            ->replyTo($main, app_name());
    }
}
