<?php

namespace App\Http\Controllers\Vendor\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\ShopCartItems;
use App\Models\Shop\ShopOrder;
use Auth;
class OrderController extends Controller
{
 
public $filePath = 'vendors.E-shop.orders.';
 


#==========================================================================


public function index()
{
	$orders = ShopCartItems::where('vendor_id',Auth::user()->id)
							->where('type','order')
							->groupBy('order_id')
							->orderBy('id','DESC')
							->paginate(20);
    return view($this->filePath.'index')->with('orders',$orders);
}




#===========================================================================


public function detail($id)
{
      $orders = ShopCartItems::where('vendor_id',Auth::user()->id)
							 ->where('type','order')
							 ->where('order_id',$id)
							 ->get();
	$order = ShopOrder::find($id);
    return view($this->filePath.'detail')
    ->with('order',$order)
    ->with('orders',$orders)
    ;
}




}
