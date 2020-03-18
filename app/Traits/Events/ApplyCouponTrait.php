<?php
namespace App\Traits\Events;
use Illuminate\Http\Request;
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\EventOrder;

trait ApplyCouponTrait {





#-------------------------------------------------------------------------------------
#   CouponApplied
#-------------------------------------------------------------------------------------



public function applyCoupon(Request $request)
{
   $v = \Validator::make($request->all(),[
       'coupon_code' => 'required'
   ]);


   if($v->fails()){
     	  $msg = [
           'status' => 0,
           'messages' => 'Please Enter the Coupon Code!'
     	  ];
   }elseif(!Auth::check() || Auth::check() && Auth::user()->role != "user"){
      $msg = [
           'status' => 0,
           'messages' => 'Please Login with customer account.'
        ];

   }else{
           $deal = $this->getDealWithCoupCode($request->coupon_code);
           $msg = $this->getCouponApplyingMessages($deal);

    }

     sleep(1);

    return response()->json($msg);


}
#-------------------------------------------------------------------------------------
#   CouponApplied
#-------------------------------------------------------------------------------------




public function getCouponApplyingMessages($deal)
{
	  if($deal->count() > 0){
      ##############################################################
            $deals = $deal->first();

          if($this->CouponAlreadyAppliedOrNot($deals->deal_code) > 0){


                   $response =[
                     'status' => 0,
                     'messages' => $this->dealMessageErrors('coupon_code_exists',$deal)
                  ];

          }else{
           if($deals->deal_life == 1){
                #------------------------------------------------------------
                 $response = $this->checkDealWithLimitLife($deal);
                #------------------------------------------------------------
           }else{
                 $response = $this->checkDealUnLimitedLife($deal);
           	    // $msg = $this->dealMessageErrors('deal_have',$deal);
           }
            
          }

      ##############################################################
      }else{

         $response =[
           'status' => 0,
           'messages' => $this->dealMessageErrors('deal_not_found',$deal)
        ];
         
         
	  }

	  return $response;

}


#----------------------------------------------------------------------------
#  check Deal With Limit Life
#----------------------------------------------------------------------------

public function checkDealWithLimitLife($deal)
{
   $deals = $deal->first();
   $start_date = strtotime($deals->start_date);
   $expiry_date = strtotime($deals->expiry_date);
   $today = strtotime(date('Y-m-d'));


   if($today >= $start_date && $today <= $expiry_date){
      $response =$this->ExistAnyTypePackageInCart($deals);
   }else{
      $msg = $this->dealMessageErrors('deal_expired',$deal);
      $response = ['status' => 0, 'messages' => $msg];
   }


   return $response;



}

#----------------------------------------------------------------------------
#  check Deal With Limit Life
#----------------------------------------------------------------------------

public function checkDealUnLimitedLife($deal)
{
   $deals = $deal->first();
   $msg =$this->ExistAnyTypePackageInCart($deals);
   


   return $msg;



}


#-------------------------------------------------------------------------------------
#   CouponApplied
#-------------------------------------------------------------------------------------

public function ExistAnyTypePackageInCart($deal)
{
     
     if($deal->type_of_deal == 0){
         $all_package_id_of_vendor = $deal->Business->VendorPackage->pluck('id');

       

     }else{
     	   $all_package_id_of_vendor = $deal->Business->VendorPackage->where('id',$deal->packages)->pluck('id');
     }

	   $EventOrder = EventOrder::where('type','cart')
                                  ->where('user_id',Auth::user()->id)
	                                ->whereIn('package_id',$all_package_id_of_vendor);
   
	 if($EventOrder->count() > 0){
         $message = $this->applyingCouponToCartItems($deal,$EventOrder);
   }else{
         $message = ['status' => 0, 'messages' => 'This Promo code can not be applied, because cart have not related package.'];
	 }



	 return $message;

}



#-------------------------------------------------------------------------------------
#   CouponApplied
#-------------------------------------------------------------------------------------

public function applyingCouponToCartItems($deal,$EventOrder)
{
	 $cartItems = $EventOrder->get();
   $found = 0;
    foreach ($cartItems as $item) {
        if($item->deal_id == $deal->id && $deal->type_of_deal == 0){
            $price = $item->package_price;
	          $percent = round($price / 100);
	          $discount = $deal->deal_off_type == 0 ? round($deal->amount * $percent) :  $deal->amount; 
            $item->discount = $discount;
            $item->discounted_price = ($price - $discount);
	          $item->coupon_code = $deal->deal_code;
	          $item->save(); 

            $found = 1;    
         }
    }

    if($found == 1){

        $response =[
           'status' => 1,
           'messages' => 'The Coupon has been applied successfully'
        ];
    }else{

        $response =[
           'status' => 0,
           'messages' => 'This coupon can not be apply because have not ralated Package.'
        ];

    }

   return $response;
}

#-------------------------------------------------------------------------------------
#   CouponApplied
#-------------------------------------------------------------------------------------


public function getDiscountOfPackageAfterAppingDeal($deal,$item)
{
      $item->discounted_price;
	  $price = $item->package->price;
	  $percent = round($price / 100);
	  $discount = $deal->deal_off_type == 0 ? round($deal->amount * $percent) :  $deal->amount;
	 return $discount;
}





#-------------------------------------------------------------------------------------
#   CouponApplied
#-------------------------------------------------------------------------------------




public function getDealWithCoupCode($coupon_code)
{
	 $deal = DiscountDeal::where('deal_code',$coupon_code);
     return $deal;
}


#-------------------------------------------------------------------------------------
#   CouponApplied
#-------------------------------------------------------------------------------------

public function CouponAlreadyAppliedOrNot($coupon_code)
{
    return $order = EventOrder::where('coupon_code',$coupon_code)
                       ->where('type','cart')
                       ->where('user_id',Auth::user()->id)
                       ->count();
}


public function dealMessageErrors($type,$deals)
{
	$deal = $deals->first();
	$msg = 'message';
	switch ($type) {
		case 'deal_not_found':
            $msg = 'Invalid Coupon, Please try another one.';
			break;
		case 'deal_expired':
          $msg = 'This deal coupon is expired, Please try another one.';
      break;

      case 'coupon_code_exists':
	        $msg = 'This Coupon is already Used, Please try another one.';
			break;
		case 'deal_have':
	        $msg = 'Invalid Coupon, Please try another one.';
			break;
		
		default:
			# code...
			break;
	}

	return $msg;
}


#-------------------------------------------------------------------------------------
#   CouponApplied
#-------------------------------------------------------------------------------------



 






}