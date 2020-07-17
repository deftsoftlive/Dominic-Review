<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;

class CouponController extends Controller
{
    /*----------------------------------------
    |
    |   COUPON MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of coupons
    |----------------------------------------*/ 
    public function coupon_index() {
        $coupon = Coupon::orderBy('id','asc')->paginate(10);
    	return view('admin.coupon.index',compact('coupon'))
    	->with(['title' => 'Coupon Management', 'addLink' => 'admin.coupon.showCreate']);
    }

    public function coupon_showCreate() {
    	return view('admin.coupon.create')->with(['title' => 'Create Coupon', 'addLink' => 'admin.coupon.list']);
    }

    /*----------------------------------------
    |   Add coupon 
    |----------------------------------------*/ 
    public function coupon_create(Request $request) {

        // All selected courses
        $co_data = $request->courses;
        if(!empty($co_data)){
            $courses = implode(',', $request->courses); 
        }else{
            $courses ="";
        }

        // All selected camps
        $camp_data = $request->camps;
        if(!empty($camp_data)){
            $camps = implode(',', $request->camps); 
        }else{
            $camps ="";
        }

        // All selected camps
        $product_data = $request->products;
        if(!empty($product_data)){
            $products = implode(',', $request->products); 
        }else{
            $products ="";
        }

    	$validatedData = $request->validate([
            'coupon_code' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'flat_discount' => ['required','numeric','min:1','max:100']
        ]);

    	Coupon::create([
    		'coupon_code' => $request['coupon_code'],
    		'start_date' => $request['start_date'],
    		'end_date' => $request['end_date'],
            'discount_type' => $request['discount_type'],
    		'uses' => $request['uses'],
    		'flat_discount' => $request['flat_discount'],
            'courses' => $courses,
            'camps' => $camps,
            'products' => $products,
    		'status' => 0,
    	]);
    	return redirect()->route('admin.coupon.list')->with('flash_message', 'Coupon has been created successfully!');
    }

    /*----------------------------------------
    |   Edit coupon content
    |----------------------------------------*/ 
    public function coupon_showEdit($slug) {
    	$venue = Coupon::find($slug);
    	return view('admin.coupon.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Coupon', 'addLink' => 'admin.coupon.list']);
    }

    /*----------------------------------------
    |   Update coupon content
    |----------------------------------------*/ 
    public function coupon_update(Request $request, $id) {  

        // All selected courses
        $co_data = $request->courses;
        if(!empty($co_data)){
            $courses = implode(',', $request->courses); 
        }else{
            $courses ="";
        }

        // All selected camps
        $camp_data = $request->camps;
        if(!empty($camp_data)){
            $camps = implode(',', $request->camps); 
        }else{
            $camps ="";
        }

        // All selected camps
        $product_data = $request->products;
        if(!empty($product_data)){
            $products = implode(',', $request->products); 
        }else{
            $products ="";
        }

    	$validatedData = $request->validate([
            'coupon_code' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'flat_discount' => ['required','numeric','min:1','max:100']
        ]);

    	$venue = Coupon::find($id);
    	$venue->update([
    		'coupon_code' => $request['coupon_code'],
    		'start_date' => $request['start_date'],
    		'end_date' => $request['end_date'],
            'discount_type' => $request['discount_type'],
    		'uses' => $request['uses'],
    		'flat_discount' => $request['flat_discount'],
            'courses' => $courses,
            'camps' => $camps,
            'products' => $products
    	]);
    	return redirect()->route('admin.coupon.list')->with('flash_message', 'Coupon has been updated successfully!');
    }

    /*----------------------------------------------
    |   Change the status of the coupon
    |-----------------------------------------------*/ 
    public function coupon_Status($id) {
     $venue = Coupon::find($id);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Coupon of <b>'.$venue->coupon_code.'</b> is Activated' : 'Coupon of <b>'.$venue->coupon_code.'</b> is Deactivated';
       return redirect(route('admin.coupon.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Wrong!');
    }
}
