<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
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
    public function course_index() {
        $course = Course::select(['id','title','term','type','description','status','slug','price','booking_slot'])->paginate(10);
    	return view('admin.course.index',compact('course'))
    	->with(['title' => 'Course Management', 'addLink' => 'admin.course.showCreate']);
    }

    public function course_showCreate() {

    	return view('admin.course.create')->with('category',$this->getCategoryList())->with(['title' => 'Create Course', 'addLink' => 'admin.course.list']);
    }

    /*----------------------------------------
    |   Add course 
    |----------------------------------------*/ 
    public function course_create(Request $request) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string'],
            'term' => ['required', 'string'],
            'description' => ['required', 'string'],
            'type' => ['required'],
            'subtype' => ['required'],
            'age_group' => ['required'],
            'age' => ['required', 'string'],
            'session_date' => ['required', 'string'],
            'location' => ['required', 'string'],
            'day_time' => ['required', 'string'],
            'more_info' => ['required', 'string'],
            'booking_slot' => ['required', 'numeric', 'min:10', 'max:100'],
            'price' => ['required', 'numeric', 'min:10', 'max:100'],
            'early_birth_price' => ['required', 'numeric', 'min:10', 'max:100']
        ]);

    	Course::create([
    		'title' => $request['title'],
            'term' => $request['term'],
    		'description' => $request['description'],
            'type' => $request['type'],
            'subtype' => $request['subtype'],
            'age_group' => $request['age_group'],
    		'age' => $request['age'],
    		'session_date' => $request['session_date'],
    		'location' => $request['location'],
    		'day_time' => $request['day_time'],
    		'more_info' => $request['more_info'],
            'booking_slot' => $request['booking_slot'],
            'price' => $request['price'],
            'early_birth_price' => $request['early_birth_price'],
    	]);
    	return redirect()->route('admin.course.list')->with('flash_message', 'Course has been created successfully!');
    }

    /*----------------------------------------
    |   Edit course content
    |----------------------------------------*/ 
    public function course_showEdit($slug) {

    	$venue = Course::FindBySlugOrFail($slug);
    	return view('admin.course.edit')
        ->with('category',$this->getCategoryList())
        ->with('subcategory',$this->getCategoryList($venue->type))
        ->with('cate',$venue)
    	->with(['venue' => $venue, 'title' => 'Edit Course', 'addLink' => 'admin.course.list']);
    }

    /*----------------------------------------
    |   Update course content
    |----------------------------------------*/ 
    public function course_update(Request $request, $slug) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string'],
            'term' => ['required', 'string'],
            'description' => ['required', 'string'],
            'type' => ['required'],
            'subtype' => ['required'],
            'age_group' => ['required'],
            'age' => ['required', 'string'],
            'session_date' => ['required', 'string'],
            'location' => ['required', 'string'],
            'day_time' => ['required', 'string'],
            'more_info' => ['required', 'string'],
            'booking_slot' => ['required', 'numeric', 'min:10', 'max:100'],
            'price' => ['required', 'numeric', 'min:10', 'max:100'],
            'early_birth_price' => ['required', 'numeric', 'min:10', 'max:100']
        ]);

    	$venue = Course::FindBySlugOrFail($slug);
    	$venue->update([
    		'title' => $request['title'],
            'term' => $request['term'],
    		'description' => $request['description'],
            'type' => $request['type'],
            'subtype' => $request['subtype'],
            'age_group' => $request['age_group'],
    		'age' => $request['age'],
    		'session_date' => $request['session_date'],
    		'location' => $request['location'],
    		'day_time' => $request['day_time'],
    		'more_info' => $request['more_info'],
            'booking_slot' => $request['booking_slot'],
            'price' => $request['price'],
            'early_birth_price' => $request['early_birth_price'],
    	]);
    	return redirect()->route('admin.course.list')->with('flash_message', 'Course has been updated successfully!');
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

}
