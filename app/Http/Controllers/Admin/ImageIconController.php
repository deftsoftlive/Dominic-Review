<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IconImage;

class ImageIconController extends Controller
{

    /* ****************************************
    |
    | Add Activities for Child 
    |
    |******************************************/
    public function image_icons()
    {
        $activities = IconImage::orderBy('id','asc')->get(); 
        $count_activity = $activities->count();

        return view('admin.image-icon.activities',compact('count_activity','activities'));
    }

    public function save_image_icons(Request $request)
    {
        // IconImage::truncate();
        $data = $request->all();  
   
        // if(isset($data) && !(empty($data['ac_title'])))
        // {

        //     foreach ($data['ac_title'] as $number => $value) 
        //     {                                      
        //         $ac =  new IconImage;
        //         $ac['ac_title'] = $data['ac_title'][$number]; 
        //         $ac->save(); 
        //     }
        // }

        if(isset($data) && !(empty($data['ac_title'])))
        {
	        if($request->hasFile('ac_title'))
	        {
	            foreach ($data['ac_title'] as $number => $value)
	            {    
	              $string = str_random(5);
	              $image[$number] = request()->ac_title[$number];  
	              $filename[$number] = time().$string.'.'.$image[$number]->getClientOriginalExtension();
	              $destinationPath[$number] = public_path('/uploads/icons');  
	              $image[$number]->move($destinationPath[$number], $filename[$number]);

	              $ac =  new IconImage;
	              $ac['icon_image'] =   isset($filename[$number]) ? $filename[$number] : '';
	              $ac->save(); 

	            }
	        }
	    }

        return redirect('/admin/image-icon')->with('flash_message',"Image Icons uploaded successfully.");
    }

    /************************************
    |   Remove Image Icons
    |************************************/
    public function remove_image_icons($id)
    {
        IconImage::where('id',$id)->delete();   
        return redirect('/admin/image-icon')->with('flash_message',"Image Icons deleted successfully.");   
    }
}
