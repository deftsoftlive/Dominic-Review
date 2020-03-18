<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CancelBooking extends Mailable
{   
    public $booking;
    public $user;
    public $event;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking, $user, $event)
    {
        $this->booking = $booking;
        $this->user = $user;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $booking= $this->booking;
        $user= $this->user;
        $event= $this->event;
        return $this->view('emails.cancelBooking',['booking' => $booking, 'user' => $user, 'event' => $event]);
    }
}
