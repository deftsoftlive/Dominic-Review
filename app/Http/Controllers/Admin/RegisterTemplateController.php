<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CourseRegisterDate;
use App\Course;
use App\Camp;

class RegisterTemplateController extends Controller
{
    
    public function camp_reg_temp($id,Request $request)
    {
        if(isset($request->week))
        {
            $week_value = $request->week; 
        }
        
    	$camp = Camp::where('id',$id)->first();
    	$shop = \DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->get();
        $shop1 = \DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->groupBy('child_id')->get();
    	return view('admin.register-template.camp-template',compact('camp','shop', 'shop1', 'week_value'));
    }


    public function daily_signin($id,Request $request)
    {
        if(isset($request->week))
        {
            $week_value = $request->week; 
        }
        
        $camp = Camp::where('id',$id)->first();
        $shop = \DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->get();
        $shop1 = \DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->groupBy('child_id')->get();
        return view('admin.register-template.daily-signin',compact('camp','shop', 'shop1', 'week_value'));
    }


    public function course_reg_temp($id)
    {	
    	$course = Course::where('id',$id)->first();
    	$shop = \DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->get();
        $shop1 = \DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->groupBy('child_id')->get();
    	return view('admin.register-template.course-template',compact('course','shop','shop1'));
    }

    public function save_course_reg_dates(Request $request)
    {
        $data = $request->all();   //dd($data);

        if(isset($data['course_date'])){  

            foreach ($data['course_date'] as $number => $value) {  

            //dd($data['course_date'],$number,$value);

            foreach($value as $number1 => $value1)
            {
               // dd($number1,$value1);

                // CourseRegisterDate::where('player_id',$number1)->where('course_id',$request->course_id)->delete();

                if(isset($value1['date_select']) && $value1['date_select'] == 1)
                {
                    $date = new CourseRegisterDate;
                    $date->player_id = $number1;
                    $date->course_id = $request->course_id;
                    $date->course_date = $value1['course_date'];
                    $date->checked = isset($value1['date_select']) ? $value1['date_select'] : '0';
                    $date->save();
                }
                else
                {
                    CourseRegisterDate::where('player_id',$number1)->where('course_id',$request->course_id)->where('course_date', $value1['course_date'])->delete();
                }        
            } 
                
            }
        }

        return \Redirect::back()->with('success','Course date updated successfully.');
    }
}
