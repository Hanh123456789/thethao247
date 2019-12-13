<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class userMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $mtoken;
    public function __construct($token)
    {
        $this->mtoken = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $m_token = $this->mtoken;
        return $this->view('mail.resetuser',compact('m_token'))->subject('Mail xác nhận mật khẩu');;

    }
}
