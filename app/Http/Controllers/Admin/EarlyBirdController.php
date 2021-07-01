<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EarlyBirdManagementCourse;
use App\LinkCourseAndCategory;

class EarlyBirdController extends Controller
{
    public function index(){
    	$EarlyBird = EarlyBirdManagementCourse::orderBy('id','desc')->get(); 
    	return view('admin.EarlyBird.index',compact('EarlyBird'))
    	->with(['title' => 'Early Bird Management', 'addLink' => 'admin.create.early_bird']);
    }

    public function create() {
    	$exist_category = EarlyBirdManagementCourse::select('course_category_id')->get()->toArray();
    	$course_category = LinkCourseAndCategory::where('status',1)->whereNotIn('id', $exist_category)->get();
    	return view('admin.EarlyBird.create')->with(['title' => 'Create Early Bird', 'addLink' => 'admin.early_bird.list', 'course_category' => $course_category]);
    }

    public function store(Request $request){ 
    	$validatedData = $request->validate([
            'early_bird_date' => ['required'],
            'early_bird_time' => ['required'],
            'early_bird_text1' => ['required'],
            'early_bird_text2' => ['required'],
            'discount_percentage' => ['required'],
            'utc_uk_diff' => ['required'],
        ]);

        EarlyBirdManagementCourse::create([
    		'early_bird_date' => $request->early_bird_date,
    		'early_bird_time' => $request->early_bird_time,
    		'course_category_id' => $request->course_category_id,
    		'early_bird_option' => $request->check_early_bird,
            'early_bird_text1' => $request->early_bird_text1,
            'early_bird_text2' => $request->early_bird_text2,
            'discount_percentage' => $request->discount_percentage,
            'utc_uk_diff' => $request->utc_uk_diff,
    	]);

    	return redirect()->route('admin.early_bird.list')->with('flash_message', 'Early Bird has been created successfully!');
    }

    public function edit($id){
    	$earlybird_data = EarlyBirdManagementCourse::where('id',$id)->first();
    	return view('admin.EarlyBird.edit')
    	->with(['earlybird_data' => $earlybird_data, 'title' => 'Edit Early Bird', 'addLink' => 'admin.early_bird.list']);
    }

    public function update(Request $request,$id){        
        $validatedData = $request->validate([
            'early_bird_date' => ['required'],
            'early_bird_time' => ['required'],
            'early_bird_text1' => ['required'],
            'early_bird_text2' => ['required'],
            'discount_percentage' => ['required'],
            'utc_uk_diff' => ['required'],
        ]);

    	$earlybird_data = EarlyBirdManagementCourse::Find($request->id);
    	if(empty($earlybird_data) || $earlybird_data == null){
    		return redirect()->route('admin.early_bird.list')->with('error_flash_message', 'Something went Wrong!');
    	}

    	$earlybird_data->update([
    		'early_bird_date' => $request->early_bird_date,
    		'early_bird_time' => $request->early_bird_time,
    		'early_bird_option' => $request->check_early_bird,
            'early_bird_text1' => $request->early_bird_text1,
            'early_bird_text2' => $request->early_bird_text2,
            'discount_percentage' => $request->discount_percentage,
            'utc_uk_diff' => $request->utc_uk_diff,
    	]);
    	return redirect()->route('admin.early_bird.list')->with('flash_message', 'Early Bird has been updated successfully!');
    }

    public function status($id){
    	$earlybird_data = EarlyBirdManagementCourse::Find($id);

     	if(!empty($earlybird_data)){
        	$earlybird_data->early_bird_option = $earlybird_data->early_bird_option == 1 ? 0 : 1;
        	$earlybird_data->save();

        	$EarlyBirdLinkedCategoryName = \App\LinkCourseAndCategory::where('id',$earlybird_data->course_category_id)->first();

        	$msg= $earlybird_data->early_bird_option == 1 ? 'Early Bird for course category <b>'.$EarlyBirdLinkedCategoryName->title.'</b> is Activated' : 'Early Bird <b>'.$EarlyBirdLinkedCategoryName->title.'</b> is Deactivated';
       		return redirect(route('admin.early_bird.list'))->with('flash_message', $msg);
     	}
     	return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }
}
