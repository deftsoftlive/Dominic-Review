<?php

namespace App\Models\Vendors;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Eshop extends Model
{
    
   use Sluggable;
    use SluggableScopeHelpers;

    
    public function sluggable()
    {
        return [

            'slug' => [
                'source' => 'name'
            ]
        ];
    }




    public function shopCategories()
    {
         return $this->hasMany('App\Models\Shop\ShopCategory')->where('parent',0);
    }


     public function RejectionReason()
    {
    	 return $this->hasOne('App\Models\Vendors\RejectionReason','type_id')
         ->where('type','shop')
         ->orderBy('id','DESC');
    }


    public function products()
    {
       return $this->hasMany('App\Models\Products\Product','shop_id','id');
    }

    public function user()
    {
       return $this->belongsTo('App\User','vendor_id','id');
    }



    public function category()
    {
    	 return $this->belongsTo('App\Models\Products\ProductCategory');
    }



  



}
