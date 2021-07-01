<?php
namespace App;
use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Shop\ShopCartItems;
// class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable
{
    use Notifiable;
    public $table ='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','first_name', 'last_name', 'gender', 'date_of_birth', 'address', 'town', 'postcode', 'county', 'country', 'phone_number', 'email', 'password', 'parent_id', 'tennis_club', 'type', 'relation', 'book_person', 'show_name', 'enable_inovice', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function __construct()
    {
        $this->getShopCartTotal();
    }


    public function services()
    {
       return $this->hasMany('App\VendorCategory')->where('parent',0);
    }


    public function orders()
    {
       return $this->hasMany('App\Models\Order');
    }


    public function faqs()
    {
       return $this->hasMany('App\Models\Vendors\FAQ');
    }

 
    public function chats()
    {
       return $this->hasMany('App\Models\Vendors\Chat')
                   ->orderBy('updated_at','DESC');
                   
    }


    public function UpcomingEvents()
    {
       return $this->hasMany('App\UserEvent')
                   ->orderBy('updated_at','DESC');
                   
    }
    
    public function UpcomingUserEvents()
    {
       return $this->hasMany('App\UserEvent')
                   ->whereDate('start_date','>',date('Y-m-d'))->OrderBy('start_date','ASC');
                   
    }


    public function newMessages()
    {
       return $this->hasMany('App\Models\Vendors\Chat')
                   ->join('chat_messages','chat_messages.chat_id','=','chats.id')
                   ->where('chat_messages.receiver_id',\Auth::user()->id) 
                   ->where('chat_messages.receiver_status',0);
                   
    }


    public function newVendorsMessages()
    {
       return $this->hasMany('App\Models\Vendors\Chat','vendor_id') 
                    ->join('chat_messages','chat_messages.chat_id','=','chats.id')
                    ->where('chat_messages.receiver_id',\Auth::user()->id)
                    ->where('chat_messages.receiver_status',0);
    }



    public function newVendorsBusinessMessages()
    {
       return $this->hasMany('App\Models\Vendors\Chat','vendor_id') 
                       
                       ->where(function($t){
                            $msg = $t->first();
                            $unReadMessages = \DB::table('chat_messages')->where('chat_id',$msg->id)
                                                              ->where('receiver_id',\Auth::user()->id)
                                                              ->where('receiver_status',0)
                                                              ->count();
                            if($unReadMessages == 0){
                                $t->where('vendor_id',0);
                            }
                       });
    }

    public function favouriteVendors() {
      return $this->hasMany('App\FavouriteVendor');
    }




    public function CartItems()
    {
        return $this->hasMany('App\Models\EventOrder')->where('type','cart');
    }



     public function MyWishlist()
    {
        return $this->hasMany('App\Models\EventOrder')->where('type','wishlist');
    }

    

    public function shop()
    {
       return $this->hasOne('App\Models\Vendors\Eshop','vendor_id','id');
    }


    public function ShopProductCount()
    {
        return $ShopCartItems = ShopCartItems::where('user_id',$this->id)
                                             ->where('type','cart')
                                             ->sum('quantity');
                                       
    }



    public function ShopProductCartItems()
    {
      $this->getShopCartTotal();
        return $this->hasMany('App\Models\Shop\ShopCartItems')
                    ->where('type','cart');
                                       
    }

     public function myShopWishList()
    {
      $this->getShopCartTotal();
        return $this->hasMany('App\Models\Shop\ShopCartItems')
                    ->where('type','wishlist');
                                       
    }


    public function ShopProductCartItemOfVendors()
    {
        return $this->hasMany('App\Models\Shop\ShopCartItems')
                    ->where('type','cart')
                    ->groupBy('vendor_id');
                                       
    }



    public function getShopCartTotal()
    { 
          $items = ShopCartItems::where('user_id',$this->id)->whereIn('type',['cart'])->get();

          foreach ($items as $key => $im) {

                $dis_code = isset($im->discount_code) ? $im->discount_code : 0; 

                if(!empty($dis_code))
                {
                    $coupon = Coupon::where('coupon_code',$dis_code)->first();
                    $voucher = ShopCartItems::where('voucher_code',$dis_code)->first();

                    // dd($coupon,$voucher);

                    if(!empty($coupon))
                    {
                        $dis_type = $coupon->discount_type;
                    }
                    elseif(!empty($voucher))
                    {
                        $voucher = Vouchure::where('id',$voucher->voucher_id)->first(); 
                        $dis_type = $voucher->discount_type;
                    }
                }

                    // dd($dis_type);

                $dis_price = isset($im->discount_price) ? $im->discount_price : 0;
                

                /*Assign for product*/  
                if($im->shop_type == 'product') {
                    $product = $im->product;  
                    $variation = \App\Models\Products\ProductAssignedVariation::find($im->variant_id);
                  if(!empty($product->final_price))
                  {
                    if(!empty($dis_type))
                    {
                      if($dis_type == '0')
                      {
                        $price = ($product->final_price)-($dis_price);
                      }else{
                        $price = ($product->final_price) - (($product->final_price) * ($dis_price / 100));
                      }
                    }else{
                      $price = ($product->final_price)-($dis_price);
                    }
                  }
                  if(!empty($variation))
                    {
                      if(!empty($product->final_price))
                      {
                        if($product->product_type == 1){
                          $price = ($variation->final_price)-($dis_price);;
                        }
                      }
                    }
                }else{

                    if($im->shop_type == 'course')
                    {
                      $early_bird_enable = 0;

                      $course_id = $im->product_id;
                      $course = Course::where('id',$course_id)->first();

                      if($course->type == '156')
                      {
                        $earlybird_data = \App\EarlyBirdManagementCourse::where('course_category_id',$im->earlybird_linked_cat_Id)->first();
                        if(!empty($earlybird_data)){
                          $early_bird_enable = $earlybird_data->early_bird_option;
                          $early_bird_date = $earlybird_data->early_bird_date;
                          $early_bird_time = $earlybird_data->early_bird_time;
                          $early_bird_utc_uk_diff = $earlybird_data->utc_uk_diff;
                          $early_bird_dis = $earlybird_data->discount_percentage;
                          
                          $endDate = strtotime(date('Y-m-d',strtotime($early_bird_date)).$early_bird_time); 
                          $currntD = strtotime(date('Y-m-d H:i:s')) + ($early_bird_utc_uk_diff*60*60);  
                        }
                      }
                      elseif($course->type == '191')
                      {
                        $earlybird_data = \App\EarlyBirdManagementCourse::where('course_category_id',$im->earlybird_linked_cat_Id)->first();
                        if(!empty($earlybird_data)){
                          $early_bird_enable = $earlybird_data->early_bird_option;
                          $early_bird_date = $earlybird_data->early_bird_date;
                          $early_bird_time = $earlybird_data->early_bird_time;
                          $early_bird_dis = $earlybird_data->discount_percentage;
                          $endDate = strtotime(date('Y-m-d',strtotime($early_bird_date)).$early_bird_time); 
                          $currntD = strtotime(date('Y-m-d H:i:s')) + ($early_bird_utc_uk_diff*60*60);  
                        }
                      }
                      elseif($course->type == '157')
                      {
                        $earlybird_data = \App\EarlyBirdManagementCourse::where('course_category_id',$im->earlybird_linked_cat_Id)->first();
                        if(!empty($earlybird_data)){
                          $early_bird_enable = $earlybird_data->early_bird_option;
                          $early_bird_date = $earlybird_data->early_bird_date;
                          $early_bird_time = $earlybird_data->early_bird_time;
                          $early_bird_dis = $earlybird_data->discount_percentage;
                          $endDate = strtotime(date('Y-m-d',strtotime($early_bird_date)).$early_bird_time); 
                          $currntD = strtotime(date('Y-m-d H:i:s')) + ($early_bird_utc_uk_diff*60*60);  
                        }
                      }

                      // $diff = $endDate - $currntD;

                      // $years = floor($diff / (365*60*60*24));  
                      // $months = floor(($diff - $years * 365*60*60*24) 
                      //                    / (30*60*60*24));  
                      // $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
                      // $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 
                      // $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
                      // $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60)); 

                      if($early_bird_enable == 1){                                      
                        if($currntD >= $endDate)
                        {
                          if(!empty($dis_type))
                          {
                            if($dis_type == '0')
                            {
                              $price =($course['price']) - ($dis_price);
                              $membership_price =($course['membership_price']) - ($dis_price);
                            }else{
                              $price = $course['price'] - (($course['price']) * ($dis_price / 100));
                              $membership_price = $course['membership_price'] - (($course['membership_price']) * ($dis_price / 100));
                            }
                          }else{
                            $price =($course['price'] - $dis_price);
                            $membership_price =($course['membership_price']) - ($dis_price);
                          }

                        }else{
                          $cour_price = $course['price'];
                          $membership_cour_price =$course['membership_price'];
                          $earlybird_dis_price = $cour_price - (($cour_price) * ($early_bird_dis/100));
                          $earlybird_dis_membership_price = $membership_cour_price - (($membership_cour_price) * ($early_bird_dis/100));

                          if(!empty($dis_type))
                          {
                            if($dis_type == '0')
                            {
                              $price =($earlybird_dis_price - $dis_price);
                              $membership_price =($earlybird_dis_membership_price - $dis_price);
                            }else{
                              $price = $earlybird_dis_price - (($earlybird_dis_price) * ($dis_price / 100));
                              $membership_price = $earlybird_dis_membership_price - (($earlybird_dis_membership_price) * ($dis_price / 100));
                            }
                          }else{
                            $price =($earlybird_dis_price - $dis_price);
                            $membership_price =($earlybird_dis_membership_price - $dis_price);
                          }
                        }
                      }else{
                        if(!empty($dis_type))
                        {
                          if($dis_type == '0')
                          {
                            $price =($course['price']) - ($dis_price);
                            $membership_price =($course['membership_price']) - ($dis_price);
                          }else{
                            $price = $course['price'] - (($course['price']) * ($dis_price / 100));
                            $membership_price = $course['membership_price'] - (($course['membership_price']) * ($dis_price / 100));
                          }
                        }else{
                          $price =($course['price'] - $dis_price);
                          $membership_price =($course['membership_price']) - ($dis_price);
                        }
                      }
                        

                    }elseif($im->shop_type == 'camp')
                      {
                        $camp_price = $im->camp_price;  

                        if(!empty($dis_price))
                        {
                          if($dis_type == '0'){
                            $price = ($camp_price) - ($dis_price);
                          }else{
                            $price = $camp_price - (($camp_price) * ($dis_price/100));
                          }
                        }else{
                          $price =($camp_price) - ($dis_price);
                        }
                        
                      }
                      elseif($im->shop_type == 'paygo-course')
                      {
                        /*$payGoPrice = $im->price;  */
                        $payGoPrice = $im->paygo_course_price;
                        if(!empty($dis_price))
                        {
                          if($dis_type == '0'){
                            $price = ($payGoPrice) - ($dis_price);
                          }else{
                            $price = $payGoPrice - (($payGoPrice) * ($dis_price/100));
                          }
                        }else{
                          $price =($payGoPrice) - ($dis_price);
                        }
                        
                      }
                    }

                    // dd($price);

                    



                     // $im->vendor_id = $product->user_id;
                     // $im->shop_id = $product->shop_id;

                    // If shop type is course and membership is active for current user at the time of purchase course
                    if($im->shop_type == 'course' && $im->membership_status == 1 && $im->membership_price > 0){
                      $im->price = $price;
                      $im->membership_price = $membership_price;
                      $im->total = ($membership_price * $im->quantity);
                    }else{
                      $im->price = $price;
                      $im->total = ($price * $im->quantity);                      
                    }

                    // Update Cart
                    $im->save();
            
            
          }
    }



    public function createOrderFromCart($order)
    {
        $items = ShopCartItems::where('user_id',$this->id)->where('type','cart')->get();
         foreach ($items as $key => $im) {
                      
                     $im->payment_status = 1;
                     $im->type = 'order';
                     $im->orderID = $order->orderID;
                     $im->order_id = $order->id;
                     $im->save();
                     $this->minusFromStock($im);
          }
          return 1;

    }


#==========================================================================================
#==========================================================================================

    public function minusFromStock($items)
    {
      if($items->shop_type == 'product')
      {
        if($items->variant_id > 0){

             if($items->choosedVariation->count() > 0 && $items->choosedVariation->stock_managable == 1){
                $v = $items->choosedVariation->inventoryWithVariation;
                $v->stock = ($v->stock - $items->quantity);
                $v->save();
             }

        }
        // else{
        //   $HasInventory = $items->product->HasInventory; 
        //   if($HasInventory != null && $HasInventory->count() > 0){
        //           $HasInventor->stock = ($HasInventor->stock - $items->quantity);
        //           $HasInventor->save();
        //   }
        // }
      }
    }

#==========================================================================================
#==========================================================================================









}
