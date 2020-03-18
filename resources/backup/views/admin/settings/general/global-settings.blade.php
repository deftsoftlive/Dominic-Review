@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
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
       
 
            <div class="card-body">

@include('admin.error_message')

<div class="col-md-12">

  <form role="form" method="post" id="globalSettingsForm" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="type" value="global-settings">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Google Api Key</h5>
           {{textbox($errors,'Google Api Key*', 'google_api_key', getAllValueWithMeta('google_api_key', 'global-settings'))}}
        </div>
      </div>

       <div class="card">
        <div class="card-body">
          <h5 class="card-title">Weather Api Key</h5>
           {{textbox($errors,'Weather Api Key*', 'weather_api_key', getAllValueWithMeta('weather_api_key', 'global-settings'))}}
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" id="globalSettingsFormBtn" class="btn btn-primary">Submit</button>
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
<script src="{{URL::asset('/admin-assets/js/validations/settings/globalSettingsValidation.js')}}"></script>
<script src="{{URL::asset('/js/validations/imageShow.js')}}"></script>
@endsection