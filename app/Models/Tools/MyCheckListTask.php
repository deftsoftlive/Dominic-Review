<?php

namespace App\Models\Tools;

use Illuminate\Database\Eloquent\Model;

class MyCheckListTask extends Model
{
   

     public function category()
    {
    	return $this->belongsTo('App\Category','vendor_id');
    }
}
