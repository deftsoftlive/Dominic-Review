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


#===========================================================================================




public function reviewCart()
{  





	$number = 2;
    $arr = $this->checkStep($number);
    if($arr['status'] == 1){
    	return $arr['url'];
    }

	$cart = ShopCartItems::where('user_id',Auth::user()->id)->where('type','cart')
	                     ->get();
	 \Session::put('reviewOrderCart',1);
   return view($this->filePath.'cartReviews')
        ->with('backward',url(route('shop.checkout.index')))
	    ->with('farward',url(route('shop.checkout.billingAddress')))
	    ->with('number',$number)
	    ->with('obj',$this)
	    ->with('cart',$cart);	 
}


#=======================================================================




}
