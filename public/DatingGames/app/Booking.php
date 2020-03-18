<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
       'user_id', 'event_id', 'venue_id', 'payment_status', 'payer_id' ,'status'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }
}
