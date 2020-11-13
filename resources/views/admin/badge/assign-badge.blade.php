@extends('layouts.admin')

@section('content')


<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Players Management</h5>
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

                        <h5>Players Management</h5>
                        </div>

                        <br/>
                       
                        <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->

                        <!-- Filter Section - Start -->
                        <form action="{{route('players_list')}}" method="POST" class="cst-selection">
                        @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-3">
                                    <select id="inputPlayer" name="user_id" class="select_player">
                                    <option disabled="" selected="">Select Player</option>
                                    @php
                                        $purchase_course1 = \DB::table('shop_cart_items')->where('shop_type','course')->where('child_id','!=',NULL)->where('type','order')->orderBy('id','desc')->groupBy('child_id')->get(); 
                                    @endphp
                                    @foreach($purchase_course1 as $bd)

                                    <!-- Check from user table -->
                                    @php $user= DB::table('users')->where('id',$bd->child_id)->first(); @endphp
                                    @if(!empty($bd->child_id) && !empty($user) && $bd->child_id == $user->id)
                                      <option value="{{$bd->child_id}}"> {{isset($bd->child_id) ? getUsername($bd->child_id) : ''}}</option>
                                    @endif
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
                        </form>
                        <!-- Filter Section - End -->

                        <p style="color:#3f4d67;"><b>Please Note</b>: Only players booked on active courses that have not yet expired will appear in the list.</p>
                    
                
                    <div class="card-block table-border-style">
                    <div class="table-responsive">
                      @include('admin.error_message')
                        <table class="table table-hover">
                            <thead>
                            <tr> 
                                <th>Player Name</th>
                                <th>Purchased Course</th> 
                                <th width="30%">Assigned Badges</th>
                                <th>Points</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @php //dd($purchase_course); @endphp

                            @if(count($purchase_course)>0)
                            @foreach($purchase_course as $bd)

                            @php 
                                //$shop = DB::table('shop_cart_items')->where('child_id',$bd->child_id)->where('shop_type','course')->where('orderID','!=',NULL)->get();

                                //dd($shop);

                                $current_date = date('Y-m-d');

                                $user = DB::table('users')->where('id',$bd->child_id)->first();
                                $user_badges = DB::table('user_badges')->where('user_id',$bd->child_id)->where('season_id',$bd->course_season)->where('course_id',$bd->product_id)->first();

                                $selected_badges = isset($user_badges->badges) ? explode(',',$user_badges->badges) : '';

                                $course = DB::table('courses')->where('id',$bd->product_id)->where('end_date','>',$current_date)->first();
                            @endphp
                             

                            @if(!empty($user))

                            @if(!empty($course))
                                <tr>
                                    <td>{{isset($user->name) ? $user->name : 'User not found'}}</td>
                                    <td>{{getCourseName($bd->product_id)}} - {{getSeasonName($bd->course_season)}}</td>
                                    <td>
                                        @if(!empty($selected_badges))
                                        @foreach($selected_badges as $se)
                                            @php 
                                                $badge = DB::table('badges')->where('id',$se)->first();
                                            @endphp
                                                <img width="50px;" height="50px;" src="{{URL::asset('/uploads')}}/{{isset($badge->image) ? $badge->image : ''}}">
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>{{isset($user_badges->badges_points) ? $user_badges->badges_points : ''}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a href="{{url('admin/badge/assign_badge')}}/season/{{$bd->course_season}}/course/{{$bd->product_id}}/player/{{$bd->child_id}}" class="dropdown-item">Assign Badges</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endif
                            @endif

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
                </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


@endsection