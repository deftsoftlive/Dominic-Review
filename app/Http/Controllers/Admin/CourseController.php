<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\CourseDate;
use App\Models\Products\ProductCategory;

class CourseController extends Controller
{
    /*----------------------------------------
    |
    |   COURSE MANAGEMENT
    |
    |----------------------------------------*/

    /*----------------------------------------
    |   Get Category listing
    |-----------------------------------------*/
    public function getCategoryList($parent=0,$subparent=0)
    {
        return $category = ProductCategory::with('subCategory')
                            ->where('parent',$parent)
                            ->where('subparent',$subparent)
                            ->OrderBy('sorting','ASC')->get();
    }

    /*----------------------------------------
    |   Listing of courses
    |----------------------------------------*/ 
    public function course_index() 
    {
        $type = request()->get('type');    
        $subtype = request()->get('subtype');
        $level = request()->get('level');

        // dd($type,$subtype,$level);

        if(!empty(request()->get('type')) && !empty(request()->get('subtype')) && !empty(request()->get('level')))
        {
            if(request()->get('level') == 'All')
            {
                $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     ->where('subtype', '=', $subtype)
                     ->orderBy('sort','asc')->paginate(20);

            }else{
                $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     ->where('subtype', '=', $subtype)
                     ->where('level', '=', $level)
                     ->orderBy('sort','asc')->paginate(20);
            }

        }else if(!empty(request()->get('type')) && empty(request()->get('subtype')) && empty(request()->get('level')))
        {
            $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     ->orderBy('sort','asc')->paginate(20);

        }else if(!empty(request()->get('type')) && empty(request()->get('subtype')) && !empty(request()->get('level'))){

            if(request()->get('level') == 'All'){
                $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     ->orderBy('sort','asc')->paginate(20);
            }else{
                $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     ->where('level', '=', $level)
                     ->orderBy('sort','asc')->paginate(20);
            }

        }else if(!empty(request()->get('type')) && !empty(request()->get('subtype')) && empty(request()->get('level'))){
            $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     ->where('subtype', '=', $subtype)
                     ->orderBy('sort','asc')->paginate(20);

        }else{
          $course = Course::orderBy('sort','asc')->paginate(20);
        }

        //dd($course);
    
        $course_cat = ProductCategory::where('parent','0')->where('subparent','0')->where('type','Course')->get();
        $subtype = ProductCategory::where('parent', 156)->where('subparent',0)->get();
    	return view('admin.course.index',compact('course','subtype','course_cat'))
    	->with(['title' => 'Course Management', 'addLink' => 'admin.course.showCreate']);
    }

    /*----------------------------------------
    |   Listing of courses - ACTIVE
    |----------------------------------------*/ 
    public function course_active() {

          $type = request()->get('type');
          $subtype = request()->get('subtype');
          $level = request()->get('level');

        if(!empty(request()->get('type')) && !empty(request()->get('subtype')) && !empty(request()->get('level')))
        {
          $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     ->where('subtype', '=', $subtype)
                     ->where('level', '=', $level)
                     // ->where('status',1)
                     ->orderBy('sort','asc')->paginate(20);

        }else if(!empty(request()->get('type')) && empty(request()->get('subtype')) && empty(request()->get('level')))
        {
            $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     // ->where('status',1)
                     ->orderBy('sort','asc')->paginate(20);

        }else if(!empty(request()->get('type')) && empty(request()->get('subtype')) && !empty(request()->get('level'))){
            $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     ->where('level', '=', $level)
                     // ->where('status',1)
                     ->orderBy('sort','asc')->paginate(20);
        }else{
          $course = Course::select(['id','title','type','season','description','status','slug','price','booking_slot','sort'])->where('status',1)->paginate(20);
        }

       // dd($course);
        
        $course_cat = ProductCategory::where('parent','0')->where('subparent','0')->where('type','Course')->get();
        $subtype = ProductCategory::where('parent', 156)->where('subparent',0)->get();
        return view('admin.course.active-course',compact('course','course_cat','subtype'))
        ->with(['title' => 'Course Management', 'addLink' => 'admin.course.showCreate']);
    }

    /*----------------------------------------
    |   Listing of courses - INACTIVE
    |----------------------------------------*/ 
    public function course_inactive() {

        $type = request()->get('type');
        $subtype = request()->get('subtype');
        $level = request()->get('level');

        //dd($type,$subtype,$level);

        if(!empty(request()->get('type')) && !empty(request()->get('subtype')) && !empty(request()->get('level')))
        {
          $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     ->where('subtype', '=', $subtype)
                     ->where('level', '=', $level)
                     // ->where('status','=', 0)
                     ->orderBy('sort','asc')->paginate(20);

        }else if(!empty(request()->get('type')) && empty(request()->get('subtype')) && empty(request()->get('level')))
        {
            $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     // ->where('status',0)
                     ->orderBy('sort','asc')->paginate(20);

        }else if(!empty(request()->get('type')) && empty(request()->get('subtype')) && !empty(request()->get('level'))){
            $course = \DB::table('courses')
                     ->where('type', '=', $type)
                     ->where('level', '=', $level)
                     // ->where('status', '=', 0)
                     ->orderBy('sort','asc')->paginate(20);
        }else{
          $course = Course::select(['id','title','type','season','description','status','slug','price','booking_slot','sort'])->where('status',0)->paginate(20);
        }

       // dd($course);

        $course_cat = ProductCategory::where('parent','0')->where('subparent','0')->where('type','Course')->get();
        $subtype = ProductCategory::where('parent', 156)->where('subparent',0)->get();
        return view('admin.course.inactive-course',compact('course','course_cat','subtype'))
        ->with(['title' => 'Course Management', 'addLink' => 'admin.course.showCreate']);
    }

    /*----------------------------------------
    |   Add course page
    |----------------------------------------*/ 
    public function course_showCreate() {

    	return view('admin.course.create')->with('category',$this->getCategoryList())->with(['title' => 'Create Course', 'addLink' => 'admin.course.list']);
    }

    /*----------------------------------------
    |   Add course 
    |----------------------------------------*/ 
    public function course_create(Request $request) {

        $data = $request->all();  

    	$validatedData = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required'],
            // 'type' => ['required'],
            // 'subtype' => ['required'],
            'account_id' => ['required'],
            'age_group' => ['required'],
            // 'age' => ['required', 'string'],
            'session_date' => ['required'],
            'course_category' => ['required'],
            'location' => ['required'],
            'day_time' => ['required'],
            'more_info' => ['required'],
            'booking_slot' => ['required', 'numeric', 'max:100'],
            'price' => ['required', 'numeric'],
            'coach_cost' => ['required', 'numeric'],
            'venue_cost' => ['required', 'numeric'],
            'equipment_cost' => ['required', 'numeric'],
            'other_cost' => ['required', 'numeric'],
            'tax_cost' => ['required', 'numeric'],
            'end_date' => ['required'],
            // 'image' => ['required'],
            // 'membership_popup' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $filename);
        }

    	$course = Course::create([
    		'title' => $request['title'],
    		'description' => $request['description'],
            'season' => $request['season'],
            'type' => $request['type'],
            'subtype' => $request['subtype'],
            'course_category' => $request['course_category'],
            'level' => $request['level'],
            'account_id' => $request['account_id'],
            'age_group' => $request['age_group'],
    		'age' => isset($request['age']) ? $request['age'] : '',
            'session_date' => $request['session_date'],
    		'location' => $request['location'],
    		'day_time' => $request['day_time'],
    		'more_info' => $request['more_info'],
            'info_email_content' => $request['info_email_content'],
            'booking_slot' => $request['booking_slot'],
            'price' => $request['price'],
            'linked_coach' => $request['linked_coach'],
            'coach_cost' => $request['coach_cost'],
            'venue_cost' => $request['venue_cost'],
            'equipment_cost' => $request['equipment_cost'],
            'other_cost' => $request['other_cost'],
            'tax_cost' => $request['tax_cost'],
            'early_birth_price' => isset($request['early_birth_price']) ? $request['early_birth_price'] : '',
            'bottom_section' => isset($request['bottom_section']) ? $request['bottom_section'] : '',
            'end_date' => $request['end_date'],
            'image' => isset($filename) ? $filename : '',
            'membership_popup' => $request['membership_popup'],
    	]);

        if(isset($data['course_date'])){  

            foreach ($data['course_date'] as $number => $value) {    

                /* Add dates of courses */       
                $course_id              =  $course->id;
                $cour                   =  new CourseDate;
                $cour->course_id        =  $course_id;  
                $cour['course_date']    =  isset($data['course_date'][$number]) ? $data['course_date'][$number] : '' ; 
                $cour['display_course'] =  isset($data['display_course'][$number]) ? $data['display_course'][$number] : ''; 
                $cour->save(); 

            }
        }

    	return redirect()->route('admin.course.list')->with('flash_message', 'Course has been created successfully!');
    }

    /*----------------------------------------
    |   Edit course content
    |----------------------------------------*/ 
    public function course_showEdit($slug) {

        // get course id using slug
        $course = Course::where('slug',$slug)->first();
        $course_id = $course['id']; 

        // Get courses dates 
        $count_course_dates = CourseDate::where('course_id',$course_id)->count();
        $course_dates_data = CourseDate::where('course_id',$course_id)->get();

    	$venue = Course::FindBySlugOrFail($slug);
    	return view('admin.course.edit')
        ->with('category',$this->getCategoryList())
        ->with('subcategory',$this->getCategoryList($venue->type))
        ->with('cate',$venue)
        ->with('count_course_dates',$count_course_dates)
        ->with('course_dates_data',$course_dates_data)
    	->with(['venue' => $venue, 'title' => 'Edit Course', 'addLink' => 'admin.course.list']);
    }

    /*----------------------------------------
    |   Update course content
    |----------------------------------------*/ 
    public function course_update(Request $request, $slug) {

        $data = $request->all();    //dd($data['membership_popup']);
        
        // get course id using slug
        $course = Course::where('slug',$slug)->first();
        $course_id = $course['id']; 

        CourseDate::where('course_id',$course_id)->delete();

        if(!empty($request->subtype))
        {
            $sub_cat = $request->subtype;
        }else{
            $sub_cat = $request->exist_sub_cat;
        }

    	$validatedData = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required'],
            'account_id' => ['required'],
            'age_group' => ['required'],
            'session_date' => ['required'],
            'course_category' => ['required'],
            'location' => ['required'],
            'day_time' => ['required'],
            'more_info' => ['required'],
            'booking_slot' => ['required', 'numeric', 'max:100'],
            // 'price' => ['required', 'numeric'],
            'coach_cost' => ['required', 'numeric'],
            'venue_cost' => ['required', 'numeric'],
            'equipment_cost' => ['required', 'numeric'],
            'other_cost' => ['required', 'numeric'],
            'tax_cost' => ['required', 'numeric'],
            'end_date' => ['required'],
        ]);

    	$venue = Course::FindBySlugOrFail($slug);

        $filename = $venue->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $img_path = public_path().'/uploads/'.$venue->image;
            // if (file_exists($img_path)) {
            //     unlink($img_path);
            // }
            $image->move($destinationPath, $filename);
        }
        
    	$venue->update([
    		'title' => $request['title'],
    		'description' => $request['description'],
            'season' => $request['season'],
            'type' => $request['type'],
            'subtype' => $sub_cat,
            'account_id' => $request['account_id'],
            'age_group' => $request['age_group'],
            'course_category' => $request['course_category'],
            'level' => $request['level'],
    		'age' => isset($request['age']) ? $request['age'] : '',
    		'session_date' => $request['session_date'],
    		'location' => $request['location'],
    		'day_time' => $request['day_time'],
    		'more_info' => $request['more_info'],
            'info_email_content' => $request['info_email_content'],
            'booking_slot' => $request['booking_slot'],
            // 'price' => $request['price'],
            'linked_coach' => $request['linked_coach'],
            'coach_cost' => $request['coach_cost'],
            'venue_cost' => $request['venue_cost'],
            'equipment_cost' => $request['equipment_cost'],
            'other_cost' => $request['other_cost'],
            'tax_cost' => $request['tax_cost'],
            'early_birth_price' => isset($request['early_birth_price']) ? $request['early_birth_price'] : '',
            'bottom_section' => isset($request['bottom_section']) ? $request['bottom_section'] : '',
            'end_date' => $request['end_date'],
            'image' => isset($filename) ? $filename : '',
            'membership_popup' => isset($data['membership_popup']) ? $data['membership_popup'] : '',
            // 'membership_popup' => $request['membership_popup'],
    	]);

        if(isset($data['course_date'])){  

            foreach ($data['course_date'] as $number => $value) {    

                /* Add dates of courses */ 
                $cour                   =  new CourseDate;
                $cour->course_id        =  $course_id;
                $cour['course_date']    =  isset($data['course_date'][$number]) ? $data['course_date'][$number] : '' ; 
                $cour['display_course'] =  isset($data['display_course'][$number]) ? $data['display_course'][$number] : ''; 
                $cour->save(); 

            }
        }

    	return redirect()->route('admin.course.list')->with('flash_message', 'Course has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete Course Record
    |----------------------------------------*/
    public function delete_course($id) {
        $course = Course::find($id);
        $course->delete();
        return \Redirect::back()->with('flash_message',' Course details has been deleted successfully!');
    }

    /*----------------------------------------
    |   Create duplicate record functionality
    |----------------------------------------*/
    public function duplicate_course($id) {
        $tasks = Course::find($id);
        $newTask = $tasks->replicate();
        $newTask->title = $tasks->title.'(copy)';
        $newTask->status = '0';
        $newTask->save();

        $latest_slug = $newTask->slug;
        return redirect('admin/course/'.$latest_slug)->with('flash_message',' Course details has been replicated successfully!');
    }

    /*----------------------------------------
    |   Change the status of the course
    |----------------------------------------*/ 
    public function course_Status($slug) {
     $venue = Course::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Course of <b>'.$venue->title.'</b> is Activated' : 'Course of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.course.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }

    /*----------------------------------------
    |   Quick course price update
    |-----------------------------------------*/
    public function update_course_price($price,$course_id) 
    {    
        $course = Course::find($course_id);
        $course->price = number_format((float)$price, 2, '.', '');
        $course->save();

        $data = array(
            'price'   => $course,
        );

        echo json_encode($data);
    }

    /*----------------------------------------
    |   Update course sorting number 
    |-----------------------------------------*/
    public function update_course_sort($sort_no,$course_id) 
    {   
        $course = Course::find($course_id);
        $course->sort = $sort_no;
        $course->save();

        $data = array(
            'sort_no'   => $course,
        );

        echo json_encode($data);
    }

    /*----------------------------------------
    |   Courses Filter
    |----------------------------------------*/
    public function selectedCat(Request $request)
    {
        //dd($request->all()); 
        
        $cat_id = $request->selectedCat;
        $sub_cat = ProductCategory::where('parent',$cat_id)->where('subparent','0')->get();

        if(count($sub_cat) > 0)
            {
                $output = '<option value="">All</option>';

                foreach($sub_cat as $row)
                {
                    $output .= '<option value="'.$row->id.'">'.$row->label.'</option>';
                }

            }else{
                $output = '';
            }

            $data = array(
                'option'   => $output,
            );

            echo json_encode($data);
    } 

}
