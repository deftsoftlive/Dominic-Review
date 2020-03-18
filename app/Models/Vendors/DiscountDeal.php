<?php

namespace App\Models\Vendors;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Auth;
class DiscountDeal extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function Business()
    {
       return $this->belongsTo('App\VendorCategory','vendor_category_id');
    }

    public function vendor()
    {
       return $this->belongsTo('App\User','user_id');
    }


    public function dealPackage()
    {
       return $this->hasOne('App\VendorPackage','id','packages');
    }



     public function chats()
    {
      

       return $this->hasOne('App\Models\Vendors\Chat','business_id','vendor_category_id')->where(function($t){
              if(Auth::check() && Auth::user()->role == "user"){
                $t->where('chats.user_id',Auth::user()->id);
              }else{
                $t->where('chats.user_id',0);
              }
       })->where('deal_status',0);
    }


}
