<?php

namespace App\Http\Controllers\Home\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VendorCategory;
class VendorListingController extends Controller
{



#-------------------------------------------------------------------------------
# Vendor Listing Page
#------------------------------------------------------------------------------


public function index(Request $request)
{
  
  return $Vendors =  $this->getVendorData($request);
}

 

#-------------------------------------------------------------------------------
# Vendor Listing Page
#------------------------------------------------------------------------------


public function getVendorData($request)
{
 
	  $business = $this->getBusinesAccordingToSearch($request);

	  $category = \App\Category::join('vendor_categories','vendor_categories.category_id','=','categories.id')
                               ->select('categories.*')
                               ->where('categories.status',1)
                               ->where('categories.parent',0)
                               ->orderBy('sorting','ASC')
                               ->groupBy('categories.id')
                               ->get();

     return view('home.business.listing',[
        'categories' => $category,
        'businesses' => $business->get(),
        'vendors' => $business->get(),
        'categoryCount' => $business->count(),
	 ]);
}




#-------------------------------------------------------------------------------
# get business according  to searching
#------------------------------------------------------------------------------


public function getBusinesAccordingToSearch($request)
{
   $ids = $this->getVendorIds($request);
 $businesses = VendorCategory::whereIn('id', $ids);
 return $businesses;
}







#--------------------------------------------------------------------------------------------
#   get all Business ids according to search
#--------------------------------------------------------------------------------------------

public function getVendorIds($request)
{
    
    $latitude = $request->latitude;
    $longitude = $request->longitude;


    $haversine = "(3959 * acos(cos(radians($latitude)) 
                        * cos(radians(vendor_categories.latitude)) 
                        * cos(radians(vendor_categories.longitude) 
                        - radians($longitude)) 
                        + sin(radians($latitude)) 
                        * sin(radians(vendor_categories.latitude))))";
   

	 $category =  VendorCategory::select('vendor_categories.*')
	 ->join('users','users.id','=','vendor_categories.user_id')
	 ->join('vendor_event_games','vendor_event_games.vendor_category_id','=','vendor_categories.id')
   ->join('vendor_amenities','vendor_amenities.vendor_category_id','=','vendor_categories.id')
	 ->join('categories','categories.id','=','vendor_categories.category_id')
	 ->select('vendor_categories.*','categories.capacity')
	 ->where('vendor_categories.parent',0)
	 ->where(function($t) use($request){

	 	  if(!empty($request->category_id) && $request->category_id > 0){
	 	  	 $t->where('vendor_categories.category_id',$request->category_id);
	 	  }

      if(!empty($request->event_type) && !in_array(null, $request->event_type, true)){
             $t->whereIn('vendor_event_games.event_id',$request->event_type);
      }

      if(!empty($request->amenities)){
             $t->whereIn('vendor_amenities.amenity_id',$request->amenities);
	 	  }

      if(!empty($request->vendors) && $request->category_id == 0){
	 	  	 $t->whereIn('vendor_categories.category_id',$request->vendors);
	 	  }


       if(!empty($request->sitting_capacity) && $request->sitting_capacity > 0){
         
          $t->where('vendor_categories.sitting_capacity','>=',$request->sitting_capacity);
          $t->where('vendor_categories.sitting_capacity','>',0);
          
      }

      if(!empty($request->standing_capacity) && $request->standing_capacity > 0){
         
           $t->where('vendor_categories.standing_capacity','>=',$request->standing_capacity);
           $t->where('vendor_categories.sitting_capacity','>',0);
      }


       
   })

	 ->where('vendor_categories.business_url','!=','')
	 ->where('vendor_categories.publish',1);
	

      if(!empty($request->price_range)){
          $range = explode('-',$request->price_range);
     
         $category->whereBetween('vendor_categories.price',[$range[0],$range[1]]);
      }


    
      

     if(!empty($latitude) && !empty($longitude)){
                 $category->selectRaw("{$haversine} AS distance")
                            ->join('vendor_categories as t2', function ($join) use($haversine){
                             $join->on('vendor_categories.id', '=', 't2.id')
                                  ->where('t2.travel_distaince' ,'>',\DB::Raw($haversine));
                   });

     }

    // return $category;
 
	return  $category->groupBy('vendor_categories.id')->pluck('id')->toArray();
}










public function getBusiness(Request $request)
{
 

 
     $business = $this->getBusinesAccordingToSearch($request);


           $vv = view('home.includes.business.list',[
                     'businesses' => $business->get(),
                     'categoryCount' => $business->count()
                   ])->render();

      return response()->json([
        'status' => 1,
        'businesses' => $vv, 
        'businessCount' => $business->count()
      ]);
}






#------------------------------------------------------------------------------
#  venue
#------------------------------------------------------------------------------


public function venue()
{
   $category= \App\Category::where('label','LIKE','%venue%');
   $cate = $category->first();
   $parm =[];
   
   $parems = $category->count() > 0 ?  route('home_vendor_listing_page').'?category_id='.$cate->id  : '';


    return redirect($parems);
}



}

 