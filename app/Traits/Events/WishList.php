<?php
namespace App\Traits\Events;
use Illuminate\Http\Request;
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\EventOrder;

trait WishList {



#---------------------------------------------------------------------------------------
#  Add To Wish List
#---------------------------------------------------------------------------------------

public function addToWishList(Request $request)
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
                               $response = $this->checkAllConditionOfEvent($events,$request,'wishlist');
                      if($response['status'] == 0){
                          $message = $response;
                      }else{
                          $status = $this->saveToCartAfterCheck($request,$events,$package,'wishlist');
		                      $url = url(route('my_wishlist'));
                          $msg = $status == 1 ? 'This item is added to your wishlist successfully, we redirecting to Wishlist Page' : 'Something wrong going on.';
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



#-----------------------------------------------------------------------------------------------------
#    Check Wish list is exist or not
#-----------------------------------------------------------------------------------------------------


public function CheckWishListExist($event,$package)
{
	 $wishlist = EventOrder::where('user_id',Auth::user()->id)
	                        ->where('event_id',$event->id)
	                        ->where('type','wishlist')
	                        ->where('vendor_id',$package->vendor_category_id);

	  return $wishlist;
}


}