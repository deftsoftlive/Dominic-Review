<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\UserEvent;
use App\CategoryVariation;
use App\Category;
use App\UserEventMetaData;
use App\Models\Order;
use Auth;

class PopUpStepController extends Controller
{





public function saveEventFromPopup(Request $request)
{
   
   $v = \Validator::make($request->all(),[
		         'title' => 'required',
		         'description' => 'required',
		         'start_date' => 'required',
		         'start_time' => 'required',
		         'end_time' => 'required',
		         'end_date' => 'required',
		         'location' => 'required',
		         'latitude' => 'required',
		         'longitude' => 'required',
		         'event_type' => 'required',
		         'min_person' => 'required',
		         'max_person' => 'required',
                 'event_picture' => 'required|image',
                 'seasons' => 'required',
                 'colour' => 'required',
                 
   ]);
//return $request->all();

   if($v->fails()){
       return response()->json(['status' => 0,'errors' => $v->errors()]);
   }else{
   	    $path = 'images/events/';
        $e = new UserEvent;
        $e->user_id = trim(Auth::user()->id);
        $e->title = trim($request->title);
        $e->description = trim($request->description);
        $e->start_date = trim($request->start_date);
        $e->start_time = trim($request->start_time);
        $e->end_time = trim($request->end_time);
        $e->end_date = trim($request->end_date);
        $e->location = trim($request->location);
        $e->latitude = trim($request->latitude);
        $e->longitude = trim($request->longitude);
        $e->event_type = trim($request->event_type);
        $e->event_budget = trim($request->event_budget);
        $e->long_description = trim($request->long_description);
        $e->min_person = trim($request->min_person);
        $e->max_person = trim($request->max_person);
        $e->seasons = trim($request->seasons);
        $e->colour = trim($request->colour);
         
        $e->event_picture = uploadFileWithAjax($path, $request->event_picture);
        $e->save();
          
        $url = url(route('user_show_detail_event',$e->slug));

        $categories = explode(',', $request->event_categories);
        $this->save_event_meta_data($categories,$e);
        $u = Auth::user();
        $u->login_count = 1;
        $u->save();
       
       return response()->json(['status' => 1,'url' => $url]);
   }

	 
}






 public function save_event_meta_data($categories,$event) {
        foreach ($categories as $key => $value) {
            $meta = new UserEventMetaData;
            $meta->parent = 0;
            $meta->user_id = Auth::user()->id;
            $meta->event_id = $event->id;
            $meta->type = 'events';
            $meta->key = 'category_id';
            $meta->key_value = $value;
            $meta->save();
        }
}








}