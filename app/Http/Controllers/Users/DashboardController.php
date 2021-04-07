<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserEvent;
use App\FavouriteVendor;
use App\CoachDocument;
use Hash;

class DashboardController extends Controller {

#----------------------------------------------------------------------
#    dashboard function
#----------------------------------------------------------------------
 
public function index($status='upcoming') {
        /*dd(\Auth::user()->role_id);*/
        /*$events = UserEvent::where(['user_id' => Auth::User()->id])
        ->where(function($t) use($status){
            if($status == 'upcoming'){
                $t->whereDate('start_date','>',date('Y-m-d'));
            }
        })
        ->OrderBy('start_date','ASC')
        ->paginate(10);*/
        if(\Auth::user()->role_id == 2){
          return redirect('user/my-family');
        }elseif(\Auth::user()->role_id == 3){
          return redirect('user/coach-profile');
        }else{
          Auth::logout();
          return redirect('/login')->with('error', 'Please login with a parent account.');
          //return view('users.dashboard.dashboard')->with('events', $events);
        }
}

public function profile() {
	return view('users.profile');
}

public function updateProfile(Request $request) {
	$user = Auth::User();
	if($request->old_password) {
		if(Hash::check($request->old_password, $user->password)) {
	      $user->password = Hash::make($request->password);         
	      $user->save();
	      // Auth::logout();
	      return redirect()->back()->with('flash_message', 'Password has updated successfully');
	    } else {
	      return redirect()->back()->with('error_flash_message', 'Please enter currect Old Password');
	    }
	}

	if($request->hasFile('image')) {
     $path = 'images/vendors/profile/';
     $request['profile_image'] = uploadFileWithAjax($path, $request->image);
     if($user->profile_image != 'user.jpg') {
        if($user->profile_image && file_exists($path.$user->profile_image)) {
            unlink($path.$user->profile_image);
        }
     }
 	}

     $user->update($request->all());    
     return redirect()->back()->with('flash_message', "Your Profile has updated successfully"); 
}

	public function addFavouriteVendors($id) {
		$favourite_vendor = FavouriteVendor::where('vendor_id', $id)->first();
		if($favourite_vendor) {
          $favourite_vendor->delete();
		  return response()->json(['message'=> 'Your favourite vendor has been removed successfully', 'status' => false ]);
		}
            $user = Auth::User();
            $meta = new FavouriteVendor;
            $meta->vendor_id = $id;
            $meta->user_id = $user->id;
            $meta->save();
        return response()->json(['message'=> 'Your favourite vendor has been saved successfully', 'status' => true ]);
    }

    public function favouriteVendors() {
        $favourite_vendors = FavouriteVendor::paginate(10);
        return view('users.favourite-vendor.index')->with(['favourite_vendors'=> $favourite_vendors]);
    }

    public function deleteFavouriteVendor(Request $request) {
        if($request->id) {
	        FavouriteVendor::find($request->id)->delete();
	        return redirect()->back()->with('flash_message', 'Your favourite vendor has been deleted successfully');
        }
    }
}
