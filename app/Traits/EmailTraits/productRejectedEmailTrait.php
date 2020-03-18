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
trait productRejectedEmailTrait {







#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function productRejectedEmailTrait($product)
{
	$template_id = $this->emailTemplate['productRejectedEmailTraitFullNotification'];
	return $this->productRejectedEmailTraitSendEmail($product,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function productRejectedEmailTraitSendEmail($product,$template_id)
{
	$template = EmailTemplate::find($template_id);
    $view= 'emails.custom_email';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $product->user->name,
           'email' => $product->user->email
    ];
    
    $data = $this->productRejectedEmailTraitHtml($product,$template);
    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function productRejectedEmailTraitHtml($product,$template)
{ 
	$text2 = $template->body;
    $text = str_replace("{name}",$product->user->name,$text2);
    $text = str_replace("{shopName}",$product->shop->name,$text);
    $text = str_replace("{productName}",$product->name,$text);
    $text = str_replace("{reasons}",$product->RejectionReason->reason,$text);
	
	return $text;
}








}































