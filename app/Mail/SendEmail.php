<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $isi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $isi)
    {
        $this->subject = $subject;
        $this->isi = $isi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('asnanda4@gmail.com')
                    ->subject($this->subject)
                    ->view('certified.sendEmail');
    }
}
