<?php 

/*----------------------------------
| Get shop type using orderID
|----------------------------------*/
function getShopType($orderID){
  $shop = \DB::table('shop_cart_items')->where('orderID',$orderID)->get(); 
  $shop_ty = [];

  foreach($shop as $sh)
  {
    $shop_ty[] = $sh->shop_type;
  }
  $orderType = implode(', ',$shop_ty);
  return $orderType;
}

/*-------------------------------------
| User name using category ID 
|-------------------------------------*/
function getUsername($id){
  $user = App\User::where('id',$id)->first();
  return $user['name'];
}

/*-------------------------------------
| Camp Category name using category ID 
|-------------------------------------*/
function getCatname($id){
  $category = App\CampCategory::where('id',$id)->first();
  return $category['title'];
}

/*-------------------------------------
| Course name using category ID 
|-------------------------------------*/
function getCourseName($id){
  $course = App\Course::where('id',$id)->first();
  return $course['title'];
}

/*-------------------------------------
| Season name using category ID 
|-------------------------------------*/
function getSeasonname($id){
  $season = App\Season::where('id',$id)->first();
  return $season['title'];
}

/*-------------------------------------
| Test Catergry name using category ID 
|-------------------------------------*/
function getTestCatname($id){
  $testcat = App\TestCategory::where('id',$id)->first();
  return $testcat['title'];
}

/*-------------------------------------
| Test name using category ID 
|-------------------------------------*/
function getTestname($id){
  $test = App\Test::where('id',$id)->first();
  return $test['title'];
}

/*-------------------------------------
| Product Category name using category ID 
|-------------------------------------*/
function getProductCatname($id){
  $category = \DB::table('product_categories')->where('id',$id)->first();
  return $category->label;
}

/*-------------------------------------
| Report Category Name
|-------------------------------------*/
function getReportCategoryName($id){
  $cat = \DB::table('report_questions')->where('id',$id)->first();
  return $cat->title;
}

/*-------------------------------------
| Report Category Options
|-------------------------------------*/
function getReportOptionName($id){
  $cat_opt = \DB::table('report_question_options')->where('id',$id)->first();
  return $cat_opt->option_title;
}

/*-------------------------------------
| Matches - Stats calculation
|-------------------------------------*/
function statsCalculation($jsonData){
  $data = json_decode($jsonData);
  
  // Calculations

  // 1 - Total points played in match
  $tp_played = $data->tp_in_match;  

  // 2 - Your percentage points won in match 
  $percent_pts_won = ($data->tp_won)/($data->tp_in_match)*100;

  // 3 - Your percentage of 1st serevs in
  $percent_1serves_in = ($data->total_1serves_in / ($data->total_1serves_in + $data->total_2serves_in + $data->total_double_faults)*100); 

  // 4 - Your opponent's percentage of points in match
  $op_percent_pts_won = (($data->tp_in_match - $data->tp_won)/$data->tp_in_match * 100); 

  // 5 - Your opponent's percentage of 1st serves in match
  $op_percent_1serves_in = ($data->total_1serve_by_op / ($data->total_1serve_by_op + $data->total_2serve_by_op + $data->total_double_fault_by_op)*100);

  // 6 - Your percentagre points won in 1st serves in
  $percent_pts_won_1serve = $data->tp_won_in_1serve / $data->total_1serves_in * 100; 

  // 7 - Your percentage of points won from 2nd serve
  $percent_pts_won_2serve = $data->tp_won_in_2serve / $data->total_2serves_in * 100;

  // 8 - Your percentage of points won on opponent’s 1st serve
  $percent_pts_won_op_1serve = $data->tp_won_ops_1sereve / $data->total_1serve_by_op * 100;

  // 9 - Your percentage of points won on opponent’s 2nd serve
  $percent_pts_won_op_2serve = $data->tp_won_ops_2sereve / $data->total_2serve_by_op * 100;

  // 10 - Your percentage of points won when rally was 1-4 shots
  $percent_pts_won_rally_1shots = $data->tp_won_rally_4shots / $data->total_shots_match * 100;

  // 11 - Your percentage of points won when rally was 5+ shots
  $percent_pts_won_rally_5shots = $data->tp_won_rally_5shots / $data->total_shots_match * 100;

  // 12 - Average rally length
  $average_rally_length = $data->total_shots_match / $data->tp_in_match * 100;

  // 13 - Your total aces
  $total_aces = $data->total_aces;

  // 14 - Your total double faults
  $total_double_faults = $data->total_double_faults;

  $stats_array = [
      'tp_played'                     =>   number_format($tp_played,2),
      'percent_pts_won'               =>   number_format($percent_pts_won,2),
      'percent_1serves_in'            =>   number_format($percent_1serves_in,2),
      'op_percent_pts_won'            =>   number_format($op_percent_pts_won,2),
      'op_percent_1serves_in'         =>   number_format($op_percent_1serves_in,2),
      'percent_pts_won_1serve'        =>   number_format($percent_pts_won_1serve,2),
      'percent_pts_won_2serve'        =>   number_format($percent_pts_won_2serve,2),
      'percent_pts_won_op_1serve'     =>   number_format($percent_pts_won_op_1serve,2),
      'percent_pts_won_op_2serve'     =>   number_format($percent_pts_won_op_2serve,2),
      'percent_pts_won_rally_1shots'  =>   number_format($percent_pts_won_rally_1shots,2),
      'percent_pts_won_rally_5shots'  =>   number_format($percent_pts_won_rally_5shots,2),
      'average_rally_length'          =>   number_format($average_rally_length,2),
      'total_aces'                    =>   number_format($total_aces,2),
      'total_double_faults'           =>   number_format($total_double_faults,2),
  ];

  return $stats_array;

}

function upsArray()
{
   return [
    'UPS_ACCESS_KEY' => '3D7784D38F252372',
    'UPS_USER_ID' => 'envisiun',
    'UPS_PASSWORD' => 'Deft_soft1'
  ];
}

function ShopCartCount()
{
  if(Auth::check() && Auth::user()->role == "user"){
      return Auth::user()->ShopProductCount();
  }else{
      return Cart::getTotalQuantity();
  }
}


function shopStatus($shop)
{
                          switch ($shop->approved_status) {
                                case 1:
                                  return '<p class="tab-messages approve_msg">Approved by Admin<p>';
                                  break;
                                case 2:
                                  return '<p class="tab-messages reject_msg">Rejected by Admin<p>';
                                  break;
                                
                                default:
                                  return '<p class="tab-messages await_msg">Awaiting for approval from Admin side.<p>';
                                  break;
                              }
}

function checkInStock($stock)
{

   if($stock != null){
     
   


    switch ($stock->stock) {
      case 0:
        return '
            <div class="OutOfStock"><img src="'.url('/images/out-of-stock.png').'"></div>
        ';
        break;
      
      default:
      
        # code...
        break;
    }
  }
}

function getProductDetailPageFilterItem($product,$pro,$no,$type,$item)
{
   $producthasVariant = $pro->getChildVariationAccordingSubProduct();
  switch ($no) {
    case 0:
       return putTheFilterItem2($product,$pro,$producthasVariant,$type,$item);
      break; 
    default:
       return putTheFilterItem($product,$pro,$producthasVariant,$type,$item);
      break;
  }
}



function putTheFilterItem($product,$pro,$producthasVariant,$type,$item)
{
  
          $checked = !empty($producthasVariant[$type]) && in_array($item->id,$producthasVariant[$type]) ? 'checked' : 'disabled';
   
          $text  ='<li>';
          $text .='<div class="size-btn">';
          $text .='<input type="radio" ';
          $text .='name="'.$type.'" ';
          $text .='value="'.$item->id.'" ';
          $text .='id="filter-'.$type.'-'.$item->id.'"';
          $text .='data-type="'.$type.'"';
          $text .='class="filterType" ';
          $text .=$checked;
          $text .='>';
          $text .='<label for="filter-'.$type.'-'.$item->id.'" class="status-'.$checked.'">'.$item->name.'</label>';
          $text .='</div>';
          $text .='</li>';

          return $text;
}





function putTheFilterItem2($product,$pro,$producthasVariant,$type,$item)
{
            $checked = !empty($producthasVariant[$type]) && in_array($item->id,$producthasVariant[$type]) ? 'checked' : '';
            $url = $checked != 'checked' ? $product->getUrlAccordingToVariations($type,$item->id) : 'javascript:void(0)';
            $text  ='<li>';
            $text .='<a href="'.$url.'" class="size-btn Status-'.$checked.'">';
            if($checked == 'checked'){
                  $text .='<input id="sel-variation" type="hidden" value="'.$item->id.'" name="'.$type.'">';
            }
            $text .='<label>'.$item->name.'</label>';
            $text .='</a>';
            $text .='</li>';

          return $text;
}



function getTaxPriceAccordingToZipcode()
{  
  $tax=0;
   if(Session::has('shippingAddress')){
        $arr = (object)json_decode(Session::get('shippingAddress'));
        $tax = $arr->tax;

   }
   return $tax;
}



function messageAccordingType($msg,$class)
{
  $text  ='<li class="'.$class.'">';
  $text .='<img src="'.ProfileImage($msg->sender->profile_image).'" alt="" />';
  $text .= MessageOfChatWithType($msg);
  $text .='</li>';
  return $text;
}


function MessageOfChatWithType($msg)
{

   switch ($msg->type) {
      case 0:
         return '<p>'.$msg->message.'</p>';
        break;

      case 1:

        return '<div class="ctm-msg-pkg-wrap">'.getMessageHtmlCustomPkg($msg->message,$msg).'</div>';
        break;

      case 2:
        
        return '<div class="ctm-msg-pkg-wrap-tag">'.messageWithTag($msg->message,$msg).'</div>';
        break;
     
     default:
        return '<p>'.$msg->message.'</p>';
        break;
   }
}


function getMessageHtmlCustomPkg($message,$msg)
{
 
$arr = json_decode($message);
$request = (array)$arr->message;
 
$request_for = $request['request_for'] == 1 ? 'Pricing' : 'Custom Package';
$contact_type = $request['contact_type'] == 1 ? 'By Phone Call' : 'Via Email';
$text  = '';
$text .='<div class="custom-chat-card">';
$text .='<p>I am '.$request['name'].'</p>';
$text .='<p><b>Requested for :</b> '.$request_for.'</p>';
if($request['request_for'] == 1){
              $text .='<p><b>Event Dated : </b>'.$request['start_date'].'</p>';
              $text .='<p><b>Guest Capacity : </b>'.$request['no_of_guest'].' guest</p>';
}
$text .='<p><b>Preferred Contact Method</b>'.$contact_type.'</p>';
$text .='<p><b>Contacts :</b></p>';
$text .='<p><span><i class="fa fa-phone"></i> '.$request['phone_number'].'</span></p>';
$text .='<p><span> <i class="fa fa-envelope"></i> '.$request['email'].'</span></p>';
$text .='<p>'.$request['message'].'</p>';
$text .='</div>';

$text .= customPackage($arr->pkg,$msg);

return $text;

   
}






function customPackage($pkg,$msg)
{
   $page = App\Models\Vendors\CustomPackage::where('id',$pkg);
  if($page->count() > 0){
   

  $c = $page->first();

   if($c->status == 2){
      return customPackage2($pkg,$msg);
     }
  $text  ='<div class="cstm-pkg-card">';
  $text .='<div class="cstm-pkg-card-inner">';
  $text .='<div class="cstm-pkg-btn"><span class="blink-text">Custom Package</span></div>';
  $text .='<div class="cstm-pkg-heading">'.$c->title.'</div>';
  $text .='<div class="cstm-pkg-inn-detail">';
  $text .='<ul>';
  $text .='<li>'.$c->category->label.'</li>';
  $text .='<li><i class="fa fa-users"></i> Guest Capacity <b>'.$c->min_person.' To '.$c->max_person.'</b></li>';
  // $text .='<li>2-3 Games with Prizes</li>';
  // $text .='<li>Sadh for Bride</li>';
  $text .='<li><h1 class="cstmpkg-price">$'.custom_format($c->price,2).' / BUDGET</h1></li>';
  $text .='</ul>';
  $text .='</div>';
  $text .='<ul class="button-grp-wrap mt-3">';
  $text .='<li>';
            if(Auth::check() && Auth::user()->role == "user"){
              $url = url('/');
            }else{
            $url = url(route('vendor.custom.packageCreate',[$c->category->slug,$c->id,$msg->id]));
  $text .='<a href="'.$url.'" data-toggle="tooltip" title="More Detail" class="icon-btn" target="_blank"><i class="fa fa-eye"></i>';
  $text .='</a>';
            }
  $text .='</li>';



  $text .='</ul>';
  $text .='<div class="cstm-pkg-fotter text-center">';
  if($c->status == 1){
      if(Auth::check() && Auth::user()->role == "user"){

           $text .='<a href="javascript:void(0)" class="btn btn-info">Waiting For Approval</a>';

      }else{

           $text .='<a href="'.$url.'" class="btn btn-info btn-accepted" target="_blank" data-chatID="'.$msg->id.'" data-id="'.$c->id.'">Accept</a>';
           $text .='<a href="javascript:void(0)" class="btn btn-danger btn-delined" data-chatID="'.$msg->id.'" data-id="'.$c->id.'">Deline</a>';

      }
  }elseif($c->status == 2){
       if(Auth::check() && Auth::user()->role == "user"){

       }else{
        $text .='<span class="text-info text-success">Accepted</span>';
       }
  }else{
       $text .='<span class="text-info text-danger">Delined</span>';
  }
  $text .='</div>';
  $text .='</div>';
  $text .='</div>';
  return $text;
  
  }

}




function customPackage2($pkg,$msg)
{
   $page = App\Models\Vendors\CustomPackage::where('id',$pkg);
  if($page->count() > 0){
    $c = $page->first();
     if($c->status == 3){
      return customPackage($pkg,$msg);
     }
   $pkg = $c->VendorPackage;
   
  $text  ='<div class="cstm-pkg-card">';
  $text .='<div class="cstm-pkg-card-inner">';
  $text .='<div class="cstm-pkg-btn"><span class="blink-text">Custom Package</span></div>';
  $text .='<div class="cstm-pkg-heading">'.$pkg->title.'</div>';
  $text .='<div class="cstm-pkg-inn-detail">';
  $text .='<ul>';
  $text .='<li>'.$pkg->category->label.'</li>';
  $text .='<li><i class="fa fa-users"></i> Guest Capacity <b>'.$pkg->min_person.' To '.$pkg->max_person.'</b></li>';
  // $text .='<li>2-3 Games with Prizes</li>';
  // $text .='<li>Sadh for Bride</li>';
  $text .='<li><h1 class="cstmpkg-price">$'.custom_format($pkg->price,2).' / BUDGET</h1></li>';
  $text .='</ul>';
  $text .='</div>';
  $text .='<ul class="button-grp-wrap mt-3">';
  $text .='<li>';
            if(Auth::check() && Auth::user()->role == "user"){
                $url = url(route('home.vendor.customPackage',[$pkg->category->slug,$pkg->business->business_url]));
            }else{
                $url = url(route('vendor.custom.packageCreate',[$c->category->slug,$c->id,$msg->id]));
            }
  $text .='<a href="'.$url.'" data-toggle="tooltip" title="More Detail" class="icon-btn" target="_blank"><i class="fa fa-eye"></i>';
  $text .='</a>';
  $text .='</li>';



  $text .='</ul>';
  $text .='<div class="cstm-pkg-fotter text-center">';
  if($c->status == 1){
      if(Auth::check() && Auth::user()->role == "user"){
           $text .='<a href="javascript:void(0)" class="btn btn-info">Waiting For Approval</a>';
      }else{
           $text .='<a href="'.$url.'" class="btn btn-info btn-accepted" target="_blank" data-chatID="'.$msg->id.'" data-id="'.$c->id.'">Accept</a>';
           $text .='<a href="javascript:void(0)" class="btn btn-danger btn-delined" data-chatID="'.$msg->id.'" data-id="'.$c->id.'">Deline</a>';

      }
  }elseif($c->status == 2){
       if(Auth::check() && Auth::user()->role == "user"){

        $text .='<span class="text-info text-success">Accepted</span>';

       }else{

        $text .='<span class="text-info text-success">Accepted</span>';

       }
  }else{
       $text .='<span class="text-info text-danger">Delined</span>';
  }
  $text .='</div>';
  $text .='</div>';
  $text .='</div>';
  return $text;
  
  }

}


function messageWithTag($message,$msg){
  if($msg->parentMsg->count() > 0){
      $arr = json_decode($msg->parentMsg->message);
    //  $text = 

      $pkg = App\Models\Vendors\CustomPackage::where('id',$arr->pkg);

      $class = $pkg->count() > 0 && $pkg->first()->status == 2 ? 'accepted-pkgs' : 'delined-pkgs';
      $class = SevenDayOldPackage($pkg->first()) == 0 ? 'expired-pkgs' : $class;
      $class = CustomPackageAlreadyBuy($pkg) == 0 ? 'already-used' : $class;

      $text ="<div class='cMessagePkgStatus ".$class."'>";
      $text .= customPackage2($arr->pkg,$msg);
      $text .="<p>".$message."</p></div>";
     return $text;
  }else{
    return $message;
  }
}


function SevenDayOldPackage($c)
{
     $now = \Carbon\Carbon::now();
     return $status = ($c->updated_at->diffInDays($now) > 7) ? 0 : 1;
 
}


function CustomPackageAlreadyBuy($c)
{
  $user_id =Auth::check() ? Auth::user()->id : 0;
  $cont =  \App\Models\EventOrder::where('type','order')->where('user_id',$user_id)
                         ->where('package_id',$c->first()->package_id)->count();
   
  return $cont > 0 ? 0 : 1;
}




// rj cd start
  function getPackAEM($id) {
   return \App\PackageMetaData::find($id);
  }
// rj cd end

function getBusinessData($key,$type,$category_id,$user_id,$business_id,$count=0)
{
        $chk = \App\VendorCategoryMetaData::
                where('user_id',$user_id)
               ->where('key',$key)
               ->where('type',$type)
               ->where('category_id',$category_id)
               ->where('keyValue','!=','')
               ->where('vendor_category_id',$business_id);

  return $count == 0 ?  $chk->first() : $chk->count();
}

function errorMessages($type)
{
 switch ($type) {
   case 'account-updated':
      return 'Your information is updated successfully, Please wait for admin approval.';
     break;

    case 'token-expired':
      return 'The token has been expired.';
     break;
    case 'logged':
      return '<strong>Your request is not fullfilled right now because already you are logged in.</strong><br/><br/><br/><br/>';
     break;

   case 'UnAutherized':
      return 'Your request is not fullfilled right now because already you are logged in with other type user.';
     break;
   
   default:
      return 'Not found!';
     break;
 }
}




function errorMessagePageTitle($type)
{
 switch ($type) {
   case 'account-updated':
      return 'Your information is updated successfully';
     break;

    case 'token-expired':
      return 'Token expired';
     break;
   
   default:
      return 'Not found!';
     break;
 }
}



function createToken()
{
  return uniqid(base64_encode(str_random(40).date('Y-m-d')));
}


function getEventBudget($user_event)
{
  $order = \App\Models\EventOrder::where('type','order')
                         ->where('user_id',$user_event->user_id)
                         ->where('event_id',$user_event->id)
                         ->groupBy('event_id')
                         ->get();
  $total = 0;

  foreach ($order as $k) {
     $total = ($k->order->amount + $total);
  }

  $remain = $user_event->event_budget > $total ? ($user_event->event_budget - $total) : 0;
  $over = $user_event->event_budget < $total ? ($total - $user_event->event_budget) : 0;

  return [
     'spend' => $total,
     'remain' => $remain,
     'over' => $over,
  ];
}


function getOrderExtraFees($arr,$package_id = 0)
{
   $data = json_decode($arr->first()->paymentDetails);
   $tax = 0;
   $service =0;
   $commission =0;


  foreach ($data as $key => $value) {

      $commission = ($value->commission_fee + $commission);
      $service = ($value->service_fee + $service);
      $tax = $value->tax;
  }

  return [
    'tax' => $tax,
    'commission' => $commission,
    'service' => $service
    
  ];
  
}

 
function getOrderExtraFeess($item)
{

   $data = json_decode($item->paymentDetails);
   $tax = 0;
   $service =0;
   $commission =0;
   $payable =0;

  foreach ($data as $key => $value) {
  if($key == $item->vendor_id){
      $commission = ($value->commission_fee + $commission);
      $service = ($value->service_fee + $service);
      $tax = $value->tax;
      $payable = $value->payable_amount;
    }
  }
  
     
  return [
    'tax' => $tax,
    'commission' => $commission,
    'payable' => $payable,
    'service' => $service,
    
  ];
  
}



function addonsInCarts($order)
{
  $text ="<strong>N/A</strong>";
  if($order->addons != ""):

  $addons = explode(",",$order->addons);
  $adddons = \App\PackageMetaData::whereIn('id',$addons)
                   ->where('package_id',$order->package->id)
                   ->get();
  $text ='<h3 class="cart-item-link">Addons</h3>';
  $text .='<ul class="cart-addon-listing">';
                         
                           
                         
  foreach ($adddons as $key => $value) {
     $text .='<li><span>'.$value->key.'</span><span>$'.$value->key_value.'</span></li>';
  }
  $text .='</ul>';

  endif;
return $text;

}


function addonsInEMail($order)
{
  $text ="<strong>N/A</strong>";
  if($order->addons != ""):

  $addons = explode(",",$order->addons);
  $adddons = \App\PackageMetaData::whereIn('id',$addons)
                   ->where('package_id',$order->package->id)
                   ->get();
  $text ='';
  foreach ($adddons as $key => $value) {
         $text .='<tr>
                     <td style="font-family: Verdana, Times New Roman, Arial; font-size: 13px; line-height: 18px; color: #0c0c0c; padding-top: 2px; padding-bottom: 2px; font-weight: 400; padding-left: 0px; padding-right: 10px;" align="left">'.$value->key;

         $text .='</td><td style="font-family: Verdana,Times New Roman, Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 2px; padding-bottom: 2px; font-weight: 400; padding-left: 0px; padding-right: 0px;" align="left">$'.$value->key_value.'</td>
                  </tr>';
 }
  endif;
return $text;

}

// get rates for location
function ratesForLocation($zipcode, $city=null, $country=null) {
  $key = getAllValueWithMeta('taxjar_api_key', 'global-settings');
  $client = TaxJar\Client::withApiKey($key);
  $val =0;
  $status = 0;
  $msg = 'Invalid Address, Please check.';
 
  if (in_array($country, ['US', 'CA'])) {
          try {
            $rates = $client->ratesForLocation($zipcode, [
              'city' => $city,
              'country' => $country
            ]);
               $val = round($rates->combined_rate * 100, 2);
               $status = 1;
               $msg = 'Valid Address';
           } catch (Exception $e) {
               $msg = $e->getMessage();
               $status = 0;
                
            }
  }

  return ['status' => $status,'messages' => $msg,'val'=> $val];
}

// get commission or Service fee
function getFee($amount, $fee_type, $fee_amount) {
  $type = getAllValueWithMeta($fee_type, 'global-settings');
  $admin_amount = getAllValueWithMeta($fee_amount, 'global-settings');

if($fee_type == "commission_fee_type"){

return get_commission_according_slab($amount);
  
}else{

  if($type === '0') {
      $per = round($amount / 100);
    return ($per * $admin_amount);
  } else {
    return $admin_amount;
  }
}
  

}


function get_commission_according_slab($amount)
{
    $fee = \App\Commission::where('slab_from','<=',$amount)->where('slab_to','>=',$amount);
    $per = ($amount / 100);
    if($fee->count() > 0){
       $fees = $fee->first();
       return ($fees->commission_fee * $per);
    }else{
       return (3 * $per);
    }

}

function categoryOrders($category_id, $event_id) {
  return \App\Models\EventOrder::where([
          'category_id'=> $category_id,
          'event_id'=> $event_id,
          'type' => 'order'
         ])->get();
}



function dealInfoInCart($item)
{
   $text = "";
  $dealType =$item->deal->deal_off_type == 0 ? $item->deal->amount.'% OFF  ' : '$'.custom_format($item->deal->amount,2).' OFF ';
  if($item->deal->type_of_deal == 0){
    $text = ($item->coupon_code != "") ? $dealType.$item->deal->title." Deal Applied " : "<p> This Package have a &nbsp; <strong> ".$item->deal->title."</strong>&nbsp;deal</p>";
  }else{
     $text =$dealType.$item->deal->title." Deal Applied ";
  }

  return $text;                                        
}



function dealToggledownBox($item)
{
   $text = '';

  $dealType =$item->deal->deal_off_type == 0 ? $item->deal->amount.'% OFF' : '$'.custom_format($item->deal->amount,2).' OFF';
  $discounted = $item->discount > 0 ? 'discounted-price' : '';
$dealLife = $item->deal->deal_life == 1 ? 'Applicable From <b>'.date('d-m-Y',strtotime($item->deal->start_date)).'</b> To <b>'.date('d-m-Y',strtotime($item->deal->expiry_date)).' </b>' : 'Permanent';
  $text .='<h4 class="mb-2">'.$item->deal->title.'</h4>';

  $text .='<div class="deal_life">'.$dealLife.'</div>';
  $text .='<table class="table">';
  $text .='<tr>';
  $text .='<th>Package Name</th>';
  $text .='<td class="'.$discounted .'">'.$item->package->title.'</td>';
  $text .='</tr>';  
  $text .='<tr>';
  $text .='<th>Package Amount</th>';
  $text .='<td class="'.$discounted .'">$'.custom_format($item->package->price,2).'</td>';
  $text .='</tr>';
  $text .='<tr>';
  $text .='<th>Discount</th>';
  $text .='<td class="'.$discounted .'">'.$dealType.' <span>$'.$item->discount.'</span></td>';
  $text .='</tr>';
  $text .='<tr class="'.$discounted .'">';
  $text .='<th>Special Price</th>';
  $text .='<td>$'.custom_format($item->discounted_price,2).'</td>';
  $text .='</tr>';
  $text .='</table>';

  if($item->deal->type_of_deal == 0){
      $promoCode ='<b>'.$item->deal->deal_code.'</b></p>';
      $text .="<div class='promoCode'>";
      $text .= ($item->coupon_code != "") ? "<p>Coupon Applied <strong>Promo Code ".$item->coupon_code."</strong>" : "<p>Discount will be applied after appling the <strong>Promo Code ".$promoCode."</strong>";
      $text .="</div>";
  }
   

 
return $text;



}


function EventCurrentStatus($start_date,$end_date)
{

  $start = strtotime($start_date);
  $end = strtotime($end_date);
  $today = strtotime(date('Y-m-d'));
 

if($start <= $today && $end >= $today){
  return 'On Going Event';
}elseif($start > $today){
  return 'Upcoming Event';
}elseif($end < $today){
  return 'Past Event';
}

 
}


function DealCurrentStatus($start_date,$end_date)
{
  $start = strtotime($start_date);
  $end = strtotime($end_date);
  $today = strtotime(date('Y-m-d')); 
  
  if($start <= $today && $end >= $today){
    return 'On Going Deal';
  }elseif($start > $today){
    return 'Upcoming Deal';
  }elseif($end < $today){
    return 'Expired Deal';
  }   
}







function getSeasonOfBusiness($session_id,$category_id,$type)
{                   
  return $seasons = \App\CategoryVariation::where('category_id',$category_id)
                                   ->where('category_variations.type',$type)
                                   ->where('variant_id',$session_id)
                                   ->count();
}
 
 

function getPackageEvents($package)
{
   $ids = $package->events->pluck('key_value')->toArray();
   return $CategoryVariation =\App\CategoryVariation::whereIn('variant_id',$ids)
   ->where('type','event')
   ->where('category_id',$package->category_id)->get();
}


function getPackageAmenities($package)
{
   $ids = $package->amenities->pluck('key_value')->toArray();
   return $CategoryVariation =\App\CategoryVariation::whereIn('variant_id',$ids)
   ->where('type','amenity')
   ->where('category_id',$package->category_id)->get();
}

function getPackageGames($package)
{
   $ids = $package->games->pluck('key_value')->toArray();
   return $CategoryVariation =\App\CategoryVariation::whereIn('variant_id',$ids)
   ->where('type','game')
   ->where('category_id',$package->category_id)->get();
}




function stepbarCheck($step,$deal=0)
{
      $step1 = ($step >= 1) ? "active": "";
      $step2 = ($step >= 2) ? "active": "";
      $step3 = ($step >= 3) ? "active": "";
     
      $parentClass= $deal == 1 ? 'haveFiveSteps' : '';

       $text  ='<div class="row">';
       $text .='<div class="col-lg-12">';
       $text .='<section class="multi_step_form '.$parentClass.'">  ';
       $text .='<div id="msform"> ';
       $text .='<ul id="progressbar">';
       $text .='<li class="'.$step1.'">Billing Address</li>';
      
       $text .='<li class="'.$step2.'">Order Summary</li>';
       $text .='<li class="'.$step3.'">Payment</li>';
        
       $text .='</ul>';
       $text .='</div>';
       $text .='</section>';
       $text .='</div>';
       $text .='</div>';
  return $text;
}












 function getVendorNotifications()
{
   return $business = \App\Models\Vendors\Chat::where('vendor_id',Auth::user()->id)
                                          ->join('chat_messages','chat_messages.chat_id','=','chats.id')
                                          ->select('chats.*')
                                          ->where('chat_messages.receiver_id',Auth::user()->id)
                                          ->where('chat_messages.receiver_status',0)
                                          ->groupBy('chat_messages.chat_id')
                                          ->get();
}


function getUserNotifications()
{
   return $business = \App\Models\Vendors\Chat::where('user_id',Auth::user()->id)
                                          ->join('chat_messages','chat_messages.chat_id','=','chats.id')
                                          ->select('chats.*')
                                          ->where('chat_messages.receiver_id',Auth::user()->id)
                                          ->where('chat_messages.receiver_status',0)
                                          ->groupBy('chat_messages.chat_id')
                                          ->get();
}


function getCoverPictureOfBusiness($cate)
{
       if($cate->category && $cate->category->cover_type == 1):
        $image = url(getBasicInfo($cate->vendors->id, $cate->category_id,"basic_information","cover_photo"));

        return  $text ='<img src="'.$image.'" width="100%">';

                                           
        else:
          $image = url(getBasicInfo($cate->vendors->id, $cate->category_id,'basic_information','cover_video_image'));
          return  $text ='<img src="'.$image.'" width="100%">';
        endif;
}











// fav_vendor
function fav_vendor($id) {
  $fav_vendor = \App\FavouriteVendor::where(['vendor_id' => $id, 'user_id'=> \Auth::User()->id])->first();
  return $fav_vendor ? 'fav-active' : '';
}


function checkCategoryWithRequest($name,$category_id)
{
   if(\Request::has($name)){
      $arr = \Request::get($name);

      return in_array($category_id,$arr) ? 'checked' : '';
   }
}











 function notoficationBusinessFlash($type,$msg,$status)
{

  if($msg !=null && $msg->count() > 0 && $type == "vendor" && $status == 4){
         $text ='<div class="warning-box space">';
         $text .='<div class="shadow-box">';
         $text .='<div class="info-tab tip-icon" title="Useful Tips"><span class="fas fa-exclamation-triangle"> </span> <i></i></div>';
         $text .='<div class="warning-text"><p><strong>Message: </strong>'.$msg->keyValue.'</p></div></div></div>';

      return $type == "vendor" ? $text : '';
  }
}



function ProgressBar($percent,$total = 20)
{

   
    $text ='';
    $text .='<div class="progress">';
    $text .='<div class="progress-bar bg-'.ProgressBarColor($percent).'" role="progressbar" aria-valuenow="'.$percent.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent.'%">';
    $text .='<span class="sr-only">'.$percent.'% '.ProgressBarColor($percent,1).'</span>';
    $text .='</div>';
    $text .='</div>';

    return $text;
}




 function ProgressBarColor($percent,$type=0)
{

 


   switch ($percent) {
     case $percent <= 25 && $percent > 0:
       return $type == 0 ? 'danger' : 'In Complete (danger)';
       break;
    case $percent <= 50 && $percent > 25:
       return $type == 0 ? 'warning' : 'In Complete (warning)';
       break;
    case $percent <= 75 && $percent > 50:
      return $type == 0 ? 'info' : 'In Complete (info)';
       
       break;
    case $percent <= 100 && $percent > 75:

    return $type == 0 ? 'success' : 'In Complete (success)';
       
       break;
     default:
       # code...
       break;
   }
}










function createAction($data, $editUrl, $stsUrl) {
            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-primary">Action</button>';
            $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';

            if(!empty($editUrl)) {
              $text .='<a href="'.route($editUrl, $data->slug).'" class="dropdown-item">Edit</a>';
              $text .='<div class="dropdown-divider"></div>';
            }
            
            if(!empty($stsUrl)) {
              $status=$data->status == 0 ? 'Active' : 'In-Active';
              $text .='<a href="'.route($stsUrl, $data->slug).'" class="dropdown-item">'.$status.'</a>';
            }
            $text .='</div>';
            $text .='</div>';

            return $text;
}
 
function checkcarttatal()
{
  return 1;
}

function getAllValueWithMeta($key, $type) {
       $chk = \App\Models\Admin\PageMetaTag::where(['key'=> $key, 'type'=> $type])->first();

       if(!empty($chk)) {
        return $chk->keyValue;
       } else {
        $c =new \App\Models\Admin\PageMetaTag;
        $c->key = $key;
        $c->keyValue = '';
        $c->type = $type;
        $c->save();
       }
     }



function ActiveRouteMenu($slug,$routes=[],$classes,$var=0)
{

  $routeName = \Request::route()->getName();

  $varr = Request::route('slug') === $slug && $var == 1 ? $classes : '';

  return Request::route('slug') === $slug && in_array($routeName, $routes) ? $classes : $varr;
}


function activeCategoryMetaData($user_id, $category_id, $val, $type)
{
            $c= \App\VendorCategoryMetaData::where('user_id',$user_id)
                                   ->where('category_id',$category_id)
                                   ->where('type',$type)
                                   ->where('keyValue',$val)
                                   ->count();
            return $c > 0 ? 'checked' : '';                       
}



function getBasicInfo($user_id, $category_id,$type,$key)
{
            $c= \App\VendorCategoryMetaData::where('user_id',$user_id)
                                   ->where('category_id',$category_id)
                                   ->where('type',$type)
                                   ->where('key',$key);
                                   $cc= $c->first();
            return $c->count() > 0 ? $cc->keyValue : '1';                       
}




function activePackageMetaData($user_id, $category_id, $val, $type, $package_id)
{
      $c= \App\PackageMetaData::where(['user_id'=> $user_id, 'package_id' => $package_id ,'category_id'=> $category_id, 'type'=> $type, 'key_value'=> $val])
        ->count();

      return $c > 0 ? 'checked' : '';                       
}


function actionWithSlug($slug,$return){

   $url = \Request::fullUrl();

   $urls = getAllCommonUrlOfVendManagement($slug);


return in_array($url, $urls) ? $return: '';

}


function getAllCommonUrlOfVendManagement($slug)
{
   
   return $array = [
       // url(route('vendor_category_management',$slug)),
       // url(route('vendor_category__image_management',$slug)),
       // url(route('vendor_category_videos_management',$slug)),
       // url(route('vendor_faqs_management',$slug)),
       // url(route('vendor_description_management',$slug)),
       // url(route('vendor_style_management',$slug)),
       // url(route('get_vendor_services_management',$slug)),
       // url(route('get_vendor_amenity_management',$slug)),
       // url(route('get_vendor_event_management',$slug)),
       // url(route('vendor_packages_management',$slug))
   ];
}

function events($user_id,$category_id,$event_id)
{

  //return $user_id.'---'.$category_id.'--'.$amenity_id;
    $vv = \App\VendorEventGame::where('user_id',$user_id)
    ->where('category_id',$category_id)
    ->where('event_id',$event_id)
    ->count();

    return $vv > 0 ? 'checked' : '';
}



function categories($user_id,$category_id)
{

  // return $user_id.'---'.$parent.'--'.$category_id;
    $vv = \App\VendorCategory::where('user_id',$user_id)
    ->where('category_id',$category_id)
    //->where('parent',$parent)
    ->count();

    return $vv > 0 ? 'checked' : '';
}


function amenities($user_id,$category_id,$amenity_id)
{

  //return $user_id.'---'.$category_id.'--'.$amenity_id;
    $vv = \App\VendorAmenity::where('user_id',$user_id)
    ->where('category_id',$category_id)
    ->where('amenity_id',$amenity_id)
    ->count();

    return $vv > 0 ? 'checked' : '';
}
function checkVisterToday()
{
     // $PageVist = \App\PageVist::where('') 
 
     //$date = \Carbon\Carbon::today()->subDays(1)->timezone('America/Los_Angeles');

       $date = new DateTime("now", new DateTimeZone('America/Los_Angeles') );
       $date = $date->format('Y-m-d 00:00:00');

       $users = \App\PageVisit::where('created_at', '>=', $date)
                           //->groupBy('Ip_address')
                           ->distinct()
                            ->get(['Ip_address']);
                          // ->count();
     return count($users);
}

function TodayTotalUsers()
{
     // $PageVist = \App\PageVist::where('') 

          $date = new DateTime("now", new DateTimeZone('America/Los_Angeles') );
          $date = $date->format('Y-m-d 00:00:00');

    // return $date = \Carbon\Carbon::today()->subDays(1)->timezone('America/Los_Angeles');
        //$carbon = new \Carbon\Carbon('YYYY-MM-DD HH:II:SS', 'America/Los_Angeles');


     $users = \App\User::where('created_at', '>=', $date)->count();
     return $users;
}

function customURL($link)
{
   $prefix = \Request::segment(1);

     $url = $prefix == "mockup-generator" ? "mockup-generator/".$link : $link;

     return url($url);
}

function sendMailRequsetDemo($templateId,$getdata){

 $email = \App\EmailTemplate::find($templateId);

   if(!empty($email)){



            $data = [
              'email' => $email,
              'user' => $getdata,
              'templateID' => $templateId
            ];
            /*return $data;*/

    //    return view('emails.custom_email',$data);

           \Mail::send('emails.requestdemo',$data, function($message) {
               $message->to('defttest@yopmail.com', 'Admin')
               ->subject('Requested Information');
               //$message->from('xyz@gmail.com','Virat Gandhi');
            });

   }
}



function mockupTOOL($prefix,$link)
{
     
      
     
     $product_size = $prefix == "mockup-generator" ? \App\Product::where('slug',$link)->first() : '';


     $url = $prefix == "mockup-generator" ? route('create_design_new_mockup_design',$link).'?product_sizes='.$product_size->product_sizes : route('product-detail',$link);
     return url($url);
}



/*_____________________________________________________________________________
|
|  Email Send
|______________________________________________________________________________
*/



function sendEmail($templateID,$userID,$orderID=0,$preview='',$data_array='')
{
   $email = \App\EmailTemplate::find($templateID);



   if(!empty($email)){
           
            if(get_email_subscribe_status($templateID,$userID,'email')==0){
              return 0;
            }
           
            

            $user = \App\User::find($userID);
            $orders= \App\Order::find($orderID);
            $order = listOrderlist($orders);



          $arr = getEmailDetailIfGuestOrNot($user,$orderID,$email);



           

            $orderID = !empty($orders) ? $orders->orderID : '';


            $data = [
              'email' => $email,
              'user' => $user,
              'orders' => $orders,
              'order' => $order,
              'orderID' => $orderID,
              'templateID' => $templateID,
              'data_array'=>$data_array
            ];




          if(!empty($orders)){
              
              $details['title'] = "Order";
              $details['detail'] = Notification_message($orders);
              $details['link'] = url(route('my_orders'));  
              allnotifications($user,$details);
          }
          
          
          if($preview=='preview'){
            return view('emails.custom_email',$data);  
          }
   

           \Mail::send('emails.custom_email',$data, function($message) use($arr) {
               $message->to($arr['email'], $arr['name'])
               ->subject($arr['subject']);
           });

   }
}

function Notification_message($order){

  $data_array=array(0=>"New Order Placed",1=>"New Order Placed",2=>"New Order Placed",3=>"New Order Placed",4=>"New Order Placed",5=>"New Order Placed");
  return $data_array[$order->status];

}


function getEmailDetailIfGuestOrNot($user,$orderID,$email)
{

         $billingAddress= \DB::table('billing_addresses')
                        ->where('order_id',$orderID)
                        ->first();
  if(!empty($billingAddress) && $user->role == "guest"){

        
         $arr =[
                  'email' => $billingAddress->email,
                  'name' => $billingAddress->first_name.' '.$billingAddress->last_name,
                  'subject' => $email->title,
            ];


  }else{

    $arr =[
                  'email' => $user->email,
                  'name' => $user->name,
                  'subject' => $email->title,
            ];
  }

  return $arr;
//1565962114ieaZtd3jSufQQX176cJ7-1551857355VMhRytlJvfv6MY1rkhhn-logo-_1_.png
}






function sendEmail2($templateID,$userArray,$orderID=0)
{
   $email = \App\EmailTemplate::find($templateID);

   if(!empty($email)){

           
            if(\Auth::check() && \Auth::user()->role == "user"){
                 
                  $user = \Auth::user();

            }else{

                 $user = (object)$userArray;
              
            }

            $orders= \App\Order::find($orderID);
            $order = listOrderlist($orders);


           $arr =[
                 'email' => $user->email,
                 'name' => $user->name,
                 'subject' => $email->title,
            ];

            $orderID = !empty($orders) ? $orders->orderID : '';


            $data = [
              'email' => $email,
              'user' => $user,
              'order' => $order,
              'orderID' => $orderID,
              'templateID' => $templateID
            ];

             if(!empty($orders)&&isset($user->id)){
              
              $details['title'] = "Order";
              $details['detail'] = Notification_message($orders);
              $details['link'] = url(route('my_orders'));  
              allnotifications($user,$details);
          }

    //    return view('emails.custom_email',$data);

           \Mail::send('emails.custom_email',$data, function($message) use($arr) {
               $message->to($arr['email'], $arr['name'])
               ->subject($arr['subject']);
               
            });

   }
}



function listOrderlist($order)
{
   

   if(!empty($order)){
       
       $totalamount =$order->totalAmount->sum('subtotal');

        $vv = view('emails.orderdetail')->with(['order'=>$order, 'totalamount' => $totalamount]);

       return $vv->render();
   
   }

}




function getProductDetailFromDatabases($id,$color,$price,$size)
{


   $product = \App\Product::with('brand')->where('id',$id)->first();
    
   $text ='<div class="row">';
   $text .='<div class="col-md-4">';
   $text .='<img src="'.url($product->main_image).'" class="img-responsive" width="100">';
   $text .='</div>';
   $text .='<div class="col-md-8">';
   $text .='<h4>'.$product->product_name.'</h4>';
   $text .='<h5><b>Brand</b>: '.$product->brand->brand_name.'</h5>';
   $text .='<h5><b>Price</b>: $'.$price.'</h5>';


   $text .='<h5><b>Color</b>: '.$color.'</h5>';

   if(!empty($size))
    {
        
      $text .='<h5><b>Size</b>: '.$size->title.'</h5>';

    }

   $text .='</div>';
   $text .='</div>';

   return $text;
}










function WH($widthHedight,$percent)
    {
            
         $w = ($widthHedight / 100) * $percent;
        return $w;    
    }


function imageRatio($orignalHeight,$orignalWidth,$newWidth)
{
  // (original height / original width) x new width = new height
    

    $newHeight = ($orignalHeight / $orignalWidth) * $newWidth; 
    return $newHeight;
}

   function custom_link($link)
   {
   	   return url($link);
   }

   function userinfo(){
   		return $user = \Auth::user();
   }

	function textbox($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}

		if($v == ""){
			$v1="is-empty";
		}else{
			$v1="is-focused";
		}
		$text = "";
		// $text .= "<div class='form-group'>";
		// $text .="<label>$label</label>";
		// $text .= "<input type='text' class='form-control $border' name='$name' value='".$v."'>";
		// $text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		// $text .="</div>";
        $text .="<div class='form-group label-floating $v1'>";
         $text .="<label class='control-label'>$label</label>";
         $text .='<input type="text" class="form-control '.$border.'" name="'.$name.'" value="'.$v.'" id="'.$name.'">';
		 $text .="<span class='material-input'></span>";
		  $text .="<label for='$name' class='error'>".$errors->first($name)."&nbsp;".$ex."</label>";
		 $text .="</div>";

		echo $text;
	}


  function textnumber($errors,$label, $name,$value=null,$min=null,$max=null){
    if($errors->has($name)){
      $border="BORDER";
    }else{
      $border="";
    }
        if(Session::has($name)){
          $ex=Session::get($name);
          $border="BORDER";
        }else{
          $ex="";
        }


    if($value==null){
      $v=old($name);
    }else{
      $v=$value;
    }

    if($v == ""){
      $v1="is-empty";
    }else{
      $v1="is-focused";
    }
    $text = "";
    // $text .= "<div class='form-group'>";
    // $text .="<label>$label</label>";
    // $text .= "<input type='text' class='form-control $border' name='$name' value='".$v."'>";
    // $text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
    // $text .="</div>";
    $text .="<div class='form-group label-floating $v1'>";
    $text .="<label class='control-label'>$label</label>";
    $text .='<input type="number" class="form-control '.$border.'"  min="'.$min.'"   max="'.$max.'" name="'.$name.'" value="'.$v.'" id="'.$name.'">';
    $text .="<span class='material-input'></span>";
    $text .="<label for='$name' class='error'>".$errors->first($name)."&nbsp;".$ex."</label>";
    $text .="</div>";

    echo $text;
  }




function cm2feet($cm)
{
    if($cm > 0 ):
         $inches = $cm/2.54;
     // $feet = intval($inches/12);
     // $inches = $inches%12;
     // return sprintf('%d ft %d ins', $feet, $inches);

     return round($inches,1);
   endif;
}
















function color($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}

		if($v == ""){
			$v1="is-empty";
		}else{
			$v1="is-focused";
		}
		$text = "";
		// $text .= "<div class='form-group'>";
		// $text .="<label>$label</label>";
		// $text .= "<input type='text' class='form-control $border' name='$name' value='".$v."'>";
		// $text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		// $text .="</div>";
        $text .="<div class='form-group label-floating $v1'>";
         $text .="<label class='control-label'>$label</label>";
         $text .="<input type='color' class='form-control $border' name='$name' value='".$v."' id='$name'>";
		 $text .="<span class='material-input'></span>";
		  $text .="<label for='$name' class='error'>".$errors->first($name)."&nbsp;".$ex."</label>";
		 $text .="</div>";

		echo $text;
	}






function color2($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}

		if($v == ""){
			$v1="is-empty";
		}else{
			$v1="is-focused";
		}
		$text = "";
		$text .='<div class="form-group '.$border.'">';
		$text .='<label>'.$label.'</label>';

		$text .='<div class="input-group my-colorpicker2 colorpicker-element">';
		$text .="<input type='text' class='form-control $border' name='$name' value='".$v."' id='$name'>";
		$text .='<div class="input-group-append">';
		$text .='<span class="input-group-text"><i class="fa fa-square"></i></span>';
		$text .='</div>';
		$text .='</div>';
		$text .="<label for='$name' class='error'>".$errors->first($name)."&nbsp;".$ex."</label>";
		$text .='</div>';

		echo $text;
	}













function distance($lat1, $lon1, $lat2, $lon2, $unit) {




  $theta = sin(deg2rad($lon1)) - sin(deg2rad($lon2));
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}


function GetDrivingDistance($lat1, $lat2, $long1, $long2)
{
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

    return array('distance' => $dist, 'time' => $time);
}


function distanceBetweenlatlong($lat2, $lon2, $unit)
 {

//  	 $data =getUserLatlng();

//  	 $details = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$data['lat'].",".$data['lng']."&destinations=".$lat2.",".$lon2."&key=AIzaSyAmQrevuFAK-iBAxiTPk4Gl9SsSrT5vfuY";


//    $json = file_get_contents($details);

//    $details = json_decode($json, TRUE);

    
  

// if($details['rows'][0]['elements'][0]['status'] == "OK" && $details['status'] == "OK"){
//          echo $details['rows'][0]['elements'][0]['distance']['text'];  
// }
 

 
 

 

        

}









//  function get_meters_between_points($latitude1, $longitude1, $latitude2, $longitude2) {
// 	if (($latitude1 == $latitude2) && ($longitude1 == $longitude2)) { return 0; } // distance is zero because they're the same point
// 	$p1 = deg2rad($latitude1);
// 	$p2 = deg2rad($latitude2);
// 	$dp = deg2rad($latitude2 - $latitude1);
// 	$dl = deg2rad($longitude2 - $longitude1);
// 	$a = (sin($dp/2) * sin($dp/2)) + (cos($p1) * cos($p2) * sin($dl/2) * sin($dl/2));
// 	$c = 2 * atan2(sqrt($a),sqrt(1-$a));
// 	$r = 6371008; // Earth's average radius, in meters
// 	$d = $r * $c;
// 	return $d; // distance, in meters
// }

// function get_distance_between_points($latitude1, $longitude1, $latitude2, $longitude2) {
// 	$meters = get_meters_between_points($latitude1, $longitude1, $latitude2, $longitude2);
// 	return $kilometers = $meters / 1000;
// 	$miles = $meters / 1609.34;
// 	$yards = $miles * 1760;
// 	$feet = $miles * 5280;


// 	//return compact('miles','feet','yards','kilometers','meters');
// }



















function distanceBetweenTwoLocation($lat1, $lon1,$unit) {
        $data =getUserLatlng();
	  $lat2=$data['lat'];
	  $lon2=$data['lng'];

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return round($miles * 1.609344,2);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}


 

function getUserLatlng(){

	    

	     	   if(\Session::has('locationlat')){
                       
                   $lat1=\Session::get('locationlat');
                   $lon1=\Session::get('locationlng');
                      
              }else{
              	$lat1=0;
              	$lon1=0;
              }

	     
     
     $array=array("lat"=>$lat1,"lng"=>$lon1);

         return $array;


}




function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {

               
 	         if(\Session::has('lat')){
                       
                       $point1_lat=deg2rad(round(\Session::get('lat')));
                       $point1_long=deg2rad(round(\Session::get('lng')));
                      
              } 


	// Calculate the distance in degrees
	$degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
 
	// Convert the distance in degrees to the chosen unit (kilometres, miles or nautical miles)
	switch($unit) {
		case 'km':
			$distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
			break;
		case 'mi':
			$distance = $degrees * 69.05482; // 1 degree = 69.05482 miles, based on the average diameter of the Earth (7,913.1 miles)
			break;
		case 'nmi':
			$distance =  $degrees * 59.97662; // 1 degree = 59.97662 nautic miles, based on the average diameter of the Earth (6,876.3 nautical miles)
	}
	return round($distance, $decimals);
}


















function textbox3($errors,$label, $name,$value=null,$readonly=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}

		if($readonly == null){
			$read ="";
		}else{
			$read="readonly";
		}

		if($v == ""){
			$v1="is-empty";
		}else{
			$v1="is-focused";
		}
		$text = "";
		 
                                   $text .="<div class='form-group label-floating $v1'>";
                                   $text .="<label class='control-label'>$label</label>";
                                   $text .="<input type='text' class='form-control $border' name='$name' value='".$v."' id='".$name."' $read>";
			                       $text .="<span class='material-input'></span>";
			                       $text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
			                       $text .="</div>";

		echo $text;
	}



function CheckAblityOfRoomsAdults($rooms,$adults)
{
	        

           $perRoomAdults=$adults / 2;

	       if($perRoomAdults > $rooms ){

	       	   return 0;
	       }else{
	       	return 1;
	       }
}


function CheckAblityOfRoomsChildrens($rooms,$children)
{
	        
           if($children != ""){

           	    $perRoomChildrens=$children / 2;

	           if($perRoomChildrens > $rooms ){

	       	        return 0;
	           }
           } 
           
}






 function timebox($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}
		$text = "";
		$text .= "<div class='form-group'>";
		$text .="<label>$label</label>";

		 $text .='<div class="input-group bootstrap-timepicker timepicker">';
     
            $text .= "<input type='text'id='timepicker1' class='form-control input-small $border' name='$name' value='".$v."'>";
            $text .='<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>';
        $text .='</div>';
		
		$text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		$text .="</div>";

		echo $text;
	} 


function Checked($array,$var)
{
	if($array != ""){


        foreach ($array as $key) {
              if($key == $var){
                   echo "checked";
                }
        }}
}

function Checked2($val,$var)
{
	 
              if($val == $var){
                   echo "checked";
                }
         
}

function CheckedServices($id,$var)
{
	$q=\App\RoomServices::where('type_id','=',$id)->where('service_id','=',$var)->first();
    if(count($q) !=0){
    	echo "checked";
    }
}


function CheckedFacility($id,$var)
{
	$q=\App\RoomFacility::where('type_id','=',$id)->where('facility_id','=',$var)->first();
    if(count($q) != 0){
    	echo "checked";
    }
}




function DeleteFacility($id)
{
	$q=\App\RoomFacility::where('type_id','=',$id)->get();
    if(count($q) != 0){

    	foreach ($q as $k) {
    		 $qe=\App\RoomFacility::find($k->id);
    		 $qe->delete();
    	}
    	
    }

    
}

function DeleteServices($id)
{
	$q=\App\RoomServices::where('type_id','=',$id)->get();
    if(count($q) != 0){

    	foreach ($q as $k) {
    		 $qe=\App\RoomServices::find($k->id);
    		 $qe->delete();
    	}
    	
    }

    
}









 function timebox2($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}
		$text = "";
		$text .= "<div class='form-group'>";
		$text .="<label>$label</label>";

		 $text .='<div class="input-group bootstrap-timepicker timepicker">';
     
            $text .= "<input type='text'id='timepicker' class='form-control input-small $border' name='$name' value='".$v."'>";
            $text .='<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>';
        $text .='</div>';
		
		$text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		$text .="</div>";

		echo $text;
	}   












function createDateRange($startDate, $endDate, $format = "Y-m-d")
{
    $begin = new DateTime($startDate);
    $end = new DateTime($endDate);

    $interval = new DateInterval('P1D'); // 1 Day
    $dateRange = new DatePeriod($begin, $interval, $end);

    $range = [];
    foreach ($dateRange as $date) {
        $range[] = $date->format($format);
    }
     $range[] = $endDate;
    return $range;
}


function GetMonthName($v)
{
	$month=strtolower($v);
      



	$mons = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");

        
       $dat=date('m',strtotime($v));

      return  $month_name = $mons[$dat];

}

function monthName($v)
{
	 
       $month=date('m',$v);

       return MonthNaming($month);
}



function MonthNaming($month)
{
	switch ($month) {
       case '01':
           return "January";
           break;
       case '02':
           return "February";
           break;
       case '03':
           return "March";
           break;
       case '04':
          return  "April";
           break;
       case '05':
          return  "May";
           break;
       case '06':
           return "June";
           break;
       case '07':
           return "July";
           break;
       case '08':
           return "August";
           break;
       case '09':
           return "September";
           break;
       case '10':
            return "October";
            break;
       case '11':
            return "November";
            break;
       case '12':
            return "December";
            break;
        default:
    		# code...
    		break;

    }


     
}


function CheckErrors($schedules){
	    $range=0;

            foreach ($schedules as $key) {
                 
                   if($key == ""){
                   	$range++;
                   }

            }
 
      //     return $request->schedules;
      
      return $range; 
        
}


function CheckScheduleDateExists($startDate, $endDate, $format = "Y-m-d")
{
    $begin = new DateTime($startDate);
    $endDate = date($format, strtotime($endDate . ' +1 day'));
    $end = new DateTime($endDate);

    $interval = new DateInterval('P1D'); // 1 Day
    $dateRange = new DatePeriod($begin, $interval, $end);

    $range = [];
    foreach ($dateRange as $date) {
    	 $schedules=DB::table('schedules')->where('date','=',$date->format($format))->where('status','=',1)->first();
    	  if(count($schedules) !=0){
    	  	  $range[] = $date->format($format);
    	  }
        
    }
    
    return $range;
}



function DateBox($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}
		$text = "";
		$text .= "<div class='form-group'>";
		$text .="<label>$label</label>";
		$text .= "<input type='date' class='form-control $border' id='$name' name='$name' value='".$v."'>";
		$text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		$text .="</div>";

		echo $text;
 }


	
function DateBox2($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}
		$text = "";
		$text .= "<div class='form-group'>";
		$text .="<label>$label</label>";
		$text .= "<input type='text' class='form-control $border' id='datepicker2' name='$name' value='".$v."'>";
		$text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		$text .="</div>";

		echo $text;
	}


function Photo($dir,$path,$class=null){

	     echo "<img src='/$dir/$path' class='$class'>";
}

function textbox2($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}
		$text = "";
		$text .= "<div class='form-group'>";
	
		$text .= "<input type='text' class='form-control $border' placeholder='$label' name='$name' value='".$v."'>";
		$text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		$text .="</div>";

		echo $text;
	}

function countsubcategory($id){
	$sub=Subcategory::where('status','=',1)->where('category_id','=',$id)->get();
	echo count($sub);
}

function select($errors,$label,$name,$array,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }
       

		if($value==null){
			$v=0;
		}else{
			$v=$value;
		}

		if($v == ""){
			$v1="is-empty";
		}else{
			$v1="";
		}
	 	 $old=old($name);
		 $text = "";
		 $text .="<div class='form-group label-floating is-focused'>";
         $text .="<label class='control-label'>$label</label>";

         $text .= "<select class='form-control $border' name='$name' id='$name'>";
         $text .="<option value=''>Select</option>";    
          foreach ($array as $key) {
                  if($key['id'] == $v || $old == $key['id'] ){
                        
                  	    $text .="<option value='".$key['id']."' selected>".$key[$name]."</option>";    

                  }else{
                        
                  	    $text .="<option value='".$key['id']."'>".$key[$name]."</option>";

                  }         
                                

          }

		
	
		$text .="</select>";
		$text .="<span class='material-input'></span>";	
		$text .="<label class='error' for='$name'>".$errors->first($name)."&nbsp;".$ex."</label>";
		$text .="</div>";

		echo $text;
	}



function selectMultiple($errors,$label,$name,$id,$colname,$array,$value=null){
    if($errors->has($name)){
      $border="BORDER";
    }else{
      $border="";
    }
        if(Session::has($name)){
          $ex=Session::get($name);
          $border="BORDER";
        }else{
          $ex="";
        }
       

    if($value==null){
      $v=[];
    }else{
      $v=$value;
    }

    if($v == ""){
      $v1="is-empty";
    }else{
      $v1="";
    }
     $old=old($name);
     $text = "";
     $text .="<div class='form-group label-floating is-focused'>";
         $text .="<label class='control-label'>$label</label>";

         $text .= "<select class='form-control $border' name='$name' id='$id' multiple>";
         $text .="<option value=''>Select</option>";    
          foreach ($array as $key) {
                  if(in_array($key->id,$v)){
                        
                        $text .="<option value='".$key['id']."' selected>".$key[$colname]."</option>";    

                  }else{
                        
                        $text .="<option value='".$key['id']."'>".$key[$colname]."</option>";

                  }         
                                

          }

    
  
    $text .="</select>";
    $text .="<span class='material-input'></span>"; 
    $text .="<label class='error' for='$name'>".$errors->first($name)."&nbsp;".$ex."</label>";
    $text .="</div>";

    echo $text;
  }

  function select4($errors,$label,$name,$col,$select,$array,$value=null){
    if($errors->has($name)){
      $border="BORDER";
    }else{
      $border="";
    }
        if(Session::has($name)){
          $ex=Session::get($name);
          $border="BORDER";
        }else{
          $ex="";
        }
       

    if($value==null){
      $v=0;
    }else{
      $v=$value;
    }

    if($v == ""){
      $v1="is-empty";
    }else{
      $v1="";
    }
     $old=old($name);
     $text = "";
     $text .="<div class='form-group label-floating is-focused'>";
         $text .="<label class='control-label'>$label</label>";

         $text .= "<select class='form-control $border' name='$name' id='$name'>";
         $text .="<option value=''>select</option>";    
         $text .="<option value='0'>".$select."</option>";    
          foreach ($array as $key) {
                  if($key['id'] == $v || $old == $key['id'] ){
                        
                        $text .="<option value='".$key['id']."' selected>".$key[$col]."</option>";    

                  }else{
                        
                        $text .="<option value='".$key['id']."'>".$key[$col]."</option>";

                  }         
                                

          }

    
  
    $text .="</select>";
    $text .="<span class='material-input'></span>"; 
    $text .="<label class='error' for='$name'>".$errors->first($name)."&nbsp;".$ex."</label>";
    $text .="</div>";

    echo $text;
  }

	function select3($errors,$label,$name,$col,$select,$array,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }
       

		if($value==null){
			$v=0;
		}else{
			$v=$value;
		}

		if($v == ""){
			$v1="is-empty";
		}else{
			$v1="";
		}
	 	 $old=old($name);
		 $text = "";
		 $text .="<div class='form-group label-floating is-focused'>";
         $text .="<label class='control-label'>$label</label>";

         $text .= "<select class='form-control $border' name='$name' id='$name'>";
         $text .="<option value='".$select."'>Select</option>";    
          foreach ($array as $key) {
                  if($key['id'] == $v || $old == $key['id'] ){
                        
                  	    $text .="<option value='".$key['id']."' selected>".$key[$col]."</option>";    

                  }else{
                        
                  	    $text .="<option value='".$key['id']."'>".$key[$col]."</option>";

                  }         
                                

          }

		
	
		$text .="</select>";
		$text .="<span class='material-input'></span>";	
		$text .="<label class='error' for='$name'>".$errors->first($name)."&nbsp;".$ex."</label>";
		$text .="</div>";

		echo $text;
	}


     function choosefile($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="has-error";
		}else{
			$border="";
		}
		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}


		if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }
		$text = "";
		$text .= "<div class='form-group is-empty '>";
		$text .="<label class='label-file'>$label</label>";
		$text .= "<input type='file' class='form-control $border custom-file-input2' name='$name' value='".$v."'> ";
		$text .="<label for='$name' class='error'>".$errors->first($name)."&nbsp;".$ex."</label>";
		$text .="</div>";

		echo $text;

                    
                
	}












function choosefile2($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="has-error";
		}else{
			$border="";
		}
		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}


		if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }
		$text = "";
		// $text .= "<div class='form-group is-empty '>";
		// $text .="<label class='label-file'>$label</label><div class='custom-file file-upload-own'>";
		// $text .= "<input type='file' class='form-control $border custom-file-input' name='$name' value='".$v."'><span class='custom-file-control sctm-img-up'><img src='/images/Upload.svg' alt=''></span> </div>";
		// $text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		// $text .="</div>";


	   $text .='<div class="form-group">';
       $text .="<label class='label-file'>$label</label>";
       $text .='<div class="input-group">';
       $text .='<div class="custom-file $border">';
        
       $text .= "<input type='file' class='custom-file-input ' name='$name'>";
       $text .='<label class="custom-file-label" for="exampleInputFile">Choose file</label>';
       $text .='</div>';
       $text .='<div class="input-group-append">';
       $text .='<span class="input-group-text" id="">Upload</span>';
       $text .='</div>';
       $text .='</div>';
       $text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
       $text .='</div>';

		echo $text;



 
                    
                
	}



function choosefilemultiple($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}

		if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }
        
        $la = strtolower($label);
        $ar=explode(' ', $la);
        $labelID =  implode('_',$ar);




		$text = "";
		$text .= "<div class='form-group'>";
		$text .="<label>$label</label>";
		$text .= "<input type='file' class='form-control $border' name='$name' id='$labelID' multiple>";
		$text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		$text .="</div>";

		echo $text;
	}




function selectsimple2($errors,$label,$name,$array,$select="select",$value=null){
    if($errors->has($name)){
      $border="BORDER";
    }else{
      $border="";
    }
        if(Session::has($name)){
          $ex=Session::get($name);
          $border="BORDER";
        }else{
          $ex="";
        }


    if($value==null){
      $v='m';
    }else{
      $v=$value;
    }
    $old=old($name);
    $text = "";
    $text .= "<div class='form-group label-floating is-focused' id=".$name.">";
    $text .="<label class='control-label'>$label</label>";
        $text .= "<select class='form-control $border' name='$name'>";   
        $text .="<option value='' selected>".$select."</option>"; 
          foreach ($array as $key => $val) {
                  if($key == $v || $old == $key){

                        $text .="<option value='".$key."' selected>".$val."</option>";    
                  }else{
                        $text .="<option value='".$key."'>".$val."</option>";
                  }         
                                

          }

    
  
    $text .="</select>";  
      $text .="<label class='error' for='$name'>".$errors->first($name)."&nbsp;".$ex."</label>";
    $text .="</div>";

    echo $text;
  }


function selectsimple($errors,$label,$name,$array,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v='m';
		}else{
			$v=$value;
		}
		$old=old($name);
		$text = "";
		$text .= "<div class='form-group label-floating is-focused' id=".$name.">";
		$text .="<label class='control-label'>$label</label>";
        $text .= "<select class='form-control $border' name='$name'>";   
          foreach ($array as $key => $val) {
                  if($key == $v || $old == $key){

                  	    $text .="<option value='".$key."' selected>".$val."</option>";    
                  }else{
                  	    $text .="<option value='".$key."'>".$val."</option>";
                  }         
                                

          }

		
	
		$text .="</select>";	
			$text .="<label class='error' for='$name'>".$errors->first($name)."&nbsp;".$ex."</label>";
		$text .="</div>";

		echo $text;
	}



function selectsimpleYear($errors,$label,$name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v='m';
		}else{
			$v=$value;
		}
		$old=old($name);
		$text = "";
		$text .= "<div class='form-group label-floating is-focused'>";
		$text .="<label class='control-label'>$label</label>";
        $text .= "<select class='form-control $border' name='$name' id='$name'>";
        $text .="<option value=''>Select</option>";   

        $end=date('Y') + 10;

        for ($i=date('Y'); $i < $end; $i++) { 
        	 

                  if($i == $v || $old == $i){

                  	    $text .="<option value='".$i."' selected>".$i."</option>";    
                  }else{
                  	    $text .="<option value='".$i."'>".$i."</option>";
                  }         
                                

          }

		
	
		$text .="</select>";	
		$text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		$text .="</div>";

		echo $text;
	}



function selectsimpleMonth($errors,$label,$name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
        if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }


		if($value==null){
			$v='m';
		}else{
			$v=$value;
		}
		$old=old($name);
		$text = "";
		$text .= "<div class='form-group label-floating is-focused'>";
		$text .="<label class='control-label'>$label</label>";
        $text .= "<select class='form-control $border' name='$name' id='$name'>";
        $text .="<option value=''>Select</option>";   

        

        for ($i=1; $i <= 12; $i++) { 
        	 

                  if($i == $v || $old == $i){

                  	    $text .="<option value='".$i."' selected>".$i."</option>";    
                  }else{
                  	    $text .="<option value='".$i."'>".$i."</option>";
                  }         
                                

          }

		
	
		$text .="</select>";	
		$text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		$text .="</div>";

		echo $text;
	}
function textarea($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}
		$text = "";
		$text .= "<div class='form-group '>";
		$text .= "<label class='control-label'>$label</label>";
		$text .= "<textarea class='form-control $border myTextEditor' id='$name' name='$name' rows='5' col='10'>".$v."</textarea>";
		$text .= "<p class='error'>".$errors->first($name)."</p>";
		$text .= "</div>";

		echo $text;
	}

function textareackeditor($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}
		$text = "";
		$text .= "<div class='form-group'>";
		$text .= "<label class='control-label'>$label</label>";
		$text .= "<textarea class='form-control ckeditor $border myTextEditor' id='$name' name='$name'>".$v."</textarea>";
		$text .= "<p class='error'>".$errors->first($name)."</p>";
		$text .= "</div>";

		echo $text;
	}

function textarea2($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
		if($value==null){
			$v=old($name);
		}else{
			$v=$value;
		}
		$text = "";
		$text .= "<div class='form-group'>";
	    	
		$text .= "<textarea class='form-control $border myTextEditor' placeholder='$label' name='$name' style='height:150px;'>".$v."</textarea>";
		$text .="<p class='error'>".$errors->first($name)."</p>";
		$text .="</div>";

		echo $text;
	}



     function ratting($id,$val){

     	   if($id == $val){
            echo "checked";
     	   } 
     }

     function rattingOld($id){

     	   if($id == old('rating')){
            echo "checked";
     	   } 
     }



function password($errors,$label,$name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
		if(old($name)!=null){
			$v=old($name);
		}else{
			$v=$value;
		}

		if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }

		$text = "";
		// $text .= "<div class='form-group'>";
		// $text .="<label>$label</label>";
		// $text .= "<input type='password' class='form-control $border' name='$name' value='$v' >";
		// $text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		// $text .="</div>";
		   $text .="<div class='form-group label-floating is-empty'>";
           $text .="<label class='control-label'>$label</label>";
           $text .= "<input type='password' class='form-control $border' name='$name' value='$v' id='$name'>";
			 $text .="<span class='material-input'></span>";
			 $text .="<label class='error' for='$name'>".$errors->first($name)."&nbsp;".$ex."</label>";
			 $text .="</div>";

		echo $text;
	}







function password2($errors,$label,$name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
		if(old($name)!=null){
			$v=old($name);
		}else{
			$v="";
		}

		if(Session::has($name)){
        	$ex=Session::get($name);
        	$border="BORDER";
        }else{
        	$ex="";
        }

		$text = "";
		$text .= "<div class='form-group'>";
		
		$text .= "<input type='password' class='form-control $border' placeholder='$label' name='$name'  >";
		$text .="<p class='error'>".$errors->first($name)."&nbsp;".$ex."</p>";
		$text .="</div>";

		echo $text;
	}
 
 
function custom_format($n, $d = 0) {
    $n = number_format($n, $d, '.','');
    $n = strrev($n);

    if ($d) $d++;
    $d += 3;

    if (strlen($n) > $d)
        $n = substr($n, 0, $d) . ','
            . implode(',', str_split(substr($n, $d), 2));

    return strrev($n);
}



	function textareawithouteditor($errors,$label, $name,$value=null){
		if($errors->has($name)){
			$border="BORDER";
		}else{
			$border="";
		}
		if($value==null){
			$v= old($name);
		}else{
			$v=$value;
		}
		$text = "";
		$text .= "<div class='form-group'>";
		$text .="<label class='control-label'>$label</label>";
		$text .= "<textarea class='form-control $border' name='$name' id='hindiTypingTextarea'>".$v."</textarea>";
		$text .=" <p class='error'>".$errors->first($name)."</p>";
		$text .="</div>";

		echo $text;
	}



function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array())  {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email )))  ;
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return "<img src='".$url."'>";
}

function CountComments($v)
{
	$comments=App\model\Comments::where('status','=',1)->where('blog_id','=',$v)->get(); 
    
    return count($comments);

}
	













function HTMTimage($value,$name,$realname)
{

	 
	?>
        <div class="imageOpenFile">
        <div class="olay">
          <a href="<?= $realname ?>" class="OpenFileDeleted">Delete</a>
          <a href="<?= $value ?>" class="OpenFileChoosed" id="<?=$name?>">Choose</a>
          <a href="<?= $value ?>" class="OpenFileViewd">View</a>

        </div>
            <img src="<?= $value ?>">
          
        </div>
	<?php
}







// for image uploaded plugin

function ImageUploaded($errors,$name,$ImageName=null)
{
	     if($ImageName != null){
             $val=$ImageName;
             $image=$ImageName;
          }else{
              $image="/OpenImageFolder/no-image-placeholder.png";
              $val="";
          }




          if($errors->has($name)){

			 $border="Border";
              $ex=$errors->first($name);
		  }else{
            $ex="";
			$border="";
		  }

		  if(old($name) !=""){
               $image=old($name);
                $val=old($name);
		  } 
         
          


?>
  
 <div class="photoOpenfolder ">
	 <a href='' class='OpenImageFolder ChooseFile <?= $border ?>' id='<?=$name?>'>
       
           <img src="<?= $image ?>">

	 </a> 
     <input type="hidden" name="<?=$name ?>" value="<?= $val ?>">
     <p class="error"><?= $ex ?></p>
 </div>     
	
<?php

	 
}


function scanDirectoryImages($directory,$name)
{
        foreach (File::allFiles(public_path().'/'.$directory.'/') as $file)
        {
                $filename = $file->getRelativePathName();

                    echo HTMTimage('/'.$directory.'/'.$filename,$name,$filename);
        }
}

// for image uploaded plugin



// if(!empty($_POST["quantity"])) {
// 		$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
// 		$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
		
// 		if(!empty($_SESSION["cart_item"])) {
// 			if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
// 				foreach($_SESSION["cart_item"] as $k => $v) {
// 						if($productByCode[0]["code"] == $k) {
// 							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
// 								$_SESSION["cart_item"][$k]["quantity"] = 0;
// 							}
// 							$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
// 						}
// 				}
// 			} else {
// 				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
// 			}
// 		} else {
// 			$_SESSION["cart_item"] = $itemArray;
// 		}
// 	}





// Add to cart

function AddBookCart($arr,$rromno){


}

function CheckExistCartRoom($cart,$roomno){
        
	                    foreach ($cart as $k ) {
    
                                if($k->id == $roomno){

                                     return true;

                                } 
                        }
     
        
}


function  OrderByIdOfCart($count){

      $lenth=count($count);

      
      $arr=array();
       for ($i=1; $i <= $lenth; $i++) { 
       
      
               
               foreach ($count as $key ) {
               	          if($key->id == $i){
               	          	$arr[$i]=$key->rowId;
               	          }
               }

           
        
       }

       return $arr;
}


// ratting stars for admin
 






function SripeAccount(){
$data = App\Models\Admin\PageMetaTag::where('type','stripe-credentials');

if($data->count() > 0){

   $json = !empty($data) ? json_decode($data->first()->keyValue) : [];


   $mode = !empty($json->mode) ? 'live' : 'test';
$sk = $mode.'_sk';
$pk = $mode.'_pk';
$client_id = $mode.'_client_id';
   return [
                 'pk'         => $json->$pk,//   'pk_test_dtD5WE757jp1zzxVXexp3BIx',
                 'sk'         => $json->$sk,//  'sk_test_kKoOOeRxs9N93l9t17qQBIza',
                 'client_id'  => $json->$client_id //'ca_CRS1oNfESdOlwL8loL9AgfpHtBv6Ucvc' 
           ];
}else{
      return [
                 'pk'         => '',//   'pk_test_dtD5WE757jp1zzxVXexp3BIx',
                 'sk'         => '',//  'sk_test_kKoOOeRxs9N93l9t17qQBIza',
                 'client_id'  => '' //'ca_CRS1oNfESdOlwL8loL9AgfpHtBv6Ucvc' 
           ];
}


	  

	return $array;
}


function PriceOfBlacknWhiteCopy(){
             $d=WebsiteContent();
	  	return $d->bw_rate;
}

function PriceOfColorCopy()
{
	  $d=WebsiteContent();
	  	return $d->color_rate;
}

function getDeliveryCharge($val,$rate){

	  if($val == 1 || $val == "Delivery"){
           $d=WebsiteContent();
	  	return $rate;

	  }else{

	  	return 0;

	  }
}


function getDeliveryChargeType($val){
	
	  if($val == 1){

	  	return 'Delivery';

	  }else{

	  	return 'Collection';

	  }
}


function Currency(){
	return '£';
}

function emailId(){
	return 'narindersingh733@rediffmail.com';
}

function WebsiteContent()
{
	$data=\DB::table('contents')->select('contents.*')->first();

    	return $data;
}

 
    function ceiling($number, $significance = 0.05)
    {
        return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
    }
 

 function rating($product){


             $total=$product->reviews->sum('rating');
	           $count=$product->reviews->count();
             if($count !=0){

                  $overall=   $total / $count;
                  return custom_format(round($overall,2),1);
             }
  
}

function ProductRate($product)
{
   $pro = $product->parent > 0 ? $product->getParentProductData : $product;
   $rate = rating($pro);
             $total=$pro->reviews->sum('rating');
             $count=$pro->reviews->count();
             $rat = rating($pro);
  $arr =[
       'count' => $count,
       'total' => $total,
       'rating' => ratingStaring($rat,$count),
       'rate' => custom_format($rat,1),
       'overall' => overAllRating($product)
  ];
  return $arr;
}


function ProductReviewRate($rate)
{
  $text  ='<ul class="list-inline">';
  $text .='<li class="list-inline-item"><i class="fa '.getStarFa($rate,1).'"></i></li>';
  $text .='<li class="list-inline-item"><i class="fa '.getStarFa($rate,2).'"></i></li>';
  $text .='<li class="list-inline-item"><i class="fa '.getStarFa($rate,3).'"></i></li>';
  $text .='<li class="list-inline-item"><i class="fa '.getStarFa($rate,4).'"></i></li>';
  $text .='<li class="list-inline-item"><i class="fa '.getStarFa($rate,5).'"></i></li>';
  $text .='</ul>';

  return $text;
}

function getStarFa($rate,$no)
{
 return $rate >= $no ? 'fa-star' : 'fa-star-o';
}

function getStarFasChecked($rate,$no)
{
 return $rate >= $no ? 'checked' : '';
}
 
function ratingStaring($rate,$count=0)
{
    $text ='<div class="rating">';

    $text .='<div class="stars">';
    $text  .='<span class="fa fa-star '.getStarFasChecked($rate,1).'"></span>';
    $text .='<span class="fa fa-star '.getStarFasChecked($rate,2).'"></span>';
    $text .='<span class="fa fa-star '.getStarFasChecked($rate,3).'"></span>';
    $text .='<span class="fa fa-star '.getStarFasChecked($rate,4).'"></span>';
    $text .='<span class="fa fa-star '.getStarFasChecked($rate,5).'"></span>';


    $text .='</div>';
    $text .='<span class="review-no">'.$count.' reviews</span>';
    $text .='</div>';
  return $text;
}








function overAllRating($product)
{

 

$five = getTotalAccordingToStar($product,5);
$four = getTotalAccordingToStar($product,4);
$three = getTotalAccordingToStar($product,3);
$two = getTotalAccordingToStar($product,2);
$one = getTotalAccordingToStar($product,1);



  $text  ='<div class="rating-content">';
  $text .='<div class="side"> <div>5 star</div></div>';
  $text .='<div class="middle"> <div class="bar-container"> <div class="bar-5" style="width:'.$five['total'].'%"></div> </div></div>';
  $text .='<div class="side right"><div>'.$five['count'].'</div></div>';
  $text .='<div class="side"><div>4 star</div></div>';
  $text .='<div class="middle"><div class="bar-container"><div class="bar-4" style="width:'.$four['total'].'%"></div></div></div>';
  $text .='<div class="side right"><div>'.$four['count'].'</div></div>';
  $text .='<div class="side"><div>3 star</div></div>';
  $text .='<div class="middle"><div class="bar-container"><div class="bar-3" style="width:'.$three['total'].'%"></div></div></div>';
  $text .='<div class="side right"><div>'.$three['count'].'</div></div>';
  $text .='<div class="side"><div>2 star</div></div>';
  $text .='<div class="middle"><div class="bar-container"><div class="bar-2" style="width:'.$two['total'].'%"></div></div></div>';
  $text .='<div class="side right"><div>'.$two['count'].'</div></div>';
  $text .='<div class="side"><div>1 star</div></div>';
  $text .='<div class="middle"><div class="bar-container"><div class="bar-1" style="width:'.$one['total'].'%"></div></div></div>';
  $text .='<div class="side right"><div>'.$one['count'].'</div></div>';
  $text .='</div>';
  return $text;

}




function getTotalAccordingToStar($product,$rate)
{
    $count = $product->reviews->count();
    $percent = ($count / 100);
    $rating =$product->reviews->where('rating',$rate)->count();
    $total = $rating > 0 ? round($rating / $percent) : 0;
    return [
       'total' => $total,
       'count' => $rating
    ];
}







function ratinffloat($id){
	 $rat= rating($id);

	  $exp = explode(".", $rat);
	   if(count($exp) == 1){

	   	return $exp[0];

	   }else{

	   	    $num1 =$exp[1];
            
             $num =num($num1);

             
           return  checknum($num,$exp);


	   }
}



function num($num1)
{
	   if($num1 < 25){

            	return 0;

            }elseif($num1 >= 25 && $num1 <= 50){

                return 5;

            }elseif($num1 > 50 && $num1 < 75){

            	return 5;

            }elseif($num1 >= 75){

            	return 1;

            }else{

            	return 0;
            	
            }
}

function checknum($num,$exp)
{
	        if($num == 1){

             	return $exp[0] + 1;

             }elseif($num > 0){

             	return $exp[0].'.'.$num;

             }else{
             	return $exp[0];
             
              }
}


function getRatingAboutCompany($c_id,$val){
	$num = ratinffloat($c_id);
  if($num == $val){
		return "checked";
	}
}


 


function Responserate($company_id){
      
    $response= \App\RequestForPrinter::where('company_id','=',$company_id)->where('status','>',0)->count();

    $rejected= \App\RequestForPrinter::where('company_id','=',$company_id)->count();

    if($rejected >0){

        $responseRate=$response / $rejected * 100;

        return round($responseRate).'%';

    }else{
    	return '0%';
    }
}












 function rattingStar($id){

       

     	   if($id == 1){
            return "<i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";
     	   }elseif($id == 2){
     	     return "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";	
     	   }elseif($id == 3){
     	   	  return "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";
     	   }elseif($id == 4){
     	   	  return "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i>";
     	   }elseif($id == 5){
     	   	  return "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
     	   }
     }


     function ProfileImg($img){

       if($img == ""){
        return '<img src="'.url("admin-assets/images/user/avatar-2.jpg").'">';
       }else{
        return '<img src="'.$img.'">';
       }

     }

     function ProfileImage($img){

     	 if($img == ""){
     	 	 return  url("admin-assets/images/user/avatar-2.jpg");
     	 }else{
     	 	return  url($img);
     	 }

     }



     function RattingStar2($company_id){
 	      $id=ratinffloat($company_id);
     	   if($id == 1){
            echo "<i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";
     	   }elseif($id == 1.5){
               echo "<i class='fa fa-star'></i><i class='fa fa-star-half-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";
     	   }elseif($id == 2){
     	     echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";	
     	   }elseif($id == 2.5){
     	   	  echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";
     	   }elseif($id == 3){
     	   	  echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";
     	   }elseif($id == 3.5){
     	   	  echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half-o'></i><i class='fa fa-star-o'></i>";
     	   }elseif($id == 4){
     	   	  echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i>";
     	   }elseif($id == 4.5){
     	   	  echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half-o'></i>";
     	   }elseif($id == 5){
     	   	  echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
     	   }else{

     	   	echo "<i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";

     	   }
     }
 
function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}

function ReturnValueFromArray($val,$array){

	if(count($array) !=0){
		foreach ($array as $key ) {
			 if($val == $key){
			 	return 1;
			 }
		}
	}



}







# file upload helper function




 function uploadFileWithAjax($path,$file)
 {

                    $timestamp = time().str_random(20);
                    $hash = explode(' ',$file->getClientOriginalName());
                    $OriginalName = implode("",$hash);
                    $hash2 = explode('-',$OriginalName);
                    $OriginalName2 = implode("",$hash2);
                    $name = $timestamp. '' .$OriginalName2;  
                    if($file->move($path, $name)) {
                         return $path.$name;
                    	
                    }else{

                    	return 0;
                    }
}






function createSlug($name)
{
	$slug = implode('-', $name);
	


}






function Actions($currentRoute)
{
	 
   // $permision = new \App\Permission\Permissions;
   // if(\Auth::check() && \Auth::user()->role != "master"):
   //          return $permision->checkCurrentRoutePermissionWithRouteForMenuLink($currentRoute) == 1 ? 'hide' : '';
   // endif;
}


function Actions2($arr)
{

	 

   $permision = new \App\Permission\Permissions;
   if(\Auth::check() && \Auth::user()->role != "master"):
        $i=0;
         for($j=0;$j<count($arr); $j++){
               
             
             if($permision->checkCurrentRoutePermissionWithRouteForMenuLink($arr[$j]) == 0){
             	
             	$i++;
              }
         }

          

         return $i == 0 ? 'hide' : '' ;



   endif;
	 
}



function ActiveMenu($arr, $returnText, $route= null) {
     $currentRoute = \Request::route()->getName();
         $i=0;
         if($currentRoute == $route){
             return  $returnText;
         } elseif ($route == null){
            for($j=0;$j<count($arr); $j++){
                if($arr[$j] == $currentRoute){
                    $i++;
                 }
           }
        }
         return $i > 0 ? $returnText : '' ;
}


function userProfileImage($user_id)
{
       $u = App\User::find($user_id);
	   return $profileImage = $u->profile_image != "" ? url($u->profile_image) : url('/1550563993IG7AgVrVytMR8AaolsHs-dummy.png');
	 
}


function checkboxColorVariant($product_id,$variant_id,$color_id)
{
	 
	 $variant = \App\ProductVariants::where('product_id',$product_id)
	                                  ->where('id',$variant_id)
	                                  ->where('parent',0)
                                      ->where('variant','product_color')
	                                  ->where('variantValue',$color_id)->count();

	 $variants = \App\ProductVariants::where('product_id',$product_id)
	                                  ->where('parent',$variant_id)
	                                  ->where('variant','product_color')
	                                  ->where('variantValue',$color_id)->count();

	 return $variant > 0 || $variants > 0 ? 'checked' : '';

}


function checkboxSizeVariant($product_id,$variant_id,$size_id)
{
	 
	 $variants = \App\ProductVariants::where('product_id',$product_id)
	                                  ->where('parent',$variant_id)
	                                  ->where('variant','product_size')
	                                  ->where('variantValue',$size_id)->count();

	 return $variants > 0 ? 'checked' : '';

}


function seletedColor($variant_id,$product_id)
{
	 $variants = \App\ProductVariants::with('VariantColor')->where('id',$variant_id)->where('variant','product_color')->first();


	  $variant = \App\ProductVariants::with('VariantColor')->where('parent',$variant_id)->where('variant','product_color')->first();

	 
     
     
     
    
     if(!empty($variant)):

			$txt = "<div class='multiColors'>";
			$txt .= '<span style="background:'.$variants->VariantColor->color_code.'"></span>';
			$txt .= '<span style="background:'.$variant->VariantColor->color_code.'"></span>';
			$txt .= "</div>";
     else: 

            $txt = "<div class='singleColors'>";
			$txt .= '<span style="background:'.$variants->VariantColor->color_code.'"></span>';
			$txt .= "</div>";

     endif;

	 
    

	 
    return $txt;

}


function seletedColor2($variant_id,$product_id)
{
	 $variants = \App\ProductVariants::with('VariantColor')->where('id',$variant_id)->where('variant','product_color')->first();


	  $variant = \App\ProductVariants::with('VariantColor')->where('parent',$variant_id)->where('variant','product_color')->first();

	 
     
     
 
    
     if(!empty($variant)):
   

      $label = $variants->VariantColor->title.' and '.$variant->VariantColor->title;


			$txt = "<label class='multiColors' for='color-".$variants->id."'
         data-toggle='tooltip' data-placement='top' title='$label'
      >";
			$txt .= '<span style="background:'.$variants->VariantColor->color_code.'"></span>';
			$txt .= '<span style="background:'.$variant->VariantColor->color_code.'"></span>';
			$txt .= "</label>";
     else: 
       $label = $variants->VariantColor->title;
      $txt  = "<label class='singleColors' for='color-".$variants->id."' data-toggle='tooltip' data-placement='top' title='$label'>";
			$txt .= '<span style="background:'.$variants->VariantColor->color_code.'"></span>';
			$txt .= "</label>";

     endif;

	 
    

	 
    return $txt;

}



function CheckAuthRole($role)
{
	if(Auth::check() && Auth::user()->role == $role){
		return true;
	}else{
		return false;
	}
}



 function getMataData($key,$type)
{
	 $chk = [];// \App\MetaData::where('meta',$key)->where('type',$type)->first();

	 if(!empty($chk)){
	 	return $chk->value;
	 }else{
	 	$c =new \App\MetaData;
	 	$c->meta = $key;
	 	$c->value = '';
	 	$c->type = $type;
	 	$c->save();
	 }
}



 


 function AddVisit($page_title)
{
   $chk = \App\PageVisit::where('ip_address',get_client_ip())->where('page_title',$page_title)->whereDate('created_at', \Carbon\Carbon::today())->first();

   if(empty($chk)){
      $c =new \App\PageVisit;
      $c->ip_address = get_client_ip();
      $c->page_title = $page_title;
      $c->save();
   }
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

 function getServiceMataData($key,$type)
{
   $chk = \App\ServicesMeta::where('meta',$key)->where('type',$type)->first();

   if(!empty($chk)){
    return $chk->value;
   }else{
    $c =new \App\ServicesMeta;
    $c->meta = $key;
    $c->value = '';
    $c->type = $type;
    $c->save();
   }
}


function getMataDataPolicy($key,$type)
{
   $chk = \App\PolicyDatas::where('meta',$key)->where('type',$type)->first();

   if(!empty($chk)){
    return $chk->value;
   }else{
    $c =new \App\MetaData;
    $c->meta = $key;
    $c->value = '';
    $c->type = $type;
    $c->save();
   }
}




#########################################################################


function cutomMenu()
{ 

$categories = \App\Category::with('subCategory','subCategory.childCategory')->where('parent',0)->where('status',1)->get();

 

 


 $text = '<li class="all-products"><a href="'.url( route('product_category') ).'" class="megamenu">All Product';
 $text .= '<i class="fa fa-angle-down" aria-hidden="true"></i></a>';
 
 $text .= '<div class="dropdown-content">';
 
 $text .= '<div class="cust-fullmenu">';
 $text .= '<div class="drop-side">';
 $text .= '<ul>';

foreach ($categories as $cate) {
	 

 $text .= '<li class="list'.$cate->id.'"><a href="'.$cate->link.'">'.$cate->label;
 $text .= '<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';

}
 $text .='</ul>';
 $text .='</div>';

foreach ($categories as $cate) {

 $text .='<div class="drop-rite" id="list'.$cate->id.'">';

foreach ($cate->SubCategory as $sub) {
	 

 $text .='<div class="cust-list">';
 $text .='<h4>'.$sub->label.'</h4>';
 $text .='<ul>';
foreach ($sub->childCategory as $ch) {
 $text .='<li><a href="'.url($ch->slug).'">'.$ch->label.'</a></li>';
}
 $text .='</ul>';
 $text .='</div>';

}

 $text .='</div>';

}

 $text .='</div>';
 $text .='</div>';
 $text .='</li>';

 return $text;
}





function CustomMenu()
{
    
$categories = \App\Category::with('subCategory','subCategory.childCategory')->where('parent',0)->where('status',1)->get();

$text ="";

    foreach ($categories as $cate) {  

      $text .='<li>';
      $text .='<h3><a href="'.url($cate->slug).'">'.$cate->label.'</a></h3>';
      $text .='<div>';

      $text .='<h4><a href="'.url($cate->slug).'">'.$cate->label.'</a></h4>';

     foreach ($cate->SubCategory as $sub) {

     // $text .'<div class="col-md-6">';

      $text .='<h5><a href="'.url($sub->slug).'">'.$sub->label.'</a></h5>';

      $text .='<ul>';

      foreach ($sub->childCategory as $ch) {

              $text .='<li><a href="'.url($ch->slug).'">'.$ch->label.'</a></li>';

      }
      
      $text .='</ul>';
      //$text .='</div>';

     } # end loop of subcategory

      $text .='</div>';
      $text .='</li>';

   } # end parent category foreach ;

      return $text;




}











function checkVariantWithKey($product_id,$variant,$value)
{

	$p = \App\ProductVariants::where('variant',$variant)->where('variantValue',$value)->where('product_id',$product_id)->count();
	return $p;
	 
}





function ProductRatingStars($product_id)
{
  $reviews = \App\Review::where('product_id',$product_id)->count();
    if($reviews > 0):

      $count = $reviews > 1 ? $reviews.' reviews' : $reviews.' review';
    
        $rate = ratinffloat($product_id);
    



 




$text  ='<div class="cust-star">';
$text .='<div class="star">'.rattingStar($rate)  ;
$text .='</div>';
$text .='<span class="user-star">('.$rate.')</span>';
$text .='</div>';

$text .= starPercent(1,$product_id,$reviews);
$text .= starPercent(2,$product_id,$reviews);
$text .= starPercent(3,$product_id,$reviews);
$text .= starPercent(4,$product_id,$reviews);
$text .= starPercent(5,$product_id,$reviews);

return $text;
endif;
}

 function starPercent($star,$product_id,$reviews)
{
  if($reviews > 0){
       
       $per = \App\Review::where('product_id',$product_id)->where('rating',$star)->count();

 

       $percent = $per > 0 ? ($per * 100) / $reviews : 0;

      return ratingProgressBar($star,$percent);

  }

  return ratingProgressBar($star,0);
}

function ratingProgressBar($stars,$percent)
{

$star = $stars > 1 ? $stars.' Stars' : $stars.' Star';
$text ='<div class="products-review-overview">
      <div><a href="javascript:" class="pro-star-text pf-link">'.$star.'</a>
      <span class="pro-progress-base">
         <span class="pro-progress" style="width: '.$percent.'%;"></span>
      </span>
      <span class="pro-star-rating">'.$percent.'%</span></div>
      </div>';

      return $text;
}



function ProductRating($product_id)
{
	$reviews = \App\Review::where('product_id',$product_id)->count();
    if($reviews > 0):
		$text ='<div class="rating">';
		$rate = ratinffloat($product_id);
		$text .= rattingStar($rate) ;
		$text .='<p>'.$reviews.' Reviews</p>';
		$text .='</div>';
		return $text;
	endif;
}




 function getProductImageFirstColor($product_id)
{
	 $color = \App\ProductVariants::where('variant','product_image')->where('product_id',$product_id)->first();

	 if(!empty($color)){
	 	return url($color->variantValue);
	 }
}


function productSizes($product_id)
{
  
     $sizes = \DB::table('product_variants')
              ->join('product_sizes','product_sizes.id','=','product_variants.variantValue')
              ->select('variantValue','product_sizes.title','product_sizes.sorting')
              ->groupBy('variantValue')
              ->where('variant','product_size')
              ->where('product_sizes.status',1)
              ->where('product_variants.product_id',$product_id)
              ->orderBy('product_sizes.sorting','ASC')
              ->get();

   $arr = array();
	foreach ($sizes as $k) {
		 array_push($arr,$k->title);
	}

  if(!empty($sizes)):
		   $text ='<div class="size">';
		   $text .='<p>'.implode(' - ',$arr).'</p>';
		   return $text .='</div>';
  endif;
}







function ProductPopularNew($more_options)
{
	 


	if($more_options > 0){

		return '<div class="new-popular-tag new-popular-'.$more_options.'">'.ProductPopularNewCase($more_options).'</div>';
	}else{
    return '';
  }
}


function ProductPopularNewCase($variantValue)
{
	switch ($variantValue) {
		case 1:
			return 'New';
			break;
		
		default:
			return "Popular";
			break;
	}
}



function getColorid($colorhex){

  $colordata = \App\Color::where('color_code', $colorhex)->first();

  return $colordata->id;
}



function productDetailSizes($product_id,$color_id=0,$size_id=0,$result_format='ul')
{
  
     $sizes = \DB::table('product_variants')
              ->join('product_sizes','product_sizes.id','=','product_variants.variantValue')
              ->select('variantValue','product_sizes.title','product_sizes.sorting','product_sizes.id')
              ->groupBy('variantValue')
              ->where('variant','product_size')
              ->where('product_sizes.status',1)
              ->where('product_variants.product_id',$product_id)
              ->orderBy('product_sizes.sorting','ASC')
              ->get();



            $color = \App\ProductVariants::where('variant','product_color')
                        ->where('product_id',$product_id)

                        ->where(function($t) use($color_id){
                        	if($color_id > 0){
                        		$t->where('variantValue',$color_id);
                        	}
                        })
                        ->where('parent',0) 
		                 ->first();


if($result_format=='ul'){
   
$text  ='<ul class="cust-size-list">';

	foreach ($sizes as $k) {

		$cls = EnableDisableSizesAccordingColor($product_id,$k->id,$color);
		$alreadySelected = $cls != "disabled" && $k->id == $size_id ? 'checked'  : '';
		$text .='<li>';
		$text .='<input type="radio" name="size" '.$alreadySelected.' '.$cls.' value="'.$k->id.'" id="size-'.$k->id.'">';
		$text .='<label for="size-'.$k->id.'">'.$k->title.'</label>';
		$text .='</li>';

	}

$text .='</ul>';
}

if($result_format=='only_array'){
   
      $text=$sizes;

      
}

return $text;
  
}



function productDetailSizesmultiple($product_id,$color_id=0,$size_id=0,$number=0,$result_format='radio')
{
  
     $sizes = \DB::table('product_variants')
              ->join('product_sizes','product_sizes.id','=','product_variants.variantValue')
              ->select('variantValue','product_sizes.title','product_sizes.sorting','product_sizes.id')
              ->groupBy('variantValue')
              ->where('variant','product_size')
              ->where('product_sizes.status',1)
              ->where('product_variants.product_id',$product_id)
              ->orderBy('product_sizes.sorting','ASC')
              ->get();



            $color = \App\ProductVariants::where('variant','product_color')
                        ->where('product_id',$product_id)

                        ->where(function($t) use($color_id){
                          if($color_id > 0){
                            $t->where('variantValue',$color_id);
                          }
                        })
                        ->where('parent',0) 
                     ->first();

$selected='';
if($result_format=='checkbox'){
  $selected='checked="checked"';
}
   
$text  ='<ul class="cust-size-list">';

  foreach ($sizes as $k) {

    $cls = EnableDisableSizesAccordingColor($product_id,$k->id,$color);
    $alreadySelected = $cls != "disabled" && $k->id == $size_id ? 'checked'  : '';
    $text .='<li>';
    $text .='<input type="'.$result_format.'" '.$selected.' data-color_code="'.$color_id.'" name="size_'.$number.'" '.$alreadySelected.' '.$cls.' value="'.$k->id.'" id="size-'.$k->id.'-'.$color_id.'">';
    $text .='<label for="size-'.$k->id.'-'.$color_id.'">'.$k->title.'</label>';
    $text .='</li>';

  }

$text .='</ul>';

return $text;
  
}

  function EnableDisableSizesAccordingColor($product_id,$size_id,$color)
{
	if(!empty($color)){

		    

		    $sizes = \DB::table('product_variants')
		                ->where('variant','product_size')
		                ->where('product_id',$product_id)
		                ->where('parent',$color->id)
		                ->where('variantValue',$size_id)
		                ->count();

		   return $sizes == 0 ? 'disabled' : '';

       
	}else{


	}
	 
}






function getSizeGuides($category_id)
{
	  $productSizes = \App\CategoryVaritant::where('category_id',$category_id)->where('variantKey','sizes')->get();
    
    $heading ='';
    $chest_cm ='';
    $chest_inches ='';

    $waist_cm ='';
    $waist_inches ='';


    $hips_cm ='';
    $hips_inches ='';

	foreach ($productSizes as $k) {
           
           $heading .='<th>'.$k->CategoryVariantSizes->title.'</th>';


           $chest_cm .='<td>'.$k->CategoryVariantSizes->chest_cm.'</td>';
           $chest_inches .='<td>'.cm2feet($k->CategoryVariantSizes->chest_cm).'</td>';

           $waist_cm .='<td>'.$k->CategoryVariantSizes->waist_cm.'</td>';
           $waist_inches .='<td>'.cm2feet($k->CategoryVariantSizes->waist_cm).'</td>';

           $hips_cm .='<td>'.$k->CategoryVariantSizes->hips_cm.'</td>';
           $hips_inches .='<td>'.cm2feet($k->CategoryVariantSizes->hips_cm).'</td>';

		 
	}


 $table1 = '<table class="table">';
 $table1 .='<tr><th></th>'.$heading.'</tr>';
 $table1 .='<tr><td>CHEST</td>'.$chest_cm.'</tr>';
 $table1 .='<tr><td>WAIST</td>'.$waist_cm.'</tr>';
 $table1 .='<tr><td>HIPS</td>'.$hips_cm.'</tr>';
 $table1 .= '</table>';



 $table2 = '<table class="table">';
 $table2 .='<tr><th></th>'.$heading.'</tr>';
 $table2 .='<tr><td>CHEST</td>'.$chest_inches.'</tr>';
 $table2 .='<tr><td>WAIST</td>'.$waist_inches.'</tr>';
 $table2 .='<tr><td>HIPS</td>'.$hips_inches.'</tr>';
 $table2 .= '</table>';



$text ='<div class="tab-content">';
$text .='<div role="tabpanel" class="tab-pane active" id="UsIncheches">'.$table2.'</div>';
$text .='<div role="tabpanel" class="tab-pane" id="Centimeters">'.$table1.'</div>';

$text .='</div>';










 return $text;


}










function dateFormat($created_at)
{
	 $dt = strtotime($created_at);

	 $month = monthName($dt);

	 $day = date('jS',$dt);

   $year = date('Y',$dt);
	 

	 return $month.' '.$day.', '.$year;

	  
}

function dateFormat_withtime($created_at)
{
   $dt = strtotime($created_at);

   $month = monthName($dt);

   $day = date('jS',$dt);

   $year = date('Y',$dt);

   $time = date('h:i:s',$dt);

   return $month.' '.$day.', '.$year." ".$time;

    
}

function date_format_for_taxjar($created_at){

   $dt = strtotime($created_at);

   $month = date('m',$dt);

   $day = date('d',$dt);

   $year = date('Y',$dt);

   return $year.'/'.$month.'/'.$day;
}






function replyCommmentlist($blog_id,$replies)
{ ?>


  <?php if($replies->count() > 0): ?>
        <ul class="comments-list reply-list">

          <?php foreach($replies as $r): ?>
          <li>
             
            <div class="comment-main-level">
                <!-- Avatar -->
                <div class="comment-avatar">
                  <img src="<?= userProfileImage($r->users->id) ?>" alt="">
                </div>
                <!-- Contenedor del Comentario -->
                <div class="comment-box">
                  <div class="comment-head">
                    <h6 class="comment-name <?= $r->users->role == 'master' ? 'by-author' : ''?>">
                      <a href=""><?= $r->users->name?></a></h6>
                    <span><?= $r->created_at->diffForHumans() ?></span>
                         <a class="" role="button" data-toggle="collapse" href="#collapseExample<?= $r->id ?>" aria-expanded="false" aria-controls="collapseExample<?= $r->id ?>">
                                               <i class="fa fa-reply"></i>  
                                       </a>
                  </div>
                  <div class="comment-content">
                      <?= $r->comment ?>
                  </div>

                  <div class="collapse" id="collapseExample<?= $r->id?>">
                    <div class="well">

                           <div class="reply-comment-box">
                               <form class="formComment">
                                <input type="hidden" name="parent" value="<?= $r->id?>">
                               <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                    <input type="hidden" name="blog_id" value="<?= $blog_id?>">
                                      <div class="form-group">
                                           <textarea placeholder="Add you reply..." class="form-control" name="comment"></textarea>
                                      </div>

                                      <button class="btn btn-primary">Post Comment</button>
                                     <div class="MsgBox"></div>
                            </form>
                              </div>
                      
                    </div>
                  </div>
          </div>
        </div>

                <?= replyCommmentlist($blog_id,$r->replies) ?>
          </li> 

          <?php endforeach; ?>
        </ul> 
        <?php endif; ?>
  <?php
}




 #  product colors 

function productColorlisting($product_id)
{

   //  $p = \App\Product::with('productColors')->where('id',$product_id)->first();



              $colors = \DB::table('product_variants')
                           ->where('product_variants.variant','product_color')
                           ->where('product_variants.parent',0)
                           ->where('product_variants.product_id',$product_id)
                           ->pluck('variantValue');
  

$arr = [];

foreach ($colors as $k) {
   array_push($arr, $k);
}




    $product_colors = \App\Color::whereIn('id',$arr)->orderBy('sorting','DESC')->get();
   


     $text ='';
    // if(!empty($p)):
       foreach($product_colors as $clr):
        //  $text2 ='<span class="black" style="background:'.$clr->VariantColor->color_code.';border:1px solid #f2f2f2;"
        // data-toggle="tooltip" data-placement="top" title="'.$clr->VariantColor->title.'"
        //  ></span>';

         $p = \App\ProductVariants::where('product_id',$product_id)
               ->where('parent',0)
               ->where('variant','product_color')
               ->where('variantValue',$clr->id)
               ->first();

           $text .= seletedColor2($p->id,$product_id);
       endforeach;
   //endif;
   return $text;
}


function productColorlisting2($product_id,$product_colors)
{

   //  $p = \App\Product::with('productColors')->where('id',$product_id)->first();



             



   // $product_colors = \App\Color::whereIn('id',$arr)->orderBy('sorting','DESC')->get();
   


     $text ='';
    // if(!empty($p)):
       foreach($product_colors as $clr):
        //  $text2 ='<span class="black" style="background:'.$clr->VariantColor->color_code.';border:1px solid #f2f2f2;"
        // data-toggle="tooltip" data-placement="top" title="'.$clr->VariantColor->title.'"
        //  ></span>';

         $p = \App\ProductVariants::where('product_id',$product_id)
               ->where('parent',0)
               ->where('variant','product_color')
               ->where('variantValue',$clr->id)
               ->first();

               if(!empty( $p)):

                     $text .= seletedColor2($p->id,$product_id);
                     
              endif;
       endforeach;
   //endif;
   return $text;
}






function ColorSorting($product_id)
{
                   $colors = \DB::table('product_variants')
                   ->where('product_variants.variant','product_color')
                   ->where('product_variants.parent',0)
                   ->where('product_variants.product_id',$product_id)
                   ->pluck('variantValue');
  

                    $arr = [];

                    foreach ($colors as $k) {
                       array_push($arr, $k);
                    }

                    $product_colors = \App\Color::whereIn('id',$arr)
                                                ->orderBy('sorting','DSEC')
                                                ->get();


          return $product_colors;
}














/*__________________________________________________________________________________________________-
|
|              recent Viewed
|___________________________________________________________________________________________________
*/


function recentSeenProduct($product_id)
{
  
     cookie('texting',$product_id,'4000');

     return Cookie::get('texting');

}


/*_________________________________________________________________________________________________-
|
|             MinPriceOfcate
|__________________________________________________________________________________________________
*/

function MinPriceOfcate($cate_id)
{
      return $price = \App\Product::where('subparent_category_id',$cate_id)
                    
                    ->min('price');







}





function getNameBy($id,$type,$name="name")
{
   if($type == 'country'){

    $country = \App\Country::find($id);
    if($name=='name'){
      return !empty($country) ? $country->name : '';  
    }

    if($name=='sortname'){
      return !empty($country) ? $country->sortname : '';  
    }
    

   }



   if($type == 'state'){

    $State = \App\State::find($id);

    return !empty($State) ? $State->$name : '';

   }

   if($type == 'state_sortname'){

    $State = \App\CityZip::where('zip',$id)->first();

    return !empty($State) ? $State->state_name : '';

   }

   if($type == 'city'){

    $City = \App\City::find($id);

    return !empty($City) ? $City->$name : '';

   }

    if($type == 'size'){

    $Size = \App\ProductSize::find($id);

    return !empty($Size) ? $Size->title : '';

   }

   if($type == 'color'){

    $Color = \App\Color::find($id);

    return !empty($Color) ? $Color->color_code : '';

   }

   if($type == 'color_title'){

    $Color = \App\Color::find($id);

    return !empty($Color) ? $Color->title : '';

   }
}

function getidByname($name,$type)
{
   if($type == 'country'){

    $country = \App\Country::where('name',$name)->first();

    return !empty($country) ? $country->id : '';

   }

   if($type == 'state'){

    $State = \App\State::where('name',$name)->first();

    return !empty($State) ? $State->id : '';

   }

   if($type == 'city'){

    $City = \App\City::where('name',$name)->first();

    return !empty($City) ? $City->id : '';

   }
}



function stripeAccount()
{
   $status = getMataData('stripe_status','api_setting');
    $live = [
          'status' => 'live',
          'sk' => getMataData('stripe_secrat_key','api_setting'),
          'pk' => getMataData('stripe_public_key','api_setting')
    ];


    $test = [
          'status' => 'test',
          'sk' => getMataData('stripe_secrat_test_key','api_setting'),
          'pk' => getMataData('stripe_public_test_key','api_setting')
    ];

    return $status == "live" ? $live : $test;
 
}



function BrainTreeAccount()
{
     
    $arr = [
          
          'environment' => getMataData('BRAINTREE_PAYPAL_STATUS','api_setting'),
          'merchantId' => getMataData('BRAINTREE_PAYPAL_MERCHANT_ID','api_setting'),
          'publicKey' => getMataData('BRAINTREE_PAYPAL_PUBLIC_KEY','api_setting'),
          'privateKey' => getMataData('BRAINTREE_PAYPAL_PRIVATE_KEY','api_setting')
    ];

 
    return $arr;
 
}

function BraintreeConfig()
{

      $config = BrainTreeAccount();

      $environment = $config['environment'];
      $merchantId = $config['merchantId'];
      $publicKey = $config['publicKey'];
      $privateKey = $config['privateKey'];



   $gateway = new \Braintree_Gateway([
        'environment' => $environment,
        'merchantId' => $merchantId,
        'publicKey' => $publicKey,
        'privateKey' => $privateKey
   ]);


 

 return $gateway;
}





function payBraintree($id,$amount,$desc="Test",$order_id=100)
{

      $gateway = BraintreeConfig();
      $result = $gateway->paymentMethodNonce()->create($id);
      $nonce = $result->paymentMethodNonce->nonce;
      $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'orderId' => $order_id,
        'options' => [
            'submitForSettlement' => True,
            'paypal' => [
                'customField' => 1,
                'description' => $desc,
          ],
        ],
    ]);

  return $result;
}









function paypalAccount()
{

  
    return [
          'PAYPAL_STATUS' => getMataData('PAYPAL_STATUS','api_setting'),
          'PAYPAL_LIVE_API_USERNAME' => getMataData('PAYPAL_LIVE_API_USERNAME','api_setting'),
          'PAYPAL_LIVE_API_PASSWORD' => getMataData('PAYPAL_LIVE_API_PASSWORD','api_setting'),
          'PAYPAL_LIVE_API_SECRET' => getMataData('PAYPAL_LIVE_API_SECRET','api_setting')
    ];
}


/*__________________________________________________________________________________________________-
|
|              Truncate String
|___________________________________________________________________________________________________
*/

function truncate($string, $length = 150) {

    $limit = abs((int)$length);
       if(strlen($string) > $limit) {
          $string = preg_replace("/^(.{1,$limit})(\s.*|$)/s", '\1...', $string);
       }
    return $string;

   }



/*__________________________________________________________________________________________________-
|
|              Get Thumb You Tube Image
|___________________________________________________________________________________________________
*/


function getYoutubeEmbedIMAGE($url){
   if(!empty($url)){
    $youtube_id='';
   $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
   $longUrlRegex = '/youtube.com\/((?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
       if(preg_match("/embed/",$url,$matches)){
               $urlExplode   = explode('/', $url);
               $url          = last($urlExplode);
           
               return "https://img.youtube.com/vi/{$url}/mqdefault.jpg";
               

       }
       if (preg_match($longUrlRegex, $url, $matches)) {
           $youtube_id = $matches[count($matches) - 1];

       }

       if (preg_match($shortUrlRegex, $url, $matches)) {
           $youtube_id = $matches[count($matches) - 1];
       }
           return "https://img.youtube.com/vi/{$youtube_id}/mqdefault.jpg";
}
}


function CartQTY()
{
   
        // $orderID = \Session::has('orderID') ? \Session::get('orderID') : 0;


        // if(Auth::check() && Auth::user()->role == "user"){
        // $order = \App\Order::where('id',$orderID)->where('status',0)->where('user_id',Auth::user()->id)->first();
        //     if(!empty($orderID)):
        //            return $order = \App\OrderItems::where('orderID',$orderID)->sum('qty');
        //     else:
        //       return 0;
        //     endif;
          
        // }else{

             return \Cart::getTotalQuantity();
          
       // }
        
  


}


// {
//   "card": {
//       "brand":"visa",
//       "checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},
//       "country":"US",
//       "exp_month":12,
//       "exp_year":2019,
//       "fingerprint":"DFmR7M53WoLbAZ17",
//       "funding":"credit",
//       "last4":"4242",
//       "three_d_secure":null,
//       "wallet":null
//     },
// "type":"card"
// }


/*________________________________________________________________________
|
|     get card detail 
|_________________________________________________________________________
*/


 function getCardDetail($card,$key)
{
  $arr = json_decode($card);

  return strtoupper($arr[0]->$key);

}



/*________________________________________________________________________
|
|     get card detail 
|_________________________________________________________________________
*/


 function getCardLogo($arr,$cardName)
{
     $brand = getCardDetail($arr,'brand');
   switch ($brand) {
     case 'VISA':
       return '<i class="fa fa-cc-visa"></i>';
       break;
     
     case 'JCB':
       return '<i class="fa fa-cc-jcb"></i>';
       break;
     case 'DINERS':
       return '<i class="fa-cc-diners-club"></i>';
       break;
     case 'DISCOVER':
       return '<i class="fa fa-cc-discover"></i>';
       break;
     case 'AMERICAN EXPRESS':
       return '<i class="fa fa-cc-amex"></i>';
       break;
     case 'MASTERCARD':
       return '<i class="fa fa-cc-mastercard"></i>';
       break;

     case 'UNIONPAY':
       return '<i class="fa fa-credit-card"></i>';
       break;

     case 'DINERS CLUB':
       return '<i class="fa fa-credit-card"></i>';
       break;
      
     default:
       return '<i class="fa fa-credit-card"></i>';
       break;
   }

 

}




function productAttribute($id,$col)
{
     $product = \App\Product::find($id);

     return !empty($product) ? $product->$col : 0;
}



/*___________________________________________________________________
|
|  get print file for cart, order admin order ect,.
|
|____________________________________________________________________
*/

function getMockupFiles($arr,$textline=null)
{
                
                           $txt ="";
                                 
                         if(!empty($arr->printingFiles)):
                                
                           
                            
                              if(!empty($arr->thumbnails) ):
                                 

                                    foreach ($arr->thumbnails as $key => $img):
                                          $txt .='<div class="mockupitem">';
                                          $txt .='<div class="mockup-items">';
                                          $txt .='<img src="'.url($img).'" class="imgOne">';
                                          $txt .='<div class="olay">';
                                         // $txt .='<a href="'.url("edit/mockup/design/".$slug."/".$item->id).'" class="btn-1">Edit</a>';
                                          $txt .='<a href="javascript:void(0)" class="btn-1 btn-preview btn" id="'.url($img).'"><i class="fa fa-eye"></i></a>';
                                          $txt .='<a href="'.url('download-image').'?file='.$img.'" class="btn-1 btn-download btn" id="'.url($img).'"><i class="fa fa-download"></i></a>';
                                          $txt .='</div>';
                                          $txt .='</div>';
                                          $txt .='<span>'.$key.'</span>';
                                          $txt .='</div>';
                                    endforeach;

                                  endif;




                                  foreach ($arr->printingFiles as $k => $image):

                                          $txt .='<div class="mockupitem">';
                                          $txt .='<div class="mockup-items">';
                                          $txt .='<img src="'.url($image).'" class="imgTwo">';
                                          $txt .='<div class="olay">';
                                          $txt .='<a href="javascript:void(0)" class="btn-1 btn-preview btn" id="'.url($image).'"><i class="fa fa-eye"></i></a> ';
                                          $txt .='<a href="'.url('download-image').'?file='.$image.'" class="btn-1 btn-download btn" id="'.url($image).'"><i class="fa fa-download"></i></a>';
                                          $txt .='</div>';
                                          $txt .='</div>';
                                          $txt .='<span>Print File ('.$k.')</span>';
                                          $txt .='</div>';

                                   endforeach;

                         else:

                              $txt .=$textline == null ? '' : $textline;

                         endif;

      return $txt;

 
}

function getMockupFiles2($arr,$textline=null)
{
                
                      $txt ="";
                                 
                         if(!empty($arr->printingFiles)):
                                
                           
                            
                              if(!empty($arr->thumbnails) ):
                                 

                                    foreach ($arr->thumbnails as $key => $img):
                                        
                                          $txt .='<div class="col-md-6">';
                                          $txt .='<img src="'.url($img).'" height="100">';
                                          $txt .='<span>'.$key.'</span>';
                                          $txt .='</div>';
                                    endforeach;

                                  endif;




                                  // foreach ($arr->printingFiles as $k => $image):

                                  //         $txt .='<div class="col-md-6">';
                                           
                                  //         $txt .='<img src="'.url($image).'" style="max-width:100%;max-height: 500px;background: url(/images/trasnparent-pattern.png) repeat center center;height: 100px;"> ';
                                         
                                  //         $txt .='<span>Print File ('.$k.')</span>';
                                  //         $txt .='</div>';

                                  //  endforeach;

                         else:

                              $txt .=$textline == null ? '' : $textline;

                         endif;

      return $txt;

 
}
 



function getProductDetailFromDatabase($id,$color,$price,$size='')
{


   $product = \App\Product::with('brand')->where('id',$id)->first();



   $color_code = !empty($color) ? $color->color_code : '#fff';

   //  $img = $product->image1 == null ? $product->main_image : $product->image1;
     if(!empty($product->DesignArea[0])):

        $image ='<img src="'.url($product->DesignArea[0]->captureArea->image).'" style="background:'.$color_code.';width:100%;">';
      else:
       $image = '';
      endif;

 
   //  $image ='<img src="'.url($img).'" style="background:'.$color_code.';width:100%">';


    // if($product->getcanvasdetails->count() > 0):
     
    //    $image ='<img src="'.url($product->getcanvasdetails->image).'" style="background:'.$color_code.';width:100%">';
      
    // endif;
    
   $text ='<div class="row">';
   $text .='<div class="col-md-3">';
   $text .=$image;
   $text .='</div>';
   $text .='<div class="col-md-9">';
   $text .='<h4>'.$product->product_name.'</h4>';
   $text .='<h5><b>Brand</b>: '.!empty($product->brand) ? $product->brand->brand_name : ''.'</h5>';
   $text .='<h5><b>Price</b>: $'.custom_format($price,2).'</h5>';


   $text .='<h5><b>Color</b>: '.$color->title.'</h5>';

   if(!empty($size))
    {
        
   $text .='<h5><b>Size</b>: '.$size.'</h5>';
    }

   $text .='</div>';
   $text .='</div>';

   return $text;
}


function getProductDetailFromDatabase2($id,$color,$price,$size)
{


   $product = \App\Product::with('brand')->where('id',$id)->first();



   $color_code = !empty($color) ? $color->color_code : '#fff';

     $img = $product->image1 == null ? $product->main_image : $product->image1;

 
     $image ='<img src="'.url($img).'" style="background:'.$color_code.';width:100%">';


    // if($product->getcanvasdetails->count() > 0):
     
    //    $image ='<img src="'.url($product->getcanvasdetails->image).'" style="background:'.$color_code.';width:100%">';
      
    // endif;
    
   $text ='<div class="row">';
   
   $text .='<div class="col-md-12">';
   $text .='<h5>'.$product->product_name.'</h5>';
   $text .='<h6><b>Brand</b>: '.!empty($product->brand) ? $product->brand->brand_name : 'N/A'.'</h6>';
   $text .='<h6><b>Price</b>: $'.custom_format($price,2).'</h6>';


   $text .='<h6><b>Color</b>: '.$color->title.'</h6>';

    
   $text .='</div>';
   $text .='</div>';

   return $text;
}



  function searchForId($id, $array) {
       foreach ($array as $key => $val) {
           if ($val->id == $id) {
               return $key;
           }
       }
       return null;
  }



  function d2tgwebhook(){

    $client =  new \GuzzleHttp\Client();
    $res = $client->request('GET', 'https://sandbox.dtg2goportal.com/api/v1/workorders?length=500', [
    'headers' => [
    'Accept' => 'application/json',
    'apikey' => '844C55D838A946BF3EE59AFD2294C64E',
    'Content-type' => 'application/json'
    ]
    ]);
      $response = json_decode($res->getBody());

      $ordershipdata = \App\OrderShipping::where('ship_method', '=', 'DTG')->get();

      $status = 1;

      foreach ($ordershipdata as $value) {

        $key = searchForId($value->ship_id, $response->work_orders);

        if($response->work_orders[$key]->current_state == 'Shipped'){

          $findOrder = \App\Order::where('id','=', $value->order_id)->first();

          if($findOrder->status != 4){

            $findOrder->status = 4;

            $findOrder->save();
          }

        }

        if($response->work_orders[$key]->current_state == 'Artwork'){

          $findOrder = \App\Order::where('id','=', $value->order_id)->first();

          if($findOrder->status != 2){

            $findOrder->status = 2;

            $findOrder->save();
          }
        }

      }

      
    return 'true';
  }











function checkSteps($value='')
{

$delivery_address = "";  // \Session::has('delivery_address') ? 'form-steps__item--completed' : '';
$order_review = "";  // \Session::has('review_order') ? 'form-steps__item--completed' : '';
$billing_address = "";  // \Session::has('billing_address') ? 'form-steps__item--completed' : '';
$shipping_charge = "";  // \Session::has('shipping_charge') ? 'form-steps__item--completed' : '';

$value = $value + 1;
  ?>
    <nav class="form-steps">
        <div class="form-steps__item step-1 <?= CartQTY() > 0 ? 'form-steps__item--completed' : '' ?>">
            <div class="form-steps__item-content">
                <span class="form-steps__item-icon">1</span>
                <span class="form-steps__item-text"><?= StepLabelChecking(1) ?></span>
            </div>
        </div>

        <div class="form-steps__item step-2 <?= $value >= 2 ? 'form-steps__item--completed' : $delivery_address ?>">
            <div class="form-steps__item-content">
                <span class="form-steps__item-icon">2</span>
                <span class="form-steps__item-line"></span>
                <span class="form-steps__item-text"><?= StepLabelChecking(2) ?></span>
            </div>
        </div>

        <div class="form-steps__item step-3  <?= $value >= 3 ? 'form-steps__item--completed' : $shipping_charge ?>">
            <div class="form-steps__item-content">
                <span class="form-steps__item-icon">3</span>
                <span class="form-steps__item-line"></span>
                <span class="form-steps__item-text"><?= StepLabelChecking(3) ?></span>
            </div>
        </div>

        <div class="form-steps__item step-4  <?= $value >= 4 ? 'form-steps__item--completed' : $order_review  ?>">
            <div class="form-steps__item-content">
                <span class="form-steps__item-icon">4</span>
                <span class="form-steps__item-line"></span>
                <span class="form-steps__item-text"><?= StepLabelChecking(4) ?></span>
            </div>
        </div>

        <div class="form-steps__item step-5 <?= $value >= 5 ? 'form-steps__item--completed' : $billing_address ?>">
            <div class="form-steps__item-content">
                <span class="form-steps__item-icon">5</span>
                <span class="form-steps__item-line"></span>
                <span class="form-steps__item-text"><?= StepLabelChecking(5) ?></span>
            </div>
        </div>

         <div class="form-steps__item step-6 <?= $value >= 6 ? 'form-steps__item--completed' : '' ?>">
            <div class="form-steps__item-content">
                <span class="form-steps__item-icon">6</span>
                <span class="form-steps__item-line"></span>
                <span class="form-steps__item-text"><?= StepLabelChecking(6) ?></span>
            </div>
        </div>
    </nav>


    <?php
}




function getStepChecked($value='')
{
  $orderID =Session::has('orderID') ? Session::get('orderID') : 0;
  $order = \App\Order::find($orderID);
   
     
    if(!empty($order) && $order->$value > 0){
         return 'form-steps__item--completed';
    }

}


function getStepBillingChecked()
{
   $orderID =Session::has('orderID') ? Session::get('orderID') : 0;
   $order = \App\Order::with('BillingAddress')->where('id',$orderID)->first();

   if(!empty($order) && !empty($order->BillingAddress)){
         return 'form-steps__item--completed';
    }

}



function StepLabelChecking($label)
{
   switch ($label) {
     case 1:
        return '<a href="'.url(route('cart_list')).'">Products</a>';
       break;

     case 2:
        return '<a href="'.url(route('checkout')).'">Shipping Address</a>';
       break;

     case 3:
        return '<a href="'.url(route('step_two')).'">Shipping Type</a>';
       break;

     case 4:
        return '<a href="'.url(route('step_3')).'">Review Order</a>';
       break;


     case 5:
        return '<a href="'.url(route('billingAddressView')).'">Billing Address</a>';
       break;

      case 6:
        return '<a href="'.url(route('step_4')).'">Payment</a>';
       break;
     
     default:
       # code...
       break;
   }

}



function captureAreaChecked($product_id,$area_id)
{
     $c =  \App\ProductDesign::where('product_id',$product_id)->where('capturearea_id',$area_id)->count();

     return $c > 0 ? 'checked' : '';
}






function getSizeogImage($filename,$type='Print File')
{

    $img = str_replace("/thumb_","/",$filename);









// $obj = new \App\Http\Controllers\Users\AddressController;
// return $obj->dpi($img);


 // $imagick = new \Imagick($img);
 // $data = $imagick->identifyimage();

 // $dpi = get_dpi($img);



 //    $image = new Imagick($filename);
 //    $resolutions = $image->getImageResolution();

 //    print_r($resolutions);
 

 //   list($w,$h)= getimagesize(public_path($img));
 //   $arr= filesize($img);
 //   $size =  formatSizeUnitss($arr);
   
 //   $size_in_inches=round($w/$dpi,1)."x".round($h/$dpi,1);

 //   $text  = '<table class="table">';
 //   $text .= '<tr><th>Type: </th><td>'.$type.'</td></tr>';
 //   $text .= '<tr><th>Size: </th><td>'.$size.' / '.$size_in_inches.'"</td></tr>';
 //   $text .= '<tr><th>Resolution: </th><td>'.$w.' x '.$h.' @ '.$dpi.'dpi</td></tr>';
 
 //   $text .= '</table>';
   
 //   return $text;

}







function dpi_parms($obj)
{
   $data = (array)json_decode($obj->dpi);

   if(!empty($data) && count($data) > 0){

       $width = $data['width'];
       $height = $data['height'];
       $fileSize = $data['size'];
      $dpi = $data['dpi'];
  

      $width_inches = $data['width_inches']; 
      $height_inches = $data['height_inches'];

      $inches = $dpi > 0 ? $fileSize.' / '.$width_inches.'" x'.$height_inches.'"' : $fileSize;
      

     $widthHeight =  $dpi > 0 ? $width.' x '.$height.' @ '.$dpi.'dpi' : $width.' x '.$height;


       return '<table class="table">
         <tbody>
         <tr><th>Type: </th><td>Print File</td></tr>
         <tr><th>Size: </th><td>'.$inches.'</td></tr>
         <tr><th>Resolution: </th><td>'.$widthHeight.'</td></tr>
         </tbody>
       </table>';

 

   }else{

        // $imgNammme = str_replace("/thumb_","/",$obj->image);

        // $oobj = new \App\Http\Controllers\Users\AddressController;
        // $data_dpi = $oobj->dpi($imgNammme);

        // $o = \App\UserLibrary::find($obj->id);
        // $o->dpi = json_encode($data_dpi);
        // $o->save();
   }
}





function couponAppliedToCart($total=null)
{
  $obj = new \App\Http\Controllers\CartController();

  return $total == null ? $obj->subTotalGrandTotal($total) : $arr= $obj->discountedTotal();
}





function image_info_popup($filename,$type='Print File')
{

   $img = str_replace("/thumb_","/",$filename);

   $dpi = get_dpi($img);



    $image = new Imagick($filename);
    $resolutions = $image->getImageResolution();
 

   list($w,$h)= getimagesize(public_path($img));
   $arr= filesize($img);
   $size =  formatSizeUnitss($arr);

  return $w.' x '.$h.' @ '.$dpi.'dpi';

}


function get_dpi($filename){
 


  // $cmd = 'identify -quiet -format "%x" '.public_path($filename);       
  //       @exec(escapeshellcmd($cmd), $data);
  //     return is_array($data) ? round($data[0]) : '';
        // if($data && is_array($data)){
        //    return $data = explode(' ', $data[0]);

        //     if($data[1] == 'PixelsPerInch'){
        //         return $data[0];
        //     }elseif($data[1] == 'PixelsPerCentimeter'){
        //         $x = ceil($data[0] * 2.54);
        //         return $x;
        //     }elseif($data[1] == 'Undefined'){
        //         return $data[0];
        //     }                       
        // }
         return 72;
 
}


 function formatSizeUnitss($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}


//================= all notifications messages ==================


function allnotifications($user,$message)
{

        
  
        \Notification::send($user, new \App\Notifications\AllNotification($message));     

}
            
         
//================= count order with status ==================


function getOrderStatus($status,$u_id=0)
{
     $user_id = $u_id == 0 ? \Auth::user()->id : $u_id;

        $orders = \App\Order::where('user_id',$user_id)
                  ->where(function($t) use($status){
                           if($status >= 0 && $status < 10){
                              $t->where('status',$status);
                           }else{
                            $t->where('status','>=',0);
                           }
                   })->count();


        return $orders;

}

//=============== mailchimp ====================================



function mailchimp_subscribe($data)
{


     // MailChimp API credentials
        $apiKey = getMataData('mailchimp_api_key','api_setting');
        $listID = getMataData('mailchimp_list_id','api_setting');
        
        // MailChimp API URL
        $memberID = md5(strtolower($data['email']));
        $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
        
        // member information
        $json = json_encode([
            'email_address' => $data['email'],
            'status'        => 'subscribed',
            'merge_fields'  => [
                'FNAME'     => $data['first_name'],
                'LNAME'     => $data['last_name']
            ]
        ]);
        
        // send a HTTP POST request with curl
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $httpCode;
}
            
function getLastName($company_name)
{
   $text = '';

   foreach ($company_name as $key => $value) {
        if($key == 1){
            $text .=$value;
        }

        if($key > 1){
            $text .= ' '.$value;
        }
   }

   return $text;
}

//=============================shopify request==========================


function shopify_request($url,$method="GET",$shop,$data='')
{
          $token = $shop->shopify_token; 
          


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','X-Shopify-Access-Token:'.$token));
    
    
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    if(!empty($data)){
     curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data)); 
    }
    //curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($product_array));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);
     $res = curl_exec($curl);
     $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
     curl_close ($curl);

      return array('result'=>$res,'httpcode'=>$httpcode);  
}



//========================= track order url==============================


function tracking_url($order_id){

  $tracking_info=\App\OrderShipping::where('order_id',$order_id)->first();
  $tracking_url='javascript:0;';
  if(!empty($tracking_info)):
   switch ($tracking_info->tracking_method) {

                  case "UPS":
                      $tracking_url='https://wwwapps.ups.com/tracking/tracking.cgi?tracknum='.$tracking_info->tracking_id;
                      
                      break;

                  case "USPS":
                      $tracking_url='https://tools.usps.com/go/TrackConfirmAction?tLabels='.$tracking_info->tracking_id;
                      
                      break;
              }
  
   endif;
  return $tracking_url;

}

//======================add shopify tracking =============================


function shopify_tracking($order,$ordershipping){

        if(!empty($order->store_id)&&!empty($ordershipping->tracking_id)){

              $shop=\App\Shop::find($order->store_id);



              $url = "https://".$shop->shopify_domain."/admin/api/2019-07/locations.json";
              $method = "GET";
              $shop_result=shopify_request($url,$method,$shop);
              $location_id=json_decode($shop_result['result']);

              if(count($location_id->locations)>0){
                  
                  $location_id=json_decode($shop_result['result'])->locations[0]->id;

                  $shopify_order=json_decode($order->bckup_cart);

                  $line_items=$shopify_order->line_items;

                  $order_array = array(

                             "fulfillment"=>array(
                                  "location_id" => '32760856662',
                                  "tracking_number" => $ordershipping->tracking_id,
                                  "tracking_company"=> $ordershipping->tracking_method,
                                  "line_items"=>$line_items
                               )
                     );

                  

                  $url = "https://".$shop->shopify_domain."/admin/api/2019-07/orders/".$shopify_order->id."/fulfillments.json";
                  $method = "POST";
                  $shop_result=shopify_request($url,$method,$shop,$order_array);
                  return $shop_result;  
                }
          }
}





function getWalletAmount()
{
    

     $status = getMataData('stripe_status','api_setting') == 'live' ? 1 : 0;

     if(\Auth::check() && \Auth::user()->role == "user"):
     $wallet = \App\MyWallet::where('user_id',\Auth::user()->id)->first();

     $credit = \App\Transaction::where('my_wallet_id',$wallet->id)
                               ->where('user_id',\Auth::user()->id)
                               ->where('credit_debit',1)
                               ->where('payment_status',$status)
                               ->sum('amount');

     $debit = \App\Transaction::where('my_wallet_id',$wallet->id)
                              ->where('user_id',\Auth::user()->id)
                              ->where('credit_debit',2)
                              ->where('payment_status',$status)
                              ->sum('amount');

     return round(($credit - $debit),2);
   endif;
}



function updateConfigVariable()
{

         $arr =paypalAccount();
         $email = getMataData('smtp_username','api_setting');
         $password = getMataData('smtp_password','api_setting');
       return [
                'paypal.mode' => $arr['PAYPAL_STATUS'],
                'paypal.live.username' => $arr['PAYPAL_LIVE_API_USERNAME'],
                'paypal.live.password' => $arr['PAYPAL_LIVE_API_PASSWORD'],
                'paypal.live.secret' => $arr['PAYPAL_LIVE_API_SECRET'],
                'mail.username' => $email,
                'mail.password' => $password
                 
           ];


}









function THumbnailnailPrintfile($file)
{
                               $img = str_replace("toolImg/","toolImg/thumb_",$file);
                               $directoryPath= public_path() . '/'.$img;
                               if(File::exists($directoryPath)){
                                   return $img;
                                } else {
                                   return $file;
                                } 
}


function create_taxjar_transaction($orderID){

      $TAXJAR_API_KEY = getMataData('apitaxjar_key','api_setting');

      $client = \TaxJar\Client::withApiKey($TAXJAR_API_KEY);

      $Orderdata = \App\Order::with(['orderItems','getUser','DeliveryAddress','BillingAddress','ReturnAddress','getshippingmethod'])
      ->where('id', $orderID)
      ->first();


      $address = (!empty($Orderdata->DeliveryAddress->address)) ? $Orderdata->DeliveryAddress->address : '3631 131st Ave N.';

      $address2 = (!empty($Orderdata->DeliveryAddress->address2)) ? $Orderdata->DeliveryAddress->address2 : '';

      $city = (!empty($Orderdata->DeliveryAddress->city->name)) ? $Orderdata->DeliveryAddress->city->name : 'Clearwater';

      $zipcode = (!empty($Orderdata->DeliveryAddress->zipcode)) ? $Orderdata->DeliveryAddress->zipcode : '33762';

      $state = getNameBy($zipcode,'state_sortname');

      $tocountry =  (!empty($Orderdata->DeliveryAddress->country->sortname)) ? $Orderdata->DeliveryAddress->country->sortname : 'US';
      $shipping_amount =  (!empty($Orderdata->getshippingmethod->cost)) ? $Orderdata->getshippingmethod->cost : 0;
     
      $order_items=array();

      foreach ($Orderdata->orderItems as $orderitemdata) {
          $order_items[]=array('quantity' => $orderitemdata->qty,
                      'product_identifier' => $orderitemdata->product_id.'-'.$orderitemdata->size_id.'-'.$orderitemdata->color_id,
                      'description' => $orderitemdata->product->product_name,
                      'unit_price' => $orderitemdata->product->price,
                      'sales_tax' => $orderitemdata->product->sale_tax);
      }
    
    try {
      
      $createOrder=[
                  'transaction_id' =>$Orderdata->orderID,
                  'transaction_date' => date_format_for_taxjar($Orderdata->created_at),
                  'to_country' => $tocountry,
                  'to_zip' => $zipcode,
                  'to_state' => $state,
                  'to_city' => $city,
                  'to_street' => $address.' '.$address2,
                  'amount' => $Orderdata->total-$Orderdata->tax,
                  'shipping' => $shipping_amount,
                  'sales_tax' => $Orderdata->tax,
                  'line_items' => $order_items
                ];

      $order = $client->createOrder($createOrder);

           

        $taxjar_transaction=new \App\TaxjarTransaction();

        $taxjar_transaction->order_id=$orderID;

        $taxjar_transaction->json_input=json_encode($createOrder);

        $taxjar_transaction->json_response=json_encode($order);

        $taxjar_transaction->transaction_type='created';

        $taxjar_transaction->save();

        return array('status'=>'1','message'=>'');

      } catch (TaxJar\Exception $e) {
        // 406 Not Acceptable – transaction_id is missing
        return array('status'=>'0','message'=>$e->getMessage());
        
      }

}

function calculate_tax_taxjar_shopify($order_id,$orderitems){

      $TAXJAR_API_KEY = getMataData('apitaxjar_key','api_setting');

      $client = \TaxJar\Client::withApiKey($TAXJAR_API_KEY);

      $phone_number = getMataData('phone_number','return_address');
      $zipcode = getMataData('zipcode','return_address');
      $address = getMataData('address','return_address');
      $address2 = getMataData('address2','return_address');
      $country_name = getNameBy('country',getMataData('country_name','return_address'),'sortname');
      $state_name = getNameBy('state_sortname',$zipcode);
      $city_name = getNameBy('city',getMataData('city_name','return_address'));

      $delivery_address = \App\DeliveryAddress::where('order_id',$order_id)->first();

      $to_zipcode = trim($delivery_address->zipcode);
      $to_address = trim($delivery_address->address);
      $to_address2 = trim($delivery_address->address2);
      $to_country_name = getNameBy($delivery_address->country_id,'country','sortname');
      $to_state_name = getNameBy($to_zipcode,'state_sortname');
      $to_city_name = getNameBy($delivery_address->city_id,'city');
          

      $order_items=array();
      $total=0;
      foreach($orderitems as $item) {

          $produtc_info=$item->product_id."-".$item->size_id."-".$item->color_id."-".Rand(1,1000);
          $order_items[]=array('id' =>$produtc_info,'quantity' =>$item->qty,'product_tax_code' => '19009','unit_price' =>$item->price,'discount' => 0);
          $total=$total+$item->price;
      }

      $shipping_id = 1;

      $shipping = \App\Shipping::find($shipping_id);
      
      try {

      $order_taxes = $client->taxForOrder([
                                        'from_country' =>$country_name,
                                        'from_zip' => $zipcode,
                                        'from_state' => $state_name,
                                        'from_city' => $city_name,
                                        'from_street' => $address,
                                        'to_country' => $to_country_name,
                                        'to_zip' => $to_zipcode,
                                        'to_state' => $to_state_name,
                                        'to_city' => $to_city_name,
                                        'to_street' => $to_address,
                                        'amount' => $total,
                                        'shipping' =>$shipping->cost,
                                        'nexus_addresses' => [
                                          [
                                            'id' => 'Main Location',
                                            'country' => 'US',
                                            'zip' => '92093',
                                            'state' => 'CA',
                                            'city' => 'La Jolla',
                                            'street' => '9500 Gilman Drive',
                                          ]
                                        ],
                                        'line_items' => $order_items
                                      ]);

      
Log::debug("refund_transaction taxjar error=============".$order_taxes->amount_to_collect); 
        return $order_taxes->amount_to_collect;

      } catch (TaxJar\Exception $e) {
        // 406 Not Acceptable – transaction_id is missing
        Log::debug("refund_transaction taxjar error=============".$e->getMessage()); 
        return 0;
        
      }

}


function calculate_tax_taxjar(){

      $TAXJAR_API_KEY = getMataData('apitaxjar_key','api_setting');

      $client = \TaxJar\Client::withApiKey($TAXJAR_API_KEY);

      $phone_number = getMataData('phone_number','return_address');
      $zipcode = getMataData('zipcode','return_address');
      $address = getMataData('address','return_address');
      $address2 = getMataData('address2','return_address');
      $country_name = getNameBy('country',getMataData('country_name','return_address'),'sortname');
      $state_name = getNameBy('state_sortname',$zipcode);
      $city_name = getNameBy('city',getMataData('city_name','return_address'));

      $delivery_address = (object)json_decode(\Session::get('delivery_address'));
           
     $to_zipcode = trim($delivery_address->zipcode);
     $to_address = trim($delivery_address->address);
     $to_address2 = trim($delivery_address->address2);
     $to_country_name = getNameBy($delivery_address->country_name,'country','sortname');
     $to_state_name = getNameBy($to_zipcode,'state_sortname');
     $to_city_name = getNameBy($delivery_address->city_name,'city');
      
      
     
      $order_items=array();

      foreach(\Cart::getContent() as $item) {

          $produtc_info=$item->attributes->product_id."-".$item->attributes->size_id."-".$item->attributes->color_id."-".Rand(1,1000);
          $order_items[]=array('id' =>$produtc_info,'quantity' =>$item->quantity,'product_tax_code' => '19009','unit_price' =>$item->price,'discount' => 0);
      }

      $shipping_id =  \Session::get('shipping_charge');

      $shipping = \App\Shipping::find($shipping_id);
      
      try {

      $order_taxes = $client->taxForOrder([
                                        'from_country' =>$country_name,
                                        'from_zip' => $zipcode,
                                        'from_state' => $state_name,
                                        'from_city' => $city_name,
                                        'from_street' => $address,
                                        'to_country' => $to_country_name,
                                        'to_zip' => $to_zipcode,
                                        'to_state' => $to_state_name,
                                        'to_city' => $to_city_name,
                                        'to_street' => $to_address,
                                        'amount' => \Cart::getTotal(),
                                        'shipping' =>$shipping->cost,
                                        'nexus_addresses' => [
                                          [
                                            'id' => 'Main Location',
                                            'country' => 'US',
                                            'zip' => '92093',
                                            'state' => 'CA',
                                            'city' => 'La Jolla',
                                            'street' => '9500 Gilman Drive',
                                          ]
                                        ],
                                        'line_items' => $order_items
                                      ]);

      Session::put('taxjar_tax_amount',json_encode($order_taxes));

        return array('status'=>'1','message'=>'');

      } catch (TaxJar\Exception $e) {
        // 406 Not Acceptable – transaction_id is missing
        return array('status'=>'0','message'=>$e->getMessage());
        
      }

}


function refund_transaction($order_id){

    $TAXJAR_API_KEY = getMataData('apitaxjar_key','api_setting');

    $client = \TaxJar\Client::withApiKey($TAXJAR_API_KEY);

    $transaction=\App\TaxjarTransaction::where('order_id',$order_id)->where('transaction_type','created')->first();

               
    try {

    $json_input=json_decode($transaction['json_input']);

    $json_input->transaction_reference_id=$json_input->transaction_id;

    $json_input->transaction_id=$json_input->transaction_id."-refund";

    $refund = $client->createRefund($json_input);

    $taxjar_transaction=new \App\TaxjarTransaction();

    $taxjar_transaction->order_id=$order_id;

    $taxjar_transaction->json_input=$transaction->json_input;

    $taxjar_transaction->json_response=json_encode($refund);

    $taxjar_transaction->transaction_type='refund';

    $taxjar_transaction->save();

    Log::debug("refund_transaction taxjar success=============");        

    } catch (TaxJar\Exception $e) {
        // 406 Not Acceptable – transaction_id is missing
        Log::debug("refund_transaction taxjar error=============".$e->getMessage());        
        return array('status'=>'0','message'=>$e->getMessage());
      }


   


}


function get_user_status_show($id)
{
  $all_status=array(0=>'Deactivated',1=>'Activated',2=>'Deleted');
  return $all_status[$id];

}

function get_email_subscribe_status($temp_id,$user_id,$type)
{

  $subscribe=\App\NotificationSettings::firstOrNew(['user_id' =>$user_id,'email_id' =>$temp_id],['email_status'=>1,'website_status'=>1]);
  $subscribe->save();
  
  if($type=="email"){
   return $subscribe->email_status;
  }

  if($type=="website"){
   return $subscribe->email_status;
  }

}

function float_number($foo)
{
  return number_format((float)$foo, 2, '.', '');
}


function register_webhook_shopify($shop_id){

  $store_info = \App\Shop::find($shop_id);

  $data = array(
            "webhook"=>array(
                "topic"=> "orders/create",
                "address"=> "https://printgenie.com/create/order",
                "format"=> "json",
               
                
              )
           );
        
     
  $url = "https://".$store_info->shopify_domain."/admin/api/2019-07/webhooks.json";

  try {

  $result = shopify_request($url,"POST",$store_info,$data);

  $store_info->webhook_data=json_encode($result);

  $store_info->save();

  return 1;   

}catch (\Exception $e) {

    return 0;
}

       
      
}

