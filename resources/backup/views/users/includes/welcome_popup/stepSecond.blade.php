<form id="secondEventCreate">
  <div class="formFileds">
   <div class="row">
       <div class="col-md-6">
           {{datebox($errors, 'Start Date <i class="fas fa-info-circle" data-toggle="tooltip" title="Event Place!"></i>', 'start_date')}}
           
            <!--  <div class="form-group">
               <label>Event Anticipated Start Time <i class="fas fa-info-circle" data-toggle="tooltip" title="Event Place!"></i></label>
               <input type="time" name="start_time" id="start_time" class="form-control">
           </div> -->

            <div class="form-group">
            <label>Event Anticipated Start Time </label>
           <input type="text" id="start_time" value="2:30 PM" data-format="hh:mm A" class="input-small form-control" name="start_time">
         </div>
           </div>
         <div class="col-md-6">
           {{datebox($errors, 'End Date <i class="fas fa-info-circle" data-toggle="tooltip" title="Event Place!"></i>', 'end_date')}}
          <!-- <div class="form-group">
               <label>Event Anticipated End Time <i class="fas fa-info-circle" data-toggle="tooltip" title="Event Place!"></i></label>
               <input type="time" name="end_time" id="end_time" class="form-control">
           </div> -->

             <div class="form-group">
            <label>Event Anticipated End Time </label>
           <input type="text" id="end_time" value="2:30 PM" data-format="hh:mm A" class="input-small form-control" name="end_time">
         </div>
         </div>
           <div class="col-md-6">


           {{textbox($errors, 'Min Person <i class="fas fa-info-circle" data-toggle="tooltip" title="Event Place!"></i>', 'min_person')}}


           </div>
           <div class="col-md-6">
           {{textbox($errors, 'Max Person <i class="fas fa-info-circle" data-toggle="tooltip" title="Event Place!"></i>', 'max_person')}}
           </div>
        
</div>
</div>


            <div class="btn-wrap text-right">
              <button class="cstm-btn solid-btn btn-back-step" data-action="step1" data-step="1" type="button">Back</button>
              <button class="cstm-btn solid-btn">Next</button>
            </div>
          

  </form>