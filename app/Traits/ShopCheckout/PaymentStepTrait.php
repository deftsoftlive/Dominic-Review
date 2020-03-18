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
trait PaymentStepTrait {




public function payment()
{     
	$number = 4;
    $arr = $this->checkStep($number);
    if($arr['status'] == 1){
    	return $arr['url'];
    }

    Auth::user()->getShopCartTotal();
   
	return view($this->filePath.'payment')
		  ->with('number',$number)
		  ->with('obj',$this)
	      ->with('backward',url(route('shop.checkout.billingAddress')));	 
}



#==================================================================================================
#==================================================================================================
#==================================================================================================

public function paymentEvalueAteToVendor()
{
	
	 $order = Auth::user()->ShopProductCartItemOfVendors;

	foreach ($order as $key => $o) {
		     $payableAmount = $o->getOrderOfSingleVendor->sum('total');


	}
     
}

#==================================================================================================
#==================================================================================================
#==================================================================================================


public function getTotalOrder()
{
	return Auth::user()->ShopProductCartItems->sum('total'); 

}


#==================================================================================================
#==================================================================================================
#==================================================================================================


public function getTax()
{
   return getTaxPriceAccordingToZipcode();
}

 
#===================================================================================================
#===================================================================================================
#===================================================================================================


public function getCommissionFee($total=null)
{
    $totalAmount = $total == null ? $this->getTotalOrder()  : $total;
    return getFee($totalAmount, 'commission_fee_type', 'commission_fee_amount');
}


#===================================================================================================
#===================================================================================================
#===================================================================================================

public function getGrandTotal()
{
	return ($this->getServiceFee() + $this->getTax() + $this->getTotalOrder());
}

#===================================================================================================
#===================================================================================================
#===================================================================================================



#------------------------------------------------------------------------------------------
#  get Total Summary
#------------------------------------------------------------------------------------------

public function getTotalWithTr()
{



$text ='<table class="cart__totals">';
$text .='<thead class="cart__totals-header">';
$text .='<tr>';
$text .='<th>Subtotal</th>';
$text .='<td>$'.custom_format(Auth::user()->ShopProductCartItems->sum('total'),2).'</td>';
$text .='</tr>';
$text .='</thead>';
$text .='<tbody class="cart__totals-body">';
$text .='<tr>';
$text .='<th>Service Fee</th>';
$text .='<td><strong><span class="plus-sign">+</span>$'.custom_format($this->getServiceFee(),2).'</strong></td>';
$text .='</tr>	'; 

if(Session::has('shippingAddress')){
		$text .='<tr>';
		$text .='<th>Tax</th>';
		$text .='<td><strong><span class="plus-sign">+</span>  $'.custom_format($this->getTax(),2).'</strong></td></tr>';
}
 
$text .='</tbody>';
$text .='<tfoot class="cart__totals-footer">';
$text .='<tr>';
$text .='<th>Grand Total</th>';
$text .='<td> $'.custom_format($this->getGrandTotal(),2).'</td>';
$text .='</tr>';
$text .='</tfoot>';
$text .='</table>';

 
	 
 return $text;
}








#===================================================================================================
#===================================================================================================
#===================================================================================================

#---------------------------------------------------------------------------------------
#  get Current Order Total
#---------------------------------------------------------------------------------------


public function getServiceFee($total=null)
{
    $totalAmount = $total == null ? $this->getTotalOrder()  : $total;
    return getFee($totalAmount, 'service_fee_type', 'service_fee_amount');
}







}