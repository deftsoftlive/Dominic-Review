<?php
namespace App\Traits\EmailTraits;
use Illuminate\Http\Request;
use App\User;
use Session;
use App\Models\Admin\EmailTemplate;
trait PricingRequestEmail {




#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function PricingRequestEmailSuccess($data)
{

  $template_id = $data['type'] == 1 ? $this->emailTemplate['CustomPackageRequestEmailNotificationFullNotification'] : $this->emailTemplate['PricingRequestEmailNotificationFullNotification'];
   
  return $this->PricingRequestEmailSendEmail($data,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function PricingRequestEmailSendEmail($data,$template_id)
{
	  $template = EmailTemplate::find($template_id);
    $view= 'emails.customEmail';

      $arr = [
             'title' => $template->title,
             'subject' => $template->subject,
             'name' => $data['vendor_name'],
             'email' => $data['vendor_email']
      ];
       $link = $this->checkPricingRedirectLinks($data['url']);
       $msg = $this->PricingRequestEmailHtml($data,$template);
       $ar= ['data' => $msg.$link];
   if($this->sendNotification($view,$ar,$arr) == 1){
       return $this->PricingRequestEmailSendEmailToAdmin($msg,$template);
   }
}


public function PricingRequestEmailSendEmailToAdmin($data,$template)
{
     
    $view= 'emails.customEmail';

    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => 'Admin',
           'email' => $this->adminEmail
    ];
  
    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}

#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------
 


public function PricingRequestEmailHtml($data,$template)
{ 

    $message = view('emails.chat.quote')->with('id',$data['id'])->render();
    $text2 = $template->body;
		$text = str_replace("{name}",$data['vendor_name'],$text2);
		$text = str_replace("{username}",$data['user_name'],$text);
    $text = str_replace("{message}",$message,$text);
    return $text;
}

#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------
 

public function checkPricingRedirectLinks($url)
{
     //return '<a href="'.$url.'">Click Here</a>';
}

  
}


 