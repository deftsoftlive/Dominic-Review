<?php

namespace App\Http\Controllers\Home\Checkout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\Checkout\CheckoutController;
use App\Models\Vendors\DiscountDeal;
use App\VendorPackage;
use Auth;
use App\Models\Order;
use App\UserEvent;
use Session;
class StepController extends CheckoutController
{
    



#--------------------------------------------------------------------------------
#  eventType
#--------------------------------------------------------------------------------

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
   ->with('newStepUrl',url(route('checkout.packageStep',$packageSlug)))
   ->with('package',$package->first());
}


public function eventType(Request $request,$packageSlug)
{ 
	$id = $request->id; 
	$event = UserEvent::where('user_id', Auth::user()->id)
	         ->where('id',$id);

    if($event->count() == 0){
    	return redirect()->back()->with('error_message', 'This Event is not Found');
    }

    $events = $event->first();

    Session::put('eventTypeSession', $events->id);
    return redirect()->route('checkout.packageStep', $packageSlug);
 
}

#--------------------------------------------------------------------------------
#  eventType
#--------------------------------------------------------------------------------



public function dealType(Request $request) {
	 if(Session::has('eventTypeSession')) {
	 	return redirect()->route('payWithDeal');
	 } 
}







#--------------------------------------------------------------------------------
#  eventType
#--------------------------------------------------------------------------------



public function packageType(Request $request,$packageSlug)
{
	 if(!Session::has('eventTypeSession')){
	 	return redirect()->route('checkout.eventType',$packageSlug)->with('error_message', 'Complete the Event Step.');
	 }
       $package = VendorPackage::where('slug',$packageSlug);
       $error = $this->checkDealExpireDate($deal=[],$package,1);
        
      

      $addons = Session::has('packageAddons') ? Session::get('packageAddons') : [];

       
    return view('users.checkout.steps.package')
   	      ->with('package',$package->first())
   	      ->with('addons',$addons)
   	      ->with('obj',$this)
   	      ->with('error',$error);
 
}






#--------------------------------------------------------------------------------
#  eventType
#--------------------------------------------------------------------------------



public function packageTypePost(Request $request,$packageSlug)
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


       
      return redirect()->route('checkout.billingStep',$packageSlug);
 
}






#--------------------------------------------------------------------------------
#  billingType
#--------------------------------------------------------------------------------



public function billingType(Request $request,$packageSlug)
{
	 if(!Session::has('packageID')){
	 	return redirect()->route('checkout.packageStep',$packageSlug)->with('error_message', 'Complete the Package Step.');
	 }


       $package = VendorPackage::where('slug',$packageSlug);
       $error = $this->checkDealExpireDate($deal=[],$package,1);

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
   	      ->with('address',(object)$address)
   	      ->with('obj',$this)
   	      ->with('error',$error);
 
}






#--------------------------------------------------------------------------------
#  eventType
#--------------------------------------------------------------------------------



public function billingTypePost(Request $request,$packageSlug)
{
	 if(!Session::has('packageID')){
	 	return redirect()->route('checkout.packageStep',$packageSlug);
	 }
     $package = VendorPackage::where('slug',$packageSlug);
     $error = $this->checkDealExpireDate($deal=[],$package,1);
        
      
     if($package->count() == 0){
     	 return redirect()->route('checkout.packageStep',$packageSlug)->with('error_message','This Event is not Found');
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


     //return Session::get('BillingAddress');

       
      return redirect()->route('checkout.paymentStep',$packageSlug);
 
}




#---------------------------------------------------------------------------
#  paymentType
#---------------------------------------------------------------------------

public function paymentType(Request $request,$packageSlug)
{
	 if(!Session::has('BillingAddress')){
	 	return redirect()->route('checkout.billingStep',$packageSlug);
	 }

 $package = VendorPackage::with('business','business.vendors')->where('slug',$packageSlug);

     $error = $this->checkDealExpireDate($deal=[],$package,1);
     if($package->count() == 0){
     	 return redirect()->route('checkout.packageStep',$packageSlug)->with('error_message','This Event is not Found');
     }

      


      return view('users.checkout.steps.payment')
   	      ->with('package',$package->first())
   	      ->with('obj',$this)
   	      ->with('error',$error);
}


}