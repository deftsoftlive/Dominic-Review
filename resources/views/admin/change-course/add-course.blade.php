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

                  <label class="control-label">Change Course<span class="cst-upper-star">*</span></label>
                  @php $courses = DB::table('courses')->where('status',1)->orderby('id','desc')->get(); @endphp
                  <select class="form-control" id="change_course" name="course">
                    <option disabled selected="" value="">Select Course</option>
                    @foreach($courses as $co)
                      <option value="{{$co->id}}">{{$co->title}}</option>
                    @endforeach
                  </select>
                  
                  <div id="pay_meth">
                    <label class="control-label">Payment Method</label>
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
</script>
@endsection