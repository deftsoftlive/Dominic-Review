<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisputeVendor extends Model
{
    


    public function orderEvent()
    {
    	return $this->belongsTo('App\Models\EventOrder','event_order_id','id');
    }


     public function user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }
}
