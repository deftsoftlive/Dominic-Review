<?php
namespace App\Traits\EmailTraits;
use Illuminate\Http\Request;
use Auth;
use App\Models\Products\Product; 
use App\Models\Shop\ShopOrder;
use App\Models\Shop\ShopCartItems;
use Session;
use App\Models\Admin\EmailTemplate;
use App\Traits\EmailTraits\EmailTemplateTrait;
trait ShopProductOrderPlacedForVendor {

use EmailTemplateTrait;


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function ShopProductOrderPlacedForVendorSuccess($order_id)
{
	$template_id = $this->emailTemplate['ShopOrderPlacedVendorNotification'];
	$order = ShopOrder::where('id',$order_id)->first();
	return $this->ShopProductOrderPlacedForVendorSendEmail($order,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function ShopProductOrderPlacedForVendorSendEmail($order,$template_id)
{


              $vendor_ids = ShopCartItems::where('type','order')
                                               ->where('order_id',$order->id)
                                               ->groupBy('vendor_id')
                                               ->get();
 
    foreach ($vendor_ids as $v) {

            $vendor = \App\User::find($v->vendor_id);
            $orders = ShopCartItems::where('vendor_id',$vendor->id)
                                     ->where('type','order')
                                     ->where('order_id',$order->id)
                                     ->get();

            $template = EmailTemplate::find($template_id); 
            $view= 'emails.customEmail';
            $arr = [
                   'title' => $template->title,
                   'subject' => $template->subject,
                   'name' => $vendor->name,
                   'email' => $vendor->email
            ];
            $data = $this->ShopProductOrderPlacedForVendorHtml($orders,$order,$template,$vendor);
            $ar= ['data' => $data];
            return $this->sendNotification($view,$ar,$arr);
      
    }

 

}




// public function ShopProductOrderPlacedForVendorSendEmail($order,$template_id)
// {
// 	  $template = EmailTemplate::find($template_id);
//     $view= 'emails.customEmail';
//     $arr = [
//            'title' => $template->title,
//            'subject' => $template->subject,
//            'name' => $order->user->name,
//            'email' => $order->user->email
//     ];
//     $data = $this->ShopProductOrderPlacedForVendorHtml($order,$template);

//     $ar= ['data' => $data];
//    return $this->sendNotification($view,$ar,$arr);
// }


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function ShopProductOrderPlacedForVendorHtml($order,$o,$template,$vendor)
{ 
    $banner = view('emails.order.shoppingBanner')->render();
    $text2 = $template->body;
    $orderDetail = $this->ShopProductOrderPlacedForVendorDetail($order,$o);
    $total = $this->ShopProductOrderPlacedForVendorTotals($order,$o,$vendor);
    $text = str_replace("{OrderDetail}",$orderDetail,$text2);
    $text = str_replace("{name}",$vendor->name,$text);
 
 return $banner.$text.$total;
}



public function ShopProductOrderPlacedForVendorDetail($orders,$o)
{
   return $vv = view('emails.shop.orders.detail')->with('orders',$orders)->render();
}

 
public function ShopProductOrderPlacedForVendorTotals($order,$o,$vendor)
{
   return  view('emails.shop.orders.vendorTotal')
   ->with('orders',$order)
   ->with('order',$o)
   ->with('vendor_id',$vendor->id)
   ->render();
}





}


 

















