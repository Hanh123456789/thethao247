<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $sub;
    public $noidung;
    public function __construct($sub,$noidung)
    {
        $this->sub = $sub;
        $this->noidung = $noidung;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $m_sub = $this->sub;
        $m_noidung = $this->noidung;
        return $this->view('mail.contact',compact('m_noidung','m_sub'))->subject('Thethao247');;

    }
}
