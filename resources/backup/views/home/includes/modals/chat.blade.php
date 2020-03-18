




<!-- Modal -->
<div class="get_Deal modal fade" id="myModalDealDiscount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Get Deal & Discount</h4>
      </div>
      <div class="modal-body">
         <form id="getDealForm" action="{{url(route('get-deal-request'))}}">
            <div class="messageNotofications"></div>
            <input type="hidden" name="deal_id" value="">

            <div class="row">
                 <div class="col-md-6">
                      {{textbox($errors,'Name','name',$name)}}
                 </div>

                 <div class="col-md-6">
                      {{textbox($errors,'Email','email',$email)}}
                 </div>

                  <div class="col-md-6">
                      {{textbox($errors,'Phone Number','phone_number',$phone)}}
                 </div>
                 <div class="col-md-6">
                      {{datebox($errors,'Event Date','event_date',$event_date)}}
                 </div>
                  <div class="col-md-12">
                      {{textarea($errors,'Message','message')}}
                 </div>
                 <div class="col-md-12">
                  <div class="btn-wrap mt-3">
                      <button type="submit" class="cstm-btn solid-btn detail-btn pull-right">Submit</button>
                  </div>
                    
                </div>
            </div>
      </form>
      <div class="MessageChat"></div>
          </div>
           
    </div>
  </div>
</div>
