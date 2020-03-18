<!-- Modal -->
<div class="modal fade" id="GetQuoteModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Request For Quote <span id="busines_title"></span></h4>
      </div>
      <div class="modal-body">
         <form id="loginForm" method="POST" action="{{ url(route('ajax_login_popup')) }}">
            <div class="messageNotofications"></div>
            <input type="hidden" name="business_id" value="">

            <div class="row">
                 @csrf

                 <div class="col-md-12">
                     <div class="side-form-wrap">
                  
                  <form class="side-form" id="QuoteRequest">
                    
                     <div class="form-group">
                               <input type="text" id="" class="form-control" placeholder="Enter your Name">
                               <span class="input-icon"><i class="fas fa-user"></i></span>
                     </div>
                     <div class="form-group">
                             <input type="text" id="" class="form-control" placeholder="Email">
                             <span class="input-icon"><i class="fas fa-user"></i></span>
                     </div>
                     <div class="form-group">
                             <input type="text" id="" class="form-control" placeholder="Phone">
                             <span class="input-icon"><i class="fas fa-phone"></i></span>
                     </div>
                     <div class="form-group">
                             <input type='text' class="form-control" id='datetimepicker1' placeholder="select date" />
                             <span class="input-icon"><i class="fas fa-calendar-alt"></i></span>
                     </div>
                     <div class="form-group">
                             <input type="text" id="" class="form-control" placeholder="Number of guests">
                             <span class="input-icon"><i class="fas fa-user-friends"></i></span>
                     </div>
                     <div class="form-group">
                             <textarea class="form-control" rows="4" id="comment" placeholder="Write your message"></textarea>                        
                     </div>
                     <div class="form-group">
                            <label>Preferred contact method:</label>
                            <div class="custom-control custom-radio">
                               <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                               <label class="custom-control-label" for="customRadio1">Email</label>
                            </div>
                            <div class="custom-control custom-radio">
                               <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                               <label class="custom-control-label" for="customRadio2">Phone number</label>
                            </div>
                     </div>
                     <div class="btn-wrap text-center">
                        <a href="javascript:void(0);" class="cstm-btn solid-btn">Request Pricing</a>
                     </div>
                  </form>
                </div>
            </div>
      </form>
          </div>
           
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="LoginModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Contact Vendor <span id="busines_title"></span></h4>
      </div>
      <div class="modal-body">
         <form id="loginForm" method="POST" action="{{ url(route('ajax_login_popup')) }}">
            <div class="messageNotofications"></div>
            <input type="hidden" name="deal_id" value="">

            <div class="row">
                 @csrf

                 <div class="col-md-12">
                      {{textbox($errors,'Email','email')}}
                 </div>

                  <div class="col-md-12">
                      {{password($errors,'Password','password')}}
                 </div>
               
                 <div class="col-md-12">
                    <button type="submit" class="cstm-btn solid-btn detail-btn pull-right">Submit</button>

                    
                </div>
            </div>
      </form>
          </div>
           
    </div>
  </div>
</div>