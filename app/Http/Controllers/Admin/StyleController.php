<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Style;
use Auth;

class StyleController extends Controller
{
    public function index() {
    	return view('admin.styles.index')
    	->with(['title' => 'Styles Management', 'addLink' => 'admin.styles.showCreate']);
    }

    public function showCreate() {
    	return view('admin.styles.create')->with(['title' => 'Create Style', 'addLink' => 'admin.styles.list']);
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

    	Style::create([
            'user_id' => Auth::user()->id,
            'added_by' => 'admin',
    		'title' => $request['title'],
    		'description' => $request['description'],
    		'image' => $filename,
    	]);
    	return redirect()->route('admin.styles.list')->with('flash_message', 'Style has been created successfully!');
    }

    public function showEdit($slug) {
    	$style = Style::FindBySlugOrFail($slug);
    	return view('admin.styles.edit')
    	->with(['style' => $style, 'title' => 'Edit Style', 'addLink' => 'admin.styles.list']);
    }

    public function update(Request $request, $slug) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

    	$style = Style::FindBySlugOrFail($slug);
    	$filename = $style->image;
    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $img_path = public_path().'/uploads/'.$style->image;
	        if (file_exists($img_path)) {
		        unlink($img_path);
		    }
	        $image->move($destinationPath, $filename);
    	}
    	$style->update([
            'user_id' => Auth::user()->id,
            'added_by' => 'admin',
    		'title' => $request['title'],
    		'description' => $request['description'],
    		'image' => $filename,
    	]);
    	return redirect()->route('admin.styles.list')->with('flash_message', 'Style has been updated successfully!');
    }

    public function styleStatus($slug) {
     $style = Style::FindBySlugOrFail($slug);

     if(!empty($style)){
        $style->status = $style->status == 1 ? 0 : 1;
        $style->save();
        $msg= $style->status == 1 ? '<b>'.$style->title.'</b> is Activated' : '<b>'.$style->title.'</b> is Deactivated';
       return redirect(route('admin.styles.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }


    public function ajax_getStyles() {
		$styles = Style::select(['title', 'description', 'status', 'slug'])->get();
		
		return datatables()->of($styles)
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


            $text .='<a href="'.route('admin.styles.showEdit', $data->slug).'" class="dropdown-item">Edit</a>';
            $text .='<div class="dropdown-divider"></div>';
            $status=$data->status == 0 ? 'Active' : 'In-Active';
            $text .='<a href="'.route('admin.styles.status', $data->slug).'" class="dropdown-item">'.$status.'</a>';


            $text .='</div>';
            $text .='</div>';

            return $text;
    }
}
