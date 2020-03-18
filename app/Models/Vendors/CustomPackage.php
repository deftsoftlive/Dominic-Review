<?php

namespace App\Models\Vendors;

use Illuminate\Database\Eloquent\Model;

class CustomPackage extends Model
{
    
    public function category()
    {
       return $this->belongsTo('App\Category','category_id','id');
    }


    public function VendorPackage()
    {
       return $this->belongsTo('App\VendorPackage','package_id','id');
    }
}
