<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\PageMetaTag;
use App\Traits\GeneralSettingTrait;

class GeneralSettingController extends Controller
{
   


use GeneralSettingTrait;

#-----------------------------------------------------------------------
#  index
#-----------------------------------------------------------------------


 public function index()
 {
 	//return $this->homepage;

 	return view('admin.settings.general.index',[
           'title' => 'Page General Settings'
 	]);
 	
 }


 public function typeStore(Request $request) {
 	 $ch = PageMetaTag::where('type', $request->type)->first();
 	 if(!empty($ch)) {
 	 	return redirect()->route('list_general_settings')->with('error_flash_message', 'Aleady Exists!');
 	 }

   $ch = new PageMetaTag;
   $ch->title = $request->title;
   $ch->type = str_slug($request->title, '-');
 	 $ch->save();

 	 return redirect()->route('list_general_settings')->with('flash_message','New Page type is saved successfully!');
 }



#-----------------------------------------------------------------------
#  index
#-----------------------------------------------------------------------


 	public function ajaxData() {
		 $amenities = PageMetaTag::select('*')
                             ->where('title','!=',"")
                             ->whereNotIn('type', ['paypal-credentials', 'stripe-credentials', 'global-settings'])
		                         ->groupBy('type')
		                         ->get();
		
		return datatables()->of($amenities)
		->addColumn('action', function ($t) {
			return  $this->Actions($t);
		})->make(true);
	}
	


	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/
    

    public function Actions($data)
    {
            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-primary">Action</button>';
            $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';


            $text .='<a href="'.route('add_general_settings', $data->type).'" class="dropdown-item">Edit</a>';
            $text .='<div class="dropdown-divider"></div>';
            

            $text .='</div>';
            $text .='</div>';

            return $text;
    }

	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/


	public function add($slug) {
     $title = PageMetaTag::where('type', $slug)->first();
     return view('admin.settings.general.'.$slug, $this->getArrayValue($slug))
     ->with('title', $title->title)
     ->with('addLink','list_general_settings');
	}



	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/


    public function store(Request $request) {
          $type = $request->type;
            foreach ($request->all() as $key => $value) {
              if(!in_array($key, $this->ignors)):
            	//if($key != "_token" && $key != "homePage_banner"):
            	     $this->updateMeta($key, $value, $type, $request);

               endif;
            }

          if($type == 'general-setting') {
            return redirect('/admin/settings/general/edit/general-setting')->with('flash_message','General Settings is updated successfully.');
          }else if($type == 'early-bird'){
            return redirect('/admin/settings/general/edit/early-bird')->with('flash_message','Early Bird details updated successfully.');
          }
          else{
            return redirect()->route('list_general_settings')->with('flash_message','Page Settings is updated successfully.');
          }
    }


    public function updateMeta($key, $value, $type, $request, $parent = 0) {
    	 $chk = PageMetaTag::where(['parent'=> $parent, 'key'=> $key, 'type'=> $type])->first();

  		 if(!empty($chk)) {
  			 $chk->key = $key;
         $file_path = public_path().'/uploads/'.$chk->keyValue;
			 } else {
  			 	$chk = new PageMetaTag;
          $file_path = $type;
			 }

      if ($request->hasFile($key)) {
          $file = $request->file($key);
          $value = time().$key.'.'.$file->getClientOriginalExtension();
          $destinationPath = public_path('/uploads');
          if (file_exists($file_path)) {
            @unlink($file_path);
          }
          $file->move($destinationPath, $value);
      }

       $chk->keyValue = $value;
       $chk->type = $type;
       $chk->parent = $parent;
       $chk->save();
    }
	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/


     public function getAllValueWithMeta($key,$type)
    {
    	    $chk = \App\Models\Admin\PageMetaTag::where('key',$key)->where('type',$type)->first();

			 if(!empty($chk)){
			 	return $chk->keyValue;
			 }else{
			 	$c =new \App\PageMetaTag;
			 	$c->key = $key;
			 	$c->keyValue = '';
			 	$c->type = $type;
			 	$c->save();
			 }
     }





########################################################################

    public function MetaImage(Request $request)
    {
          $col = $request->meta;
         if($request->hasFile($col)){

                  # save images
            $imageLink = array();
            $delink = array();

               

                        # upload image one by one
                        $image_name = uploadFileWithAjax('images/setting/',$request->$col);

                                 $this->DeleteMetaImages($request->meta,$request->type);
                        
                                 $parent = !empty($request->parent) ? $request->parent : 0;
                        
                               //  $this->updateMeta($request->meta,$image_name,$request->type,$parent);
                               $this->updateMeta($request->meta,$image_name,$request->type,$parent);
                    
                                 $del = array(
                                      'caption' => 'product_image',
                                      'url'     => '',
                                      'key'     => $request->meta
                                );
                                array_push($imageLink, url($image_name));

                                array_push($delink, $del);
              

              $json = array(
                            'initialPreview' => $imageLink,
                            'initialPreviewAsData' => true,
                            'initialPreviewConfig' => $delink,
             );

             return response()->json($json); 
               
         }



 }




 #######################################################################################

 public function DeleteMetaImages($key,$type,$save=0)
 {
    $m = PageMetaTag::where('key',$key)->where('type',$type)->first();

    if(!empty($m)){

              $file_path =  public_path().'/'.$m->value;
        if (file_exists( $file_path ) && $m->value != "") {

                    unlink($file_path); 

               }
               if($save == 1) {
                 $m->value = '';
                 $m->save();
               }
              
    }


 }



// global settings

public function global() {
  return view('admin.settings.general.global-settings')->with(['title'=> 'Global Settings']);
}

public function updateGlobal(Request $request) {
    $type = $request->type;
        foreach ($request->all() as $key => $value) {
          if(!in_array($key, $this->ignors)):
               $this->updateMeta($key, $value, $type, $request);
           endif;
        }
    return redirect()->route('global_settings')->with('flash_message', 'The Global setting has been saved successfully.');
}


// payment settings

public function payments() {
 
	return view('admin.settings.general.payment')->with(['title'=> 'Payment Settings']);
}

public function updatePayments(Request $request) {
    $value = json_encode($request->all());
    $this->updateMeta($request->key, $value, $request->type, $request);
	  return redirect()->route('list_payment_settings')->with('flash_message', 'The Payment setting has been saved successfully.');
}







}
