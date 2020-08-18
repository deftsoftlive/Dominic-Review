@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')
@php 
$country_code = DB::table('country_code')->get();
$notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
$user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first(); 
$count=1; 
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
            @php
            $user_role = \Auth::user()->role_id;
            @endphp
            @if($user_role == '2')
            @include('inc.parent-menu')
            @elseif($user_role == 3)
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
@elseif(Session::has('error'))
<div class="alert_msg alert alert-danger">
    <p>{!! Session::get('error') !!} </p>
</div>
@endif


<section class="report-sec">
    <div class="container">
        <div class="inner-cont">
            <ul class="nav nav-tabs report-tab" id="myTab" role="tablist">

                @if(Auth::user()->role_id == '3')
                <li class="nav-item">
                    <a class="nav-link cstm-btn active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">End of term report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cstm-btn" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Player Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cstm-btn" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Match Report</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link cstm-btn" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Match Report</a>
                </li>
                @endif
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Report - 1 (Start Here)-->
                <div class="tab-pane fade @if(Auth::user()->role_id == '3') show active @endif" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="upper-form report-tab-sec report-tab-one">
                        <p class="sub-head">End of Term Report</p>
                        <form id="simple_report_filter" action="{{route('coach_report')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <h6>Term :</h6>
                                        <select id="season_ID" name="season_id" >
                                            <option selected="" disabled="">Select Term</option>
                                            @php
                                            $season = DB::table('seasons')->orderBy('id','asc')->get();
                                            @endphp
                                            @foreach($season as $se)
                                            <option value="{{$se->id}}" @if(!empty($season_id) && $season_id == $se->id) selected @endif >{{$se->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <h6>Course :<h6>
                                                @if(!empty($course_id))
                                                <input type="text" disabled="" name=""  value="@php echo getCoursename($course_id); @endphp">
                                                @else
                                                <select id="course_ID" name="course_id" class="form-control">
                                                    <option selected="" disabled="">Select Course</option>
                                                </select>
                                                @endif
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <h6>Select Player :<h6>
                                            @if(!empty($user_id))
                                            <input type="text" disabled="" name=""  value="@php echo getUsername($user_id); @endphp">
                                            @else
                                            <select id="player_ID" name="player_id" class="player_data_ID form-control">
                                                <option selected="" disabled="">Select Player</option>
                                            </select>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-3 player-report-row">
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
                        <form id="simple_report" action="{{route('save_simple_report')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="sim_report_id" value="{{isset($player_report->id) ? $player_report->id : ''}}">
                            <input type="hidden" name="type" value="simple">
                            <input type="hidden" id="season_id" name="season_id" value="{{isset($season_id) ? $season_id : ''}}">
                            <input type="hidden" id="course_id" name="course_id" value="{{isset($course_id) ? $course_id : ''}}">
                            <input type="hidden" id="player_id" name="player_id" value="{{isset($user_id) ? $user_id : ''}}">
                            <input type="hidden" id="rp_type" name="rp_type" value="simple">

                            <div class="row">
                                @php
                                    $report_questions = DB::table('report_questions')->get(); 
                                @endphp

                                @foreach($report_questions as $ques)
                                @php
                                    $options = DB::table('report_question_options')->where('report_question_id',$ques->id)->get();
                                    $player_rp = DB::table('player_reports')->where('player_id',$user_id)->where('season_id',$season_id)->where('course_id',$course_id)->first();
                                @endphp

                                @if($player_rp)

                                @php 
                                    $selected_options = json_decode($player_rp->selected_options);
                                    $cat_option=[]; 
                                @endphp

                                @if(!empty($selected_options))
                                @foreach($selected_options as $opt)
                                @php 
                                    $sel_data = explode('-',$opt);
                                    $cat_option[] =  $sel_data[0].'-'.$sel_data[1];
                                @endphp
                                @endforeach
                                @endif

                                    <div class="col-md-6">
                                    <div class="inner-form-box">
                                        <p class="top-heading">{{$ques->title}}</p>
                                        <div class="form-wrap">
                                            @foreach($options as $op)
                                            @php
                                                $all_option = $ques->id.'-'.$op->id; 
                                                $all_opt_arr = explode(' ',$all_option);
                                            @endphp
                                            

                                            @if(in_array($all_option,$cat_option)) 
                                                <div class="form-check">
                                                    <input class="form-check-input" name="selected_options[]" type="checkbox" value="{{$ques->id}}-{{$op->id}}" checked id="defaultCheck">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        {{$op->option_title}}
                                                    </label>
                                                </div>
                                            @else
                                                <div class="form-check">
                                                    <input class="form-check-input" name="selected_options[]" type="checkbox" value="{{$ques->id}}-{{$op->id}}"  id="defaultCheck">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        {{$op->option_title}}
                                                    </label>
                                                </div>
                                            @endif

                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                @else
                                    
                                <div class="col-md-6">
                                    <div class="inner-form-box">
                                        <p class="top-heading">{{$ques->title}}</p>
                                        <div class="form-wrap">
                                            @foreach($options as $op)
                                        
                                            <div class="form-check">
                                                <input class="form-check-input" name="selected_options[]" type="checkbox" value="{{$ques->id}}-{{$op->id}}"  id="defaultCheck">
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
                                        <textarea class="form-control" id="feedback" rows="5" name="feedback" placeholder="Comment here...">{{isset($player_report->feedback) ? $player_report->feedback : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            

                            @if(!empty($season_id) && !empty($user_id) && !empty($course_id))
                            @php 
                                $test_score = DB::table('test_scores')->where('test_cat_id','!=',NULL)->where('season_id',$season_id)->where('user_id',$user_id)->where('course_id',$course_id)->get();
                            @endphp
                            <br/>

                            @if(count($test_score)>0)
                            <div class="pink-heading">
                                <h2>Test Score Data</h2>
                            </div>
                            <!-- <label>Test Score Data:</label> -->
                            <div class="table-layout">
                                <table class="table table-bordered rp_test_score">
                                    <thead>
                                      <tr>
                                          @if(count($test_score)> 0)
                                            <th class="rp_player_name" rowspan="2">Player Name</th>
                                          @endif

                                          @if(count($test_score)> 0)
                                          @foreach($test_score as $arr)
                                            <th>@php echo getTestCatname($arr->test_cat_id); @endphp</th>
                                          @endforeach
                                          @endif
                                          </tr>

                                          <tr>
                                          @if(count($test_score)> 0)
                                          @foreach($test_score as $arr)
                                            <th>@php echo getTestname($arr->test_id); @endphp</th>
                                          @endforeach
                                          @endif
                                      </tr>
                                    </thead>

                                    <tbody>

                                    @php
                                      $test_score1 = DB::table('test_scores')->where('course_id',$course_id)->where('test_cat_id','!=',NULL)->where('season_id',$season_id)->where('user_id',$user_id)->groupBy('user_id')->get(); 
                                    @endphp
                                    @foreach($test_score1 as $arr)
                                    <tr>
                                        <td>@php $user = DB::table('users')->where('id',$arr->user_id)->first(); @endphp {{$user->name}}</td>
                                        @php
                                          $test_score12 = DB::table('test_scores')->where('user_id',$user->id)->where('course_id',$course_id)->where('test_cat_id','!=',NULL)->where('season_id',$season_id)->groupBy('test_id')->get(); 
                                        @endphp
                                        @foreach($test_score12 as $arr)
                                            <td>{{$arr->test_score}}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @endif

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
                        <p class="sub-head">Player Report</p>
                        <form id="complex_report_filter" action="{{route('coach_report')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <h6>Select Player :<h6>
                                                @if(!empty($player_rep->player_id))
                                                <input class="form-control" type="text" value="@php echo getUsername($player_rep->player_id); @endphp" disabled="">
                                                @else
                                                <select id="inputPlayer" name="coach_player_id" class="coach_player_id">
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
                        <form id="complex_report" action="{{route('save_complex_report')}}" method="POST" enctype="multipart/form-data">
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
                                        <textarea class="form-control" name="feedback" id="feedback" rows="5" placeholder="Comment here...">{{isset($player_rep->feedback) ? $player_rep->feedback : ''}}</textarea>
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
                                                                    <span>You are about to send this Player Report to: </span>
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
                                                                <!-- <li> -->
                                                                  <!--   <div class="cstm-radio">
                                                                        <input type="checkbox" name="confirmation" id="report">
                                                                        <label for="report">Please click confirm submission to send.</label> </div> -->
                                                                <!-- </li> -->
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
                <div class="tab-pane fade @if(Auth::user()->role_id == '2') show active @endif" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="content-wrap">
                        {!! getAllValueWithMeta('report3_content', 'report') !!}
                    </div>
                    <div class="form-head">
                        <div class="pink-heading">
                            <h2>Add Report</h2>
                        </div>
                        <form>
                            <p>Who is this report for?</p>
                            <div class="form-group">
                                <select id="child_id">
                                    <option disabled="" selected="">Select Player</option>
                                    @php 
                                        $players = DB::table('parent_coach_reqs')->where('status',1)->orderBy('id','asc')->get();
                                    @endphp
                                    @foreach($players as $bd)
                                        @php $user = DB::table('users')->where('id',$bd->child_id)->first(); @endphp
                                        <option value="{{$bd->child_id}}" @if(!empty($player_rep)) @if($player_rep->player_id == $bd->child_id) selected @endif @endif>{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="outer-wrap">
                        <div class="upper-form">
                            <p class="sub-head">Competition Creation</p>
                            <form action="{{route('add_competition')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="player_id" id="match_player_id" value="@if(!empty($comp->player_id)){{isset($comp->player_id) ? $comp->player_id : ''}}@endif">
                                <input type="hidden" name="comp_id" value="@if(!empty($comp->id)){{isset($comp->id) ? $comp->id : ''}}@endif">
                                <input type="hidden" name="coach_id" value="{{Auth::user()->id}}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            
                                            <select name="comp_type">
                                                <option selected="" disabled="">Competition Type</option>
                                                <option value="Tournament">Tournament</option>
                                                <option value="Match Play">Match Play</option>
                                                <option value="Club Event">Club Event</option>
                                                <option value="Friendly">Friendly</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Competition Date - dd/mm/yyyy" name="comp_date" class="textbox-n" type="text" onfocus="(this.type='date')" id="date">

                                            <!-- <input type="date" name="comp_date" value="" placeholder="Competition Date" onChange="this.setAttribute('value', this.value)" class="form-control"> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="comp_venue" placeholder="Competition Venue" value="" class="form-control" placeholder="Competition Venue">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="comp_name" placeholder="Competition Name" class="form-control" placeholder="Competition Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" class="cstm-btn">submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="match-form-wrap">
                            <p class="sub-head">Competition Match</p>
                            <form action="{{route('add_match')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="player_id" id="match_player_id" value="@if(!empty($comp->player_id)){{isset($comp->player_id) ? $comp->player_id : ''}}@endif">
                                <input type="hidden" name="comp_id" value="@if(!empty($comp->id)){{isset($comp->id) ? $comp->id : ''}}@endif">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="opponent_name" placeholder="Opponent Name" class="form-control" placeholder="Opponent Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Match Date - dd/mm/yyyy" name="start_date" class="textbox-n" type="text" onfocus="(this.type='date')" id="date">
                                            <!-- <input type="date" name="start_date" placeholder="Match Start Date" class="form-control"> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="surface_type" class="form-control" placeholder="Match Surface Type">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="condition" class="form-control" placeholder="Conditions">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="result">
                                                <option selected="" disabled="">Match Result</option>
                                                <option value="Won">Won</option>
                                                <option value="Lost">Lost</option>
                                                <option value="Did Not Finish">Did Not Finish</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" placeholder="Score" name="score" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="textarea-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">What went well</label>
                                                <textarea class="form-control" name="wht_went_well" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">What could've been better</label>
                                                <textarea class="form-control" name="wht_could_better" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Other comments</label>
                                        <textarea class="form-control" name="other_comments" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                        <!-- <th><a onclick="addnewsection();" href="javascript:void(0);"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th> -->


                                        <!-- ******************************
                                        |
                                        |     Upload Match Chart
                                        |
                                        | ********************************* -->
                                      
                                        <table class="add_on_services">
                                            <thead>
                                                <tr>
                                                    <th>Upload Match Chart</th>
                                                    <th><a onclick="addnewsection();" href="javascript:void(0);"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                          
                                            <input type="hidden" id="noOfQuetion" value="{{$count}}">
                                            <div class="mainQuestions" id="mainQuestions">

                                                <tr class="timeslots slots{{$count}}" value={{$count}}>
                                                  <td><input type="file" name="match_chart[{{$count}}]"></td>
                                                  <td><a onclick="removeSection({{$count}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>      
                                                </tr>

                                            </div>
                                          
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                                <button type="submit" class="cstm-btn">submit</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
                <!-- Match Report (End Here)-->
            </div>
        </div>
</section>
