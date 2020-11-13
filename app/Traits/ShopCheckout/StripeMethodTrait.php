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
use App\Wallet;
use App\WalletHistory;
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
  if($request->type == 'wallet&stripe')
  {
    $error = '';
      if(empty($request->stripeToken)):
         $error .= '<li>Stripe token Expired!</li>';
      else:
                 
          # create customer to stripe while payment
          try {
                $AccountWithPayment= $this->CommissionFeeServiceAccordingVendor('STRIPE',1);
                $token = $request->stripeToken;
                // $application_fee = $this->getCommissionFee();

                $shop_cart_items = ShopCartItems::where('user_id',\Auth::user()->id)->where('type','cart')->where('orderID',NULL)->get(); 

                  foreach($shop_cart_items as $item)
                  {
                    $sci = ShopCartItems::find($item->id);
                    $sci->type = 'order';
                    $sci->orderID = '#DRHSHOP'.strtotime(date('y-m-d h:i:s'));  
                    $sci->save();

                    $total = $request->amt;

                    $description = 'Customer for pay for '.$sci->OrderID;

                     $wallet = Wallet::where('user_id',Auth::user()->id)->first(); 
                     $wallet_amount = $wallet->money_amount; 

                     $shop = \DB::table('shop_cart_items')->where('user_id',Auth::user()->id)->where('type','cart')->where('orderID',NULL)->get();   

                     $cart_price = [];

                      foreach($shop as $sh)
                      {
                        $cart_price[] = $sh->total;
                      }

                     $cart_total = array_sum($cart_price);  

                     $transaction_details = 'Wallet- '.$wallet_amount.', Stripe - '.$total;
                     $billing_address = $request->session()->get('shopBillingAddress');
                     $shipping_address = $request->session()->get('shopBillingAddress');


                      $so = new ShopOrder;
                      $so->user_id = \Auth::user()->id;
                      $so->payment_by = 'Wallet & Stripe';
                      $so->transaction_details = $transaction_details;
                      $so->amount = $request->total;
                      $so->billing_address = $billing_address;
                      $so->shipping_address = $shipping_address;
                      $so->orderID = $sci->orderID;
                      $so->status = 1;
                      
                      if($so->save())
                      {
                        $this->ShopProductOrderPlacedForVendorSuccess($so->id);
                        $this->ShopProductOrderPlacedSuccess($so->id);
                        $this->ShopProductOrderPlacedInfo($so->id);
                      }

                      Wallet::where('user_id',Auth::user()->id)->update(array('money_amount' => 0));

                      $walletHistory = WalletHistory::create($request->all()); 
                      $walletHistory->user_id = \Auth::user()->id; 
                      $walletHistory->type = 'debit';
                      $walletHistory->money_amount = $wallet_amount;
                      $walletHistory->save();

                     $charge = \Stripe\Charge::create([
                        "amount" => ($total * 100),
                        "currency" => "usd",
                        "source" => $request->stripeToken,
                        "description" => $description,
                        ],$AccountWithPayment);

                        if($charge){
                              // return $this->saveDataInShopOrder($charge,'STRIPE',$OrderID);
                              
                              if($so->save()){

                                  ShopCartItems::where('orderID', $so->orderID)->update(array('orderID' => $so->orderID));

                                  if(Auth::user()->createOrderFromCart($so))
                                    {
                                        \Session::forget('shippingAddress');
                                        \Session::forget('shopBillingAddress');

                                        return redirect()->route('shop.checkout.thankyou', ['order_id' => $so->id]);  

                                        $this->ShopProductOrderPlacedForVendorSuccess($so->id);
                                        $this->ShopProductOrderPlacedSuccess($so->id);
                                        // $this->AdminOrderSuccessOrderSuccess($so->id);
                                    }
                                }

                        }else{
                                $error .= '<li><b>Payment Failed</b> Something Wrong going on!</li>';
                        } 

                      }

           } catch (Exception $e) {
                        $error .='Caught exception: '.  $e->getMessage();
           }


       

     endif; 

     return $error;
  }else{
      $error = '';
      if(empty($request->stripeToken)):
         $error .= '<li>Stripe token Expired!</li>';
      else:
                 
          # create customer to stripe while payment
          try {

                     $AccountWithPayment= $this->CommissionFeeServiceAccordingVendor('STRIPE',1);
                     $OrderID = '#DRHSHOP'.strtotime(date('y-m-d h:i:s'));
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
                     $this->ShopProductOrderPlacedInfo($o->id);
                     // $this->AdminOrderSuccessOrderSuccess($o->id);
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