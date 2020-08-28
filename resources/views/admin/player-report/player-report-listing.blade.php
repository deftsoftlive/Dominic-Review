@extends('layouts.admin')

@section('content')

<style>
p.rep_type {
    color: #3f4d67;
    font-weight: 600;
    border-radius: 12px;
    margin: 0px 14px 0px 1px;
}
</style>
<div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Player Reports</h5>
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

                                            <h5>Player Reports</h5>
                                            <div class="cst-admin-filter">
                                            </div>
                                        </div>
                                        <br/>

                                        <!-- Filter Section - Start -->
                                        <form action="{{route('admin.player_reports.listing')}}" method="POST" class="cst-selection">
                                        @csrf
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" name="player_name" placeholder="Enter Player Name">
                                                    </div>
                                                        
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" name="coach_name" placeholder="Enter Coach Name">
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <select name="course" class="form-control">
                                                          <option value="" selected="" disabled="">Select Course</option>
                                                          @php 
                                                            $player_report = DB::table('player_reports')->get();
                                                          @endphp

                                                          @foreach($player_report as $rep)
                                                            <option value="{{$rep->course_id}}">@php echo getCourseName($rep->course_id); @endphp</option>
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-sm-1" style="margin-right:10px;">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>

                                                    <div class="col-sm-1" style="margin-left:10px">
                                                        <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                                                    </div>
                                                </div><br/>
                                            </div>
                                        </form>
                                        <!-- Filter Section - End -->
                                        
                                        <!-- <div class="card-block table-border-style pl_rp_design"> -->
                                        <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                          @include('admin.error_message')
                                            <table class="table table-hover">
                                                <thead>
                                                <tr> 
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Created By</th>
                                                    <th>Player</th>
                                                    <th>Season</th>
                                                    <th>Course</th>
                                                    <!-- <th>Feedback</th> -->
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($reports)>0)
                                                @foreach($reports as $sh)
                                                  <tr>
                                                    <td><p>@php echo date("d/m/Y", strtotime($sh->date)); @endphp</p></td>
                                                    <td><p>@if($sh->type == 'simple') End of term report @elseif($sh->type == 'complex') Player report @endif</p></td>
                                                    <td>@php echo getUsername($sh->coach_id); @endphp</td>
                                                    <td><p>@php echo getUsername($sh->player_id); @endphp</p></td>
                                                    <td><p>@if(!empty($sh->season_id)) @php echo getSeasonname($sh->season_id); @endphp @else - @endif</p></td>
                                                    <td><p>@if(!empty($sh->course_id)) @php echo getCourseName($sh->course_id); @endphp @else - @endif</p></td>
                                                    <!-- <td><p>{!! Illuminate\Support\Str::words($sh->feedback, 6, ' ...') !!}</p></td> -->
                                                    <td><p><a href="{{url('admin/player-report')}}/{{$sh->id}}">View Report</a></p></td> 
                                                  </tr>
                                                @endforeach
                                                @else
                                                    <tr><td colspan="8"><div class="no_results"><h3>No result found</h3></div></td></tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        @if(count($reports)>0)
                                            {{ $reports->render() }}
                                        @endif
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>


@endsection