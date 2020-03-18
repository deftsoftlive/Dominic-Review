@extends('layouts.admin')
@section('content')

<aside class="right-side">               
    <section class="content-header">
        <h1>
            Add
            <small>Booking</small>
        </h1>
    </section>

    @include('partials/removeMessage')
    @include('partials/message')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Create Booking on <a class="event-link" href="{{route('admin.viewEvent', ['slug' => $event->slug ])}}">{{$event->name}}</a>:</h3>
                    </div>
                    <form method="POST" id ="admin-add-booking" action="{{ route('admin.createBooking', ['slug' => $event->slug ]) }}" 
                    enctype="multipart/form-data" id="picreject" 
                    name="add_booking" class="needs-validation">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="username">Enter user email with which user is registered:</label>
                                        <input type="text" name="username" id="username">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button id="add_booking" type="submit" class="btn btn-primary">Submit</button>
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
$(document).ready(function(){
    $("#admin-add-booking").validate({
      rules: {
        username: {
            required: true,
            email:true,
            minlength: 2,
            maxlength: 50
        },
      }
});

    $('#add_booking').click(function(){
        $(this).attr('disabled', true);
        if($('#admin-add-booking').valid()){
            $('#admin-add-booking').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });

});
</script>
@endsection

