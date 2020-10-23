@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')

@php 
    $country_code = DB::table('country_code')->get();
    $notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
    $user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first(); 
    $count=1;
@endphp 

<div class="account-menu">
    <div class="container">
        <div class="menu-title">
            <span>Account</span> menu
        </div>
        <nav>
            <ul>
            @php
            $user_role = \Auth::user()->role_id;
            @endphp
            @if($user_role == '2')
            @include('inc.parent-menu')
            @elseif($user_role == 3)
            @include('inc.coach-menu')
            @endif
            </ul>
        </nav>
    </div>
</div>

<section class="my-players section-padding coach_listing">
<div class="container">

<div class="pink-heading">
    <h2>My Competitions & Matches</h2>
</div>

@if(count($match_reports)> 0)
<div class="player-report-table tbl_shadow goal_reports rp_list_section">
    <div class="report-table-wrap">
        <div class="m-b-table">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Competition Name</th>
                        <th>Competition Type</th>
                        <th>Competition Venue</th>
                        <!-- <th>Report Type</th> -->
                        <th>Player</th>
                        <!-- <th>Season</th> -->
                        <!-- <th>Course</th> -->
                        <!-- <th>Feedback</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($match_reports as $sh)
                    <tr>
                        <td>
                            <p>@php echo date("d/m/Y", strtotime($sh->date)); @endphp</p>
                        </td>

                        @php $comp = DB::table('competitions')->where('id',$sh->comp_id)->first(); @endphp 
                        <td>
                            <p>{{$comp->comp_name}}</p>
                        </td>
                        <td>
                            <p>{{$comp->comp_type}}</p>
                        </td>
                        <td>
                            <p>{{$comp->comp_venue}}</p>
                        </td>
                    <!--     <td>
                            <p>@if($sh->type == 'simple') End of Term Report @elseif($sh->type == 'complex') Player Report @endif</p>
                        </td> -->
                        <td>
                            <p>@php echo getUsername($sh->player_id); @endphp</p>
                        </td>
                      <!--   <td>
                            <p>@if($sh->season_id) @php echo getSeasonname($sh->season_id); @endphp @else - @endif</p>
                        </td>
                        <td>
                            <p>@if($sh->course_id) @php echo getCourseName($sh->course_id); @endphp @else - @endif</p>
                        </td> -->
                        <!-- <td>
                            <p>{!! Illuminate\Support\Str::words($sh->feedback, 5, ' ...') !!}</p>
                        </td> -->
                        <td>
                            <p><a href="{{url('/user/competitions')}}/@php echo base64_encode($sh->id); @endphp">View Report</a></p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
{{$match_reports->render()}}
@else
<div class="noData offset-md-4 col-md-4 sorry_msg">
    <div class="no_results">
        <h3>Sorry, no results</h3>
        <p>No Report Found</p>
    </div>
</div>
@endif
</div>
</section>

@endsection