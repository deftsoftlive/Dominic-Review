@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Subscribed Users</h5>
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
                    <div class="card-header" style="justify-content: normal;float:right;">
                        <h5>Subscribed Users</h5>
                        <a href="{{url('admin/subscribed-users/active')}}" class="btn btn-primary" style="color:white;">Active Subscribed Users</a>
                        <a href="{{route('send_subscriber_email')}}" class="btn btn-primary" style="color:white;">Send Email</a>
                    </div>

                <div class="card-block table-border-style">
                    <div class="table-responsive">
                      @include('admin.error_message')
                        <table class="table table-hover">
                            <thead>
                            <tr> 
                                <th>Subscribed Email</th>
                                <th>Status</th>
                                <th>Unsubscribed By</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribed_users as $users)
                            @if(!empty($users->email))
                                <tr>
                                    <td>{{$users->email}}</td>
                                    <td>
                                    @if($users->status == '1')
                                        <span class="cst_active"><i class="fas fa-check-circle"></i></span>
                                    @else
                                        <span class="cst_in-active"><i class="fas fa-times-circle"></i></span>
                                    @endif
                                    </td>
                                    <td>@if($users->unsubscribed_by == 1) Admin @else User @endif</td>

                                    @if($users->status == '1')
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">

                                                <a onclick="return confirm('Are you sure you want to unsubscribe this email?')" href="{{url('admin/unsubscribed-users')}}/{{$users->id}}" class="dropdown-item">Unsubscribe</a>
                                            </div>
                                        </div>
                                    </td>
                                    @else
                                    <td></td>
                                    @endif
                                </tr>
                            @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $subscribed_users->render() }}
                </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


@endsection