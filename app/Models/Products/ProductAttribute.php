<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    


    public function childAttributes()
    {
    	return $this->hasMany($this,'parent','id');
    }

    public function variation()
    {
    	return $this->belongsTo('App\Models\Products\ProductVariation','value')->where('status',1);
    }
}
