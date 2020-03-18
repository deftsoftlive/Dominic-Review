  <form id="firstEventCreate" action="{{url(route('steps.second'))}}">
                  @csrf
<div class="row">

      
          <div class="col-md-12">
           <div class="form-group">
            <label>Event Type*</label>
               <select class="form-control select2" id="event_type" name="event_type">
                  <option value="">Select</option>
                  <?php $VendorEvents = \App\Event::where('status',1)->orderBy('name','ASC')->get(); ?>
                  @foreach($VendorEvents as $event)
                  <option value="{{$event->id}}">{{$event->name}}</option>
                  @endforeach
               </select>
            </div>
         </div>
         


           <div class="col-md-12">
           {{textbox($errors, 'Event Title*', 'title')}}
           </div>
           <div class="col-md-12">
           {{textarea($errors, 'Description*', 'description')}}
           </div>

            <div class="col-md-12">
           {{textbox($errors, 'Address*', 'location')}}
           </div>

             <div class="col-md-6" style="display: none">
           {{textbox($errors, 'Latitude*', 'latitude')}}
           </div>
         <div class="col-md-6" style="display: none">
           {{textbox($errors, 'Longitude*', 'longitude')}}
         </div>
 

            <div class="col-md-12">
               <button class="btn pull-right">Next</button>
           </div>




      </div>

</form>