@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')
@php
$country_code = DB::table('country_code')->get();
$notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
$user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first(); 
@endphp
<style>
   .card.coach_profile {
   border: 4px solid #be298d;
   padding: 30px;
   box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1);
   border-radius: 0;
   }
</style>
<div class="account-menu">
   <div class="container">
      <div class="menu-title">
         <span>Account</span> menu
      </div>
      <nav>
         <ul>
            <li><a href="{{ route('coach_profile') }}" class="{{ \Request::route()->getName() === 'coach_profile' ? 'active' : '' }}">My Profile</a></li>
            <li><a href="{{ route('coach_report') }}" class="{{ \Request::route()->getName() === 'coach_report' ? 'active' : '' }}">Reports</a></li>
            <!-- <li><a href="{{ route('qualifications') }}" class="{{ \Request::route()->getName() === 'qualifications' ? 'active' : '' }}">Qualifications</a></li> -->

            @if(!empty($user))
            @if($user->enable_inovice == 1)
              <li><a href="{{ route('upload_invoice') }}" class="{{ \Request::route()->getName() === 'upload_invoice' ? 'active' : '' || \Request::route()->getName() === 'add_upload_invoice' ? 'active' : '' }}">Invoices</a></li>
            @endif
            @endif
            
            <li><a href="{{ route('coach_player') }}" class="{{ \Request::route()->getName() === 'coach_player' ? 'active' : '' }}">My Players</a></li>
            <li><a href="{{ route('my-bookings') }}" class="{{ \Request::route()->getName() === 'my-bookings' ? 'active' : '' }}">My Bookings</a></li>
            <li><a href="{{ route('request_by_parent') }}" class="{{ \Request::route()->getName() === 'request_by_parent' ? 'active' : '' }}">Notifications <span class="notification-icon">({{$notification}})</span></a></li>
            <li><a href="{{ route('account_settings') }}" class="{{ \Request::route()->getName() === 'account_settings' ? 'active' : '' }}">Settings</a></li>
            <li><a href="{{ route('logout') }}" class="{{ \Request::route()->getName() === 'logout' ? 'active' : '' }}">Logout</a></li>
         </ul>
      </nav>
   </div>
</div>
@if(Session::has('success'))
<div class="alert_msg alert alert-success">
   <p>{{ Session::get('success') }} </p>
</div>
@endif
<section class="register-sec cstm-reg-sec">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8 col-md-10">
            <div class="card coach_profile">
               <div class="card-header">{{ __('Upload Invoice') }}</div>
               <div class="card-body">
                  <form class="register-form" method="POST" enctype="multipart/form-data" action="{{route('save_upload_invoice')}}">
                     @csrf
                     <input type="hidden" name="coach_id" value="{{ $logined_user }}">
                     <!-- <div class="profile-status-text" style="margin-top:5px;">
                        {!! getAllValueWithMeta('form_head_content', 'my-profile') !!}
                     </div> -->
                     <div class="row">
                        <!-- Profile Name -->
                        <div class="form-group row f-g-full">
                           <label for="invoice_name" class="col-md-12 col-form-label text-md-right">{{ __('Please state your name followed by the main setting and then the month –  ') }}
                              <span>e.g.
                              Jane Smith – MK Tennis Club – March 2020</span></label>
                           <div class="col-md-12">
                              <input id="invoice_name" type="text" class="form-control{{ $errors->has('invoice_name') ? ' is-invalid' : '' }}" name="invoice_name" value="{{ isset($user->invoice_name) ? $user->invoice_name : '' }}" autofocus placeholder="Please enter profile name">
                              @if ($errors->has('invoice_name'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('invoice_name') }}</strong>
                              </span>
                              @endif
                               <p class="thanks-msg">Please ensure that you have thoroughly checked your invoice before submitting to us. If any dates, session names or hours are not correct, we will not be able to process, approve and pay. This may result your payment being delayed – Thank you.</p>
                           </div>

                        </div>
                        

                        <br/>
                        <!-- Profile Picture -->
                        <div class="form-group">
                           <div class="col-sm-12">
                              <label>Upload invoice in PDF format</label>
                              <input type="file" name="invoice_document" id="selImage" accept="application/pdf" onchange="ValidateSingleInput(this, 'invoice_document_src')">
                              @if ($errors->has('invoice_document'))
                              <div class="error">{{ $errors->first('invoice_document') }}</div>
                              @endif
                           </div>
                        </div>
                        @if(!empty($user->invoice_document))
                        <img id="invoice_document_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/uploads').'/'.$user->invoice_document }}" />
                        @endif
                     </div>


                     <div class="form-button">
                        <div class="form-group row mb-0">
                           <div class="col-md-12 form-btn">
                              <button type="submit" class="cstm-btn">
                              {{ __('Submit') }}
                              </button>
                           </div>
                        </div>

                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection