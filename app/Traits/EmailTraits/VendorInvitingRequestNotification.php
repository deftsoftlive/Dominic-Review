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
trait VendorInvitingRequestNotification {







#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function VendorInvitingRequestNotification($vendor)
{
	$template_id = $this->emailTemplate['VendorInvitingRequestNotificationFullNotification'];
	 
	return $this->VendorInvitingRequestNotificationSendEmail($vendor,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function VendorInvitingRequestNotificationSendEmail($vendor,$template_id)
{
	 $template = EmailTemplate::find($template_id);
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $vendor->name,
           'email' => $vendor->email
    ];
    $data = $this->VendorInvitingRequestNotificationHtml($vendor,$template);

    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function VendorInvitingRequestNotificationHtml($vendor,$template)
{ 
		  $text2 = $template->body;
     
      $text = str_replace("{name}",$vendor->name,$text2);
      $text = str_replace("{business}",$vendor->business_name,$text);

      $vv = view('emails.invite.index')->with('data',$text)->render();
	     
 return $vv;
}








}














