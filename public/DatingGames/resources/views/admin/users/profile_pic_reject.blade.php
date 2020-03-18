@extends('layouts.admin')
@section('content')

<aside class="right-side">               
    <section class="content-header">
        <h1>
            Users
            <small>Listing</small>
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
                        <h3 class="box-title">Reason for profile pic rejection:</h3>
                    </div>
                    <form method="POST" id ="admin-reject-pic" action="{{ route('admin.rejected', ['slug' => $user->slug ]) }}" 
                    enctype="multipart/form-data" id="picreject" 
                    name="picreject" class="needs-validation">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="reason">Reason for Profile pic rejection:</label>
                                        <textarea name="reason" class="form-control" id="reason">{{old('reason')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button id="reason_pic" type="submit" class="btn btn-primary">Submit</button>
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
    $("#admin-reject-pic").validate({
      rules: {
        reason: {
            required: true,
            minlength: 10,
            maxlength: 100
        },
      }
});

    $('#reason_pic').click(function(){
        $(this).attr('disabled', true);
        if($('#admin-reject-pic').valid()){
            $('#admin-reject-pic').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });

});
</script>
@endsection

