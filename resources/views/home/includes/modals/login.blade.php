
<!-- Modal -->
 
 <div class="modal fade" id="LoginModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
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