         

         <div class="cstm-pkg-form-wrap">
           <form class="cstm-pkg-form" id="cstm-pkg-form" action="">
          <div class="messageNotofications"></div>
            <div class="row">
              <div class="col-lg-12">
            <div class="cstm-pkg-checkbox-wrap">
              <label class="form-label">Package Details</label>
             <div class="row">

                <div class="col-lg-6">
                 <div class="form-group">
                      <div class="form-control-wrap">
                           <select class="form-control" name="event">
                                 <option value="">Choose Event</option>
                             @if(Auth::check() && Auth::user()->role == "user")
                             @foreach(Auth::user()->UpcomingUserEvents as $e)
                                 <option value="{{$e->id}}">{{$e->title}}</option>
                            @endforeach
                             @endif
                              
                           </select>       
                           <span class="input-icon"><i class="fas fa-pen"></i></span>
                        </div>
                      </div>
               </div>

               <div class="col-lg-6">
                 <div class="form-group">
                      <div class="form-control-wrap">
                           <input type="text" class="form-control" placeholder="Package Title" name="title" id="">          
                           <span class="input-icon"><i class="fas fa-pen"></i></span>
                        </div>
                      </div>
               </div>
                <div class="col-lg-6">
                 
                      <div class="form-control-wrap">                        
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                           <input type="text" class="form-control right-radius-none" name="min_person" placeholder="Minimum person" id="">
                           <span class="input-icon"><i class="fas fa-users"></i></span>
                         </div>
                         </div>
                         <div class="col-md-6">
                          <div class="form-group">
                           <input type="text" class="form-control left-radius-none" name="max_person" placeholder="Maximum person" id=""> 
                            <span class="input-icon"><i class="fas fa-users"></i></span>
                         </div>
                         </div>
                           </div>          
                          
                       
                      </div>
                     
               </div>
                <div class="col-lg-6">
                 <div class="form-group">
                      <div class="form-control-wrap">
                           <input type="text" class="form-control" placeholder="Your Budget" name="price">          
                           <span class="input-icon"><i class="fas fa-money-check-alt"></i></span>
                        </div>
                      </div>
               </div>
             <!--   <div class="col-lg-4">
                 <div class="form-group">
             
                      <div class="form-control-wrap">
                           <input type="text" class="form-control" placeholder="Number Of Hours" id="">          
                           <span class="input-icon"><i class="far fa-clock"></i></span>
                        </div>
                      </div>
               </div>
                <div class="col-lg-4">
                 <div class="form-group">
                      <div class="form-control-wrap">
                           <input type="text" class="form-control" placeholder="Number Of Days" id="">          
                           <span class="input-icon"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                      </div>
               </div> -->
             </div>
           </div>
         </div>









   <div class="col-lg-12">
                <div class="cstm-pkg-checkbox-wrap">
                 <div class="form-group">
                <div class="row">
                  <div class="col-lg-12">
                  <label class="form-label" for="no_of_hours">Do You Want Amenity?</label>
                </div>

                   
                            @foreach($vendor->VendorAmenity as $game)
                              
                                     @if(getSeasonOfBusiness($game->amenity_id,$game->category_id,'amenity') > 0)
                                        <div class="col-lg-3 col-md-6">
                                         <div class="pkg-ckeck-list">
                                            <div class="category-checkboxes category-title">
                                            <input type="checkbox" name="amenities[]" value="{{$game->amenity->id}}" id="amenityes-{{$game->amenity->id}}">
                                                 <label for="amenityes-{{$game->amenity->id}}">{{$game->amenity->name}}</label> 
                                          </div>
                                         </div>
                                        </div>  
                                     @endif
                           @endforeach         
                </div>
             </div>
           </div>
               </div>















               <div class="col-lg-12">
                <div class="cstm-pkg-checkbox-wrap">
                 <div class="form-group">
         <div class="row">
            <div class="col-lg-12">
            <label class="form-label" for="no_of_hours">Do You Want Games?</label>
            </div>
                      

                             
                              @foreach($vendor->VendorGames as $game)   
                                            @if(getSeasonOfBusiness($game->amenity_id,$game->category_id,'game') > 0)             
                                              <div class="col-lg-3 col-md-6">
                                                 <div class="pkg-ckeck-list">
                                                    <div class="category-checkboxes category-title">
                                                    <input type="checkbox" name="games[]" value="{{$game->amenity->id}}" id="game-{{$game->amenity->id}}">
                                                         <label for="game-{{$game->amenity->id}}">{{$game->amenity->name}}</label> 
                                                  </div>
                                                 </div>
                                                </div>
                                            @endif
                              @endforeach
                 
                                     
                 </div>
             </div>
           </div>
               </div>



               <div class="col-lg-12">
                <div class="cstm-pkg-checkbox-wrap">
                 <div class="form-group">
                <div class="row">
                  <div class="col-lg-12">
                  <label class="form-label" for="no_of_hours">What type of Event do you want?</label>
                </div>

                   
                      @foreach($vendor->VendorEvents as $k => $event)
                            @if(getSeasonOfBusiness($event->event_id,$event->category_id,'event') > 0)
                                       
                                    <div class="col-lg-3 col-md-6">
                                     <div class="pkg-ckeck-list">
                                        <div class="category-checkboxes category-title">
                                        <input type="checkbox" name="events[]" value="{{$event->Event->id}}" id="game-{{$event->Event->id}}">
                                             <label for="game-{{$event->Event->id}}">{{$event->Event->name}}</label> 
                                      </div>
                                     </div>
                                    </div>       
                          @endif                                
                     @endforeach                       
                </div>
             </div>
           </div>
               </div>

              <div class="col-lg-12">
                <div class="btn-wrap text-center">
                   @csrf
                  <button type="submit" class="cstm-btn solid-btn">Save</button>
                </div>
              </div>
             </div>


                     @if(!empty($request))
                            <input type="hidden" name="name" value="{{!empty($request->name) ? $request->name : ''}}">
                            <input type="hidden" name="contact_type" value="{{!empty($request->contact_type) ? $request->contact_type : ''}}">
                            <input type="hidden" name="message_text" value="{{!empty($request->message_text) ? $request->message_text : ''}}">
                            <input type="hidden" name="no_of_guest" value="{{!empty($request->no_of_guest) ? $request->no_of_guest : ''}}">
                            <input type="hidden" name="start_date" value="{{!empty($request->start_date) ? $request->start_date : ''}}">
                            <input type="hidden" name="request_for" value="{{!empty($request->request_for) ? $request->request_for : ''}}">
                            <input type="hidden" name="email" value="{{!empty($request->email) ? $request->email : ''}}">
                            <input type="hidden" name="phone_number" value="{{!empty($request->phone_number) ? $request->phone_number : ''}}">

                     @endif

           </form>
         </div>