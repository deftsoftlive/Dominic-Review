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

              @php 
                $early_bird_enable = getAllValueWithMeta('check_early_bird', 'early-bird');
              @endphp
              <div class="form-group">
                <label class="label-file control-label">Enable/Disable - Course Listing</label>
                <select name="check_early_bird" class="select-player">
                  <option value="1" {{$early_bird_enable == '1' ? 'selected' : ''}}>Enable</option>
                  <option value="0" {{$early_bird_enable == '0' ? 'selected' : ''}}>Disable</option>
                </select>
              </div><br/>
          </div>
        </div>

        <!-- Section - 1 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>DISCOUNT MANAGEMENT</u></h5>
              @php 
                $tennis_disc = getAllValueWithMeta('check_tennis_percentage', 'early-bird');
                $football_disc = getAllValueWithMeta('check_football_percentage', 'early-bird');
                $school_disc = getAllValueWithMeta('check_school_percentage', 'early-bird');
              @endphp

             {{textbox($errors,'Tennis Discount Percentage <span class="cst-upper-star">*</span>','tennis_percentage',$tennis_percentage)}}
             <!-- <input type="checkbox" name="check_tennis_percentage" value="1" {{$tennis_disc == '1' ? 'checked' : ''}}> -->
             
             
              <div class="form-group">
                <label class="label-file control-label">Enable/Disable - Tennis Discount</label>
                <select name="check_tennis_percentage" class="select-player">
                  <option value="1" {{$tennis_disc == '1' ? 'selected' : ''}}>Enable</option>
                  <option value="0" {{$tennis_disc == '0' ? 'selected' : ''}}>Disable</option>
                </select>
              </div>

              <br/><br/>
             {{textbox($errors,'Football Discount Percentage <span class="cst-upper-star">*</span>','football_percentage',$football_percentage)}}
             <!-- <input type="checkbox" name="check_football_percentage" value="1" {{$football_disc == '' ? 'checked' : ''}}> -->

              <div class="form-group">
                <label class="label-file control-label">Enable/Disable - Football Discount</label>
                <select name="check_football_percentage" class="select-player">
                  <option value="1" {{$football_disc == '1' ? 'selected' : ''}}>Enable</option>
                  <option value="0" {{$football_disc == '0' ? 'selected' : ''}}>Disable</option>
                </select>
              </div>

              <br/><br/>

             {{textbox($errors,'School Discount Percentage <span class="cst-upper-star">*</span>','school_percentage',$school_percentage)}}
             <!-- <input type="checkbox" name="check_school_percentage" value="1" {{$school_disc == '' ? 'checked' : ''}}> -->

              <div class="form-group">
                <label class="label-file control-label">Enable/Disable - Football Discount</label>
                <select name="check_school_percentage" class="select-player">
                  <option value="1" {{$school_disc == '1' ? 'selected' : ''}}>Enable</option>
                  <option value="0" {{$school_disc == '0' ? 'selected' : ''}}>Disable</option>
                </select>
              </div>
            <br/>

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

