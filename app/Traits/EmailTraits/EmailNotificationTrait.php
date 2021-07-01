<?php
namespace App\Traits\EmailTraits;
use Illuminate\Http\Request;
use App\Traits\EmailTraits\EmailTemplateTrait;
use App\Traits\EmailTraits\UserNotificationTrait;
 
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\EventOrder;
use Session;
use App\Models\Admin\EmailTemplate;
trait EmailNotificationTrait {


use EmailTemplateTrait;
use UserNotificationTrait;

#----------------------------------------------------------------------------------------------
# 
#----------------------------------------------------------------------------------------------

// Send email
public function sendNotification($emailTeplate,$data,$arr)
{
  if(!empty($arr['email']))
  {
        
    \Mail::send($emailTeplate,$data, function($message) use($arr) {
               $message->to($arr['email'], $arr['name'])
               ->subject($arr['subject']);
               
    });
    return 1;
  }  
}

// For information email
public function sendNotificationInfo($emailTeplate,$data,$arr)
{
  if(!empty($arr['email']))
  {
    \Mail::send($emailTeplate,$data, function($message) use($arr) {
               $message->to($arr['email'], $arr['user_id'])
               ->subject($arr['subject']);
               
    });
    return 1;
  }
}

// For subscribers email
public function send_subscribers_email($emailTeplate,$data,$arr)
{
    // dd($emailTeplate,$data,$arr['email']);

      if(!empty($arr['email']))
      {
        \Mail::send($emailTeplate,$data, function($message) use($arr) {
               $message->to($arr['email'], '')
               ->subject($arr['subject']);
               
        });
      } 

   
    return 1;
}

}