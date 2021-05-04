@extends('layouts.admin')
 
@section('content')

      <div class="page-header">
          <div class="page-block">
              <div class="row align-items-center">
                  <div class="col-md-12">
                      <div class="page-header-title">
                          <h5 class="m-b-10">Add Money</h5>
                      </div>
                      <ul class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="{{route('admin.wallet')}}">Wallet Listing</a></li>
                          <li class="breadcrumb-item"><a href="">Add Money</a></li>
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

              <form role="form" action="{{route('admin.credit.wallet')}}" method="post" id="AddMoneyWalletAdmin" enctype="multipart/form-data">
                @csrf  
                  <div class="form-group">
                    <label class="control-label">Select User/Coach<span class="cst-upper-star">*</span></label>
                    <select id="SelectUserCoach" name="user_type" class="form-control event-dropdown">
                        <option value="User" selected>User</option>                        
                        <option value="Coach">Coach</option>                        
                    </select>
                  </div>

                  <div class="form-group" id="UserSection">
                    <label class="control-label">Select User<span class="cst-upper-star">*</span></label>
                    <select id="SelectUserWallet" name="user_id" class="form-control event-dropdown">
                      <option selected="" disabled="">Select User</option>
                        @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}} ({{$user->email}})</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group" id="CoachSection" style="display: none;">
                    <label class="control-label">Select Coach<span class="cst-upper-star">*</span></label>
                    <select id="SelectUserWallet" name="user_id" class="form-control event-dropdown">
                      <option selected="" disabled="">Select Coach</option>
                        @foreach($coaches as $coach)
                          <option value="{{$coach->id}}">{{$coach->name}} ({{$coach->email}})</option>
                        @endforeach
                    </select>
                  </div>

                  {{textbox($errors,'Add Amount<span class="cst-upper-star">*</span>','money_amount')}}

                <div class="card-footer">
                  <button type="submit" id="AddMoneyWalletAdminBtn" class="btn btn-primary">Add</button>
                </div>
             </form>

            </div>

            </div>
          </div>
        </div>
      </div>
    </section>
     
@endsection


@section('scripts')
<script type="text/javascript">

  $("#SelectUserWallet").chosen({no_results_text: "Oops, nothing found!"}); 

/*validation for credit wallet*/
$(document).ready(function (){
  $('#AddMoneyWalletAdmin').validate({
      rules: {
        user_id: {
          required: true,
        },
        money_amount: {
          required: true,
          // digits: true,
          // minlength: 1,
          // maxlength: 5,
        }
    },
    messages:{
        money_amount:{required:"This field is required."},
        
    },
       
      submitHandler: function(form) {
        $("#AddMoneyWalletAdminBtn").attr("disabled", true);
        form.submit();
    }
  });
});

$('#SelectUserCoach').on('change', function(){
  var val = $(this).val();
  if ( val == 'User' ) {
    $('#UserSection').show();
    $('#CoachSection').hide();
  }else if( val == 'Coach' ){
    $('#UserSection').hide();
    $('#CoachSection').show();
  }

});
</script>
@endsection