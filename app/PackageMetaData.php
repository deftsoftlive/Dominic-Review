<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageMetaData extends Model
{
        protected $fillable = ['parent', 'package_id', 'category_id', 'user_id', 'type', 'key', 'key_value'];




    public function amenity()
    {
       return $this->belongsTo('App\Amenity','key_value','id');
    }



    public function event()
    {
       return $this->belongsTo('App\Event','key_value','id');
    }




     public function categoryEvent()
    {
       
     return $this->belongsTo('App\CategoryVariation','key_value', 'variant_id')
                    ->where('type', 'events');
    }


}
