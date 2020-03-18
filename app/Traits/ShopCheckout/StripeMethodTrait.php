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
use App\Models\Shop\ShopOrder;
use App\Traits\EmailTraits\EmailNotificationTrait;
trait StripeMethodTrait {


use EmailNotificationTrait;


#---------------------------------------------------------------------------------
#  comming response after paying with Stripe Method
#---------------------------------------------------------------------------------

public function postPaymentStripe(Request $request)
{
  
   
     $error = '';
     if(empty($request->stripeToken)):
         $error .= '<li>Stripe token Expired!</li>';
     else:
                 
                       # create customer to stripe while payment
                 try {
    
                             $AccountWithPayment= $this->CommissionFeeServiceAccordingVendor('STRIPE',1);
                             $OrderID = '#ENVSHOP'.strtotime(date('y-m-d h:i:s'));
                             $token = $request->stripeToken;
                             $application_fee = $this->getCommissionFee();

                             $total = $this->getGrandTotal();

                             $description = 'Customer for pay for '.$OrderID;

                             $charge = \Stripe\Charge::create([
                                "amount" => ($total * 100),
                                "currency" => "usd",
                                "source" => $request->stripeToken,
                                //"shipping" => $shipping,
                                "description" => $description,
                                //"application_fee" => $application_fee,
                                ],$AccountWithPayment);

                                if($charge){
                                      return $this->saveDataInShopOrder($charge,'STRIPE',$OrderID);
                                }else{
                                        $error .= '<li><b>Payment Failed</b> Something Wrong going on!</li>';
                                } 
  
                   } catch (Exception $e) {
                                $error .='Caught exception: '.  $e->getMessage();
                   }


       

	   endif; 

     return $error;
     
}
 
#--------------------------------------------------------------------------------------------
# save Data In EventOrder
#--------------------------------------------------------------------------------------------

public function saveDataInShopOrder($charge,$type,$OrderID)
{
       
       return $this->CreateOrder($charge,$OrderID,$type);

 
}

#--------------------------------------------------------------------------------------------
# save Data In EventOrder
#--------------------------------------------------------------------------------------------


public function CreateOrder($charge,$OrderID,$type)
{
 
   $paymentDetails= json_encode($this->CommissionFeeServiceAccordingVendor($type));
    $o = new ShopOrder;
    $o->orderID=$OrderID;
    $o->user_id =Auth::user()->id;
    $o->shipping_address = json_encode($this->getBillingAddress());
    $o->billing_address = json_encode($this->getShippingAddress());
    $o->payment_detail=json_encode($charge);
    $o->balance_transaction= $paymentDetails;
    $o->amount=$this->getGrandTotal();
    $o->payment_by=$type;
    $o->status=1;
    if($o->save()){
              if(Auth::user()->createOrderFromCart($o)){
                   Session::forget('shippingAddress');
                   Session::forget('shopBillingAddress');

                   
                     $this->ShopProductOrderPlacedForVendorSuccess($o->id);
                     $this->ShopProductOrderPlacedSuccess($o->id);
                   //$this->AdminOrderSuccessOrderSuccess($o->id);
                   return redirect()->route('shop.checkout.thankyou', ['order_id' => $o->id]);  
             }
 
   }

   

}


#--------------------------------------------------------------------------------------------
# save Data In EventOrder
#--------------------------------------------------------------------------------------------


public function thankyou(Request $request) {
   $order = ShopOrder::find($request->order_id);
   return view($this->filePath.'thankyou')->with('order',$order);
}



#--------------------------------------------------------------------------------------------
#  Stock Management
#--------------------------------------------------------------------------------------------

public function minusFromStock($order)
{
   
}



#--------------------------------------------------------------------------------------------
#  Stock Management
#--------------------------------------------------------------------------------------------


}