<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Venue;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenueController extends Controller
{
    public function showVenues() {
        $venues = Venue::orderByDesc('id')->paginate(30);
        return view('admin/venues/venues_show', ['venues' => $venues, 'search' => '',]);
    }
    public function searchVenue(Request $request) {
        $search_parameter = $request->search;
        
       if($search_parameter != "") {
        $filterVenues = Venue::where( 'name', 'LIKE', '%' . $search_parameter . '%' )
        ->paginate(30)->setPath( '' );
        return view('admin/venues/venues_show', 
        [
            'venues' => $filterVenues, 
            'search' => $request->search
            ]);
       }
       return $this->showVenues();
    }

    public function showCreateVenue() {
        return view('admin/venues/venue_create');
    }

    public function createVenue(Request $request) {
        $pic = $request->file('image');
        $filename = time() . '.' . $pic->getClientOriginalExtension();
        $path = public_path('/upload/images/'.$filename);
        Image::make($pic->getRealPath())->resize(400, 400)->save($path);
        $venue = new \App\Venue([
            'name' 		=> $request['name'],
            'postcode' 	=> $request['post_code'],
            'image' 	=> $filename,
            'address' 	=> $request['address'],
        ]);
        $venue->save();

        return redirect()->route('admin.showvenues')
        ->with('flash_message', 'Venue has been added successfully');
    }

    public function showEditVenue($id) {
        $venue = Venue::find($id);
       	return view('admin/venues/venue_edit', ['venue' => $venue]);
    }

    public function updateVenue(Request $request, $id) {
        $venue = venue::find($id);
        if(!$request->image) {
            $filename = $venue->image;
        } else {
            $image_path = public_path('/upload/images/'.$venue->image);
              
            $pic = $request->file('image');
            $filename = time() . '.' . $pic->getClientOriginalExtension();
            $path = public_path('/upload/images/'.$filename);
            Image::make($pic->getRealPath())->resize(300, 300)->save($path);
            if(file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $venue->update([
            'name' 		=> $request['name'],
            'postcode' 	=> $request['post_code'],
            'image' 	=> $filename,
            'address' 	=> $request['address'],
            ]);

        return redirect()->route('admin.showvenues')
        ->with('flash_message','Venue has been updated successfully');
    }

    public function destroyVenue(Request $request) {
        if ($request->id) {
           $venue = Venue::find($request->id);
           $image_path = public_path('/upload/images/'.$venue->image);
                if(file_exists($image_path)) {
                    unlink($image_path);
                }
           
           $venue->delete();
           return response()->json(['message' => 'Venue has been deleted successfully'], 200);
        }
           return response()->json(['message' => 'Venue Id is required'], 400);
   }
}
