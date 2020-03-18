<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Order;

class UserOrderController extends Controller
{
    public function index()
    {
    	return view('users.orders.index');
    }

    public function orderDetail($orderID)
    {
    	 $currentOrder = Order::with('orderItems','orderItems.package')->where('id', $orderID)
        ->where('user_id', Auth::user()->id)
        ->first();
    	if(!empty($currentOrder)){
    		return view('users.orders.order_detail', compact('currentOrder'));
    	}else{
    		abort(404);
    	}
    }
}
