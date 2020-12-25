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

      <div class="row">
       <div class="textbox-manage ">
         <p>{!! getAllValueWithMeta('coach_competition', 'textbox-management') !!}</p>
       </div>
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

                        @php $link_req = DB::table('parent_coach_reqs')->where('child_id',$sho->player_id)->where('coach_id',Auth::user()->id)->where('status',1)->first(); @endphp


                        @if(!empty($link_req))       
                           <tr>
                              <td>
                                 <p>@if(!empty(getUsername($sho->player_id))) @php echo getUsername($sho->player_id); @endphp @else <b>User not found</b> @endif</p>
                              </td>
                              <td>
                                 <p>{{$sho->comp_type}}</p>
                              </td>
                              <td>
                                 <p>{{date('d/m/Y',strtotime($sho->comp_date))}}</p>
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
                        @endif

                        @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>
          
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
</section>
@endsection