<?php

namespace App\Http\Controllers\Users\Checkout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Users\Checkout\CheckoutController;
use App\Models\Vendors\DiscountDeal;
use App\VendorPackage;
use Auth;
use App\Models\Order;
use App\UserEvent;
use Session;
class DealStepController extends CheckoutController
{
    

 






#------------------------------------------------------------------------------
# event step
#------------------------------------------------------------------------------

public function eventStep(Request $request,$dealSlug,$packageSlug)
{
	 $next = url(route('checkoutDeal.packageStep',[$dealSlug,$packageSlug]));
	  
      $deal = DiscountDeal::where('slug',$dealSlug)->first();
      $package = VendorPackage::where('slug',$packageSlug)->first();
      $event_id = Session::has('eventTypeSession') ? Session::get('eventTypeSession') : 0;
      $UserEvent = UserEvent::where('id',$event_id)->where('user_id',Auth::user()->id);
      $error = $this->checkDealExpireDate($deal,$package);

	  return view('users.checkout.steps.event')
	       ->with('error',$error)
	       ->with('UserEvent',$UserEvent)
	       ->with('obj',$this)
	       ->with('newStepUrl',$this->stepUrls(1,$dealSlug,$packageSlug))
	       ->with('newStepUrl',$this->stepUrls(2,$dealSlug,$packageSlug))
	       ->with('deal',$deal)
	       ->with('stepNumber',1)
	       ->with('haveDeal',1)
	       ->with('package',$package);
}

#------------------------------------------------------------------------------
# event step
#------------------------------------------------------------------------------


public function eventStepStore(Request $request,$dealSlug,$packageSlug)
{  
	$id = $request->id; 
	$event = UserEvent::where('user_id', Auth::user()->id)
	         ->where('id',$id);

    if($event->count() == 0){
    	return redirect()->back()->with('error_message', 'This Event is not Found');
    }

    $events = $event->first();

    Session::put('eventTypeSession', $events->id);


    return redirect($this->stepUrls(2,$dealSlug,$packageSlug)); //->route('checkoutDeal.packageStep',[$dealSlug,$packageSlug]);
 
}



#--------------------------------------------------------------------------------
#  eventType
#--------------------------------------------------------------------------------



public function dealStep(Request $request,$dealSlug,$packageSlug) {
	 if(!Session::has('eventTypeSession')) {
	 	return redirect()->route('eventWithDeal',[$dealSlug,$packageSlug])->with('error_message', 'Please Choose the event first.');
	 } 
       $package = VendorPackage::where('slug',$packageSlug);
       $deal = DiscountDeal::with('dealPackage')->where('slug',$dealSlug)->first();
       $error = $this->checkDealExpireDate($deal,$package);
       $addons = Session::has('packageAddons') ? Session::get('packageAddons') : [];
  
    return view('users.checkout.steps.deal')
   	        ->with('package',$package->first())
   	        ->with('addons',$addons)
			->with('newStepUrl',$this->stepUrls(3,$dealSlug,$packageSlug))
			->with('backStepUrl',$this->stepUrls(1,$dealSlug,$packageSlug))
   	        ->with('obj',$this)
   	        ->with('stepNumber',2)
	        ->with('haveDeal',1)
   	        ->with('deal',$deal)
   	        ->with('error',$error);

}

public function dealStepPost(Request $request,$dealSlug,$packageSlug) {
       if(!Session::has('eventTypeSession')) {
	    	return redirect($this->stepUrls(1,$dealSlug,$packageSlug))->with('error_message', 'Please Choose the event first.');
	   } 

       $package = VendorPackage::where('slug',$packageSlug);
       $deal = DiscountDeal::where('slug',$dealSlug)->first();
       $error = $this->checkDealExpireDate($deal,$package,1);
       $addons = Session::has('packageAddons') ? Session::get('packageAddons') : [];
        
      if($error != 0) {
	    	return redirect($this->stepUrls(1,$dealSlug,$packageSlug))->with('error_message', $error);
	   } 
       
       Session::put('dealStep',$deal->id);

       return redirect($this->stepUrls(3,$dealSlug,$packageSlug));
}

 

#--------------------------------------------------------------------------------
#  eventType
#--------------------------------------------------------------------------------



public function packageType(Request $request,$dealSlug,$packageSlug)
{
	   if(!Session::has('dealStep')){
	 	return redirect($this->stepUrls(2,$dealSlug,$packageSlug))->with('error_message', 'Please complete the deal review step.');
	   }
       $package = VendorPackage::where('slug',$packageSlug);
       $deal = DiscountDeal::where('slug',$dealSlug)->first();
       $error = $this->checkDealExpireDate($deal,$package,1);
       $addons = Session::has('packageAddons') ? Session::get('packageAddons') : [];
       return view('users.checkout.steps.package')
   	        ->with('package',$package->first())
   	        ->with('addons',$addons)
			      ->with('newStepUrl',$this->stepUrls(3,$dealSlug,$packageSlug))
			      ->with('backStepUrl',$this->stepUrls(1,$dealSlug,$packageSlug))
   	        ->with('obj',$this)
   	        ->with('stepNumber',3)
	          ->with('haveDeal',1)
   	        ->with('deal',$deal)
   	        ->with('error',$error);
 
}






#--------------------------------------------------------------------------------
#  eventType
#--------------------------------------------------------------------------------



public function packageTypePost(Request $request,$dealSlug,$packageSlug)
{

	 if(!Session::has('eventTypeSession')){
	 	return redirect()->route('checkout.eventType',$packageSlug)->with('error_message', 'Complete the Event Step.');
	 }
     $package = VendorPackage::where('slug',$packageSlug);
     $error = $this->checkDealExpireDate($deal=[],$package,1);
        
      
     if($package->count() == 0){
     	 return redirect()->route('checkout.packageStep',$packageSlug)->with('error_message','This Event is not Found');
     }

     $pck = $package->first();
 
     Session::put('packageID',$pck->id);
     Session::put('packageAddons',$request->addons);


       
      return redirect()->route('checkoutDeal.billingStep',[$dealSlug,$packageSlug]);
 
}







#--------------------------------------------------------------------------------
#  billingType
#--------------------------------------------------------------------------------



public function billingType(Request $request,$dealSlug,$packageSlug)
{
	 if(!Session::has('packageID')){
	 	return redirect()->route('checkoutDeal.packageStep',[$dealSlug,$packageSlug])->with('error_message', 'Complete the Package Step.');
	 }

       $deal = DiscountDeal::where('slug',$dealSlug)->first();
       $package = VendorPackage::where('slug',$packageSlug);
       $error = $this->checkDealExpireDate($deal,$package,1);

       $billing = Session::has('BillingAddress') ? Session::get('BillingAddress') : [];

     $address = [
          'name' => !empty($billing) ? $billing['name'] : Auth::user()->name,
          'email' => !empty($billing) ? $billing['email'] : Auth::user()->email,
          'phone_number' => !empty($billing) ? $billing['phone_number'] : Auth::user()->phone_number,
          'address' => !empty($billing) ? $billing['address'] : Auth::user()->user_location,
          'zipcode' => !empty($billing) ? $billing['zipcode'] : Auth::user()->zipcode,
          'country' => !empty($billing) ? $billing['country'] : '',
          'state' => !empty($billing) ? $billing['state'] : '',
          'city' => !empty($billing) ? $billing['city'] : '',
          'latitude' => !empty($billing) ? $billing['latitude'] : '',
          'longitude' => !empty($billing) ? $billing['longitude'] : '',
     ];
 
    return view('users.checkout.steps.billing')
   	      ->with('package',$package->first())
   	      ->with('newStepUrl',$this->stepUrls(4,$dealSlug,$packageSlug))
		  ->with('backStepUrl',$this->stepUrls(3,$dealSlug,$packageSlug))
   	      ->with('address',(object)$address)
   	      ->with('obj',$this)
   	      ->with('deal',$deal)
   	       ->with('stepNumber',4)
	       ->with('haveDeal',1)
   	      ->with('error',$error);
 
}






#--------------------------------------------------------------------------------
#  eventType
#--------------------------------------------------------------------------------



public function billingTypePost(Request $request,$dealSlug,$packageSlug)
{
	 if(!Session::has('packageID')){
	 		return redirect()->route('checkoutDeal.packageStep',[$dealSlug,$packageSlug])->with('error_message', 'Complete the Package Step.');
	 }
	 $deal = DiscountDeal::where('slug',$dealSlug)->first();
     $package = VendorPackage::where('slug',$packageSlug);
     $error = $this->checkDealExpireDate($deal,$package,1);
     if($package->count() == 0){
     	 return redirect()->route('checkoutDeal.packageStep',[$dealSlug,$packageSlug])->with('error_message','This Event is not Found');
     }
     $address = [
          'name' => $request->name,
          'email' => $request->email,
          'phone_number' => $request->phone_number,
          'address' => $request->address,
          'zipcode' => $request->zipcode,
          'country' => $request->country,
          'state' => $request->state,
          'city' => $request->city,
          'latitude' => $request->latitude,
          'longitude' => $request->longitude,
     ];


     Session::put('BillingAddress',$address);

 

       
      return redirect()->route('checkoutDeal.paymentStep',[$dealSlug,$packageSlug]);
 
}




#---------------------------------------------------------------------------
#  paymentType
#---------------------------------------------------------------------------

public function paymentType(Request $request,$dealSlug,$packageSlug)
{
	 if(!Session::has('BillingAddress')){
	 	return redirect()->route('checkoutDeal.billingStep',[$dealSlug,$packageSlug]);
	 }

	 $deal = DiscountDeal::where('slug',$dealSlug)->first();
     $package = VendorPackage::where('slug',$packageSlug);
     $error = $this->checkDealExpireDate($deal,$package,1);

        
     if($package->count() == 0){
     	 return redirect()->route('checkout.packageStep',$packageSlug)->with('error_message','This Event is not Found');
     }

      


      return view('users.checkout.steps.payment')
   	      ->with('deal',$deal)
   	      ->with('package',$package->first())
   	      ->with('obj',$this)
   	       ->with('stepNumber',5)
	       ->with('haveDeal',1)
	       //->with('newStepUrl',$this->stepUrls(4,$dealSlug,$packageSlug))
		   ->with('backStepUrl',$this->stepUrls(4,$dealSlug,$packageSlug))
   	      ->with('error',$error);
}






public function stepUrls($step,$dealSlug,$packageSlug)
{
 
 

	switch ($step) {
	 	 case 1:
           return url(route('eventWithDeal',[$dealSlug,$packageSlug]));
           break;

         case 2:
           return url(route('checkoutDeal.dealReview',[$dealSlug,$packageSlug]));
           break;

         case 3:
           return url(route('checkoutDeal.packageStep',[$dealSlug,$packageSlug]));
           break;
         case 4:
           return url(route('checkoutDeal.billingStep',[$dealSlug,$packageSlug]));
           break;

         case 5:
           return url(route('checkoutDeal.paymentStep',[$dealSlug,$packageSlug]));
           break;


	 	 default:
	 		 return '#';
	 		break;
	 } 
    

}



#---------------------------------------------------------------------------------
#   payment Type Post
#---------------------------------------------------------------------------------




public function paymentTypePost(Request $request,$dealSlug,$packageSlug)
{
 
           $currentDate = date('Y-m-d');
           $deal = DiscountDeal::where('slug',$dealSlug)->first();
           $package = VendorPackage::where('slug',$packageSlug)->first();
           $error = $this->checkDealExpireDate($deal=[],$package);
           #----------------------------------------------------------            
            if($error == 0){
                 $amount = $this->getPayableAmount($deal,$package);  
                 return $this->StripePay($request,$amount,$deal,$package);
            }else{

            }
            #----------------------------------------------------------            

}








}