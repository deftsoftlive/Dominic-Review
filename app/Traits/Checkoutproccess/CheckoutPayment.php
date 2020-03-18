<?php
namespace App\Traits\Checkoutproccess;
use Illuminate\Http\Request;
use App\Traits\Checkoutproccess\Ordersummary;
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\EventOrder;
use Session;
trait CheckoutPayment {

	

#===========================================================================================
#===========================================================================================
#===========================================================================================



 public function paymentPage()
 {
 	 $this->checkStep(3);
	 return view('users.checkout.steps.payment')
	 ->with('stepNumber',3)
	 ->with('orders',$this->getCurentOrders())
	 ->with('obj',$this)
     ->with('haveDeal',1);
 }


#===========================================================================================
#===========================================================================================
#===========================================================================================










 
}

