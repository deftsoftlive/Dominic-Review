<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{




    public function orderItems()
    {
    	return $this->hasMany('App\Models\Shop\ShopCartItems','order_id');
    }

   
    public function user()
    {
       return $this->belongsTo('App\User');
    }



    public function getPaymentDetails($vendor_id=0)
    {
    	 
    	$data = (object)json_decode($this->balance_transaction);

    	  $tax = 0;
          $service =0;
          $commission =0;
          $payable =0;
 

		  foreach ($data as $key => $value) {
		        if($key == $vendor_id || $vendor_id == 0){
			      $commission = ($value->commission_fee + $commission);
			      $service = ($value->service_fee + $service);
			      $tax = $value->tax;
			      $payable = $value->payable_amount;
		       }
		  }
		  
		     
		  return [
		    'tax' => $tax,
		    'commission' => $commission,
		    'payable' => $payable,
		    'service' => $service		    
		  ];
    }



}
