@extends('layouts.admin')
@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Coaches</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Freeze Account</a></li>
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

<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Hover-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Freeze Coach Account</h5>
                        <h5>Coach Name > {{getUsername($coach_id)}}</h5>
                    </div>

                    <div class="card-body">
                        <div class="register-sec form-register-sec family_mem">

                        <form action="{{route('save_freeze_acc_details')}}" method="POST">
                        <input type="hidden" name="coach_id" value="{{$coach_id}}">
                        @csrf

		                    <!-- My Profile -->

		                    <div class="form-group row gender-opt signup-gender-op">
		                        <label for="gender" class="col-md-12 col-form-label text-md-right "><h5>> My Profile</h5></label>
		                        <div class="col-md-6 ">
		                            <div class="cstm-radio">
		                                <input type="radio" value="1" name="profile" id="profile-yes" @if(!empty($freeze_details)) @if($freeze_details->profile == 1) checked @endif  @elseif(empty($freeze_details)) checked @endif>
		                                <label for="profile-yes">Freeze</label>
		                            </div>
		                            <div class="cstm-radio">
		                                <input type="radio" value="0" name="profile" id="profile-no" @if(!empty($freeze_details)) @if($freeze_details->profile == 0) checked @endif @endif>
		                                <label for="profile-no">Access</label>
		                            </div>
		                        </div>
		                    </div>

		                    <hr/>

		                    <!-- Reports -->
		                    <div class="form-group row gender-opt signup-gender-op">
		                        <label for="gender" class="col-md-12 col-form-label text-md-right "><h5>> Reports</h5></label>
		                        <div class="col-md-6 ">
		                            <div class="cstm-radio">
		                                <input type="radio" value="1" name="reports" id="reports-yes" @if(!empty($freeze_details)) @if($freeze_details->reports == 1) checked @endif  @elseif(empty($freeze_details)) checked @endif>
		                                <label for="reports-yes">Freeze</label>
		                            </div>
		                            <div class="cstm-radio">
		                                <input type="radio" value="0" name="reports" id="reports-no" @if(!empty($freeze_details)) @if($freeze_details->reports == 0) checked @endif @endif>
		                                <label for="reports-no">Access</label>
		                            </div>
		                        </div>
		                    </div>

		                    <hr/>

		                    <!-- Matches -->
		                    <div class="form-group row gender-opt signup-gender-op">
		                        <label for="gender" class="col-md-12 col-form-label text-md-right "><h5>> Matches</h5></label>
		                        <div class="col-md-6 ">
		                            <div class="cstm-radio">
		                                <input type="radio" value="1" name="matches" id="matches-yes" @if(isset($freeze_details)) @if($freeze_details->matches == 1) checked @endif  @elseif(empty($freeze_details)) checked @endif>
		                                <label for="matches-yes">Freeze</label>
		                            </div>
		                            <div class="cstm-radio">
		                                <input type="radio" value="0" name="matches" id="matches-no" @if(isset($freeze_details)) @if($freeze_details->matches == 0) checked @endif @endif>
		                                <label for="matches-no">Access</label>
		                            </div>
		                        </div>
		                    </div>

		                    <hr/>

		                    <!-- Goals -->
		                    <div class="form-group row gender-opt signup-gender-op">
		                        <label for="gender" class="col-md-12 col-form-label text-md-right "><h5>> Goals</h5></label>
		                        <div class="col-md-6 ">
		                            <div class="cstm-radio">
		                                <input type="radio" value="1" name="goals" id="goals-yes" @if(isset($freeze_details)) @if($freeze_details->goals == 1) checked @endif  @elseif(empty($freeze_details)) checked @endif>
		                                <label for="goals-yes">Freeze</label>
		                            </div>
		                            <div class="cstm-radio">
		                                <input type="radio" value="0" name="goals" id="goals-no" @if(isset($freeze_details)) @if($freeze_details->goals == 0) checked @endif @endif>
		                                <label for="goals-no">Access</label>
		                            </div>
		                        </div>
		                    </div>

		                    <hr/>

		                    <!-- Invoices -->
		                    <div class="form-group row gender-opt signup-gender-op">
		                        <label for="gender" class="col-md-12 col-form-label text-md-right "><h5>> Invoices</h5></label>
		                        <div class="col-md-6 ">
		                            <div class="cstm-radio">
		                                <input type="radio" value="1" name="invoices" id="invoices-yes" @if(!empty($freeze_details)) @if($freeze_details->invoices == 1) checked @endif @elseif(empty($freeze_details)) checked @endif>
		                                <label for="invoices-yes">Freeze</label>
		                            </div>
		                            <div class="cstm-radio">
		                                <input type="radio" value="0" name="invoices" id="invoices-no" @if(!empty($freeze_details)) @if($freeze_details->invoices == 0) checked @endif @endif>
		                                <label for="invoices-no">Access</label>
		                            </div>
		                        </div>
		                    </div>

		                    <hr/>

		                    <!-- My Players -->
		                    <div class="form-group row gender-opt signup-gender-op">
		                        <label for="gender" class="col-md-12 col-form-label text-md-right "><h5>> My Players</h5></label>
		                        <div class="col-md-6 ">
		                            <div class="cstm-radio">
		                                <input type="radio" value="1" name="players" id="players-yes" @if(isset($freeze_details)) @if($freeze_details->players == 1) checked @endif  @elseif(empty($freeze_details)) checked @endif>
		                                <label for="players-yes">Freeze</label>
		                            </div>
		                            <div class="cstm-radio">
		                                <input type="radio" value="0" name="players" id="players-no" @if(isset($freeze_details)) @if($freeze_details->players == 0) checked @endif @endif>
		                                <label for="players-no">Access</label>
		                            </div>
		                        </div>
		                    </div>

		                    <hr/>

		                    <!-- My Bookings -->
		                    <div class="form-group row gender-opt signup-gender-op">
		                        <label for="gender" class="col-md-12 col-form-label text-md-right "><h5>> My Bookings</h5></label>
		                        <div class="col-md-6 ">
		                            <div class="cstm-radio">
		                                <input type="radio" value="1" name="bookings" id="bookings-yes" @if(isset($freeze_details)) @if($freeze_details->bookings == 1) checked @endif  @elseif(empty($freeze_details)) checked @endif>
		                                <label for="bookings-yes">Freeze</label>
		                            </div>
		                            <div class="cstm-radio">
		                                <input type="radio" value="0" name="bookings" id="bookings-no" @if(isset($freeze_details)) @if($freeze_details->bookings == 0) checked @endif @endif>
		                                <label for="bookings-no">Access</label>
		                            </div>
		                        </div>
		                    </div>

		                    <hr/>

		                    <!-- Notifications -->
		                    <div class="form-group row gender-opt signup-gender-op">
		                        <label for="gender" class="col-md-12 col-form-label text-md-right "><h5>> Notifications</h5></label>
		                        <div class="col-md-6 ">
		                            <div class="cstm-radio">
		                                <input type="radio" value="1" name="notifications" id="notifications-yes" @if(isset($freeze_details)) @if($freeze_details->notifications == 1) checked @endif  @elseif(empty($freeze_details)) checked @endif>
		                                <label for="notifications-yes">Freeze</label>
		                            </div>
		                            <div class="cstm-radio">
		                                <input type="radio" value="0" name="notifications" id="notifications-no" @if(isset($freeze_details)) @if($freeze_details->notifications == 0) checked @endif @endif>
		                                <label for="notifications-no">Access</label>
		                            </div>
		                        </div>
		                    </div>

		                    <hr/>

		                    <!-- Wallet -->
		                    <div class="form-group row gender-opt signup-gender-op">
		                        <label for="gender" class="col-md-12 col-form-label text-md-right "><h5>> Wallet</h5></label>
		                        <div class="col-md-6 ">
		                            <div class="cstm-radio">
		                                <input type="radio" value="1" name="wallet" id="wallet-yes" @if(isset($freeze_details)) @if($freeze_details->wallet == 1) checked @endif  @elseif(empty($freeze_details)) checked @endif>
		                                <label for="wallet-yes">Freeze</label>
		                            </div>
		                            <div class="cstm-radio">
		                                <input type="radio" value="0" name="wallet" id="wallet-no" @if(isset($freeze_details)) @if($freeze_details->wallet == 0) checked @endif @endif>
		                                <label for="wallet-no">Access</label>
		                            </div>
		                        </div>
		                    </div>

		                    <hr/>

		                    <!-- Settings -->
		                    <div class="form-group row gender-opt signup-gender-op">
		                        <label for="gender" class="col-md-12 col-form-label text-md-right "><h5>> Settings</h5></label>
		                        <div class="col-md-6 ">
		                            <div class="cstm-radio">
		                                <input type="radio" value="1" name="settings" id="settings-yes" @if(isset($freeze_details)) @if($freeze_details->settings == 1) checked @endif  @elseif(empty($freeze_details)) checked @endif>
		                                <label for="settings-yes">Freeze</label>
		                            </div>
		                            <div class="cstm-radio">
		                                <input type="radio" value="0" name="settings" id="settings-no" @if(isset($freeze_details)) @if($freeze_details->settings == 0) checked @endif @endif>
		                                <label for="settings-no">Access</label>
		                            </div>
		                        </div>
		                    </div>

		                    <div class="card-footer">
			                    <button type="submit" id="faqFormBtn" class="btn btn-primary">Update</button>
			                </div>

		                </form>

		                </div>
		            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection