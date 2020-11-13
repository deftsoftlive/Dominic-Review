@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Goal Management</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@if(Session::has('success'))
<div class="alert_msg alert alert-success">
    <p>{{ Session::get('success') }} </p>
</div>
@endif

<!-- [ breadcrumb ] end -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Hover-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Goal Management</h5>
                    </div>
                    <br/>
                    <!-- Filter Section - Start -->
                    <form action="{{route('admin.goal.list')}}" method="POST" class="cst-selection">
                    @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" name="player_name" class="form-control" value="" placeholder="Enter player name">
                                </div>

                                <div class="col-sm-1" style="margin-right:10px;">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                                <div class="col-sm-1" style="margin-left:10px">
                                    <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Filter Section - End -->
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                      @include('admin.error_message')
                        <table class="table table-hover">
                            <thead>
                            <tr> 
                                <th>Date</th>
                                <th>Player Name</th> 
                                <th>Parent Name</th>
                                <th>Goal Type</th>
                                <th>Linked Coach</th>
                                <th>Status</th>
                                <th>Finalized By</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($goals)>0)
                            @foreach($goals as $go)
                            <tr>
                                <td><p>{{$go->goal_date}}</p></td>
                                <td><p>@php echo getUsername($go->player_id); @endphp</p></td>
                                <td><p>@php echo getUsername($go->parent_id); @endphp</p></td>
                                <td>
                                  @if($go->goal_type == 'beginner')
                                    <p>Beginner</p>
                                  @elseif($go->goal_type == 'advanced')
                                    <p>Advanced</p>
                                  @endif
                                </td>
                                <td><p>@if(!empty($go->coach_id)) @php echo getUsername($go->coach_id); @endphp @else - @endif</p></td>
                                @if($go->finalize == 1)
                                    <td><p class="vou_prod_type" style="background:#c7f197;border-radius: 14px;padding: 0 5px;"><span class="cst_active cc_cursor"><i class="fas fa-check-circle cc_cursor"></i></span><b> Finalized</b></p></td>
                                @else
                                    <td>-</td>
                                @endif
                                <td><p>@if(!empty($go->finalized_by)) @php echo getUsername($go->finalized_by); @endphp @else - @endif</p></td>
                                <td>
                                    <p><a href="{{url('/admin/goal')}}/{{$go->goal_type}}/{{$go->id}}">View</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a onclick="return confirm('Are you sure you want to delete this goal?')" href="{{url('/admin/goal')}}/delete/{{$go->goal_type}}/{{$go->id}}">Delete</a></p>
                                </td> 
                            </tr>
                            @endforeach
                            @else
                                <tr><td colspan="5"><div class="no_results"><h3>No data found</h3></div></td></tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $goals->render() }}
                </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


@endsection