@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Purchased Camp</h5>
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
@elseif(Session::has('error'))
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

                        <h5>Purchased Camps</h5>
                        <div class="cst-admin-filter">
                          
                        </div>
                        </div>
                        <br/>

                        <!-- Filter Section - Start -->
                        <form action="{{route('purchased_camp_data')}}" method="POST" class="cst-selection">
                        @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-3">
                                    <input type="text" class="form-control" name="player_name" placeholder="Enter player name">
                                    </div>

                                    <div class="col-sm-1">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    &nbsp; &nbsp;
                                    <div class="col-sm-1">
                                        <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                                    </div>
                                    </div>
                                </div><br/>
                            </div>
                        </form>
                        <!-- Filter Section - End -->
                    
                
                    <div class="card-block table-border-style">
                    <div class="table-responsive">
                      @include('admin.error_message')
                        <table class="table table-hover">
                            <thead>
                            <tr> 
                                <th>Player Name</th>
                                <th>Parent Name</th>
                                <th>Purchased Camp</th>
                                <!-- <th>Season</th>  -->
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($purchase_course)>0)
                            @foreach($purchase_course as $bd)

                            @php
                                $player = DB::table('users')->where('id',$bd->child_id)->first();
                                $parent = DB::table('users')->where('id',$bd->user_id)->first();
                                $camp = DB::table('camps')->where('id',$bd->product_id)->first();
                            @endphp
                             

                                <tr>
                                    <td>@php echo getUsername($bd->child_id); @endphp</td>
                                    <td>@php echo getUsername($bd->user_id); @endphp</td>
                                    <td>{{$camp->title}}</td>
                                    <!-- <td>@php echo getSeasonname($bd->course_season); @endphp</td> -->
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a href="{{url('admin/shop')}}/{{$bd->id}}/change-camp" class="dropdown-item">Change Camp</a>
                                                <!-- <a href="{{url('admin/book-a-camp')}}/{{$camp->slug}}" class="dropdown-item">Change Camp</a> -->
                                                <a href="{{url('admin/shop')}}/{{$bd->id}}/delete/player" onclick="return confirm('Are you sure you want to remove this player from this course?')" class="dropdown-item">Remove</a>
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