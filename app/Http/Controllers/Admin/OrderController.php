<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\ShopOrder;
use App\User;
use App\ChildcareVoucher;
use App\StripeAccount;

class OrderController extends Controller
{
    
    public function index(Request $request)
    {
        if(request()->get('u_name'))
        {
            $user_name = request()->get('u_name'); 
        }else{
            $user_name = '';
        }
         
        if(request()->get('u_email'))
        {
            $user_email = request()->get('u_email');
        }else{
            $user_email = '';
        }
        
        if(request()->get('start_date')) 
        {   
            $start_date = request()->get('start_date').' 00:00:00'; 
            $start_date_filter = request()->get('start_date'); 
        }
        else{
            $start_date = '';
            $start_date_filter = ''; 
        }

        if(request()->get('end_date')) 
        {
            $end_date = request()->get('end_date').' 00:00:00';
            $end_date_filter = request()->get('end_date');
        }
        else{
            $end_date = '';
            $end_date_filter = '';
        }     

        // dd($user_name,$user_email,$start_date,$end_date);
        if(!empty($user_name) && !empty($user_email) && empty($start_date) && empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email')
                    ->where('users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('users.email', 'LIKE', '%' . $user_email . '%' )
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 

        }
        elseif(!empty($user_name) && !empty($user_email) && !empty($start_date) && empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email')
                    ->where('users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(empty($user_name) && empty($user_email) && !empty($start_date) && empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email')
                    ->where('shop_orders.created_at','>',$start_date)
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(empty($user_name) && empty($user_email) && empty($start_date) && !empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email')
                    ->where('shop_orders.created_at','<',$end_date)
                    ->paginate(10); 
        }
        elseif(!empty($user_name) && !empty($user_email) && empty($start_date) && !empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email')
                    ->where('users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(!empty($user_name) && !empty($user_email) && !empty($start_date) && !empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email')
                    ->where('users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(!empty($user_name) && empty($user_email) && empty($start_date) && empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name')
                    ->where( 'users.name', 'LIKE', '%' . $user_name . '%' )
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(!empty($user_name) && empty($user_email) && !empty($start_date) && empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name')
                    ->where( 'users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(!empty($user_name) && empty($user_email) && empty($start_date) && !empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name')
                    ->where( 'users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(!empty($user_name) && empty($user_email) && !empty($start_date) && !empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name')
                    ->where( 'users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(empty($user_name) && empty($user_email) && !empty($start_date) && !empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name')
                    ->where('shop_orders.created_at','>',$start_date)
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(empty($user_name) && !empty($user_email) && empty($start_date) && empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.email')
                    ->where( 'users.email', 'LIKE', '%' . $user_email . '%' )
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(empty($user_name) && !empty($user_email) && !empty($start_date) && empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.email')
                    ->where( 'users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(empty($user_name) && !empty($user_email) && empty($start_date) && !empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.email')
                    ->where( 'users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }
        elseif(empty($user_name) && !empty($user_email) && !empty($start_date) && !empty($end_date))
        {
            $orders = \DB::table('shop_orders')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.email')
                    ->where( 'users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('id','desc')
                    ->groupBy('shop_orders.orderID')
                    ->paginate(10); 
        }elseif(empty($user_name) && empty($user_email) && empty($start_date) && empty($end_date)){
           $orders = Shoporder::orderBy('id','desc')->groupBy('orderID')->paginate(10); 
        }
        
    	return view('admin.orders.index',compact('orders','user_name','user_email','start_date','end_date','start_date_filter','end_date_filter'));
    }

    /*-----------------------------------------------
	|  Next Function starts
	|-----------------------------------------------*/	
    public function detail(Request $request,$id)
    {
    	$orders =Shoporder::find($id);
    	return view('admin.orders.detail')->with('order',$orders);
    }

    /*-----------------------------------------------
    |   Download Orders
    |------------------------------------------------*/
    public function download_orders()
    { 
        $user_name = request()->get('download_name');
        $user_email = request()->get('download_email');
        $start_date = request()->get('download_sd');
        $end_name = request()->get('download_ed');

        $fileName = 'orders.csv';


        if(!empty($user_name) && !empty($user_email) && empty($start_date) && empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where('users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('users.email', 'LIKE', '%' . $user_email . '%' )
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 

        }
        elseif(!empty($user_name) && !empty($user_email) && !empty($start_date) && empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where('users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(empty($user_name) && empty($user_email) && !empty($start_date) && empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where('shop_orders.created_at','>',$start_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(empty($user_name) && empty($user_email) && empty($start_date) && !empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(!empty($user_name) && !empty($user_email) && empty($start_date) && !empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where('users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(!empty($user_name) && !empty($user_email) && !empty($start_date) && !empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where('users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(!empty($user_name) && empty($user_email) && empty($start_date) && empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where( 'users.name', 'LIKE', '%' . $user_name . '%' )
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(!empty($user_name) && empty($user_email) && !empty($start_date) && empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where( 'users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(!empty($user_name) && empty($user_email) && empty($start_date) && !empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where( 'users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(!empty($user_name) && empty($user_email) && !empty($start_date) && !empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where( 'users.name', 'LIKE', '%' . $user_name . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(empty($user_name) && empty($user_email) && !empty($start_date) && !empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where('shop_orders.created_at','>',$start_date)
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(empty($user_name) && !empty($user_email) && empty($start_date) && empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where( 'users.email', 'LIKE', '%' . $user_email . '%' )
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(empty($user_name) && !empty($user_email) && !empty($start_date) && empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where( 'users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(empty($user_name) && !empty($user_email) && empty($start_date) && !empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where( 'users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(empty($user_name) && !empty($user_email) && !empty($start_date) && !empty($end_date))
        {
            $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->where( 'users.email', 'LIKE', '%' . $user_email . '%' )
                    ->where('shop_orders.created_at','>',$start_date)
                    ->where('shop_orders.created_at','<',$end_date)
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get(); 
        }
        elseif(empty($user_name) && empty($user_email) && empty($start_date) && empty($end_date))
        {
           $tasks = \DB::table('shop_orders')
                    ->leftjoin('shop_cart_items', 'shop_orders.orderID', '=', 'shop_cart_items.orderID')
                    ->leftjoin('users', 'shop_orders.user_id', '=', 'users.id')
                    ->select('shop_orders.*', 'users.name', 'users.email','shop_cart_items.shop_type','shop_cart_items.product_id', 'shop_cart_items.course_season','shop_cart_items.user_id', 'shop_cart_items.id as shop_id')
                    ->orderBy('shop_orders.id','desc')
                    ->groupBy('orderID')
                    ->get();
        }

            // Taking new array to keep record according to order id
            $new_tasks = array();
            foreach ($tasks as $task) {
                $shop_types = getShopType($task->orderID,1);
                if(!empty($shop_types)){                
                    foreach ($shop_types as $key => $shop) {
                        $new_tasks_val['created_at'] =  $task->created_at;
                        $new_tasks_val['orderID'] =  $task->orderID;                         
                        $new_tasks_val['id'] =  $task->id;               
                        $new_tasks_val['orderType'] =  $shop->shop_type; 
                        $new_tasks_val['ItemName'] =  GetCourseCampName($shop->shop_type,$shop->product_id);               
                        $new_tasks_val['user_id'] =  $task->user_id;               
                        $new_tasks_val['shipping_address'] =  $task->shipping_address;               
                        $new_tasks_val['billing_address'] =  $task->billing_address;               
                        $new_tasks_val['payment_detail'] =  $task->payment_detail;               
                        $new_tasks_val['balance_transaction'] =  $task->balance_transaction;               
                        $new_tasks_val['amount'] =  custom_format($shop->price,2);               
                        $new_tasks_val['payment_by'] =  $task->payment_by;               
                        // $new_tasks_val['transaction_details'] =  $task->transaction_details;               
                        $new_tasks_val['provider_id'] =  $task->provider_id;               
                        $new_tasks_val['status'] =  $task->status;               
                        $new_tasks_val['manual'] =  $task->manual;                                              
                        $new_tasks_val['updated_at'] =  $task->updated_at;               
                        $new_tasks_val['name'] =  $task->name;               
                        $new_tasks_val['email'] =  $task->email;               
                        $new_tasks_val['shop_type '] =  $task->shop_type ;               
                        $new_tasks_val['product_id'] =  $task->product_id;               
                        $new_tasks_val['course_season'] =  $task->course_season;               
                        $new_tasks_val['shop_id'] =  $task->shop_id; 

                        $new_tasks[] = $new_tasks_val;
                    }
                }
            }

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
            $columns = array('Date', 'Order ID', 'Order Type', 'Item Name', 'Season', 'Account' ,'User Name', 'User Email', 'Amount', 'Payment By', 'Provider ID');

                /*foreach ($tasks as $task) {
                    dd($tasks);

                    if(!empty($task->provider_id)){
                        $provider = \DB::table('childcare_vouchers')->where('id',$task->provider_id)->first();
                    }
                    $season = isset($task->course_season) ? (getSeasonname($task->course_season)) : '';


                    $accountId = isset($task->id) ? ToGetAccountIDForTypeOrder($task->shop_id, $task->user_id) : '';
                    if (isset($accountId)) {
                        $accountData = StripeAccount::where('id', $accountId)->first();
                        $accountName = isset($accountData->account_name) ? $accountData->account_name: 'DRH Default Account';
                    }else{
                        $accountName = 'DRH Default Account';
                    }
                }*/
            
            $callback = function() use($new_tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($new_tasks as $task) {

                    if(!empty($task['provider_id'])){
                        $provider = \DB::table('childcare_vouchers')->where('id',$task['provider_id'])->first();
                    }
                    $season = isset($task['course_season']) ? (getSeasonname($task['course_season'])) : '';


                    $accountId = isset($task['id']) ? ToGetAccountIDForTypeOrder($task['shop_id'], $task['user_id']) : '';
                    if (isset($accountId)) {
                        $accountData = StripeAccount::where('id', $accountId)->first();
                        $accountName = isset($accountData->account_name) ? $accountData->account_name: 'DRH Default Account';
                    }else{
                        $accountName = 'DRH Default Account';
                    }
                    // if($task->shop_type == 'course')
                    // {
                    //     $course = DB::table('courses')->where('id',$task->product_id)->first(); 
                    //     $course_type = $task->shop_type .' - '. getProductCatname($course->type);
                    // }else{
                    //     $course_type = $task->shop_type;
                    // }


                    $row['Date']       = $task['created_at'];
                    $row['Order ID']   = $task['orderID'];
                    $row['Order Type'] = $task['orderType'];
                    $row['Item Name']  = $task['ItemName'];
                    $row['User Name']  = $task['name'];
                    $row['User Email'] = $task['email'];
                    $row['Amount']     = $task['amount'];
                    $row['Payment By'] = $task['payment_by'];
                    $row['Season']     = $season;
                    $row['Account']    = $accountName;
                    // $row['Transaction Details']  = isset($task['transaction_details']) ? $task['transaction_details'] : '-';
                    $row['Provider ID']  = isset($task['provider_id']) ? $provider->provider_name : '-';

                    fputcsv($file, array($row['Date'], $row['Order ID'], $row['Order Type'], $row['Item Name'], $row['Season'], $row['Account'],$row['User Name'], $row['User Email'], $row['Amount'], $row['Payment By'], $row['Provider ID']));
                }

                fclose($file);
            };

        return response()->stream($callback, 200, $headers);
    }

    /*-----------------------------------------------
	|  Next Function starts
	|-----------------------------------------------*/	
	public function ajax()
	{
	 
		$events = \App\Models\Order::select(['id','orderID','amount', 'payment_by'])->orderBy('created_at','DESC')
		              ->get();

		return datatables()->of($events)
		->addColumn('action', function ($t) {
		return  $this->Actions($t);
		})
		
		->editColumn('amount',function($t){
		return '$'.$t->amount;
		})

		->make(true);
	}

	/*-----------------------------------------------
	|  Next Function starts
	|-----------------------------------------------*/
    public function Actions($data)
    {
            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-primary">Action</button>';
            $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';
          $url = url(route('admin.orderDetail',$data->id));
          $text .='<a href="'.$url.'" class="dropdown-item">Detail</a>';
            $text .='<div class="dropdown-divider"></div>';
            //$status=$data->status == 0 ? 'Active' : 'In-Active';
            //$text .='<a href="'.route('event_status',$data->slug).'" class="dropdown-item">'.$status.'</a>';

            $text .='</div>';
            $text .='</div>';

            return $text;
    }


    /*-----------------------------------------------
    |   Order PDF
    |-----------------------------------------------*/
    function get_order_data($order_id)
    {
        // Get Invoice notes
        $orders = \DB::table('shop_orders')->where('id',$order_id)->orderBy('id','DESC')->first(); 
        return $orders;
    }

    function order_pdf($order_id)
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_order_data_to_html($order_id));
        return $pdf->stream();
    }

    function convert_order_data_to_html($order_id)
    {
        $base_url = \URL::to('/'); 
        $orders = $this->get_order_data($order_id); 
        $extra = getAllValueWithMeta('service_fee_amount', 'global-settings');
        $order_price = $orders->amount - $extra;

        $shipping_address = json_decode($orders->shipping_address);  
        $billing_address = json_decode($orders->billing_address); 
        $user_id = $orders->user_id;
        $user_details = User::where('id',$user_id)->first();

        $user_name  = isset($user_details->name) ? $user_details->name : 'No user found';
        $user_email = isset($user_details->email) ? $user_details->email : '';
        $user_phone = isset($user_details->phone_number) ? $user_details->phone_number : '';

        if(!empty($orders->provider_id))
        {
          $provider = ChildcareVoucher::where('id',$orders->provider_id)->first();
        }
        $provider_name = isset($provider->provider_name) ? $provider->provider_name : '';


        $output = '<title>INVOICE</title> 
         <style>
    @page {
          margin: 0.5cm;
          }
</style>
        <table width="100%" style="border-collapse:collapse; ">
       
        <tbody>
        <tr>
            <td colspan="4">
                <table style="table-layout: fixed;width: 100%;border-collapse: collapse;"">

                        <tr>
                            <td  align="center"><img src="'.$base_url.'/public/images/pdf-logo.png" width="130px;" style="margin-bottom: 15px;">
                            </td>
                        </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <table style="table-layout: fixed;width: 100%;border-collapse: collapse;border:1px solid #011c49;margin-bottom: 20px;"> 
                    <tbody>
                        <tr>
                            <td colspan="2" style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Order Details</td>
                        </tr>
                        <tr>
                            <td>
                                <p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Order ID : </strong>'.$orders->orderID.' </p>
                            </td>
                            <td>
                                <p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Order Date : </strong>'.$orders->created_at.' </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Order Amount : </strong>'.$order_price.' </p>
                            </td>
                            <td>
                                <p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Payment Method : </strong>'.$orders->payment_by.' </p>
                            </td>
                        </tr>
                        <tr>
                        <td>';
                           
                        if(!empty($provider_name))   
                        {
                            $output .= '<p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Provider Name : </strong>'.$provider_name.' </p>';  
                        } 

                        if(!empty($orders->transaction_details))
                        {
                            $transaction_details = explode(',',$orders->transaction_details); 
                            $tr_data = [];

                            foreach($transaction_details as $tr)
                            {
                                $tr1 = explode('- ',$tr); 
                                $tr0 = $tr1[0];
                                $tr1 = '&pound;'.$tr1[1];   
                                 $tr_data[] = $tr0.'- '.$tr1;
                            }
                            $payment_details = implode(',', $tr_data); 

                            $output .= '<p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Payment Details : </strong>'.$payment_details.' </p>';
                        }
                        
                        $output .= '</td>
                                    <td>
                                    <p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"></p>
                                </td>

                            </tr>
                    </tbody>

                </table>
            </td>
        </tr> 
            <tr>
                <td colspan="4">
                    <table style="table-layout: fixed;width: 100%;border-collapse: collapse;border:1px solid #011c49;margin-bottom: 20px;"> 
                        <tbody>
                            <tr>
                                <td colspan="3" style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">User Details</td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="padding: 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Name : </strong>'.$user_name.' </p>
                                </td>
                                <td>
                                    <p style="padding: 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Email : </strong>'.$user_email.' </p>
                                </td>
                                <td>
                                    <p style="padding: 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Phone No. : </strong>'.$user_phone.' </p>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </td>
            </tr>';

            $order_ID = $orders->orderID;
            $cart_items = \DB::table('shop_cart_items')->where('orderID',$order_ID)->get();
            $shop_type = array(); 
            foreach($cart_items as $sh){
                $shop_type[] = $sh->shop_type;
            }

            if (in_array('product', $shop_type, TRUE)){ 

            $output .= '<tr>
                <td colspan="4">
                    <table style="table-layout: fixed;width: 100%;border-collapse: collapse;border:1px solid #011c49;margin-bottom: 20px;">
                        <tbody>
                            <tr>
                                <td style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Shipping Address</td>
                                <td style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Billing Address</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid #011c49;">
                                    <p style="padding:15px 10px 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Name : </strong>'.$shipping_address->name.'</p>
                                    <p style="padding: 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Email : </strong>'.$shipping_address->email.'</p>
                                    <p style="padding: 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Phone Number :</strong>'.$shipping_address->phone_number.'</p>
                                    <p style="padding: 5px 10px 25px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Address : </strong>'.$shipping_address->address.', '.$shipping_address->country.', '.$shipping_address->state.', '.$shipping_address->city.', Zipcode- '.$shipping_address->zipcode.'</p>
                                </td>
                                <td style="border:1px solid #011c49;">
                                    <p style="padding:15px 10px 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Name : </strong>'.$billing_address->name.'</p>
                                    <p style="padding: 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Email : </strong>'.$billing_address->email.'</p>
                                    <p style="padding: 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Phone Number :</strong>'.$billing_address->phone_number.'</p>
                                    <p style="padding:  5px 10px 25px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Address : </strong>'.$billing_address->address.', '.$billing_address->country.', '.$billing_address->country.', '.$billing_address->state.', Zipcode- '.$billing_address->zipcode.'</p>
                                </td>
                            </tr>
                        </tbody> 
                    </table>
                </td>
            </tr>';

            }

            $output .='<tr>
                <td colspan="4">
                    <table style="table-layout: fixed;width: 100%;border-collapse: collapse;border:1px solid #011c49;">
                        <tbody>

                            <tr>
                                <td style="background-color: #3f4d67;width:16%; padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Order Type</td>
                                <td style="background-color: #3f4d67;width:28%;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Item Purchased</td>
                                <td style="background-color: #3f4d67;width:18%;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Participant</td>
                                <td style="background-color: #3f4d67;width:28%;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Details</td>
                                <td style="background-color: #3f4d67;width:10%;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Price</td>
                            </tr>';

                            $orderID = $orders->orderID;
                            $cart = \DB::table('shop_cart_items')->where('orderID',$orderID)->get();

                            foreach($cart as $ca){ 
                            if($ca->shop_type == 'product')
                            {
                                $product = \DB::table('products')->where('id',$ca->product_id)->first();

                                $variation = \App\Models\Products\ProductAssignedVariation::find($ca->variant_id);

                            $output .= '<tr>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$ca->shop_type.'</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$product->name.'</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"></td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">';

                                if($product->product_type == 1)
                                {
                                    foreach($variation->hasVariationAttributes as $v)
                                    {
                                        $output .= $v->parentVariation->variations->name.': 
                                              <b class="bText">'.$v->parentVariation->name.'</b><br/>';
                                    }
                                }

                            $output .= '</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">&pound;'.$ca->total.'</td>
                            </tr>';

                            }
                            elseif($ca->shop_type == 'course')
                            {
                                $child_id = $ca->child_id;
                                $user   = \DB::table('users')->where('id',$child_id)->first();
                                $course = \DB::table('courses')->where('id',$ca->product_id)->first();
                                $season = getSeasonname($course->season);

                            $output .= '<tr>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$ca->shop_type.'</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$course->title.'</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$user->name.'</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$season;   

                            $output .= '<td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">&pound;'.$ca->total.'</td>
                            </tr>';
                            }
                            elseif($ca->shop_type == 'camp')
                            {
                                $child_id = $ca->child_id;
                                $user = \DB::table('users')->where('id',$child_id)->first();
                                $camp = \DB::table('camps')->where('id',$ca->product_id)->first();
                                $week = json_decode($ca->week);

                              


                            foreach($week as $number=>$number_array)
                            {

                                foreach($number_array as $data=>$user_data)
                                {

                                    $output .= '<tr><td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$ca->shop_type.'</td>
                                        <td style="padding:  10px;color: #000;border-bottom:1px solid #3f4d67;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$camp->title.'</td>
                                        <td style="padding:  10px;color: #000;border-bottom:1px solid #3f4d67;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$user->name.'</td>';

                            $output .='<td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">';

                                  foreach($user_data as $data1=>$user_data1){
                                   
                                      $split = explode('-',$user_data1);
                                      $get_session = $split[2];
                                    
                                    if($get_session == 'early'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Early Drop Off</p>';
                                    }
                                    elseif($get_session == 'mor'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Morning</p>';
                                    }
                                    elseif($get_session == 'noon'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Afternoon</p>';
                                    }
                                    elseif($get_session == 'lunch'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Lunch Club</p>';
                                    }
                                    elseif($get_session == 'late'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Late Pickup</p>';
                                    }
                                    elseif($get_session == 'full'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Full Day</p>';
                                    }
                                    
                                  }
                                
                                }

                                

                              }

                            $output .= '
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">&pound;'.$ca->total.'</td>
                            </tr>';
                            }
                        }

                        $output .= '</tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td> 
                <td colspan="2">
                    <table style="table-layout: fixed;width:100%; border-collapse: collapse;border:1px solid #011c49; margin-top: 20px; ">
                        <tbody>
                            <tr>
                                <td style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Cart Subtotal</td>
                                <td style="padding:  10px;color: #000;font-size: 17px;font-family: "Open Sans", sans-serif;">£ '.$order_price.'</td>
                            </tr>';

                            if($extra > 0){
                            $output .= '<tr>
                                <td style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Service Fee</td>
                                <td style="padding:  10px;color: #000;font-size: 17px;font-family: "Open Sans", sans-serif;">+ &pound;'.$extra.'</td>
                            </tr>';
                        }
                            $output .= '<tr>
                                <td style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 19px;font-family: "Open Sans", sans-serif;"> Order Total </td>
                                <td style="padding:  10px;color: #000;font-size: 19px;font-family: "Open Sans", sans-serif;"> £ <strong>'.$orders->amount.'</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>';
 
        $output .= '</table>';
        return $output;
    '</div>';
    }
}
