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
#add_new_match{ display: none; }
div#add_new_match {
    padding: 20px;
    border: 2px solid #be298d;
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

@php
    $url = url()->current();
    $id = substr($url, strrpos($url, '/') + 1); 
    $comp_id = base64_decode($id);
    $comp = DB::table('competitions')->where('id',$comp_id)->first();
@endphp

<section class="report-sec">
    <div class="container">
        <div class="inner-cont">
            <ul class="nav nav-tabs report-tab" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link cstm-btn" href="{{url('/user/coach-reports')}}">Back</a>
                    <a class="nav-link cstm-btn active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Match Report</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <!-- Match Report (Start Here)-->
                <div class="tab-pane fade active show" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="content-wrap">
                        {!! getAllValueWithMeta('report3_content', 'report') !!}
                    </div>
                    <div class="form-head">
                        <div class="pink-heading">
                            <h2>Add Match Report</h2>
                        </div>
                        <form>
                            <p>Who is this match report for?</p>
                            <div class="form-group">
                                <select id="child_id">
                                    <option disabled="" selected="">Select Player</option>
                                    @php 
                                        $players = DB::table('parent_coach_reqs')->where('status',1)->orderBy('id','asc')->get(); 
                                    @endphp
                                    @foreach($players as $bd)
                                        @php $user = DB::table('users')->where('id',$bd->child_id)->first(); @endphp
                                        <option value="{{$bd->child_id}}" 
                                            @if(!empty($comp))
                                                @if($comp->player_id == $bd->child_id) 
                                                    selected 
                                                @endif
                                            @endif>{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="outer-wrap">
                        <div class="upper-form">
                            <p class="sub-head">Create The Competition</p>

                            <form action="{{route('add_competition')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="player_id" id="match_player_id" value="@if(!empty($comp->player_id)){{isset($comp->player_id) ? $comp->player_id : ''}}@endif">
                                <input type="hidden" name="comp_id" value="@if(!empty($comp->id)){{isset($comp->id) ? $comp->id : ''}}@endif">

                                @if(Auth::user()->role_id == 3)
                                <input type="hidden" name="coach_id" value="{{Auth::user()->id}}">
                                @elseif(Auth::user()->role_id == 2)
                                <input type="hidden" name="parent_id" value="{{Auth::user()->id}}">
                                @endif
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="comp_type">
                                                <option selected="" disabled="">Competition Type</option>
                                                <option value="Tournament" @if(!empty($comp)) @if($comp->comp_type == 'Tournament') selected @endif @endif>Tournament</option>
                                                <option value="Match Play" @if(!empty($comp)) @if($comp->comp_type == 'Match Play') selected @endif @endif>Match Play</option>
                                                <option value="Club Event" @if(!empty($comp)) @if($comp->comp_type == 'Club Event') selected @endif @endif>Club Event</option>
                                                <option value="Friendly" @if(!empty($comp)) @if($comp->comp_type == 'Friendly') selected @endif @endif>Friendly</option>
                                                <option value="Other" @if(!empty($comp)) @if($comp->comp_type == 'Other') selected @endif @endif>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Competition Date - dd/mm/yyyy" value="@if(!empty($comp)){{isset($comp->comp_date) ? $comp->comp_date : ''}}@endif" name="comp_date" class="textbox-n" type="text" onfocus="(this.type='date')" id="date">
                                          <!--   <input placeholder="Competition Date - " type="date" name="comp_date" value="@if(!empty($comp)){{isset($comp->comp_date) ? $comp->comp_date : ''}}@endif" placeholder="Competition Date" class="form-control"> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="comp_venue" placeholder="Competition Venue" value="@if(!empty($comp)){{isset($comp->comp_venue) ? $comp->comp_venue : ''}}@endif" class="form-control" placeholder="Competition Venue">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="comp_name" placeholder="Competition Name" class="form-control" placeholder="Competition Name" value="@if(!empty($comp)){{isset($comp->comp_name) ? $comp->comp_name : ''}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" class="cstm-btn main_button">submit</button>
                                            <a id="add_match" class="cstm-btn main_button">Add Match</a> 
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>

                        @if(Auth::user()->role_id == '2')
                            @php $matches = DB::table('match_reports')->where('comp_id',$comp_id)->get(); @endphp
                        @elseif(Auth::user()->role_id == '3')
                            @php $matches = DB::table('match_reports')->where('comp_id',$comp_id)->get(); @endphp
                        @endif

                        @if(count($matches)>0)
                        <div class="accordian_summary matches_summery">
                            <div class="card">
                                @php $i = 1; @endphp
                                @if(count($matches)>0)
                                    @foreach($matches as $ma)
                                    <div class="card-header">
                                       <a class="collapsed card-link" data-toggle="collapse" href="#match-{{$ma->id}}">
                                       <span>{{$i}}</span>{{isset($ma->opponent_name) ? $ma->opponent_name : ''}} - {{isset($ma->result) ? $ma->result : ''}} - {{isset($ma->score) ? $ma->score : ''}}
                                       </a>
                                    </div>
                                    <div id="match-{{$ma->id}}" class="collapse">
                                       <div class="card-body">
                                          <div class="report-table-wrap report-tab-sec report-tab-one player_rp_detail matches-dtl">
                                             <div class="col-md-12 report_row">
                                               
                                                <div class="match-form-wrap">
                                                    <p class="sub-head">Competition Match</p>
                                                    <form action="{{route('add_match')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="player_id" id="match_player_id" value="@if(!empty($comp->player_id)){{isset($comp->player_id) ? $comp->player_id : ''}}@endif">
                                                        <input type="hidden" name="comp_id" value="{{isset($comp->id) ? $comp->id : ''}}">
                                                        <input type="hidden" name="match_id" value="{{isset($ma->id) ? $ma->id : ''}}">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <input type="text" name="opponent_name" placeholder="Opponent Name" class="form-control" value="{{isset($ma->opponent_name) ? $ma->opponent_name : ''}}" placeholder="Opponent Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <input class="form-control" placeholder="Match Date - dd/mm/yyyy" name="start_date" class="textbox-n" type="text" onfocus="(this.type='date')" value="{{isset($ma->start_date) ? $ma->start_date : ''}}" id="date">
                                                                    <!-- <input type="date" name="start_date" placeholder="Match Start Date" class="form-control" value="{{isset($ma->start_date) ? $ma->start_date : ''}}"> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <input type="text" name="surface_type" class="form-control" placeholder="Match Surface Type" value="{{isset($ma->surface_type) ? $ma->surface_type : ''}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <input type="text" name="condition" class="form-control" placeholder="Match Condition" value="{{isset($ma->condition) ? $ma->condition : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select name="result">
                                                                        <option selected="" disabled="">Match Result</option>
                                                                        <option value="Won">Won</option>
                                                                        <option value="Lost">Lost</option>
                                                                        <option value="Did Not Finish" >Did Not Finish</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <input type="text" placeholder="Score" name="score" class="form-control" value="{{isset($ma->score) ? $ma->score : ''}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="textarea-wrap">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlTextarea1">What went well</label>
                                                                        <textarea class="form-control" name="wht_went_well" id="exampleFormControlTextarea1" rows="3">{{isset($ma->wht_went_well) ? $ma->wht_went_well : ''}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlTextarea1">What could've been better</label>
                                                                        <textarea class="form-control" name="wht_could_better" id="exampleFormControlTextarea1" rows="3">{{isset($ma->wht_could_better) ? $ma->wht_could_better : ''}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">Other comments</label>
                                                                <textarea class="form-control" name="other_comments" id="exampleFormControlTextarea1" rows="3">{{isset($ma->other_comments) ? $ma->other_comments : ''}}</textarea>
                                                            </div>

                                                            @php 
                                                                $check_stats = DB::table('match_stats')->where('competition_id',$comp->id)->where('match_id',$ma->id)->first(); 
                                                            @endphp

                                                            @if(!empty($check_stats))
                                                                <a class="cstm-btn" href="{{url('/user/competition')}}/{{$comp->id}}/match/{{$ma->id}}/stats/view">View Stats</a>
                                                                <a class="cstm-btn" href="{{url('/user/competition')}}/{{$comp->id}}/match/{{$ma->id}}/stats">Edit Stats</a>
                                                            @else
                                                            <div class="form-group">
                                                                <label>Add Match Stats</label>
                                                                <a href="{{url('/user/competition')}}/{{$comp->id}}/match/{{$ma->id}}/stats"><i class="fas fa-plus-circle"></i></a>
                                                            </div>
                                                            @endif

                                                            <!-- ******************************
                                                            |
                                                            |     Upload Match Chart
                                                            |
                                                            | ********************************* -->
                                                            @php 
                                                                $count=1; 
                                                                $check_game_chart = DB::table('match_game_charts')->where('comp_id',$comp->id)->where('match_id',$ma->id)->where('player_id',$comp->player_id)->get();
                                                                $count_game_chart = $check_game_chart->count();
                                                            @endphp
                                                            <table class="add_on_services match_game_chart">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Upload Match Chart</th>
                                                                        <th><a onclick="addnewsection();" href="javascript:void(0);"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                @if(isset($check_game_chart))  

                                                                <input type="hidden" id="noOfQuetion" value="{{$count_game_chart}}">
                                                                <div class="mainQuestions" id="mainQuestions">

                                                                @foreach($check_game_chart as $time => $number)
                                                                    <tr class="timeslots slots{{$time+1}}" value={{$time+1}}>
                                                                      <td><a target="_blank" href="{{URL::asset('/uploads/game-charts')}}/{{$number->image}}"><img style="width:20%" src="{{URL::asset('/uploads/game-charts')}}/{{$number->image}}"></a></td>
                                                                      <td class="remove_game_chart"><a class="cstm-btn" onclick="return confirm('Are you sure you want to delete this game chart?')" href="{{url('/user/competition')}}/@php echo base64_encode($comp->id); @endphp/match/@php echo base64_encode($ma->id); @endphp/player/@php echo base64_encode($comp->player_id); @endphp/game-chart/remove/@php echo base64_encode($number->id); @endphp">Delete</a></td>
                                                                    </tr>
                                                                @endforeach  

                                                                </div>

                                                                @else
                                                             <!--  
                                                                <input type="hidden" id="noOfQuetion" value="{{$count_game_chart}}">
                                                                <div class="mainQuestions" id="mainQuestions">

                                                                    <tr class="timeslots slots{{$count}}" value={{$count}}>
                                                                      <td><input type="file" name="match_chart[{{$count}}]"></td>
                                                                      <td><a onclick="removeSection({{$count}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>      
                                                                    </tr>

                                                                </div>
 -->
                                                                @endif
                                                              
                                                                </tbody>
                                                            </table>
                                                          <!--   <div class="form-group">
                                                                <label>Upload Match Chart</label><br/>

                                                                @if(!empty($ma->match_chart))
                                                                    <a target="_blank" href="{{URL::asset('/uploads')}}/{{$ma->match_chart}}">View Already Uploaded Match Chart</a><br/><br/>
                                                                @endif
                                                                <input type="file" name="match_chart">
                                                            </div> -->
                                                            
                                                        </div>
                                                        <button type="submit" class="cstm-btn main_button">submit</button>
                                                        
                                                    </form><!-- <br/>
                                                    <button id="add_match" class="cstm-btn">Add Match</button> -->
                                                </div>

                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    @php $i++; @endphp
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @else
                        <div class="outer-wrap">
                            <div class="match-form-wrap">
                                <p class="sub-head">Create the First Match</p>
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
                                                <input type="date" name="start_date" placeholder="Match Start Date" class="form-control">
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
                                                <input type="text" name="condition" class="form-control" placeholder="Match Condition">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="result">
                                                    <option selected="" disabled="">Match Result</option>
                                                    <option value="Won">Won</option>
                                                    <option value="Lost">Lost</option>
                                                    <option value="Did Not Finish" >Did Not Finish</option>
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

                                        <!-- ******************************
                                        |
                                        |     Upload Match Chart
                                        |
                                        | ********************************* -->
                                        @php $count=1; @endphp
                                        <table class="add_on_services match_game_chart">
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
                                                  <td class="remove_game_chart"><a class="cstm-btn main_button" onclick="removeSection({{$count}});" href="javascript:void(0);">Delete</a></td>      
                                                </tr>

                                            </div>
                                          
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="cstm-btn main_button">submit</button>
                                </form>
                            </div>
                        </div>
                        @endif

                        <br/><br/>
                        <div class="match-form-wrap" id="add_new_match">
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
                                            <input type="date" name="start_date" placeholder="Match Start Date" class="form-control">
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
                                            <input type="text" name="condition" class="form-control" placeholder="Match Condition">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="result">
                                                <option selected="" disabled="">Match Result</option>
                                                <option value="Won">Won</option>
                                                <option value="Lost">Lost</option>
                                                <option value="Did Not Finish" >Did Not Finish</option>
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

                                    <!-- ******************************
                                    |
                                    |     Upload Match Chart
                                    |
                                    | ********************************* -->
                                    @php $count=1; @endphp
                                    <table class="add_on_services match_game_chart">
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
                                <button type="submit" class="cstm-btn main_button">submit</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Match Report (End Here)-->
            </div>
        </div>
</section>


@endsection