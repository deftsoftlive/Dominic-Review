@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Player Detail</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Hover-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Report Detail</h5>
                        <div class="cst-admin-filter">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">

                            @if($report->type == 'simple')
                            
                                <table class="table table-bordered  cst-reports reports-detail" style="width:100%">
                                  <tr>
                                    <th><p><b>Date</b></p></th>
                                    <th><p><b>Player Name</b></p></th> 
                                    <th><p><b>Report Type</b></p></th>
                                    <th><p><b>Coach Name</b></p></th>
                                    <th><p><b>Season</b></p></th>
                                    <th><p><b>Course</b></p></th>
                                  </tr>
                                  <tr>
                                    @php $player_name = getUsername($report->player_id); @endphp 
                                    
                                    <td>@php echo date("d/m/Y", strtotime($report->date)); @endphp</td>
                                    <td>{{isset($player_name) ? $player_name : 'User not exist'}}</td>
                                    <td>@if($report->type == 'simple') End of term report @elseif($report->type == 'complex') Player report @endif</td>
                                    <td>@php echo getUsername($report->coach_id); @endphp</td>
                                    <td>@if($report->type == 'simple') @php echo getSeasonname($report->season_id); @endphp @else - @endif</td>
                                    <td>@if($report->type == 'simple') @php echo getCourseName($report->course_id); @endphp @else - @endif</td>
                                  </tr>
                                </table>

                            @elseif($report->type == 'complex')
                                @php $player_name = getUsername($report->player_id); @endphp 
                                <table class="table table-bordered all_rps cst-reports amin-tbl-comp">
                                    <tbody>
                                        <tr>
                                            <th>
                                                <p><b>Date</b></p>
                                            </th>
                                            <td>@php echo date("d/m/Y", strtotime($report->date)); @endphp</td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <p><b>Player Name</b></p>
                                            </th>
                                            <td>{{isset($player_name) ? $player_name : 'User not exist'}}</td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <p><b>Report Type</b></p>
                                            </th>
                                            <td>@if($report->type == 'simple') End of term report @elseif($report->type == 'complex') Player report @endif</td>
                                        </tr>

                                        <tr>
                                            <th>
                                                <p><b>Coach Name</b></p>
                                            </th>
                                            <td>@php echo getUsername($report->coach_id); @endphp</td>
                                        </tr>
                                        @if($report->type == 'simple')
                                            <tr>
                                                <th>
                                                    <p><b>Season</b></p>
                                                </th>
                                                <td><p>@php echo getSeasonname($report->season_id); @endphp</p></td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p><b>Course</b></p>
                                                </th>
                                                <td><p>@php echo getCourseName($report->course_id); @endphp</p></td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>
                                                <p><b>Coach Feedback</b></p>
                                            </th>
                                            <td><p class="pre_line">{{$report->feedback}}</p></td>
                                        </tr>
                                    </tbody>
                                </table>

                                
                            @endif

                        </div>
                        
                    </div>

                @if($report->type == 'simple')
                 <div class="upper-form report-tab-sec report-tab-one player_rp_detail">

                    <form action="" method="POST">
                        
                        <div class="row">
                            @php
                                $report_questions = DB::table('report_questions')->get();  
                                @endphp
                                @foreach($report_questions as $ques)
                                @php
                                $options = DB::table('report_question_options')->where('report_question_id',$ques->id)->get();
                                $player_rp = DB::table('player_reports')->where('player_id',$report->player_id)->where('season_id',$report->season_id)->where('course_id',$report->course_id)->first();  
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
                                                    <span class="cst_active cc_cursor"><i class="fas fa-check-circle"></i></span>
                                                    <!-- <input class="form-check-input" name="selected_options[]" type="checkbox" value="{{$ques->id}}-{{$op->id}}" disabled checked id="defaultCheck"> -->
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        {{$op->option_title}}
                                                    </label>
                                                </div>
                                            @else
                                                <div class="form-check">
                                                    <span class="cst_in-active cc_cursor"><i class="fas fa-times-circle"></i></span>
                                                    <!-- <input class="form-check-input" name="selected_options[]" type="checkbox" value="{{$ques->id}}-{{$op->id}}"  disabled id="defaultCheck"> -->
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
                        <br>
                        <div id="report_detail_cont">
                            <h5 style="text-align: center;">Coach Feedback</h5>
                            <p class="report-2-cont">{{$report->feedback}}</p>
                        </div>
                        <br/>
                        @if(!empty($report))
                            @php 
                                $test_score = DB::table('test_scores')->where('test_cat_id','!=',NULL)->where('season_id',$report->season_id)->where('user_id',$report->player_id)->where('course_id',$report->course_id)->orderby('test_cat_id', 'desc')->get(); 
                            @endphp
                            <br/><br/>
                            
                            @if(count($test_score)>0)
                            <div class="card-header">
                                <h5>Test Score Data</h5>
                                <div class="cst-admin-filter">
                                </div>
                            </div>
                            <div class="table-layout">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                          @if(count($test_score)> 0)
                                            <th rowspan="2">Player Name</th>
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
                                      $test_score1 = DB::table('test_scores')->where('course_id',$report->course_id)->where('test_cat_id','!=',NULL)->where('season_id',$report->season_id)->where('user_id',$report->player_id)->groupBy('user_id')->get(); 
                                    @endphp
                                    @foreach($test_score1 as $arr)
                                    <tr>
                                        <td>@php $user = DB::table('users')->where('id',$arr->user_id)->first(); @endphp {{$user->name}}</td>
                                        <!-- <td>@php echo getTestCatname($arr->test_cat_id); @endphp</td> -->
                                        <!-- <td>@php echo getTestname($arr->test_id); @endphp</td> -->
                                        @php
                                          $test_score12 = DB::table('test_scores')->where('user_id',$user->id)->where('course_id',$report->course_id)->where('test_cat_id','!=',NULL)->where('season_id',$report->season_id)->groupBy('test_id')->get(); 
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
                    <br>

                    </form>
                </div>
                @endif

                </div>

            </div>
            
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection