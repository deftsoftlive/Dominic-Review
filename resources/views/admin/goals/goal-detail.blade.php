@extends('layouts.admin')
 
@section('content')
<section class="coach-goal-comment-sec goal_comment">
    <div class="container">

<div class="main-body">
<div class="page-wrapper">
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ Hover-table ] start -->
        <div class="col-xl-12">
            <div class="card">
            <div class="card-header">
                <h5>Goal Detail</h5>
            </div>
        
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-bordered  cst-reports reports-detail" style="width:100%">
                      <tr>
                        <th>Date</th>
                        <th>Player Name</th> 
                        <th>Parent Name</th>
                        <th>Goal Type</th>
                        <th>Linked Coach</th>
                      </tr>
                      <tr>
                        <td>{{$get_goal->goal_date}}</td>
                        <!-- <td><p>@php echo date('Y-m-d',strtotime($get_goal->created_at)); @endphp</p></td> -->
                        <td><p>@php echo getUsername($get_goal->player_id); @endphp</p></td>
                        <td><p>@php echo getUsername($get_goal->parent_id); @endphp</p></td>
                        <td><p>
                          @if($get_goal->goal_type == 'beginner')
                            <p>Beginner</p>
                          @elseif($get_goal->goal_type == 'advanced')
                            <p>Advanced</p>
                          @endif
                        </p></td>
                        <td><p>@php echo getUsername($get_goal->coach_id); @endphp</p></td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
     
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
                            <p>Linked Coach Feedback</p>
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
                                    @php $goals = DB::table('goals')->where('goal_type','advanced')->get(); @endphp

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

                                                    @php 
                                                        $user_goal = DB::table('set_goals')->where('player_id',$get_goal->player_id)->where('parent_id',$get_goal->parent_id)->where('coach_id',$get_goal->coach_id)->where('goal_id',$go->id)->first(); 
                                                    @endphp
                                                    <div class="col-md-12">
                                                        <fieldset class="player-goal-card">
                                                            <legend>{{$go->goal_title}}</legend>
                                                            <p>{{$go->goal_subtitle}}</p>
                                                                <div class="form-group">
                                                                    <textarea readonly="" name="ad_goal[{{$go->advanced_type}}][{{$go->id}}]" class="form-control goal-textarea" rows="3">{{isset($user_goal->parent_comment) ? $user_goal->parent_comment : ''}}</textarea>
                                                                </div>
                                                        </fieldset>   
                                                    </div>
                                                    @endforeach
                                                    <div class="goal-reciew-feedback">
                                                        <p>Write goal review feedback</p>
                                                            <div class="form-group">
                                                                <textarea readonly="" class="form-control goal-textarea" rows="3">{{isset($user_goal->coach_comment) ? $user_goal->coach_comment : ''}}</textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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