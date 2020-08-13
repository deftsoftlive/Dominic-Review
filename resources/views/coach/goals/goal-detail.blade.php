@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')
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
@endif
<section class="coach-goal-comment-sec">
    <div class="container">
      <div class="pink-heading">
         <h2>Add comment</h2>
      </div>

      @if($get_goal->goal_type == 'beginner')
        <div class="player-goal-level-beginner">
            <div class="row">
               
                <form action="{{route('save_comment_by_coach')}}" class="col-md-12" method="POST">
                    @csrf
                    <input type="hidden" name="goal_player_name" id="goal_player_name" value="{{$get_goal->player_id}}">
                    <input type="hidden" name="pl_goal_type" id="pl_goal_type" value="{{$get_goal->goal_type}}">
                    <input type="hidden" name="parent_id" value="{{$get_goal->parent_id}}">

                    @php $goals = DB::table('goals')->where('goal_type','beginner')->get(); @endphp

                    @foreach($goals as $go)
                    @php 
                        $user_goal = DB::table('set_goals')->where('player_id',$get_goal->player_id)->where('parent_id',$get_goal->parent_id)->where('coach_id',Auth::user()->id)->where('goal_id',$go->id)->first(); 
                    @endphp
                    <div class="col-md-12">
                        <fieldset class="player-goal-card">
                            <legend>{{$go->goal_title}}</legend>
                            <p>{{$go->goal_subtitle}}</p>
                                <div class="form-group">
                                    <textarea readonly="" name="goal[{{$go->id}}]" class="form-control goal-textarea" rows="3">@if(!empty($user_goal)){{$user_goal->parent_comment}}@endif
                                    </textarea>
                                </div>
                        </fieldset>
                        <div class="goal-reciew-feedback">
                            <p>Write goal review feedback</p>
                                <div class="form-group">
                                    <textarea class="form-control goal-textarea" name="goal[{{$go->id}}]" rows="3">@if(!empty($user_goal)){{$user_goal->coach_comment}}@endif</textarea>
                                </div>
                        </div>
                    </div>
                    @endforeach

                    <button type="submit" class="cstm-btn">Submit</button>
                </form>
            </div>
        </div>
      @endif

      @if($get_goal->goal_type == 'advanced')
        <div class="player-goal-level-advance">
            <div class="row">
                <div class="col-md-12">
                    <div class="player-goal-info">
                        <div class="outer-wrap-player-goal">
                            <div class="accordian_summary">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#goal-1">
                                            My technical tennis goals
                                        </a>
                                    </div>
                                    <div id="goal-1" class="collapse">
                                        <div class="card-body">
                                            <div class="report-table-wrap report-tab-sec report-tab-one player_rp_detail matches-dtl">
                                                <div class="col-md-12 report_row">
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>MY BIG DREAMS</legend>
                                                            <p>What do you want to do or be when you are grown up? This doesn’t have to be tennis related</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>SHORT TERM TENNIS GOALS</legend>
                                                            <p>Between now and the end of the term</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>MEDIUM TERM TENNIS GOALS</legend>
                                                            <p>3 to 6 months from now</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                        <div class="goal-reciew-feedback">
                                                            <p>Write goal review feedback</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#goal-4">
                                            My Tactical tennis goals
                                        </a>
                                    </div>
                                    <div id="goal-4" class="collapse">
                                        <div class="card-body">
                                            <div class="report-table-wrap report-tab-sec report-tab-one player_rp_detail matches-dtl">
                                                <div class="col-md-12 report_row">
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>MY BIG DREAMS</legend>
                                                            <p>What do you want to do or be when you are grown up? This doesn’t have to be tennis related</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>SHORT TERM TENNIS GOALS</legend>
                                                            <p>Between now and the end of the term</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>MEDIUM TERM TENNIS GOALS</legend>
                                                            <p>3 to 6 months from now</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                        <div class="goal-reciew-feedback">
                                                            <p>Write goal review feedback</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#goal-2">
                                            My Physical tennis goals
                                        </a>
                                    </div>
                                    <div id="goal-2" class="collapse">
                                        <div class="card-body">
                                            <div class="report-table-wrap report-tab-sec report-tab-one player_rp_detail matches-dtl">
                                                <div class="col-md-12 report_row">
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>MY BIG DREAMS</legend>
                                                            <p>What do you want to do or be when you are grown up? This doesn’t have to be tennis related</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>SHORT TERM TENNIS GOALS</legend>
                                                            <p>Between now and the end of the term</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>MEDIUM TERM TENNIS GOALS</legend>
                                                            <p>3 to 6 months from now</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                        <div class="goal-reciew-feedback">
                                                            <p>Write goal review feedback</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#goal-3">
                                            My Mental tennis goals
                                        </a>
                                    </div>
                                    <div id="goal-3" class="collapse">
                                        <div class="card-body">
                                            <div class="report-table-wrap report-tab-sec report-tab-one player_rp_detail matches-dtl">
                                                <div class="col-md-12 report_row">
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>MY BIG DREAMS</legend>
                                                            <p>What do you want to do or be when you are grown up? This doesn’t have to be tennis related</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>SHORT TERM TENNIS GOALS</legend>
                                                            <p>Between now and the end of the term</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>MEDIUM TERM TENNIS GOALS</legend>
                                                            <p>3 to 6 months from now</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </fieldset>
                                                        <div class="goal-reciew-feedback">
                                                            <p>Write goal review feedback</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control goal-textarea" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">““I promise to work hard and do my best to achieve the goals that I have set for myself””</label>
                            </div>
                            <div class="player-goal-date">
                                <p><span>Date :</span> 21 February 2020 </p>
                            </div>
                        </div>
                        <div class="set-goal-btn-wrap">
                            <a href="javascript:void(0);" class="cstm-btn">set goals</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      @endif
    </div>
</section>
@if(Session::has('success'))
<div class="alert_msg alert alert-success">
    <p>{{ Session::get('success') }} </p>
</div>
@endif
@endsection