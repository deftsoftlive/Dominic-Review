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
trait ProductApprovedEmailTrait {







#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function ProductApprovedEmailTrait($product)
{
	$template_id = $this->emailTemplate['ProductApprovedEmailTraitFullNotification'];
	return $this->ProductApprovedEmailTraitSendEmail($product,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function ProductApprovedEmailTraitSendEmail($product,$template_id)
{
	$template = EmailTemplate::find($template_id);
    $view= 'emails.custom_email';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $product->user->name,
           'email' => $product->user->email
    ];
    
    $data = $this->ProductApprovedEmailTraitHtml($product,$template);
    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function ProductApprovedEmailTraitHtml($product,$template)
{ 
	$text2 = $template->body;
    $text = str_replace("{name}",$product->user->name,$text2);
    $text = str_replace("{shopName}",$product->shop->name,$text);
    $text = str_replace("{productName}",$product->name,$text);
    
	
	return $text;
}








}































