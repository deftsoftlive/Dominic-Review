<?php
namespace App\Traits\ShopCheckout;
use Illuminate\Http\Request;
 
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\EventOrder;
use Session;
use App\Models\Shop\ShopCartItems;	
trait TotalOrderCalulationTrait {


 


#---------------------------------------------------------------------------------------
#  commission and service fee according to vendor
#---------------------------------------------------------------------------------------

public function CommissionFeeServiceAccordingVendor($type="STRIPE",$account_status=0)
{
	   $orders = Auth::user()->ShopProductCartItemOfVendors; 
     $arr =[];
     $account =[];

	 foreach ($orders as $key => $value) {

	  
	 	$amount = trim($value->getOrderOfSingleVendor->sum('total')); 

        // $account_id = $type == "STRIPE" ? $value->vendor->shop->stripe_account_id : $value->vendor->shop->paypal_email;
        $service_fee = $this->getServiceFee($amount);
        $commission_fee = $this->getCommissionFee($amount);


        $payable_amount = round($amount - ($service_fee + $commission_fee));

        $stripeAccountParams= (array)["amount" => $payable_amount];

        array_push($account, $stripeAccountParams);

	 	$arr[$value->vendor_id] = [
           'vendor_id' => $value->vendor_id,
           'total' => $this->getGrandTotal(),
           'amount' => $amount,
           'tax' => $this->getTax(),
           'commission_fee' => $commission_fee,
           'service_fee' => $service_fee,
           'payable_amount' => $payable_amount,
           'account_id' => 0,
           'stripeAccountParams' => $stripeAccountParams
	 	];


	 	//array_push($arr[$value->vendor_id], $arr1);
	 }

	 return $account_status == 0 ? $arr : $account;
 
}


 









}














