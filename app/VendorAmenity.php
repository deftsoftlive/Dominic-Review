<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorAmenity extends Model
{
   public function amenity()
    {
       return $this->belongsTo('App\Amenity','amenity_id','id');
    }
}
