@extends('layouts.admin')
@section('content')
<aside class="right-side">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Event
            <small>Create</small>
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
                        <h3 class="box-title">Create Event</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.createEvent') }}" 
                    enctype="multipart/form-data" id="create-event-form" 
                    name="create-event-form" 
                    class="needs-validation">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6 col-sm-12">
                                 <div class="form-group">
                                <label for="name">Event Name<span class="mandatory">*</span></label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="Enter Event Name">
                            </div>
                        </div>
                         <div class="col-sm-6 col-sm-12">
                            <div class="form-group">
                                
                                <label for="venue">Event Venue<span class="mandatory">*</span></label>
                                <select name="venue" id="venue" class="form-control">
                                    @foreach($venues as $venue)
                                    <option value="{{$venue->id}}" {{ (old('venue') == $venue->id) ? 'selected' : '' }}>{{$venue->name}} ( {{$venue->address}}, {{$venue->postcode}} )</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="content">Event Desription<span class="mandatory">*</span></label>
                                    <textarea class="form-control" id="content"  name="content" required>{{ old('content') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-sm-12">
                                <div class="form-group">
                                    <label for="date">Event Date<span class="mandatory">*</span></label>
                                    <input value="{{ old('date') }}" name="date" class="form-control" id="date" placeholder="Event Date">
                                </div>
                            </div>
                            <div class="col-sm-6 col-sm-12">
                                <div class="form-group">
                                    <label for="time">Event Time<span class="mandatory">*</span></label>
                                    <input value="{{ old('time') }}" name="time" class="form-control" id="time" placeholder="Event Time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-sm-12">
                                <div class="form-group">
                                    <label for="event_type" class="col-form-label text-md-right">{{ __('Event Type') }}<span class="mandatory">*</span></label></br>
                                <input type="radio" value="MS" name="event_type" class="form-control" id="MS" {{ old('event_type') == 'MS' ? 'checked' : '' }} checked><label for="MS" >MS</label>
                                <input type="radio" value="BS" name="event_type" class="form-control" id="BS" {{ old('event_type') == 'BS' ? 'checked' : '' }}><label for="BS">BS</label>
                                <input type="radio" value="SSF" name="event_type" class="form-control" id="SSF" {{ old('event_type') == 'SSF' ? 'checked' : '' }} ><label for="SSF">SSF</label>
                                <input type="radio" value="SSM" name="event_type" class="form-control" id="SSM" {{ old('event_type') == 'SSM' ? 'checked' : '' }}><label for="SSM">SSM</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-sm-12">
                                <div class="form-group">
                                    <label for="seats">No. of M/F can participate<span class="mandatory">*</span></label>
                                    <input type="text" value="{{ old('seats') }}" name="seats" class="form-control" id="seats" placeholder="No. of people can participate" autocomplete>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-sm-12">
                                <div class="form-group">
                                    <label for="price">Event Fee<span class="mandatory">*</span></label>
                                    <input type="text" value="{{ old('price') }}" name="price" class="form-control" id="price" placeholder="Event Fee">
                                </div>
                            </div>
                            <div class="col-sm-6 col-sm-12">
                                <div class="form-group">
                                    <label for="min_age">Minimum age required<span class="mandatory">*</span></label>
                                    <input type="text" value="{{ old('min_age') }}" name="min_age" class="form-control" id="min_age" placeholder="Minimum age required" autocomplete>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-sm-12">
                                <div class="form-group">
                                    <label for="max_age">Maximum age limit<span class="mandatory">*</span></label>
                                    <input type="text" value="{{ old('max_age') }}" name="max_age" class="form-control" id="max_age" placeholder="Maximum age limit" autocomplete>
                                </div>
                            </div>
                            <div class="col-sm-6 col-sm-12">
                            <div class="form-group">
                                
                                <label for="duration">Event Duration<span class="mandatory">*</span></label>
                                <select name="duration" id="duration" class="form-control">
                                    <option value="Half an Hour" {{ (old('venue') == $venue->address) ? 'selected' : '' }}>Half an Hour</option>
                                    <option value="1 Hour" {{ (old('venue') == $venue->address) ? 'selected' : '' }}>1 Hour</option>
                                    <option value="2 Hours" {{ (old('venue') == $venue->address) ? 'selected' : '' }}>2 Hours</option>
                                    <option value="3 Hours" {{ (old('venue') == $venue->address) ? 'selected' : '' }}>3 Hours</option>
                                    <option value="4 Hours" {{ (old('venue') == $venue->address) ? 'selected' : '' }}>4 Hours</option>
                                    <option value="5 Hours" {{ (old('venue') == $venue->address) ? 'selected' : '' }}>5 Hours</option>
                                    <option value="6 Hours" {{ (old('venue') == $venue->address) ? 'selected' : '' }}>6 Hours</option>
                                    <option value="7 Hours" {{ (old('venue') == $venue->address) ? 'selected' : '' }}>7 Hours</option>
                                    <option value="8 Hours" {{ (old('venue') == $venue->address) ? 'selected' : '' }}>8 Hours</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="box-footer">
                            <button id="create-event-form-button" type="button" class="btn btn-primary">Create Event</button>
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
