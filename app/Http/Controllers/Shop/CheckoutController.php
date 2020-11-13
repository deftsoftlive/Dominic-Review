<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ShopCheckout\ShopCheckoutShippingTrait;
use Session;
use App\Models\Shop\ShopCartItems;
use Auth;
 
class CheckoutController extends Controller
{


use ShopCheckoutShippingTrait;
   
public $filePath = 'e-shop.modules.checkout.';
public $include = 'e-shop.includes.checkout.';
 

    public function __construct(Request $request)
	{   $stripe = SripeAccount();
        \Stripe\Stripe::setApiKey($stripe['sk']);
       
	}


#=====================================

/* Review Cart */ 
public function reviewCart()
{  
	$number = 1;
    $arr = $this->checkStep($number);
    if($arr['status'] == 1){
    	return $arr['url'];
    }

	$cart = ShopCartItems::where('user_id',Auth::user()->id)->where('type','cart')
	                     ->get();
	 \Session::put('reviewOrderCart',1);
    return view($this->filePath.'cartReviews')
        ->with('backward',url(route('shop.checkout.index')))
	    ->with('farward',url(route('shop.checkout.participantInfo')))
	    ->with('number',$number)
	    ->with('obj',$this)
	    ->with('cart',$cart);	 
}

/* Particpant Info Section */ 
public function participantInfo()
{
	$number = 2;
    $arr = $this->checkStep($number);
    if($arr['status'] == 1){
    	return $arr['url'];
    }

	$cart = ShopCartItems::where('user_id',Auth::user()->id)->where('type','cart')
	                     ->get();
	 \Session::put('reviewOrderCart',1);
    return view($this->filePath.'participantInfo')
        ->with('backward',url(route('shop.checkout.reviewCart')))
	    ->with('farward',url(route('shop.checkout.billingAddress')))
	    ->with('number',$number)
	    ->with('obj',$this)
	    ->with('cart',$cart);
}

/* Save participant info */
public function saveParticipantInfo(Request $request)
{
	// List of users in the cart
	$shop_cart = \DB::table('shop_cart_items')->where('user_id',Auth::user()->id)->where('type','cart')->get();
	$child_id = $users = [];
	foreach($shop_cart as $cart)
	{
		$child_id[] = $cart->child_id;
	}

	// select confirm users
	if(!empty($request->participant_info))
	{
		$selected_users = $request->participant_info;
		foreach($selected_users as $key=>$info)
		{	
			foreach($info as $user_id=>$info1)
			{
				$users[] = $user_id;
			}
		}
	}

	// intersection of shop cart table and selected users
	$a = array_intersect($child_id,$users);

	if(count($child_id) == count($a))
	{	

		if(!empty($request->participant_info))
		{
			foreach($request->participant_info as $key=>$info)
			{
				if(!empty($info))
				{
					foreach($info as $user_id=>$info1)
					{
						if(!empty($user_id))
						{
							$check_consents = \DB::table('children_details')->where('child_id',$user_id)->first();
	    					$check_contacts = \DB::table('child_contacts')->where('child_id', $user_id)->first();

	    					//dd($check_consents,$check_contacts);

	    					if(isset($check_consents) && isset($check_contacts) && !empty($check_consents->media) && !empty($check_consents->confirm))
						    {
								// if(isset($request->participant_info)){

									// if($request->participant_info == 'on'){
										return redirect('/shop/checkout/billing-address');
									// }

								// }else{
								// 	return \Redirect::back()->with('error', 'Please confirm that the participant details are correct');
								// }
							}else{
								return \Redirect::back()->with('error', 'Please ensure each participant has complete details and you click confirm in order to proceed.');
							}
						}
					}
				}
			}
		}else{
			return \Redirect::back()->with('error', 'Please ensure each participant has complete details and you click confirm in order to proceed.');
		}
	}else{
		return \Redirect::back()->with('error', 'Please ensure each participant has complete details and you click confirm in order to proceed.');
	}
	

	// $check_consents = \DB::table('children_details')->where('child_id',$request->user_id)->first();
 //    $check_contacts = \DB::table('child_contacts')->where('child_id', $request->user_id)->first();

 //    if(isset($check_consents) && isset($check_contacts) && !empty($check_consents->media) && !empty($check_consents->confirm) && !empty($check_consents->med_cond))
 //    {
	// 	if(isset($request->participant_info)){

	// 		if($request->participant_info == 'on'){
	// 			return redirect('/shop/checkout/billing-address');
	// 		}

	// 	}else{
	// 		return \Redirect::back()->with('error', 'Please confirm that the participant details are correct');
	// 	}
	// }else{
	// 	return \Redirect::back()->with('error', 'Some details are missing. Please ensure each participant has complete details in order to proceed.');
	// }
}

/* Remove Coupon */ 
public function removeCoupon(Request $request){
	$shop_id = $request->shop_id;
	$shop_details = ShopCartItems::where('id',$shop_id)->first();
	$discount_price = $shop_details->discount_price;

	$shop = ShopCartItems::find($shop_id);
	$shop->discount_code = NULL;
	$shop->price = ($shop_details->price) * ($discount_price);
	$shop->total = ($shop_details->total) * ($discount_price);
	$shop->discount_price = NULL;
	$shop->save();

	return \Redirect::back()->with('remove','Coupon removed successfully.');

}

#=====================================

}
