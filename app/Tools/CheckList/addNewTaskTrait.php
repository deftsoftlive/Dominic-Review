<?php
namespace App\Tools\CheckList;
use Illuminate\Http\Request;
use Auth;
use App\Models\Tools\CheckList;
use App\Models\Tools\MyCheckListTask;
use App\UserEvent;
trait addNewTaskTrait {

 
 

public function newTask(Request $request,$slug)
{
    $v=\Validator::make($request->all(),[
       'task' => 'required',
       'description' => 'required',
       'category' => 'required',
       'task_date' => 'required|date',
    ]);

    if($v->fails()){
    	$status = [
             'status' => 0,
             'messages' => 'Fill the fields'
    	];
    }else{
    	 $user_event = UserEvent::FindBySlugOrFail($slug);
        
        $cc =CheckList::where('event_id',$user_event->id)->where('id',$request->category);
        if($cc->count() > 0){
					 $task = MyCheckListTask::where('event_id',$user_event->id)
					                       ->where('category_id',$request->category)
					                       ->where('task',$request->task);

			    $t = $task->count() > 0 ? $task->first() : new MyCheckListTask;
			    $t->event_id = $user_event->id;
			    $t->parent = $cc->first()->task_id;
          $t->task = $request->task;
			    $t->description = $request->description;
			    $t->task_id = 0;
			    $t->category_id = $request->category;
			    $t->task_date = $request->task_date;
			    $t->save();

			    $status = [
		             'status' => 1,
		             'messages' => 'Task is added successfully!'
		    	];
    	}else{
    		    $status = [
		             'status' => 0,
		             'messages' => 'The parent task is exists!'
		    	];
    	}
    }


return response()->json($status);


}



#===================================================================================================


}