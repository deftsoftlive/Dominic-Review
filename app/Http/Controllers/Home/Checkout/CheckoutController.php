<?php

namespace App\Http\Controllers\Home\Checkout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendors\DiscountDeal;
use App\VendorPackage;
use Auth;
use App\Models\Order;
use Session;
use App\UserEvent;
class CheckoutController extends Controller
{
    
	public function __construct(Request $request)
	{
		 
		        $stripe = SripeAccount();

			   \Stripe\Stripe::setApiKey($stripe['sk']);
	}

#---------------------------------------------------------------------------------------
#  pay with deal payWithPackage
#---------------------------------------------------------------------------------------

   public function payWithDeal(Request $request,$dealSlug,$packageSlug)
   {

   	      $this->loginRedirect();


          $currentDate = date('Y-m-d');

   	      $deal = DiscountDeal::where('slug',$dealSlug)
   	                           ->first();

          $package = VendorPackage::where('slug',$packageSlug)->first();
         

   	      return view('users.checkout.index')
   	      ->with('deal',$deal)
          ->with('business',$deal->Business)
   	      ->with('package',$package)
          ->with('obj',$this)
   	      ->with('error',$this->checkDealExpireDate($deal,$package));
  }





#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------



public function payWithPackage(Request $request,$packageSlug)
{

   $this->loginRedirect();
   $deal = [];
   $package = VendorPackage::where('slug',$packageSlug);
   $error = $this->checkDealExpireDate($deal,$package,1);

   

   $event_id = Session::has('eventTypeSession') ? Session::get('eventTypeSession') : 0;

   $UserEvent = UserEvent::where('id',$event_id)->where('user_id',Auth::user()->id);

   return view('users.checkout.steps.event')
   ->with('error',$error)
   ->with('UserEvent',$UserEvent)
   ->with('obj',$this)
   ->with('package',$package->first());
}





#---------------------------------------------------------------------------------------
#  pay with deal 
#---------------------------------------------------------------------------------------





public function checkDealExpireDate($deal,$package,$type=0)
{   
	$message = '';
  $error = 0;
	$currentDate = date('Y-m-d');

	if($type == 0 && $deal->expiry_date >= $currentDate && $deal->start_date <= $currentDate){
        $message = "This has been Expired! (<strong>'.$deal->start_date.'</strong> To <strong>'.$deal->expiry_date.'</strong>)";
        $error = 1;
	}

  if(empty($package)){
        $message .= "The Package is not found. please go back and choose another Package.";
        $error = 1;
  }
 
 if($type == 0 && $deal->dealPackage->id != $package->id){
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
	  $total = round($package->price + $service_fee) + $tax;
	  $per = $total / 100;
	 return $discountedPrice = $type == 0 ? round(($deal->deal_off_type == 0) ? $deal->amount * $per :  ($total -$deal->amount)) : $total;

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
                                     'currency' => 'usd',
                                     'description' => 'description',
                                     'receipt_email' => Auth::user()->email,
                                     'customer' => $customer->id,
                                   ]);

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



public function thankyou(Request $request) {
  $order = \App\Models\Order::find($request->order_id);
  
  // dd($order);

  return view('users.checkout.thankyou')->with('order', $order);
}






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



// coupon
public function checkCouponCode(Request $request) {
  $packages = \App\VendorPackage::where('slug', $packageSlug->packageSlug);

  if($packages->count() == 0) {
    return response()->json(['message'=> 'The Package is not Found.'], 400);
  }

  $package = $packages->first();

  $deals = \App\Models\Vendors\DiscountDeal::where('deal_code', $request->coupon_code)
                               ->where('user_id', $package->user_id);

   if($deals->count() == 0) {
      return response()->json(['message'=> 'Invalid Coupon Code.'], 400);
    }
  
    $deal = $deals->first();
    return response()->json(['message'=> 'done']);
}






}
