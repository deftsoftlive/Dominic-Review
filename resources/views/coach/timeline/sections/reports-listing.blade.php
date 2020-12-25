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
        <h2>My Reports</h2>
    </div>

<h5><b>Player Name</b> - @php echo getUsername($player_id); @endphp</h5>

    <div class="all-members">
	  <div class="row">

		@if(count($reports)> 0)
        <div class="player-report-table tbl_shadow goal_reports rp_list_section">
            <div class="report-table-wrap">
                <div class="m-b-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Report Type</th>
                                <!-- <th>Player</th> -->
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
                                <!-- <td>
                                    <p>@php echo getUsername($sh->player_id); @endphp</p>
                                </td> -->
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
        <div class="noData offset-lg-4 col-lg-4 offset-md-3 col-md-6 offset-sm-2 col-sm-8 sorry_msg">
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