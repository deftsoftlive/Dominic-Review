<?php

namespace App\Http\Controllers\Home\Deals;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VendorCategory;
use App\Models\Vendors\DiscountDeal;
use Session;
use Auth;
use App\Models\Vendors\Chat;
use App\Models\Vendors\ChatMessage;
class DealsController extends Controller
{
    


#----------------------------------------------------------------------------
#  index Page ---------------------------------------------------------------
#----------------------------------------------------------------------------



   public function index()
   {

   	  $category = \App\Category::join('vendor_categories','vendor_categories.category_id','=','categories.id')
                               ->select('categories.*')
                               ->where('categories.status',1)
                               ->where('categories.parent',0)
                               ->orderBy('sorting','ASC')
                               ->groupBy('categories.id')
                               ->get();

                               
   	 return view('home.deals.index')
   	 ->with('categories',$category);
   }



#----------------------------------------------------------------------------
#  get deals  ---------------------------------------------------------------
#----------------------------------------------------------------------------




public function getDeals(Request $request)
{

        $IDs = $this->dealFilterIds($request);
        $discount_deals = DiscountDeal::with('Business.getChatOfLoggedUser')
                          ->join('vendor_categories','vendor_categories.id','=','discount_deals.vendor_category_id')
                          ->join('categories','categories.id','=','vendor_categories.category_id')
                          ->join('users','users.id','=','vendor_categories.user_id')
                          ->select('discount_deals.*')
                          
                          
                          ->whereIn('discount_deals.id',$IDs)
                          ->where('vendor_categories.status',3)
                          ->where('vendor_categories.publish',1)
                          ->orderBy('discount_deals.id','DESC');
 
      

    $vv = view('home.includes.deals.list', $this->getSesssionData())
         ->with('dealCount',$discount_deals->count())
         ->with('discount_deals',$discount_deals->paginate(20));
   return response()->json([
       'status' => 1,
       'deals' => $vv->render(),
       'dealCount' => $discount_deals->count()
   ]);
}






public function dealFilterIds($request)
{
    $latitude = $request->latitude;
    $longitude = $request->longitude;

      $haversine = "(3959 * acos(cos(radians($latitude)) 
                                                * cos(radians(vendor_categories.latitude)) 
                                                * cos(radians(vendor_categories.longitude) 
                                                - radians($longitude)) 
                                                + sin(radians($latitude)) 
                                                * sin(radians(vendor_categories.latitude))))";
   
    $discount_deals = DiscountDeal::join('vendor_categories','vendor_categories.id','=','discount_deals.vendor_category_id')
                          ->join('categories','categories.id','=','vendor_categories.category_id')
                          ->join('users','users.id','=','vendor_categories.user_id')
                          ->select('discount_deals.*',
                            'vendor_categories.travel_distaince',
                            'vendor_categories.latitude',
                            'vendor_categories.longitude' 
                          )
                          ->where(function($t) use($request) {
                              if(!empty($request->categories)) {
                                   $t->whereIn('categories.id', $request->categories);
                             }
                          })
                          ->where('vendor_categories.status',3)
                          ->where('vendor_categories.publish',1);
                          //->orderBy('discount_deals.id','DESC');



                           if(!empty($latitude) && !empty($longitude)){
                                 

                                 $deals =$discount_deals->selectRaw("{$haversine} AS distance")
                                            ->join('vendor_categories as t2', function ($join) use($haversine){
                                                              $join->on('discount_deals.vendor_category_id', '=', 't2.id')
                                                              ->where('vendor_categories.travel_distaince' ,'>',\DB::Raw($haversine));
                                             })
                                            ->get();

                             }else{
                                  $deals = $discount_deals->get();
                              
                             }






                  $discount_deals = $deals->filter(function($d){
                               if($d->deal_life == 1 ){
                                    $cDate = strtotime(date('Y-m-d'));
                                    $start = strtotime($d->start_date);
                                    $end = strtotime($d->expiry_date);
                                    if($cDate >= $start && $cDate <= $end){
                                         return $d;
                                    }
                                }elseif($d->deal_life == 0){
                                    return $d;
                                }
                               
                  });

       return $discount_deals->pluck('id');
}










#----------------------------------------------------------------------------
#  get deals  ---------------------------------------------------------------
#----------------------------------------------------------------------------


public function getSesssionData()
{
  $arr =[];
   if(Auth::check() && Auth::user()->role == "user" && !Session::has('dealData')){
       $arr =[
         'name' => Auth::user()->name,
         'phone' => '',
         'email' => Auth::user()->email,
         'event_date' => '',
         
       ];
   }elseif(Session::has('dealData')){
      $dealdata =Session::get('dealData');
      $arr =[
         'name' => $dealdata['name'],
         'phone' => $dealdata['phone_number'],
         'email' => $dealdata['email'],
         'event_date' => $dealdata['event_date'],
          
       ];
   }else{
      $arr =[
         'name' => '',
         'phone' => '',
         'email' => '',
         'event_date' => '',          
      ];
   }

   return $arr;

}





public function getDealRequest(Request $request)
{

    $v = \Validator::make($request->all(),[
        'deal_id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'phone_number' => 'required',
        'event_date' => 'required|after:yesterday',
        'message' => 'required',
    ]);

    $id = $request->deal_id;

    $deal = DiscountDeal::find($id);
                         


    if($v->fails()){

       return response()->json(['status' => 0,'errors' => $v->errors()]);

    }elseif(empty($deal)){

       return response()->json(['status' => 2,'message' => 'This deal is not valid!']);

    }elseif(!empty($deal) && $deal->deal_life == 1 && $deal->expiry_date < date('Y-m-d')){

       return response()->json(['status' => 3,'message' => 'This deal is Expired!']);

    }elseif(!Auth::check() || Auth::user()->role != "user"){

       return response()->json(['status' => 4,'message' => 'Your are not logged in. please login first.']);

    }else{


         
         $c = $this->sendMessage($request,$deal);
         
        if($c > 0){
          $link = url(route('deal_discount_chats')).'?chat_id='.$c;
          $links = 'Your message has been sent to vendor, soon that will reply you. <a href="'.$link.'">view chat</a>';
          return response()->json(['status' => 1, 'link' => $links]);
        }else{
          return response()->json(['status' => 2, 'message' => 'Something wrong!']);
        }
        

    }
     
      

}


#----------------------------------------------------------------------------------------------
#  Send Message -------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------



public function sendMessage($request,$deal)
{
          $data = [
             'name' => $request->name,
             'email' => $request->email,
             'phone_number' => $request->phone_number,
             'event_date' => $request->event_date,
          ];
          
          Session::put('dealData',$data);
          #################################################



          $text ='Hello '.$deal->vendor->first_name.'<br>';
          $text .=  $request->message.'<br>';
          $text .='By '.$request->name.', Email: '.$request->email .', Phone Number : '.$request->phone_number .'<br>';
          


          #################################################
          
          $chats = Chat::where('user_id',Auth::user()->id)
                      // ->where('deal_id',$deal->id)
                       ->where('vendor_id',$deal->user_id)
                       ->where('business_id',$deal->vendor_category_id);

          if($chats->count() > 0){
                $chat = $chats->first();
                $chat->updated_at =\Carbon\Carbon::now();
                $chat->save();
                $m = new ChatMessage;
                $m->sender_id = trim(Auth::user()->id);
                $m->receiver_id = trim($deal->user_id);
                $m->deal_id = trim($deal->id);
                $m->business_id = trim($deal->vendor_category_id);
                $m->chat_id = trim($chat->id);
                $m->message = $text;
                $m->sender_status = 0;
                $m->receiver_status = 0;
                $m->save();
                 return $chat->id;
          }else{
          
                $chat = new Chat;
                $chat->user_id = Auth::user()->id;
                $chat->business_id = $deal->vendor_category_id;
                $chat->deal_id = $deal->id;
                $chat->vendor_id =trim($deal->user_id);
                $chat->updated_at =\Carbon\Carbon::now();
                $chat->status = 0;
                if($chat->save()){
                      $m = new ChatMessage;
                      $m->sender_id = trim(Auth::user()->id);
                      $m->receiver_id = trim($deal->user_id);
                      $m->deal_id = trim($deal->id);
                      $m->business_id = trim($deal->vendor_category_id);
                      $m->chat_id = trim($chat->id);
                      $m->message = $text;
                      $m->sender_status = 0;
                      $m->receiver_status = 0;
                      $m->save();
                  return $chat->id;

                }

        }
   

}




public function detail($slug)
{

         $discount_deals = DiscountDeal::with('Business.getChatOfLoggedUser')
                          ->join('vendor_categories','vendor_categories.id','=','discount_deals.vendor_category_id')
                          ->join('categories','categories.id','=','vendor_categories.category_id')
                          ->join('users','users.id','=','vendor_categories.user_id')
                          ->select('discount_deals.*')
                         
                          ->where(function($t) {
                             $data = $t->first();

                             if($data->deal_life == 1) {
                                  $data->whereDate('discount_deals.expiry_date', '>=', date('Y-m-d'));
                             }
                             
                             

                          })
                          ->where('vendor_categories.status',3)
                          ->where('vendor_categories.publish',1)
                          ->where('discount_deals.slug',$slug)
                          ->first();
   if($discount_deals->type_of_deal == 0){
         $vendor_category_id = $discount_deals->vendor_category_id;
         $VendorPackage = \App\VendorPackage::where('vendor_category_id',$vendor_category_id)->get();

   }else{
     $vendor_category_id = $discount_deals->vendor_category_id;
        $VendorPackage = \App\VendorPackage::where('vendor_category_id',$vendor_category_id)
                                ->where('id',$discount_deals->packages)
                                 ->get();

   }
 
  $chats = $discount_deals->Business->getChatOfLoggedUser != null && $discount_deals->Business->getChatOfLoggedUser->count() > 0 ? 1 : 0;
  $links = $this->getChatMessages($discount_deals);
  return view('home.deals.detail',$this->getSesssionData())
                                       ->with('deal',$discount_deals)
                                       ->with('chats',$chats)
                                       ->with('links',$links)
                                       ->with('packages',$VendorPackage);
}









#--------------------------------------------------------------------------------
#
#--------------------------------------------------------------------------------


public function getChatMessages($deal)
{
  if($deal->Business->getChatOfLoggedUser != null && $deal->Business->getChatOfLoggedUser->count() > 0){
      $link = url(route('deal_discount_chats')).'?chat_id='.$deal->Business->getChatOfLoggedUser->id;
      return $links = '<div class="deal-sucess-msg"><span class="suc-msg-icon"><i class="far fa-clock"></i></span>Your message has been sent to vendor, soon vendor will reply you.<div class="btn-wrap text-center mt-3"><a href="'.$link.'" class="cstm-btn">View chat</a>
     </div>
     </div>';
  }
}












}
