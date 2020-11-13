<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PackageCourse;
use App\User;
use App\Course;
use Carbon\Carbon;

class PackageCourseController extends Controller
{
    /*----------------------------------------
    |
    |   Package Course MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of package course
    |----------------------------------------*/ 
    public function package_course_index()
    {
        $status  = request()->get('status'); 
        $user_id = request()->get('user_id'); 

        if(isset($status) && empty($user_id))
        {
            if($status == 'all')
            {
                $PackageCourse = PackageCourse::select(['id','parent_id','player_id','account_id','booking_no','status','created_at'])->groupBY('booking_no')->paginate(10);
            }
            elseif($status == '1' || $status == '0')
            {
                $PackageCourse = PackageCourse::select(['id','parent_id','player_id','account_id','booking_no','status','created_at'])->where('status',$status)->groupBY('booking_no')->paginate(10);
            }
        }
        elseif($status == ''  && empty($user_id))
        {
            $PackageCourse = PackageCourse::select(['id','parent_id','player_id','account_id','booking_no','status','created_at'])->groupBY('booking_no')->paginate(10);
        }
        elseif(!empty($user_id) && $status == '')
        {
            $PackageCourse = PackageCourse::where('player_id',$user_id)->paginate(10);

            if(empty($PackageCourse))
            {
                $PackageCourse = PackageCourse::where('parent_id',$user_id)->paginate(10);
            }

            //dd($packageCourse);
        }
        elseif(!empty($user_id) && $status != '')
        {
            if($status == 'all')
            {
                $PackageCourse = PackageCourse::select(['id','parent_id','player_id','account_id','booking_no','status','created_at'])->groupBY('booking_no')->where('player_id',$user_id)->paginate(10);

                if(empty($PackageCourse))
                {
                    $PackageCourse = PackageCourse::select(['id','parent_id','player_id','account_id','booking_no','status','created_at'])->groupBY('booking_no')->where('parent_id',$user_id)->paginate(10);
                }
            }
            elseif($status == '1' || $status == '0')
            {
                $PackageCourse = PackageCourse::select(['id','parent_id','player_id','account_id','booking_no','status','created_at'])->where('status',$status)->where('player_id',$user_id)->groupBY('booking_no')->paginate(10);

                if(empty($PackageCourse))
                {
                    $PackageCourse = PackageCourse::select(['id','parent_id','player_id','account_id','booking_no','status','created_at'])->where('status',$status)->where('parent_id',$user_id)->groupBY('booking_no')->paginate(10);
                }
            }

            //dd($PackageCourse);
        }

    	return view('admin.PackageCourse.index',compact('PackageCourse'))
    	->with(['title' => 'Package Course Management']);
    }

    /*----------------------------------------
    |   Get courses on the basis of
    |   player/parent selected
    |----------------------------------------*/ 
    public function get_courses(Request $request)
    {
        // Place of insertion 
        if(!empty($request->number)){
           $number = $request->number; 
        }else{
               $number = 1;
        }

        $complete_data = $request->all();

    	$account = $request->account;

    	if(!empty($request->parent))
    	{
    		$user_id = $request->parent;

            // check course is already purchased or not
            $check_course = \DB::table('shop_cart_items')->where('user_id',$request->parent)->where('shop_type','course')->where('type','order')->get();
    	}
    	elseif(!empty($request->player))
    	{
    		$user_id = $request->player;

            // check course is already purchased or not
            $check_course = \DB::table('shop_cart_items')->where('user_id',$request->parent)->where('child_id',$request->player)->where('shop_type','course')->where('type','order')->get();
    	}
        
        $courses = [];

        // Array of purchased courses of particular user
        foreach($check_course as $shop)
        {
            $courses[] = $shop->product_id;
        }


        if(!empty($user_id) && !empty($account))
        {

        	$user = User::where('id',$user_id)->first();

            // Course is active & linked with selected account
        	$get_courses = Course::where('status',1)
        						->where('account_id',$account)
        						->orderBy('id','desc')
        						->get();

                                //dd($get_courses);

        	if(count($get_courses) > 0)
            {
              $output = '';

              foreach($get_courses as $sh)
              {
                // Those courses which is not purchased by this particular user
                if(in_array($sh->id, $courses))
                {

                }else{
                    $cour_id = $sh->id; 
                    $purchased_courses = \DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$cour_id)->count();  
                    $booked_courses = !empty($purchased_courses) ? $purchased_courses : '0';

                   // dd($purchased_courses,$booked_courses);

                    if($booked_courses >= $sh->booking_slot)
                    {

                    }else{
                        $output .= '<option value="'.$sh->id.'">'.$sh->title.'</option>';
                    }
                }
    		    
                
              }
            }else{
                $output = '<option value="">No data exists</option>';
            }

            $data = array(
                'option'   => $output,
                'number'   => $number,
                'request'  => $complete_data,
            );

            echo json_encode($data);
        }
    	
    }


    /*----------------------------------------
    |   Listing of create package course
    |----------------------------------------*/ 
    public function package_course_showCreate() {
    	return view('admin.PackageCourse.create')->with(['title' => 'Create Package Course']);
    }

    /*----------------------------------------
    |   Add Package Course 
    |----------------------------------------*/ 
    public function package_course_create(Request $request) {

    	// dd($request->all());

    	// $validatedData = $request->validate([
         //   'parent_id' => ['required'],
         //   'account_id' => ['required'],
         // ]);

        $date = Carbon::now();  
        $current_date = date('d-m-Y h:i',strtotime($date));

        $parent_email = getUseremail($request['parent_id']);

        if(!empty($request->course) && !empty($request->price))
        {

            foreach($request->course as $key=>$course)
            {
                foreach($request->price as $key1=>$price)
                {
                    if($key == $key1)
                    {
                        $package = PackageCourse::create([
                            'booking_no' => 'DRHSHOP'.strtotime(date('y-m-d h:i')),
                            'parent_id'  => isset($request['parent_id']) ? $request['parent_id'] : '',
                            'player_id'  => isset($request['player_id']) ? $request['player_id'] : '',
                            'account_id' => isset($request['account_id']) ? $request['account_id'] : '',
                            'course_id'  => $course,
                            'price'      => $price,
                            'link_generated' => $current_date,
                        ]);
                    }
                    
                }
                
            }
            
        }

        // Link generated email
        \Mail::send('emails.packagecourse', ['parent_email' => $parent_email,'booking_no' => $package->booking_no] , 
            function($message) use($parent_email){
                $message->to($parent_email);
                 $message->subject('Subject : '.'Your Tennis Coaching Courses');
               });
        
    	return redirect()->route('admin.packageCourse.list')->with('flash_message', 'Package Course has been created successfully!');
    }


    /*----------------------------------------
    |   Delete Package Course 
    |----------------------------------------*/ 
    public function delete_created_courses($booking_no) 
    {
        $courses = PackageCourse::where('booking_no',$booking_no)->delete();
        return redirect()->route('admin.packageCourse.list')->with('flash_message', 'Package Course has been deleted successfully!');
    }

    /*----------------------------------------
    |   Detail of the Package Course 
    |----------------------------------------*/ 
    public function package_course_detail($booking_no) 
    {
        $courses = PackageCourse::where('booking_no',$booking_no)->get();  
        $single_course = PackageCourse::where('booking_no',$booking_no)->first();  
        return view('admin.PackageCourse.detail',compact('courses','booking_no','single_course'));
    }

    /*----------------------------------------
    |   Resend Package Course Link
    |----------------------------------------*/ 
    public function resend_course_link($booking_no) 
    {
        $package = PackageCourse::where('booking_no',$booking_no)->first();
        $parent_email = getUseremail($package->parent_id);

        $date = Carbon::now();  
        $current_date = date('d-m-Y h:i',strtotime($date));

        PackageCourse::where('booking_no',$booking_no)->update(array('link_generated' => $current_date));

        // Resend same link again to user 
        \Mail::send('emails.packagecourse', ['parent_email' => $parent_email,'booking_no' => $package->booking_no] , 
            function($message) use($parent_email){
                $message->to($parent_email);
                 $message->subject('Subject : '.'packagecourse');
               });

        return redirect()->route('admin.packageCourse.list')->with('flash_message', 'Package course link has been resend successfully to user!');
    }
}
