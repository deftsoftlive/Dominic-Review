<?php
namespace App\Traits\Checkoutproccess;
use Illuminate\Http\Request;
use App\Traits\Checkoutproccess\Ordersummary;
use App\Traits\Checkoutproccess\CheckoutPayment;
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\EventOrder;
use Session;
trait StripeMethod {





#---------------------------------------------------------------------------------
#  comming response after paying with Stripe Method
#---------------------------------------------------------------------------------

public function payWithStripe(Request $request)
{
  
     $error = '';
     if(empty($request->stripeToken)):
         $error .= '<li>Stripe token Expired!</li>';
     else:
                 
                       # create customer to stripe while payment
             try {
    
                           $AccountWithPayment= $this->CommissionFeeServiceAccordingVendor('STRIPE',1);


                            $OrderID = '#DRH'.strtotime(date('y-m-d h:i:s'));
                            $token = $request->stripeToken;
                            $application_fee =$this->getCommissionFee();
                            $total = $this->getTotalOrderCurrent();
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

                                    return $this->saveDataInEventOrder($charge,'STRIPE',$OrderID);
                              }else{
                                      $error .= '<li><b>Payment Failed</b> Something Wrong going on!</li>';
                              } 

                        
                     
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
         }


       

	   endif; 

     return $error;
     
}
 
#--------------------------------------------------------------------------------------------
# save Data In EventOrder
#--------------------------------------------------------------------------------------------

public function saveDataInEventOrder($charge,$type,$OrderID)
{
       $order = $this->getCurentOrders();
      
       return $this->CreateOrder($charge,$OrderID,$type);

 
}

#--------------------------------------------------------------------------------------------
# save Data In EventOrder
#--------------------------------------------------------------------------------------------


public function CreateOrder($charge,$OrderID,$type)
{
   $order = $this->getCurentOrders();
 
   $paymentDetails= json_encode($this->CommissionFeeServiceAccordingVendor($type));
   $o = new \App\Models\Order;
   $o->user_id = Auth::user()->id;
   $o->amount = $this->getTotalOrderCurrent();
   $o->orderID= $OrderID;
   $o->payment_by= $type;
   $o->balance_transaction= $paymentDetails;
   $o->billing_address= json_encode($this->getBillingAddress());
   $o->status=1;
   if($o->save()){

       // $orders = $order->update([
       //    'payment_type' => $type,
       //    'payment_status' => 1,
       //    'payment_data' => json_encode($charge),
       //    'type' => 'order',
       //    'paymentDetails' => $paymentDetails,
       //    'OrderID' => $OrderID,
       //    'order_id' => $o->id,
       //  ]);
      if($this->updateToOrderItemToOrder($type,$charge,$paymentDetails,$o,$order) && $this->userOrderSuccessOrderSuccess($o->id) == 1){
             Session::forget('billingAddress');
             $this->VendorOrderSuccessOrderSuccess($o->id);
             // $this->AdminOrderSuccessOrderSuccess($o->id);
             return redirect()->route('thank-you', ['order_id' => $o->id]);
       }

   }

}


public function updateToOrderItemToOrder($type,$charge,$paymentDetails,$o,$order)
{
   foreach ($order->get() as $or) {
          $or->payment_type = $type;
          $or->payment_status = 1;
          $or->payment_data = json_encode($charge);
          $or->type = 'order';
          $or->paymentDetails = $paymentDetails;
          $or->OrderID = $o->orderID;
          $or->order_id = $o->id;
          $or->save();
   }
   return true;
}

#--------------------------------------------------------------------------------------------
# save Data In EventOrder
#--------------------------------------------------------------------------------------------


public function thankyou(Request $request) {
  $order = App\Models\Order::find($request->order_id);

  return view('users.checkout.thankyou')->with('order',$order);
}

}