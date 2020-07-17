<?php

namespace App\Http\Controllers\Users\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Events\EventConditionBeforeCart as EventCartConditions;
 
use App\VendorPackage;
use App\PackageMetaData;
use App\Models\EventOrder;
use Auth;
class CartController extends Controller
{

use EventCartConditions;
 





public function index(Request $request)
{
        

         $order = EventOrder::where('type','cart')->where(function($t){
                $user_id = Auth::check() && Auth::user()->role == "user" ? Auth::user()->id : 0;
                $t->where('user_id',$user_id);
          })
          ->get();


           $this->DeleteExpiredCustomPackage();

          $this->ChangeDirectToCart();
 
     return view('users.cart.index')->with('CartItems',$order);
}




public function DeleteExpiredCustomPackage()
{
        $package_ids = EventOrder::where('type','cart')
                                 ->where('user_id',Auth::user()->id)
                                 ->pluck('package_id');
 
         $packages = VendorPackage::join('custom_packages','custom_packages.id','=','vendor_packages.custom_package_id')
                                 ->select('custom_packages.*')
                                 ->whereIn('vendor_packages.id',$package_ids)
                                 ->where('vendor_packages.type',1)
                                 //->where('custom_packages.updated_at', '>', \Carbon\Carbon::now()->addDays(7))
                                 ->groupBy('vendor_packages.id')
                                 ->orWhere(function($t){
                                              $c = $t->first();
                                              $now = \Carbon\Carbon::now();
                                              if($c->created_at->diffInDays($now) < 0){
                                                  // EventOrder::where('type','cart')
                                                  //            ->where('user_id',Auth::user()->id)
                                                  //            ->where('package_id',$c->package_id)
                                                  //            ->delete();
                                              }else{
                                                $t->where('vendor_packages.id',0);
                                              }
                                 })
                                 ->get();
 
  foreach($packages as $c) {
            $now = \Carbon\Carbon::now();
            if($c->updated_at->diffInDays($now) > 0){
              EventOrder::where('type','cart')
                         ->where('user_id',Auth::user()->id)
                         ->where('package_id',$c->package_id)
                         ->delete();
            }  
  }

}




#----------------------------------------------------------------------------------------------
#  cart delete
#----------------------------------------------------------------------------------------------

public function ChangeDirectToCart()
{     
  if(Auth::check() && Auth::user()->role == "user"){
         $order = EventOrder::where('type','cart')
                            ->where('user_id',Auth::user()->id)
                            ->where('checkout_type','direct')
                            ->update(['checkout_type' => 'cart']);
  }
}

#----------------------------------------------------------------------------------------------
#  cart delete
#----------------------------------------------------------------------------------------------


public function wishlist(Request $request)
{
		      $order = EventOrder::where('type','wishlist')->where(function($t){
                $user_id = Auth::check() && Auth::user()->role == "user" ? Auth::user()->id : 0;
                $t->where('user_id',$user_id);
	        })
          ->orderBy('created_at','DESC')
	        ->get();

	  if(!empty($request->test)){
	  	       return $order;
	  }
	return view('users.wishlist.index')->with('CartItems',$order);
}



#----------------------------------------------------------------------------------------------
#  cart delete
#----------------------------------------------------------------------------------------------


public function delete($id)
{
    $EventOrder = EventOrder::where('user_id',Auth::user()->id)->where('id',$id);
      
      if($EventOrder->count() == 0){
        abort(404);
      }

      $EventOrder->delete();

      return redirect()->route('my_cart')->with('messages','Cart iteam is deleted successfully!');

}


#----------------------------------------------------------------------------------------------
#  cart delete
#----------------------------------------------------------------------------------------------


public function wishlistDelete($id)
{
      $EventOrder = EventOrder::where('user_id',Auth::user()->id)->where('id',$id);
      
      if($EventOrder->count() == 0){
        abort(404);
      }

      $EventOrder->delete();

      return redirect()->route('my_wishlist')->with('messages','Item is removed successfully from wishlist!');

}






#------------------------------------------------------------------------------------
# packageCheck
#------------------------------------------------------------------------------------

	public function packageCheck(Request $request)
	{
		 
		 $package_id = $request->package_id; 

		 $loginStatus = $this->loginOrNot();
	     $package = VendorPackage::find($package_id);

		 $message =[];
         
         if($loginStatus == 0){

         	$message = [
               'status' => 4,
               'package' => $package,
               'message' => 'Please login with customer account.'
           ];

         }elseif($loginStatus == 2){

         	$message = [
               'status' => 4,
               'package' => $package,
               'message' => 'You are logged in with another type of user, you need to login as Customer Account'
         	];

         }else{
             
                 $upcommingEvents =  $upcommingEvents = Auth::user()->UpcomingUserEvents;

                 $message = [
		              'status' => 1,
		              'package' => $package,
		              'upcoming_events' => $upcommingEvents
         	     ];


         }


         return response()->json($message);



	}







public function addToCart(Request $request)
{
  // dd($request->all());
    $package_id = $request->package_id; 
    $loginStatus = $this->loginOrNot();
    $package = VendorPackage::find($package_id);


    $message =[];

    if($loginStatus == 1){

            $event = \App\UserEvent::with('eventCategories','eventCategories.eventCategory')
                                   ->where('user_id',Auth::user()->id)
                             ->where('id',$request->event_type);


         if($event->count() > 0){
                    $events = $event->first();
                      $response = $this->checkAllConditionOfEvent($events,$request,'cart&order');
       
                      if($response['status'] == 0){
                    $message = $response;
                  }else{
                     $status = $this->saveToCartAfterCheck($request,$events,$package);
                      $url = url(route('my_cart'));

                     $msg = $status == 1 ? 'This item is added to cart successfully, we redirecting to Cart Page' : 'Something wrong going on.';

                     $message = ['status' => $status,'url'=> $url,'errors' => $msg];
                  }
          }else{

                   $message = ['status' => 0,'errors' => 'The Event is not found!' ];
          }

      }else{

         $msg = $loginStatus == 0 ? 'Please login with customer account.' : 'You are logged in with another type of user, you need to login as Customer Account';
         $message = ['status' => 4,'package' => $package,'message' => $msg];
     }  
       
  return response()->json($message);

}


#------------------------------------------------------------------------------------
# check Login or not
#------------------------------------------------------------------------------------
 

public function directToWishList(Request $request)
{
	   
	     $package_id = $request->package_id; 
       $loginStatus = $this->loginOrNot();
	     $package = VendorPackage::find($package_id);


		 $message =[];

    if($loginStatus == 1){

            $event = \App\UserEvent::with('eventCategories','eventCategories.eventCategory')
  	                               ->where('user_id',Auth::user()->id)
			  	                   ->where('id',$request->event_type);


         if($event->count() > 0){
	                  $events = $event->first();
                      $response = $this->checkAllConditionOfEvent($events,$request,'cart&order');
		   
  	                  if($response['status'] == 0){
		                $message = $response;
		              }else{
		                  $status = $this->saveToCartAfterCheck($request,$events,$package,"cart","direct");
                      $url = url(route('direct.checkout.billingAdress'));
                      $msg = $status == 1 ? 'This item is added to cart successfully, we redirecting to Checkout Page' : 'Something wrong going on.';
                      $message = ['status' => $status,'url'=> $url,'errors' => $msg];
		              }
          }else{

    	             $message = ['status' => 0,'errors' => 'The Event is not found!' ];
          }

      }else{

      	 $msg = $loginStatus == 0 ? 'Please login with customer account.' : 'You are logged in with another type of user, you need to login as Customer Account';
         $message = ['status' => 4,'package' => $package,'message' => $msg];
     }  
       
  return response()->json($message);

}


#------------------------------------------------------------------------------------
# check Login or not
#------------------------------------------------------------------------------------
 

public function saveToCartAfterCheck($request,$events,$package,$type="cart",$checkout_type="cart")
{
	
    $final_package_price = $this->CheckDealRelatedPackage($package,$request); 

    $order = new EventOrder;
    $order->vendor_id = $package->vendor_category_id;
    $order->package_id = $package->id;
    $order->event_id = $events->id;
    $order->user_id = Auth::user()->id;
    $order->deal_id = $request->deal_id;
    $order->category_id = $package->category_id;
    $order->type = $type;
    $order->package_price = $package->price;
    $order->discounted_price = $final_package_price;
    $order->subtotal = $final_package_price;
    $order->discount = ($package->price - $final_package_price);
    $order->checkout_type = $checkout_type;
    $order->status = 0;
    $order->related_tableData = json_encode($this->orderRelatedTableBackup($events,$package,$request));
    if($order->save()){
      \Session::forget('billingAddress');
      \Session::forget('OrderSummary');
      $checkout_type == "direct" ? \Session::put('checkout_type',1) : \Session::forget('checkout_type');

       \Session::put('checkout_type',1);
    	return 1;
    }


}


#-------------------------------------------------------------------------------------
#   CouponApplied
#-------------------------------------------------------------------------------------


public function getDiscountOfPackageAfterAppingDeal($deal,$item)
{
   $price = $item->package->price;
   $percent = round($price / 100);
   $discount = $deal->deal_off_type == 0 ? round($price * $percent) : $deal->amount;
   return $discount;
}


#------------------------------------------------------------------------------------
# check Login or not
#------------------------------------------------------------------------------------
 


public function cartItems(Request $request)
{


   $order = EventOrder::where('type','cart')
                ->where(function($t){
                        $user_id = Auth::check() && Auth::user()->role == "user" ? Auth::user()->id : 0;
                        $t->where('user_id',$user_id);
                 });
                   
 
    $items = view('users.includes.cart.list')->with('CartItems',$order->get());

    $amountDetail = view('users.includes.cart.cart_total')->with('CartItems',$order);


   
    $data = [
            'items' => $items->render(),
            'amountDetail' => $amountDetail->render(),
           ];

    return response()->json([
            'status' => 1,
            'data' => $data
    ]);
}
#------------------------------------------------------------------------------------
# check Login or not
#------------------------------------------------------------------------------------
 


public function getWishlistItems(Request $request)
{


   $order = EventOrder::where('type','wishlist')
                ->where(function($t){
                        $user_id = Auth::check() && Auth::user()->role == "user" ? Auth::user()->id : 0;
                        $t->where('user_id',$user_id);
                 });
                   
 
         $items = view('users.includes.wishlist.list')->with('CartItems',$order->get());
         $data = [
                   'items' => $items->render()
                 ];

    return response()->json([
            'status' => 1,
            'data' => $data
    ]);
}
















}
