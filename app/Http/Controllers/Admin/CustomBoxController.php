<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomBox;

class CustomBoxController extends Controller
{
    /*----------------------------------------
    |
    |   CUSTOM BOX MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of custom box content
    |----------------------------------------*/ 
    public function custombox_index() {
        $custombox = CustomBox::select(['id','title','type','description','status','slug','sort'])->orderBy('sort','asc')->paginate(10);
    	return view('admin.custombox.index',compact('custombox'))
    	->with(['title' => 'Custom Box Management', 'addLink' => 'admin.custombox.showCreate']);
    }

    public function custombox_showCreate() {
    	return view('admin.custombox.create')->with(['title' => 'Create Custom Box', 'addLink' => 'admin.custombox.list']);
    }

    /*----------------------------------------
    |   Add custom box
    |----------------------------------------*/ 
    public function custombox_create(Request $request) {    
    	$validatedData = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'more_text' => ['required'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $image->move($destinationPath, $filename);
    	}

    	CustomBox::create([
    		'title' => $request['title'],
            'type' => $request['type'],
            'position' => $request['position'],
            'description' => $request['description'],
            'more_text' => $request['more_text'],
            'image' => isset($filename) ? $filename : '',
    	]);
    	return redirect()->route('admin.custombox.list')->with('flash_message', 'Custom Box has been created successfully!');
    }

    /*----------------------------------------
    |   Edit custom box content
    |----------------------------------------*/ 
    public function custombox_showEdit($slug) {
    	$venue = CustomBox::FindBySlugOrFail($slug);
    	return view('admin.custombox.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Custom Box', 'addLink' => 'admin.custombox.list']);
    }

    /*----------------------------------------
    |   Update custom box content
    |----------------------------------------*/ 
    public function custombox_update(Request $request, $slug) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'more_text' => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	$venue = CustomBox::FindBySlugOrFail($slug);
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
            'type' => $request['type'],
            'position' => $request['position'],
    		'description' => $request['description'],
            'more_text' => $request['more_text'],
    		'image' => isset($filename) ? $filename : '',
    	]);
    	return redirect()->route('admin.custombox.list')->with('flash_message', 'Custom Box has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete User Record
    |----------------------------------------*/
    public function delete_custombox($id) {
        $user = CustomBox::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message',' Custom Box has been deleted successfully!');
    }

    /*----------------------------------------
    |   Change the status of the custom box
    |----------------------------------------*/ 
    public function custombox_Status($slug) {
     $venue = CustomBox::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Custom Box of <b>'.$venue->title.'</b> is Activated' : 'Custom Box of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.custombox.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Wrong!');
    }

    /*----------------------------------------
    |   Update course sorting number 
    |-----------------------------------------*/
    public function update_custombox_sort($sort_no,$custombox_id) 
    {   
        $custombox = CustomBox::find($custombox_id);
        $custombox->sort = $sort_no;
        $custombox->save();

        $data = array(
            'sort_no'   => $custombox,
        );

        echo json_encode($data);
    }

}
