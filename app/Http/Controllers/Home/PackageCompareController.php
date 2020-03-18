<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\CustomChatTrait\CustomChatMessage as CustomChat;
use App\Models\Vendors\Chat;
use App\Models\Vendors\ChatMessage;
use App\VendorPackage;
use App\VendorCategory;
use Auth;
use App\Models\Vendors\CustomPackage;
use App\Traits\EmailTraits\EmailNotificationTrait;
class PackageCompareController extends Controller
{
    
use CustomChat;
use EmailNotificationTrait;

#-----------------------------------------------------------------------------------
# index 
#-----------------------------------------------------------------------------------

public function index(Request $request)
{
  if(@sizeof($request->categories)){

   $packages = VendorPackage::whereIn('id',$request->categories);
   $view = $request->type == 1 ? 'home.includes.comparePackages.list' : 'home.includes.comparePackages.boxes';
   $vv = view($view)->with('packages',$packages)->render();

  }else{
  	$vv = '';
  }
 
	return response()->json(
		[
         'status' => 1,
         'htm' => $vv
		]);
}





#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------

public function sendMessages(Request $request,$id)
{
   if(!Auth::check()){
      $status = ['status' => 2,'message' => 'Please login with customer account.'];
   }elseif(Auth::check() && Auth::user()->role != "user"){
      $status = ['status' => 3,'message' => 'You are also Logged in as Vendor, to send message to vendor you have to login with customer account.'];
   }else{

      $status = $this->upcomingEvents($request,$id);
      
   }
   
 
  return response()->json($status);


}


#----------------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------------


public function upcomingEvents($request,$id)
{    
      $vendor = VendorCategory::find($id);
      if($request->request_for == 2 && empty($request->event)){
          $vv = view('home.includes.business-detail.customPackageForm')
              ->with('vendor',$vendor)
              ->with('request',$request);
          $status = ['status' => 4, 'htm' => $vv->render()];
      }else{
         
          $status = $this->createMessageforChat($vendor,$request);
      }
  
      return $status;
}



public function createMessageforChat($business,$request)
{
       $msg = "Your Pricing request has been sent successfully!";
      // $box = $this->CreateCustomPackage($request,$business);
       $message = [
                    'message' => $this->CustomChatMessageBox($request),
                    'pkg' => 0
                  ];
       $emailType = 0;
       $emaiData = [
          'vendor_name' => $business->vendors->name,
          'vendor_email' => $business->vendors->email,
          'user_name' => Auth::user()->name,
          'user_email' => Auth::user()->email
       ];



        
       $data = [
           'vendor_id' => $business->user_id,
           'sender_id' => Auth::user()->id,
           'receiver_id' => $business->user_id,
           'deal_id' => 0,
           'business_id' => $business->id,
           'type' => 1,
        ];

       if($request->request_for == 2){
           $box = $this->CreateCustomPackage($request,$business);
           $msg = "Your Custom package is created successfully and sent to vendor, please wait for vendor revert.";
           $emailType = 1;
           $message['pkg'] = $box;
       }

       $data['message'] = json_encode($message);

       $chat = $this->sendCustomChatMessage($data,1);
       $chat_id = $chat->chat_id;
       $url = url(route('myCategoryChat',$business->category->slug)).'?activeList='.$chat->chat_id;

       $emaiData['message'] = json_encode($message);
       $emaiData['url'] = $url;
       $emaiData['type'] = 1;
       $emaiData['id'] = $chat->id;

       $status = $this->PricingRequestEmailSuccess($emaiData);

        $link = url(route('deal_discount_chats')).'?chat_id='.$chat_id;
 return $status = ['status' => $status, 'message' => $msg, 'url' => $link];

}






#----------------------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------------------

public function CreateCustomPackage($request,$vendor)
{

    $amenities = !empty($request->amenities) ? json_encode($request->amenities) : '';
    $events = !empty($request->events) ? json_encode($request->events) : '';
    $games = !empty($request->games) ? json_encode($request->games) : '';

    $c=new CustomPackage;
    $c->title = $request->title;
    $c->category_id = $vendor->category_id;
    $c->user_id = Auth::user()->id;
    $c->vendor_id = $vendor->user_id;
    $c->business_id = $vendor->id;
    $c->price = $request->price;
    $c->min_person = $request->min_person;
    $c->max_person = $request->max_person;
    $c->amenities = $amenities;
    $c->events = $events;
    $c->games = $games;
    $c->save();

    return $c->id;

}

#----------------------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------------------


public function createCustomPackageBox($c)
{
  $text ='<div class="cstm-pkg-card">';
  $text .='<div class="cstm-pkg-btn"><span class="blink-text">Custom Package</span></div>';
  $text .='<div class="cstm-pkg-heading">'.$c->title.'</div>';
  $text .='<div class="cstm-pkg-inn-detail">';
  $text .='<ul>';
  $text .='<li>'.$c->category->label.'</li>';
  $text .='<li><i class="fa fa-users"></i> Guest Capacity <b>'.$c->min_person.' To '.$c->max_person.'</b></li>';
  // $text .='<li>2-3 Games with Prizes</li>';
  // $text .='<li>Sadh for Bride</li>';
  $text .='<li><h1 class="cstmpkg-price">$'.custom_format($c->price,2).' / BUDGET</h1></li>';
  $text .='</ul>';
  $text .='</div>';
  $text .='<ul class="button-grp-wrap mt-3">';
  $text .='<li>';
  $text .='<a href="'.url("/").'" data-toggle="tooltip" title="More Detail" class="icon-btn"><i class="fa fa-eye"></i>';
  $text .='</a>';
  $text .='</li>';

  $text .='</ul>';
  $text .='</div>';
  return $text;
}





}
