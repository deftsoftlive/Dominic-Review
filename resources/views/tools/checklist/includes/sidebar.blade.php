











<div class="col-md-3 col-sm-3 eventside-bar">
                                    <aside>
                                      <form id="sidebarFormCheckList" data-action="{{route('user.tool.checklist.loadTaskWithForm',$event->slug)}}">
                                        <div class="inner-padding">
                                             <div class="wrap1">
                                                <div class="cstm_category_top_head">
                                                     <h3>By Date</h3>
                                                         <a href="javascript:void(0);" 
                                                                class="resetRadio btn-reset"
                                                                data-target="by_date"
                                                            >Reset</a>                                           
                                                        </div>
                                                <div class="checkboxwrap">
                                                   
                                                        <div class="form-group">
                                                            <input type="radio" name="by_date" class="formCategoryItem" value="1" id="cb1">
                                                            <label for="cb1">Overdue</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="radio" name="by_date" class="formCategoryItem" value="2" id="cb2">
                                                            <label for="cb2">To Do</label>
                                                        </div>
                                                       <!--  <div class="form-group">
                                                            <input type="radio" name="by_date" class="formCategoryItem" value="3" id="cb3">
                                                            <label for="cb3">After Event</label>
                                                        </div> -->

                                                        <div class="form-group test-right">
                                                           
                                                        </div>
                                                     
                                                </div>
                                            </div>
                                            <div class="wrap1">
                                                <div class="cstm_category_top_head">
                                                <h3>By Status</h3>

                                                     <a href="javascript:void(0);" 
                                                                class="resetRadio btn-reset"
                                                                data-target="by_status"
                                                            >Reset</a>
                                              
                                            </div>
                                              
                                                <div class="checkboxwrap">
                                                   
                                                        <div class="form-group">
                                                            <input type="radio" id="status-cb1" name="by_status" class="formCategoryItem" value="1">
                                                            <label for="status-cb1">Completed</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="radio" id="status-cb2" name="by_status" class="formCategoryItem" value="2">
                                                            <label for="status-cb2">Pending</label>
                                                        </div>
                                                       
                                                         
                                                     
                                                </div>
                                            </div>
                                            <div class="wrap1">
                                                <div class="cstm_category_top_head">
                                                <h3>By Tasks</h3>

                                                     <a href="javascript:void(0);" 
                                                                class="resetRadio btn-reset"
                                                                data-target="category"
                                                            >Reset</a>
                                              
                                            </div>

                                                 <div class="checkboxwrap">
                                                    
                                                    @if($event->taskCategories != null && $event->taskCategories->count() > 0)
														@foreach($event->taskCategories as $cate)
													             

                                                       <div class="form-group">
                                                            <input type="radio" name="category" class="formCategoryItem" value="{{$cate->id}}" id="taskCategory{{$cate->tasks->id}}">
                                                                    <label for="taskCategory{{$cate->tasks->id}}">{{$cate->tasks->task}} <span>{{$cate->taskListing->count()}}</span></label>
                                                        </div>

														@endforeach
													@endif
                                                    
                                                     
                                                </div>
                                            </div>


                                        </div>
                                        @csrf

                                        <input type="hidden" name="complete" id="complete" value="0">
                                        <input type="hidden" name="uncomplete" id="uncomplete" value="0">
                                        <input type="hidden" name="deleted" id="deleted" value="0">
                                    </form>
                                    </aside>
 </div>

