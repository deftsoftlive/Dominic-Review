<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Profile_pic_rejection extends Mailable
{
    public $user;
    public $reason;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$reason)
    {
        $this->user = $user;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $reason = $this->reason;
        return $this->subject('Your Fun and Games Dating Picture has been rejected')->view('emails.profile_pic_rejection',['user' => $user, 'reason' => $reason]);
    }
}
