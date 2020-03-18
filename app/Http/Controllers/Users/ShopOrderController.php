<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\ShopCartItems;
use App\Models\Shop\ShopOrder;
use Auth;
use App\Models\Review;

class ShopOrderController extends Controller
{
   
public $filePath = 'users.shopOrders.';
 


#==========================================================================


public function index()
{
	$orders = ShopOrder::where('user_id',Auth::user()->id)->orderBy('id','DESC')->paginate(20);
    return view($this->filePath.'index')->with('orders',$orders);
}




#===========================================================================


public function orderDetail($id)
{
    $orders = ShopOrder::where('user_id',Auth::user()->id)->where('id',$id)->first();
    return view($this->filePath.'detail')->with('orders',$orders);
}





#===========================================================================

public function addReview($order_id,$item_id)
{

	$orders = ShopOrder::where('user_id',Auth::user()->id)->where('id',$order_id);
    $ShopCartItems = ShopCartItems::where('order_id',$order_id)->where('id',$item_id)->first();
    if($orders->count() == 0){
    	return redirect()->route('users.shop.orders');
    }

    if($ShopCartItems->orderReview()->count() > 0){
    	return redirect()->route('users.shop.order.detail',$order_id);
    }

	 return view($this->filePath.'review');
}

#===========================================================================


public function saveReview(Request $request,$order_id,$item_id)
{
	
	$this->validate($request,[
       'title' => 'required',
       'rating' => 'required',
       'review' => 'required',
	]);


	$orders = ShopOrder::where('user_id',Auth::user()->id)->where('id',$order_id);
    $ShopCartItems = ShopCartItems::where('order_id',$order_id)->where('id',$item_id)->first();
    if($orders->count() == 0){
    	return redirect()->route('users.shop.orders');
    }

    if($ShopCartItems->orderReview()->count() > 0){
    	return redirect()->route('users.shop.order.detail',$order_id);
    } 

    
    $r = new Review;
    $r->title = trim($request->title);
    $r->rating = trim($request->rating);
    $r->review = trim($request->review);
    $r->order_id = $item_id;
    $r->product_id = $ShopCartItems->product_id;
    $r->user_id = Auth::user()->id;
    $r->type = 'products';
    $r->save();
    return redirect()->route('users.shop.order.detail',$order_id)->with('messages','Thank you for your review about the product');
}



#===========================================================================
}
