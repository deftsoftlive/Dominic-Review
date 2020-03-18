<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorCategoryMetaData extends Model
{
    
    protected $fillable = [ 'parent', 'key', 'type', 'keyValue', 'user_id', 'category_id','vendor_category_id'];


     public function style()
    {
       return $this->belongsTo('App\Style','keyValue');
                    
    }
    

    public function season()
    {
       return $this->belongsTo('App\Season','keyValue');
                    
    }


    public function category()
    {
       return $this->belongsTo('App\Category');
                    
    }


}
