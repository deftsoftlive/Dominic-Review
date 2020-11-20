@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/package-course/create')}}">Add</a></li>
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

                        <h5>{{$title}}</h5>
                        <div class="cst-admin-filter">
                            <a href="{{url('/admin/package-course/create')}}" class="btn btn-primary">Add</a>
                        </div>
                       
                        <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                    
                    </div>
                    <br/>

                    <!-- Filter Section - Start -->
                    <form action="{{route('admin.packageCourse.list')}}" method="POST" class="cst-selection">
                    @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                      <select id="inputPlayer" name="user_id" class="form-control">
                                      <option value="" disabled="" selected="">Select Player</option>

                                      @php $packages = DB::table('package_courses')->orderBy('id','desc')->groupBy('player_id')->get(); @endphp

                                      @foreach($packages as $pack)
                                        @if(!empty($pack->player_id))
                                            <option value="{{$pack->player_id}}">{{getUsername($pack->player_id)}}</option>
                                        @elseif(empty($pack->player_id) && !empty($pack->parent_id))
                                            <option value="{{$pack->parent_id}}">{{getUsername($pack->parent_id)}}</option>
                                        @endif
                                      @endforeach

                                    </select>
                                </div>
                                
                                <div class="col-sm-3">
                                      <select id="people" name="status" class="form-control">
                                    
                                      <option value="" disabled="" selected="">Select Status</option>
                                      <option value="1">Completed</option>
                                      <option value="0">Pending</option>
                                      <option value="all">All</option>
                                    </select>
                                </div>
                                
                                <div class="col-sm-1" style="margin-right:10px;">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                                <div class="col-sm-1" style="margin-left:10px">
                                    <a href="{{url('/admin/package-course')}}" class="btn btn-primary">Reset</a>
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
                                <!-- <th>Booking No.</th> -->
                                <th>Order ID</th>
                                <th>Package Issue Date</th>
                                <th>Account Name</th> 
                                <th>Player Name</th>
                                <th>Package Cost</th>
                                <th>Linked Email</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>
                            @if(count($PackageCourse)>0)

                            @foreach($PackageCourse as $test)
                                <tr>
                                    <!-- <td>{{$test->booking_no}}</td> -->
                                    <td>{{isset($test->orderID) ? $test->orderID : '-'}}</td>
                                    <td>{{date('d/m/Y',strtotime($test->created_at))}}</td>
                                    <td>
                                        @php
                                            $account = DB::table('stripe_accounts')->where('id',$test->account_id)->first();
                                        @endphp
                                        {{$account->account_name}}
                                    </td>
                                    <td>
                                        @if(!empty($test->player_id)) 
                                            @php echo getUsername($test->player_id); @endphp
                                        @elseif(empty($test->player_id) && !empty($test->parent_id))
                                            @php echo getUsername($test->parent_id); @endphp
                                        @endif
                                    </td>
                                    <td>
                                        @php 
                                            $bookings = DB::table('package_courses')->where('booking_no',$test->booking_no)->get();
                                            $total = [];
                                        @endphp
                                        @foreach($bookings as $book)
                                           @php $total[] = $book->price;  @endphp
                                        @endforeach
                                        @php $package_cost = array_sum($total); @endphp
                                        &pound;{{$package_cost}}
                                    </td>
                                    <td>{{isset($test->parent_id) ? getUseremail($test->parent_id) : '-'}}</td>
                                    <td>
                                        @if($test->status == 1)
                                            <b style="color:green">Completed</b>
                                        @elseif($test->status == 0)
                                            <b style="color:red;">Pending</b>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary wrap_btn">Action</button>
                                            <button type="button" class="btn btn-primary wrap_btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <!-- <a href="{{url('/admin/package-course/edit')}}/{{$test->booking_no}}" class="dropdown-item">Edit</a> -->

                                                @if($test->status == 0)
                                                    <a href="{{url('/admin/package-course/resend')}}/{{$test->booking_no}}" class="dropdown-item">Resend Link</a>
                                                @endif

                                                <a href="{{url('/admin/package-course/detail')}}/{{$test->booking_no}}" class="dropdown-item">Detail</a>

                                                <a href="{{url('/admin/package-course/delete')}}/{{$test->booking_no}}" onclick="return confirm('Are you sure you want to delete this package course account?')" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @else
                                <tr><td colspan="8"><div class="no_results"><h3>No Data Found</h3></div></td></tr>
                            @endif

                            </tbody>
                        </table>
                    </div>
                    {{ $PackageCourse->render() }}
                </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


@endsection

