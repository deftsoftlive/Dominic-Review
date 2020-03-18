<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Settings;
use App\Http\Controllers\Controller;
use Image;

class SettingsController extends Controller
{
    public function index(){
    	$settings = Settings::first();
    	return view('admin.settings',compact('settings'));
    }

    public function update_settings(Request $request){
 		$settings = Settings::all();
    	if(!$settings->isEmpty()){
    		$settings = Settings::first();
    		
    		if(!$request->header_logo) {
            $filename = $settings->header_logo;
       		} else {
       			
            $image_path = public_path('/upload/images/'.$settings->header_logo);
            $pic = $request->file('header_logo');
            $filename = time() . '.' . $pic->getClientOriginalExtension();
            $path = public_path('/upload/images/'.$filename);
            Image::make($pic->getRealPath())->resize(106, 68)->save($path);
                if(file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        	$settings->update([
                'contact_no' 	=> $request['contact_no'],
          		'facebook_id'	=> $request['fb_link'],
          		'twitter_id'	=> $request['twitter_link'],
          		'email_id'		=> $request['email'],
              'insta_id'    => $request['insta_link'],
          		'copyright_text'=> $request['copyright'],
          		'header_logo'	=> $filename
            ]);
    	}else{

    		if($request->header_logo) {
            $image_path = public_path('/upload/images/'.$request->header_logo);
            $pic = $request->file('header_logo');
            $filename = time() . '.' . $pic->getClientOriginalExtension();
            $path = public_path('/upload/images/'.$filename);
            Image::make($pic->getRealPath())->resize(300, 300)->save($path);
                if(file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            else{
            	$filename = "logo.png";
            }

    		$settings = new \App\Settings([
                'contact_no' 	=> $request['contact_no'],
          		'facebook_id'	=> $request['fb_link'],
          		'twitter_id'	=> $request['twitter_link'],
              'email_id'    => $request['email'],
          		'insta_id'		=> $request['insta_link'],
          		'copyright_text'=> $request['copyright'],
          		'header_logo'	=> $filename
            ]);
            $settings->save();
    	}
    	return redirect()->back()
        ->with('flash_message', 'Settings are saved successfully');
	}
}
