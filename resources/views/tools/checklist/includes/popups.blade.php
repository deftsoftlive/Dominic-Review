<!-- basic modal -->
<div class="modal right fade cstm_wt_modal" id="addNewTaskModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="AddNewTasks" data-action="{{route('user.tool.checklist.newTask',$event->slug)}}">
      <div class="modal-header">
      <div class="row">
        <div class="col-lg-10">
             <h2 class="modal_head_title">Add New Task</h2> 
         </div>
         <div class="col-lg-2">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
           </button>
         </div>
      </div>       
      </div>
      <div class="modal-body">
        <div class="messagesystem"></div>
        <div class="payment_note_block">
            {{textbox($errors,'Task Name','task')}}
            {{textarea($errors,'Description','description')}}

          
        </div>
        <div class=" ">
             
            <div class="row">
             <div class="col-lg-6">
              <div class="cstm-select-dropdown">
                <label>Choose Parent Task</label>
                <div class="form-group">
                   <select class="js-select2" name="category">
                      <option value="">choose</option>
               
                             @if($event->taskCategories != null && $event->taskCategories->count() > 0)
                                  @foreach($event->taskCategories as $cate)
                                             
                                        <option value="{{$cate->id}}">{{$cate->tasks->task}}</option>

                                  @endforeach
                                @endif
                    </select>
                </div>
          </div>
        </div>
           <div class="col-lg-6">

           <div class="cstm_task_layer-content">
              
              <div class="cstm-select-dropdown">
                 {{datebox($errors,'Choose Date for this task','task_date')}}
              </div>
          </div>
        </div>
         <!--  <ul class="task_layer_btns">
            <li><a href="javascript:void(0);" class="layer-btn solid-btn">Search for Catering</a></li>
             <li><a href="javascript:void(0);" class="layer-btn">Hired this vendor?</a></li>
          </ul> -->
            </div>
        </div>
    

      </div>
      <div class="modal-footer">
           <button class="cstm-btn solid-btn">Save</button>
      </div>
      @csrf
    </form>
    </div>
  </div>
</div>



    <!-- basic modal -->
<div class="modal right fade cstm_wt_modal" id="taskLayerModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="loadTaskContentForEditPopup">
    <div class="loaderModal"><div class="loader5"></div></div>
      <div class="modal-header">
      <div class="row">
        <div class="col-lg-4">
          <div class="cstm-select-dropdown">
             <select class="js-select2">
               
              </select>
          </div>
         </div>
         <div class="col-lg-4">
           <div class="date-picker-wrapper">
                <label for="datepicker2">
                  <input type="text" id="datepicker2" autocomplete="off">
                  <span class="datepicker-icon"><i class="far fa-calendar-alt"></i></span>
                </label>  
              </div>
         </div>
         <div class="col-lg-4">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
           </button>
         </div>
      </div>       
      </div>
      <div class="modal-body">
        <div class="payment_note_block">
          <h3>Title</h3>
          <p>Description</p>
          <div class="form-group">
          <textarea class="form-control" placeholder="Add Note"></textarea>
        </div>
        </div>
        <div class="cstm_task_layers">
            <div class="task_layer_icon">
              <span><i class="fas fa-folder-open"></i></span>
            </div>
            <div class="cstm_task_layer-content">
              <h3>ADD VENDOR CATEGORY</h3>
              <div class="cstm-select-dropdown">
             <select class="js-select2">
                <option>Select A</option>
                <option>Select B</option>
                <option>Select C</option>
                <option>Select D</option>
              </select>
          </div>
         <!--  <ul class="task_layer_btns">
            <li><a href="javascript:void(0);" class="layer-btn solid-btn">Search for Catering</a></li>
             <li><a href="javascript:void(0);" class="layer-btn">Hired this vendor?</a></li>
          </ul> -->
            </div>
        </div>
        <div class="cstm_task_layers">
            <div class="task_layer_icon">
              <span><i class="fas fa-coins"></i></span>
            </div>
            <div class="cstm_task_layer-content">
              <h3>ADD VENDOR CATEGORY</h3>
              <div class="cstm-select-dropdown">
                 <select class="js-select2">
                    <option>Select A</option>
                    <option>Select B</option>
                    <option>Select C</option>
                    <option>Select D</option>
                  </select>
              </div>
            </div>
        </div>

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="addNewTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="col-md-12">
              
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



















<!--  
<div class="modal fade" id="chooseTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose Task Categories</h5>
      </div>
      <div class="modal-body">
        <div class="choose-tasl-wrap">
             <form id="chooseTaskCategories" data-action="{{route('user.tool.add.category.checklist',$event->id)}}">
                  @csrf
                  <ul class="choose-tasks-list row" style="min-height: 220px;">
                 
                    @if($event->eventType->count() > 0 && $event->eventType->taskCategory->count() > 0)
                      @foreach($event->eventType->taskCategory as $cate)
                                 
                                 <li class="col-lg-6">
                                         <div class="cst-choose-task">
                                                <input id='taskCategoryList{{$cate->id}}' name="taskCategories[]" type='checkbox' value="{{$cate->id}}" checked/>
                                                <label for='taskCategoryList{{$cate->id}}'>
                                                    <h2>{{$cate->task}}</h2>   
                                                </label>
                                         </div>
                                 </li>

                      @endforeach
                    @endif
                </ul>

                <div class="col-md-12 text-right">
                     <button class="cstm-btn solid-btn">Next</button>
                </div>
            </form>
        </div>
      </div>
     
    </div>
  </div>
</div>



 
<div class="modal fade" id="PlanningEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Planning Event</h5>
      </div>
      <div class="modal-body">
         <div class="planning-list-wrap">
         <ul class="planning-list row">
            <li class="col-lg-6">
              <div class="cst-planing">
                <div class="planning-check">
                  <input type="checkbox" name="" class="cstm-planning-checkbox" id="planningCheckbox1">
                  <label for="planningCheckbox1" class="cstm_checkbox"><span class="checkbox-check-icon"><i class="fas fa-check"></i></span></label>
                </div>
                <div  class="Planning-content">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="cstm_plan_text">
                                <h4>Venue Name</h4>
                                <div class="create-list">
                                    <span>
                                        <i class="far fa-calendar"></i>2 Days Left
                                    </span>                                                                     
                                </div>
                            </div>
                      
                    </div>
                    <div class="col-lg-6">
                      <div class="date-picker-wrapper">
                <label for="datepicker">Pick a Date
                  <input type="text" id="datepicker1" autocomplete="off">
                </label>  
              </div>
                    </div>
                  </div>
                </div>
              
                      <a href="javascript:void(0);" class="trash-btn">
                       <i class="fas fa-times"></i>
                       </a>
               
              </div>
            </li>
            <li class="col-lg-6">
              <div class="cst-planing">
                <div class="planning-check">
                  <input type="checkbox" name="" class="cstm-planning-checkbox" id="planningCheckbox2">
                  <label for="planningCheckbox2" class="cstm_checkbox"><span class="checkbox-check-icon"><i class="fas fa-check"></i></span></label>
                </div>
                <div  class="Planning-content">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="cstm_plan_text">
                                <h4>Venue Name</h4>
                                <div class="create-list">
                                    <span>
                                        <i class="far fa-calendar"></i>2 Days Left
                                    </span>                                                                     
                                </div>
                            </div>
                      
                    </div>
                    <div class="col-lg-6">
                      <div class="date-picker-wrapper">
                <label for="datepicker">Pick a Date
                  <input type="text" id="datepicker2" autocomplete="off">
                </label>  
              </div>
                    </div>
                  </div>
                </div>
              
                      <a href="javascript:void(0);" class="trash-btn">
                       <i class="fas fa-times"></i>
                       </a>
               
              </div>
            </li>
            <li class="col-lg-6">
              <div class="cst-planing">
                <div class="planning-check">
                  <input type="checkbox" name="" class="cstm-planning-checkbox" id="planningCheckbox3">
                  <label for="planningCheckbox3" class="cstm_checkbox"><span class="checkbox-check-icon"><i class="fas fa-check"></i></span></label>
                </div>
                <div  class="Planning-content">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="cstm_plan_text">
                                <h4>Venue Name</h4>
                                <div class="create-list">
                                    <span>
                                        <i class="far fa-calendar"></i>2 Days Left
                                    </span>                                                                     
                                </div>
                            </div>
                      
                    </div>
                    <div class="col-lg-6">
                      <div class="date-picker-wrapper">
                <label for="datepicker">Pick a Date
                  <input type="text" id="datepicker3" autocomplete="off">
                </label>  
              </div>
                    </div>
                  </div>
                </div>
              
                      <a href="javascript:void(0);" class="trash-btn">
                       <i class="fas fa-times"></i>
                       </a>
               
              </div>
            </li>
            <li class="col-lg-6">
              <div class="cst-planing">
                <div class="planning-check">
                  <input type="checkbox" name="" class="cstm-planning-checkbox" id="planningCheckbox4">
                  <label for="planningCheckbox4" class="cstm_checkbox"><span class="checkbox-check-icon"><i class="fas fa-check"></i></span></label>
                </div>
                <div  class="Planning-content">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="cstm_plan_text">
                                <h4>Venue Name</h4>
                                <div class="create-list">
                                    <span>
                                        <i class="far fa-calendar"></i>2 Days Left
                                    </span>                                                                     
                                </div>
                            </div>
                      
                    </div>
                    <div class="col-lg-6">
                      <div class="date-picker-wrapper">
                <label for="datepicker">Pick a Date
                  <input type="text" id="datepicker4" autocomplete="off">
                </label>  
              </div>
                    </div>
                  </div>
                </div>
              
                      <a href="javascript:void(0);" class="trash-btn">
                       <i class="fas fa-times"></i>
                       </a>
               
              </div>
            </li>
             <li class="col-lg-6">
              <div class="cst-planing">
                <div class="planning-check">
                  <input type="checkbox" name="" class="cstm-planning-checkbox" id="planningCheckbox5">
                  <label for="planningCheckbox5" class="cstm_checkbox"><span class="checkbox-check-icon"><i class="fas fa-check"></i></span></label>
                </div>
                <div  class="Planning-content">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="cstm_plan_text">
                                <h4>Venue Name</h4>
                                <div class="create-list">
                                    <span>
                                        <i class="far fa-calendar"></i>2 Days Left
                                    </span>                                                                     
                                </div>
                            </div>
                      
                    </div>
                    <div class="col-lg-6">
                      <div class="date-picker-wrapper">
                <label for="datepicker">Pick a Date
                  <input type="text" id="datepicker5" autocomplete="off">
                </label>  
              </div>
                    </div>
                  </div>
                </div>
              
                      <a href="javascript:void(0);" class="trash-btn">
                       <i class="fas fa-times"></i>
                       </a>
               
              </div>
            </li>
             <li class="col-lg-6">
              <div class="cst-planing">
                <div class="planning-check">
                  <input type="checkbox" name="" class="cstm-planning-checkbox" id="planningCheckbox6">
                  <label for="planningCheckbox6" class="cstm_checkbox"><span class="checkbox-check-icon"><i class="fas fa-check"></i></span></label>
                </div>
                <div  class="Planning-content">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="cstm_plan_text">
                                <h4>Venue Name</h4>
                                <div class="create-list">
                                    <span>
                                        <i class="far fa-calendar"></i>2 Days Left
                                    </span>                                                                     
                                </div>
                            </div>
                      
                    </div>
                    <div class="col-lg-6">
                      <div class="date-picker-wrapper">
                <label for="datepicker">Pick a Date
                  <input type="text" id="datepicker6" autocomplete="off">
                </label>  
              </div>
                    </div>
                  </div>
                </div>
              
                      <a href="javascript:void(0);" class="trash-btn">
                       <i class="fas fa-times"></i>
                       </a>
               
              </div>
            </li>
        </ul>
    </div>

      </div>
    
    </div>
  </div>
</div>

 -->
