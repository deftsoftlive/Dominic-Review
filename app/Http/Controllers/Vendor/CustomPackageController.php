<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VendorPackage;
use App\Category;
use App\PackageMetaData;
use Auth;
use App\VendorCategory;
use App\Models\Vendors\CustomPackage;
use App\Models\Vendors\Chat;
use App\Models\Vendors\ChatMessage;
class CustomPackageController extends Controller
{


   public function getData($slug)
   { 
   	$category = Category::where('slug',$slug)
                           ->join('vendor_categories','vendor_categories.category_id','=','categories.id')
                           ->select('categories.*')
                           ->where('vendor_categories.user_id',Auth::user()->id);
    return $category->count() > 0 ? $category->first() : redirect()->route('vendor_dashboard')->with('messages','Please check your url, Its wrong!');
  }

  #-----------------------------------------------------------------------------------------------------------------
  #  create custom package
  #-----------------------------------------------------------------------------------------------------------------
   

   public function packagesAdd($slug,$id,$chat_id)
   {
        $category = $this->getData($slug);

        $VendorCategory = VendorCategory::where('category_id', $category->id)
                                       ->where('user_id', Auth::User()->id);
                                        
        $business_id = $VendorCategory->count() > 0 ? $VendorCategory->first()->id : 0;

        $package = CustomPackage::where('id',$id)
                               ->where('business_id',$business_id);

        if($package->count() == 0){
            return redirect()->route('vendor_dashboard')->with('messages','Something Wrong');
        }

   	    return view('vendors.management.customPackage.add')
   	         ->with('category',$category)
   	         ->with('package',$package->first())
   	         ->with('slug',$slug)
   	         ->with('title','Create Custom Package');
   }

  #-----------------------------------------------------------------------------------------------------------------
  #  create custom package and send message to user to pay
  #-----------------------------------------------------------------------------------------------------------------


  public function store(Request $request,$slug,$id,$chat_id)
  {
        $this->validate($request,[
               'title' => 'required',
               'description' => 'required',
               'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
               'no_of_hours' => 'required',
               'no_of_days' => 'required',
               'price_type' => 'required',
               'min_person' => 'required',
               'max_person' => 'required'
        ]);
  	     $category = $this->getData($slug);
         $VendorCategory = VendorCategory::where('category_id', $category->id)
                                       ->where('user_id', Auth::User()->id);
         $business_id = $VendorCategory->count() > 0 ? $VendorCategory->first()->id : 0;
         $package = CustomPackage::where('id',$id)
                               ->where('business_id',$business_id);
         if($package->count() == 0){
            return redirect()->back()->with('messages','Something Wrong');
         }

         $customPackage = $package->first();

         $user = Auth::User();
         $request['category_id'] = $category->id;
         $request['user_id'] = $user->id;
         $request['status'] = 1;
         $request['vendor_category_id'] = $business_id;
         $request['user_requested_by'] = $customPackage->user_id;
         $request['custom_package_id'] = $customPackage->id;
         $request['type'] = 1;
        
         $vendor_category_id = $business_id;
          

         $vendorPack = VendorPackage::create($request->all());

       if(!empty($request->amenity) && count($request->amenity)) {
        $this->packageEventDelete($vendorPack->id,'amenities');
        foreach ($request->amenity as $key => $value) {
         PackageMetaData::create([
          'parent' => 0,
          'package_id' => $vendorPack->id,
          'category_id' => $category->id,
          'user_id' => $user->id,
          'type' => 'amenities',
          'key' => 'amenity',
          'vendor_category_id' => $vendor_category_id,
          'key_value' => $value 
         ]); 
        }
       }


        if(!empty($request->games) && count($request->games)) {

          $this->packageEventDelete($vendorPack->id,'games');

        foreach ($request->games as $key => $value) {
         PackageMetaData::create([
          'parent' => 0,
          'package_id' => $vendorPack->id,
          'category_id' => $category->id,
          'user_id' => $user->id,
          'type' => 'games',
          'key' => 'game',
          'vendor_category_id' => $vendor_category_id,
          'key_value' => $value 
         ]); 
        }
       }

       if(!empty($request->event_type) && count($request->event_type)) {
          
          $this->packageEventDelete($vendorPack->id,'events');

          foreach ($request->event_type as $key => $value) {
           PackageMetaData::create([
            'parent' => 0,
            'package_id' => $vendorPack->id,
            'category_id' => $category->id,
            'user_id' => $user->id,
            'type' => 'events',
            'key' => 'event',
            'vendor_category_id' => $vendor_category_id,
            'key_value' => $value 
           ]); 
          }
       }

       $this->sendMessages($customPackage,$vendorPack,$chat_id);


       $url = route('myCategoryChat',$category->slug).'?chat_id='.$chat_id;

	   return redirect($url)->with('messages','Package has added successfully.');
  }


   
public function packageEventDelete($package_id,$type)
{
   return PackageMetaData::where('package_id',$package_id)->where('type',$type)->delete();
}



#----------------------------------------------------------------------------------------------------------------------------
# create Message to reply 
#----------------------------------------------------------------------------------------------------------------------------


public function sendMessages($package,$newPackage,$id)
{ 
    $ChatMessage = ChatMessage::find($id);
	$ChatMessage->custom_package_id=$package->id;
	$ChatMessage->save();

   $Chat = Chat::where('id',$ChatMessage->chat_id)
               ->where('vendor_id',Auth::user()->id);
   if($Chat->count() > 0){
            $parent = $ChatMessage->id;
            $type = 2;
            $c = $Chat->first();
            $c->updated_at =\Carbon\Carbon::now();
            $c->save();
            $m = new ChatMessage;
            $m->sender_id = trim(Auth::user()->id);
            $m->receiver_id = trim($c->user_id);
            $m->deal_id = trim($c->deal_id);
            $m->business_id = trim($c->business_id);
            $m->chat_id = trim($c->id);
            $m->message = 'As per your request for custom package, We have created a custom package for you only.';
            $m->parent = $parent;
            $m->sender_status = 1;
            $m->type = $type;
            $m->receiver_status = 0;
            $m->save();
                   $p = CustomPackage::find($package->id);
                   $p->status = 2;
                   $p->updated_at =\Carbon\Carbon::now();
                   $p->package_id =$newPackage->id;
                   $p->save();
            }

        return response()->json(['status' => 1,'message' => 'done']);    
        
    
}















}
