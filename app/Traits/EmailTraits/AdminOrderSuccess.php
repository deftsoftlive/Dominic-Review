<?php
namespace App\Traits\EmailTraits;
use Illuminate\Http\Request;
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use Session;
use App\Models\Vendors\DiscountDeal;
use App\Models\Order;
use App\User;
use App\CoachUploadPdf;
use App\Models\EventOrder;
use App\Models\Admin\EmailTemplate;
trait AdminOrderSuccess {




#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function AdminOrderSuccessOrderSuccess($order_id)
{
	$template_id = $this->emailTemplate['AdminOrderPlaced'];
  // $order = Order::with('orderItems','orderItems.vendor','orderItems.vendor.vendors')->where('id',$order_id)->first();

  $order = \DB::table('shop_orders')->where('id',$order_id)->first();


	return $this->AdminOrderSuccessSendEmail($order,$template_id);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function AdminOrderSuccessSendEmail($order,$template_id)
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

    $data = $this->AdminOrderSuccessHtml($order,$template);
    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------



public function AdminOrderSuccessHtml($order,$template)
{ 
    $banner = view('emails.order.shoppingBanner')->render();  
		$text2 = $template->body;
		$orderDetail = $this->AdminOrderSuccessDetail($order);
    $total = $this->AdminOrderSuccessTotals($order);

		$text = str_replace("{OrderDetail}",$orderDetail,$text2);
		$text = str_replace("{name}",$order->user->name,$text); 
    return $banner.$text.$total;
}

#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


public function AdminOrderSuccessDetail($order)
{
   return  view('emails.order.detail')->with('order',$order->orderItems)->render();
}

 

public function AdminOrderSuccessTotals($order)
{
   return  view('emails.order.admin_total')
   ->with('o',$order)
   ->with('order',$order->orderItems)
   ->render();
}


#---------------------------------------------------------------------------------------------------
#  Coach account - Verified/Not Verified
#---------------------------------------------------------------------------------------------------

public function VerifyCoachAccountSuccess($user_id)
{
  $template_id = $this->emailTemplate['VerifyCoachAccount'];
  $user = User::where('id',$user_id)->first(); 
  return $this->VerifyCoachAccountSendEmail($user,$template_id);
}

public function VerifyCoachAccountSendEmail($user,$template_id)
{
    $admin_email = getAllValueWithMeta('admin_email', 'general-setting'); 

    if($user->updated_status == 1)
    {
      $status = 'Verified';
    }else{
      $status = 'Not Verified';
    }

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $user->name,
           'email' => $user->email,
           'status' => $status
    ];
    $data = $this->VerifyCoachAccountHtml($arr,$user,$template); 

    $ar= ['data' => $data];

  return $this->sendNotification($view,$ar,$arr);
}

public function VerifyCoachAccountHtml($data,$req,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['name'],$text2);  
    $text = str_replace("{user_email}",$data['email'],$text);
    $text = str_replace("{status}",$data['status'],$text);

    // dd($data,$template);

    return $text;
}


#---------------------------------------------------------------------------------------------------
#  Invoice Approved/Not Approved
#---------------------------------------------------------------------------------------------------

public function InvoiceStatusSuccess($invoice_id)
{
  $template_id = $this->emailTemplate['InvoiceStatus'];
  $invoice = CoachUploadPdf::where('id',$invoice_id)->first(); 
  return $this->InvoiceStatusSendEmail($invoice,$template_id);
}

public function InvoiceStatusSendEmail($invoice,$template_id)
{
    if($invoice->status == 1)
    {
      $status = 'Approved';
    }else{
      $status = 'Not Approved';
    }

    $coach_name = getUsername($invoice->coach_id);
    $coach_email = getUseremail($invoice->coach_id);

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $coach_name,
           'email' => $coach_email,
           'status' => $status,
           'invoice_name' =>$invoice->invoice_name
    ];
    $data = $this->InvoiceStatusHtml($arr,$invoice,$template); 

    $ar= ['data' => $data];

  return $this->sendNotification($view,$ar,$arr);
}

public function InvoiceStatusHtml($data,$req,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['name'],$text2);  
    $text = str_replace("{user_email}",$data['email'],$text);
    $text = str_replace("{status}",$data['status'],$text);
    $text = str_replace("{invoice_name}",$data['invoice_name'],$text);

    // dd($data,$template);

    return $text;
}



}


 