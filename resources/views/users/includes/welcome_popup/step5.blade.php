  <form id="fiveEventCreate" action="{{url(route('steps.second'))}}">
                  @csrf
  <div class="formFileds">
     <div class="row">
           <div class="col-md-12">
               {{textbox($errors, 'Season*', 'seasons')}}
           </div>
           <div class="col-md-6">
                

                 <div class="form-group "><label class="control-label">Colour*</label>
                     <input type="color" value="#fff" name="color" id="get" style="width: 46px; margin-left: -2px;">
                     <input type="text" readonly value="" class="form-control" name="colour" id="colour">
                 </div>
           </div>
           <div class="col-md-6">
               {{choosefile($errors, 'Event Picture*', 'event_picture')}}
           </div>

           <div class="col-md-12">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="agree" value="1" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">I agree to the Terms and Conditions for sharing my Event details with vendors.</label>
                </div>
           </div>
      
         </div>
</div>

         
          
            <div class="btn-wrap text-right">
            <button class="cstm-btn solid-btn btn-back-step" data-action="step4" data-step="4" type="button">Back</button>
                 <button class="cstm-btn solid-btn">Save</button>
            </div>
          




   







<input type="hidden" name="title" value="" id="fort_title">
<input type="hidden" name="event_type" value="" id="fort_event_type">
<input type="hidden" name="description" value="" id="fort_description">
<input type="hidden" name="location" value="" id="fort_location">
<input type="hidden" name="latitude" value="" id="fort_latitude">
<input type="hidden" name="longitude" value="" id="fort_longitude">
<input type="hidden" name="start_date" value="" id="fort_start_date">
<input type="hidden" name="start_time" value="" id="fort_start_time">
<input type="hidden" name="end_date" value="" id="fort_end_date">
<input type="hidden" name="end_time" value="" id="fort_end_time">
<input type="hidden" name="min_person" value="" id="fort_min_person">
<input type="hidden" name="max_person" value="" id="fort_max_person">
<input type="hidden" name="long_description" value="" id="fort_long_description">
<input type="hidden" name="event_budget" value="" id="fort_event_budget">

 

</form>