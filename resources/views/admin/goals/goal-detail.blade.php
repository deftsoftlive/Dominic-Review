@extends('layouts.admin')
 
@section('content')
<section class="coach-goal-comment-sec goal_comment">
    <div class="container">
     
    @if($get_goal->goal_type == 'beginner')

        <div class="player-goal-level-beginner">
            <div class="row">

                    <input type="hidden" name="goal_player_name" id="goal_player_name" value="{{$get_goal->player_id}}">
                    <input type="hidden" name="pl_goal_type" id="pl_goal_type" value="{{$get_goal->goal_type}}">
                    <input type="hidden" name="parent_id" value="{{$get_goal->parent_id}}">

                    @php $goals = DB::table('goals')->where('goal_type','beginner')->get(); @endphp

                    @foreach($goals as $go)
                    @php 
                        $user_goal = DB::table('set_goals')->where('player_id',$get_goal->player_id)->where('parent_id',$get_goal->parent_id)->where('coach_id',$get_goal->coach_id)->where('goal_id',$go->id)->first(); 
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
                                    <textarea readonly="" class="form-control goal-textarea" name="goal[{{$go->id}}]" rows="3">@if(!empty($user_goal)){{$user_goal->coach_comment}}@endif</textarea>
                                </div>
                        </div>
                    </div>
                    @endforeach
                  
                </form>
            </div>
        </div>

    @elseif($get_goal->goal_type == 'advanced') 

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
                           
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    @endif

    </div>
</section>
@endsection