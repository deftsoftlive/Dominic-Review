@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')
@php
$country_code = DB::table('country_code')->get();
$notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
$user1 = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first();
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
                @php
                $user_id = \Auth::user()->role_id;
                @endphp
                @if($user_id == '2')
                @include('inc.parent-menu')
                @elseif($user_id == 3)
                @include('inc.coach-menu')
                @endif
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
                    <div class="card-header">Match Stats</div>
                 </div>
                    <div class="card-body matches-card-body">
                        <form class="register-form" method="POST" enctype="multipart/form-data" action="{{route('update_coach_profile')}}">
                            @csrf
                            <div class="profile-status-text matches-status-text" style="margin-top:5px;">
                                <div class="row">
                                    <!-- Total points played in match -->
                                    <div class="form-group row f-g-full">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="total_points" class="col-md-12 col-form-label text-md-right"><span>1) </span>{{ __('Total points played in match') }}</label></div>
                                                <div class="col-md-4">
                                                    <input id="total_points" type="text" class="form-control{{ $errors->has('total_points') ? ' is-invalid' : '' }}" name="total_points" value="{{ isset($user->total_points) ? $user->total_points : '' }}" required autofocus >
                                                    @if ($errors->has('total_points'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('total_points') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Total points won -->
                                    <div class="form-group row f-g-full">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="total_points_won" class="col-md-12 col-form-label text-md-right"><span>2) </span>{{ __('Total points won') }}</label></div>
                                                <div class="col-md-4">
                                                    <input id="total_points_won" type="text" class="form-control{{ $errors->has('total_points_won') ? ' is-invalid' : '' }}" name="total_points_won" value="{{ isset($user->total_points_won) ? $user->total_points_won : '' }}" required autofocus>
                                                    @if ($errors->has('total_points_won'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('total_points_won') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Total points won -->
                                    <div class="form-group row f-g-full">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="total_1serves_in" class="col-md-12 col-form-label text-md-right"><span>3) </span>{{ __('Total 1st serves in') }}</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input id="total_1serves_in" type="text" class="form-control{{ $errors->has('total_1serves_in') ? ' is-invalid' : '' }}" name="total_1serves_in" value="{{ isset($user->total_1serves_in) ? $user->total_1serves_in : '' }}" required autofocus >
                                                    @if ($errors->has('total_1serves_in'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('total_1serves_in') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                         <!-- Total 2nd serves in -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label for="total_2serves_in" class="col-md-12 col-form-label text-md-right"><span>4) </span>{{ __('Total 2nd serves in') }}</label></div>
                                                        <div class="col-md-4">
                                                            <input id="total_2serves_in" type="text" class="form-control{{ $errors->has('total_2serves_in') ? ' is-invalid' : '' }}" name="total_2serves_in" value="{{ isset($user->total_2serves_in) ? $user->total_2serves_in : '' }}" required autofocus >
                                                            @if ($errors->has('total_2serves_in'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_2serves_in') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Total 2nd serves in -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label for="total_double_faults" class="col-md-12 col-form-label text-md-right"><span>5) </span>{{ __('Total double faults') }}</label></div>
                                                        <div class="col-md-4">
                                                            <input id="total_double_faults" type="text" class="form-control{{ $errors->has('total_double_faults') ? ' is-invalid' : '' }}" name="total_double_faults" value="{{ isset($user->total_double_faults) ? $user->total_double_faults : '' }}" required autofocus >
                                                            @if ($errors->has('total_double_faults'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_double_faults') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Total aces -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label for="total_aces" class="col-md-12 col-form-label text-md-right"><span>6) </span>{{ __('Total aces') }}</label></div>
                                                        <div class="col-md-4">
                                                            <input id="total_aces" type="text" class="form-control{{ $errors->has('total_aces') ? ' is-invalid' : '' }}" name="total_aces" value="{{ isset($user->total_aces) ? $user->total_aces : '' }}" required autofocus >
                                                            @if ($errors->has('total_aces'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_aces') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Total 1st serves in by opponent -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label for="total_1serve_by_op" class="col-md-12 col-form-label text-md-right"><span>7) </span>{{ __('Total 1st serves in by opponent') }}</label></div>
                                                        <div class="col-md-4">
                                                            <input id="total_1serve_by_op" type="text" class="form-control{{ $errors->has('total_1serve_by_op') ? ' is-invalid' : '' }}" name="total_1serve_by_op" value="{{ isset($user->total_1serve_by_op) ? $user->total_1serve_by_op : '' }}" required autofocus >
                                                            @if ($errors->has('total_1serve_by_op'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_1serve_by_op') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Total 2nd serves in by opponent -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label for="total_2serve_by_op" class="col-md-12 col-form-label text-md-right"><span>8) </span>{{ __('Total 2nd serves in by opponent') }}</label></div>
                                                        <div class="col-md-4">
                                                            <input id="total_2serve_by_op" type="text" class="form-control{{ $errors->has('total_2serve_by_op') ? ' is-invalid' : '' }}" name="total_2serve_by_op" value="{{ isset($user->total_2serve_by_op) ? $user->total_2serve_by_op : '' }}" required autofocus >
                                                            @if ($errors->has('total_2serve_by_op'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_2serve_by_op') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Total double fault by opponent -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label for="total_double_fault_by_op" class="col-md-12 col-form-label text-md-right"><span>9) </span>{{ __('Total double fault by opponent') }}</label></div>
                                                        <div class="col-md-4">
                                                            <input id="total_double_fault_by_op" type="text" class="form-control{{ $errors->has('total_double_fault_by_op') ? ' is-invalid' : '' }}" name="total_double_fault_by_op" value="{{ isset($user->total_double_fault_by_op) ? $user->total_double_fault_by_op : '' }}" required autofocus  >
                                                            @if ($errors->has('total_double_fault_by_op'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_double_fault_by_op') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Total aces by opponent -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label for="total_aces_by_op" class="col-md-12 col-form-label text-md-right"><span>10) </span>{{ __('Total aces by opponent') }}</label></div>
                                                        <div class="col-md-4">
                                                            <input id="total_aces_by_op" type="text" class="form-control{{ $errors->has('total_aces_by_op') ? ' is-invalid' : '' }}" name="total_aces_by_op" value="{{ isset($user->total_aces_by_op) ? $user->total_aces_by_op : '' }}" required autofocus >
                                                            @if ($errors->has('total_aces_by_op'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_aces_by_op') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Total points when 1st serve went in -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label for="total_points_1serve_went" class="col-md-12 col-form-label text-md-right"><span>11) </span>{{ __('Total points when 1st serve went in') }}</label></div>
                                                        <div class="col-md-4">
                                                            <input id="total_points_1serve_went" type="text" class="form-control{{ $errors->has('total_points_1serve_went') ? ' is-invalid' : '' }}" name="total_points_1serve_went" value="{{ isset($user->total_points_1serve_went) ? $user->total_points_1serve_went : '' }}" required autofocus  >
                                                            @if ($errors->has('total_points_1serve_went'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_points_1serve_went') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Total points when 2nd serve went in -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label for="total_points_1serve_went" class="col-md-12 col-form-label text-md-right"><span>12) </span>{{ __('Total points when 2nd serve went in') }}</label></div>
                                                        <div class="col-md-4">
                                                            <input id="total_points_2serve_went" type="text" class="form-control{{ $errors->has('total_points_2serve_went') ? ' is-invalid' : '' }}" name="total_points_2serve_went" value="{{ isset($user->total_points_2serve_went) ? $user->total_points_2serve_went : '' }}" required autofocus  >
                                                            @if ($errors->has('total_points_2serve_went'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_points_2serve_went') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>
                                                <div class="form-button">
                                                    <div class="form-group row mb-0 button_form_row">
                                                        <div class="col-md-12 form-btn">
                                                            <button type="submit" class="cstm-btn">
                                                                {{ __('Submit') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                 </div>
                        </form>
                  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection