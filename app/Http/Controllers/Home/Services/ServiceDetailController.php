<?php

namespace App\Http\Controllers\Home\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\VendorCategory;
use Gmopx\LaravelOWM\LaravelOWM;

class ServiceDetailController extends Controller
{
    
 public $folderPath ='home.business.services.detail';

#-----------------------------------------------------------------------
#     Service Page 
#-----------------------------------------------------------------------

public function index()
{
	 
	return view($this->folderPath.'.index');
}

#-----------------------------------------------------------------------
#     Service Page 
#-----------------------------------------------------------------------


public function index2(Request $request, $cateSlug, $vendorSlug)
{
	 
     $category = Category::where('slug', $cateSlug);
	 $vendorCategory = VendorCategory::with([
	 	'VendorPackage' => function($vp){
	 		return $vp->where('status', 1)->get();
	 	} 
	 ])->where('publish', 1);


	 if($category->count() == 0 || $vendorCategory->count() == 0){
	 	abort(404);
	 }

      $vendor =  $vendorCategory->where('business_url',$vendorSlug)->where('status', 3)->first();

      $recommendedVendor =  VendorCategory::where('category_id',$category->first()->id)
											     ->where('id','!=',$vendor->id)
											     ->where('publish', 1)
											     ->where('status', 3)
											     ->paginate(5);

     $event = \App\VendorEventGame::with('Event')->where('category_id',$category->first()->id)->where('user_id',$vendor->user_id);

     $amenities = \App\VendorAmenity::
                                   join('category_variations','category_variations.category_id','=','vendor_amenities.category_id')
                                   ->select('vendor_amenities.*')
                                   ->where('vendor_amenities.category_id',$category->first()->id)
                                   ->where('vendor_amenities.type','amenity')
                                   ->where('vendor_amenities.user_id',$vendor->user_id)
                                   ->groupBy('vendor_amenities.amenity_id');
 
     $games = \App\VendorAmenity::join('category_variations','category_variations.category_id','=','vendor_amenities.category_id')                            ->select('vendor_amenities.*')
                                   ->where('vendor_amenities.category_id',$category->first()->id)
                                   ->where('vendor_amenities.type','game')
                                   ->where('vendor_amenities.user_id',$vendor->user_id)
                                   ->groupBy('vendor_amenities.amenity_id');


                            
  $packages = \Request::route()->getName() == "home.vendor.customPackage" ? $vendor->CustomPackages : $vendor->VendorPackage;
 
return view($this->folderPath.'.index')
      ->with('games',$games)
      ->with('amenities',$amenities)
      ->with('events',$event)
      ->with('styles',$vendor->styles)
      ->with('services', $vendor->subcategory)
      ->with('VendorEvents', $vendor->VendorEvents)
      ->with('seasons',$vendor->seasons)
      ->with('packages',$packages)
      ->with('recommendedVendor',$recommendedVendor)
      ->with('vendor',$vendor);
}

#-----------------------------------------------------------------------
#     Service Page 
#-----------------------------------------------------------------------


public function getStyleOfThisVendor($styles,$relation,$col)
{
	$arr = [];
	if($styles->count() > 0){
		foreach ($styles as $s) {
			 array_push($arr, $s->$relation->$col);
		}


	}
	return count($arr) > 0 ? implode(', ', $arr) : '';
}

public function getweather(Request $req) {
	$weather_api_key = getAllValueWithMeta('weather_api_key', 'global-settings');
	// $weather_api_key = '8b9eccd531cf8de092a195b4d5c2d869';

	$headers = [
        'Content-Type: application/json',
   	];
    
    $weather = curl_init();
    if($req->time) {
      // $req->time = \Carbon\Carbon::parse($req->time)->timestamp;
    	$req->time = \Carbon\Carbon::parse($req->time)->addDay()->timestamp;
		$url = "https://api.darksky.net/forecast/$weather_api_key/$req->latitude,$req->longitude,$req->time";
    } else {
    $url = "https://api.darksky.net/forecast/$weather_api_key/$req->latitude,$req->longitude";
    }

    curl_setopt($weather, CURLOPT_URL, $url);
    curl_setopt($weather, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($weather, CURLOPT_HTTPHEADER, $headers);
    $server_output = curl_exec($weather);
    curl_close ($weather);
    $weather_json = json_decode($server_output, true);

    return response()->json($weather_json);
}

 

}
