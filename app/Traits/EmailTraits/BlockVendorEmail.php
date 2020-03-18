<?php
namespace App\Traits\EmailTraits;
use Illuminate\Http\Request;
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\Order;
use App\Models\EventOrder;
use Session;
use App\Models\Admin\EmailTemplate;
trait BlockVendorEmail {




#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function BlockVendorEmailOrderSuccess($business)
{
	$template_id = $this->emailTemplate['BlockVendorEmailFullNotification'];
  
	return $this->BlockVendorEmailSendEmail($business,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function BlockVendorEmailSendEmail($business,$template_id)
{
	$template = EmailTemplate::find($template_id);
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $business->vendors->name,
           'email' => $business->vendors->email
    ];

    $data = $this->BlockVendorEmailHtml($business,$template);
    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function BlockVendorEmailHtml($business,$template)
{ 
    $banner = '';
		$text2 = $template->body;
		$text = str_replace("{businesName}",$business->title,$text2);
		$text = str_replace("{name}",$business->vendors->name,$text);
 return $text;
}

 


}


 