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

<section class="member section-padding">
  <div class="container">
  <div class="outer-wrap">
    <div class="row">
  <div class="col-md-12 pink-heading">
    <h2>Goals</h2>    
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
                    <th>Add Comment</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($goals as $go)

                  <tr>
                    <td><p>{{$go->goal_date}}</p></td>
                    <td><p>@php echo getUsername($go->player_id); @endphp</p></td>
                    <td><p>@php echo getUsername($go->parent_id); @endphp</p></td>
                    <td><p>
                      @if($go->goal_type == 'beginner')
                        <p>Beginner</p>
                      @elseif($go->goal_type == 'advanced')
                        <p>Advanced</p>
                      @endif
                    </p></td>
                    <td><p><a href="{{url('/user/goal')}}/{{$go->goal_type}}/{{$go->id}}/add-comment">View</a></p></td> 
                  </tr>
                @endforeach

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
  </div>
</div>
</section>


@endsection