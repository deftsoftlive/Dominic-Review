@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Assign player to course</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/purchased-course')}}"><b>Purchased Courses</b></a></li>
                    <li class="breadcrumb-item">Assign player to course</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@if(Session::has('success'))
    <div class="alert_msg alert alert-success">
      <p>{{ Session::get('success') }} </p>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert_msg alert alert-danger">
      <p>{{ Session::get('error') }} </p>
    </div>
@endif
<a style="float:right;" href="{{url('/admin/purchased-course')}}" class="btn btn-primary">Back</a>
<br/><br/><br/>
<section class="content">
  <div class="row">
      <div class="col-12">
        <div class="card">

        <!-- /.card-header -->
        @include('admin.error_message')
 
          <div class="card-body">

              <form class="ch_course" action="{{route('save_course_for_player')}}" enctype="multipart/form-data">
                
                @csrf

                  <label class="control-label">Select Parent<span class="cst-upper-star">*</span></label>
                  @php 
                    $parents = DB::table('users')->where('role_id','2')->get(); 
                  @endphp

                  <select class="form-control" id="parent_id" name="parent">
                    <option disabled selected="" value="">Select Parent</option>
                    @foreach($parents as $sh)
                      <option value="{{$sh->id}}">@php echo getUsername($sh->id); @endphp</option>
                    @endforeach
                  </select>

                  <label class="control-label">Select Player</label>
                  <select class="form-control" id="player_id" name="player">
                    <option disabled selected="" value="">Select Player</option>
                  </select>

                  <label class="control-label">Cost/No Cost<span class="cst-upper-star">*</span></label>
                  <select class="form-control" id="cost_type" name="cost_type">
                    <option disabled selected="" value="">Select Cost Type</option>
                    <option value="Cost">Cost</option>
                    <option value="No Cost">No Cost</option>
                  </select>

                  <label class="control-label">Select Course Type<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="course_type" id="course_type">
                    <option disabled selected="" value="">Select Course Type</option>
                    <option value="normal">Standard Course</option>
                    <option value="paygo">Pay As You Go</option>
                  </select>

                  <div id="StandardCoursesDispaly">
                    <label class="control-label">Change Course<span class="cst-upper-star">*</span></label>
                    @php $courses = DB::table('courses')->where('status',1)->orderby('id','desc')->get(); @endphp
                    <select class="form-control" id="change_course" name="course">
                      <option disabled selected="" value="">Select Course</option>
                      @foreach($courses as $co)
                        <option value="{{$co->id}}">{{$co->title}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div id="PayAsYouCoursesDispaly" style="display: none;">
                    <label class="control-label">Change Pay As You Go Course<span class="cst-upper-star">*</span></label>       
                    @php $courses = \App\PayGoCourse::where(['status' => 1, 'type' => 156])->orderby('id','desc')->get(); @endphp
                    <select class="form-control" id="change_paygo_course" name="course">
                      <option disabled selected="" value="">Select Course</option>
                      @foreach($courses as $co)
                        @php 
                          $remainingSeats = 0;
                          $course_dates = \DB::table('paygocourse_dates')->where('course_id',$co->id)->where('display_course',1)->get();
                        @endphp
                        @foreach($course_dates as $date)
                          @if( strtotime( $date->course_date ) >= strtotime( date( 'Y-m-d' ) ) )
                            @php
                              $bookedDateCount = \App\PayGoCourseBookedDate::where(['course_id' => $co->id, 'date'=> $date->course_date])->count();
                              
                              $remainingSeats += (int)$date->seats - (int)$bookedDateCount;
                            @endphp
                          @endif
                        @endforeach
                        @if( $remainingSeats <= 0 )
                          <option value="{{$co->id}}" disabled>{{$co->title}}(Fully Booked)</option>
                        @else
                          <option value="{{$co->id}}">{{$co->title}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>

                  <!-- Pay go courses booking slots -->
                  <div id="paygo_course_slots" class="paygo-course-slots">
                          
                  </div>                     
                  
                  <div id="pay_meth">
                    <label class="control-label">Payment Method<span class="cst-upper-star">*</span></label>
                    <select class="form-control" name="payment_method">
                      <option disabled selected="" value="">Select Payment Method</option>
                      <option value="STRIPE">Stripe</option>
                      <option value="Wallet">Wallet</option>
                      <option value="Childcare">Childcare</option>
                    </select>
                  </div>

                <div class="card-footer pl-0">
                  <button type="submit" id="btnVanue" class="btn btn-primary">Submit</button>
                </div>
             </form>


            </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
     
@endsection

@section('scripts')
<script type="text/javascript">
$("#cost_type").change(function()
{
  var value1 = $(this).val(); 
  
  if(value1 == 'Cost')
  {
    $('#pay_meth').css('display','block');
  }
  else if(value1 == 'No Cost')
  {
    $('#pay_meth').css('display','none');
  } 

});





$('#course_type').on('change', function(){
  var val = $(this).val();
  console.log( val );
  if ( val == 'normal' ) {
    $('#StandardCoursesDispaly').show();
    $('#PayAsYouCoursesDispaly').hide();
    $('#paygo_course_slots').html('');
  }else if( val == 'paygo' ){
    $('#StandardCoursesDispaly').hide();
    $('#PayAsYouCoursesDispaly').show();
  }

});


// On click price add for pay as you go course
$(document).on("click",".price_add",function() {
  var priceArray = [];
  sum = 0;
  $(".price_add:checked").each(function () {
      var price = $(this).attr("price");
      priceArray.push(price);
  });
  $.each(priceArray,function(){sum+=parseFloat(this) || 0;});
  sum = sum.toFixed(2);
  $('#final_paygo_price').val(sum);
});
</script>
@endsection