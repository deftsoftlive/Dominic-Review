<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CampCategory;

class CampCategoryController extends Controller
{
    /*----------------------------------------
    |
    |   CAMP CATEGORY MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of camps category
    |----------------------------------------*/ 
    public function camp_category_index() {
        $campcategory = CampCategory::select(['id','title', 'description','status','slug'])->orderBy('id','desc')->paginate(10);
    	return view('admin.campcategory.index',compact('campcategory'))
    	->with(['title' => 'Camp Category Management', 'addLink' => 'admin.campcategory.showCreate']);
    }

    public function camp_category_showCreate() {
    	return view('admin.campcategory.create')->with(['title' => 'Create Camp Category', 'addLink' => 'admin.campcategory.list']);
    }

    /*----------------------------------------
    |   Add camp category
    |----------------------------------------*/ 
    public function camp_category_create(Request $request) {    
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	if ($request->hasFile('image')) {
            $random = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
	        $image = $request->file('image');
	        $filename = time().'-'.$random.'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $image->move($destinationPath, $filename);
    	}

        if ($request->hasFile('slider_image1')) {
            $random1 = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
            $slider_image1 = $request->file('slider_image1');
            $slider1_filename = time().'-'.$random1.'.'.$slider_image1->getClientOriginalExtension();
            $slider1_destinationPath = public_path('/uploads');
            $slider_image1->move($slider1_destinationPath, $slider1_filename);
        }

        if ($request->hasFile('slider_image2')) {
            $random2 = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
            $slider_image2 = $request->file('slider_image2');
            $slider2_filename = time().'-'.$random2.'.'.$slider_image2->getClientOriginalExtension();
            $slider2_destinationPath = public_path('/uploads');
            $slider_image2->move($slider2_destinationPath, $slider2_filename);
        }

        if ($request->hasFile('slider_image3')) {
            $random3 = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
            $slider_image3 = $request->file('slider_image3');
            $slider3_filename = time().'-'.$random3.'.'.$slider_image3->getClientOriginalExtension();
            $slider3_destinationPath = public_path('/uploads');
            $slider_image3->move($slider3_destinationPath, $slider3_filename);
        }

        if ($request->hasFile('slider_image4')) {
            $random4 = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
            $slider_image4 = $request->file('slider_image4');
            $slider4_filename = time().'-'.$random4.'.'.$slider_image4->getClientOriginalExtension();
            $slider4_destinationPath = public_path('/uploads');
            $slider_image4->move($slider4_destinationPath, $slider4_filename);
        }

    	CampCategory::create([
    		'title' => $request['title'],
    		'description' => $request['description'],
            // 'description_more' => $request['description_more'],
    		'image' => $filename,
            'slider_image1' => $slider1_filename,
            'slider_image2' => $slider2_filename,
            'slider_image3' => $slider3_filename,
            'slider_image4' => $slider4_filename,
    	]);
    	return redirect()->route('admin.campcategory.list')->with('flash_message', 'Camp Category has been created successfully!');
    }

    /*----------------------------------------
    |   Edit camp category content
    |----------------------------------------*/ 
    public function camp_category_showEdit($slug) {
    	$venue = CampCategory::FindBySlugOrFail($slug);
    	return view('admin.campcategory.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Camp Category', 'addLink' => 'admin.campcategory.list']);
    }

    /*----------------------------------------
    |   Update camp category content
    |----------------------------------------*/ 
    public function camp_category_update(Request $request, $slug) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);
        

    	$venue = CampCategory::FindBySlugOrFail($slug);
    	$filename = $venue->image;
    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
            $random = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
	        $filename = time().'-'.$random.'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $img_path = public_path().'/uploads/'.$venue->image;
	        if (file_exists($img_path)) {
		        unlink($img_path);
		    }
	        $image->move($destinationPath, $filename);
    	}

        // Slider Images - Start Here
        $slider1_filename = $venue->slider_image1;
        if ($request->hasFile('slider_image1')) {
            $slider_image1 = $request->file('slider_image1');
            $random = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
            $slider1_filename = time().'-'.$random.'.'.$slider_image1->getClientOriginalExtension();
            $slider1_destinationPath = public_path('/uploads');
            $slider1_img_path = public_path().'/uploads/'.$venue->slider_image1;
            // if (file_exists($slider1_img_path)) {
            //     unlink($slider1_img_path);
            // }
            $slider_image1->move($slider1_destinationPath, $slider1_filename);
        }

        $slider2_filename = $venue->slider_image2;
        if ($request->hasFile('slider_image2')) {
            $slider_image2 = $request->file('slider_image2');
            $random = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
            $slider2_filename = time().'-'.$random.'.'.$slider_image2->getClientOriginalExtension();
            $slider2_destinationPath = public_path('/uploads');
            $slider2_img_path = public_path().'/uploads/'.$venue->slider_image2;
            // if (file_exists($slider2_img_path)) {
            //     unlink($slider2_img_path);
            // }
            $slider_image2->move($slider2_destinationPath, $slider2_filename);
        }

        $slider3_filename = $venue->slider_image3;
        if ($request->hasFile('slider_image3')) {
            $slider_image3 = $request->file('slider_image3');
            $random = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
            $slider3_filename = time().'-'.$random.'.'.$slider_image3->getClientOriginalExtension();
            $slider3_destinationPath = public_path('/uploads');
            $slider3_img_path = public_path().'/uploads/'.$venue->slider_image3;
            // if (file_exists($slider3_img_path)) {
            //     unlink($slider3_img_path);
            // }
            $slider_image3->move($slider3_destinationPath, $slider3_filename);
        }

        $slider4_filename = $venue->slider_image4;
        if ($request->hasFile('slider_image4')) {
            $slider_image4 = $request->file('slider_image4');
            $random = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
            $slider4_filename = time().'-'.$random.'.'.$slider_image4->getClientOriginalExtension();
            $slider4_destinationPath = public_path('/uploads');
            $slider4_img_path = public_path().'/uploads/'.$venue->slider_image4;
            // if (file_exists($slider4_img_path)) {
            //     unlink($slider4_img_path);
            // }
            $slider_image4->move($slider4_destinationPath, $slider4_filename);
        }
        // Slider Images - End Here
        //dd( $slider1_filename, $slider2_filename, $slider3_filename, $slider4_filename );


    	$venue->update([
    		'title' => $request['title'],
    		'description' => $request['description'],
            // 'description_more' => $request['description_more'],
    		'image' => $filename,
            'slider_image1' => $slider1_filename,
            'slider_image2' => $slider2_filename,
            'slider_image3' => $slider3_filename,
            'slider_image4' => $slider4_filename,
    	]);
    	return redirect()->route('admin.campcategory.list')->with('flash_message', 'Camp Category has been updated successfully!');
    }

    /*--------------------------------------------
    |   Change the status of the camp category
    |---------------------------------------------*/ 
    public function camp_category_Status($slug) {
     $venue = CampCategory::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Camp Category of <b>'.$venue->title.'</b> is Activated' : 'Camp Category of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.campcategory.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }

    /*----------------------------------------
    |   Delete Camp Category
    |----------------------------------------*/
    public function delete_camp_category($id) {  
        $camp_cat = CampCategory::find($id);
        $camp_cat->delete();
        return \Redirect::back()->with('flash_message',' Camp category has been deleted successfully!');
    }
}
