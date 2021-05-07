<?php
namespace App\Traits\EmailTraits;
use Illuminate\Http\Request;
use Auth;
use App\Models\Products\Product; 
use App\Models\Shop\ShopOrder;
use Session;
use App\User;
use App\SetGoal;
use App\ParentCoachReq;
use App\PlayerReport;
use App\MatchReport;
use App\CoachUploadPdf;
use App\ContactDetail;
use App\CoachDocument;
use App\Models\Admin\EmailTemplate;
use App\Traits\EmailTraits\EmailTemplateTrait;
trait ShopProductOrderPlaced {

use EmailTemplateTrait;


#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------

// Order Email
public function ShopProductOrderPlacedSuccess($order_id)
{
	$template_id = $this->emailTemplate['ShopOrderPlacedNotification'];
	$order = ShopOrder::where('id',$order_id)->first();
	return $this->ShopProductOrderPlacedSendEmail($order,$template_id);
}

// Information Email
public function ShopProductOrderPlacedInfo($order_id)
{
  $template_id = $this->emailTemplate['OrderPlacedInformation'];
  $order = ShopOrder::where('id',$order_id)->first(); 
  return $this->ShopProductOrderPlacedInfoSendEmail($order,$template_id);
}

/* -------------custom email template by SB for package courses---------- */

public function SendInfoPackageCourses( $parentId, $bookingNo )
{
  $template_id = $this->emailTemplate['OrderPlacedInformationPackageCourses'];

  $template = EmailTemplate::find( $template_id ); 
  //dd( $template );
  $user_name = getUsername( $parentId );
  $email = getUseremail( $parentId );
  $view= 'emails.customEmail';
  $arr = [
         'title' => $template->title,
         'subject' => $template->subject,
         'user_id' => $user_name,
         'email' => $email,
  ];

  $data = $this->InfoHtmlPackageCourses( $user_name, $bookingNo, $template_id );

  $ar= ['data' => $data]; 
   return $this->sendNotificationInfo($view,$ar,$arr);

}



#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------

// Order Email
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

// Information Email
public function ShopProductOrderPlacedInfoSendEmail($order,$template_id)
{
  $template = EmailTemplate::find($template_id); 
  $user_name = getUsername($order->user_id);

    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'user_id' => $user_name,
           'email' => $order->user->email,
           'orderID' => $order->orderID
    ];

    // dd($arr); 

    $data = $this->ShopProductOrderPlacedInfoHtml($order,$arr,$template);

    $ar= ['data' => $data]; 
   return $this->sendNotificationInfo($view,$ar,$arr);
}



#---------------------------------------------------------------------------------------------------
#  Order Success
#---------------------------------------------------------------------------------------------------


// Order Email
public function ShopProductOrderPlacedHtml($order,$template)
{ 
  //dd($order);
    $banner = view('emails.order.shoppingBanner')->render();
    $text2 = $template->body;
    $orderDetail = $this->ShopProductOrderPlacedDetail($order);
    $total = $this->ShopProductOrderPlacedTotals($order);
    $text = str_replace("{OrderDetail}",$orderDetail,$text2);
    $text = str_replace("{name}",$order->user->name,$text);
 
 return $banner.$text.$total;
}

// Information Email
public function ShopProductOrderPlacedInfoHtml($order,$data,$template)
{ 
    $order = \DB::table('shop_orders')
            ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
            ->leftjoin('courses', 'shop_cart_items.product_id', '=', 'courses.id')
            ->select('courses.*','shop_cart_items.*','shop_orders.*')
            ->where('shop_orders.orderID',$order->orderID)
            ->first(); 

    $text2 = $template->body;

    $orderInfo = $this->ShopProductOrderPlacedInfoDetail($order);
    $text = str_replace("{OrderInfo}",$orderInfo,$text2);
    $text = str_replace("{name}",$data['user_id'],$text);      

      // $text = str_replace("{course_name}",$or->title,$text2);  
      // $text = str_replace("{location}",$or->location,$text);  
      // $text = str_replace("{day_time}",$or->day_time,$text);
      // $text = str_replace("{age_group}",$or->age_group,$text);
      // $text = str_replace("{session_date}",$or->session_date,$text);
      // $text = str_replace("{more_info}",strip_tags(htmlspecialchars_decode($or->more_info)),$text);

    return $text.'<br/>';
}


public function InfoHtmlPackageCourses( $user_name, $bookingNo, $template_id )
{ 
  $get_package = \DB::table('package_courses')->where('booking_no',$bookingNo)->first(); 

  $child = isset($get_package->player_id) ? getUsername($get_package->player_id) : getUsername($get_package->parent_id);
  $template = EmailTemplate::find( $template_id ); 

  $text2 = $template->body;

  $packageInfo = $this->InfoDetailPackageCourse( $bookingNo );
  $text = str_replace("{PackageInfo}",$packageInfo,$text2);
  $text = str_replace("{name}",$user_name,$text);
  $text = str_replace("{child}",$child,$text);

    // $text = str_replace("{course_name}",$or->title,$text2);  
    // $text = str_replace("{location}",$or->location,$text);  
    // $text = str_replace("{day_time}",$or->day_time,$text);
    // $text = str_replace("{age_group}",$or->age_group,$text);
    // $text = str_replace("{session_date}",$or->session_date,$text);
    // $text = str_replace("{more_info}",strip_tags(htmlspecialchars_decode($or->more_info)),$text);

  return $text.'<br/>';
}


public function ShopProductOrderPlacedInfoDetail($order)
{
  return $vv = view('emails.shop.orders.information')->with('orders',$order)->render();
}

public function InfoDetailPackageCourse( $bookingNo )
{
  return $vv = view('emails.packagecourse')->with( 'booking_no',$bookingNo )->render();
}


// Order Email
public function ShopProductOrderPlacedDetail($order)
{

  if($order->payment_by == 'STRIPE')
  {
    if(count($order->orderItems)>0)
    {
      return $vv = view('emails.shop.orders.detail')->with('orders',$order->orderItems)->render(); 
    }else{
      return $vv = view('emails.shop.orders.order_email')->with('orders',$order)->render();
    }
    
  }
  else
  { 
    return $vv = view('emails.shop.orders.order_email')->with('orders',$order)->render(); 
  }

}

// Order Email 
public function ShopProductOrderPlacedTotals($order)
{
   return  view('emails.shop.orders.totals')
   ->with('orders',$order->orderItems)
   ->with('order',$order)
    
   ->render();
}


#---------------------------------------------------------------------------------------------------
#  Registration Email
#---------------------------------------------------------------------------------------------------

public function RegisterUserSuccess($user_id)
{
  $template_id = $this->emailTemplate['UserRegistration'];
  $user = User::where('id',$user_id)->first();  
  return $this->RegisterUserSendEmail($user,$template_id);
}

public function RegisterUserSendEmail($user,$template_id)
{
  $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $user->name,
           'email' => $user->email
    ];

    $data = $this->RegisterUserHtml($user,$template);

    $ar= ['data' => $data];
   return $this->sendNotification($view,$ar,$arr);
}

public function RegisterUserHtml($data,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['name'],$text2);  
    $text = str_replace("{user_email}",$data['user_email'],$text);

    return $text;
}

#---------------------------------------------------------------------------------------------------
#  Coach submit a report
#---------------------------------------------------------------------------------------------------

public function CoachSubmitReportSuccess($report_id)
{
  $template_id = $this->emailTemplate['CoachSubmitReport'];
  $report = PlayerReport::where('id',$report_id)->first(); 
  return $this->CoachSubmitReportSendEmail($report,$template_id);
}

public function CoachSubmitReportSendEmail($report,$template_id)
{
    $parent = User::where('id',$report->player_id)->first();
    $coach = User::where('id',$report->coach_id)->first();

    if(!empty($parent->parent_id))
    {
      $parent_name = getUsername($parent->parent_id);
      $parent_email = getUseremail($parent->parent_id);
    }else{
      $parent_name = getUsername($parent->id);
      $parent_email = getUseremail($parent->id);
    }

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $parent_name,
           'email' => $parent_email,
           'player' => $parent->name,
           'coach' => $coach->name,
           'course' => isset($report->course_id) ? getCourseName($report->course_id) : '-',
           'season' => isset($report->course_id) ? getSeasonname($report->season_id) : '-'
    ];
    $data = $this->CoachSubmitReportHtml($arr,$report,$template); 

    $ar= ['data' => $data];

  return $this->sendNotification($view,$ar,$arr);
}

public function CoachSubmitReportHtml($data,$report,$template)
{ 
  // dd($data);
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['name'],$text2);  
    $text = str_replace("{user_email}",$data['email'],$text);
    $text = str_replace("{player}",$data['player'],$text);
    $text = str_replace("{coach}",$data['coach'],$text);
    $text = str_replace("{course}",$data['course'],$text);
    $text = str_replace("{season}",$data['season'],$text);

    // dd($data,$template);

    return $text;
}

#---------------------------------------------------------------------------------------------------
#  Coach accept/denied link request
#---------------------------------------------------------------------------------------------------

public function CoachLinkRequestSuccess($req_id)
{
  $template_id = $this->emailTemplate['CoachLinkRequest'];
  $req = ParentCoachReq::where('id',$req_id)->first(); 
  return $this->CoachLinkRequestSendEmail($req,$template_id);
}

public function CoachLinkRequestSendEmail($req,$template_id)
{
    $parent = getUsername($req->parent_id);
    $child = getUsername($req->child_id);
    $coach = getUsername($req->coach_id);

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $parent,
           'email' => getUseremail($req->parent_id),
           'parent' => $parent,
           'player' => $child,
           'coach' => $coach,
           'status' => $req->status,
           'reason' => $req->reason_of_rejection
    ];
    $data = $this->CoachLinkRequestHtml($arr,$req,$template); 

    $ar= ['data' => $data];

  return $this->sendNotification($view,$ar,$arr);
}

public function CoachLinkRequestHtml($data,$req,$template)
{ 
    if($data['status'] == 1)
    {
      $status = 'Accepted';
    }else{
      $status = 'Not Accepted';
    }

    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['name'],$text2);  
    $text = str_replace("{user_email}",$data['email'],$text);
    $text = str_replace("{parent}",$data['parent'],$text);
    $text = str_replace("{player}",$data['player'],$text);
    $text = str_replace("{coach}",$data['coach'],$text);
    $text = str_replace("{status}",$status,$text);
    $text = str_replace("{reason}",$data['reason'],$text);

    // dd($data,$template);

    return $text;
}

#---------------------------------------------------------------------------------------------------
#  New Coach Request
#---------------------------------------------------------------------------------------------------

public function NewCoachRequestSuccess($user_id)
{
  $template_id = $this->emailTemplate['NewCoachRequest'];
  $user = User::where('id',$user_id)->first(); 
  return $this->NewCoachRequestSendEmail($user,$template_id);
}

public function NewCoachRequestSendEmail($user,$template_id)
{
    $admin_email = getAllValueWithMeta('admin_email', 'general-setting'); 
    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'user_name' => $user->name,
           'user_email' => $user->email,
           'name' => 'Admin',
           'email' => $admin_email
    ];
    $data = $this->NewCoachRequestHtml($arr,$user,$template); 

    $ar= ['data' => $data];

  return $this->sendNotification($view,$ar,$arr);
}

public function NewCoachRequestHtml($data,$req,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['user_name'],$text2);  
    $text = str_replace("{user_email}",$data['user_email'],$text);

    // dd($data,$template);

    return $text;
}


#---------------------------------------------------------------------------------------------------
#   Linked player uploaded a goal
#---------------------------------------------------------------------------------------------------

public function LinkedPlayerUploadGoalSuccess($goal_id)
{
  $template_id = $this->emailTemplate['LinkedPlayerUploadGoal'];
  $goal = SetGoal::where('id',$goal_id)->first(); 
  return $this->LinkedPlayerUploadGoalSendEmail($goal,$template_id);
}

public function LinkedPlayerUploadGoalSendEmail($goal,$template_id)
{
    $parent = getUsername($goal->parent_id);
    $parent_email = getUseremail($goal->parent_id);
    $child = getUsername($goal->player_id);
    $coach_name = isset($goal->coach_id) ? getUsername($goal->coach_id) : '';
    $coach_email = isset($goal->coach_id) ? getUseremail($goal->coach_id) : '';

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $coach_name,
           'email' => $coach_email,
           'parent' => $parent,
           'parent_email' => $parent_email,
           'child' => $child
    ];
    $data = $this->LinkedPlayerUploadGoalHtml($arr,$goal,$template); 

    $ar= ['data' => $data];

    // dd($arr,$ar);

  return $this->sendNotification($view,$ar,$arr);
}

public function LinkedPlayerUploadGoalHtml($data,$goal,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['name'],$text2);  
    $text = str_replace("{user_email}",$data['email'],$text);
    $text = str_replace("{parent}",$data['parent'],$text);  
    $text = str_replace("{child}",$data['child'],$text);

    // dd($data,$template);

    return $text;
}


#---------------------------------------------------------------------------------------------------
#  New Invoice
#---------------------------------------------------------------------------------------------------

public function NewInvoiceSuccess($invoice_id)
{
  $template_id = $this->emailTemplate['NewInvoiceByCoach'];
  $invoice = CoachUploadPdf::where('id',$invoice_id)->first(); 
  return $this->NewInvoiceSendEmail($invoice,$template_id);
}

public function NewInvoiceSendEmail($invoice,$template_id)
{
    $coach_name = getUsername($invoice->coach_id);
    $coach_email = getUseremail($invoice->coach_id);

    $admin_email = getAllValueWithMeta('admin_email', 'general-setting'); 

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => 'Admin',
           'email' => $admin_email,
           'coach_name' => $coach_name,
           'coach_email' => $coach_email,
           'invoice_name' =>$invoice->invoice_name
    ];
    $data = $this->NewInvoiceStatusHtml($arr,$invoice,$template); 

    $ar= ['data' => $data];

    // dd($ar,$arr);

  return $this->sendNotification($view,$ar,$arr);
}

public function NewInvoiceStatusHtml($data,$req,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['coach_name'],$text2);  
    $text = str_replace("{user_email}",$data['coach_email'],$text);
    $text = str_replace("{invoice_name}",$data['invoice_name'],$text);

    // dd($data,$template);

    return $text;
}


#---------------------------------------------------------------------------------------------------
#  Book a taster class - Admin 
#---------------------------------------------------------------------------------------------------

public function BookATasterClassSuccess($contact_id)
{
  $template_id = $this->emailTemplate['BookATasterClass'];
  $contact = ContactDetail::where('id',$contact_id)->first(); 
  return $this->BookATasterClassSendEmail($contact,$template_id);
}

public function BookATasterClassSendEmail($contact,$template_id)
{
    $admin_email = getAllValueWithMeta('admin_email', 'general-setting'); 

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => 'Admin',
           'email' => $admin_email
    ];
    $data = $this->BookATasterClassStatusHtml($arr,$contact,$template); 

    $ar= ['data' => $data];

    // dd($ar,$arr);

  return $this->sendNotification($view,$ar,$arr);
}

public function BookATasterClassStatusHtml($data,$contact,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$contact['participant_name'],$text2);  
    $text = str_replace("{venue_name}",$contact['venue_name'],$text);  
    $text = str_replace("{dob}",$contact['participant_dob'],$text);
    $text = str_replace("{gender}",$contact['participant_gender'],$text);
    $text = str_replace("{parent_name}",$contact['parent_name'],$text);
    $text = str_replace("{parent_email}",$contact['parent_email'],$text);
    $text = str_replace("{parent_telephone}",$contact['parent_telephone'],$text);
    $text = str_replace("{class}",$contact['class'],$text);

    // dd($data,$template);

    return $text;
}

#---------------------------------------------------------------------------------------------------
#  SGoal comment by coach - User(Parent)
#---------------------------------------------------------------------------------------------------

public function GoalCommentEmailUser($parent_id,$player_id)
{
  $template_id = $this->emailTemplate['GoalCommentEmailUsersend'];

  return $this->GoalCommentUserSendEmail($parent_id,$player_id,$template_id);
}

public function GoalCommentUserSendEmail($parent_id,$player_id,$template_id)
{
    $parent = User::where('id',$parent_id)->first(); 
    $player = User::where('id',$player_id)->first(); 
    $template = EmailTemplate::find($template_id); 
// dd($parent,$player,$template);
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $player->name,
           'email' => $parent->email
    ];
    $data = $this->GoalEmailUserHtml($arr,$template); 

    $ar= ['data' => $data];

    // dd($ar,$arr);

  return $this->sendNotification($view,$ar,$arr);
}

public function GoalEmailUserHtml($data,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['name'],$text2);  
    return $text;
}


#---------------------------------------------------------------------------------------------------
#  Book a taster class - User
#---------------------------------------------------------------------------------------------------

public function BookATasterUserClassSuccess($contact_id)
{
  $template_id = $this->emailTemplate['BookATasterUserClass'];
  $contact = ContactDetail::where('id',$contact_id)->first(); 
  return $this->BookATasterUserClassSendEmail($contact,$template_id);
}

public function BookATasterUserClassSendEmail($contact,$template_id)
{
    $admin_email = getAllValueWithMeta('admin_email', 'general-setting'); 

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $contact->parent_name,
           'email' => $contact->parent_email
    ];
    $data = $this->BookATasterUserClassStatusHtml($arr,$contact,$template); 

    $ar= ['data' => $data];

    // dd($ar,$arr);

  return $this->sendNotification($view,$ar,$arr);
}

public function BookATasterUserClassStatusHtml($data,$contact,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$contact['participant_name'],$text2);  
    $text = str_replace("{dob}",$contact['participant_dob'],$text);
    $text = str_replace("{gender}",$contact['participant_gender'],$text);
    $text = str_replace("{parent_name}",$contact['parent_name'],$text);
    $text = str_replace("{parent_email}",$contact['parent_email'],$text);
    $text = str_replace("{parent_telephone}",$contact['parent_telephone'],$text);
    $text = str_replace("{class}",$contact['class'],$text);

    // dd($data,$template);

    return $text;
}


#---------------------------------------------------------------------------------------------------
#  Contact Us - User
#---------------------------------------------------------------------------------------------------

public function ContactUsSuccess($contact_id)
{
  $template_id = $this->emailTemplate['ContactUs'];
  $contact = ContactDetail::where('id',$contact_id)->first(); 
  return $this->ContactUsSendEmail($contact,$template_id);
}
public function NewsletterSuccess($emailId)
{
  $template_id = $this->emailTemplate['SubscribeUsers'];
  return $this->NewsletterSendEmail( $emailId, $template_id );
}

public function ContactUsSendEmail($contact,$template_id)
{
    $admin_email = getAllValueWithMeta('admin_email', 'general-setting'); 

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $contact->parent_name,
           'email' => $contact->parent_email
    ];
    $data = $this->ContactUsStatusHtml($arr,$contact,$template); 

    $ar= ['data' => $data];

    // dd($ar,$arr);

  return $this->sendNotification($view,$ar,$arr);
}

public function NewsletterSendEmail( $emailId, $template_id ){
    

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'email' => $emailId,
           'name' => ''
    ];
    $data = $this->NewsletterStatusHtml( $arr, $template ); 

    $ar= ['data' => $data];


  return $this->sendNotification($view,$ar,$arr);
}

public function ContactUsStatusHtml($data,$contact,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$contact['participant_name'],$text2); 
    $text = str_replace("{parent_telephone}",$contact['parent_telephone'],$text);
     $text = str_replace("{parent_email}",$contact['parent_email'],$text);
    $text = str_replace("{subject}",$contact['subject'],$text);
    $text = str_replace("{message}",$contact['message'],$text);

    // dd($data,$template);

    return $text;
}
public function NewsletterStatusHtml( $arr, $template )
{ 
    $text = $template->body;
    // dd($data,$template);

    return $text;
}


#---------------------------------------------------------------------------------------------------
#  Contact Us - Admin
#---------------------------------------------------------------------------------------------------

public function AdminContactUsSuccess($contact_id)
{
  $template_id = $this->emailTemplate['AdminContactUs'];
  $contact = ContactDetail::where('id',$contact_id)->first(); 
  return $this->AdminContactUsSendEmail($contact,$template_id);
}

public function AdminContactUsSendEmail($contact,$template_id)
{
    $admin_email = getAllValueWithMeta('admin_email', 'general-setting'); 

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => 'Admin',
           'email' => $admin_email
    ];
    $data = $this->AdminContactUsStatusHtml($arr,$contact,$template); 

    $ar= ['data' => $data];

    // dd($ar,$arr);

  return $this->sendNotification($view,$ar,$arr);
}

public function AdminContactUsStatusHtml($data,$contact,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$contact['participant_name'],$text2); 
    $text = str_replace("{parent_telephone}",$contact['parent_telephone'],$text);
    $text = str_replace("{parent_email}",$contact['parent_email'],$text);
    $text = str_replace("{subject}",$contact['subject'],$text);
    $text = str_replace("{message}",$contact['message'],$text);

    // dd($data,$template);

    return $text;
}


#---------------------------------------------------------------------------------------------------
#  Coach Qualification Expired
#---------------------------------------------------------------------------------------------------

public function CoachQualificationExpiredSuccess($coach_document_id)
{
  $template_id = $this->emailTemplate['CoachQualificationExpired'];
  $coach_document = CoachDocument::where('id',$coach_document_id)->first(); 
  return $this->CoachQualificationExpiredSendEmail($coach_document,$template_id);
}

public function CoachQualificationExpiredSendEmail($coach_document,$template_id)
{
    $coach_name = getUsername($coach_document->coach_id); 
    $coach_email = getUseremail($coach_document->coach_id);

    if(!empty($coach_name) && !empty($coach_email))
    {
        $template = EmailTemplate::find($template_id); 
        $view= 'emails.customEmail';
        $arr = [
               'title' => $template->title,
               'subject' => $template->subject,
               'name' => $coach_name,
               'email' => $coach_email,
               'document' => $coach_document->document_name
        ];
        $data = $this->CoachQualificationExpiredStatusHtml($arr,$coach_document,$template); 

        $ar= ['data' => $data];

      return $this->sendNotification($view,$ar,$arr);
    }
    
}

public function CoachQualificationExpiredStatusHtml($data,$coach_document,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['name'],$text2);  
    $text = str_replace("{qualification}",$data['document'],$text);

    return $text;
}


#---------------------------------------------------------------------------------------------------
#  Coach submit a end of term report
#---------------------------------------------------------------------------------------------------

public function CoachSubmitEndOfTermReportSuccess($report_id)
{
  $template_id = $this->emailTemplate['CoachSubmitEndOfTermReport'];
  $report = PlayerReport::where('id',$report_id)->first(); 
  return $this->CoachSubmitEndOfTermReportSendEmail($report,$template_id);
}

public function CoachSubmitEndOfTermReportSendEmail($report,$template_id)
{
    //dd($report);

    $parent = User::where('id',$report->player_id)->first();
    $coach = User::where('id',$report->coach_id)->first();

    if(!empty($parent->parent_id))
    {
      $parent_name = getUsername($parent->parent_id);
      $parent_email = getUseremail($parent->parent_id);
    }else{
      $parent_name = getUsername($parent->id);
      $parent_email = getUseremail($parent->id);
    }

    if($report->type == 'simple')
    {
      $type = 'End of Term Report';
    }

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $parent_name,
           'email' => $parent_email,
           'player' => $parent->name,
           'type' => $type,
           'coach' => $coach->name
    ];
    $data = $this->CoachSubmitEndOfTermReportHtml($arr,$report,$template); 

    // dd($arr,$report,$template);

    $ar= ['data' => $data];

  return $this->sendNotification($view,$ar,$arr);
}

public function CoachSubmitEndOfTermReportHtml($data,$report,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['name'],$text2);  
    $text = str_replace("{user_email}",$data['email'],$text);
    $text = str_replace("{player}",$data['player'],$text);
    $text = str_replace("{coach}",$data['coach'],$text);
    $text = str_replace("{End of Term Report}",$data['type'],$text);

    return $text;
}


#---------------------------------------------------------------------------------------------------
#  Coach submit a player report
#---------------------------------------------------------------------------------------------------

public function CoachSubmitPlayerReportSuccess($report_id)
{
  $template_id = $this->emailTemplate['CoachSubmitPlayerReport'];
  $report = PlayerReport::where('id',$report_id)->first(); 
  return $this->CoachSubmitPlayerReportSendEmail($report,$template_id);
}

public function CoachSubmitPlayerReportSendEmail($report,$template_id)
{
   // dd($report);

    $parent = User::where('id',$report->player_id)->first();
    $coach = User::where('id',$report->coach_id)->first();

    if(!empty($parent->parent_id))
    {
      $parent_name = isset($parent->parent_id) ? getUsername($parent->parent_id) : '';
      $parent_email = isset($parent->parent_id) ? getUseremail($parent->parent_id) : '';
    }else{
      $parent_name = isset($parent->id) ? getUsername($parent->id) : '';
      $parent_email = isset($parent->id) ? getUseremail($parent->id) : '';
    }

    if($report->type == 'complex')
    {
      $type = 'Player Report';
    }

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';

    if(!empty($parent_email) && !empty($parent_name))
    {
        $arr = [
               'title' => $template->title,
               'subject' => $template->subject,
               'name' => $parent_name,
               'email' => $parent_email,
               'player' => $parent->name,
               'type' => $type,
               'coach' => $coach->name
        ];
        $data = $this->CoachSubmitPlayerReportHtml($arr,$report,$template); 

        // dd($arr,$report,$template);

        $ar= ['data' => $data];

      return $this->sendNotification($view,$ar,$arr);
    }
}

public function CoachSubmitPlayerReportHtml($data,$report,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['name'],$text2);  
    $text = str_replace("{user_email}",$data['email'],$text);
    $text = str_replace("{player}",$data['player'],$text);
    $text = str_replace("{coach}",$data['coach'],$text);
    $text = str_replace("{Player Report}",$data['type'],$text);

    return $text;
}


#---------------------------------------------------------------------------------------------------
#  Coach submit a match report
#---------------------------------------------------------------------------------------------------

public function CoachSubmitMatchReportSuccess($report_id)
{
  $template_id = $this->emailTemplate['CoachSubmitMatchReport'];
  $report = MatchReport::where('id',$report_id)->first(); 
  return $this->CoachSubmitMatchReportSendEmail($report,$template_id);
}

public function CoachSubmitMatchReportSendEmail($report,$template_id)
{
    //dd($report);

    $parent = User::where('id',$report->player_id)->first();

    if($report->coach_id == 0)
    {
      $user = User::where('id',$report->parent_id)->first();
    }
    elseif($report->parent_id == 0)
    {
      $user = User::where('id',$report->coach_id)->first();
    }

    if(!empty($parent->parent_id))
    {
      $parent_name = getUsername($parent->parent_id);
      $parent_email = getUseremail($parent->parent_id);
    }else{
      $parent_name = $user->name;
      $parent_email = $user->email;
    }

    $template = EmailTemplate::find($template_id); 
    $view= 'emails.customEmail';
    $arr = [
           'title' => $template->title,
           'subject' => $template->subject,
           'name' => $parent_name,
           'email' => $parent_email,
           'player' => $parent_name,
           'type' => 'Match Report',
           'coach' => $user->name
    ];
    $data = $this->CoachSubmitMatchReportHtml($arr,$report,$template); 

    // dd($arr,$report,$template);

    $ar= ['data' => $data];

  return $this->sendNotification($view,$ar,$arr);
}

public function CoachSubmitMatchReportHtml($data,$report,$template)
{ 
    $text2 = $template->body;
    $text = str_replace("{user_name}",$data['name'],$text2);  
    $text = str_replace("{user_email}",$data['email'],$text);
    $text = str_replace("{player}",$data['player'],$text);
    $text = str_replace("{coach}",$data['coach'],$text);
    $text = str_replace("{Match Report}",$data['type'],$text);

    return $text;
}



}
