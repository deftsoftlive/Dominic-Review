@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Competition Matches</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- [ breadcrumb ] end -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Hover-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                <div class="card-header">
                    <h5>Competition Match Stats</h5>
                </div>

                @if(!empty($stats_calculation)) 
                <div class="accordian_summary">
                    <div class="card">
                           <div class="card-body">
                              <div class="report-table-wrap report-tab-sec report-tab-one player_rp_detail matches-dtl">
                                 <div class="col-md-12 report_row">
                                  @php 
                                    $comp = DB::table('competitions')->where('id',$comp_id)->first();
                                    $match = DB::table('match_reports')->where('id',$match_id)->first();
                                  @endphp
                                  <h6><b>Competition Name </b>- {{$comp->comp_name}}</h6>
                                  <h6><b>Player Name </b>- @php echo getUsername($comp->player_id); @endphp</h6>
                                  <h6><b>Opponent Name </b>- {{$match->opponent_name}}</h6>
                                  <br/>

                                    <table class="table table-bordered cst-reports">
                                       <tbody>
                                          <tr>
                                             <th>
                                                <p><b>1) Total points played in match </b></p>
                                             </th>
                                             <td>{{$stats_calculation['tp_played']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>2) Your percentage points won in match </b></p>
                                             </th>
                                             <td>{{$stats_calculation['percent_pts_won']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>3) Your percentage of 1st serves in </b></p>
                                             </th>
                                             <td>{{$stats_calculation['percent_1serves_in']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>4) Your opponent’s percentage of points won in match </b></p>
                                             </th>
                                             <td>{{$stats_calculation['op_percent_pts_won']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>5) Your opponent’s percentage of 1st serves in </b></p>
                                             </th>
                                             <td>{{$stats_calculation['op_percent_1serves_in']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>6) Your percentage of points won from 1st serve </b></p>
                                             </th>
                                             <td>{{$stats_calculation['percent_pts_won_1serve']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>7) Your percentage of points won from 2nd serve </b></p>
                                             </th>
                                             <td>{{$stats_calculation['percent_pts_won_2serve']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>8) Your percentage of points won on opponent’s 1st serve </b></p>
                                             </th>
                                             <td>{{$stats_calculation['percent_pts_won_op_1serve']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>9) Your percentage of points won on opponent’s 2nd serve </b></p>
                                             </th>
                                             <td>{{$stats_calculation['percent_pts_won_op_2serve']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>10) Your percentage of points won when rally was 1-4 shots </b></p>
                                             </th>
                                             <td>{{$stats_calculation['percent_pts_won_rally_1shots']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>11) Your percentage of points won when rally was 5+ shots </b></p>
                                             </th>
                                             <td>{{$stats_calculation['percent_pts_won_rally_5shots']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>12) Average rally length </b></p>
                                             </th>
                                             <td>{{$stats_calculation['average_rally_length']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>13) Your total Aces </b></p>
                                             </th>
                                             <td>{{$stats_calculation['total_aces']}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>14) Your total Double faults </b></p>
                                             </th>
                                             <td>{{$stats_calculation['total_double_faults']}}</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                     </div>
                </div>
                @else
                  &nbsp;<h4>&nbsp;&nbsp;No Data Found</h4>&nbsp;
                @endif

                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

@endsection