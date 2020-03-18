<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Venue;

class VenueController extends Controller
{
    public function index() {
    	return view('admin.venues.index')
    	->with(['title' => 'Venues Management', 'addLink' => 'admin.venues.showCreate']);
    }

    public function showCreate() {
    	return view('admin.venues.create')->with(['title' => 'Create Venue', 'addLink' => 'admin.venues.list']);
    }

    public function create(Request $request) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $image->move($destinationPath, $filename);
    	}

    	Venue::create([
    		'title' => $request['title'],
    		'description' => $request['description'],
    		'image' => $filename,
    	]);
    	return redirect()->route('admin.venues.list')->with('flash_message', 'Venue has been created successfully!');
    }

    public function showEdit($slug) {
    	$venue = Venue::FindBySlugOrFail($slug);
    	return view('admin.venues.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Venue', 'addLink' => 'admin.venues.list']);
    }

    public function update(Request $request, $slug) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	$venue = Venue::FindBySlugOrFail($slug);
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
    		'image' => $filename,
    	]);
    	return redirect()->route('admin.venues.list')->with('flash_message', 'Venue has been updated successfully!');
    }

    public function venueStatus($slug) {
     $venue = Venue::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? '<b>'.$venue->title.'</b> is Activated' : '<b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.venues.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }


    public function ajax_getVenues() {
		$vanues = Venue::select(['title', 'description', 'status', 'slug'])->get();
		
		return datatables()->of($vanues)
		->addColumn('action', function ($t) {
			return  $this->Actions($t);
		})->editColumn('status', function($t){
			return $t->status == 1 ? 'Active' : 'In-Active';
		})->editColumn('description',function($t){
        return str_limit($t->description, 50);
        })->make(true);
	}

    public function Actions($data) {
            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-primary">Action</button>';
            $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';


            $text .='<a href="'.route('admin.venues.showEdit', $data->slug).'" class="dropdown-item">Edit</a>';
            $text .='<div class="dropdown-divider"></div>';
            $status=$data->status == 0 ? 'Active' : 'In-Active';
            $text .='<a href="'.route('admin.venues.status', $data->slug).'" class="dropdown-item">'.$status.'</a>';


            $text .='</div>';
            $text .='</div>';

            return $text;
    }		
}
