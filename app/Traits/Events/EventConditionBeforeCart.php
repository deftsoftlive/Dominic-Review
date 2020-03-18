<?php
namespace App\Traits\Events;
use Illuminate\Http\Request;
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\EventOrder;
use Carbon\Carbon;
trait EventConditionBeforeCart {

use EventOrderTrait;
use WishList;
use ApplyCouponTrait;
use PackageAddons;



#------------------------------------------------------------------------------------
# check Login or not
#------------------------------------------------------------------------------------
  
public function loginOrNot()
{
	$status = 0;

	if(Auth::check() && Auth::user()->role != "user"){
	 $status = 2;
	}

	if(Auth::check() && Auth::user()->role == "user"){
		$status = 1;
	}

	return $status;
}



#------------------------------------------------------------------------------------
# check Login or not
#------------------------------------------------------------------------------------
  
public function getAllUpcommingEventUser()
{
     
     $upcommingEvents = Auth::user()->UpcomingUserEvents;

     
}


#------------------------------------------------------------------------------------
# check Login or not
#------------------------------------------------------------------------------------
  

  public function eventCategories(Request $request)
  {
  	  $events = \App\UserEvent::with('eventCategories','eventCategories.eventCategory')
  	             ->where('user_id',Auth::user()->id)
			  	 ->where('id',$request->event_id)
			  	 ->first();
        $response = $this->checkAllConditionOfEvent($events,$request,'all');
  	 
      return response()->json($response);
  }


#-----------------------------------------------------------------------------------------
#  check deal package have related to user event
#-----------------------------------------------------------------------------------------  


public function dealHaveRelatedEventType($events,$package_id)
{
	         $PackageMetaData = \App\PackageMetaData::
				          where('key_value',$events->event_type)
				         ->where('type','events')
				         ->where('package_id',$package_id)
				         ->count();

      return $PackageMetaData > 0 ? 1 : 0;
}

#-----------------------------------------------------------------------------------------
#  check order item
#-----------------------------------------------------------------------------------------

public function checkAvailableDates($evenTypeStatus,$events,$request)
{
	if($evenTypeStatus == 1){
	$package_id = $request->package_id;
	$event_id = $events->id;
	$package = VendorPackage::find($package_id);
	$vendor_category_id = $package->vendor_category_id;

     $order =  \App\Models\EventOrder::where('event_orders.vendor_id',$vendor_category_id)
                       ->join('user_events','user_events.id','=','event_orders.event_id')
                       ->orWhere(function($t) use($events){
                       	  $event = $t->first();
                          $t->whereBetween('user_events.start_date',[$events->start_date,$events->end_date]);
                          $t->whereBetween('user_events.end_date',[$events->start_date,$events->end_date]);
                       })
                       ->where('event_orders.type','order')
                       ->count();

      return 1; $order > 0 ? 0 : 1;

	}else{
		return 1;
	}
}


#-----------------------------------------------------------------------------------------
#  check deal package have related to user event
#-----------------------------------------------------------------------------------------  


public function checkAllConditionOfEvent($events,$request,$type=null)
{     
	  $msg ='';
      $status = 0;
      $package_id = $request->package_id;
	  
	  # this function is check that the event type of package which are selected and your event's eventtype both are same
	 $checkCustomPackage = $this->checkCustomPackageExpiredOrAlreadBuy($package_id);
	 $evenTypeStatus = $this->dealHaveRelatedEventType($events,$package_id);
 
	  $checkDealMinAmountStatus = $this->checkDealMinAmountAccordingToPackage($evenTypeStatus,$request);
      #
	  $datesSataus = $this->checkAvailableDates($checkDealMinAmountStatus,$events,$request);
     
      # this function is check that the category of package which is selected and your event's category both are same
	  $cartStatus = $this->chackAlreadyBuyOrCart($evenTypeStatus,$events,$package_id,$type);

	   # this function is check that the category of package which is selected and your event's category both are same
	  $cartCategoryStatus = $this->chackAlreadyBuyOrCart($cartStatus,$events,$package_id,$type,1);
	   
	   # this function is check that the category of package which is selected and your event's category both are same
	  $categoryStatus = $this->PackageAndEventHaveSameCategory($cartCategoryStatus,$events,$package_id);

	   # this function is check that the category of package which is selected and your event's category both are same
	  $capacityStatus = $this->PackageAndEventCapacity($categoryStatus,$events,$package_id);

	  # this function is check that the category of package which is selected and your event's category both are same
      $budgetStatus = $this->PackageAndEventBudget($capacityStatus,$events,$request,$type);

	  if($checkCustomPackage['status'] == 0){
	  	  $status = 0;
          $msg = $this->checkAllConditionBeforeAddingPackage($checkCustomPackage['message']);
	  }elseif($evenTypeStatus == 0){
	  	  $status = 0;
          $msg = $this->checkAllConditionBeforeAddingPackage('event_type');
	  }elseif($checkDealMinAmountStatus == 0){
	  	  $status = 0;
          $msg = $this->checkAllConditionBeforeAddingPackage('priceNotApplicable',$request);
      }elseif($datesSataus == 0){
	  	  $status = 0;
          $msg = $this->checkAllConditionBeforeAddingPackage('hiedOnThesedate',$request);
	  }elseif($cartStatus == 0 && $type !="all") {
	  	  $status = 0;
	  	  $type_message = $type == 'wishlist' ? 'event_category_exist_with_package_wishlist' : 'event_category_with_package_exist';
	  	  $msg = $this->checkAllConditionBeforeAddingPackage($type_message,$request);

	  }elseif($cartCategoryStatus == 0 && $type !="all") {
	  	  $status = 0;
	  	  $type_message = $type == 'wishlist' ? 'event_category_exist_wishlist' : 'event_category_exist';
	  	  $msg = $this->checkAllConditionBeforeAddingPackage($type_message,$request);

	  }elseif ($categoryStatus == 0) {
	  	  $status = 0;
	  	  $msg = $this->checkAllConditionBeforeAddingPackage('event_category',$request);
	  }elseif ($capacityStatus == 0 && $type !="all") {
	  	  $status = 0;
	  	  $msg = $this->checkAllConditionBeforeAddingPackage('event_capacity',$request);
	  }elseif ($budgetStatus == 2 && $type !="all") {
	  	  $status = 0;
	  	  $msg = $this->checkAllConditionBeforeAddingPackage('package_exist',$request); 	  
	    
	  }elseif ($budgetStatus == 0 && $type !="all") {
	  	  $status = 0;
	  	  $msg = $this->checkAllConditionBeforeAddingPackage('out_of_budget',$request);
	  }else{
	  	$status = 1;
	  }
 
	  return [
     	   'status' => $status,
       	   'records' => $events->eventCategories,
     	   'errors' => $msg
        ];
}

#-----------------------------------------------------------------------------------------
#  check deal package have related to user event
#-----------------------------------------------------------------------------------------  

public function checkCustomPackageExpiredOrAlreadBuy($package_id)
{
  $message =0;
  $status = 1;
   $pkg = VendorPackage::find($package_id);
   if($pkg->type == 1){
             $p = \App\Models\Vendors\CustomPackage::where('package_id',$package_id);
          if($p->count() > 0){

          	if($this->CustomPackageAlreadyBuy($p->first()) == 1){

                  if($this->SevenDayOldPackage($p->first()) == 0){
                     $message = 'CustomPackageExpired';
                     $status = 0;
                  } 
          	}else{
                $message = 'AlreadyUsedCustomPackage';
                $status = 0;
          	}

          }else{
              $message = 'CustomPackageDeleted';
              $status = 0;
		  } 
   }

   return ['status' => $status,'message' => $message];


}



public function SevenDayOldPackage($c)
{
	 $now = \Carbon\Carbon::now();
     return $status = ($c->updated_at->diffInDays($now) > 7) ? 0 : 1;
 
}

public function CustomPackageAlreadyBuy($c)
{
  $cont =  EventOrder::where('type','order')->where('user_id',Auth::user()->id)
                         ->where('package_id',$c->package_id)->count();
   
  return $cont > 0 ? 0 : 1;
}

#-----------------------------------------------------------------------------------------
#  check deal package have related to user event
#-----------------------------------------------------------------------------------------  

public function chackAlreadyBuyOrCart($evenTypeStatus,$events,$package_id,$type,$category=0)
{
	 if($evenTypeStatus == 1){
	 	    $package = VendorPackage::find($package_id);
            $order = $category == 0 ? $this->checkCategoryExistAccordingToEvent($package,$events) : $this->checkCategoryExistAccordingToCategory($package,$events);
            $exist = $order->where(function($t) use($type){
	                   if($type != null){
	                   	    $types = explode('&',$type);
	                      	$t->whereIn('type',$types);
	                   }
	          })->count();
         
         return $exist == 0 ? 1 : 0;
	 }
}


#-----------------------------------------------------------------------------------------
#  check deal package have related to user event
#-----------------------------------------------------------------------------------------  



public function PackageAndEventHaveSameCategory($evenTypeStatus,$events,$package_id)
{
 if($evenTypeStatus == 1){
     $package = VendorPackage::find($package_id);
     $event_category = UserEventMetaData::where('event_id',$events->id)
                                           ->where('key','category_id')
                                           ->where('type','events')
                                           ->where('key_value',$package->category_id)
                                           ->where('user_id',Auth::user()->id)
                                           ->count();

     return $event_category > 0 ? 1 : 0;
     
  }
  return 0;	 
}

#-----------------------------------------------------------------------------------------
#  Package And Event Capacity
#-----------------------------------------------------------------------------------------  


public function PackageAndEventCapacity($categoryStatus,$events,$package_id)
{
 if($categoryStatus == 1){
     $package = VendorPackage::find($package_id);

     $package_min_person_capacity = $package->min_person;
     $package_max_person_capacity = $package->max_person;

     $eventMinPersonCapacity = $events->min_person;
     $eventMaxPersonCapacity = $events->max_person;

     if($eventMaxPersonCapacity < $package_min_person_capacity || $eventMaxPersonCapacity > $package_max_person_capacity){
         $capacity = 0;  
     }else{
     	 $capacity = 1;
     }
     return $capacity;
   }
}


#-----------------------------------------------------------------------------------------
#  check deal package have related to user event
#-----------------------------------------------------------------------------------------  



public function PackageAndEventBudget($capacityStatus,$events,$request,$type='cart&order')
{
	if($capacityStatus == 1){
		$event_budget = $events->event_budget;
        $package = VendorPackage::find($request->package_id);

        $discounted = $this->CheckDealRelatedPackage($package,$request);
        $EvenOrder = $this->checkCategoryExistAccordingToEvent($package,$events,$discounted);

        $UsedBudget = $this->totalSpendEvent($events,Auth::user()->id);
        
        $includedWithPackage = ($discounted - $UsedBudget);

        $budgetStatus = $event_budget >= $includedWithPackage ? 1 : 0;

        $order = $EvenOrder->where(function($t) use($type){
        	           $types = explode('&',$type);
                       $t->whereIn('type',$types);
        })->count();
        return $EvenOrder->count() == 0 ? $budgetStatus : 2;
   }
	 
}


public function CheckDealRelatedPackage($package,$request)
{   
	$price = $package->price;
	 
	$percent = round($price / 100);
	$deal_id = !empty($request->deal_id) && $request->deal_id > 0 ? $request->deal_id : 0;

	 
    $deals = DiscountDeal::where('id',$deal_id)
                    ->orWhere(function($t) use($deal_id){
                    	     if($deal_id > 0):
                               $d = $t->where('id',$deal_id)->first();
                              if($d->deal_life == 1){
                                       $t->whereDate('start_date','<=',Carbon::now());
                                       $t->whereDate('expiry_date','>=',Carbon::now());
                               }
                              endif;
                    
                    })
                    //->where('type_of_deal',1)
                    ->where('packages',$package->id);
 
    if($deals->count() > 0 && $deals->first()->type_of_deal == 1){
       $deal = $deals->first();
	   $price = $deal->deal_off_type == 0 ? round(($price - ($deal->amount * $percent))) : ($price - $deal->amount);
	}

	return $price;
 
}

#----------------------------------------------------------------------------------------------------#
# check deal min package amount
#----------------------------------------------------------------------------------------------------#

public function checkDealMinAmountAccordingToPackage($pastStatus,$request)
{   
	$status = 0;
	if($pastStatus == 1){
		$package = VendorPackage::find($request->package_id);
		$price = $package->price;
		$deal_id = !empty($request->deal_id) && $request->deal_id > 0 ? $request->deal_id : 0;

		 
	    $deals = DiscountDeal::where('id',$deal_id);
	                          //->where('min_price','<',$price);

	    $d = $deals->first();
        if( $deal_id == 0){
         $status = 1;
        }elseif($deals->count() > 0 && $d->deal_off_type == 0){
          $status = 1;
        }elseif($deals->count() > 0 && $d->deal_off_type == 1 && $d->min_price <= $price){
          $status = 1;
        } 
		return $status;
   }
}

 
#-----------------------------------------------------------------------------------------
#  check deal package have related to user event
#-----------------------------------------------------------------------------------------  

public function checkAllConditionBeforeAddingPackage($errorType,$request=[])
{
	$msg = '';
	switch ($errorType) {
		case 'event_type':
			$msg= 'Your event type is not related to this package.';
			break;
        case 'hiedOnThesedate':
              $package = VendorPackage::find($request->package_id);
              $event_id = !empty($request->event_type) ? $request->event_type : $request->event_id;
              $event = \App\UserEvent::find($event_id);

             $dates = '(From <strong>'.date('Y-m-d',strtotime($event->start_date)).'</strong> To <strong>'.date('Y-m-d',strtotime($event->end_date)).'</strong>)';

			$msg= '<b>'.$package->business->title.'</b> is not availble on these dates '.$dates;
			break;

		case 'event_category':
		    $package = VendorPackage::find($request->package_id);
			$msg= 'You did not choosed <b>'.$package->business->category->label.'</b> category, In your current selected event!';
			break;
		
		case 'event_capacity':
		    $msg= 'Guest Capacity does not matched with your Events Package.';
			break;

		case 'CustomPackageExpired':
		    $msg= 'This package has been expired!';
			break;
		case 'AlreadyUsedCustomPackage':
		    $msg= 'The Custom Package already used by you.';
			break;
		case 'CustomPackageDeleted':
		    $msg= 'The Cistom Package is deleted by Vendor!';
			break;
		case 'package_exist':
		    $msg= 'You already have this package. Try with another Package.';
			break;

		case 'wishlist_package_success':
		    $msg= 'The Package has been added successfully in your Wishlist.';
			break;
        case 'event_category_exist_with_package_wishlist':
              $event_id = !empty($request->event_type) ? $request->event_type : $request->event_id;
              $msg = $this->checkActualCartWishList($event_id,$request->package_id,Auth::user()->id);
		   // $msg= 'The Package already exist in your Wishlist.';
			break;

	     case 'event_category_with_package_exist':
	        $event_id = !empty($request->event_type) ? $request->event_type : $request->event_id;
	        $msg = $this->checkActualCartWishList($event_id,$request->package_id,Auth::user()->id);
	        // $msg= 'This Package already Exist in your Cart or You have already buy this package for this event.';
			break;

        case 'event_category_exist_wishlist':
              $package = VendorPackage::find($request->package_id);
              $event_id = !empty($request->event_type) ? $request->event_type : $request->event_id;
              $msg = $this->checkActualCartWishList($event_id,$request->package_id,Auth::user()->id,$package->category_id);
		   // $msg= 'The Package already exist in your Wishlist.';
			break;

	     case 'event_category_exist':
	           $package = VendorPackage::find($request->package_id);
	        $event_id = !empty($request->event_type) ? $request->event_type : $request->event_id;
	        $msg = $this->checkActualCartWishList($event_id,$request->package_id,Auth::user()->id,$package->category_id);
	        // $msg= 'This Package already Exist in your Cart or You have already buy this package for this event.';
			break;
		case 'wishlist_package':
		    $msg= 'You already have this package in your wishlist. Try with another Package.';
			break;

	    case 'priceNotApplicable':
	               $deal_id = !empty($request->deal_id) && $request->deal_id > 0 ? $request->deal_id : 0;
                   $deals = DiscountDeal::where('id',$deal_id)->first();

                   $text = 'The <b>'.$deals->title.'</b> only for greater than amount: <b>$'.$deals->min_price.'</b>';
	        $msg= 'This deal is not applicable for this package. '.$text;
			break;
		case 'out_of_budget':
		     $package = VendorPackage::find($request->package_id);
             $packagePrice = $this->CheckDealRelatedPackage($package,$request);
             $event_id = !empty($request->event_type) ? $request->event_type : $request->event_id;
             $events = \App\UserEvent::where('id',$event_id);
             $event_budget = $events->count() > 0 ? $events->first()->event_budget : $request->event_type;

			$msg= 'Your Event Budget <b>($'.$event_budget.')</b> is low for this package <b>($'.$packagePrice.')</b>. Please increase the budget of your Event to proceed further.';
			break;
		
		default:
			# code...
			break;
	}

   return $msg;
	 

}














}