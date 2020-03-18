<?php
namespace App\Traits\Events;
use Illuminate\Http\Request;
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\EventOrder;

trait PackageAddons {





public function getAddons(Request $request,$id)
{
	 $VendorPackage= VendorPackage::find($id);
	 $order= EventOrder::find($request->orderID);
     
     $vv = view('users.includes.cart.addons')
     ->with('VendorPackage',$VendorPackage)
     ->with('order',$order)
     ->with('request',$request);

     return response()->json([
       'status' => 1,
       'addonsHtml' => $vv->render()
     ]);

}




#-------------------------------------------------------------------------------------
# add Addon
#-------------------------------------------------------------------------------------

public function addAddons(Request $request)
{
	
if(!empty($request->addons)){
          $order = EventOrder::where('id',$request->order_id)->where('user_id',Auth::user()->id)->where('type','cart');
 
		   if($order->count() > 0){
		    $ord = $order->first();
		    $response = $this->addAddonToOrder($ord,$request);

		   }else{
		  	$response = ['status' => 0, 'messages' => 'Something Wrong!'];
		   }

}else{
	$response = ['status' => 0, 'messages' => 'Please choose some addons first!'];
}

return response()->json($response);

}

#--------------------------------------------------------------------------
# add
#--------------------------------------------------------------------------

public function addAddonToOrder($order,$request)
{
   $addon_price = $this->getAddonPriceTotal($request,$order);
   $price = ($order->package->price + $addon_price);
   $percent = $price / 100;

 if($order->deal->count() > 0){
	    $deal = $order->deal;
	    $discounted_price = $deal->deal_off_type == 0 ? round($price - ($deal->amount * $percent)) : round($price - $deal->amount);
		if($deal->type_of_deal == 1){
		      $response = $this->updateOrdr($order,$price,$discounted_price,$addon_price,$request);

		}elseif($deal->type_of_deal == 0 && $order->coupon_code !=""){
		     $response = $this->updateOrdr($order,$price,$discounted_price,$addon_price,$request);
		}else{

			  $o = EventOrder::find($order->id);
			  $o->package_price = $price;
			  $o->discounted_price = $discounted_price;
			  $o->discount = 0;
			  $o->coupon_code = 0;
			  $o->addons = implode(',',$request->addons);
			  $o->addon_price = $addon_price;
			  $o->save();
			  $response = [
                     'status' => 1,
                     'messages' => 'addons is added'
			  ];

		}
 	
 }else{
 	          $o = EventOrder::find($order->id);
			  $o->package_price = $price;
			  $o->discounted_price = $price;
			  $o->discount = 0;
			  $o->coupon_code = 0;
			  $o->addons = implode(',',$request->addons);
			  $o->addon_price = $addon_price;
			  $o->save();
			  $response = [
                     'status' => 1,
                     'messages' => 'addons is added'
			  ];
 }


 return $response;

 
}


public function updateOrdr($order,$price,$discounted_price,$addon_price,$request)
{
              $discount = round($price - $discounted_price);

	          $o = EventOrder::find($order->id);
			  $o->package_price = $price;
			  $o->discounted_price = $discounted_price;
			  $o->discount = $discount;
			 
			  $o->addons = implode(',',$request->addons);
			  $o->addon_price = $addon_price;
			  $o->save();
			  return $response = [
                     'status' => 1,
                     'messages' => 'addons is added'
			  ];
}

#---------------------------------------------------------------------------
# get Addons price
#---------------------------------------------------------------------------

public function getAddonPriceTotal($request,$order)
{
	 $adddons = \App\PackageMetaData::whereIn('id',$request->addons)
									 ->where('package_id',$order->package->id)
									 ->sum('key_value');

     return $adddons;
}


}