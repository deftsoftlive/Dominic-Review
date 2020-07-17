<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial;

class TestimonialController extends Controller
{

    /*----------------------------------------
    |
    |   TESTIMONIAL MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of testimonials
    |----------------------------------------*/ 
    public function testimonial_index() {
        $testimonial = Testimonial::select(['id','title','page_title','description','status','slug'])->paginate(10);
    	return view('admin.testimonial.index',compact('testimonial'))
    	->with(['title' => 'Testimonial Management', 'addLink' => 'admin.testimonial.showCreate']);
    }

    public function testimonial_showCreate() {
    	return view('admin.testimonial.create')->with(['title' => 'Create Testimonial', 'addLink' => 'admin.testimonial.list']);
    }

    /*----------------------------------------
    |   Add testimonial 
    |----------------------------------------*/ 
    public function testimonial_create(Request $request) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string'],
            // 'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $image->move($destinationPath, $filename);
    	}

    	Testimonial::create([
    		'title' => $request['title'],
            'page_title' => $request['page_title'],
    		'description' => $request['description'],
    		'image' => isset($filename) ? $filename : '',
    	]);
    	return redirect()->route('admin.testimonial.list')->with('flash_message', 'Testimonial has been created successfully!');
    }

    /*----------------------------------------
    |   Edit testimonial content
    |----------------------------------------*/ 
    public function testimonial_showEdit($slug) {
    	$venue = Testimonial::FindBySlugOrFail($slug);
    	return view('admin.testimonial.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Testimonial', 'addLink' => 'admin.testimonial.list']);
    }

    /*----------------------------------------
    |   Update testimonial content
    |----------------------------------------*/ 
    public function testimonial_update(Request $request, $slug) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string'],
            // 'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	$venue = Testimonial::FindBySlugOrFail($slug);
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
            'page_title' => $request['page_title'],
    		'description' => $request['description'],
    		'image' => isset($filename) ? $filename : '',
    	]);
    	return redirect()->route('admin.testimonial.list')->with('flash_message', 'Testimonial has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete User Record
    |----------------------------------------*/
    public function delete_testimonial($id) {
        $user = Testimonial::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message',' Testimonial has been deleted successfully!');
    }

    /*----------------------------------------
    |   Change the status of the testimonial
    |----------------------------------------*/ 
    public function testimonial_Status($slug) {
     $venue = Testimonial::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Testimonial of <b>'.$venue->title.'</b> is Activated' : 'Testimonial of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.testimonial.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }

}
