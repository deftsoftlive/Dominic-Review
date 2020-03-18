<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vendors\DiscountDeal;
class EventOrder extends Model
{
 protected $fillable = [   
                'payment_type',
                'payment_status',
                'payment_data',
                'type',
                'paymentDetails',
                'checkout_type',
                'OrderID',
                'order_id'
            ];

    public function disputes()
    {
    	return $this->hasOne('App\Models\DisputeVendor','event_order_id');
    }


    public function reviews()
     {
       return $this->hasMany('App\Models\Review','order_id','id')->where('type','events');
     }

     public function deal()
    {
        return $this->belongsTo('App\Models\Vendors\DiscountDeal');
    }



    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }




     public function package()
    {
    	return $this->belongsTo('App\VendorPackage','package_id','id');
    }


     public function event()
    {
    	return $this->belongsTo('App\UserEvent','event_id');
    }


     public function category()
    {
    	return $this->belongsTo('App\Category','category_id');
    }


     public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

     public function vendor()
    {
    	return $this->belongsTo('App\VendorCategory','vendor_id');
    }
}
