<?php

namespace App\Http\Controllers\Users\Checkout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendors\DiscountDeal;
use App\VendorPackage;
use Auth;
use App\Models\Order;
use Session;
use App\UserEvent;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    
	public function __construct(Request $request)
	{       
          $stripe = SripeAccount();
          \Stripe\Stripe::setApiKey($stripe['sk']);
	}


  public function unsetSessionOfCheckoutOld() {
     Session::forget('eventTypeSession');
     Session::forget('packageID');
     Session::forget('packageAddons');
     Session::forget('BillingAddress');
     Session::forget('coupon_deal_id');
  }

#---------------------------------------------------------------------------------------
#  pay with deal payWithPackage
#---------------------------------------------------------------------------------------

   public function payWithDeal(Request $request, $dealSlug, $packageSlug)
   {
          $this->loginRedirect();
          $this->unsetSessionOfCheckoutOld();
          return redirect()->route('eventWithDeal',[$dealSlug,$packageSlug]);
           
  }





#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------



public function payWithPackage(Request $request,$packageSlug)
{
 
    $this->loginRedirect();
    $this->unsetSessionOfCheckoutOld();
    return redirect()->route('checkout.eventType',[$packageSlug]);
 
}





#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------





public function checkDealExpireDate($deal,$package,$type=0)
{   
  
	$message = '';
  $error = 0;
	$currentDate = date('Y-m-d');

if(!empty($deal)){
	if($type == 0 && !empty($deal) && strtotime($currentDate) >= strtotime($deal->expiry_date) || strtotime($currentDate) < strtotime($deal->start_date)){
        $message = "This has been Expired! (<strong>$deal->start_date</strong> To <strong>$deal->expiry_date</strong>)";
        $error = 1;
	}
}

  if(empty($package)){
        $message .= "The Package is not found. please go back and choose another Package.";
        $error = 1;
  }
 
 if(@sizeof($deal) && $type == 0 && $deal->dealPackage->id != $package->first()->id){
        $message .= "This is not Assigned to this Deal.";
        $error = 1;
	}
  return $error > 0 ? $message : 0;
}



#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------





public function loginRedirect($value='')
{
	$url = \Request::fullUrl();
     if(Auth::check() && Auth::user()->role != "user" ){
   	     return redirect('/login?redirectLink='.$url);
     }elseif(!Auth::check()){

     $url1 = '<a href="'.url("/login?redirectLink=".$url).'">'.redirect('/login?redirectLink='.$url).'</a>'; 
     
     $text ="<div style='margin:50px auto;background:#f2f2f2;padding:30px;text-align:center;'>
                  <h1>You are not logged in yet. We are redirecting to login Page please wait...</h1>       
           ".$url1."
     <div>";


     echo  $text;
     die;


   }

}



#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------



public function payingWithDeal(Request $request,$dealSlug,$packageSlug)
{
	 
	         $currentDate = date('Y-m-d');
           $deal = DiscountDeal::where('slug',$dealSlug)->first();
           $package = VendorPackage::where('slug',$packageSlug)->first();
           
           $error = $this->checkDealExpireDate($deal,$package);

          #----------------------------------------------------------            
          if($error == 0){
              
              $amount = $this->getPayableAmount($deal,$package);  

              return $this->StripePay($request,$amount,$deal,$package);

          }else{

          }
          #----------------------------------------------------------            

}




#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------



public function payingWithPackage(Request $request,$packageSlug)
{
   
           
           
          $package = VendorPackage::where('slug',$packageSlug)->first();
          $error = $this->checkDealExpireDate($deal=[],$package,1);

          #----------------------------------------------------------            
          if($error == 0){
              
                     $amount = $this->getPayableAmount($deal=[],$package,1);  

              return $this->StripePay($request,$amount,$deal=[],$package);

          }else{

          }
          #----------------------------------------------------------            

}




#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------



public function getPayableAmount($deal,$package,$type=1)
{
	  $tax = 3;
	  $service_fee = 3;
    $addons = $this->getAddondPrice($deal,$package);
    $dealDiscount = $this->getCouponDiscountPrice($deal,$package);
	  $total = round($dealDiscount + $service_fee) + round($tax + $addons);
	  

    
    if($type == 2){

      return $arr = [
             'service_fee' => $service_fee,
             'tax' => $tax,
             'package_price' => $package->price,
             'paid' => $total,
             'addons' => $addons,
             'dealDiscount' => $dealDiscount
          ];



    }else{
      return $total;
    }


 
 
}

#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------



public function getCouponDiscountPrice($deal, $package)
{  
  
   $total = $package->price;
   $per = $total / 100;

  if(@sizeof($deal)){
        return $discounted = ($deal->deal_off_type == 0) ? round($deal->amount * $per) :  round($total - $deal->amount);
  }else{
        $deal = $this->getCouponData($package);

        return $discountedPrice = (!empty($deal)) ? ($deal->deal_off_type == 1) ? $deal->amount * $per :  ($total - $deal->amount) : $total;
  }
}



#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------


public function getAddondPrice($deal,$package,$type=0)
{
  $addons = Session::has('packageAddons') ? Session::get('packageAddons') : [];
   
   if($type == 0){
      
      return $addon_price = !empty($addons) ? \App\PackageMetaData::where('package_id',$package->id)->whereIn('id',$addons)->sum('key_value') : 0;
    
   }else{
      return $addon_price =  \App\PackageMetaData::where('package_id',$package->id)->whereIn('id',$addons)->get();
   }

}



#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------





public function StripePay($request,$amount,$deal,$package)
{
          
     $error = '';

     if(empty($request->stripeToken)):
        
        $error .= '<li>Stripe token Expired!</li>';

     else:
                       # check if request has Token
	                     $token = $request->stripeToken;
                       $total = $amount;
                       # create customer to stripe while payment
         try {
    
                  $customer = \Stripe\Customer::create(array(
                              "email" => Auth::user()->email,
                              "description" => "Customer for pay to admin for ",
                              "source" => $token,
                       ));
 
                      if($customer){

                           // $card_id = $customer->sources->data[0]->id;
                           // $charge = $this->stripePaymentProcess($card_id,$customer->id,$total,$package);

                           //  return $charge;

                          $charge = \Stripe\Charge::create([
                                     'amount' => round($total * 100),
                                     'currency' => 'gbp',
                                     'description' => 'description',
                                     'receipt_email' => Auth::user()->email,
                                     'customer' => $customer->id,
                                   ]);

                              if($charge){
                                       return $this->saveDataAfterPayment($deal,$package,$charge,'STRIPE');
                               }else{
                                $error .= '<li><b>Payment Failed</b> Something Wrong going on!</li>';
                               } 

                        
                      }else{
                         $error .= '<li><b>Payment Failed</b> Something Wrong going on!</li>';
                      }
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
         }


        // else:  # check if customer not created
        

        // endif; 

	   endif; 

     return $error;
      # check if request has Token 
}





public function stripePaymentProcess($card_id,$customer_id,$amount,$package,$deal=[])
{
                             $admin_fee = 2;
                             $account_id ='acct_1BVdTAHkXAunnulu';
                            $token = \Stripe\Token::create(array(
                              "customer" => $customer_id,
                              "card" => $card_id,
                              ), array("stripe_account" => $account_id));


 
//       $address = [
//         'line1' => '510 Townsend St',
//         'postal_code' => '143505',
//         'city' => 'San Francisco',
//         'state' => 'PNB',
//         'country' => 'IN'
//       ];


// $shipping =[
//        'name' => 'Jenny Rosen',
//        'address' => $address
     
// ];





                            
 
                           return  $charge = \Stripe\Charge::create(array(
                              "amount" => round($amount * 100),
                              "currency" => "GBP",
                              "source" => $token,
                              "application_fee" => $admin_fee,
                              "shipping" => $shipping,
                              "description" => "description",
                            ));

                             if($charge){
                                     $o = new \App\Models\Order;
                                     $o->vendor_id = trim($package->user_id);
                                     $o->business_id = trim($package->vendor_category_id);
                                     $o->deal_id = !empty($deal) ? trim($deal->id) : 0;
                                     $o->user_id = trim(Auth::user()->id);
                                     $o->event_id = trim(0);
                                     $o->category_id = trim($package->category_id);
                                     $o->amount = trim($amount);
                                     $o->payment_by = 'STRIPE';
                                     $o->balance_transaction = json_encode($charge);
                                     $o->status = 0;
                                     $o->save();

                               return redirect()->route('thank-you');    
                             }

}





#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------


public function saveDataAfterPayment($deal,$package,$charge,$paymentType)
{

             $paymentDetail = json_encode($charge);


             $event_id = Session::get('eventTypeSession');
             $packageID = Session::get('packageID');
             $packageAddons = Session::get('packageAddons');
             $BillingAddress = Session::get('BillingAddress');
             $coupon_deal_id = Session::get('coupon_deal_id');

             $addOns = $this->getAddondPrice($deal, $package, $type=1);


             // $VendorPackage =\App\VendorPackage::find($packageID);

             $event = \App\UserEvent::find($event_id);

             $package =\App\VendorPackage::with(['business', 'business.category', 'business.vendors'])->find($packageID);

             $deals = !empty($deal) ? $deal : $this->getCouponData($package);
             

             $extraInfo = $this->getPayableAmount($deal,$package,2);


          
             $o = new \App\Models\Order;
             $o->vendor_id = trim($package->user_id);
             $o->business_id = trim($package->vendor_category_id);
             $o->deal_id = !empty($deals) ? trim($deals->id) : 0;
             $o->user_id = trim(Auth::user()->id);
             $o->package_id = $package->id;
             $o->event_id = $event->id;
             $o->category_id = trim($package->category_id);
             $o->amount = trim($this->getPayableAmount($deal,$package));
             $o->payment_by = $paymentType;
             $o->balance_transaction = $paymentDetail;
             $o->status = 1;
             $o->event_extra_info = json_encode($event);
             $o->deal_extra_info = json_encode($deals);
             $o->package_extra_info = json_encode($package);
             $o->extra_fee_info = json_encode($extraInfo);
             $o->billing_address = json_encode($BillingAddress);
             $o->packageAddons = json_encode($addOns);
             $o->save();
             $this->unsetSessionOfCheckoutOld();

      return redirect()->route('thank-you', ['order_id' => $o->id]);
}



#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------



public function thankyou(Request $request) {
  $order = App\Models\Order::find($request->order_id);
  return view('users.checkout.thankyou')->with('order',$order);
}


#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------





public function getTotalPrice($package,$deal=[])
{
     
  $tax = 3;
  $service_fee = 3;
  $addonPrice = 0;
  $addons = Session::has('packageAddons') ? Session::get('packageAddons') : 0;

    if($addons != ""){

       $addoin_ids = \App\PackageMetaData::whereIn('id',$addons)->where('type', 'addons')->where('package_id',$package->id);
       $addonPrice = $addoin_ids->count() ? $addoin_ids->sum('key_value') : 0;
    }

  $total = round($package->price + $tax) + ($service_fee + $addonPrice);

  $per = $total / 100;

  return $discountedPrice = (!empty($deal)) ? ($deal->deal_off_type == 0) ? $deal->amount * $per :  ($total -$deal->amount) : $total;  
 
}

#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------


public function getCouponData($package)
{
      $deal_id = Session::has('coupon_deal_id') ? Session::get('coupon_deal_id') : 0;

      return $deal = DiscountDeal::where('id',$deal_id)->where('user_id',$package->user_id)->first();
}

#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------


// coupon
public function checkCouponCode(Request $request) {

  $package = \App\VendorPackage::find($request->packageId);

  if(empty($package)) {
    return response()->json(['message'=> 'The Package is not Found.'], 400);
  }

  $deal = \App\Models\Vendors\DiscountDeal::where('deal_code', $request->coupon_code)
                               ->where('user_id', $package->user_id)->first();

   if(empty($deal)) {
      return response()->json(['message'=> 'Invalid Coupon Code.'], 400);
   }
   
    if($deal->type_of_deal == 1) {
      return response()->json(['message'=> 'Invalid Coupon Code.'], 400);
    }

    $start_time = Carbon::now();  
    $finish_time = Carbon::parse($deal->expiry_date); 
    $result = $start_time->diffInDays($finish_time, false);

    if($deal->deal_life == 1 && $result <= 0) {
        return response()->json(['message'=> 'Invalid Coupon Code.'], 400);
    }

    Session::put('coupon_deal_id', $deal->id);

   return response()->json([
    'message' => 'Coupon has been applied successfully',
    'data' => $this->sidebarContent($package, $deal),
    'amount' => $this->getPayableAmount($deal=[],$package)
  ], 200);
}
#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------


public function sidebarContent($package, $deal) {

    $deal= !empty($deal) ? $deal : [];
    $addOns = $this->getAddondPrice($deal,$package,$type=1);
    $coupnCode= $this->getCouponData($package);
    $vv= view('users.checkout.parts.sidebar_items')
         ->with('deal', $deal)
         ->with('addOns', $addOns)
         ->with('package', $package)
         ->with('obj', $this)
         ->with('coupnCode', $coupnCode);

    return $vv->render();
}



#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------


public function removeCouponCode(Request $request) {
         Session::forget('coupon_deal_id');
         $package = \App\VendorPackage::find($request->packageId);
         $vv = $this->sidebarContent($package, []);

  return response()->json([
    'message' => 'coupon has been removed successfully',
    'data' => $vv,
    'amount' => $this->getPayableAmount($deal=[],$package)
  ]);
}





}
