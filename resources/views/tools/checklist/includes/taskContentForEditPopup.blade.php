 <div class="loaderModal"><div class="loader5"></div></div>
 <form id="updateTaskInformation" data-action="{{route('user.tool.postEditTaskContent',[$slug,$task->id])}}">
<div class="modal-header">
      <div class="row">
        <div class="col-lg-3">
          
          <div class="TaskCompletedMarks task_layer_btn">
            <input type="hidden" name="status" value="0">
            <input type="checkbox" name="status" value="1" id="markAsCompleted" {{$task->status == 1 ? 'checked' : ''}}>
            <label for="markAsCompleted">{{$task->status == 1 ? 'Completed' : 'Mark as Completed'}}</label>

          </div>
        </div>
        <div class="col-lg-4">
          <div class="cstm-select-dropdown">
             <select class="js-select2" name="category_id">
                               
                                       @foreach($event->taskCategories as $cate)
                                         <option value="{{$cate->id}}" {{$task->category_id == $cate->id ? 'selected' : ''}}>
                                            {{$cate->tasks->task}}
                                          </option>
                                       @endforeach
              </select>
          </div>
         </div>
         <div class="col-lg-4">
           <div class="date-picker-wrapper">
                <label for="taskDate">
                  <input type="date" id="taskDate" autocomplete="off" value="{{$task->task_date}}" name="task_date">
                  <!-- <span class="datepicker-icon"><i class="far fa-calendar-alt"></i></span> -->
                </label>  
              </div>
         </div>
         <div class="col-lg-1">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
           </button>
         </div>
      </div>       
      </div>
      <div class="modal-body">
        <div class="payment_note_block">
          <h3 class="edit-something" id="writeOneDiv">
           <label class="task_layer_lable">Task
                <a href="javascript:void(0)" 
                class="edit-event-target icon-btn" 
                data-target="#written-something">
                  <i class="fas fa-edit"></i>
                </a> </label>
            {{$task->task}} 
          </h3>
          <h3 class="edit-something task_layer_input" id="written-something" style="display: none;">
              <label class="task_layer_lable">Task
                <a href="javascript:void(0)" 
                   class="edit-event-target icon-btn danger-icon-btn"
                   data-target="#writeOneDiv"
                 ><i class="fa fa-times"></i></a>
                </label>
              <input type="text" name="task" value="{{$task->task}}" class="form-control"> 
          </h3>
        
          <p class="edit-something" id="targetDescriptionTestarea1">
             <label class="task_layer_lable">Description <a 
              href="javascript:void(0)" 
              class="edit-event-target icon-btn"
              data-target="#targetDescriptionTestarea">
                  <i class="fas fa-edit"></i>
             </a></label>
            {{$task->description}}... 
          </p>
           <p class="edit-something task_layer_input" id="targetDescriptionTestarea" style="display: none;">
             <label class="task_layer_lable">Description 
                      <a href="javascript:void(0)" 
                         class="edit-event-target icon-btn danger-icon-btn"
                         data-target="#targetDescriptionTestarea1"
                      >
                        <i class="fas fa-times"></i>
                     </a>

             </label>
               <textarea class="form-control" placeholder="Add Description" name="description">{{$task->description}}</textarea> 
          </p>
         
          <div class="form-group edit-something" id="NoteTarget1" style="display: {{$task->note == "" ? 'none' : 'block'}}">
             <label class="task_layer_lable">Note <a href="javascript:void(0)" 
                         class="edit-event-target icon-btn"
                         data-target="#NoteTarget">
                        <i class="fas fa-edit"></i>
                     </a></label>
               <p>{{$task->note}}</p>
                    
          </div>

            <div class="form-group edit-something task_layer_input" id="NoteTarget" style="display: {{$task->note != "" ? 'none' : 'block'}}">
               <label class="task_layer_lable">Note   <a href="javascript:void(0)" 
                                                         class="edit-event-target icon-btn danger-icon-btn"
                                                         data-target="#NoteTarget1">
                                                        <i class="fas fa-times"></i>
                                                     </a></label>
             <textarea class="form-control" placeholder="Add Note" name="note">{{$task->note}}</textarea>
                 
          </div>
        </div>
             @if($task->vendor_id == 0 || $task->vendor_id == null)
                <div class="cstm_task_layers">
                    <div class="task_layer_icon">
                      <span><i class="fas fa-folder-open"></i></span>
                    </div>
                    <div class="cstm_task_layer-content">
                      <h3>ADD VENDOR CATEGORY</h3>
                      <div class="cstm-select-dropdown">
                      
                        <select class="js-select2" name="vendor" id="addMyVendorToTask">
                                @foreach($event->eventCategories as $category)
                                   <option value="{{$category->eventCategory->id}}">{{$category->eventCategory->label}}</option>
                                @endforeach
                        </select>

                     </div>
                   </div>
                </div>
                @else
                   <input type="hidden" name="vendor" value="{{$task->vendor_id}}">
                   {!!$vendorDetail!!}
                @endif
        <div class="cstm_task_layers cst-planing">
            <div class="task_layer_icon">
              <span><i class="fas fa-coins"></i></span>
            </div>
            <div class="cstm_task_layer-content">
              <h3>RELATED EXPENSE</h3>
               <p>Comming Soon</p>
            </div>
        </div>

      </div>
      <div class="modal-footer text-right">
           <button class="cstm-btn solid-btn">Update</button>
      </div>
@csrf
 </form>     