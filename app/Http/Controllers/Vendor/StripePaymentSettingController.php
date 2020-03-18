<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\VendorCategory;
class StripePaymentSettingController extends Controller
{
 
  
public function index() {
	 return view('vendors.settings.stripe');
}



#-------------------------------------------------------------------------------------#
#--------------------------------------Stripe Account ID save-------------------------#
#-------------------------------------------------------------------------------------#


public function store(Request $request) {
    $this->validate($request, [
          'stripe_account' => 'required'
	]);


    if($request->type == 1){

        if(!empty($request->category)) {
    		$category = $this->getData($request->category);
         	$vendorCategory= VendorCategory::where(['category_id'=> $category->category_id, 'user_id' => Auth::User()->id])->first();
    	    $vendorCategory->stripe_account = trim($request->stripe_account);
    	    $vendorCategory->save();
        } else {
        		$u = Auth::User();
        		$u->stripe_account = trim($request->stripe_account);
        		$u->save();
        }

    }else{

      $s= Auth::user()->shop;
      $s->stripe_account_id = trim($request->stripe_account);
      $s->stripe_account_status = 1;
      $s->save();

    }

    return redirect()->route('stripeSettings')->with('flash_message', 'Your Account Has Been Connected to Stripe.');
}


public function getData($slug) {
  $category = Category::where('slug',$slug)
                       ->join('vendor_categories','vendor_categories.category_id','=','categories.id')
                       ->where('vendor_categories.user_id',Auth::user()->id);


  return $category->count() > 0 ? $category->first() : redirect()->route('vendor_dashboard')->with('error_message','Please check your url, Its wrong!');	   
}








}

