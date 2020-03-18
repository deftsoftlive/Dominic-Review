  <form id="forthEventCreate" action="{{url(route('steps.second'))}}">
                  @csrf
                  <div class="formFileds">
     <div class="row">
        <div class="col-md-12">
           {{textarea($errors, 'Long Description*', 'long_description')}}
           </div>
           <div class="col-md-12">
           {{textbox($errors, 'Event Budget*', 'event_budget')}}
           </div>

           
         </div>
</div>

         
          
            <div class="btn-wrap text-right">
            <button class="cstm-btn solid-btn btn-back-step" data-action="step3" data-step="3" type="button">Back</button>
                 <button class="cstm-btn solid-btn">Next</button>
            </div>
          

 
 




</form>