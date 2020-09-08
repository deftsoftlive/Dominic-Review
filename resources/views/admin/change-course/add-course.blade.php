@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Assign course to player</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/purchased-course')}}"><b>Purchased Courses</b></a></li>
                    <li class="breadcrumb-item">Assign course to player</li>
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

              <form action="{{route('save_course_for_player')}}" enctype="multipart/form-data">
                
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
                  <br/>

                  <label class="control-label">Select Player<span class="cst-upper-star">*</span></label>
                  <select class="form-control" id="player_id" name="player">
                    <option disabled selected="" value="">Select Player</option>
                  </select>
                  <br/>

                  <label class="control-label">Change Course<span class="cst-upper-star">*</span></label>
                  @php $courses = DB::table('courses')->where('status',1)->orderby('id','desc')->get(); @endphp
                  <select class="form-control" name="course">
                    <option disabled selected="" value="">Select Course</option>
                    @foreach($courses as $co)
                      <option value="{{$co->id}}">{{$co->title}}</option>
                    @endforeach
                  </select>
                  <br/>
                  
                  <label class="control-label">Payment Method<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="payment_method">
                    <option disabled selected="" value="">Select Payment Method</option>
                    <option value="STRIPE">Stripe</option>
                    <option value="Wallet">Wallet</option>
                    <option value="Childcare">Childcare</option>
                  </select>
                  <br/>

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