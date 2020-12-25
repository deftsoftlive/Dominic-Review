@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Contact Us</h5>
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
        |       Banners MANAGEMENT
        | 
        |************************************ -->

        <!-- Coach - My Players -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Coach - My Players</u></h5>
             {{textarea($errors,'Coach - My Players<span class="cst-upper-star">*</span>','coach_my_players',$coach_my_players)}}
          </div>
        </div>

        <!-- Coach - Notifications -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Coach - Notifications</u></h5>
             {{textarea($errors,'Coach - Notifications<span class="cst-upper-star">*</span>','coach_notifications',$coach_notifications)}}
          </div>
        </div>

        <!-- Coach - Goals -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Coach - Goals</u></h5>
             {{textarea($errors,'Coach - Goals<span class="cst-upper-star">*</span>','coach_goals',$coach_goals)}}
          </div>
        </div>

        <!-- Coach - Competitions -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Coach - Competitions</u></h5>
             {{textarea($errors,'Coach - Competitions<span class="cst-upper-star">*</span>','coach_competition',$coach_competition)}}
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

@section('scripts')
<script src="{{url('/admin-assets/js/validations/settings/homePageValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>
<script src="{{ asset('js/cke_config.js') }}"></script>

<script type="text/javascript">
    CKEDITOR.replace('coach_my_players', options);
    CKEDITOR.replace('coach_notifications', options);
    CKEDITOR.replace('coach_goals', options);
    CKEDITOR.replace('coach_competition', options);
</script>
@endsection