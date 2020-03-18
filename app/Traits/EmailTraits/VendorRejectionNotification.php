<?php
namespace App\Traits\EmailTraits;
use Illuminate\Http\Request;
use App\User;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\Order;
use App\Models\EventOrder;
use Session;
use App\Models\Admin\EmailTemplate;
trait VendorRejectionNotification {

 
#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function VendorRejectionNotification($vendor,$detail)
{
  $template_id = $this->emailTemplate['VendorRejectionNotificationFullNotification'];
	return $this->VendorRejectionNotificationSendEmail($vendor,$template_id,$detail);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function VendorRejectionNotificationSendEmail($vendor,$template_id,$detail)
{
	$template = EmailTemplate::find($template_id);
    $view= 'emails.custom_email';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $vendor->name,
           'email' => 'bajwa8360854880@gmail.com',//$vendor->email
    ];
    $data = $this->VendorRejectionNotificationHtml($vendor,$template,$detail);

    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function VendorRejectionNotificationHtml($vendor,$template,$detail)
{ 
      $text ='';
      $text2 = $template->body;
      $text = str_replace("{detail}",$detail,$text2);
      $text = str_replace("{name}",$vendor->name,$text);
	    $text = str_replace("{link}",$this->createRedirectLink($vendor),$text);
      return $text;
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------

public function createRedirectLink($vendor)
{
    $link = url(route('vendor.update',$vendor->custom_token));
    return '<a href="'.$link.'">Click Here</a>';
}

#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



}














