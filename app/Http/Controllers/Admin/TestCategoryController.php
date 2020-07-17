<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TestCategory;

class TestCategoryController extends Controller
{
    /*----------------------------------------
    |
    |   TestCategory MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of TestCategory
    |----------------------------------------*/ 
    public function testcategory_index() {
        $testcategory = TestCategory::select(['id','title','image','slug'])->paginate(10);
    	return view('admin.testcategory.index',compact('testcategory'))
    	->with(['title' => 'TestCategory Management', 'addLink' => 'admin.testcategory.showCreate']);
    }

    public function testcategory_showCreate() {
    	return view('admin.testcategory.create')->with(['title' => 'Create TestCategory', 'addLink' => 'admin.testcategory.list']);
    }

    /*----------------------------------------
    |   Add testcategory 
    |----------------------------------------*/ 
    public function testcategory_create(Request $request) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string']
        ]);

    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $image->move($destinationPath, $filename);
    	}

    	TestCategory::create([
    		'title' => $request['title'],
    		'description' => $request['description'],
    		'image' => isset($filename) ? $filename : '',
    	]);
    	return redirect()->route('admin.testcategory.list')->with('flash_message', 'TestCategory has been created successfully!');
    }

    /*----------------------------------------
    |   Edit testcategory content
    |----------------------------------------*/ 
    public function testcategory_showEdit($slug) {
    	$venue = TestCategory::FindBySlugOrFail($slug);
    	return view('admin.testcategory.edit')
    	->with(['venue' => $venue, 'title' => 'Edit TestCategory', 'addLink' => 'admin.testcategory.list']);
    }

    /*----------------------------------------
    |   Update testcategory content
    |----------------------------------------*/ 
    public function testcategory_update(Request $request, $slug) {	
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string']
        ]);

    	$venue = TestCategory::FindBySlugOrFail($slug);
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
    		'image' => isset($filename) ? $filename : '',
    	]);
    	return redirect()->route('admin.testcategory.list')->with('flash_message', 'Testcategory has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete User Record
    |----------------------------------------*/
    public function delete_testcategory($id) {
        $user = TestCategory::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message',' Testcategory has been deleted successfully!');
    }

    /*----------------------------------------
    |   Change the status of the testcategory
    |----------------------------------------*/ 
    public function testcategory_Status($slug) {
     $venue = TestCategory::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'TestCategory of <b>'.$venue->title.'</b> is Activated' : 'TestCategory of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.testcategory.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }
}
