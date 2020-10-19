<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinkCourseAndCategory;

class CourseCategoryController extends Controller
{
    /*----------------------------------------
    |
    |   Course CATEGORY MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of Course category
    |----------------------------------------*/ 
    public function course_category_index() {
        $LinkCourseAndCategory = LinkCourseAndCategory::select(['id','title','linked_course_cat','image','status','slug'])->orderBy('id','desc')->paginate(10); 
    	return view('admin.LinkCourseAndCategory.index',compact('LinkCourseAndCategory'))
    	->with(['title' => 'Course Category Management', 'addLink' => 'admin.LinkCourseAndCategory.showCreate']);
    }

    public function course_category_showCreate() {
    	return view('admin.LinkCourseAndCategory.create')->with(['title' => 'Create Course Category', 'addLink' => 'admin.LinkCourseAndCategory.list']);
    }

    /*----------------------------------------
    |   Add Course category
    |----------------------------------------*/ 
    public function course_category_create(Request $request) { //dd($request->all());   
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            // 'description' => ['required', 'string'],
            // 'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	if ($request->hasFile('image')) {
            $random = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
	        $image = $request->file('image');
	        $filename = time().'-'.$random.'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $image->move($destinationPath, $filename);
    	}

    	LinkCourseAndCategory::create([
    		'title' => $request['title'],
    		'description' => $request['description'],
    		'linked_course_cat' => $request['linked_course_cat'],
    		'image' => $filename,
    	]);
    	return redirect()->route('admin.LinkCourseAndCategory.list')->with('flash_message', 'Course Category has been created successfully!');
    }

    /*----------------------------------------
    |   Edit Course category content
    |----------------------------------------*/ 
    public function course_category_showEdit($slug) {
    	$venue = LinkCourseAndCategory::FindBySlugOrFail($slug);
    	return view('admin.LinkCourseAndCategory.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Course Category', 'addLink' => 'admin.LinkCourseAndCategory.list']);
    }

    /*----------------------------------------
    |   Update Course category content
    |----------------------------------------*/ 
    public function course_category_update(Request $request, $slug) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            // 'description' => ['required', 'string'],
            // 'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	$venue = LinkCourseAndCategory::FindBySlugOrFail($slug);
    	$filename = $venue->image;
    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $img_path = public_path().'/uploads/'.$venue->image;
	        if (file_exists($img_path)) {
		        unlink($img_path);
		    }
	        $image->move($destinationPath, $filename);
    	}

    	$venue->update([
    		'title' => $request['title'],
    		'description' => $request['description'],
            'linked_course_cat' => $request['linked_course_cat'],
    		'image' => $filename,
    	]);
    	return redirect()->route('admin.LinkCourseAndCategory.list')->with('flash_message', 'Course Category has been updated successfully!');
    }

    /*--------------------------------------------
    |   Change the status of the Course category
    |---------------------------------------------*/ 
    public function course_category_Status($slug) {
     $venue = LinkCourseAndCategory::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Course Category of <b>'.$venue->title.'</b> is Activated' : 'Course Category of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.LinkCourseAndCategory.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }

    /*----------------------------------------
    |   Delete Course Category
    |----------------------------------------*/
    public function delete_course_category($id) 
    {  
        $course_cat = LinkCourseAndCategory::find($id);
        $course_cat->delete();
        return \Redirect::back()->with('flash_message',' Course category has been deleted successfully!');
    }
}
