@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')
@php
$country_code = DB::table('country_code')->get();
$notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
$user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first();
@endphp
<style>
input#pl_dob, input#pl_name, input#pla_dob, input#pla_name {
    background: white;
    border:none;
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


<section class="report-sec">
    <div class="container">
        <div class="inner-cont">
            <ul class="nav nav-tabs report-tab" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link cstm-btn active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">End of term report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cstm-btn" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Player Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cstm-btn" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Match Report</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Report - 1 (Start Here)-->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="upper-form report-tab-sec report-tab-one">
                        <p class="sub-head">Player Report</p>
                        <form id="simple_report_filter" action="{{route('coach_report')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h6>Term :</h6>
                                        <select id="season_ID" name="season_id" class="form-control">
                                            <option selected="" disabled="">Select Term</option>
                                            @php
                                            $season = DB::table('seasons')->orderBy('id','asc')->get();
                                            @endphp
                                            @foreach($season as $se)
                                            <option value="{{$se->id}}" @if(!empty($player_report) && $player_report->season_id == $se->id) selected @endif >{{$se->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h6>Course :<h6>
                                                @if(!empty($player_report->course_id))
                                                <input type="text" disabled="" name="" class="form-control" value="@php echo getCoursename($player_report->course_id); @endphp">
                                                @else
                                                <select id="course_ID" name="course_id" class="form-control">
                                                    <option selected="" disabled="">Select Course</option>
                                                </select>
                                                @endif
                                                <!--   @php 
                                                $course = DB::table('courses')->where('linked_coach',Auth::user()->id)->orderBy('id','asc')->get();
                                            @endphp
                                            @foreach($course as $se) 
                                              <option value="{{$se->id}}" @if(!empty($player_report) && $player_report->course_id == $se->id) selected @endif >{{$se->title}}</option>
                                            @endforeach -->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h6>Select Player :<h6>
                                                @if(!empty($player_report->player_id))
                                                <input type="text" disabled="" name="" class="form-control" value="@php echo getUsername($player_report->player_id); @endphp">
                                                @else
                                                <select id="player_ID" name="player_id" class="player_data_ID form-control">
                                                    <option selected="" disabled="">Select Player</option>
                                                </select>
                                                @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="cstm-btn">Submit</button>
                                    <a href="{{route('coach_report')}}" class="cstm-btn">Reset</a>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="report-2-cont">{!! getAllValueWithMeta('report1_content', 'report') !!}</p>
                            </div>
                        </div>
                        <br />
                        <form id="simple_report" action="{{route('save_simple_report')}}" method="POST">
                            @csrf
                            <input type="hidden" name="sim_report_id" value="{{isset($player_report->id) ? $player_report->id : ''}}">
                            <input type="hidden" name="type" value="simple">
                            <input type="hidden" id="season_id" name="season_id" value="{{isset($player_report->season_id) ? $player_report->season_id : ''}}">
                            <input type="hidden" id="course_id" name="course_id" value="{{isset($player_report->course_id) ? $player_report->course_id : ''}}">
                            <input type="hidden" id="player_id" name="player_id" value="{{isset($player_report->player_id) ? $player_report->player_id : ''}}">
                            <input type="hidden" id="rp_type" name="rp_type" value="simple">
                            <!--  <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group date-row">
                                        <label>Date :</label>
                                        <input name="date" value="{{isset($player_report->date) ? $player_report->date : ''}}" type="Date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group date-row">
                                        <label>Term:</label>
                                        <input name="term" value="{{isset($player_report->term) ? $player_report->term : ''}}" type="text" class="form-control">
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                @php
                                $report_questions = DB::table('report_questions')->get();
                                @endphp
                                @foreach($report_questions as $ques)
                                @php
                                $options = DB::table('report_question_options')->where('report_question_id',$ques->id)->get();
                                @endphp
                                @if(!empty($options))
                                <div class="col-md-6">
                                    <div class="inner-form-box">
                                        <p class="top-heading">{{$ques->title}}</p>
                                        <div class="form-wrap">
                                            @foreach($options as $op)
                                            <div class="form-check">
                                                <input class="form-check-input" name="selected_options[]" type="checkbox" value="{{$ques->id}}-{{$op->id}}" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    {{$op->option_title}}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Coach Feedback:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="feedback" placeholder="Comment here...">{{isset($player_report->feedback) ? $player_report->feedback : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Test Score data:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="test_score_data" placeholder="Please enter test score data">{{isset($player_report->test_score_data) ? $player_report->test_score_data : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="submit_sim_rep" class="form-group">
                                        <!-- <a class="cstm-btn">submit report</a> -->
                                        <!-- <button type="button" class="cstm-btn" data-toggle="modal" data-target="#sim_rp_popup">Submit Button</button> -->

                                        <button type="submit" class="cstm-btn">submit Report</button>
                                    </div>
                                </div>
                            </div>

                            <div class="simple_rep modal fade term-report-modal" id="sim_rp_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" id="close_sim_rp_popup" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="inner-cont">
                                                <div class="card coach_profile">
                                                    <div class="row">
                                                        <div class="col-md-12 coach">
                                                            <ul>
                                                                <li>
                                                                    <span>You are about to sent Player Report to: </span>
                                                                </li>
                                                                <li>
                                                                    <strong>Player Name : <input readonly type="text" class="popup form-control" name="pla_name" id="pla_name"></strong>
                                                                    <span></span>
                                                                </li>
                                                                <li>
                                                                    <strong>Player DOB : <input type="text" class="popup form-control" readonly name="pla_dob" id="pla_dob"></strong>
                                                                    <span></span>
                                                                </li>
                                                                <br>
                                                                <li>
                                                                    <div class="cstm-radio">
                                                                        <input type="checkbox" name="confirmation" id="report11">
                                                                        <label for="report11">Please click confirm submission to send.</label> </div>
                                                                </li>
                                                            </ul>
                                                            <div class="form-group">
                                                                <button type="submit" id="submit-simple-report" class="cstm-btn">Submit Report</button>
                                                            </div>
                                                           
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Report - 1 (End Here)-->


                <!-- Report - 2 (Start Here)-->
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="upper-form report-tab-sec">
                        <p class="sub-head">End of Term Report</p>
                        <form id="complex_report_filter" action="{{route('coach_report')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h6>Select Player :<h6>
                                                @if(!empty($player_rep->player_id))
                                                <input class="form-control" type="text" value="@php echo getUsername($player_rep->player_id); @endphp" disabled="">
                                                @else
                                                <select id="inputPlayer" name="coach_player_id" class="coach_player_id form-control">
                                                    <option selected="" disabled="">Select Player</option>
                                                    @php
                                                    $players = DB::table('parent_coach_reqs')->where('status',1)->orderBy('id','asc')->get();
                                                    @endphp
                                                    @foreach($players as $bd)
                                                    @php
                                                    $user = DB::table('users')->where('id',$bd->child_id)->first();
                                                    @endphp
                                                    <option value="{{$bd->child_id}}" @if(!empty($player_rep)) @if($player_rep->player_id == $bd->child_id) selected @endif @endif>{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                                @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="cstm-btn">Submit</button>
                                    <a href="{{route('coach_report')}}" class="cstm-btn">Reset</a>
                                </div>
                            </div>
                        </form>
                        <!-- Complex Report -->
                        <form id="complex_report" action="{{route('save_complex_report')}}" method="POST">
                        <!-- <form method="POST"> -->
                            @csrf
                            <input type="hidden" name="report_id" value="{{ isset($player_rep->id) ? $player_rep->id : '' }}">
                            <input type="hidden" id="exist_player_id" name="exist_player_id" value="{{ isset($player_rep->player_id) ? $player_rep->player_id : '' }}">
                            <input type="hidden" id="report_type" name="type" value="complex">
                            <input type="hidden" id="playerID" name="player_id" value="">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="report-2-cont">{!! getAllValueWithMeta('report2_content', 'report') !!}</p>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Coach Feedback:</label>
                                        <textarea class="form-control" name="feedback" id="exampleFormControlTextarea1" rows="5" placeholder="Comment here...">{{isset($player_rep->feedback) ? $player_rep->feedback : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="submit_rep" class="form-group">
                                        <a class="cstm-btn">submit report</a>
                                        <!-- <button type="button" class="cstm-btn" data-toggle="modal" data-target="#exampleModal">Submit Button</button> -->
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade term-report-modal" id="rp_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" id="close_rp_popup" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="inner-cont">
                                                <div class="card coach_profile">
                                                    <div class="row">
                                                        <div class=" col-md-12 coach">
                                                            <ul>
                                                                <li>
                                                                    <span>You are about to sent Player Report to: </span>
                                                                </li>
                                                                <li>
                                                                    <strong>Player Name : <input readonly type="text" class="popup form-control" name="pl_name" id="pl_name"></strong>
                                                                    <span></span>
                                                                </li>
                                                                <li>
                                                                    <strong>Player DOB : <input type="text" class="popup form-control" readonly name="pl_dob" id="pl_dob"></strong>
                                                                    <span></span>
                                                                </li>
                                                                <br>
                                                                <li>
                                                                    <div class="cstm-radio">
                                                                        <input type="checkbox" name="confirmation" id="report">
                                                                        <label for="report">Please click confirm submission to send.</label> </div>
                                                                </li>
                                                            </ul>
                                                            <div class="form-group">
                                                                <button type="submit" id="submit-complex-report" class="cstm-btn">Submit Report</button>
                                                            </div>
                                                           
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Report - 2 (End Here)-->

                <!-- Match Report (Start Here)-->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="content-wrap">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incidt in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt uupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="form-head">
                        <div class="pink-heading">
                            <h2>Add Report</h2>
                        </div>
                        <form>
                            <p>Who is this report for?</p>
                            <div class="form-group">
                                <select>
                                    <option disabled="" selected="">Select Player</option>
                                    <option>1</option>
                                    <option>1</option>
                                    <option>1</option>
                                    <option>1</option>
                                    <option>1</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="outer-wrap">
                        <div class="upper-form">
                            <p class="sub-head">Competition Creation</p>
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select>
                                                <option selected="" disabled="">Competition Type</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="date" placeholder="Competition Date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" placeholder="Competition Venue" class="form-control" placeholder="aacabcabc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" placeholder="Competition Name" class="form-control" placeholder="aacabcabc">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="button" class="cstm-btn">submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="match-form-wrap">
                            <p>Competition Match</p>
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" placeholder="Match Title" class="form-control" placeholder="aacabcabc">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="date" placeholder="Match Start Date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select>
                                                <option disabled="" selected="">Match Surface Type</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select>
                                                <option disabled="" selected="">Match Conditions</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select>
                                                <option disabled="" selected="">Match Result</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" placeholder="Score" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="textarea-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">What went well</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">What could've been better</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Other comments</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <button type="button" class="cstm-btn">submit</button>
                    </div>
                </div>
                <!-- Match Report (End Here)-->
            </div>
        </div>
</section>
@endsection