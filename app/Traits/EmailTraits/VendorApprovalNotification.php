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
trait VendorApprovalNotification {







#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function VendorApprovalNotification($vendor)
{
	$template_id = $this->emailTemplate['VendorApprovalNotificationFullNotification'];
	 
	return $this->VendorApprovalNotificationSendEmail($vendor,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function VendorApprovalNotificationSendEmail($vendor,$template_id)
{
	$template = EmailTemplate::find($template_id);
    $view= 'emails.custom_email';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $vendor->name,
           'email' => $vendor->email
    ];
    $data = $this->VendorApprovalNotificationHtml($vendor,$template);

    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function VendorApprovalNotificationHtml($vendor,$template)
{ 
		$text2 = $template->body;
	    $text = str_replace("{name}",$vendor->name,$text2);
 return $text;
}








}














