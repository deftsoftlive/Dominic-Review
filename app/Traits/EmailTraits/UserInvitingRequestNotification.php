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
trait UserInvitingRequestNotification {







#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function UserInvitingRequestNotification($vendor)
{
	$template_id = $this->emailTemplate['UserInvitingRequestNotificationFullNotification'];
	 
	return $this->UserInvitingRequestNotificationSendEmail($vendor,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function UserInvitingRequestNotificationSendEmail($vendor,$template_id)
{
	 $template = EmailTemplate::find($template_id);
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $vendor->name,
           'email' => $vendor->email
    ];
    $data = $this->UserInvitingRequestNotificationHtml($vendor,$template);

    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function UserInvitingRequestNotificationHtml($vendor,$template)
{ 
		  $text2 = $template->body;
     
      $text = str_replace("{name}",$vendor->name,$text2);
       

      $vv = view('emails.invite.userInvite')->with('data',$text)->render();
	     
 return $vv;
}








}














