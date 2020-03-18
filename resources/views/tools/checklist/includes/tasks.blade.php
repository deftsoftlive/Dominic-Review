 

 <?php $listCount = 0; ?>

@if($taskCategories != null && $taskCategories->count() > 0)
   @foreach($taskCategories->get() as $k1)
<?php
$listing = $k1->taskListingWithFilters($requestArray);
 
?>

@if($listing->count() > 0)
    <h2>{{$k1->tasks->task}}</h2>
    <ul class="planning-list row">
     @foreach($listing->get() as $k)
     <?php $listCount = 1; ?>

       <li class="col-lg-12"> <!-- complete_layer_task -->
                <div class="cst-planing {{$k->status == 1 ? 'complete_layer_task' : ''}}">
                  <div class="planning-check">
                    <input type="checkbox" name="" class="cstm-planning-checkbox" id="planningCheckbox-{{$k->id}}" value="{{$k->id}}" {{$k->status == 1 ? 'checked' : ''}}>
                    <label for="planningCheckbox-{{$k->id}}" class="cstm_checkbox"><span class="checkbox-check-icon"><i class="fas fa-check"></i></span></label>
                  </div>
                  <div class="Planning-content">
                    <div class="row">
                      <div class="col-lg-12">
                        <a href="javascript:void(0);" class="cstm_plan_text edit-task" 
                        data-action="{{route('user.tool.getEditTaskContent',[$event->slug,$k->id])}}" data-id="{{$k->id}}">
                         <!--  data-toggle="modal" data-target="#taskLayerModal" -->
                                  <h4>{{$k->task}}</h4>
                                  <div class="create-list">
                                      <span>
                                          <i class="far fa-calendar"></i>
                                          <strong>({{$k->task_date}}) </strong>
                                           {{ \Carbon\Carbon::parse($k->task_date)->diffForhumans()}}
                                      </span> 
                                                                                      
                                  </div>
                              </a>
                      </div>
                     </div>
                  </div>
                    <a href="javascript:void(0);" class="trash-btn task-deleted" data-value="{{$k->id}}">
                       <i class="fas fa-trash"></i>
                   </a>
                 </div>
    </li>
   @endforeach

</ul>
@endif
 @endforeach
@endif







@if($listCount == 0)

<h4 class="text-warning text-center"> No Task</h4>

@endif







