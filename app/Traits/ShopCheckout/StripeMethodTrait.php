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
use App\Course;
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
  
  Session::put('booking_no',$request->booking_no);
      
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

                    // $description = 'Customer for pay for order ID - ' .$sci->OrderID. ' & user ID - '. \Auth::user()->name  ;

                    $description = 'Payment from customer name - ' .\Auth::user()->name. ' & order ID - '. $OrderID. '& user email - '. \Auth::user()->email ;

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
                        "currency" => "gbp",
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

            //dd( $request->all() );
             $AccountWithPayment= $this->CommissionFeeServiceAccordingVendor('STRIPE',1);

             $OrderID = '#DRHSHOP'.strtotime(date('y-m-d h:i:s'));
             $token = $request->stripeToken;
             $application_fee = $this->getCommissionFee();

             if($this->getGrandTotal()<0)
             {
                $total = ceil($this->getGrandTotal());
             }else{
                $total = $this->getGrandTotal(); 
             }

             $description = 'Payment from customer name - ' .\Auth::user()->name. ' & order ID - '. $OrderID. '& user email - '. \Auth::user()->email ;
             $total = round($total,2);                 

            $charge = \Stripe\Charge::create([
            "amount" => ($total * 100),
            "currency" => "gbp",
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
    $value = \Session::get('booking_no'); 
    $get_package = \DB::table('package_courses')->where('booking_no',$value)->first();
    $get_packages = \DB::table('package_courses')->where('booking_no',$value)->get();
    $user_id = isset($get_package) ? $get_package->parent_id : Auth::user()->id;

    $paymentDetails= json_encode($this->CommissionFeeServiceAccordingVendor($type));

    if(!empty(Auth::user()->id))
    {

    }elseif(!empty($value))
    {
      foreach($get_packages as $pack)
      {
        //dd($get_packages);
        $get_course = Course::where('id',$pack->course_id)->first();

        $sci = new ShopCartItems;
        $sci->shop_id = 0;
        $sci->vendor_id = 1;
        $sci->user_id = $pack->parent_id;
        $sci->child_id = isset($pack->player_id) ? $pack->player_id : $pack->parent_id;
        $sci->product_id = $pack->course_id;
        $sci->course_season = $get_course->season;
        $sci->price = $pack->price;
        $sci->total = $pack->price;
        $sci->type = 'order';
        $sci->shop_type = 'course';
        $sci->manual = 1;
        $sci->orderID = $OrderID;
        $sci->save();
      }
    }
        $o = new ShopOrder;
        $o->orderID=$OrderID;
        $o->user_id = !empty(Auth::user()->id) ? Auth::user()->id : $user_id;
        $o->shipping_address = json_encode($this->getBillingAddress());
        $o->billing_address = json_encode($this->getShippingAddress());
        $o->payment_detail=json_encode($charge);
        $o->balance_transaction= $paymentDetails;
        $o->amount=$this->getGrandTotal();
        $o->payment_by=$type;
        $o->status=1;
        //dd($o);
        
        if($o->save()){

          ShopCartItems::where('user_id',$o->user_id)->where('type','cart')->update(array('orderID' => $o->orderID, 'type' => 'order'));


                  // if(Auth::user()->createOrderFromCart($o)){
                        Session::forget('shippingAddress');
                        Session::forget('shopBillingAddress');
                        Session::forget('booking_no');
                       
                        $this->ShopProductOrderPlacedForVendorSuccess($o->id);
                        $this->ShopProductOrderPlacedSuccess($o->id);
                        $this->ShopProductOrderPlacedInfo($o->id);
                        // $this->AdminOrderSuccessOrderSuccess($o->id);
                       return redirect()->route('shop.checkout.thankyou', ['order_id' => $o->id]);  
                 // }

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