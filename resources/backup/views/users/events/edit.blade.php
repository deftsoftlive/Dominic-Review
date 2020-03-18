@extends('users.layouts.layout')
@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Edit Event</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="{{ route('user_events') }}">Events</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">Edit Event</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
        <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
       @include('admin.error_message')
            <div class="card-body">

<div class="col-md-12">

  <form role="form" method="post" id="UserEventForm" enctype="multipart/form-data">
    @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
           {{textbox($errors, 'Title*', 'title', $user_event->title)}}
         </div>

          <div class="col-md-12">
           {{textarea($errors, 'Short Description*', 'description', $user_event->description)}}
           </div>
          <div class="col-md-12">
           {{textarea($errors, 'Long Description*', 'long_description', $user_event->long_description)}}
           </div>
           <div class="col-md-6">
           {{datebox($errors, 'Start Date*', 'start_date', date('Y-m-d',strtotime($user_event->start_date)))}}
           </div>
          <div class="col-md-6">
           {{datebox($errors, 'End Date*', 'end_date', date('Y-m-d',strtotime($user_event->end_date)))}}
           </div>


           <div class="col-md-6">

             <div class="form-group">
                 <label>Event Anticipated Start Time </label>
                    <input type="text" id="start_time" value="{{$user_event->start_time}}" data-format="hh:mm A" class="input-small" name="start_time">
                    <p class="error">{{$errors->first('start_time')}}</p>
              </div>
           </div>

           <div class="col-md-6">
              <div class="form-group">
                 <label>Event Anticipated End Time </label>
                    <input type="text" id="end_time" value="{{$user_event->end_time}}" data-format="hh:mm A" class="input-small" name="end_time">
                    <p class="error">{{$errors->first('end_time')}}</p>
              </div>
           </div>



           <div class="col-md-6">
           {{textbox($errors, 'Min Person*', 'min_person', $user_event->min_person)}}
           </div>
           <div class="col-md-6">
           {{textbox($errors, 'Max Person*', 'max_person', $user_event->max_person)}}
           </div>
         <div class="col-md-12">
           {{textbox($errors, 'Address*', 'location', $user_event->location)}}
           </div>
         <div class="col-md-6" style="display: none">
           {{textbox($errors, 'Latitude*', 'latitude', $user_event->latitude)}}
           </div>
         <div class="col-md-6" style="display: none">
           {{textbox($errors, 'Longitude*', 'longitude', $user_event->longitude)}}
         </div>

         <input type="hidden" value="{{$user_event->event_type}}" id="sel_eve_id" />
         <input type="hidden" value="{{json_encode($user_event->eventCategories->pluck('key_value'))}}" id="sel_cats" />

         <div class="col-md-6">
           <div class="form-group">
            <label>Event Type*</label>
               <select class="form-control select2" id="event_type" name="event_type">
                  <option value="">Select</option>
                  @foreach($events as $event)
                  <option {{ $user_event->event_type == $event->id ? 'selected' : '' }} value="{{$event->id}}">{{$event->name}}</option>
                  @endforeach
               </select>
            </div>
         </div>
         <div class="col-md-6">
          <div class="form-group">
            <label>Categories*</label>
               <select class="form-control select2" id="event_categories" multiple="multiple" name="event_categories[]">
               </select>
            </div>
           <!-- {{textbox($errors, 'Categories*', 'categories')}} -->
         </div>




           <div class="col-md-6">
           {{textbox($errors, 'Event Budget*', 'event_budget', $user_event->event_budget)}}
           </div>

            <div class="col-md-6">
           {{textbox($errors, 'Seasons*', 'seasons', $user_event->seasons)}}
           </div>
           <div class="col-md-6">
           {{textarea($errors, 'Notpad*', 'notepad', $user_event->notepad)}}
           </div>
           <div class="col-md-6">
           {{textarea($errors, 'Ideas*', 'ideas', $user_event->ideas)}}
           </div>
         <div class="col-md-6">
                

                 <div class="form-group "><label class="control-label">Colour*</label>
                     <input type="color" value="{{$user_event->colour}}" name="color" id="get" style="width: 46px; margin-left: -2px;">
                     <input type="text" readonly value="{{$user_event->colour}}" class="form-control" name="colour" id="colour">
                 </div>
           </div>

            <div class="col-md-6">
           {{choosefile($errors, 'Event Image*', 'event_picture')}}
           </div>
@if($user_event->event_picture !="")
<div class="col-md-12">
 <img src="{{url($user_event->event_picture)}}" width="120">

</div>

@endif








      </div>
    </div>

      <div class="card-footer">
        <button type="submit" id="UserEventFormBtn" class="btn btn-primary">Update</button>
      </div>
 </form>

</div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

     
@endsection



@section('scripts')
<script src="{{url('clockface/js/clockface.js')}}" type="text/javascript"></script>
<script src="{{url('/js/setLatLong.js')}}"></script>
<script src="{{url('/js/validations/userEventValidation.js')}}"></script>
<script type="text/javascript">

  $("body").on('change','#get',function(){
     var val = $( this ).val();
     $("body").find("#colour").val(val);
});



$('#start_time').clockface();
$('#end_time').clockface();



  $('#event_categories').select2({ 
    closeOnSelect: false
   });


$('#event_categories').on('select2:select', function (e) {
    $(this).parent().find('label').eq(1).css('display', 'none');
});

$('select[name="event_type"]').change(function() {
    const selectedEvent = $(this).children("option:selected").val();
    $('#event_categories').empty();
     getCat(selectedEvent);
});

function getCat(selectedEvent) {
  $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{route('user_get_event_categories')}}",
        type: "post",
        dataType: "JSON",
        data: { '_token': $('meta[name="csrf-token"]').attr('content'), 'id': selectedEvent },
        success: function(res)
        {
          $.each(res.category_variation, function(key, value) {
            $('#event_categories')
            .append($("<option></option>")
            .attr("value", value.category.id)
            .text(value.category.label)); 
          });
          setTimeout(() => {
            $('#event_categories').val(JSON.parse($('#sel_cats').val()));
            $('#event_categories').trigger('change');
          }, 100)
        },
        error: function(err) {
            console.log(err);
        }
    });
}
getCat($('#sel_eve_id').val());
</script>
@endsection


