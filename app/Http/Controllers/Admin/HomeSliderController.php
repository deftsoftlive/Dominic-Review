<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeSlider;

class HomeSliderController extends Controller
{
    /*----------------------------------------
    |
    |   HOME SLIDER MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of HOME SLIDER
    |----------------------------------------*/ 
    public function HomeSlider_index() {
        $HomeSlider = HomeSlider::select(['id','title','heading','status','slug','sort'])->orderBy('sort','asc')->paginate(10);
    	return view('admin.HomeSlider.index',compact('HomeSlider'))
    	->with(['title' => 'Home Slider Management', 'addLink' => 'admin.HomeSlider.showCreate']);
    }

    public function HomeSlider_showCreate() {
    	return view('admin.HomeSlider.create')->with(['title' => 'Create Home Slider', 'addLink' => 'admin.HomeSlider.list']);
    }

    /*----------------------------------------
    |   Add HOME SLIDER 
    |----------------------------------------*/ 
    public function HomeSlider_create(Request $request) {
    	$validatedData = $request->validate([

            'title' => ['required', 'string'],
            'title_color' => ['required'],

            'heading' => ['required', 'string'],
            'heading_color' => ['required'],

            'subheading' => ['required', 'string'],
            'sub_heading_color' => ['required'],

            'description' => ['required'],
            'description_color' => ['required'],

            'button_text' => ['required', 'string'],
            'button_link' => ['required']

            // 'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $image->move($destinationPath, $filename);
    	}

    	HomeSlider::create([

    		'title' => $request['title'],
            'title_color' => $request['title_color'],

    		'heading' => $request['heading'],
            'heading_color' => $request['heading_color'],

            'subheading' => $request['subheading'],
            'sub_heading_color' => $request['sub_heading_color'],

            'description' => $request['description'],
            'description_color' => $request['description_color'],

    		'button_text' => $request['button_text'],
    		'button_link' => $request['button_link'],

    		'image' => isset($filename) ? $filename : '',

    	]);
    	return redirect()->route('admin.HomeSlider.list')->with('flash_message', 'Home Slider has been created successfully!');
    }

    /*----------------------------------------
    |   Edit HOME SLIDER content
    |----------------------------------------*/ 
    public function HomeSlider_showEdit($slug) {
    	$venue = HomeSlider::FindBySlugOrFail($slug);
    	return view('admin.HomeSlider.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Home Slider', 'addLink' => 'admin.HomeSlider.list']);
    }

    /*----------------------------------------
    |   Update home slider sorting number 
    |-----------------------------------------*/
    public function update_homeslider_sort($sort_no,$homeslider_id) 
    {   
        $homeslider = HomeSlider::find($homeslider_id);
        $homeslider->sort = $sort_no;
        $homeslider->save();

        $data = array(
            'sort_no'   => $homeslider,
        );

        echo json_encode($data);
    }

    /*----------------------------------------
    |   Update HOME SLIDER content
    |----------------------------------------*/ 
    public function HomeSlider_update(Request $request, $slug) {
    	$validatedData = $request->validate([
  
            'title' => ['required'],
            'title_color' => ['required'],

            'heading' => ['required'],
            'heading_color' => ['required'],

            'subheading' => ['required'],
            'sub_heading_color' => ['required'],

            'description' => ['required'],
            'description_color' => ['required'],

            'button_text' => ['required'],
            'button_link' => ['required']
            // 'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	$venue = HomeSlider::FindBySlugOrFail($slug);
    	$filename = $venue->image;
    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $img_path = public_path().'/uploads/'.$venue->image;
	     //    if (file_exists($img_path)) {
		    //     unlink($img_path);
		    // }
	        $image->move($destinationPath, $filename);
    	}
    	$venue->update([

    		'title' => $request['title'],
            'title_color' => $request['title_color'],

            'heading' => $request['heading'],
            'heading_color' => $request['heading_color'],

            'subheading' => $request['subheading'],
            'sub_heading_color' => $request['sub_heading_color'],

            'description' => $request['description'],
            'description_color' => $request['description_color'],

    		'button_text' => $request['button_text'],
    		'button_link' => $request['button_link'],
            
    		'image' => isset($filename) ? $filename : '',

    	]);
    	return redirect()->route('admin.HomeSlider.list')->with('flash_message', 'Home Slider has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete HOME SLIDER
    |----------------------------------------*/
    public function delete_HomeSlider($id) {
        $user = HomeSlider::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message','Home Slider has been deleted successfully!');
    }

    /*----------------------------------------
    |   Change the status of the HOME SLIDER
    |----------------------------------------*/ 
    public function HomeSlider_Status($id) {
     $venue = HomeSlider::find($id);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Home Slider of <b>'.$venue->title.'</b> is Activated' : 'Home Slider of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.HomeSlider.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Wrong!');
    }
}
