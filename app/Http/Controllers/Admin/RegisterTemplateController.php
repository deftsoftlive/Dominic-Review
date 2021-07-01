<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CourseRegisterDate;
use App\Course;
use App\Camp;
use App\PayGoCourse;
use App\PaygocourseDate;
use App\PayGoCourseBookedDate;
use Excel;

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

    public function paygo_register( $id, Request $request )
        {
            if(isset($request->date))
            {
                $date = $request->date; 
            }
            
            $course = PayGoCourse::where('id',$id)->first();
            $shop = \DB::table('shop_cart_items')
                    ->leftjoin('pay_go_course_booked_dates', 'shop_cart_items.id', '=', 'pay_go_course_booked_dates.cart_id')
                    ->where('shop_type','paygo-course')
                    ->where('product_id',$id)
                    ->where('type','order')
                    ->where('orderID','!=',NULL)
                    ->where('booked_date_id',$date)
                    ->get();

            $shop1 = \DB::table('shop_cart_items')
                    ->leftjoin('pay_go_course_booked_dates', 'shop_cart_items.id', '=', 'pay_go_course_booked_dates.cart_id')
                    ->where('shop_type','paygo-course')
                    ->where('product_id',$id)
                    ->where('type','order')
                    ->where('orderID','!=',NULL)
                    ->where('booked_date_id',$date)
                    ->groupBy('shop_cart_items.child_id')
                    ->get();
                    //dd($shop1);
            return view('admin.register-template.paygo-course-template',compact('course','shop', 'shop1', 'date'));
        }


    // ********************************************* Export register function **************************************************
    public function ExportExcelCourseRegister($id){
        $course = Course::where('id',$id)->first();
        $shop = \DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->get();
        $shop1 = \DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->groupBy('child_id')->get();

        $course_array = array();
        $heading_data = array();
        $i = 1;

        $heading_data[] = [
            0  => 'Player Name',
            1  => 'Player DOB',
            2  => 'Media',
            3  => 'Mem Price',
            4  => 'Member',
            5  => 'Contact 1 Name',
            6  => 'Contact 1 Tel',
            7  => 'Contact 1 Email',
            8  => 'Relation'
        ];

        $course_dates = \DB::table('course_dates')->where('course_id',$course->id)->get();

        foreach($course_dates as $key => $date){
            array_push($heading_data[0], date('d/m',strtotime($date->course_date)));
        }

        $course_array=$heading_data;
        // Course Array
        $i = 1;
        if(count($shop) >0){            
            foreach($shop as $sh){  
                $player = \DB::table('users')->where('id',$sh->child_id)->first();  
                $child_details = \DB::table('children_details')->where('child_id',$sh->child_id)->first();

                if(empty($player)){
                    $player = \DB::table('users')->where('id',$sh->user_id)->first();
                }

                if($sh->membership_status == 1 && $sh->membership_price > 0){
                    $mem_price = 'Yes';
                }elseif($sh->membership_status == 0 && $sh->membership_price > 0){
                    $mem_price = 'No';
                }else{
                    $mem_price = 'N/A';
                }

                if($sh->membership_status == 1 && $sh->membership_price == null || $sh->membership_price == 0){
                    $member = 'Yes';
                }elseif($sh->membership_status == 0 && $sh->membership_price == null || $sh->membership_price == 0){
                    $member = 'No';
                }else{
                    $member = 'N/A';
                }



                $contact1_details = \App\ChildContact::where('child_id',$sh->child_id)->first();

                $course_array[$i][0]  = isset($player->name) ? $player->name : 'N/A';
                $course_array[$i][1]  = isset($player->date_of_birth) ? date('d/m/Y',strtotime($player->date_of_birth)) : 'N/A';
                $course_array[$i][2]  = !empty($child_details->media) && ($child_details->media == 'yes') ? 'Y' : 'N';
                $course_array[$i][3]  = $mem_price;
                $course_array[$i][4]  = $member;
                $course_array[$i][5]  = !empty($contact1_details->first_name) && !empty($contact1_details->surname) ? $contact1_details->first_name.' '.$contact1_details->surname : 'N/A';
                $course_array[$i][6]  = !empty($contact1_details->phone) ? $contact1_details->phone : 'N/A';
                $course_array[$i][7]  = !empty($contact1_details->email) ? $contact1_details->email : 'N/A';
                $course_array[$i][8]  = !empty($contact1_details->relationship) ? $contact1_details->relationship : 'N/A';

                if(!empty($player)){              
                    $j=1;
                    $check_date = \DB::table('course_register_dates')->where('player_id',$player->id)->where('course_id',$course->id)->where('checked',1)->get();  
                    $selected_date = [];

                    if(count($check_date)>0){
                        foreach($check_date as $da){
                            $selected_date[] = $da->course_date;
                        }
                    }

                    foreach($course_dates as $date){
                        if(in_array($date->course_date, $selected_date)){
                            $course_array[$i][] = "Yes";
                        }else{
                            $course_array[$i][] = "No";
                        }
                        $j++;
                    }
                }

                $i++; 
            }
        }

        if (ob_get_contents()) { ob_end_clean(); }
        ob_start();

        Excel::create('Course Data', function($excel) use ($course_array){
            $excel->setTitle('Course Data');
            $excel->sheet('Course Data', function($sheet) use ($course_array){
                $sheet->fromArray($course_array, null, 'A1', false, false);
            });
        })->download('xls');
        
        return view('admin.register-template.course-template',compact('course','shop','shop1'));
    }


    // ********************************************* Export all registers in a single csv file for Course function ****************************
    public function ExportExcelCourseRegisterForAll(){
        $coursedata = Course::where('status',1)->orderBy('sort','asc')->get();

        $course_array = array();
        $heading_data = array();
        $i = 1;

        $heading_data[] = [
            0  => 'Player Name',
            1  => 'Player DOB',
            2  => 'Media',
            3  => 'Mem Price',
            4  => 'Member',
            5  => 'Contact 1 Name',
            6  => 'Contact 1 Tel',
            7  => 'Contact 1 Email',
            8  => 'Relation'
        ];

        $course_array=$heading_data;
        
        foreach ($coursedata as $course) {
            $shop = \DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$course->id)->where('type','order')->where('orderID','!=',NULL)->get();
            $shop1 = \DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$course->id)->where('type','order')->where('orderID','!=',NULL)->groupBy('child_id')->get();

            // For new line
            $i++;
            $course_array[$i][0] = "";
            $i++;
            $course_array[$i][0] = "Course : ".$course->title;
            $i++;

            // Course Array
            if(count($shop) >0){            
                foreach($shop as $sh){  
                    $player = \DB::table('users')->where('id',$sh->child_id)->first();  
                    $child_details = \DB::table('children_details')->where('child_id',$sh->child_id)->first();

                    if(empty($player)){
                        $player = \DB::table('users')->where('id',$sh->user_id)->first();
                    }

                    if($sh->membership_status == 1 && $sh->membership_price > 0){
                        $mem_price = 'Yes';
                    }elseif($sh->membership_status == 0 && $sh->membership_price > 0){
                        $mem_price = 'No';
                    }else{
                        $mem_price = 'N/A';
                    }

                    if($sh->membership_status == 1 && $sh->membership_price == null || $sh->membership_price == 0){
                        $member = 'Yes';
                    }elseif($sh->membership_status == 0 && $sh->membership_price == null || $sh->membership_price == 0){
                        $member = 'No';
                    }else{
                        $member = 'N/A';
                    }



                    $contact1_details = \App\ChildContact::where('child_id',$sh->child_id)->first();

                    $course_array[$i][0]  = isset($player->name) ? $player->name : 'N/A';
                    $course_array[$i][1]  = isset($player->date_of_birth) ? date('d/m/Y',strtotime($player->date_of_birth)) : 'N/A';
                    $course_array[$i][2]  = !empty($child_details->media) && ($child_details->media == 'yes') ? 'Y' : 'N';
                    $course_array[$i][3]  = $mem_price;
                    $course_array[$i][4]  = $member;
                    $course_array[$i][5]  = !empty($contact1_details->first_name) && !empty($contact1_details->surname) ? $contact1_details->first_name.' '.$contact1_details->surname : 'N/A';
                    $course_array[$i][6]  = !empty($contact1_details->phone) ? $contact1_details->phone : 'N/A';
                    $course_array[$i][7]  = !empty($contact1_details->email) ? $contact1_details->email : 'N/A';
                    $course_array[$i][8]  = !empty($contact1_details->relationship) ? $contact1_details->relationship : 'N/A';                

                    $i++; 
                }
            }
        }

        if (ob_get_contents()) { ob_end_clean(); }
        ob_start();

        Excel::create('Course Data', function($excel) use ($course_array){
            $excel->setTitle('Course Data');
            $excel->sheet('Course Data', function($sheet) use ($course_array){
                $sheet->fromArray($course_array, null, 'A1', false, false);
            });
        })->download('xls');
        
        return \Redirect::back()->with('flash_message','Course register is downloaded successfully.');
    }



    // ********************************************* Export register function for Pay Go Course **********************************
    public function ExportExcelPayGoCourseRegister($id){
        $course = PayGoCourse::where('id',$id)->first();
        $pay_go_course_dates = \App\PaygocourseDate::where('course_id',$course->id)->get();
        $date = \App\PaygocourseDate::where('course_id',$course->id)->first();
        $date = $date->id;

        $pay_go_course_array = array();
        $heading_data = array();
        $i = 1;

        $heading_data[] = [
            0  => 'Player Name',
            1  => 'Player DOB',
            2  => 'Media',
            3  => 'Mem Price',
            4  => 'Member',
            5  => 'Contact 1 Name',
            6  => 'Contact 1 Tel',
            7  => 'Contact 1 Email',
            8  => 'Relation'
        ];

        $pay_go_course_array=$heading_data;

        foreach ($pay_go_course_dates as $pay_go_date) {
            $shop = \DB::table('shop_cart_items')
                ->leftjoin('pay_go_course_booked_dates', 'shop_cart_items.id', '=', 'pay_go_course_booked_dates.cart_id')
                ->where('shop_type','paygo-course')
                ->where('product_id',$id)
                ->where('type','order')
                ->where('orderID','!=',NULL)
                ->where('booked_date_id',$pay_go_date->id)
                ->get();

            $shop1 = \DB::table('shop_cart_items')
                ->leftjoin('pay_go_course_booked_dates', 'shop_cart_items.id', '=', 'pay_go_course_booked_dates.cart_id')
                ->where('shop_type','paygo-course')
                ->where('product_id',$id)
                ->where('type','order')
                ->where('orderID','!=',NULL)
                ->where('booked_date_id',$pay_go_date->id)
                ->groupBy('shop_cart_items.child_id')
                ->get();

            // For new line
            $i++;
            $pay_go_course_array[$i][0] = "";
            $i++;
            $pay_go_course_array[$i][0] = date('d-m-Y', strtotime( $pay_go_date->course_date ))." Data";
            $i++; 

            // Course Array

            if(count($shop) >0){            
                foreach($shop as $sh){  
                    $player = \DB::table('users')->where('id',$sh->child_id)->first();  
                    $child_details = \DB::table('children_details')->where('child_id',$sh->child_id)->first();

                    if(empty($player)){
                        $player = \DB::table('users')->where('id',$sh->user_id)->first();
                    }

                    if($sh->membership_status == 1 && $sh->membership_price > 0){
                        $mem_price = 'Yes';
                    }elseif($sh->membership_status == 0 && $sh->membership_price > 0){
                        $mem_price = 'No';
                    }else{
                        $mem_price = 'N/A';
                    }

                    if($sh->membership_status == 1 && $sh->membership_price == null || $sh->membership_price == 0){
                        $member = 'Yes';
                    }elseif($sh->membership_status == 0 && $sh->membership_price == null || $sh->membership_price == 0){
                        $member = 'No';
                    }else{
                        $member = 'N/A';
                    }

                    $contact1_details = \App\ChildContact::where('child_id',$sh->child_id)->first();

                    $pay_go_course_array[$i][0]  = isset($player->name) ? $player->name : 'N/A';
                    $pay_go_course_array[$i][1]  = isset($player->date_of_birth) ? date('d/m/Y',strtotime($player->date_of_birth)) : 'N/A';
                    $pay_go_course_array[$i][2]  = !empty($child_details->media) && ($child_details->media == 'yes') ? 'Y' : 'N';
                    $pay_go_course_array[$i][3]  = $mem_price;
                    $pay_go_course_array[$i][4]  = $member;
                    $pay_go_course_array[$i][5]  = !empty($contact1_details->first_name) && !empty($contact1_details->surname) ? $contact1_details->first_name.' '.$contact1_details->surname : 'N/A';
                    $pay_go_course_array[$i][6]  = !empty($contact1_details->phone) ? $contact1_details->phone : 'N/A';
                    $pay_go_course_array[$i][7]  = !empty($contact1_details->email) ? $contact1_details->email : 'N/A';
                    $pay_go_course_array[$i][8]  = !empty($contact1_details->relationship) ? $contact1_details->relationship : 'N/A';

                    $i++; 
                }
            }            
        }

        if (ob_get_contents()) { ob_end_clean(); }
        ob_start();

        Excel::create('Pay Go Course Data', function($excel) use ($pay_go_course_array){
            $excel->setTitle('Pay Go Course Data');
            $excel->sheet('Pay Go Course Data', function($sheet) use ($pay_go_course_array){
                $sheet->fromArray($pay_go_course_array, null, 'A1', false, false);
            });
        })->download('xls');
        
        return view('admin.register-template.paygo-course-template',compact('course','shop', 'shop1', 'date'));
    
    }

    // ********************************************* Export all registers in a single csv file for Pay Go Course function **********************
    public function ExportExcelPayGoCourseRegisterForAll(){
        $pay_go_course_data = PayGoCourse::where('status',1)->orderBy('sort','asc')->get();

        $pay_go_course_array = array();
        $heading_data = array();
        $i = 1;

        $heading_data[] = [
            0  => 'Player Name',
            1  => 'Player DOB',
            2  => 'Media',
            3  => 'Mem Price',
            4  => 'Member',
            5  => 'Contact 1 Name',
            6  => 'Contact 1 Tel',
            7  => 'Contact 1 Email',
            8  => 'Relation'
        ];

        $pay_go_course_array=$heading_data;

        foreach ($pay_go_course_data as $pay_go_course) {            
            $course = PayGoCourse::where('id',$pay_go_course->id)->first();
            $pay_go_course_dates = \App\PaygocourseDate::where('course_id',$course->id)->get();

            // For new line
            $i++;
            $pay_go_course_array[$i][0] = "";
            $i++;
            $pay_go_course_array[$i][0] = "Pay Go Course : ".$pay_go_course->title;

            foreach ($pay_go_course_dates as $pay_go_date) {
                $shop = \DB::table('shop_cart_items')
                    ->leftjoin('pay_go_course_booked_dates', 'shop_cart_items.id', '=', 'pay_go_course_booked_dates.cart_id')
                    ->where('shop_type','paygo-course')
                    ->where('product_id',$pay_go_course->id)
                    ->where('type','order')
                    ->where('orderID','!=',NULL)
                    ->where('booked_date_id',$pay_go_date->id)
                    ->get();

                $shop1 = \DB::table('shop_cart_items')
                    ->leftjoin('pay_go_course_booked_dates', 'shop_cart_items.id', '=', 'pay_go_course_booked_dates.cart_id')
                    ->where('shop_type','paygo-course')
                    ->where('product_id',$pay_go_course->id)
                    ->where('type','order')
                    ->where('orderID','!=',NULL)
                    ->where('booked_date_id',$pay_go_date->id)
                    ->groupBy('shop_cart_items.child_id')
                    ->get();

                // For new line
                $i++;
                $pay_go_course_array[$i][0] = "";
                $i++;
                $pay_go_course_array[$i][0] = date('d-m-Y', strtotime( $pay_go_date->course_date ))." Data";
                $i++; 

                // Course Array
                if(count($shop) >0){            
                    foreach($shop as $sh){  
                        $player = \DB::table('users')->where('id',$sh->child_id)->first();  
                        $child_details = \DB::table('children_details')->where('child_id',$sh->child_id)->first();

                        if(empty($player)){
                            $player = \DB::table('users')->where('id',$sh->user_id)->first();
                        }

                        if($sh->membership_status == 1 && $sh->membership_price > 0){
                            $mem_price = 'Yes';
                        }elseif($sh->membership_status == 0 && $sh->membership_price > 0){
                            $mem_price = 'No';
                        }else{
                            $mem_price = 'N/A';
                        }

                        if($sh->membership_status == 1 && $sh->membership_price == null || $sh->membership_price == 0){
                            $member = 'Yes';
                        }elseif($sh->membership_status == 0 && $sh->membership_price == null || $sh->membership_price == 0){
                            $member = 'No';
                        }else{
                            $member = 'N/A';
                        }

                        $contact1_details = \App\ChildContact::where('child_id',$sh->child_id)->first();

                        $pay_go_course_array[$i][0]  = isset($player->name) ? $player->name : 'N/A';
                        $pay_go_course_array[$i][1]  = isset($player->date_of_birth) ? date('d/m/Y',strtotime($player->date_of_birth)) : 'N/A';
                        $pay_go_course_array[$i][2]  = !empty($child_details->media) && ($child_details->media == 'yes') ? 'Y' : 'N';
                        $pay_go_course_array[$i][3]  = $mem_price;
                        $pay_go_course_array[$i][4]  = $member;
                        $pay_go_course_array[$i][5]  = !empty($contact1_details->first_name) && !empty($contact1_details->surname) ? $contact1_details->first_name.' '.$contact1_details->surname : 'N/A';
                        $pay_go_course_array[$i][6]  = !empty($contact1_details->phone) ? $contact1_details->phone : 'N/A';
                        $pay_go_course_array[$i][7]  = !empty($contact1_details->email) ? $contact1_details->email : 'N/A';
                        $pay_go_course_array[$i][8]  = !empty($contact1_details->relationship) ? $contact1_details->relationship : 'N/A';

                        $i++; 
                    }
                }            
            }
        }

        if (ob_get_contents()) { ob_end_clean(); }
        ob_start();

        Excel::create('Pay Go Course Data', function($excel) use ($pay_go_course_array){
            $excel->setTitle('Pay Go Course Data');
            $excel->sheet('Pay Go Course Data', function($sheet) use ($pay_go_course_array){
                $sheet->fromArray($pay_go_course_array, null, 'A1', false, false);
            });
        })->download('xls');
        
        return \Redirect::back()->with('flash_message','Pay as you go Course registers is downloaded successfully.');
    
    }


    // ********************************************* Export register function for Camp *********************************************
    public function ExportExcelCampRegister($id){
        $camp = Camp::where('id',$id)->first();
        $shop = \DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->get();
        $shop1 = \DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$id)->where('type','order')->where('orderID','!=',NULL)->groupBy('child_id')->get();

        $camp_array = array();
        $heading_data = array();
        $i = 1;

        $heading_data[] = [
            0  => 'Name',
            1  => 'Age',
            2  => 'Dob',
            3  => 'Parent',
            4  => 'Contact',
            5  => 'Med',
            6  => 'Photos',
            7  => 'Email'
        ];

        $camp_array=$heading_data;

        $camp_price = \DB::table('camp_prices')->where('camp_id',$camp->id)->first();
        $admin_selected = json_decode($camp_price->week); 

        foreach ($admin_selected as $key => $value) {
            $week_value = 'W'.($key+1);

            // For new line
            $i++;
            $camp_array[$i][0] = "";
            $i++;
            $camp_array[$i][0] = "Camp ".$week_value." Data";
            $i++; 

            $week_key = isset($week_value) ? ltrim($week_value, 'W') : '0'; 
            $week_key_value = $week_key - 1;

            $userSelectedDataByWeek=[]; 
            $newWeekKeys = [];      
            foreach($shop as $sh){
                $player = \DB::table('users')->where('id',$sh->child_id)->first(); 
                $child_details = \DB::table('children_details')->where('id',$sh->child_id)->first();
                $user_selected = json_decode($sh->week);   
                $playerId = isset($player->id)?$player->id:0;

                foreach($user_selected as $week=>$selected_Type){
                    foreach($selected_Type as $selected_Type_Data=>$dayData){
                        foreach($dayData as $day=>$day_value){
                            if($selected_Type_Data=="camp"){                              
                                $check_selected_value =explode('-',$day_value);
                                $check_selected_value =$check_selected_value[2];
                                if($check_selected_value=="noon"){
                                    $userSelectedDataByWeek[$playerId][$week][$day]["noon"]=1; 
                                }else if($check_selected_value=="mor"){
                                    $userSelectedDataByWeek[$playerId][$week][$day]["mor"]=1; 
                                }else{
                                    $userSelectedDataByWeek[$playerId][$week][$day]["full"]=1; 
                                }
                                continue;
                            }
                            $userSelectedDataByWeek[$playerId][$week][$day][$selected_Type_Data]=1;        
                        }
                    }
                }
            }

            // Modifications for Full Day Functionality 
            foreach( $userSelectedDataByWeek as $keyId => $newData){
                foreach( $newData as $keyh => $newDat){
                    foreach( $newDat as $keyold => $newDa){
                        if((strcmp("Fullweek",$keyold)) == 0){
                            foreach( $newDat as $kkkk => $kData){
                                if((strcmp("Fullweek",$kkkk)) != 0){
                                    $userSelectedDataByWeek[$keyId][$keyh][$kkkk] = array_merge($userSelectedDataByWeek[$keyId][$keyh][$kkkk],$newDat["Fullweek"]);
                                    $newDat[$kkkk]=array_merge($newDat[$kkkk],$newDat["Fullweek"]);
                                }
                            }
                            foreach( $newWeekKeys as $newKeyForfullweek ){
                                $userSelectedDataByWeek[$keyId][$keyh][$newKeyForfullweek] = $newDat["Fullweek"];
                                if(array_key_exists ( $newKeyForfullweek , $newDat )){

                                }else{
                                    $newDat[$newKeyForfullweek]=$newDat["Fullweek"];                    
                                }
                            }
                        }
                    }        
                    foreach( $newDat as $keyold => $newDa){
                        foreach( $newDa as $key => $newD){
                            if ((strcmp("full",$key)) == 0){
                                $userSelectedDataByWeek[$keyId][$keyh][$keyold]["noon"]=1; 
                                $userSelectedDataByWeek[$keyId][$keyh][$keyold]["mor"]=1; 
                                $userSelectedDataByWeek[$keyId][$keyh][$keyold]["lunch"]=1;
                            }
                        }
                    }
                }
            }
            //  Code by SB  ends here
            $week_data = isset($week_value) ? $week_value : 'W1'; 
            $week_value = ''.$week_data.'';

            // Course Array            
            if(count($shop1) >0){            
                foreach($shop1 as $sh){  
                    if(!empty($day_filter) ? isset($userSelectedDataByWeek[$sh->child_id][$week_value][$day_filter]) : isset($userSelectedDataByWeek[$sh->child_id][$week_value])){
                        $player = \DB::table('users')->where('id',$sh->child_id)->first();                 
                        if(!empty($player)){
                            $parent = \DB::table('users')->where('id',$player->parent_id)->first();
                            $user_age = strtotime($player->date_of_birth);
                            $current_date1 = strtotime(date('Y-m-d')); 
                            $user_diff = abs($current_date1 - $user_age);
                            $years1 = floor($user_diff / (365*60*60*24));          
                            $ch_details = \DB::table('children_details')->where('child_id',$player->id)->first();        

                            if(empty($parent)){
                                $parent = \DB::table('users')->where('id',$sh->child_id)->first();                          
                            }
                        }

                        $contact1_details = \App\ChildContact::where('child_id',$sh->child_id)->first();

                        $camp_array[$i][0]  = isset($player->name) ? $player->name : 'N/A';
                        $camp_array[$i][1]  = isset($years1) ? (int)$years1 : 0;
                        $camp_array[$i][2]  = isset($player->date_of_birth) ? date('d/m/Y',strtotime($player->date_of_birth)) : 'N/A';
                        $camp_array[$i][3]  = !empty($parent) ? $parent->name : 'N/A';
                        $camp_array[$i][4]  = !empty($parent) ? $parent->phone_number : 'N/A';
                        $camp_array[$i][5]  = !empty($ch_details->med_cond) && ($ch_details->med_cond == 'yes') ? 'Y' : 'N';
                        $camp_array[$i][6]  = !empty($ch_details->media) && ($ch_details->media == 'yes') ? 'Y' : 'N';
                        $camp_array[$i][7]  = !empty($parent) ? $parent->email : 'N/A';

                        $i++; 
                    }
                }
            }
        }

        if (ob_get_contents()) { ob_end_clean(); }
        ob_start();

        Excel::create('Camp Data', function($excel) use ($camp_array){
            $excel->setTitle('Camp Data');
            $excel->sheet('Camp Data', function($sheet) use ($camp_array){
                $sheet->fromArray($camp_array, null, 'A1', false, false);
            });
        })->download('xls');    

        return \Redirect::back()->with('flash_message','Camp register is downloaded successfully.');
    }


    // ********************************************* Export all registers in a single csv file for Camp function **********************
    public function ExportExcelCampRegisterForAll(){
        $camp_array = array();
        $heading_data = array();
        $i = 1;

        $heading_data[] = [
            0  => 'Name',
            1  => 'Age',
            2  => 'Dob',
            3  => 'Parent',
            4  => 'Contact',
            5  => 'Med',
            6  => 'Photos',
            7  => 'Email'
        ];
        $camp_array=$heading_data;

        $camp_data = Camp::where('status',1)->orderBy('id','desc')->get();

        foreach ($camp_data as $camp) {
            // For new line
            $i++;
            $camp_array[$i][0] = "";
            $i++;
            $camp_array[$i][0] = "Camp Name : ".$camp->title;

            $shop = \DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$camp->id)->where('type','order')->where('orderID','!=',NULL)->get();
            $shop1 = \DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$camp->id)->where('type','order')->where('orderID','!=',NULL)->groupBy('child_id')->get();


            $camp_price = \DB::table('camp_prices')->where('camp_id',$camp->id)->first();
            $admin_selected = json_decode($camp_price->week); 

            foreach ($admin_selected as $key => $value) {
                $week_value = 'W'.($key+1);

                // For new line
                $i++;
                $camp_array[$i][0] = "";
                $i++;
                $camp_array[$i][0] = "Camp ".$week_value." Data";
                $i++; 

                $week_key = isset($week_value) ? ltrim($week_value, 'W') : '0'; 
                $week_key_value = $week_key - 1;

                $userSelectedDataByWeek=[]; 
                $newWeekKeys = [];      
                foreach($shop as $sh){
                    $player = \DB::table('users')->where('id',$sh->child_id)->first(); 
                    $child_details = \DB::table('children_details')->where('id',$sh->child_id)->first();
                    $user_selected = json_decode($sh->week);   
                    $playerId = isset($player->id)?$player->id:0;

                    foreach($user_selected as $week=>$selected_Type){
                        foreach($selected_Type as $selected_Type_Data=>$dayData){
                            foreach($dayData as $day=>$day_value){
                                if($selected_Type_Data=="camp"){                              
                                    $check_selected_value =explode('-',$day_value);
                                    $check_selected_value =$check_selected_value[2];
                                    if($check_selected_value=="noon"){
                                        $userSelectedDataByWeek[$playerId][$week][$day]["noon"]=1; 
                                    }else if($check_selected_value=="mor"){
                                        $userSelectedDataByWeek[$playerId][$week][$day]["mor"]=1; 
                                    }else{
                                        $userSelectedDataByWeek[$playerId][$week][$day]["full"]=1; 
                                    }
                                    continue;
                                }
                                $userSelectedDataByWeek[$playerId][$week][$day][$selected_Type_Data]=1;        
                            }
                        }
                    }
                }

                // Modifications for Full Day Functionality 
                foreach( $userSelectedDataByWeek as $keyId => $newData){
                    foreach( $newData as $keyh => $newDat){
                        foreach( $newDat as $keyold => $newDa){
                            if((strcmp("Fullweek",$keyold)) == 0){
                                foreach( $newDat as $kkkk => $kData){
                                    if((strcmp("Fullweek",$kkkk)) != 0){
                                        $userSelectedDataByWeek[$keyId][$keyh][$kkkk] = array_merge($userSelectedDataByWeek[$keyId][$keyh][$kkkk],$newDat["Fullweek"]);
                                        $newDat[$kkkk]=array_merge($newDat[$kkkk],$newDat["Fullweek"]);
                                    }
                                }
                                foreach( $newWeekKeys as $newKeyForfullweek ){
                                    $userSelectedDataByWeek[$keyId][$keyh][$newKeyForfullweek] = $newDat["Fullweek"];
                                    if(array_key_exists ( $newKeyForfullweek , $newDat )){

                                    }else{
                                        $newDat[$newKeyForfullweek]=$newDat["Fullweek"];                    
                                    }
                                }
                            }
                        }        
                        foreach( $newDat as $keyold => $newDa){
                            foreach( $newDa as $key => $newD){
                                if ((strcmp("full",$key)) == 0){
                                    $userSelectedDataByWeek[$keyId][$keyh][$keyold]["noon"]=1; 
                                    $userSelectedDataByWeek[$keyId][$keyh][$keyold]["mor"]=1; 
                                    $userSelectedDataByWeek[$keyId][$keyh][$keyold]["lunch"]=1;
                                }
                            }
                        }
                    }
                }
                //  Code by SB  ends here
                $week_data = isset($week_value) ? $week_value : 'W1'; 
                $week_value = ''.$week_data.'';

                // Course Array            
                if(count($shop1) >0){            
                    foreach($shop1 as $sh){  
                        if(!empty($day_filter) ? isset($userSelectedDataByWeek[$sh->child_id][$week_value][$day_filter]) : isset($userSelectedDataByWeek[$sh->child_id][$week_value])){
                            $player = \DB::table('users')->where('id',$sh->child_id)->first();                 
                            if(!empty($player)){
                                $parent = \DB::table('users')->where('id',$player->parent_id)->first();
                                $user_age = strtotime($player->date_of_birth);
                                $current_date1 = strtotime(date('Y-m-d')); 
                                $user_diff = abs($current_date1 - $user_age);
                                $years1 = floor($user_diff / (365*60*60*24));          
                                $ch_details = \DB::table('children_details')->where('child_id',$player->id)->first();        

                                if(empty($parent)){
                                    $parent = \DB::table('users')->where('id',$sh->child_id)->first();                          
                                }
                            }

                            $contact1_details = \App\ChildContact::where('child_id',$sh->child_id)->first();

                            $camp_array[$i][0]  = isset($player->name) ? $player->name : 'N/A';
                            $camp_array[$i][1]  = isset($years1) ? (int)$years1 : 0;
                            $camp_array[$i][2]  = isset($player->date_of_birth) ? date('d/m/Y',strtotime($player->date_of_birth)) : 'N/A';
                            $camp_array[$i][3]  = !empty($parent) ? $parent->name : 'N/A';
                            $camp_array[$i][4]  = !empty($parent) ? $parent->phone_number : 'N/A';
                            $camp_array[$i][5]  = !empty($ch_details->med_cond) && ($ch_details->med_cond == 'yes') ? 'Y' : 'N';
                            $camp_array[$i][6]  = !empty($ch_details->media) && ($ch_details->media == 'yes') ? 'Y' : 'N';
                            $camp_array[$i][7]  = !empty($parent) ? $parent->email : 'N/A';

                            $i++; 
                        }
                    }
                }
            }
        }

        if (ob_get_contents()) { ob_end_clean(); }
        ob_start();

        Excel::create('Camp Data', function($excel) use ($camp_array){
            $excel->setTitle('Camp Data');
            $excel->sheet('Camp Data', function($sheet) use ($camp_array){
                $sheet->fromArray($camp_array, null, 'A1', false, false);
            });
        })->download('xls');    

        return \Redirect::back()->with('flash_message','Camp register is downloaded successfully.');
    }

    
}
