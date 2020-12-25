@extends('layouts.admin')

@section('content')

<div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">{{$name}}</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="{{ url(route($addLink)) }}">Add</a></li>
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

                                            <h5>{{$name}}</h5>
                                            <div class="cst-admin-filter">
                                                <a href="{{ url(route($addLink)) }}" class="btn btn-primary">Add</a>
                                            </div>
                                           
                                            <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                        
                                    </div>
                                        <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                          @include('admin.error_message')
                                            <table class="table table-hover">
                                                <thead>
                                                <tr> 
                                                    <th>Name</th>
                                                    <!-- <th>Description</th> -->
                                                    <th>Image</th> 
                                                    <th>End date</th>
                                                    <th>Points</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($badge as $bd)
                                                    <tr>
                                                        <td>
                                                        @if($bd->status == '1')
                                                            <span class="cst_active"><i class="fas fa-check-circle"></i></span>
                                                        @else
                                                            <span class="cst_in-active"><i class="fas fa-times-circle"></i></span>
                                                        @endif
                                                        {{$bd->name}}</td>
                                                        <td><img width="50px;" height="50px;" src="{{URL::asset('/uploads')}}/{{$bd->image}}"></td>
                                                        <td>{{$bd->end_date}}</td>
                                                        <td>{{$bd->points}}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary">Action</button>
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                                                </button>

                                                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a href="{{url('admin/badge')}}/{{$bd->slug}}" class="dropdown-item">Edit</a>

                                                                    <a href="{{route('admin.badge.status',$bd->slug)}}" class="dropdown-item">
                                                                        @if($bd->status == '1')
                                                                            In-active
                                                                        @else
                                                                            Active
                                                                        @endif
                                                                    </a>

                                                                    <a onclick="return confirm('Are you sure you want to delete this badge?')" href="{{url('admin/badge/delete')}}/{{$bd->id}}" class="dropdown-item">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        {{ $badge->render() }}
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>


@endsection