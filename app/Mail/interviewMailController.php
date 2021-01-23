<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class interviewMailController extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $interviewerEmailTemplate;
    public function __construct($interviewerEmailTemplate)
    {
        $this->interviewerEmailTemplate = $interviewerEmailTemplate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {
        return $this->from('notifications@neodev.space','PEMS')
        ->subject('PEMS testing email')
        ->view('vendor/mail/interviewerEmailTemplate');
    }
}
