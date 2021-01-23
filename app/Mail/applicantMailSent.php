<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class applicantMailSent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $applicantMailSentTemplate;
    public function __construct($applicantMailSentTemplate)
    {
        $this->applicantMailSentTemplate = $applicantMailSentTemplate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('notifications@neodev.space','PEMS')
        ->subject($this->applicantMailSentTemplate->emailSubject)
        ->view('vendor/mail/applicantMailSentTemplate');
    }
}
