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
trait UserOrderSuccess {




#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function userOrderSuccessOrderSuccess($order_id)
{
	$template_id = $this->emailTemplate['UserOrderSuccessFullNotification'];
	$order = Order::with('orderItems','orderItems.package','user')->where('id',$order_id)->first();
	return $this->userOrderSuccessSendEmail($order,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function userOrderSuccessSendEmail($order,$template_id)
{
	$template = EmailTemplate::find($template_id);
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $order->user->name,
           'email' => $order->user->email
    ];
    $data = $this->userOrderSuccessHtml($order,$template);

    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function userOrderSuccessHtml($order,$template)
{ 
    $banner = view('emails.order.shoppingBanner')->render();
    $text2 = $template->body;
    $orderDetail = $this->userOrderSuccessOrderDetail($order);
    $total = $this->userOrderSuccessTotals($order);
    $text = str_replace("{OrderDetail}",$orderDetail,$text2);
    $text = str_replace("{name}",$order->user->name,$text);
 
 return $banner.$text.$total;
}



public function userOrderSuccessOrderDetail($order)
{
   return $vv = view('emails.order.detail')->with('order',$order->orderItems)->render();
}

 
public function userOrderSuccessTotals($order)
{
   return  view('emails.order.user_total')
   ->with('o',$order)
   ->with('order',$order->orderItems)
   ->render();
}





}


 