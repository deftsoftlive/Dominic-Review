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
                    <h5>Competition Matches</h5>
                </div>

                <div class="card-block table-border-style">
                    <div class="table-responsive">
                      @include('admin.error_message')
                        <table class="table table-hover">

                            <tbody>
                              <tr>
                                 <th>
                                    <p><b>Competition Date </b></p>
                                 </th>
                                 <td>
                                    <h4><strong>{{$competition->comp_date}}</strong></h4>
                                 </td>
                              </tr>
                              <tr>
                                 <th>
                                    <p><b>Competition Player Name </b></p>
                                 </th>
                                 <td>@php echo getUsername($competition->player_id); @endphp</td>
                              </tr>
                              <tr>
                                 <th>
                                    <p><b>Competition Created By </b></p>
                                 </th>
                                 <td>
                                    @if(!empty($competition->parent_id)) 
                                        @php echo getUsername($competition->parent_id); @endphp
                                    @elseif(!empty($competition->coach_id)) 
                                        @php echo getUsername($competition->coach_id); @endphp
                                    @endif
                                 </td>
                              </tr>
                              <tr>
                                 <th>
                                    <p><b>Competition Name </b></p>
                                 </th>
                                 <td>{{$competition->comp_name}}</td>
                              </tr>
                              <tr>
                                 <th>
                                    <p><b>Competition Type </b></p>
                                 </th>
                                 <td>{{$competition->comp_type}}</td>
                              </tr>
                              <tr>
                                 <th>
                                    <p><b>Competition Venue</b></p>
                                 </th>
                                 <td>{{$competition->comp_venue}}</td>
                              </tr>
                           </tbody>
                        </table>
                    </div>
                    
                </div>

                <div class="accordian_summary">
                    <div class="card">
                        @php
                            $i = 1; 
                            $matches = DB::table('match_reports')->where('comp_id',$competition->id)->get(); 
                        @endphp
                        @foreach($matches as $match)
                        <div class="card-header">
                           <a class="collapsed card-link" data-toggle="collapse" href="#Personal-{{$match->id}}">
                           <span>{{$i}}</span> {{$match->opponent_name}} - {{$match->result}} - {{$match->score}}
                           </a>
                           <a href="{{url('admin/competition')}}/{{$competition->id}}/match/{{$match->id}}/stats"><button class="btn btn-primary">View Stats</button></a>
                        </div>
                        <div id="Personal-{{$match->id}}" class="collapse" >
                           <div class="card-body">
                              <div class="report-table-wrap report-tab-sec report-tab-one player_rp_detail matches-dtl">
                                 <div class="col-md-12 report_row">
                                    <table class="table table-bordered  cst-reports">
                                       <tbody>
                                          <tr>
                                             <th>
                                                <p><b>Result </b></p>
                                             </th>
                                             <td>
                                                <h4><strong>{{isset($match->result) ? $match->result : ''}}</strong></h4>
                                             </td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>Score </b></p>
                                             </th>
                                             <td>{{isset($match->score) ? $match->score : ''}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>Start Date </b></p>
                                             </th>
                                             <td>{{isset($match->start_date) ? $match->start_date : ''}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>Surface Type </b></p>
                                             </th>
                                             <td>{{isset($match->surface_type) ? $match->surface_type : ''}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>What went well </b></p>
                                             </th>
                                             <td>{{isset($match->wht_went_well) ? $match->wht_went_well : ''}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>What could've been better </b></p>
                                             </th>
                                             <td>{{isset($match->wht_could_better) ? $match->wht_could_better : ''}}</td>
                                          </tr>
                                          <tr>
                                             <th>
                                                <p><b>Other Comments </b></p>
                                             </th>
                                             <td>{{isset($match->other_comments) ? $match->other_comments : ''}}</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <br/>
                                    <h4 class="image-heading">Game chart</h4>
                                    <ul class="img_wrap">
                                    @php 
                                      $game_charts = DB::table('match_game_charts')->where('comp_id',$competition->id)->where('match_id',$match->id)->where('player_id',$match->player_id)->get();
                                    @endphp

                                        @if(count($game_charts)>0)
                                          @foreach($game_charts as $chart)
                                          <li>
                                            <a target="_blank" href="{{URL::asset('/uploads/game-charts')}}/{{$chart->image}}"><img width="20%" src="{{URL::asset('/uploads/game-charts')}}/{{$chart->image}}"></a>
                                          </li>
                                          @endforeach
                                        @else
                                          <p>No data found.</p>
                                        @endif
                                      </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @php $i++; @endphp
                        @endforeach
                     </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

@endsection