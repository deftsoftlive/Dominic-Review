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
            <div class="col-lg-8 col-md-10 outer_wrap_row">
                <!-- <div class="card coach_profile"> -->
                    <div class="card-header">Match Stats</div>
                    <p>{!! getAllValueWithMeta('match_stats_text', 'general-setting') !!}</p>
                    <br/>
                 <!-- </div> -->
                    <div class="card-body matches-card-body">
                        <form id="match_stats" method="POST" enctype="multipart/form-data" action="{{route('save_match_stats')}}">
                            @csrf
                            <input type="hidden" name="competition_id" value="{{$comp_id}}">
                            <input type="hidden" name="match_id" value="{{$match_id}}">
                            <div class="profile-status-text matches-status-text" style="margin-top:5px;">
                                <div class="row">

                                    <!-- 1) Total points played in match -->
                                    <div class="form-group row f-g-full">
                                        <div class="col-md-12">
                                            <div class="row ques_rows">
                                                <div class="col-md-8 ques-row">
                                                    <label for="tp_in_match" class="col-md-12 col-form-label text-md-right"><span>1) </span>{{ __('Total points played in match') }}</label></div>
                                                <div class="col-md-4 ques-row">
                                                    <input id="tp_in_match" type="text" class="form-control{{ $errors->has('tp_in_match') ? ' is-invalid' : '' }}" name="tp_in_match" value="{{ isset($stats_calculation->tp_in_match) ? $stats_calculation->tp_in_match : '' }}" required autofocus >
                                                    @if ($errors->has('tp_in_match'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('tp_in_match') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 2) Total points won -->
                                    <div class="form-group row f-g-full">
                                        <div class="col-md-12">
                                            <div class="row ques_rows">
                                                <div class="col-md-8 ques-row">
                                                    <label for="tp_won" class="col-md-12 col-form-label text-md-right"><span>2) </span>{{ __('Total points won') }}</label></div>
                                                <div class="col-md-4 ques-row">
                                                    <input id="tp_won" type="text" class="form-control{{ $errors->has('tp_won') ? ' is-invalid' : '' }}" name="tp_won" value="{{ isset($stats_calculation->tp_won) ? $stats_calculation->tp_won : '' }}" required autofocus>
                                                    @if ($errors->has('tp_won'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('tp_won') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 3) Total points won -->
                                    <div class="form-group row f-g-full">
                                        <div class="col-md-12">
                                            <div class="row ques_rows">
                                                <div class="col-md-8 ques-row">
                                                    <label for="total_1serves_in" class="col-md-12 col-form-label text-md-right"><span>3) </span>{{ __('Total 1st serves in') }}</label>
                                                </div>
                                                <div class="col-md-4 ques-row">
                                                    <input id="total_1serves_in" type="text" class="form-control{{ $errors->has('total_1serves_in') ? ' is-invalid' : '' }}" name="total_1serves_in" value="{{ isset($stats_calculation->total_1serves_in) ? $stats_calculation->total_1serves_in : '' }}" required autofocus >
                                                    @if ($errors->has('total_1serves_in'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('total_1serves_in') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                         <!-- 4) Total 2nd serves in -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="total_2serves_in" class="col-md-12 col-form-label text-md-right"><span>4) </span>{{ __('Total 2nd serves in') }}</label></div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="total_2serves_in" type="text" class="form-control{{ $errors->has('total_2serves_in') ? ' is-invalid' : '' }}" name="total_2serves_in" value="{{ isset($stats_calculation->total_2serves_in) ? $stats_calculation->total_2serves_in : '' }}" required autofocus >
                                                            @if ($errors->has('total_2serves_in'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_2serves_in') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 5) Total double fault -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="total_double_faults" class="col-md-12 col-form-label text-md-right"><span>5) </span>{{ __('Total double faults') }}</label></div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="total_double_faults" type="text" class="form-control{{ $errors->has('total_double_faults') ? ' is-invalid' : '' }}" name="total_double_faults" value="{{ isset($stats_calculation->total_double_faults) ? $stats_calculation->total_double_faults : '' }}" required autofocus >
                                                            @if ($errors->has('total_double_faults'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_double_faults') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 6) Total aces -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="total_aces" class="col-md-12 col-form-label text-md-right"><span>6) </span>{{ __('Total aces') }}</label></div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="total_aces" type="text" class="form-control{{ $errors->has('total_aces') ? ' is-invalid' : '' }}" name="total_aces" value="{{ isset($stats_calculation->total_aces) ? $stats_calculation->total_aces : '' }}" required autofocus >
                                                            @if ($errors->has('total_aces'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_aces') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 7) Total 1st serves in by opponent -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="total_1serve_by_op" class="col-md-12 col-form-label text-md-right"><span>7) </span>{{ __('Total 1st serves in by opponent') }}</label></div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="total_1serve_by_op" type="text" class="form-control{{ $errors->has('total_1serve_by_op') ? ' is-invalid' : '' }}" name="total_1serve_by_op" value="{{ isset($stats_calculation->total_1serve_by_op) ? $stats_calculation->total_1serve_by_op : '' }}" required autofocus >
                                                            @if ($errors->has('total_1serve_by_op'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_1serve_by_op') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 8) Total 2nd serves in by opponent -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="total_2serve_by_op" class="col-md-12 col-form-label text-md-right"><span>8) </span>{{ __('Total 2nd serves in by opponent') }}</label></div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="total_2serve_by_op" type="text" class="form-control{{ $errors->has('total_2serve_by_op') ? ' is-invalid' : '' }}" name="total_2serve_by_op" value="{{ isset($stats_calculation->total_2serve_by_op) ? $stats_calculation->total_2serve_by_op : '' }}" required autofocus >
                                                            @if ($errors->has('total_2serve_by_op'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_2serve_by_op') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 9) Total double fault by opponent -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="total_double_fault_by_op" class="col-md-12 col-form-label text-md-right"><span>9) </span>{{ __('Total double faults by opponent') }}</label></div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="total_double_fault_by_op" type="text" class="form-control{{ $errors->has('total_double_fault_by_op') ? ' is-invalid' : '' }}" name="total_double_fault_by_op" value="{{ isset($stats_calculation->total_double_fault_by_op) ? $stats_calculation->total_double_fault_by_op : '' }}" required autofocus  >
                                                            @if ($errors->has('total_double_fault_by_op'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_double_fault_by_op') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 10) Total points won in 1 serve -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="tp_won_in_1serve" class="col-md-12 col-form-label text-md-right"><span>10) </span>{{ __('Total points won when 1st serve went in') }}</label></div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="tp_won_in_1serve" type="text" class="form-control{{ $errors->has('tp_won_in_1serve') ? ' is-invalid' : '' }}" name="tp_won_in_1serve" value="{{ isset($stats_calculation->tp_won_in_1serve) ? $stats_calculation->tp_won_in_1serve : '' }}" required autofocus >
                                                            @if ($errors->has('tp_won_in_1serve'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('tp_won_in_1serve') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 11) Total points won in 2 serve -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="tp_won_in_2serve" class="col-md-12 col-form-label text-md-right"><span>11) </span>{{ __('Total points won when 2nd serve went in') }}</label>
                                                        </div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="tp_won_in_2serve" type="text" class="form-control{{ $errors->has('tp_won_in_2serve') ? ' is-invalid' : '' }}" name="tp_won_in_2serve" value="{{ isset($stats_calculation->tp_won_in_2serve) ? $stats_calculation->tp_won_in_2serve : '' }}" required autofocus >
                                                            @if ($errors->has('tp_won_in_2serve'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('tp_won_in_2serve') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 12) Total points won when opponent's 1st serve went in -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="tp_won_ops_1sereve" class="col-md-12 col-form-label text-md-right"><span>12) </span>{{ __("Total points won when opponent's 1st serve went in") }}</label>
                                                        </div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="tp_won_ops_1sereve" type="text" class="form-control{{ $errors->has('tp_won_ops_1sereve') ? ' is-invalid' : '' }}" name="tp_won_ops_1sereve" value="{{ isset($stats_calculation->tp_won_ops_1sereve) ? $stats_calculation->tp_won_ops_1sereve : '' }}" required autofocus >
                                                            @if ($errors->has('tp_won_ops_1sereve'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('tp_won_ops_1sereve') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 13) Total points won when opponent's 2nd serve went in -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="tp_won_ops_2sereve" class="col-md-12 col-form-label text-md-right"><span>13) </span>{{ __("Total points won when opponent's 2nd serve went in") }}</label>
                                                        </div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="tp_won_ops_2sereve" type="text" class="form-control{{ $errors->has('tp_won_ops_2sereve') ? ' is-invalid' : '' }}" name="tp_won_ops_2sereve" value="{{ isset($stats_calculation->tp_won_ops_2sereve) ? $stats_calculation->tp_won_ops_2sereve : '' }}" required autofocus >
                                                            @if ($errors->has('tp_won_ops_2sereve'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('tp_won_ops_2sereve') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 14) Total points played when rally 4 shots or less -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="tp_played_rally_4shots" class="col-md-12 col-form-label text-md-right"><span>14) </span>{{ __('Total points played when rally 4 shots or less') }}</label>
                                                        </div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="tp_played_rally_4shots" type="text" class="form-control{{ $errors->has('tp_played_rally_4shots') ? ' is-invalid' : '' }}" name="tp_played_rally_4shots" value="{{ isset($stats_calculation->tp_played_rally_4shots) ? $stats_calculation->tp_played_rally_4shots : '' }}" required autofocus >
                                                            @if ($errors->has('tp_played_rally_4shots'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('tp_played_rally_4shots') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 15) Total points played when rally 5+ shots -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="tp_played_rally_5shots" class="col-md-12 col-form-label text-md-right"><span>15) </span>{{ __('Total points played when rally 5+ shots') }}</label>
                                                        </div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="tp_played_rally_5shots" type="text" class="form-control{{ $errors->has('tp_played_rally_5shots') ? ' is-invalid' : '' }}" name="tp_played_rally_5shots" value="{{ isset($stats_calculation->tp_played_rally_5shots) ? $stats_calculation->tp_played_rally_5shots : '' }}" required autofocus >
                                                            @if ($errors->has('tp_played_rally_5shots'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('tp_played_rally_5shots') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 16) Total points won when rally 4 shots or less -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="tp_won_rally_4shots" class="col-md-12 col-form-label text-md-right"><span>16) </span>{{ __('Total points won when rally 4 shots or less') }}</label>
                                                        </div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="tp_won_rally_4shots" type="text" class="form-control{{ $errors->has('tp_won_rally_4shots') ? ' is-invalid' : '' }}" name="tp_won_rally_4shots" value="{{ isset($stats_calculation->tp_won_rally_4shots) ? $stats_calculation->tp_won_rally_4shots : '' }}" required autofocus >
                                                            @if ($errors->has('tp_won_rally_4shots'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('tp_won_rally_4shots') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 17) Total points won when rally 5+ shots -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="tp_won_rally_5shots" class="col-md-12 col-form-label text-md-right"><span>17) </span>{{ __('Total points won when rally 5+ shots') }}</label>
                                                        </div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="tp_won_rally_5shots" type="text" class="form-control{{ $errors->has('tp_won_rally_5shots') ? ' is-invalid' : '' }}" name="tp_won_rally_5shots" value="{{ isset($stats_calculation->tp_won_rally_5shots) ? $stats_calculation->tp_won_rally_5shots : '' }}" required autofocus >
                                                            @if ($errors->has('tp_won_rally_5shots'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('tp_won_rally_5shots') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 18) Total number of shots played in match -->
                                            <div class="form-group row f-g-full">
                                                <div class="col-md-12">
                                                    <div class="row ques_rows">
                                                        <div class="col-md-8 ques-row">
                                                            <label for="total_shots_match" class="col-md-12 col-form-label text-md-right"><span>18) </span>{{ __('Total number of shots played in match') }}</label>
                                                        </div>
                                                        <div class="col-md-4 ques-row">
                                                            <input id="total_shots_match" type="text" class="form-control{{ $errors->has('total_shots_match') ? ' is-invalid' : '' }}" name="total_shots_match" value="{{ isset($stats_calculation->total_shots_match) ? $stats_calculation->total_shots_match : '' }}" required autofocus >
                                                            @if ($errors->has('total_shots_match'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('total_shots_match') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" id="save_stats" class="cstm-btn main_button">Submit</button>
                                            
                        </form>
                  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection