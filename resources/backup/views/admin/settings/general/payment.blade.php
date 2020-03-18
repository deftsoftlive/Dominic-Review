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

<?php
  $arr =  json_decode( getAllValueWithMeta('paypal_credentials', 'paypal-credentials'));

  $mode = !empty($arr) && !empty($arr->mode) ? $arr->mode : '';
  
  $sandbox_username = !empty($arr) && !empty($arr->sandbox_username) ? $arr->sandbox_username : '';
  $sandbox_password = !empty($arr) && !empty($arr->sandbox_password) ? $arr->sandbox_password : '';
  $sandbox_clientId = !empty($arr) && !empty($arr->sandbox_clientId) ? $arr->sandbox_clientId : '';
  $sandbox_secret = !empty($arr) && !empty($arr->sandbox_secret) ? $arr->sandbox_secret : '';

  $live_username = !empty($arr) && !empty($arr->live_username) ? $arr->live_username : '';
  $live_password = !empty($arr) && !empty($arr->live_password) ? $arr->live_password : '';
  $live_clientId = !empty($arr) && !empty($arr->live_clientId) ? $arr->live_clientId : '';
  $live_secret = !empty($arr) && !empty($arr->live_secret) ? $arr->live_secret : '';

  $arrStripe =  json_decode(getAllValueWithMeta('stripe_credentials', 'stripe-credentials'));

  $modeStripe = !empty($arrStripe) && !empty($arrStripe->mode) ? $arrStripe->mode : '';


 
  $test_sk = !empty($arrStripe) && !empty($arrStripe->test_sk) ? $arrStripe->test_sk : '';
  $test_pk = !empty($arrStripe) && !empty($arrStripe->test_pk) ? $arrStripe->test_pk : '';
  $test_client_id = !empty($arrStripe) && !empty($arrStripe->test_client_id) ? $arrStripe->test_client_id : '';

  $live_sk = !empty($arrStripe) && !empty($arrStripe->live_sk) ? $arrStripe->live_sk : '';
  $live_pk = !empty($arrStripe) && !empty($arrStripe->live_pk) ? $arrStripe->live_pk : '';
  $live_client_id = !empty($arrStripe) && !empty($arrStripe->live_client_id) ? $arrStripe->live_client_id : '';
?>

  <div class="row">
    <div class="col-12">
      <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
         @include('admin.error_message')
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Paypal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Stripe</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
            <h5 class="card-title">Paypal Settings</h5>
              
              <form method="POST" id="paypalCreadentialsForm">
                  @csrf
                  <input type="hidden" name="type" value="paypal-credentials">
                  <input type="hidden" name="key" value="paypal_credentials"/>

                  <div class="custom-switch flex-end">
        <!-- <input type="checkbox" class="custom-control-input" id="customSwitch1" name="mode" id="mode" {{ $mode ? 'checked' : ''}} /> -->
       
      
      <label class="custom-switch-label" for="customSwitch1" id="mode_txt">{{ $mode ? 'Live Mode' : 'Sandbox Mode'}}</label>
      <input type="checkbox" class="switch_btn" id="customSwitch1" name="mode" id="mode" {{ $mode ? 'checked' : ''}} />
    

        <!-- <label class="custom-control-label" for="customSwitch1" id="mode_txt">{{ $mode ? 'Live' : 'Sandbox'}}</label> -->
      </div>

<div class="row">
  <div class="col-md-6">
   <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sandbox Creadentials</h5>
           {{textbox($errors,'Sandbox User Name*', 'sandbox_username', $sandbox_username)}}
           {{textbox($errors,'Sandbox Password*', 'sandbox_password', $sandbox_password)}}
           {{textbox($errors,'Sandbox Client Id*', 'sandbox_clientId', $sandbox_clientId)}}
           {{textbox($errors,'Sandbox Secret*', 'sandbox_secret', $sandbox_secret)}}
        </div>
      </div>
    </div>

      <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Live Creadentials</h5>
           {{textbox($errors,'Live User Name*', 'live_username', $live_username)}}
           {{textbox($errors,'Live Password*', 'live_password', $live_password)}}
           {{textbox($errors,'Live Client Id*', 'live_clientId', $live_clientId)}}
           {{textbox($errors,'Live Secret*', 'live_secret', $live_secret)}}
        </div>
      </div>
      </div>

  
</div>
     

       

      <div class="card-footer">
        <button type="submit" id="paypalCreadentialsFormBtn" class="btn btn-primary">Submit</button>
      </div>
 </form>

          </div>
          <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
            <h5 class="card-title">Stripe Settings</h5>
                
              <form method="POST" id="stripeCreadentialsForm">
      @csrf
      <input type="hidden" name="type" value="stripe-credentials"/>
      <input type="hidden" name="key" value="stripe_credentials"/>

      <div class="custom-switch flex-end">      
        <label class="custom-switch-label" for="customSwitch2" id="mode_stripe_txt">{{ $modeStripe ? 'Live Mode' : 'Sandbox Mode'}}</label>
        <input type="checkbox" class="switch_btn" id="customSwitch2" name="mode" id="mode_stipe" {{ $modeStripe ? 'checked' : ''}} />
      </div>

<div class="row">
  <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sandbox Creadentials</h5>
           {{textbox($errors,'Sandbox Secret*', 'test_sk', $test_sk)}}
           {{textbox($errors,'Sandbox Public*', 'test_pk', $test_pk)}}
           {{textbox($errors,'Client Key*', 'test_client_id', $test_client_id)}}
        </div>
      </div>
    </div>
<div class="col-md-6">
       <div class="card">
        <div class="card-body">
          <h5 class="card-title">Live Creadentials</h5>
           {{textbox($errors,'Live Secret*', 'live_sk', $live_sk)}}
           {{textbox($errors,'Live Public*', 'live_pk', $live_pk)}}
           {{textbox($errors,'Live Public*', 'live_client_id', $live_client_id)}}
        </div>
      </div>
    </div>
    </div>

      <div class="card-footer">
        <button type="submit" id="stripeCreadentialsFormBtn" class="btn btn-primary">Submit</button>
      </div>
 </form>

          </div>
        </div>
      </div>
    </div>
  </div>
     
@endsection

@section('scripts')
<script src="{{url('/admin-assets/js/validations/settings/paypalCreadentialsPageValidation.js')}}"></script>
<script src="{{url('/admin-assets/js/validations/settings/stripeCreadentialsPageValidation.js')}}"></script>
<script type="text/javascript">
  $('input[type=checkbox]').change(function () {
    let mode = '';
    if($(this).is(":checked")) {
      mode = 'Live Mode';
    } else {
      mode = 'Sandbox Mode';
    }
    $(this).closest('.custom-switch').find('label').text(mode);
  });
</script>
@endsection
