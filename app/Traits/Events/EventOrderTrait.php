<?php
namespace App\Traits\Events;
use Illuminate\Http\Request;
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\EventOrder;

trait EventOrderTrait {


#--------------------------------------------------------------------
#--------------------------------------------------------------------
#--------------------------------------------------------------------
 
public function checkCategoryExistAccordingToEvent($package,$events,$discounted=null)
{  
    
    $order = EventOrder::where('package_id',$package->id)
                       ->where('user_id',Auth::user()->id)
                       ->where('event_id',$events->id);
    return $order;
   
}


#--------------------------------------------------------------------
#--------------------------------------------------------------------
#--------------------------------------------------------------------
 
public function checkCategoryExistAccordingToCategory($package,$events)
{  
    
    $order = EventOrder::where('category_id',$package->category_id)
                       ->where('user_id',Auth::user()->id)
                       ->where('event_id',$events->id);
    return $order;
   
}
#--------------------------------------------------------------------
# total Spend on the Event
#--------------------------------------------------------------------
 

public function totalSpendEvent($events,$user_id,$type=null)
{  
    
    $order = EventOrder::where('user_id',$user_id)
                       ->where('event_id',$events->id)
                       ->where(function($t) use($type){
                       	    if($type != null){
                       	    	$t->where('type',$type);
                       	    }
                       })
                       ->where('type','!=','whishlist');
    return $order->sum('discounted_price');
   
}

#--------------------------------------------------------------------
# total Spend on the Event
#--------------------------------------------------------------------
 


public function orderRelatedTableBackup($events,$package,$request)
{
	 $package_data = $package;
	 $event_data = $events;
	 $deal_data = $this->getDealJson($request);



	 return [
          'package_data' => $package_data,
          'event_data' => $event_data,
          'deal_data' => $deal_data

	 ];

}



public function getDealJson($request)
{
	$deal_id = !empty($request->deal_id) && $request->deal_id > 0 ? $request->deal_id : 0;

	$deals = DiscountDeal::find($deal_id);

	return !empty($deals) ? $deals : [];
	                      
}





#---------------------------------------------------------------------------
# check Actual Cart WishList
#---------------------------------------------------------------------------

public function checkActualCartWishList($event_id,$package_id,$user_id,$category_id = 0)
{
      $order = EventOrder::where('user_id',$user_id)
                          ->where('event_id',$event_id);
                          //->orWhere(function($t) use($package_id,$c))
                          if($category_id == 0){
                             $order->where('package_id',$package_id);
                          }else{
                             $order->where('category_id',$category_id);
                          }
        $msg = '';
        if($order->count()){
            $order = $order->get();
            
            foreach ($order as $key => $ord) {
               $msg .= $this->getMessageExistOrder($ord,$category_id);
            }
            
          
        }                              
     return $msg;
}



public function getMessageExistOrder($order,$category_id)
{  
           $msg ='';
            
           $packageStatus = $category_id > 0 ? "The <b>".$order->category->label."'s Package</b>" : "The ".$order->package->title;

           if($order->type == "cart"){
               $msg .= "<li>$packageStatus already exist in your cart for <b>(".$order->event->title.")</b> Event.</li>";
            }

            if($order->type == "order"){
              $msg .="<li>You have already buy $packageStatus for <b>(".$order->event->title.")</b> Event</li>";
            }

            if($order->type == "wishlist"){
              $msg .="<li>$packageStatus already exist in your wishlist for <b>(".$order->event->title.")</b> Event</li>";
            }
         return $msg;
}












}