@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')
@php 
$country_code = DB::table('country_code')->get(); 
$notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
$user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first(); 
@endphp
<div class="account-menu acc_sub_menu">
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
<section class="member section-padding">
   <div class="container">
      <div class="pink-heading btn-right">
         <h2>My Competitions & Matches</h2>
         <a class="add_competition cstm-btn main_button" href="{{ route('coach_report') }}">Add Competition</a>
      </div>
      <div class="col-md-12">
         @if(count($competitions)> 0)
         <div class="player-report-table tbl_shadow">
            <div class="report-table-wrap">
               <div class="m-b-table">
                  <table>
                     <thead>
                        <tr>
                           <th>Player Name</th>
                           <th>Opponent Type</th>
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
                           <td>
                              <p>@php echo getUsername($sho->player_id); @endphp</p>
                           </td>
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
         <div class="noData offset-md-4 col-md-4 sorry_msg">
            <div class="no_results">
               <h3>Sorry, no results</h3>
               <p>No Competition Found</p>
            </div>
         </div>
         @endif
      </div>
   </div>
</section>
@endsection