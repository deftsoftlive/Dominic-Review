@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')

<style>
table.stats.table.table-bordered.cst-reports th {
    width: 70%;
}   
</style>
<div class="account-menu acc_sub_menu d-print-none">
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
<!-- Success Message -->
@if(Session::has('success'))               
<div class="alert_msg alert alert-success">
   <p>{{ Session::get('success') }} </p>
</div>
@endif
<section class="member view_stats section-padding">
   <div class="container">
      <div class="pink-heading comp_match btn-right match_wrap-res">
         <h2 class="text-left">Match Stats&nbsp; </h2>
          <button class="cstm-btn main_button d-print-none" onclick="window.print();" >Print</button>
      </div>
      @php $competition = DB::table('competitions')->where('id',$comp_id)->first(); @endphp
      <div class="player-report-table tbl_shadow matches-wrap">
         <div class="report-table-wrap">
            <div class="m-b-table">
               <table class="matches-wrap-table">
                  <thead>
                     @php 
                        $comp = DB::table('competitions')->where('id',$comp_id)->first();
                        $match = DB::table('match_reports')->where('id',$match_id)->first();
                     @endphp
                     <tr>
                        <th>Competition Name</th>
                        <th>Player Name</th>
                        <th>Opponent Name</th>
                        <th>Match Result</th>
                        <th>Match Score</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>{{$comp->comp_name}}</td>
                        <td>@php echo getUsername($comp->player_id); @endphp</td>
                        <td>{{$match->opponent_name}}</td>
                        <td>{{isset($match->result) ? $match->result : ''}}</td>
                        <td>{{isset($match->score) ? $match->score : ''}}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      @if(!empty($stats_calculation))
         <div class="accordian_summary">
            <div class="card">
               <div id="Personal-{{$match->id}}">
                  <div class="card-body">
                     <div class="report-table-wrap report-tab-sec report-tab-one player_rp_detail matches-dtl">
                        <div class="col-md-12 report_row">
                           <table class="stats table table-bordered cst-reports">
                              <tbody>
                                 <tr>
                                    <th>
                                       <p><b>1) Total points played in match </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['tp_played']}}</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>2) Your % points won in match </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['percent_pts_won']}}%</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>3) Your % of 1st serves in </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['percent_1serves_in']}}%</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>4) Your opponent’s % of points won in match </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['op_percent_pts_won']}}%</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>5) Your opponent’s % of 1st serves in </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['op_percent_1serves_in']}}%</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>6) Your % of points won from 1st serve </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['percent_pts_won_1serve']}}%</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>7) Your % of points won from 2nd serve </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['percent_pts_won_2serve']}}%</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>8) Your % of points won on opponent’s 1st serve </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['percent_pts_won_op_1serve']}}%</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>9) Your % of points won on opponent’s 2nd serve </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['percent_pts_won_op_2serve']}}%</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>10) Your % of points won when rally was 1-4 shots </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['percent_pts_won_rally_1shots']}}%</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>11) Your % of points won when rally was 5+ shots </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['percent_pts_won_rally_5shots']}}%</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>12) Average rally length </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['average_rally_length']}}</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>13) Your total Aces </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['total_aces']}}</b></h5></td>
                                 </tr>
                                 <tr>
                                    <th>
                                       <p><b>14) Your total Double faults </b></p>
                                    </th>
                                    <td><h5><b>{{$stats_calculation['total_double_faults']}}</b></h5></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      @else
         <div class="no_results">
            <h3>No result found.</h3>
         </div>
      @endif
   </div>
</section>
@endsection