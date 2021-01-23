<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CareersFirstMailSend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $CareersFirstMailSendTemplate;
    public function __construct($CareersFirstMailSendTemplate)
    {
        $this->CareersFirstMailSendTemplate = $CareersFirstMailSendTemplate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('notifications@neodev.space','PEMS')
        ->subject($this->CareersFirstMailSendTemplate->emailSubject)
        ->view('vendor/mail/careersFirstMailSendTemplate');
    }
}
