<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class user_booking_confirmation extends Mailable
{
    public $event;
    public $username;
    public $venue;
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event,$venue,$username)
    {
        $this->event = $event;
        $this->username = $username;
        $this->venue = $venue;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $event= $this->event;
        $username= $this->username;
        $venue= $this->venue;
        return $this->subject('Fun and Games Booking Confirmation')->view('emails.user_booking_confirmation',['event' => $event, 'venue' => $venue, 'username' => $username]);
    }
}
