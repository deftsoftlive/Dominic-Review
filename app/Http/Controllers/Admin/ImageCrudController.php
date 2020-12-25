<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ImageCrud;

class ImageCrudController extends Controller
{
     /* ****************************************
    |
    | Add image to use to image link anywhere
    |
    |******************************************/
    public function image_icons()
    {
        $images = ImageCrud::orderBy('id','asc')->get(); 
        $count_image = $images->count();

        return view('admin.image-crud.index',compact('count_image','images'));
    }

    public function save_image_icons(Request $request)
    {
        // ImageCrud::truncate();
        $data = $request->all();  

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

	              $ac =  new ImageCrud;
	              $ac['image'] =   isset($filename[$number]) ? $filename[$number] : '';
	              $ac->save(); 

	            }
	        }
	    }

        return redirect('/admin/images')->with('flash_message',"Image Icons uploaded successfully.");
    }

    /************************************
    |   Remove Image Icons
    |************************************/
    public function remove_image_icons($id)
    {
        ImageCrud::where('id',$id)->delete();   
        return redirect('/admin/images')->with('flash_message',"Image Icons deleted successfully.");   
    }
}
