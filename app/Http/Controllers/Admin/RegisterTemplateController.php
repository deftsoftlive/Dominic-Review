<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Camp;

class RegisterTemplateController extends Controller
{
    public function camp_reg_temp($id,Request $request)
    {
        if(isset($request))
        {
            $day = $request->input('day'); 
        }
        
    	$camp = Camp::where('id',$id)->first();
    	$shop = \DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->groupBy('child_id')->get();
    	return view('admin.register-template.camp-template',compact('camp','shop','day'));
    }

    public function course_reg_temp($id)
    {	
    	$course = Course::where('id',$id)->first();
    	$shop = \DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->get();
    	return view('admin.register-template.course-template',compact('course','shop'));
    }
}
