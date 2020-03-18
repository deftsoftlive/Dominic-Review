<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{   
    public $name;
    public $email;
    public $query;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $query)
    {
        $this->name = $name;
        $this->email = $email;
        $this->query = $query;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $name = $this->name;
        $email = $this->email;
        $query = $this->query;
        return $this->subject('Fun and Games Dating Contact Us')view('emails.ContactUs',['name' => $name, 'email' => $email, 'query' => $query]);
    }
}
