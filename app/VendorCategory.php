<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Traits\NotificationFlash;
use Auth;
class VendorCategory extends Model
{

     use Sluggable;
     use SluggableScopeHelpers;
     use NotificationFlash;

     protected $fillable = [
        'parent', 'title', 'user_id', 'category_id', 'status', 'business_url', 'publish',
        'payment_status', 'paypal_account', 'stripe_account',
    ];
    
    public function sluggable()
    {
        return [

            'business_url' => [
                'source' => 'title'
            ]
        ];
    }






       // public static function getNearBy($lat, $lng)
       //  {
       //      $results =self::select(['*',\DB::raw('( 0.621371 * 3959 * acos( cos( radians('.$lat.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * sin( radians(latitude) ) ) ) AS distance')]);
       //      return $results;
       //  }

    public function getChatOfLoggedUser()
    { 
       return $this->hasOne('App\Models\Vendors\Chat','business_id','id')->where(function($t){
        
              if(Auth::check() && Auth::user()->role == "user"){

                  $t->where('chats.user_id',Auth::user()->id);

              }else{

                  $t->where('chats.user_id',0);

              }
       });
    }



    public function chats()
    {
       return $this->hasMany('App\Models\Vendors\Chat','business_id')
                    ->orderBy('updated_at','DESC');
    }
 

    public function category()
    {
       return $this->belongsTo('App\Category','category_id','id');
    }
 
    public function subcategory()
    {
       return $this->hasMany('App\VendorCategory','parent')
                    ->join('categories', 'categories.id', '=', 'vendor_categories.category_id')
                    ->select('vendor_categories.*')
                    ->where('categories.status', 1)
                    ->groupBy('vendor_categories.category_id');
       ;
    }


 
    public function faqs()
    {
       return $this->hasMany('App\FAQs','vendor_category_id','id');
    }
 
    public function VendorPackage()
    {
       return $this->hasMany('App\VendorPackage','vendor_category_id')->where('type',0);
    }
    
    public function CustomPackages()
    {
         $user_id = Auth::check() && Auth::user()->role =='user' ? Auth::user()->id : 0;
         return $this->hasMany('App\VendorPackage','vendor_category_id')
                     ->where('type',1)
                     ->where('user_requested_by',$user_id);
    }
 

    public function vendors()
    {
       return $this->belongsTo('App\User','user_id')->where('role','vendor');
    }
 
    public function basicInfo()
    {
       return $this->hasMany('App\VendorCategoryMetaData','vendor_category_id','id')
                   ->where('type','basic_information');
    }

 
    public function profileImages()
    {
       return $this->hasOne('App\VendorCategoryMetaData','vendor_category_id','id')
                    ->where('type','basic_information')
                   ->where(function($t){
                       $category = $t->first();
                       if($category->category->cover_type == 1){
                          $t->where('key','cover_photo');
                       }else{
                          $t->where('key','cover_video_image');
                       }
                   });
                   
    }
 
    public function profileImage()
    {
       return $this->hasOne('App\VendorCategoryMetaData','vendor_category_id','id')
                    ->where('type','basic_information')
                   ->where(function($t){
                       $category = $t->first();
                       if($category->category->cover_type == 1){
                          $t->where('key','cover_photo');
                       }else{
                          $t->where('key','cover_video_image');
                       }
                   });
                   
    }
    public function ImageGallery()
    {
       return $this->hasMany('App\VendorCategoryMetaData','vendor_category_id','id')
                   ->where('type','imageGallery');
    }



    public function VideoGallery()
    {
       return $this->hasMany('App\VendorCategoryMetaData','vendor_category_id','id')
                   ->where('type','videoGallery');
    }


    public function styles()
    {
       return $this->hasMany('App\VendorCategoryMetaData','vendor_category_id','id')
                   ->join('styles', 'styles.id', '=', 'vendor_category_meta_datas.keyValue')
                   ->select('vendor_category_meta_datas.*')
                   ->where('styles.status', 1)
                   ->where('vendor_category_meta_datas.type','styles')
                   ->groupBy('vendor_category_meta_datas.keyValue');
                    
    }




     public function seasons()
    {
       return $this->hasMany('App\VendorCategoryMetaData','vendor_category_id','id')
                    ->join('seasons', 'seasons.id', '=', 'vendor_category_meta_datas.keyValue')
                    ->select('vendor_category_meta_datas.*')
                    ->where('seasons.status', 1)
                    ->where('vendor_category_meta_datas.type','seasons')
                    ->groupBy('vendor_category_meta_datas.keyValue');
                                                                                                                    
    }
    


    public function description()
    {
       return $this->hasOne('App\VendorCategoryMetaData','vendor_category_id','id')
                   ->where('type','description');
    }


     public function prohibtion()
    {
       return $this->hasOne('App\VendorCategoryMetaData','vendor_category_id','id')
                   ->where('type','prohibtion');
    }



    public function DealsDiscount()
    {
       return $this->hasMany('App\Models\Vendors\DiscountDeal','vendor_category_id','id');
    }



    public function VendorEvents() {
       return $this->hasMany('App\VendorEventGame', 'vendor_category_id', 'id')
                    ->join('category_variations', 'category_variations.variant_id', '=', 'vendor_event_games.event_id')
                    ->join('events', 'events.id', '=', 'vendor_event_games.event_id')
                    ->select('vendor_event_games.*')
                    ->where('events.status', 1)
                    ->where('category_variations.type','event')
                    ->groupBy('vendor_event_games.event_id');
    }



    public function VendorGames() {
       return $this->hasMany('App\VendorAmenity', 'vendor_category_id', 'id')
        ->join('category_variations', 'category_variations.variant_id', '=', 'vendor_amenities.amenity_id')
       ->join('amenities', 'amenities.id', '=', 'vendor_amenities.amenity_id')
       ->where('amenities.type','game')
       ->where('category_variations.type','game')
       ->where('vendor_amenities.type','game')
       ->where('amenities.status',1)
       ->groupBy('vendor_amenities.amenity_id');
    }

     public function VendorAmenity() {
       return $this->hasMany('App\VendorAmenity', 'vendor_category_id', 'id')
       ->join('category_variations', 'category_variations.variant_id', '=', 'vendor_amenities.amenity_id')
       ->join('amenities', 'amenities.id', '=', 'vendor_amenities.amenity_id')
       ->where('amenities.type','amenity')
       ->where('category_variations.type','amenity')
       ->where('vendor_amenities.type','amenity')
       ->where('amenities.status',1)
       ->groupBy('vendor_amenities.amenity_id');
    }



     public function UnreadBusinessMessages()
    {
       return $this->hasMany('App\Models\Vendors\Chat','business_id') 
                    ->join('chat_messages','chat_messages.chat_id','=','chats.id')
                    ->where('chat_messages.receiver_id',\Auth::user()->id)
                    ->where('chat_messages.receiver_status',0);
    }




    public function orders()
    {
      return $this->hasMany('App\Models\EventOrder','vendor_id')
                    ->where('type','order')
                    ->groupBy('order_id');
    }




}
