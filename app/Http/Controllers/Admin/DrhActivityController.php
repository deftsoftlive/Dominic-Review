<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DrhActivity;

class DrhActivityController extends Controller
{
    
    /*----------------------------------------
    |
    |   DRH ACTIVITY MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of drh-activity 
    |----------------------------------------*/ 
    public function drhactivity_index() {
        $drhactivity = DrhActivity::select(['id','title','subtitle','status','slug','sort'])->orderBy('sort','asc')->paginate(10);
    	return view('admin.drhactivity.index',compact('drhactivity'))
    	->with(['title' => 'DRH Activity Management', 'addLink' => 'admin.drhactivity.showCreate']);
    }

    public function drhactivity_showCreate() {
    	return view('admin.drhactivity.create')->with(['title' => 'Create DRH Activity', 'addLink' => 'admin.drhactivity.list']);
    }

    /*----------------------------------------
    |   Add drh-activity 
    |----------------------------------------*/ 
    public function drhactivity_create(Request $request) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string'],
            'subtitle' => ['required', 'string'],
            'button_text' => ['required', 'string'],
            'button_link' => ['required', 'string'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $image->move($destinationPath, $filename);
    	}

    	DrhActivity::create([
    		'title' => $request['title'],
            'subtitle' => $request['subtitle'],
    		'button_text' => $request['button_text'],
    		'button_link' => $request['button_link'],
    		'image' => isset($filename) ? $filename : '',
    	]);
    	return redirect()->route('admin.drhactivity.list')->with('flash_message', 'DRH Activity has been created successfully!');
    }

    /*----------------------------------------
    |   Edit drh-activity content
    |----------------------------------------*/ 
    public function drhactivity_showEdit($slug) {
    	$venue = DrhActivity::FindBySlugOrFail($slug);
    	return view('admin.drhactivity.edit')
    	->with(['venue' => $venue, 'title' => 'Edit DRH Activity', 'addLink' => 'admin.drhactivity.list']);
    }

    /*----------------------------------------
    |   Update drh-activity content
    |----------------------------------------*/ 
    public function drhactivity_update(Request $request, $slug) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string'],
            'subtitle' => ['required', 'string'],
            'button_text' => ['required', 'string'],
            'button_link' => ['required', 'string'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	$venue = DrhActivity::FindBySlugOrFail($slug);
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
            'subtitle' => $request['subtitle'],
    		'button_text' => $request['button_text'],
    		'button_link' => $request['button_link'],
    		'image' => isset($filename) ? $filename : '',
    	]);
    	return redirect()->route('admin.drhactivity.list')->with('flash_message', 'DRH Activity has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete User Record
    |----------------------------------------*/
    public function delete_drhactivity($id) {
        $user = DrhActivity::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message',' DRH Activity has been deleted successfully!');
    }

    /*----------------------------------------
    |   Change the status of the drh-activity
    |----------------------------------------*/ 
    public function drhactivity_Status($id) {
     $venue = DrhActivity::find($id);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'DRH Activity of <b>'.$venue->title.'</b> is Activated' : 'DRH Activity of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.drhactivity.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Wrong!');
    }

    /*----------------------------------------
    |   Update DRH Activity sorting number 
    |-----------------------------------------*/
    public function update_drhactivity_sort($sort_no,$activity_id) 
    {   
        $activity = DrhActivity::find($activity_id);
        $activity->sort = $sort_no;
        $activity->save();

        $data = array(
            'sort_no'   => $activity,
        );

        echo json_encode($data);
    }
}
