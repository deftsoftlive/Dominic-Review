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

      <!-- google api key -->
   <!--    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Google Api Key</h5>
           {{textbox($errors,'Google Api Key*', 'google_api_key', getAllValueWithMeta('google_api_key', 'global-settings'))}}
        </div>
      </div> -->

    <!-- weather api key -->
      <!--  <div class="card">
        <div class="card-body">
          <h5 class="card-title">Weather Api Key</h5>
           {{textbox($errors,'Weather Api Key*', 'weather_api_key', getAllValueWithMeta('weather_api_key', 'global-settings'))}}
        </div>
      </div> -->

      <!-- Taxjar api key -->
      <!--  <div class="card">
        <div class="card-body">
          <h5 class="card-title">Taxjar Api Key</h5>
           {{textbox($errors,'Taxjar Api Key*', 'taxjar_api_key', getAllValueWithMeta('taxjar_api_key', 'global-settings'))}}
        </div>
      </div> -->


<!-- Fee -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Fee</h5>
           	
<div class="row">
<!--   <div class="col-md-6">
   <div class="card">
        <div class="card-body">
          <h5 class="card-title">Commission Fee</h5>

	            <label>Commission Fee Type</label>
	            <div class="custom-control custom-radio mb-1">
			        <input type="radio" id="PriceType1" name="commission_fee_type" value="0" class="custom-control-input" {{ getAllValueWithMeta('commission_fee_type', 'global-settings') === '0' || getAllValueWithMeta('commission_fee_type', 'global-settings') !== '1' ? 'checked' : '' }} />
			        <label class="custom-control-label" for="PriceType1">Percent</label>
			    </div>

		       <div class="custom-control custom-radio">
		        <input type="radio" id="PriceType" name="commission_fee_type" value="1" class="custom-control-input" {{ getAllValueWithMeta('commission_fee_type', 'global-settings') === '1' ? 'checked' : '' }} />
		        <label class="custom-control-label" for="PriceType">Direct</label>
		      </div>

		       {{textbox($errors, 'Coomission Fee Amount*', 'commission_fee_amount', getAllValueWithMeta('commission_fee_amount', 'global-settings'))}}

        </div>
      </div>
    </div> -->

      <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Service Fee</h5>
          	<!-- <label>Service Fee Type</label> -->
	           <!--  <div class="custom-control custom-radio mb-1">
			        <input type="radio" id="PriceType1s" name="service_fee_type" value="0" class="custom-control-input" {{ getAllValueWithMeta('service_fee_type', 'global-settings') === '0' || getAllValueWithMeta('service_fee_type', 'global-settings') !== '1' ? 'checked' : '' }} />
			        <label class="custom-control-label" for="PriceType1s">Percent</label>
			    </div> -->

		      <!--  <div class="custom-control custom-radio">
		        <input type="radio" id="PriceTypes" name="service_fee_type" value="1" class="custom-control-input" {{ getAllValueWithMeta('service_fee_type', 'global-settings') === '1' ? 'checked' : '' }} />
		        <label class="custom-control-label" for="PriceTypes">Direct</label>
		      </div> -->

		       {{textbox($errors, 'Service Fee Amount*', 'service_fee_amount', getAllValueWithMeta('service_fee_amount', 'global-settings'))}}

        </div>
      </div>
      </div>

  
</div>
     
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
<script src="{{url('/admin-assets/js/validations/settings/globalSettingsValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>
@endsection