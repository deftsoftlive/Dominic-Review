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
                @include('inc.coach-menu')
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
                <li class="nav-item">
                    <a class="nav-link cstm-btn" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Match Report</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <!-- Match Report (Start Here)-->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                            <form action="{{route('add_competition')}}" method="POST">
                                @csrf
                                @php $comp = DB::table('competitions')->where('coach_id',Auth::user()->id)->orderBy('id','desc')->first(); @endphp
                                <input type="hidden" name="player_id" id="match_player_id" value="@if(!empty($comp->player_id)){{isset($comp->player_id) ? $comp->player_id : ''}}@endif">
                                <input type="hidden" name="comp_id" value="@if(!empty($comp->id)){{isset($comp->id) ? $comp->id : ''}}@endif">
                                <input type="hidden" name="coach_id" value="{{Auth::user()->id}}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="comp_type">
                                                <option selected="" disabled="">Competition Type</option>
                                                <option value="Tournament" @if(!empty($comp)) @if($comp->comp_type == 'Tournament') selected @endif @endif>Tournament</option>
                                                <option value="Match play" @if(!empty($comp)) @if($comp->comp_type == 'Match play') selected @endif @endif>Match play</option>
                                                <option value="Club Event" @if(!empty($comp)) @if($comp->comp_type == 'Club Event') selected @endif @endif>Club Event</option>
                                                <option value="Social Match" @if(!empty($comp)) @if($comp->comp_type == 'Social Match') selected @endif @endif>Social Match</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="date" name="comp_date" value="@if(!empty($comp)){{isset($comp->comp_date) ? $comp->comp_date : ''}}@endif" placeholder="Competition Date" class="form-control">
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
                                            <button type="submit" class="cstm-btn">submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="match-form-wrap">
                            <p class="sub-head">Competition Match</p>
                            <form action="{{route('add_match')}}" method="POST">
                                @csrf
                                <input type="hidden" name="player_id" id="match_player_id" value="@if(!empty($comp->player_id)){{isset($comp->player_id) ? $comp->player_id : ''}}@endif">
                                <input type="hidden" name="comp_id" value="@if(!empty($comp->id)){{isset($comp->id) ? $comp->id : ''}}@endif">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="match_title" placeholder="Match Title" class="form-control" placeholder="Match Title">
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
                                            <input type="text" name="result" class="form-control" placeholder="Match Result">
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
@endsection