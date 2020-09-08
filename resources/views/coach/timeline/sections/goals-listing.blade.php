@extends('inc.homelayout')
@section('title', 'DRH|Listing')
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

<section class="section-padding cst-plyer section-padding coach_listing request-parent">
  <div class="container">
    <div class="pink-heading">
        <h2>My Goals</h2>
    </div>

    <h5><b>Player Name</b> - @php echo getUsername($player_id); @endphp</h5>

    <div class="all-members">
	  <div class="row">

		@if(count($goals)> 0)
        <div class="player-report-table tbl_shadow goal_reports rp_list_section">
            <div class="report-table-wrap">
                <div class="m-b-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <!-- <th>Player Name</th>  -->
                                <th>Parent Name</th>
                                <th>Goal Type</th>
                                <th>Linked Coach</th>
                                <th>Finalized By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($goals as $go)
                            <tr>
                                <td><p>{{$go->goal_date}}</p></td>
                                <!-- <td><p>@php echo getUsername($go->player_id); @endphp</p></td> -->
                                <td><p>@php echo getUsername($go->parent_id); @endphp</p></td>
                                <td>
                                  @if($go->goal_type == 'beginner')
                                    <p>Beginner</p>
                                  @elseif($go->goal_type == 'advanced')
                                    <p>Advanced</p>
                                  @endif
                                </td>
                                <td><p>@if(!empty($go->coach_id)) @php echo getUsername($go->coach_id); @endphp @else - @endif</p></td>
                                <td><p>@if(!empty($go->finalized_by)) @php echo getUsername($go->finalized_by); @endphp @else - @endif</p></td>
                                @if($go->finalize == 1)
                                    <td><p class="vou_prod_type" style="background:#c7f197;border-radius: 14px;padding: 0 20px;font-weight: 400;">Finalized</p></td>
                                @else
                                    <td><a onclick="return confirm('Are you sure you want to finalise this goal? Finalised goals cannot be changed.')" href="{{url('/user/goal/finalize')}}/@php echo base64_encode($go->id); @endphp" class="cstm-btn">Finalize</a></td> 
                                @endif
                                <td><p><a href="{{url('/user/goal')}}/{{$go->goal_type}}/{{$go->id}}/add-comment">View</a></p></td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        @if(count($goals)> 0)
            {{$goals->render()}}
        @endif
        @else
        <div class="noData offset-md-4 col-md-4 sorry_msg">
            <div class="no_results">
                <h3>Sorry, no results</h3>
                <p>No Report Found</p>
            </div>
        </div>
        @endif

	</div>
	</div>

</div>
</section>

@endsection