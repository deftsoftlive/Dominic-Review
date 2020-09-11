@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')
<div class="account-menu d-print-none">
    <div class="container">
        <div class="menu-title">
            <span>Account</span> menu
        </div>
        <nav>
            <ul>
                @php
                    $user_id = \Auth::user()->role_id;
                @endphp
                @if($user_id == '2')
                    @include('inc.parent-menu')
                @elseif($user_id == 3)
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
@endif
<section class="coach-goal-comment-sec">
    <div class="container">
      <div class="pink-heading btn-right">
        <div class="print_logo print-logo-design">
            <img height="70px;" width="120px;" src="{{url('')}}/public/uploads/1584078701website_logo.png">
        </div>
        
        <h2>Update Your Goals</h2>
        <a class="cstm-btn d-print-none" href="{{url('/user/badges')}}">Back to menu</a>
        <button class="cstm-btn d-print-none" id="goal_print">Print</button>
        <br/><br/>
      </div>

    <div class="col-md-12 invoice_apd">
        @if(!empty($get_goal))
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

                </tbody>
            </table>

            </div>
       
            </div>
          </div>

            @else
              <div class="noData offset-md-4 col-md-4 sorry_msg">
                <div class="no_results">
                  <h3>Sorry, no results</h3>
                  <p>No Invoice Found</p>
                </div>
              </div>
            @endif      
    </div>

    <br/></br/>

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

                    @if(Auth::user()->role_id == 3)
                    @php 
                        $user_goal = DB::table('set_goals')->where('player_id',$get_goal->player_id)->where('parent_id',$get_goal->parent_id)->where('coach_id',Auth::user()->id)->where('goal_id',$go->id)->first(); 
                    @endphp
                    @elseif(Auth::user()->role_id == 2)
                    @php 
                        $user_goal = DB::table('set_goals')->where('player_id',$get_goal->player_id)->where('parent_id',Auth::user()->id)->where('coach_id',$get_goal->coach_id)->where('goal_id',$go->id)->first(); 
                    @endphp
                    @endif
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
                                    <textarea @if($user_goal->finalize == 1) readonly="" @endif class="form-control goal-textarea" name="goal[{{$go->id}}]" rows="3">@if(!empty($user_goal)){{$user_goal->coach_comment}}@endif</textarea>
                                </div>
                        </div>
                    </div>
                    @endforeach

                    @if($user_goal->finalize == '')<button type="submit" class="cstm-btn">Submit</button>@endif
                </form>
            </div>
        </div>
      @endif

      @if($get_goal->goal_type == 'advanced')
        <div class="player-goal-level-advance">
            <div class="row">
                <div class="col-md-12">
                    <div class="player-goal-info">
                        <form action="{{route('save_ad_coach_comment')}}" method="POST">
                        @csrf
                        <input type="hidden" name="goal_player_name" id="goal_player_name" value="{{$get_goal->player_id}}">
                        <input type="hidden" name="pl_goal_type" id="pl_goal_type" value="{{$get_goal->goal_type}}">
                        <input type="hidden" name="parent_id" value="{{$get_goal->parent_id}}">
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
                                                                <textarea name="coach_comment[{{$go->advanced_type}}]" class="form-control goal-textarea" rows="3">{{isset($user_goal->coach_comment) ? $user_goal->coach_comment : ''}}</textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                           <!--  <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">““I promise to work hard and do my best to achieve the goals that I have set for myself””</label>
                            </div>
                            <div class="player-goal-date">
                                <p><span>Date :</span> 21 February 2020 </p>
                            </div> -->
                        </div>
                        <div class="set-goal-btn-wrap">
                           @if($user_goal->finalize == '') <button type="submit" href="javascript:void(0);" class="cstm-btn">Submit</button> @endif
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
      @endif
    </div>
</section>

@endsection