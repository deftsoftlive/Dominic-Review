        <div class="side-form-wrap">
                  <span class="side-form-icon"><i class="fas fa-envelope-open-text"></i></span>
                  <form class="side-form" id="sendMessageFormToVendor" action="{{url(route('ajax.requestForQuote',$vendor->id))}}">
                     @csrf
                     <h3 class="form-heading">Contact Vendor</h3>
                     <div class="form-group">
                        <input type="text" id="" class="form-control" placeholder="Enter your Name" name="name">
                        <span class="input-icon"><i class="fas fa-user"></i></span>
                     </div>
                     <div class="form-group">
                        <input type="text" id="" class="form-control" placeholder="Email" name="email">
                        <span class="input-icon"><i class="fas fa-user"></i></span>
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Phone" name="phone_number">
                        <span class="input-icon"><i class="fas fa-phone"></i></span>
                     </div>


                     <div class="form-group">
                        <label>Request For:</label>
                        <div class="custom-control custom-radio">
                           <input type="radio" id="requestType1" class="custom-control-input requestFor" name="request_for" value="1" checked>
                           <label class="custom-control-label" for="requestType1">Pricing</label>
                        </div>
                        <div class="custom-control custom-radio">
                           <input type="radio" id="requestType2" class="custom-control-input requestFor" name="request_for" value="2">
                           <label class="custom-control-label" for="requestType2">Create Custom Package</label>
                        </div>
                     </div>


                      <div id="request_for">
                        <div class="form-group">
                           <input type='text' class="form-control" id='datetimepicker1' placeholder="select date" name="start_date" />
                           <span class="input-icon"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <div class="form-group">
                           <input type="text" id="" class="form-control" placeholder="Number of guests" name="no_of_guest">
                           <span class="input-icon"><i class="fas fa-user-friends"></i></span>
                        </div>
                      </div>

                     <div class="form-group">
                        <textarea class="form-control" rows="4" id="comment" name="message_text" placeholder="Write your message"></textarea>                        
                     </div>
                     <div class="form-group">
                        <label>Preferred contact method:</label>
                        <div class="custom-control custom-radio">
                           <input type="radio" id="customRadio3" class="custom-control-input" name="contact_type" value="0" checked>
                           <label class="custom-control-label" for="customRadio3">Email</label>
                        </div>
                        <div class="custom-control custom-radio">
                           <input type="radio" id="customRadio4" class="custom-control-input" name="contact_type" value="1">
                           <label class="custom-control-label" for="customRadio4">Phone number</label>
                        </div>
                     </div>




                     <div class="btn-wrap text-center">
                        <button class="cstm-btn solid-btn">Send Request</button>
                     </div>

                     <div class="messageNotofications"></div>
                  </form>
@if(!empty($vendor))
   <input type="hidden" id="getUserUpcomingEvent" value="{{url(route('ajax.requestForQuote',$vendor->id))}}">
@endif
                  <input type="hidden" id="dataLogged" value="{{Auth::check() && Auth::user()->role == 'user' ? 1 : 0}}">
               </div>