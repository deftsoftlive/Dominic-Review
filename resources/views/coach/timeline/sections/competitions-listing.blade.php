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
        <h2>My Competitions</h2>
    </div>

	<h5><b>Player Name</b> - @php echo getUsername($player_id); @endphp</h5>

    <div class="all-members">
	  <div class="row">

		@if(count($competitions)>0)
		<div class="player-report-table tbl_shadow">
		    <div class="report-table-wrap">
		       <div class="m-b-table">
		          <table>
		             <thead>
		                <tr>
		                   <!-- <th>Player Name</th> -->
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
		                   <!-- <td>
		                      <p>@php echo getUsername($sho->player_id); @endphp</p>
		                   </td> -->
		                   <td>
		                      <p>{{$sho->comp_type}}</p>
		                   </td>
		                   <td>
		                      <p>{{$sho->comp_date}}</p>
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
		<div class="noData offset-lg-4 col-lg-4 offset-md-3 col-md-6 offset-sm-2 col-sm-8 sorry_msg">
		    <div class="no_results">
		       <h3>Sorry, no results</h3>
		       <p>No Competition Found</p>
		    </div>
		</div>
		@endif

	</div>
	</div>

</div>
</section>

@endsection