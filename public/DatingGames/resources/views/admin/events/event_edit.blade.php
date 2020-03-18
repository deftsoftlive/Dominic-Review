@extends('layouts.admin')
@section('content')
<aside class="right-side">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Event
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Event</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form method="POST" action="{{ route('admin.updateEvent', ['slug' => $event->slug ]) }}" 
                    enctype="multipart/form-data" id="edit-event-form" 
                    name="edit-event-form" 
                    class="needs-validation">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="name">Event Name<span class="mandatory">*</span></label>
                                        <input type="text" value="{{$event->name}}" name="name" class="form-control" id="name" placeholder="Enter Event Name">
                                    </div>
                                </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="venue">Event Venue<span class="mandatory">*</span></label>
                                    <select name="venue" id="venue" class="form-control">
                                    @foreach($venues as $venue)
                                    <option value="{{$venue->id}}" {{ ($event->venue_id == $venue->id) ? 'selected' : '' }}>{{$venue->name}} ( {{$venue->address}}, {{$venue->postcode}} )</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="content">Event Desription<span class="mandatory">*</span></label>
                                    <textarea class="form-control" id="content"  name="content" required>{{$event->event_description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="date">Event Date<span class="mandatory">*</span></label>
                                    <input type="text" value="{{ Carbon\Carbon::parse($event->event_date)->Format('D dS-F-Y')}}" name="date" class="form-control" id="date" placeholder="Event Date">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="time">Event Time<span class="mandatory">*</span></label>
                                    <input value="{{ $event->event_time }}" name="time" class="form-control" id="time" placeholder="Event Time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="event_type" class="col-form-label text-md-right">{{ __('Event Type') }}<span class="mandatory">*</span></label></br>
                                    <input type="radio" value="MS" name="event_type" class="form-control" id="MS" {{ $event->event_type == 'MS' ? 'checked' : '' }} {{ empty($booking_status) ? '' : 'disabled'}}><label for="MS" >MS</label>
                                    <input type="radio" value="BS" name="event_type" class="form-control" id="BS" {{ $event->event_type == 'BS' ? 'checked' : '' }} {{ empty($booking_status) ? '' : 'disabled'}}><label for="BS">BS</label>
                                    <input type="radio" value="SSF" name="event_type" class="form-control" id="SSF" {{ $event->event_type == 'SSF' ? 'checked' : '' }} {{ empty($booking_status) ? '' : 'disabled'}}><label for="SSF">SSF</label>
                                    <input type="radio" value="SSM" name="event_type" class="form-control" id="SSM" {{ $event->event_type == 'SSM' ? 'checked' : '' }} {{ empty($booking_status) ? '' : 'disabled'}}><label for="SSM">SSM</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="seats">No. of M/F can participate<span class="mandatory">*</span></label>
                                    <input type="text" value="{{ $event->max_place }}" name="seats" class="form-control" id="seats" placeholder="No. of people can participate">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="price">Event Fee<span class="mandatory">*</span></label>
                                    <input type="text" value="{{ $event->price }}" name="price" class="form-control" id="price" placeholder="Event Fee">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="min_age">Minimum age required<span class="mandatory">*</span></label>
                                    <input type="text" value="{{ $event->min_age }}" name="min_age" class="form-control" id="min_age" placeholder="Minimum age required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="max_age">Maximum age limit<span class="mandatory">*</span></label>
                                    <input type="text" value="{{ $event->max_age }}" name="max_age" class="form-control" id="max_age" placeholder="Maximum age limit">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="custt-event" for="status">Event Status <span class="mandatory">*</span></label>
                                    <input required type="radio" class="form-control" name="status" id="status2" value="0"
                                    {{ $event->status == '0' ? 'checked' : '' }}><label for="status3"> Inactive </label>
                                    <input required type="radio" class="form-control" name="status" id="status1" value="1"
                                    {{ $event->status == '1' ? 'checked' : '' }}><label for="status1"> Active </label>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="duration">Event Duration<span class="mandatory">*</span></label>
                                    <select name="duration" id="duration" class="form-control">
                                    <option value="Half an Hour" {{ ($event->event_duration == 'Half an Hour') ? 'selected' : '' }}>Half an Hour</option>
                                    <option value="1 Hour" {{ ($event->event_duration == '1 Hour') ? 'selected' : '' }}>1 Hour</option>
                                    <option value="2 Hours" {{ ($event->event_duration == '2 Hours') ? 'selected' : '' }}>2 Hours</option>
                                    <option value="3 Hours" {{ ($event->event_duration == '3 Hours') ? 'selected' : '' }}>3 Hours</option>
                                    <option value="4 Hours" {{ ($event->event_duration == '4 Hours') ? 'selected' : '' }}>4 Hours</option>
                                    <option value="5 Hours" {{ ($event->event_duration == '5 Hours') ? 'selected' : '' }}>5 Hours</option>
                                    <option value="6 Hours" {{ ($event->event_duration == '6 Hours') ? 'selected' : '' }}>6 Hours</option>
                                    <option value="7 Hours" {{ ($event->event_duration == '7 Hours') ? 'selected' : '' }}>7 Hours</option>
                                    <option value="8 Hours" {{ ($event->event_duration == '8 Hours') ? 'selected' : '' }}>8 Hours</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button id="edit-event-form-button" type="button" class="btn btn-primary">Update Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </section>
</aside>
@endsection
@section('customScripts')
<script>
       var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        // filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        // filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        // filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
        filebrowserWindowWidth  : 800,
        filebrowserWindowHeight : 500,
        uiColor: '#00ccff',
        removePlugins: 'save, newpage',
      };
        CKEDITOR.replace( 'content', options );
</script>
@endsection
