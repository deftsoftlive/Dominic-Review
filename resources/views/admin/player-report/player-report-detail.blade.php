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
                            
                                <table class="table table-bordered  cst-reports" style="width:100%">
                                  <tr>
                                    <th><p><b>Date</b></p></th>
                                    <th><p><b>Player Name</b></p></th> 
                                    <th><p><b>Report Type</b></p></th>
                                    <th><p><b>Coach Name</b></p></th>
                                    <th><p><b>Season</b></p></th>
                                    <th><p><b>Course</b></p></th>
                                  </tr>
                                  <tr>
                                    <td>@php echo date("d/m/Y", strtotime($report->date)); @endphp</td>
                                    <td>@php echo getUsername($report->player_id); @endphp</td>
                                    <td>@if($report->type == 'simple') End of term report @elseif($report->type == 'complex') Player report @endif</td>
                                    <td>@php echo getUsername($report->coach_id); @endphp</td>
                                    <td>@if($report->type == 'simple') @php echo getSeasonname($report->season_id); @endphp @else - @endif</td>
                                    <td>@if($report->type == 'simple') @php echo getCourseName($report->course_id); @endphp @else - @endif</td>
                                  </tr>
                                </table>

                            @elseif($report->type == 'complex')

                                <p><label class="control-label">Date</label> - @php echo date("d/m/Y", strtotime($report->date)); @endphp</p>
                                <p><label class="control-label">Player Name</label> - @php echo getUsername($report->player_id); @endphp</p>
                                <p><label class="control-label">Report Type</label> - @if($report->type == 'simple') End of term report @elseif($report->type == 'complex') Player report @endif</p>
                                <p><label class="control-label">Coach Name</label> - @php echo getUsername($report->coach_id); @endphp</p>
                                @if($report->type == 'simple')
                                    <p><label class="control-label">Season</label> - @php echo getSeasonname($report->season_id); @endphp</p>
                                    <p><label class="control-label">Course</label> - @php echo getCourseName($report->course_id); @endphp</p>
                                @endif
                                <p><label class="control-label">Coach Feedback</label> - {{$report->feedback}}</p>
                            @endif

                        </div>
                        
                    </div>

                @if($report->type == 'simple')
                 <div class="upper-form report-tab-sec report-tab-one">

                    <form action="" method="POST">
                        
                        <div class="row">
                            @php 
                            $report_questions = DB::table('report_questions')->get();
                            @endphp

                            @foreach($report_questions as $ques)

                            @php 
                                $options = DB::table('report_question_options')->where('report_question_id',$ques->id)->get();
                                $selected_options = json_decode($report->selected_options);   
                            @endphp

                            @if(!empty($options))
                            <div class="col-md-6">
                                <div class="inner-form-box">
                                    <p class="top-heading">{{$ques->title}}</p>
                                    <div class="form-wrap">
                                        @foreach($options as $op)
                                          
                                            <div class="form-check">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    @foreach($selected_options as $ops)
                                                    @php
                                                        $opt = explode('-',$ops);
                                                        $cat = $opt[0];
                                                        $option = $opt[1];
                                                    @endphp

                                                    @if($ques->id == $cat && $option == $op->id) 
                                                        <b>@php echo getReportOptionName($option); @endphp</b><br/>
                                                    @endif
                                                    @endforeach

                                                    
                                                </label>
                                            </div>
                                            
                                        @endforeach
                                        @if(!empty($options))
                                            @foreach($options as $op)
                                                - {{$op->option_title}}<br/>
                                            @endforeach
                                        @endif
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
                        <div id="report_detail_cont">
                            <h5 style="text-align: center;">Test Data For That Course</h5>
                            <p class="report-2-cont">{{isset($report->test_score_data) ? $report->test_score_data : ''}}</p>
                        </div>
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