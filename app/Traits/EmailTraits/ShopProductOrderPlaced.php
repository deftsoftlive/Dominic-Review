<?php
namespace App\Traits\EmailTraits;
use Illuminate\Http\Request;
use Auth;
use App\Models\Products\Product; 
use App\Models\Shop\ShopOrder;
use Session;
use App\Models\Admin\EmailTemplate;
use App\Traits\EmailTraits\EmailTemplateTrait;
trait ShopProductOrderPlaced {

use EmailTemplateTrait;


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function ShopProductOrderPlacedSuccess($order_id)
{
	$template_id = $this->emailTemplate['ShopOrderPlacedNotification'];
	$order = ShopOrder::where('id',$order_id)->first();
	return $this->ShopProductOrderPlacedSendEmail($order,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function ShopProductOrderPlacedSendEmail($order,$template_id)
{
	$template = EmailTemplate::find($template_id);
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $order->user->name,
           'email' => $order->user->email
    ];
    $data = $this->ShopProductOrderPlacedHtml($order,$template);

    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function ShopProductOrderPlacedHtml($order,$template)
{ 
    $banner = view('emails.order.shoppingBanner')->render();
    $text2 = $template->body;
    $orderDetail = $this->ShopProductOrderPlacedDetail($order);
    $total = $this->ShopProductOrderPlacedTotals($order);
    $text = str_replace("{OrderDetail}",$orderDetail,$text2);
    $text = str_replace("{name}",$order->user->name,$text);
 
 return $banner.$text.$total;
}



public function ShopProductOrderPlacedDetail($order)
{
   return $vv = view('emails.shop.orders.detail')->with('orders',$order->orderItems)->render();
}

 
public function ShopProductOrderPlacedTotals($order)
{
   return  view('emails.shop.orders.totals')
   ->with('orders',$order->orderItems)
   ->with('order',$order)
    
   ->render();
}





}


 

















