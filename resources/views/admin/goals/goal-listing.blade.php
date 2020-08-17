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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($goals as $go)
                            <tr>
                                <td><p>{{$go->goal_date}}</p></td>
                                <td><p>@php echo getUsername($go->player_id); @endphp</p></td>
                                <td><p>@php echo getUsername($go->parent_id); @endphp</p></td>
                                <td><p>
                                  @if($go->goal_type == 'beginner')
                                    <p>Beginner</p>
                                  @elseif($go->goal_type == 'advanced')
                                    <p>Advanced</p>
                                  @endif
                                </p></td>
                                <td><p><a href="{{url('/admin/goal')}}/{{$go->goal_type}}/{{$go->id}}">View</a></p></td> 
                            </tr>
                            @endforeach

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