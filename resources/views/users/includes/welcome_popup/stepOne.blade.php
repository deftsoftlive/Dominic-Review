<form id="firstEventCreate">
  <div class="formFileds">
       <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Event Type <i class="fas fa-info-circle" data-toggle="tooltip" title="Event Type"></i></label>
              <div class="input-field-wrap">
                   <select class="form-control select2" id="event_type" name="event_type" data-action="{{route('user_get_event_category')}}">
                  <option value="">Select</option>
                  <?php $VendorEvents = \App\Event::where('status',1)->orderBy('name','ASC')->get(); ?>
                  @foreach($VendorEvents as $event)
                    <option value="{{$event->id}}">{{$event->name}}</option>
                  @endforeach
               </select>
               </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label>Event Title <i class="fas fa-info-circle" data-toggle="tooltip" title="Event Title!"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" name="title" id="title">
            </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Short description <i class="fas fa-info-circle" data-toggle="tooltip" title="Short Description!"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="description" name="description">
            </div>
            </div>
          </div>
         <div class="col-lg-12">
              <div class="form-group">
                <label>Event Place <i class="fas fa-info-circle" data-toggle="tooltip" title="Event Place!"></i></label>
                <div class="input-field-wrap">
                <input type="text" class="form-control" id="location" name="location" value="test">
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
              </div>
            </div>
          </div>

        </div>
      </div>
        
          
            <div class="btn-wrap text-right">
 
              <button class="cstm-btn solid-btn">Next</button>
            </div>
           
  </form>