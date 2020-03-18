<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'name', 'address', 'image', 'postcode' 
    ];
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
