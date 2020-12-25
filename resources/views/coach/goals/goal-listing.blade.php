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
@if(Session::has('error'))
<div class="alert_msg alert alert-danger">
    <p>{{ Session::get('error') }} </p>
</div>
@endif
<section class="member section-padding">
  <div class="container">
  <div class="outer-wrap">
    <div class="row">
  <div class="col-md-12 pink-heading">
    <h2>Goals</h2>  
  </div>

  <div class="row">
    <div class="textbox-manage ">
      <p>{!! getAllValueWithMeta('coach_goals', 'textbox-management') !!}</p>
    </div>
  </div>

  <div class="col-md-12 invoice_apd">

        @if(count($goals)> 0)
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
                    <th>Finalized By</th>
                    <th>Finalize</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($goals as $go)

                  <tr>
                    <!-- <td><p>{{$go->goal_date}}</p></td> -->
                    <td><p>@php echo date('d/m/Y',strtotime($go->created_at)); @endphp</p></td>
                    <td><p>@php echo getUsername($go->player_id); @endphp</p></td>
                    <td><p>@php echo getUsername($go->parent_id); @endphp</p></td>
                    <td><p>
                      @if($go->goal_type == 'beginner')
                        <p>Beginner</p>
                      @elseif($go->goal_type == 'advanced')
                        <p>Advanced</p>
                      @endif
                    </p></td>
                    <td><p>@if(!empty($go->finalized_by)) @php echo getUsername($go->finalized_by); @endphp @else - @endif</p></td>
                   	@if($go->finalize == 1)
                   		<td><p>Finalized</p></td>
                   	@else
                    	<td><a onclick="return confirm('Are you sure you want to finalise this goal? Finalised goals cannot be changed.')" href="{{url('/user/goal/finalize')}}/@php echo base64_encode($go->id); @endphp" class="cstm-btn main_button">Finalize</a></td> 
                    @endif
                    <td><p><a class="cstm-btn main_button" href="{{url('/user/goal')}}/{{$go->goal_type}}/{{$go->goalID}}/add-comment">View</a></p></td>
                  </tr>
                @endforeach

                </tbody>
            </table>

            </div>
       
            </div>
          </div>

            @else
              <div class="noData offset-lg-4 col-lg-4 offset-md-3 col-md-6 offset-sm-2 col-sm-8 sorry_msg">
                <div class="no_results">
                  <h3>Sorry, no results</h3>
                  <p>No Invoice Found</p>
                </div>
              </div>
            @endif


                    
        </div>
  </div>
</div>
</section>


@endsection