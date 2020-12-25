<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Season;

class SeasonController extends Controller
{

    /*----------------------------------------
    |
    |   SEASON MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of season
    |----------------------------------------*/ 
    public function seasons_index() {
        $seasons = Season::select(['id','title','description','status','slug'])->paginate(10);
        return view('admin.seasons.index',compact('seasons'))
        ->with(['title' => 'Season Management', 'addLink' => 'admin.seasons.showCreate']);
    }

    public function seasons_showCreate() {
        return view('admin.seasons.create')->with(['title' => 'Create Season', 'addLink' => 'admin.seasons.list']);
    }

    /*----------------------------------------
    |   Listing of season
    |----------------------------------------*/ 
    public function seasons_active() {
        $seasons = Season::select(['id','title','description','status','slug'])->where('status',1)->paginate(10);
        return view('admin.seasons.active',compact('seasons'))
        ->with(['title' => 'Season Management', 'addLink' => 'admin.seasons.showCreate']);
    }

    /*----------------------------------------
    |   Listing of season
    |----------------------------------------*/ 
    public function seasons_inactive() {
        $seasons = Season::select(['id','title','description','status','slug'])->where('status',0)->paginate(10);
        return view('admin.seasons.in-active',compact('seasons'))
        ->with(['title' => 'Season Management', 'addLink' => 'admin.seasons.showCreate']);
    }

    /*----------------------------------------
    |   Add seasons 
    |----------------------------------------*/ 
    public function seasons_create(Request $request) {	
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string']
        ]);

        Season::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => 0,
        ]);
        return redirect()->route('admin.seasons.list')->with('flash_message', 'Season has been created successfully!');
    }

    /*----------------------------------------
    |   Edit seasons content
    |----------------------------------------*/ 
    public function seasons_showEdit($slug) {
        $venue = Season::where('slug',$slug)->first();
        return view('admin.seasons.edit')
        ->with(['venue' => $venue, 'title' => 'Edit Season', 'addLink' => 'admin.seasons.list']);
    }

    /*----------------------------------------
    |   Update seasons content
    |----------------------------------------*/ 
    public function seasons_update(Request $request, $slug) {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string']
        ]);

        $venue = Season::where('slug',$slug)->first();
        $venue->update([
            'title' => $request['title'],
            'description' => $request['description'],
        ]);
        return redirect()->route('admin.seasons.list')->with('flash_message', 'Season has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete User Record
    |----------------------------------------*/
    public function delete_seasons($id) {
        $user = Season::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message',' Season has been deleted successfully!');
    }

    /*----------------------------------------
    |   Change the status of the seasons
    |----------------------------------------*/ 
    public function seasons_Status($slug) {	
     $venue = Season::where('slug',$slug)->first();

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? '<b>'.$venue->title.'</b> season is Activated' : '<b>'.$venue->title.'</b> season is Deactivated';
       return redirect(route('admin.seasons.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }

}
