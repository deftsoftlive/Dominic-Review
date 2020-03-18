<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminBookingConfirmation extends Mailable
{
    public $event;
    public $venue;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event,$venue)
    {
        $this->event = $event;
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
        $venue= $this->venue;
        return $this->subject('Admin: New Fun and Games Booking')->view('emails.admin_booking_confirmation',['event'=>$event, 'venue'=>$venue]);
    }
}
