<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class offermail extends Mailable
{
    use Queueable, SerializesModels;
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }
    public function __construct($msg)
    {
        $this->msg= $msg;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    
        return $this->from('xyz@gmail.com')->markdown('marketmails.welcome',['msg'=> $this->msg,]);
        
    }
}
