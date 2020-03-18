<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Emails extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data) {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        $business = "{business-title}";
        $results = $this->data->title ? $this->data->title : '';
        $this->data->email->subject = str_replace($business, $results, $this->data->email->subject);
        
        return $this->markdown('emails.email')
                    ->subject($this->data->email->subject)
                    ->with('data', $this->data);
    }
}
