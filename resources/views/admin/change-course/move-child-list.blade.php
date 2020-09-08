@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Purchased Courses</h5>
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

@if(Session::has('error'))
    <div class="alert_msg alert alert-danger">
      <p>{{ Session::get('error') }} </p>
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

                        <h5>Purchased Courses</h5>
                        <div class="cst-admin-filter">
                            <a href="{{ route('add_course_for_player') }}" class="btn btn-primary">Assign course to player</a>
                        </div>
                        </div>
                        <br/>

                        <!-- Filter Section - Start -->
                        <!-- <form action="{{route('players_list')}}" method="POST" class="cst-selection">
                        @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-3">
                                    <select id="inputPlayer" name="user_id" class="select_player">
                                    <option disabled="" selected="">Select Player</option>
                                    @php
                                        $user_badges = DB::table('user_badges')->orderBy('id','asc')->get();    
                                    @endphp 
                                    @foreach($user_badges as $bd)
                                      @php
                                        $user = DB::table('users')->where('id',$bd->user_id)->first();
                                      @endphp
                                      <option value="{{$bd->user_id}}">{{$user->name}}</option>
                                    @endforeach
                                    </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <select id="season_id" name="season" class="select_player">
                                        @php 
                                            $season = DB::table('seasons')->where('status',1)->get();
                                        @endphp
                                          <option value="" disabled="" selected="">Select Course Season</option>
                                          @foreach($season as $cour)
                                            <option value="{{$cour->id}}">{{$cour->title}}</option>
                                          @endforeach
                                        </select>
                                    </div>        

                                    <div class="col-sm-1" style="margin-right: 15px;">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                    <div class="col-sm-1">
                                        <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                                    </div>
                                    </div>
                                </div><br/>
                            </div>
                        </form> -->
                        <!-- Filter Section - End -->
                    
                
                    <div class="card-block table-border-style">
                    <div class="table-responsive">
                      @include('admin.error_message')
                        <table class="table table-hover">
                            <thead>
                            <tr> 
                                <th>Player Name</th>
                                <th>Parent Name</th>
                                <th>Purchased Course</th> 
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($purchase_course)>0)
                            @foreach($purchase_course as $bd)

                            @php
                                $player = DB::table('users')->where('id',$bd->child_id)->first();
                                $parent = DB::table('users')->where('id',$bd->user_id)->first();
                            @endphp
                             

                                <tr>
                                    <td>@php echo getUsername($bd->child_id); @endphp</td>
                                    <td>@php echo getUsername($bd->user_id); @endphp</td>
                                    <td>@php echo getCourseName($bd->product_id); @endphp</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a href="{{url('admin/shop')}}/{{$bd->id}}/change-course" class="dropdown-item">Change Course</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">
                                    <div class="no_results">
                                        <h3>No result found.</h3>
                                    </div>
                                </td>
                            </tr>
                            @endif

                            </tbody>
                        </table>
                    </div>
                    @if(count($purchase_course)>0)
                        {{ $purchase_course->render() }}
                    @endif
                </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


@endsection