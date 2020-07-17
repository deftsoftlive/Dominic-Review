<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Session;

class SessionController extends Controller
{
    /*----------------------------------------
    |
    |   SESSION MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of Sessions
    |----------------------------------------*/ 
    public function session_index() {
        $Session = Session::select(['id','time', 'session','status','cost'])->paginate(10);
    	return view('admin.Session.index',compact('Session'))
    	->with(['title' => 'Session Management', 'addLink' => 'admin.Session.showCreate']);
    }

    public function session_showCreate() {
    	return view('admin.Session.create')->with(['title' => 'Create Session', 'addLink' => 'admin.Session.list']);
    }

    /*----------------------------------------
    |   Add Session 
    |----------------------------------------*/ 
    public function session_create(Request $request) {
    	$validatedData = $request->validate([
            'session' => ['required'],
            'time' => ['required'],
            'cost' => ['required','numeric','min:1','max:100']
        ]);

    	Session::create([
    		'session' => $request['session'],
    		'time' => $request['time'],
    		'cost' => $request['cost'],
    		'status' => 0,
    	]);
    	return redirect()->route('admin.Session.list')->with('flash_message', 'Session has been created successfully!');
    }

    /*----------------------------------------
    |   Edit Session content
    |----------------------------------------*/ 
    public function session_showEdit($slug) {
    	$venue = Session::find($slug);
    	return view('admin.Session.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Session', 'addLink' => 'admin.Session.list']);
    }

    /*----------------------------------------
    |   Update Session content
    |----------------------------------------*/ 
    public function session_update(Request $request, $id) {
    	$validatedData = $request->validate([
    		'session' => ['required'],
            'time' => ['required'],
            'cost' => ['required','numeric','min:1','max:100']
        ]);

    	$venue = Session::find($id);
    	$venue->update([
    		'session' => $request['session'],
    		'time' => $request['time'],
    		'cost' => $request['cost'],
    	]);
    	return redirect()->route('admin.Session.list')->with('flash_message', 'Session has been updated successfully!');
    }

    /*----------------------------------------------
    |   Change the status of the Session
    |-----------------------------------------------*/ 
    public function session_Status($id) {
     $venue = Session::find($id);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Session of <b>'.$venue->provider_name.'</b> is Activated' : 'Session of <b>'.$venue->provider_name.'</b> is Deactivated';
       return redirect(route('admin.Session.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }
}
