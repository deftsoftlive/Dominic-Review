<?php

namespace App\Http\Controllers\Users\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserEvent;
use App\Tools\CheckList\MainTraits;
use App\Models\Tools\CheckList;
use App\Models\Tools\MyCheckListTask;
use PDF;
class CheckListController extends Controller
{
   use MainTraits; 

public $filePath = 'tools.checklist.';

#=================================================================================================
#=================================================================================================
#=================================================================================================

	public function index($slug)
	{
		        $user_event = UserEvent::FindBySlugOrFail($slug);
		    
                 if($this->saveCategories($user_event) == 1){
                 	return redirect()->route('user.tool.checklist',$slug);
                 }
		   return view($this->filePath.'index')->with('event',$user_event);
	}



################################################################################################


public function loadTaskWithForm(Request $request,$slug)
{
	   $user_event = UserEvent::FindBySlugOrFail($slug);

                      $category = CheckList::where('event_id',$user_event->id)
						      ->where(function($t) use($request){
							          if(!empty($request->category)){
							          	$t->where('id',$request->category);
							          }
						      })->orderBy('id','ASC');

	 $by_date = !empty($request->by_date) ? $request->by_date : 0;
	 $by_status = !empty($request->by_status) ? $request->by_status : 0;

	 $requestArray = [
        'by_date' => $by_date,
        'by_status' => $by_status,
	 ];
  
      if($this->changeTaskCompleted($user_event,$request) == 1) {
      	$vv = view($this->filePath.'includes.tasks')
      	     ->with('taskCategories',$category)
      	      
      	     ->with('requestArray',$requestArray)
      	     ->with('event',$user_event);
	  return response()->json(['status' => 1, 'taskList' => $vv->render()]);
      }


}


#=========================================================================================================
#=========================================================================================================

public function changeTaskCompleted($event,$request)
{
	$done = 0;
	if($request->complete > 0){
		$status = 1;
		$done = 1;
		$task_id = $request->complete;
	}

	if($request->uncomplete > 0){
		$status = 0;
		$done = 1;
		$task_id = $request->uncomplete;
	}

	if($request->deleted > 0){
		$status = 0;
		$done = 2;
		$task_id = $request->deleted;
	}

	if($done == 1){
		$cc = MyCheckListTask::where('event_id',$event->id)->where('id',$task_id);
		if($cc->count() > 0){
		$t = $cc->first();
		$t->status = $status;
		$t->save();
		}
		
	}

	if($done == 2){
		$cc = MyCheckListTask::where('event_id',$event->id)->where('id',$task_id);
		if($cc->count() > 0){
            $cc->delete();
		 }
	}
    
	return 1;
}

#=========================================================================================================
#=========================================================================================================


public function getEditTaskContent(Request $request,$slug,$task_id)
{
	  $user_event = UserEvent::FindBySlugOrFail($slug);
      $task = MyCheckListTask::where('event_id',$user_event->id)->where('id',$task_id);
      
      $vv = view($this->filePath.'includes.taskContentForEditPopup')
          ->with('slug',$slug)
          ->with('event',$user_event)
           ->with('vendorDetail',$this->getVendorIsHired($task->first(),$user_event->first()))
          ->with('task',$task->first());
      return response()
                     ->json([
                     	 'status' => 1,
                     	 'vendorDetail' => $this->getVendorIsHired($task->first(),$user_event->first()),
                         'content' => $vv->render()]
                     );
}



public function postEditTaskContent(Request $request,$slug,$task_id)
{
	  $user_event = UserEvent::FindBySlugOrFail($slug);
     $task = MyCheckListTask::where('event_id',$user_event->id)->where('id',$task_id);
     
      if($task->count() > 0){
         $t = $task->first();
         $t->task = $request->task;
         $t->status = $request->status;
         $t->description = $request->description;
         $t->note = $request->note;
         $t->category_id = $request->category_id;
         $t->task_date = $request->task_date;
         $t->vendor_id = !empty($request->vendor_remove) ? 0 : $request->vendor;
         $t->save();
        
	      $vv = view($this->filePath.'includes.taskContentForEditPopup')
	          ->with('event',$user_event)
	           ->with('slug',$slug)
	           ->with('vendorDetail',$this->getVendorIsHired($t,$user_event->first()))
	          ->with('task',$t);
	      return response()->json([
	                     	      'status' => 1,
	                     	      'content' => $vv->render()
	                           ]);

      }
}




#=========================================================================================================

 public function getVendorIsHired($task,$event)
 {

 	if($task->vendor_id > 0){
	 	$order = \App\Models\EventOrder::where([
				          'category_id'=> $task->vendor_id,
				          'event_id'=> $task->event_id,
				          'type' => 'order'
	              ]);
	 	 
	    if($order->count() > 0){
	       return $this->hiredVendor($order->first());
        }else{
                $link  = url(route('home_vendor_listing_page',['category_id' => $task->vendor_id]));
				$text  ='<div class="cstm_task_layers cst-planing ">';
				$text .='<label class="trash-btn" for="vendor_remove">';
				$text .='<input type="checkbox" id="vendor_remove" name="vendor_remove" value="1">';
				$text .='<i class="fas fa-trash"></i>';
				$text .='</label>';
				$text .='<div class="task_layer_icon">';
				$text .='<span><img class="category_icon" src="'.url($task->category->image).'"/></span>';
				$text .='</div>';
				$text .='<div class="cstm_task_layer-content">';
				$text .='<h3>MY VENDOR FOR '.$task->category->label.'</h3>';
				$text .='<div class="cstm-select-dropdown">';
				$text .= '<a href="'.$link.'" class="layer-btn">Search '.$task->category->label.'</a>';
				$text .='</div>';
				$text .='</div>';
				$text .='</div>';
		        return $text;
	    }
	}
   
}
#==========================================================================================================



public function hiredVendor($order)
{ 
  
     if($order->category->count() > 0 && $order->category->cover_type == 1){
       $profileImage = url(getBasicInfo($order->vendor->user_id, $order->category_id,'basic_information','cover_photo'));
     }else{
         $profileImage =url(getBasicInfo($order->vendor->user_id, $order->category_id,'basic_information','cover_video_image'));
     }

	 $text  ='<div class="task_layer_img_des_block cst-planing">';
	 $text .='<label class="trash-btn" for="vendor_remove">';
	 $text .='<input type="checkbox" id="vendor_remove" name="vendor_remove" value="1">';
	 $text .='<i class="fas fa-trash"></i>';
	 $text .='</label>';
	 $text .='<figure class="task_layer_img">';
	 $text .= '<img src="'.$profileImage.'">';
	 $text .='<span class="check_btn"><i class="fas fa-check-circle"></i></span>';
	 $text .='</figure>';
	 $text .='<figcaption class="layer_task_content_block">';
	 $text .='<h6>MY VENDORS FOR '.$order->category->label.'</h6>';
	 $text .='<h4>'.$order->vendor->title.'</h4>';
	 $text .='<span class="task_layer_ratings">';
	 $text .='<i class="fas fa-star"></i>';
	 $text .='<i class="fas fa-star"></i>';
	 $text .='<i class="fas fa-star"></i>';
	 $text .='<i class="fas fa-star"></i>';
	 $text .='<i class="fas fa-star"></i>';
	 $text .='</span>';
	 $text .='</figcaption>';
	 $text .='</div>';
	 $text .='</div>';
	 return $text;
}





#=====================================================================================================
#=====================================================================================================
#=====================================================================================================


public function getPDFTaskContent(Request $request,$slug)
{
	    $user_event = UserEvent::FindBySlugOrFail($slug);
        $category = CheckList::where('event_id',$user_event->id)
						      ->orderBy('id','ASC');

 $requestArray = [
        'by_date' => 0,
        'by_status' => 0,
	 ];


  
        $vv = view($this->filePath.'includes.pdf')
              ->with('requestArray',$requestArray)
      	      ->with('taskCategories',$category)
      	      ->with('event',$user_event);

$pdf = PDF::loadView($this->filePath.'includes.pdf', [
'requestArray' => $requestArray,
'taskCategories' => $category,
'event' => $user_event
]);
return $pdf->download('invoice.pdf');

        // if($request->has('download')){
        //     $pdf = PDF::loadView($this->filePath.'includes.pdf')->share('requestArray',$requestArray)
      	 //      ->share('taskCategories',$category)
      	 //      ->share('event',$user_event);;
        //     return $pdf->download('pdfview.pdf');
        // }


        // return $vv;
	 
      
}



public function getprintTaskContent(Request $request,$slug)
{
	$user_event = UserEvent::FindBySlugOrFail($slug);
        $category = CheckList::where('event_id',$user_event->id)
						      ->orderBy('id','ASC');

    $requestArray = [
        'by_date' => 0,
        'by_status' => 0,
	 ];


  
        return $vv = view($this->filePath.'includes.print')
              ->with('requestArray',$requestArray)
      	      ->with('taskCategories',$category)
      	      ->with('event',$user_event);
}






}
