<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Image;
use Hash;
use App\User;

class ProfileController extends Controller
{
    public function profile() {
        $profile = Auth::user()->first();
    	return view('admin/profile', ['profile' => $profile]);
    }

    public function updateProfile(Request $request) {
        $profile = Auth::user()->first();
        if(!$request->profile_picture) {
            $profile->update($request->all());
        } else {
            $image_path = public_path('/upload/images/'.$profile->profile_picture);
              
            $pic = $request->file('profile_picture');
            $filename = time() . '.' . $pic->getClientOriginalExtension();
            $path = public_path('/upload/images/'.$filename);
            Image::make($pic->getRealPath())->save($path);
            if($profile->profile_picture != 'user.png') {
                if(file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $profile->update([
                'fname' => $request['fname'],
                'profile_picture' => $filename,
            ]);
        }
        return Redirect::back()->with('flash_message','Your profile has been updated successfully');
    }

    public function updatePassword(Request $request) {
        if(Hash::check($request->oldpassword, Auth::user()->password))
        {          
          $user = Auth::User()->first();
          $user->password = Hash::make($request->password);         
          $user->save();
          return redirect()->route('admin.index')->with('flash_message','Password has been updated successfully');
        }
        else
        {  
            return redirect()->route('admin.profile')->with('error_flash_message','Please enter correct current password');
        }
    }
}
