@extends('inc.homelayout')
@section('title', 'DRH|Listing')
@section('content')
@php $base_url = \URL::to('/'); @endphp
<style>
    img.disable-badge {
    opacity: 0.3;
}
  .badge-img{
    width: 50%;
}
label.confirm_msg.form-check-label {
    font-size: 15px;
    color: #666666;
    font-weight: 300;
}
</style>
<section class="football-course-sec d-print-none" style="background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('badges_banner_img', 'badges') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="football-course-content">
                    <h2 class="f-course-heading">{{ getAllValueWithMeta('badges_heading', 'badges') }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner section ends here -->
<!-- acount section starts here -->
<section class="account-menu-sec player-badge-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="account-menu-sec-heading">
                    <!-- <h1>ACCOUNT menu</h1> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav class="d-print-none">
                    <div class="nav nav-tabs account-menu-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link menu-tab-link active" id="nav-goals-tab" data-toggle="tab" href="#nav-goals" role="tab" aria-controls="nav-home" aria-selected="false"><span><i class="fas fa-bullseye"></i></span>Player Goals</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-badges-tab" data-toggle="tab" href="#nav-badges" role="tab" aria-controls="nav-profile" aria-selected="true"><span><i class="fas fa-trophy"></i></span>Player Badges</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-leaderboard-tab" data-toggle="tab" href="#nav-leaderboard" role="tab" aria-controls="nav-profile" aria-selected="true"><span><i class="fas fa-ribbon"></i></span>Leader Board</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-reports-tab" data-toggle="tab" href="#nav-reports" role="tab" aria-controls="nav-contact" aria-selected="false"><span><i class="fas fa-clipboard-list"></i></span>Player Reports</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-matches-tab" data-toggle="tab" href="#nav-matches" role="tab" aria-controls="nav-matches" aria-selected="true"><span><i class="fas fa-users"></i></span>Matches</a>
                        <!-- <a class="nav-item nav-link menu-tab-link" id="nav-schedule-tab" data-toggle="tab" href="#nav-schedule" role="tab" aria-controls="nav-schedule" aria-selected="false"><span><i class="fas fa-calendar-alt"></i></span>Schedule</a> -->
                        <a class="nav-item nav-link menu-tab-link" id="nav-stats-tab" data-toggle="tab" href="#nav-stats" role="tab" aria-controls="nav-stats" aria-selected="false"><span><i class="fas fa-cog"></i></span>Stats</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-goals" role="tabpanel" aria-labelledby="nav-goals-tab">
                        <div class="report-sec goal-level-report">
                            <div class="inner-cont">
                                <ul class="nav nav-tabs report-tab" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link cstm-btn active" data-toggle="tab" href="#beginner" role="tab" aria-controls="beginner" aria-selected="true">beginner</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link cstm-btn" data-toggle="tab" href="#advance" role="tab" aria-controls="advance" aria-selected="false">Advance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link cstm-btn" data-toggle="tab" href="#all-goals" role="tab" aria-controls="all-goals" aria-selected="false">All Goals</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="beginner" role="tabpanel" aria-labelledby="beginner">
                                        <div class="player-goal-level-beginner">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="page-description">
                                                        <p class="goal-setting-text">{!! getAllValueWithMeta('goals_desc', 'badges') !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(Session::has('success'))
                                            <div class="alert_msg alert alert-success">
                                                <p>{{ Session::get('success') }} </p>
                                            </div>
                                            @endif
                                            @if(Session::has('error'))
                                            <div class="alert_msg alert alert-danger">
                                                <p>{{ Session::get('error') }} </p>
                                            </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form id="goals" action="{{route('badges')}}" method="POST" class="select-player-goal-form goal-filter">
                                                        @csrf
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4 col-sm-6">
                                                                <!-- <label for="inputPlayer">Select Player :</label> -->
                                                                <select id="goal_player" name="goal_player" class="form-control">
                                                                    <option selected="" disabled="">Select Player</option>
                                                                    @php
                                                                    $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
                                                                    @endphp
                                                                    @foreach($children as $ch)
                                                                    <option value="{{$ch->id}}" @if(isset($goal_player)) @if($ch->id == $goal_player)
                                                                        selected
                                                                        @endif
                                                                        @endif
                                                                        value="{{$ch->id}}">{{$ch->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <input type="hidden" name="goal_type" value="beginner">
                                                            <div class="form-group col-md-2">
                                                                <button id="save_goal" class="cstm-btn main_button">Submit</button>
                                                                <a href="{{url('/user/badges')}}" class="cstm-btn main_button">Reset</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <br /><br />
                                                <div class="col-md-12">
                                                    <div class="player-goal-heading">
                                                        <h1>All of your goals apart from your Big Dreams should follow the acronym S.M.A.R.T.</h1>
                                                        <ul class="player-goal-inner-text-wrap">
                                                            <li>
                                                                <h2>{{ getAllValueWithMeta('specific_title', 'badges') }}</h2>
                                                                <p>{{ getAllValueWithMeta('specific_desc', 'badges') }}</p>
                                                            </li>
                                                            <li>
                                                                <h2>{{ getAllValueWithMeta('measurable_title', 'badges') }}</h2>
                                                                <p>{{ getAllValueWithMeta('measurable_desc', 'badges') }}</p>
                                                            </li>
                                                            <li>
                                                                <h2>{{ getAllValueWithMeta('achievable_title', 'badges') }}</h2>
                                                                <p>{{ getAllValueWithMeta('achievable_desc', 'badges') }}</p>
                                                            </li>
                                                            <li>
                                                                <h2>{{ getAllValueWithMeta('realistic_title', 'badges') }}</h2>
                                                                <p>{{ getAllValueWithMeta('realistic_desc', 'badges') }}</p>
                                                            </li>
                                                            <li>
                                                                <h2>{{ getAllValueWithMeta('timed_title', 'badges') }}</h2>
                                                                <p>{{ getAllValueWithMeta('timed_desc', 'badges') }}</p>
                                                            </li>
                                                        </ul>
                                                        <br />
                                                    </div>
                                                </div>
                                                @php
                                                $goals = DB::table('goals')->where('goal_type','beginner')->get();
                                                @endphp
                                                <form id="goal_detail" action="{{route('save_goal')}}" class="col-md-12" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="goal_player_name" class="goal_player_name" value="{{isset($goal_player) ? $goal_player : ''}}">
                                                    <input type="hidden" name="pl_goal_type" id="pl_goal_type" value="beginner">
                                                    <input type="hidden" name="parent_id" value="{{Auth::user()->id}}">
                                                    @foreach($goals as $go)
                                                    @if(!empty($goal_player))
                                                    @php
                                                    $user_goal = DB::table('set_goals')->where('player_id',$goal_player)->where('parent_id',Auth::user()->id)->where('goal_id',$go->id)->where('finalize',NULL)->first();
                                                    @endphp
                                                    @endif
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>{{$go->goal_title}}</legend>
                                                            <p>{{$go->goal_subtitle}}</p>
                                                            <div class="form-group">
                                                                <textarea name="goal[][{{$go->id}}]" class="form-control goal-textarea" rows="3">@if(!empty($goal_player) && !empty($user_goal)){{$user_goal->parent_comment}}@endif</textarea>
                                                            </div>
                                                        </fieldset>
                                                        <div class="goal-reciew-feedback">
                                                            <p>Linked Coach Feedback</p>
                                                            <div class="form-group">
                                                                <textarea class="form-control goal-textarea" readonly="" rows="3">@if(!empty($goal_player) && !empty($user_goal)){{$user_goal->coach_comment}}@endif</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <div class="col-md-12">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" class="form-check-input" name="confirmation" id="confirmation_msg">
                                                            <label class="confirm_msg form-check-label" for="exampleCheck1">{{ getAllValueWithMeta('confirmation_msg', 'badges') }}</label>
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div class="col-md-12">
                                                        <div class="player-goal-date">
                                                            <p><span>Date :</span> {{ date('d F Y') }} </p>
                                                        </div>
                                                        <button type="submit" class="cstm-btn main_button">set goal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="advance" role="tabpanel" aria-labelledby="advance">
                                        <div class="player-goal-level-advance">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="page-description">
                                                        <p class="goal-setting-text">{!! getAllValueWithMeta('goals_desc', 'badges') !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(Session::has('success'))
                                            <div class="alert_msg alert alert-success">
                                                <p>{{ Session::get('success') }} </p>
                                            </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form id="goals1" action="{{route('badges')}}" method="POST" class="select-player-goal-form goal-filter">
                                                        @csrf
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4 col-sm-6">
                                                                <!-- <label for="inputPlayer">Select Player :</label> -->
                                                                <select id="goal_player" name="goal_player" class="form-control">
                                                                    <option selected="" disabled="">Select Player</option>
                                                                    @php
                                                                    $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
                                                                    @endphp
                                                                    @foreach($children as $ch)
                                                                    <option value="{{$ch->id}}" @if(isset($goal_player)) @if($ch->id == $goal_player)
                                                                        selected
                                                                        @endif
                                                                        @endif
                                                                        >{{$ch->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <input type="hidden" name="goal_type" value="advanced">
                                                            <div class="form-group col-md-2">
                                                                <button id="save_goal" class="cstm-btn main_button">Submit</button>
                                                                <a href="{{url('/user/badges')}}" class="cstm-btn main_button">Reset</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="player-goal-info">
                                                        <ul class="player-goal-inner-text-wrap">
                                                            <li>
                                                                <h2>{{ getAllValueWithMeta('specific_title', 'badges') }}</h2>
                                                                <p>{{ getAllValueWithMeta('specific_desc', 'badges') }}</p>
                                                            </li>
                                                            <li>
                                                                <h2>{{ getAllValueWithMeta('measurable_title', 'badges') }}</h2>
                                                                <p>{{ getAllValueWithMeta('measurable_desc', 'badges') }}</p>
                                                            </li>
                                                            <li>
                                                                <h2>{{ getAllValueWithMeta('achievable_title', 'badges') }}</h2>
                                                                <p>{{ getAllValueWithMeta('achievable_desc', 'badges') }}</p>
                                                            </li>
                                                            <li>
                                                                <h2>{{ getAllValueWithMeta('realistic_title', 'badges') }}</h2>
                                                                <p>{{ getAllValueWithMeta('realistic_desc', 'badges') }}</p>
                                                            </li>
                                                            <li>
                                                                <h2>{{ getAllValueWithMeta('timed_title', 'badges') }}</h2>
                                                                <p>{{ getAllValueWithMeta('timed_desc', 'badges') }}</p>
                                                            </li>
                                                        </ul>
                                                        <form id="goal_detail1" enctype="multipart/form-data" action="{{route('advanced_goal')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="goal_player_name" class="goal_player_name" value="{{isset($goal_player) ? $goal_player : ''}}">
                                                            <input type="hidden" name="pl_goal_type" id="pl_goal_type" value="advanced">
                                                            <input type="hidden" name="parent_id" value="{{Auth::user()->id}}">
                                                            <div class="outer-wrap-player-goal">
                                                                <div class="accordian_summary">
                                                                    <div class="card">
                                                                        @php
                                                                        $ad_goals = DB::table('goals')->where('goal_type','advanced')->groupBy('advanced_type')->orderBy('id','asc')->get();
                                                                        @endphp
                                                                        @foreach($ad_goals as $goals)
                                                                        <div class="card-header">
                                                                            <a class="collapsed card-link" data-toggle="collapse" href="#goal-{{$goals->id}}">
                                                                                @if($goals->advanced_type == 'technical')
                                                                                My technical tennis goals
                                                                                @elseif($goals->advanced_type == 'tactical')
                                                                                My tactical tennis goals
                                                                                @elseif($goals->advanced_type == 'physical')
                                                                                My physical tennis goals
                                                                                @elseif($goals->advanced_type == 'mental')
                                                                                My mental tennis goals
                                                                                @endif
                                                                            </a>
                                                                        </div>
                                                                        <div id="goal-{{$goals->id}}" class="collapse">
                                                                            <div class="card-body">
                                                                                <div class="report-table-wrap report-tab-sec report-tab-one player_rp_detail matches-dtl">
                                                                                    <div class="col-md-12 report_row">
                                                                                        @php
                                                                                        $get_goals = DB::table('goals')->where('advanced_type',$goals->advanced_type)->get();
                                                                                        @endphp
                                                                                        @foreach($get_goals as $go)
                                                                                        @if(!empty($goal_player))
                                                                                        @php
                                                                                        $user_goal = DB::table('set_goals')->where('player_id',$goal_player)->where('parent_id',Auth::user()->id)->where('goal_type','advanced')->where('advanced_type',$go->advanced_type)->where('goal_id',$go->id)->first();
                                                                                        @endphp
                                                                                        @endif
                                                                                        <div class="col-md-12">
                                                                                            <fieldset class="player-goal-card">
                                                                                                <legend>{{$go->goal_title}}</legend>
                                                                                                <p>{{$go->goal_subtitle}}</p>
                                                                                                <div class="form-group">
                                                                                                    <textarea name="ad_goal[{{$go->advanced_type}}][{{$go->id}}]" class="form-control goal-textarea" rows="3">@if(!empty($goal_player) && !empty($user_goal)){{$user_goal->parent_comment}}@endif</textarea>
                                                                                                </div>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                        @endforeach
                                                                                        <div class="goal-reciew-feedback">
                                                                                            <p>Linked Coach Feedback</p>
                                                                                            <div class="form-group">
                                                                                                <textarea class="form-control goal-textarea" readonly="" rows="3">@if(!empty($goal_player) && !empty($user_goal)){{$user_goal->coach_comment}}@endif</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-check">
                                                                    <input type="checkbox" class="form-check-input" name="confirmation" id="confirmation_msg">
                                                                    <label class="form-check-label" for="exampleCheck1">{{ getAllValueWithMeta('confirmation_msg', 'badges') }}</label>
                                                                </div>
                                                                <br />
                                                                <div class="player-goal-date">
                                                                    <p><span>Date :</span> {{ date('d F Y') }} </p>
                                                                </div>
                                                                <button type="submit" href="javascript:void(0);" class="cstm-btn main_button">set goals</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="all-goals" role="tabpanel" aria-labelledby="all-goals">
                                        <br /><br />
                                        <div class="col-md-12">
                                            <div class="player-report-table tbl_shadow">
                                                <div class="report-table-wrap">
                                                    <div class="m-b-table">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Player Name</th>
                                                                    <th>Parent Name</th>
                                                                    <th>Goal Type</th>
                                                                    <th>Linked Coach</th>
                                                                    <th>Finalized By</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                $goals = DB::table('set_goals')->where('parent_id',Auth::user()->id)->groupBy(['player_id', 'goal_type','finalize'])->orderBy('id','desc')->get();
                                                                @endphp
                                                                @if(count($goals)>0)
                                                                @foreach($goals as $go)
                                                                <tr>
                                                                    <td>
                                                                        <!-- <p>{{$go->goal_date}}</p> -->
                                                                        <p>@php echo date('d/m/Y',strtotime($go->created_at)); @endphp</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>@php echo getUsername($go->player_id); @endphp</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>@php echo getUsername($go->parent_id); @endphp</p>
                                                                    </td>
                                                                    <td>
                                                                        @if($go->goal_type == 'beginner')
                                                                        <p>Beginner</p>
                                                                        @elseif($go->goal_type == 'advanced')
                                                                        <p>Advanced</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <p>@if(!empty($go->coach_id)) @php echo getUsername($go->coach_id); @endphp @else - @endif</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>@if(!empty($go->finalized_by)) @php echo getUsername($go->finalized_by); @endphp @else - @endif</p>
                                                                    </td>
                                                                    @if($go->finalize == 1)
                                                                    <td>
                                                                        <p class="vou_prod_type" style="background:#c7f197;border-radius: 14px;padding: 0 20px;font-weight: 400;">Finalized</p>
                                                                    </td>
                                                                    @else
                                                                    <td><a onclick="return confirm('Are you sure you want to finalise this goal? Finalised goals cannot be changed.')" href="{{url('/user/goal/finalize')}}/@php echo base64_encode($go->id); @endphp" class="cstm-btn main_button">Finalize</a></td>
                                                                    @endif
                                                                    <td>
                                                                        <p><a href="{{url('/user/goal')}}/{{$go->goal_type}}/{{$go->goalID}}/add-comment">View</a></p>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                @else
                                                                <tr>
                                                                    <td colspan="5">
                                                                        <div class="no_results">
                                                                            <h3>No data found</h3>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-badges" role="tabpanel" aria-labelledby="nav-badges-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-page-heading">
                                    <h1>My Badges</h1>
                                    <p class="goal-setting-text">{!! getAllValueWithMeta('badges_desc', 'badges') !!}</p>
                                    <br />
                                </div>
                                @if(Session::has('success'))
                                <div class="alert_msg alert alert-success">
                                    <p>{{ Session::get('success') }} </p>
                                </div>
                                @endif
                                <!-- <form class="select-player-goal-form"> -->
                                <form action="{{route('badges')}}" method="POST" class="select-player-goal-form">
                                    @csrf
                                    <div class="form-row badges-select-bar">
                                        <div class="form-group col-lg-9 col-md-12 col-sm-12">
                                            <div class="col-md-4 col-sm-12 col-12   selt_opt ">
                                                <div class="outer-wrap">
                                                    <ul class="stepl-list">
                                                        <li>
                                                            <a href="#">
                                                                <div class="inner-wrap">
                                                                    <span>step</span>
                                                                    <p>1</p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <select id="inputPlayer" name="user_id" class="form-control">
                                                        <option selected="" disabled="">Select Player</option>

                                                    <!-- Active courses - Those who purchased by players and courses are not expired -->
                                                    @php 
                                                        $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
                                                       // $ids = [];
                                                    @endphp
                                                    @if(isset($children))
                                                        @foreach($children as $ch)
                                                            @php 
                                                                $current_date = date('Y-m-d');

                                                                $shop_data = DB::table('shop_cart_items')
                                                                ->leftjoin('courses', 'shop_cart_items.product_id', '=', 'courses.id')
                                                                ->leftjoin('users', 'shop_cart_items.child_id', '=', 'users.id')
                                                                ->where('courses.status',1)
                                                                ->where('shop_type','course')
                                                                ->where('shop_cart_items.child_id',$ch->id)
                                                                ->where('shop_cart_items.type','order')
                                                                ->where('courses.end_date','>',$current_date)
                                                                ->select('shop_cart_items.*','courses.*','users.name as user_name')
                                                                ->groupBy('shop_cart_items.child_id')->get();

                                                               // dd($shop_data);
                                                            @endphp

                                                            @foreach($shop_data as $key=>$sh)
                                                                <option value="{{isset($sh->child_id) ? $sh->child_id : ''}}">{{isset($sh->user_name) ? $sh->user_name : ''}}</option>
                                                            @endforeach
                                                        @endforeach
                                                    @endif    

                                                        <!-- @php
                                                        $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
                                                        $ids = [];
                                                        @endphp
                                                        @if(isset($children))
                                                        @foreach($children as $ch)
                                                        @php $ids[] = $ch->id; @endphp
                                                        @endforeach
                                                        @endif
                                                        @php
                                                        $user_badges = DB::table('user_badges')->whereIn('user_id', $ids)->orderBy('id','asc')->get();
                                                        $season = DB::table('seasons')->orderBy('id','asc')->get();
                                                        @endphp
                                                        @if(!empty($user_badges))
                                                        @foreach($user_badges as $bd)
                                                        @php
                                                        $user = DB::table('users')->where('id',$bd->user_id)->first();
                                                        @endphp
                                                        <option @if($user_id==$bd->user_id) selected @else @endif value="{{$bd->user_id}}">{{isset($user->name) ? $user->name : ''}}</option>
                                                        @endforeach
                                                        @endif -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-12  selt_opt ">
                                                <div class="outer-wrap">
                                                    <ul class="stepl-list">
                                                        <li>
                                                            <a href="#">
                                                                <div class="inner-wrap">
                                                                    <span>step</span>
                                                                    <p>2</p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <!-- <select id="season" name="season_id" class="form-control"> -->
                                                    <select name="season_id" id="season" class="form-control">
                                                        @php 
                                                            $active_seasons = DB::table('seasons')->where('status',1)->orderBy('id','desc')->get();
                                                        @endphp
                                                        <option selected="" disabled="">Select Term</option>
                                                        @foreach($active_seasons as $se)
                                                        <option value="{{$se->id}}">{{$se->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4  col-sm-12 selt_opt ">
                                                <div class="outer-wrap">
                                                    <ul class="stepl-list">
                                                        <li>
                                                            <a href="#">
                                                                <div class="inner-wrap">
                                                                    <span>step</span>
                                                                    <p>3</p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <select id="course" name="course_id" class="form-control">
                                                        <option selected="" disabled="">Select Course</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-1" style="margin-left:10px">
                                    <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                                  </div> -->
                                        </div>
                                        <div class="col-lg-3 col-md-12 select-button" style="margin-right:10px;">
                                            <button type="submit" class="cstm-btn main_button">Submit</button>
                                            <a href="{{url('/user/badges')}}" class="cstm-btn main_button">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    
                        @if(!empty($user_id))
                        @php
                            $check_name = DB::table('users')->where('id',$user_id)->first();
                        @endphp
                        <form action="{{url('/user/show-name')}}/{{$user_id}}" method="POST">
                            @csrf
                            <input type="hidden" name="u_id" value="{{$user_id}}">
                            <div class="outer_wrap_playes">
                                <div class="form-group row">
                                    <!-- <label for="relation" class="col-md-12 col-form-label text-md-right">Do you want to show player name in leaderboard?</label> -->
                                    <div class="form-radios">
                                        <p class="holiday_camps" style="display: inline-block; font-weight: 500; margin-right: 15px;">Do you want to show this player's name in the leaderboard below?</p>
                                    </div>
                                    <div class="cstm-radio">
                                        <input type="radio" name="show_name" id="show_name_yes" value="1" @if($check_name->show_name == '1') checked @endif>
                                        <label for="show_name_yes">Yes</label>
                                    </div>
                                    <div class="cstm-radio booking">
                                        <input type="radio" name="show_name" id="show_name_no" value="0" @if($check_name->show_name == '0') checked @endif>
                                        <label for="show_name_no">No</label>
                                    </div>
                                    <p class="leaderboard-note"><span>Please Note</span>: If you select YES, this player's name will appear in the leaderboard below and will be visable and public for other users to see. If you select NO, this player's name will show as 'annonymous' to all other users.</p>
                                </div>
                                <button class="cstm-btn main_button" type="submit">Submit</button>
                            </div>
                        </form>
                        @endif 
                        @if(!empty($shop))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="player-achievements-card">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-7">
                                            <div class="player-info">
                                                <figure class="player-img-wrap " id="badges-form">
                                                    @if(!empty($user_id)) 
                                                    @php $user = DB::table('users')->where('id',$user_id)->first();
                                                    @endphp
                                                    @else
                                                    @php $user = DB::table('users')->where('id',$user_id)->first();
                                                    @endphp
                                                    @endif
                                                    <div class="profile--img pt-20">
                                                        @if(!empty($user->profile_image))
                                                        @php
                                                        $check_icon = DB::table('icon_images')->where('icon_image',$user->profile_image)->first();
                                                        @endphp
                                                        @if(!empty($check_icon))
                                                        <img style="width:50%;" src="{{URL::asset('/uploads/icons')}}/{{$user->profile_image}}" id="Image_Preview" alt="">
                                                        <a href="{{url('/user/upload-profile-image')}}/@php echo base64_encode($user->id); @endphp"><label for="upload_img" class="select-file"><i class="fas fa-pencil-alt"></i></label></a>
                                                        @else
                                                        <img style="width:50%;" src="{{URL::asset('/uploads')}}/{{$user->profile_image}}" id="Image_Preview" alt="">
                                                        <a href="{{url('/user/upload-profile-image')}}/@php echo base64_encode($user->id); @endphp"><label for="upload_img" class="select-file"><i class="fas fa-pencil-alt"></i></label></a>
                                                        @endif
                                                        <!--  <input id="upload_img" name="image" class="upload--profile-image" accept="image/*" onchange="ImagePreviewURL(this);">
                                                                    <input type="hidden" name="oldimage" value="{{URL::asset('/uploads')}}/{{$user->profile_image}}"> -->
                                                        @else
                                                        <img style="width:50%;" src="{{ URL::asset('images/default.jpg')}}" id="Image_Preview" alt="">
                                                        <a href="{{url('/user/upload-profile-image')}}/@php echo base64_encode($user->id); @endphp"><label for="upload_img" class="select-file"><i class="fas fa-pencil-alt"></i></label></a>
                                                        <!--  <input id="upload_img" name="image" class="upload--profile-image" accept="image/*" onchange="ImagePreviewURL(this);">
                                                                    <input type="hidden" name="oldimage" value="{{URL::asset('/uploads')}}/{{$user->profile_image}}"> -->
                                                        @endif
                                                    </div>
                                                    <br />
                                                    <!-- <button type="submit" class="cstm-btn main_button">Update</button> -->
                                                    <!-- </form> -->
                                                    <!-- @if(isset($user->profile_image))
                                      <img class="upload--profile-image" accept="image/*" onchange="ImagePreviewURL(this);" src="{{URL::asset('/uploads')}}/{{$user->profile_image}}">
                                      @else
                                      <img class="upload--profile-image" accept="image/*" onchange="ImagePreviewURL(this);" src="{{ URL::asset('images/default.jpg')}}">
                                      @endif -->
                                                </figure>
                                                <div class="player-name-points">
                                                    @if(!empty($user_id))
                                                    @php
                                                        $user = DB::table('users')->where('id',$user_id)->first();
                                                        //$course = DB::table('courses')->where('id',$course_id)->where('season',$season_id)->first();
                                                        //$badges_data = DB::table('user_badges')->where('user_id',$user_id)->first();
                                                    @endphp

                                                    @else

                                                    @php 
                                                        $user = DB::table('users')->where('id',$shop->child_id)->first();
                                                        //$course = DB::table('courses')->where('id',$shop->product_id)->first();
                                                        //$badges_data = DB::table('user_badges')->where('user_id',$shop->child_id)->first();

                                                    @endphp

                                                    @endif



                                                    @if(!empty($user_id))

                                                        <h2>{{$user->name}}</h2>

                                                        <h2>Points : <span>{{!empty($user_id) ? $badges_points : '0'}} Points</span></h2>

                                                        <h2>Tennis club name : <input type="text" id="update_tennis_club" value="{{$user->tennis_club}}" data-shop="{{$shop->id}}" data-id="{{$user->id}}"></h2>

                                                        <h2>Course: <span>{{isset($courses_list) ? $courses_list : ''}}</span></h2>

                                                        <h2>Stage : <span>{{isset($course_subcat_list) ? $course_subcat_list : ''}}</span></h2>

                                                    @else

                                                        <h2>{{$user->name}}</h2>

                                                        <h2>Points : <span>{{!empty($user_id) ? $badges_points : '0'}} Points</span></h2>

                                                        <h2>Tennis club name : <input type="text" id="update_tennis_club" value="{{$user->tennis_club}}" data-shop="{{$shop->id}}" data-id="{{$user->id}}"></h2>

                                                        <h2>Course: <span>{{isset($courses_list) ? $courses_list : ''}}</span></h2>

                                                        <h2>Stage : <span>{{isset($course_subcat_list) ? $course_subcat_list : ''}}</span></h2>

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5  col-md-5">
                                            <div class="player-achievements">
                                                <!-- <h2>achievements</h2> -->
                                                <ul class="achievement-medals">
                                                    <!-- @php
                                                        $badges_data = DB::table('user_badges')->where('user_id',$shop->child_id)->first();
                                                    @endphp -->

                                                    @php //dd($ass_badges_data); @endphp

                                                    @if(!empty($ass_badges_data) && $ass_badges_data != null)

                                                    @php
                                                        $selected_badges = explode(',',$ass_badges_data);
                                                        $all_badges = DB::table('badges')->get()->toArray();
                                                    @endphp

                                                    @if(isset($all_badges))
                                                        @foreach($all_badges as $badge)
                                                            @if(in_array($badge->id,$selected_badges))
                                                                <li><img class="active-badge" src="{{URL::asset('/uploads')}}/{{$badge->image}}">
                                                            </li>
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="player-achie-disable-list">
                                                <div class="inner-wrap">
                                                    <p class="custom-heading">Still to achieve – Click to see what you need to do</p>
                                                    <ul class="achievement-medals">
                                                        @if(!empty($ass_badges_data) && $ass_badges_data != null)
                                                        @foreach($all_badges as $badge)
                                                        @if(in_array($badge->id,$selected_badges))
                                                        @else
                                                        <li title="{!! $badge->description !!}"><img class="disable-badge" src="{{URL::asset('/uploads')}}/{{$badge->image}}"></li>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="achievement-day">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="school-bages-card">
                                    <div class="day-content">
                                        <p class="day-wise">Badges</p>
                                    </div>
                                  <!--   @php
                                        $badges_data = DB::table('user_badges')->where('user_id',$shop->child_id)->first();
                                    @endphp -->
                                    @if(!empty($selected_badges) && $ass_badges_data != null)
                                    @php
                                        $selected_badges = explode(',',$ass_badges_data);
                                        $all_badges = DB::table('badges')->get()->toArray();
                                    @endphp
                                    @foreach($all_badges as $badge)
                                    @if(in_array($badge->id,$selected_badges))
                                    @php
                                        $sort_id = $badge->sort;
                                        $next_id = $sort_id+1;
                                        $next_badges = DB::table('badges')->where('sort',$next_id)->get();
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="school-card">
                                                <figure>
                                                    <!-- <img class="badge-img" src="{{URL::asset('/uploads')}}/{{$badge->image}}"> -->
                                                </figure>
                                                <p>{{$badge->name}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 offset-md-1">
                                            <div class="school-details">
                                                <!-- <p><span>Venu :</span> xyz school, uk</p>
                                    <p><span>Date :</span> Mon 10 February 2020</p>
                                    <p><span>Result :</span> Lorem Ipsum is simply dummy text of the printing</p> -->
                                                <p>{!! $badge->description !!}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="day-medal-wrap">
                                                <figure>
                                                    <img src="{{URL::asset('/uploads')}}/{{$badge->image}}">
                                                </figure>
                                            </div>
                                        </div>
                                    </div><br />
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="tab-pane fade" id="nav-leaderboard" role="tabpanel" aria-labelledby="nav-leaderboard-tab">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="leader-bord-heading-wrap">
                                <h1>Leader Board</h1>
                            </div>

                            <p class="goal-setting-text">{!! getAllValueWithMeta('leaderboard_desc', 'badges') !!}</p><br/>
                        </div>
                        <form action="{{route('badges')}}" method="POST" class="select-player-goal-form">
                            @csrf
                            <div class="form-row badges-select-bar">
                                <div class="form-group col-lg-9 col-md-12 col-sm-12">
                                    <div class="col-md-6 col-sm-12 col-12 selt_opt">
                                        <div class="outer-wrap">
                                            <ul class="stepl-list">
                                                <li>
                                                    <a href="#">
                                                        <div class="inner-wrap">
                                                            <span>step</span>
                                                            <p>1</p>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <select id="term" name="term" class="form-control">
                                                <option selected="" disabled="">Select Term</option>
                                                @php $season = DB::table('seasons')->where('status',1)->get(); @endphp
                                                @foreach($season as $se)
                                                <option value="{{$se->id}}">{{$se->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 selt_opt">
                                        <div class="outer-wrap">
                                            <ul class="stepl-list">
                                                <li>
                                                    <a href="#">
                                                        <div class="inner-wrap">
                                                            <span>step</span>
                                                            <p>2</p>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            
                                            <select id="stage" name="stage" class="form-control">
                                                <option selected="" disabled="">Select Stage</option>
                                                <option value="">All Age Groups</option>
                                                <!-- @php
                                                    $user_badges = DB::table('user_badges')->orderBy('id','asc')->get();
                                                @endphp
                                                @foreach($user_badges as $bd)
                                                @php
                                                    $shop11 = DB::table('shop_cart_items')->where('shop_type','course')->where('orderID','!=',NULL)->where('child_id',$bd->user_id)->where('course_season',$bd->season_id)->groupBy('product_id')->get();
                                                    $course = DB::table('courses')->where('season',$bd->season_id)->first();
                                                    $subcat = [];
                                                @endphp
                                                @foreach($shop11 as $sh)
                                                @php
                                                    $course = DB::table('courses')->where('id',$sh->product_id)->first();
                                                    $subcat = !empty($course->subtype) ? getProductCatname($course->subtype) : '';
                                                @endphp

                                                @if(!empty($course->subtype))
                                                    <option value="{{!empty($course->subtype) ? $course->subtype : ''}}">{{!empty($subcat) ? $subcat : ''}}</option>
                                                @endif

                                                @endforeach
                                                @endforeach -->


                                                <!-- Get tennis categories - as per new badges functionality -->
                                                @php 
                                                    $stages = DB::table('product_categories')->where('parent','156')->where('subparent',0)->orderBy('sorting','asc')->get();
                                                @endphp

                                                @foreach($stages as $st)
                                                    <option value="{{$st->id}}">{{$st->label}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-1" style="margin-left:10px">
                                <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                              </div> -->
                                </div>
                                <div class="col-lg-3 col-md-12 select-button" style="margin-right:10px;">
                                    <button type="submit" class="cstm-btn main_button">Submit</button>
                                    <a href="{{url('/user/badges')}}" class="cstm-btn main_button">Reset</a>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12">
                            <div class="leader-board-table">
                                <div class="leadertable-wrap">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Place</th>
                                                <th>Player Name</th>
                                                <th>Player Age</th>
                                                <th>Stage</th>
                                                <th>Tennis Club</th>
                                                <th>Points</th>
                                                <th>Achievements</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($user_badge1))
                                                @php
                                                    $i = 1+ ($user_badge1->currentpage()-1)* $user_badge1->perpage();
                                                @endphp
                                            @endif

                                            @if(!empty($user_badge1) && count($user_badge1)> 0)

                                            @foreach($user_badge1 as $bd)
                                                @php
                                                    $user = DB::table('users')->where('id',$bd->user_id)->first();
                                                    $shop = DB::table('shop_cart_items')->where('shop_type','course')->where('orderID','!=',NULL)->where('child_id',$bd->user_id)->where('course_season',$bd->season_id)->get();
                                                    $course_subcategory = [];
                                                @endphp

                                            @foreach($shop as $sh)
                                                @php
                                                    $course = DB::table('courses')->where('id',$sh->product_id)->first();
                                                    $course_subcategory[] = !empty($course->subtype) ? getProductCatname($course->subtype) : '';
                                                @endphp
                                            @endforeach

                                            @if(!empty($user))
                                                @php
                                                    $selected_badges = explode(',',$bd->badges);
                                                    $user_age = strtotime($user->date_of_birth);
                                                    $current_date = strtotime(date('Y-m-d'));
                                                    $age_diff = abs($current_date - $user_age);
                                                    $years = floor($age_diff / (365*60*60*24));
                                                @endphp
                                            @endif

                                            <tr>
                                                <td>
                                                    <p>@php echo $i++; @endphp</p>
                                                </td>
                                                <td>
                                                    @if($user->show_name == 1)
                                                        <p>{{$user->name}}</p>
                                                    @elseif($user->show_name == 0)
                                                        <p>Anonymous</p>
                                                    @elseif(empty($user) && $user->show_name != 0 && $user->show_name != 1)
                                                        <p><b>User Not found</b></p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p>{{isset($years) ? $years : ''}} Years</p>
                                                </td>
                                                <td>
                                                    <p>{{implode(',',$course_subcategory)}}</p>
                                                </td>
                                                <td>
                                                    <p>{{isset($user->tennis_club) ? $user->tennis_club : ''}}</p>
                                                </td>
                                                <td>
                                                    <p>
                                                        @php
                                                        $points = array();
                                                        @endphp
                                                        @if(!empty($selected_badges))
                                                        @foreach($selected_badges as $data=>$value)
                                                        @php
                                                        $badge = DB::table('badges')->where('id',$value)->first();
                                                        $points[] = $badge->points;
                                                        @endphp
                                                        @endforeach
                                                        @php $total_points = array_sum($points); @endphp
                                                        {{$total_points}}
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <ul class="leader-bord-bages">
                                                        <li>
                                                            <figure>
                                                                @if(!empty($selected_badges))
                                                                @foreach($selected_badges as $data=>$value)
                                                                @php $badge = DB::table('badges')->where('id',$value)->first(); @endphp
                                                        <li title="{!! $badge->description !!}"><img style="width:40px;height:40px; object-fit:contain;" src="{{URL::asset('/uploads')}}/{{$badge->image}}"></li>
                                                        @endforeach
                                                        @endif
                                                        </figure>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="7">
                                                    <div class="offset-md-4 col-md-4 sorry_msg">
                                                        <div class=""><br />
                                                            <h3>No Data Found</h3></br>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                @if(!empty($user_badge1))
                                {{$user_badge1->render()}}
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="tab-pane fade" id="nav-reports" role="tabpanel" aria-labelledby="nav-reports-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-page-heading">
                                    <h1>Player Reports</h1>
                                    <!--  <a href="{{url('/user/coach-reports')}}" style="float: right;" class="cstm-btn main_button">Add Competition</a> -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-description">
                                    <p class="goal-setting-text" style="font-size:16px;">{!! getAllValueWithMeta('report_desc', 'badges') !!}</p>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="col-md-12">
                            @php
                                $logined_user_id = \Auth::user()->id;
                                $children = DB::table('users')->where('parent_id',$logined_user_id)->orderBy('id','asc')->get();
                                $child_id = [];
                            @endphp
                            @foreach($children as $ch)
                                @php $child_id[] = $ch->id; @endphp
                            @endforeach
                            @if(count($child_id)>0)
                            @php
                                $reports = DB::table('player_reports')->whereIn('player_id',$child_id)->orderBy('id','desc')->paginate(5);
                            @endphp
                            @if(count($reports)> 0)
                            <div class="player-report-table tbl_shadow goal_reports rp_list_section">
                                <div class="report-table-wrap">
                                    <div class="m-b-table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Report Type</th>
                                                    <th>Player</th>
                                                    <th>Season</th>
                                                    <th>Course</th>
                                                    <!-- <th>Feedback</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($reports as $sh)
                                                <tr>
                                                    <td>
                                                        <p>@php echo date("d/m/Y", strtotime($sh->date)); @endphp</p>
                                                    </td>
                                                    <td>
                                                        <p>@if($sh->type == 'simple') End of Term Report @elseif($sh->type == 'complex') Player Report @endif</p>
                                                    </td>
                                                    <td>
                                                        <p>@php echo getUsername($sh->player_id); @endphp</p>
                                                    </td>
                                                    <td>
                                                        <p>@if($sh->season_id) @php echo getSeasonname($sh->season_id); @endphp @else - @endif</p>
                                                    </td>
                                                    <td>
                                                        <p>@if($sh->course_id) @php echo getCourseName($sh->course_id); @endphp @else - @endif</p>
                                                    </td>
                                                    <!-- <td>
                                                                <p>{!! Illuminate\Support\Str::words($sh->feedback, 5, ' ...') !!}</p>
                                                            </td> -->
                                                    <td>
                                                        <p><a href="{{url('user/player-report')}}/@php echo base64_encode($sh->id); @endphp">View Report</a></p>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{$reports->render()}}
                            @else
                            <div class="noData offset-md-4 col-md-4 sorry_msg">
                                <div class="no_results">
                                    <h3>Sorry, no results</h3>
                                    <p>No Report Found</p>
                                </div>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-matches" role="tabpanel" aria-labelledby="nav-matches-tab">
                        <section class="member section-padding">
                            <div class="container">
                                <div class="pink-heading comp_matches">
                                    <h2 class="comp_and_match">My Competitions & Matches</h2>
                                    <a class="add_competition cstm-btn main_button" href="{{ route('coach_report') }}">Add Competition</a>
                                </div>

                                
                                <div class="col-md-12">

                                	<div class="row">
	                                    <div class="col-md-12">
	                                        <div class="page-description">
	                                            <p class="goal-setting-text" style="font-size:16px;">{!! getAllValueWithMeta('matches_desc', 'badges') !!}</p>
	                                        </div>
	                                    </div>
	                                </div>

                                    @php
                                    $user_role = \Auth::user()->role_id;
                                    if($user_role == '3')
                                    {
                                    $competitions = DB::table('competitions')->where('coach_id',Auth::user()->id)->paginate(10);
                                    }
                                    elseif($user_role == '2'){
                                    $competitions = DB::table('competitions')->where('parent_id', Auth::user()->id)->paginate(10);
                                    }
                                    @endphp
                                    @if(count($competitions)> 0)
                                    <div class="player-report-table tbl_shadow">
                                        <div class="report-table-wrap">
                                            <div class="m-b-table">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Player Name</th>
                                                            <th>Competition Type</th>
                                                            <th>Competition Date</th>
                                                            <th>Competition Venue</th>
                                                            <th>Competition Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(count($competitions)>0)
                                                        @foreach($competitions as $sho)
                                                        <tr>
                                                            <td>
                                                                <p>@php echo getUsername($sho->player_id); @endphp</p>
                                                            </td>
                                                            <td>
                                                                <p>{{$sho->comp_type}}</p>
                                                            </td>
                                                            <td>
                                                                <p>@php echo date("d/m/Y", strtotime($sho->comp_date)); @endphp</p>
                                                            </td>
                                                            <td>
                                                                <p>{{$sho->comp_venue}}</p>
                                                            </td>
                                                            <td>
                                                                <p>{{$sho->comp_name}}</p>
                                                            </td>
                                                            <td>
                                                                <p><a href="{{url('/user/competitions')}}/@php echo base64_encode($sho->id); @endphp">View Matches</a></p>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            @if(count($competitions)>0)
                                            {{$competitions->render()}}
                                            @endif
                                        </div>
                                    </div>
                                    @else
                                    <div class="noData offset-md-4 col-md-4 sorry_msg">
                                        <div class="no_results">
                                            <h3>Sorry, no results</h3>
                                            <p>No Competition Found</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                   <!--  <div class="tab-pane fade" id="nav-schedule" role="tabpanel" aria-labelledby="nav-schedule-tab">
                        <div class="inner-content">

                            <figure class="schedule-img-wrap">
                                <img class="b-icon" src="{{ URL::asset('images/coming-soon.png')}}">
                            </figure>
                        </div>
                    </div> -->
                    <div class="tab-pane fade" id="nav-stats" role="tabpanel" aria-labelledby="nav-stats-tab">
                        <div class="row">

                            <form id="stats_filter" style="width: 100%;" action="{{route('badges')}}" method="POST"> 
                            @csrf

                            <br/>

                            <div class="col-lg-12 col-md-12 d-print-none">
                                <!-- <div class="textarea_rwo_wrap"> -->
                                <div class="">
                                    <p>{!! getAllValueWithMeta('stats_desc', 'badges') !!}</p>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                
                                 <div class="tab-page-heading">
                                    <h1 class="print_heading">Match Stats</h1>
                                    
                                    <br>
                                </div>
                                <ul class="stats-list">
                                   
                                    <li><p><span>Player Name</span> : @php echo getUsername($stats_participant_name); @endphp</p></li>
                                    <li><p><span>Date</span> : @php echo date('d-m-Y'); @endphp</p></li>
                                    <li><p><span>Report Type</span> :   
                                        @if(!empty($stats_match_no))
                                            @if($stats_match_no == 'all')
                                                All Matches
                                            @elseif($stats_match_no == '1')
                                                Last Match
                                            @else
                                                Last {{$stats_match_no}} matches
                                            @endif
                                        @endif
                                    </p></li>
                                </ul>
                            </div>

                            <div class="row stat_from_row d-print-none">
                            <div class="col-lg-8 col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">@php //dd($stats_participant_name); @endphp
                                        <div class="form-group upper-input-row">
                                            <select id="stats_participant_name" name="stats_participant_name" class="form-control">
                                                <option selected="" disabled="">Select Player</option>
                                                @php
                                                $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
                                                @endphp
                                                @foreach($children as $ch)
                                                <option value="{{$ch->id}}" @if(!empty($stats_participant_name)) @if($stats_participant_name == $ch->id) selected @endif @endif>{{$ch->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 d-print-none">
                                        <div class="form-group upper-input-row">
                                            <select id="stats_match_no" name="stats_match_no" class="form-control">
                                                <option selected="" disabled="">Tell me what to show you</option>
                                                <option value="1" @if(!empty($stats_match_no)) @if($stats_match_no == '1') selected @endif @endif>My Last match</option>
                                                <option value="5" @if(!empty($stats_match_no)) @if($stats_match_no == '5') selected @endif @endif>Last 5 matches</option>
                                                <option value="10" @if(!empty($stats_match_no)) @if($stats_match_no == '10') selected @endif @endif>Last 10 matches</option>
                                                <option value="15" @if(!empty($stats_match_no)) @if($stats_match_no == '15') selected @endif @endif>Last 15 matches</option>
                                                <option value="20" @if(!empty($stats_match_no)) @if($stats_match_no == '20') selected @endif @endif>Last 20 matches</option>
                                                <option value="all" @if(!empty($stats_match_no)) @if($stats_match_no == 'all') selected @endif @endif>All matches</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 button_wrap_row d-print-none">                               
                                <button type="submit" class="cstm-btn main_button">Submit</button>
                                <a href="{{url('/user/badges')}}" class="cstm-btn main_button">Reset</a>                               
                            </div>
                        </div>
                        </form>

                        </div>

                        @php //dd($average_stats); @endphp
                        @if(!empty($average_stats))
                        <div class="col-lg-12 col-md-12">
                            <div class="status-card">
                                <div class="row cstm-sm-row">

                                    <!-- 1. Total points played in match -->
                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">

                                                <div class="round" id="Score-13" data-value="@php echo $average_stats['tp_in_match']/1000; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content">
                                                     <p class="number-text">1</p>
                                                    <div class="icon_wrap ">
                                                        <span><img src="{{url::asset('/images/1.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">Total points <br/>played in match</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Your % points won in match -->
                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">

                                                <div class="round" id="Score-8" data-value="@php echo $average_stats['percent_won_in_match']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content score-1-text">
                                                      <p class="number-text">2</p>
                                                    <div class="icon_wrap ">
                                                        <span><img src="{{url::asset('/images/1.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">% points won in match</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Your % of 1st serves in -->
                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">

                                                <div class="round" id="Score" data-value="@php echo $average_stats['percent_1serves_in']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content">
                                                      <p class="number-text">3</p>
                                                    <div class="icon_wrap ">
                                                        <span><img src="{{url::asset('/images/1.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">% of 1<sup>st</sup> serves in</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 4. Your opponent's % of points won in match -->
                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">

                                                <div class="round" id="Score-9" data-value="@php echo $average_stats['op_percent_pts_won']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content score-1-text">
                                                      <p class="number-text">4</p>
                                                    <div class="icon_wrap">
                                                        <span><img src="{{url::asset('/images/1.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">Opponent's % of points won</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 5. Your opponent's % of 1st serves in -->
                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">
                                                <div class="round" data-id="1" id="Score-10" data-value="@php echo $average_stats['op_percent_1serves_in']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content">
                                                      <p class="number-text">5</p>
                                                    <div class="icon_wrap">
                                                        <span><img src="{{url::asset('/images/2.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">Opponent's % of 1<sup>st</sup> serves in</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">
                                                <div class="round" data-id="1" id="Score-1" data-value="@php echo $average_stats['percent_pts_won_1serve']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content score-1-text">
                                                      <p class="number-text">6</p>
                                                    <div class="icon_wrap">
                                                        <span><img src="{{url::asset('/images/2.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">% of points won from 1<sup>st</sup><strong> serve</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">
                                                <div class="round" data-id="1" id="Score-2" data-value="@php echo $average_stats['percent_pts_won_2serve']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content score-2-text">
                                                     <p class="number-text">7</p>
                                                    <div class="icon_wrap">
                                                        <span><img src="{{url::asset('/images/3.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">% of points won from 2<sup>nd</sup>serve</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                       
                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">
                                                <div class="round" data-id="1" id="Score-11" data-value="@php echo $average_stats['percent_pts_won_op_1serve']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content score-1-text">
                                                     <p class="number-text">8</p>
                                                    <div class="icon_wrap">
                                                        <span><img src="{{url::asset('/images/2.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">% points won on opponent's 1<sup>st</sup> serve</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">
                                                <div class="round" data-id="1" id="Score-12" data-value="@php echo $average_stats['percent_pts_won_op_2serve']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content ">
                                                     <p class="number-text">9</p>
                                                    <div class="icon_wrap">
                                                        <span><img src="{{url::asset('/images/2.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">% points won on opponent's 2<sup>nd</sup> serve</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">
                                                <div class="round" data-id="1" id="Score-3" data-value="@php echo $average_stats['percent_pts_won_rally_1shots']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content score-1-text">
                                                     <p class="number-text">10</p>
                                                    <div class="icon_wrap">
                                                        <span><img src="{{url::asset('/images/1.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">% of points won when rally was 1-4 shots</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">
                                                <div class="round" data-id="1" id="Score-4" data-value="@php echo $average_stats['percent_pts_won_rally_5shots']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content score-2-text">
                                                     <p class="number-text">11</p>
                                                    <div class="icon_wrap">
                                                        <span><img src="{{url::asset('/images/2.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">% of points won when rally was 5+ shots</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">
                                                @php //$average_stats['rally_length'] = 21.90; @endphp
                                                <div class="round" data-id="1" id="Score-5" data-value="@php echo $average_stats['rally_length']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content score-1-text">
                                                     <p class="number-text">12</p>
                                                    <div class="icon_wrap">
                                                        {{$average_stats['rally_length']}}
                                                        <span><img src="{{url::asset('/images/3.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">Average rally length</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_bar_row">
                                        <div class="progress-status-card">
                                            <div class="progress-box">
                                                <div class="round" data-id="1" id="Score-6" data-value="@php echo $average_stats['average_aces']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content score-2-text">
                                                     <p class="number-text">13</p>
                                                    <div class="icon_wrap">
                                                        {{$average_stats['average_aces']}}
                                                        <span><img src="{{url::asset('/images/1.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">Total aces</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php //dd($average_stats['total_double_faults']); @endphp
                                    <div class="col-lg-4  col-md-4 col-xs-4 stats_row_bar">
                                        <div class="progress-status-card">
                                            <div class="progress-box">
                                                <div class="round" data-id="1" id="Score-7" data-value="@php echo $average_stats['total_double_faults']/100; @endphp" total-value="100" data-size="120" data-thickness="20">
                                                    <strong class="progress-value"><span></span></strong>
                                                </div>
                                                <div class="inner-content score-1-text">
                                                     <p class="number-text">14</p>
                                                    <div class="icon_wrap">
                                                        @php 
                                                            $average_value = $average_stats['total_double_faults'];
                                                            $integer = floor($average_value);      
                                                            $fraction = $average_value - $integer; 
                                                        @endphp
                                                        {{$average_stats['total_double_faults']}}
                                                        <span><img src="{{url::asset('/images/2.png')}}"></span>
                                                    </div>
                                                    <p class="prog_text">Total double faults</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="#" style="float:right;" onclick="window.print();" class="d-print-none cstm-btn main_button">Print</a>
                        @else
                        <div class="noData offset-md-4 col-md-4 sorry_msg">
                            <div class="no_results">
                                <h3>Sorry, no results</h3>
                                <p>No Data Found</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @else
            <div class="noData offset-md-4 col-md-4 sorry_msg">
                <div class="no_results">
                    <h3>Sorry, no results</h3>
                    <p>No Data Found</p>
                </div>
            </div>
            @endif
        </div>
    </div>
    </div>
    </div>
</section>
<!-- ******************************
    |   Testimonial - Start Here
    |********************************** -->
<section class="testimonial-sec d-print-none">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-heading text-center">
                    <div class="section-heading">
                        <h1 class="sec-heading">Testimonials</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="testimonial-slider owl-carousel owl-theme">
                    @foreach($testimonial as $test)
                    <div class="item">
                        <div class="testimonial-card alt-testimonial-card">
                            <figure class="testimonial-img-wrap">
                                <img class="nb-icon" src="{{ URL::asset('images/nb-icon.png')}}">
                                <img class="b-icon" src="{{ URL::asset('images/b-icon.png')}}">
                            </figure>
                            <figcaption class="testimonial-caption">
                                <p>{{$test->description}}</p>
                                <div class="t-user">
                                    <div class="round-arrow">
                                        <img src="{{ URL::asset('/images/round-arrow-img.png')}}">
                                    </div>
                                    <h3>{{$test->title}}</h3>
                                    <span>
                                        @if($test->image)
                                        <img src="{{ URL::asset('uploads')}}/{{$test->image}}">
                                        @else
                                        <img src="{{ URL::asset('images/default.jpg')}}">
                                        @endif
                                    </span>
                                </div>
                            </figcaption>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ******************************
    |   Testimonial - End Here
    |********************************** -->
<section class="click-here-sec d-print-none">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="click-sec-content">
                    <h2 class="click-sec-tagline">Need help with kids camps or our coaching courses?</h2>
                    <ul class="click-btn-content">
                        <li>
                            <figure>
                                <img src="{{url('/public/images/click-btn-img.png')}}">
                            </figure>
                        </li>
                        <li>
                            <a href="#" class="cstm-btn main_button">Click Here</a>
                        </li>
                        <li>
                            <figure>
                                <img src="{{url('/public/images/click-btn-img.png')}}">
                            </figure>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection