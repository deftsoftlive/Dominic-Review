<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorEventGame extends Model
{
   


    public function Event()
    {
       return $this->belongsTo('App\Event','event_id','id');
    }
}
