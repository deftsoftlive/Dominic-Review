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
	if(isset($request->participant_info)){

		if($request->participant_info == 'on'){
			return redirect('/shop/checkout/billing-address');
		}

	}else{
		return \Redirect::back()->with('error', 'Please confirm that the participant details are correct');
	}
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
