<?php
namespace App\Traits\EmailTraits;
use Illuminate\Http\Request;
use App\User;
use Session;
use App\Models\Admin\EmailTemplate;
trait NewVendorEmail {




#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function NewVendorEmailSuccess($user)
{

  if($user->updated_status == 1){
       $template_id = $this->emailTemplate['NewVendorEmailNotificationFullNotification'];
  }else{
       $template_id = $this->emailTemplate['NewVendorEmailJoinNotificationFullNotification'];  
  }
  return $this->NewVendorEmailSendEmail($user,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function NewVendorEmailSendEmail($user,$template_id)
{
	  $template = EmailTemplate::find($template_id);
    $admin_email = getAllValueWithMeta('admin_email', 'general-setting'); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => 'Admin',
           'email' => $admin_email
    ];

    $data = $this->NewVendorEmailHtml($user,$template);
    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function NewVendorEmailHtml($user,$template)
{ 
    
		$text2 = $template->body;
		 
    $link = $this->getRedirectLinkToView($user);
		$text = str_replace("{name}",$user->name,$text2);
    $text = str_replace("{link}",$link,$text);
 return $text;
}

#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------
 
 

public function getRedirectLinkToView($user)
{
    $url =url(route('admin.vendor.detail',$user->id));

    return '<a href="'.$url.'">Click Here</a>';
}




}


 