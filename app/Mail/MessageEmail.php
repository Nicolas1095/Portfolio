<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Mime\Email;

class MessageEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;

    public $msg;

    public $email;

    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg, $email, $name, $subject)
    {
        $this->msg = $msg;
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from(env('MAIL_FROM_ADDRESS'), $this->name);
        $this->priority('high');
        $this->subject($this->subject);
        $this->view('emails.MessageEmail');
        $this->replyTo($this->email, $this->name);
        return $this;
    }
}
