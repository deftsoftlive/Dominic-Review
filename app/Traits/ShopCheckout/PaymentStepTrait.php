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

  //  Auth::user()->getShopCartTotal();
   
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
	 $value = \Session::get('booking_no'); 
     $get_package = \DB::table('package_courses')->where('booking_no',$value)->get();
     $price = [];

    foreach ($get_package as $value) {
     	$price[] = $value->price;
    }

    $total = array_sum($price);

    if(!empty(Auth::user())) 
    {
    	return Auth::user()->ShopProductCartItems->sum('total'); 
    }
    elseif(!empty($value))
    {
    	return $total;
    }
	
	
	// $coupon = \DB::table('shop_cart_items')->where('user_id',Auth::user()->id)->where('orderID', '=', NULL)->where('discount_code','!=',NULL)->get();

	// $extra = getAllValueWithMeta('service_fee_amount', 'global-settings'); 

	// $total = array();
	// foreach($coupon as $co){
	// 	$total[] = $co->total;
	// }

	// $total_price = array_sum($total);

	// return $total_price;
	
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

	$coupon = \DB::table('shop_cart_items')->where('user_id',Auth::user()->id)->where('orderID', '=', NULL)->get();

	// Check coupon is applied or not
	$check_coupon = \DB::table('shop_cart_items')->where('user_id',Auth::user()->id)->where('orderID', '=', NULL)->where('discount_code','!=',NULL)->get();

	$extra = getAllValueWithMeta('service_fee_amount', 'global-settings'); 

	//dd($coupon);

	// Price without discount
	$total1 = array();
	foreach($coupon as $co){
		if($co->discount_price)
		{
			$total1[] = $co->total * $co->discount_price;
		}else{
			$total1[] = $co->total;
		}
	}
	$total_price1 = array_sum($total1);
	$grand_total1 = $total_price1+$extra;

	// Price with discount
	$total = array();
	foreach($coupon as $co){
		$total[] = $co->total;
	}
	$total_price = array_sum($total);
	$grand_total = $total_price+$extra;
	
	if($grand_total < 0)
    {
        $gr_total = ceil($grand_total);
    }else{
        $gr_total = number_format($grand_total,2);
    }

$text ='<table class="cart__totals">';
$text .='<thead class="cart__totals-header">';
$text .='<tr>';
$text .='<th>Subtotal</th>';
$text .='<td id="totakl">£'.$gr_total.'</td>';
$text .='</tr>';
$text .='</thead>';
$text .='<tbody class="cart__totals-body">';
// $text .='<tr>';
// $text .='<th>Service Fee</th>';
// $text .='<td><strong><span class="plus-sign">+</span>£'.$extra.'</strong></td>';
// $text .='</tr>	'; 

if(Session::has('shippingAddress')){

		$text .='<tr>';
		// $text .='<th>Tax</th>';
		// $text .='<td><strong><span class="plus-sign">+</span>  £'.$total_price.'</strong></td></tr>';
}

if(count($check_coupon)>0)
{
	foreach($check_coupon as $co)
	{
		if(!empty($co->discount_price))
		{
			$discount = \DB::table('coupons')->where('coupon_code',$co->discount_code)->first();
			if($discount->discount_type == 0)
			{
				$pound = '£';
				$sign = '';
			}else{
				$pound = '';
				$sign = '%';
			}
			$text .='<tr>';
			$text .='<th><p>Coupon applied on '.$co->shop_type.'</p></th>';
			$text .='<td> <p>- '.$pound.number_format($co->discount_price,2).$sign.'</p></td>';
			$text .='</tr>';
		}
	}
}
 
$text .='</tbody>';
$text .='<tfoot class="cart__totals-footer">';
$text .='<tr>';
$text .='<th>Grand Total</th>';
$text .='<td> £'.$gr_total.'</td>';
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