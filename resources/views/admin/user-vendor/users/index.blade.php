@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Users</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
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
                        <h5>Users</h5>
                        <div class="cst-admin-filter">
                            <a href="{{ route('add_user') }}" class="btn btn-primary">Add</a>
                            <a href="#" class="btn btn-primary">Children</a>
                          	<a href="{{ route('parent_users') }}" class="btn btn-primary">Parents / Adults</a>
                          	<a href="{{ route('coach_users') }}" class="btn btn-primary">Coaches</a>
                        </div>
                        <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                          @include('admin.error_message')
                          
                            <table id="example2" class="table table-hover">
                                <thead>
                                <tr> 
                                    <th>Name</th> 
                                    <th>DOB</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Action</th>

                                </tr>admin/users
                                </thead>
                                <tbody>
                                @foreach($users as $user) 
                                @php $dob = date("d-m-Y", strtotime($user->date_of_birth)); @endphp
                                    <tr>
                                        <td>@if($user->gender == 'male')
                                                <i class="gender_icon fas fa-male"></i>
                                            @else
                                                <i class="gender_icon fas fa-female"></i>
                                            @endif
                                            &nbsp; {{$user->name}}</td>
                                        <td>{{$dob}}</td>
                                        <td>{{$user->email}}<br/>{{$user->phone_number}}</td>
                                        <td>{{$user->address}}, {{$user->town}}<br/>{{$user->postcode}}, {{$user->country}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a href="{{url('admin/users/edit')}}/{{$user->id}}" class="dropdown-item">Edit</a>
                                                    <a href="{{url('admin/user/delete')}}/{{$user->id}}" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{ $users->render() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

@endsection
