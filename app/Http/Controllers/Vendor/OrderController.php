<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VendorCategory;
use App\VendorCategoryMetaData;
use App\Category;
use App\Style;
use App\Models\EventOrder;
use Auth;
class OrderController extends Controller
{
  


#-----------------------------------------------------------------
#    construct
#-----------------------------------------------------------------
  
   public function getData($slug)
   {
   	  
      $category = Category::where('slug',$slug)
                           ->join('vendor_categories','vendor_categories.category_id','=','categories.id')
                           ->select('vendor_categories.*')
                           ->groupBy('vendor_categories.category_id')

                           ->where('vendor_categories.user_id',Auth::user()->id);


      return $category->count() > 0 ? $category->first() : redirect()->route('vendor_dashboard')->with('error_message','Please check your url, Its wrong!');

   	   
   }


#-----------------------------------------------------------------
#  index
#-----------------------------------------------------------------

	public function index($slug)
	{
		$category = $this->getData($slug);
        $business = VendorCategory::find($category->id);
        return view('vendors.management.orders.index')
        ->with('title','Orders')
        ->with('slug',$slug)
        ->with('orders',$business->orders);

	}
#-----------------------------------------------------------------
#  index
#-----------------------------------------------------------------

	public function detail($slug,$id)
	{
		$business = $this->getData($slug);
             $order = EventOrder::where('order_id',$id)
                                ->where('vendor_id',$business->id)
                                ->where('type','order');
        if($order->count() == 0){
         abort(404);
        }

        
        return view('vendors.management.orders.detail')
        ->with('title','Orders')
        ->with('slug',$slug)
        ->with('orders',$order->get());

	}












}
