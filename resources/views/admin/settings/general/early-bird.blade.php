@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Early Bird Management</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="{{url(route('admin_dashboard'))}}">
                      <i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item "><a href="{{ route($addLink) }}">View</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">Edit</a></li>
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

    <form role="form" method="post" id="homePageForm" action="" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="{{Request::route('id')}}">

        <!-- ********************************
        |
        |       EARLY BIRD MANAGEMENT
        | 
        |************************************ -->

        <!-- Banner -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>DATE & TIME MANAGEMENT</u></h5>
              <label class="control-label">Early Bird Date<span class="cst-upper-star">*</span></label>
              <input type="date" class="form-control" name="early_bird_date" value="{{ getAllValueWithMeta('early_bird_date', 'early-bird') }}"><br/>

              <label class="control-label">Early Bird Time<span class="cst-upper-star">*</span></label>
              <input type="time" class="form-control" name="early_bird_time" value="{{ getAllValueWithMeta('early_bird_time', 'early-bird') }}"><br/>
          </div>
        </div>

        <!-- Section - 1 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>DISCOUNT MANAGEMENT</u></h5>
             {{textbox($errors,'Tennis Discount Percentage <span class="cst-upper-star">*</span>','tennis_percentage',$tennis_percentage)}}

             {{textbox($errors,'Football Discount Percentage <span class="cst-upper-star">*</span>','football_percentage',$football_percentage)}}

             {{textbox($errors,'School Discount Percentage <span class="cst-upper-star">*</span>','school_percentage',$school_percentage)}}
          </div>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" id="homePageFormBtn" class="btn btn-primary">Submit</button>
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

