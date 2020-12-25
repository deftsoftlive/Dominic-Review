@extends('layouts.admin')

 
 
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Settings</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">View</a></li>
                   
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
                        
                    <div class="row">
                        <div class="col-md-12"><h5>{{$title}}</h5></div>
                                       
                      </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                          @include('admin.error_message')
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                   <th>Page</th>
                                   <th width="180px">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <td>Banners</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/banners')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Home Page -->
                                    <td>Home Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/homepage')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <!-- <tbody> -->
                                    <!-- Courses Page -->
                                    <!-- <td>Courses Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/course-listing')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody> -->

                                <tbody>
                                    <!-- Football Landing Page -->
                                    <td>Football Landing Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/football-landing')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Football Courses Page -->
                                    <td>Football Courses Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/football-course-listing')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Tennis Landing Page -->
                                    <td>Tennis Landing Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/tennis-landing')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Tennis Courses Page -->
                                    <td>Tennis Courses Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/tennis-course-listing')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- School Landing Page -->
                                    <td>School Landing Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/school-landing')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- School Courses Page -->
                                    <td>School Courses Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/school-course-listing')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Tennis Pro Page -->
                                    <td>Tennis Pro Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/tennis-pro')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Camp Listing -->
                                    <td>Camp Listing Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/camp-listing')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Camp Detail -->
                                    <td>Camp Detail Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/camp-detail')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Book-a-camp Page -->
                                    <td>Book A Camp Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/book-a-camp')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Coach Listing -->
                                    <td>Coach Listing Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/coach-listing')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Book-a-camp Page -->
                                    <td>Coach -  My Profile Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/my-profile')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Contact Us Page -->
                                    <td>Badges Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/badges')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Contact Us Page -->
                                    <td>Contact Us Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/contact-us')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Report Page -->
                                    <td>Report Page</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/report')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <tbody>
                                    <!-- Childcare Popup -->
                                    <td>Childcare Popup</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/child-care-popup')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>

                                <!-- Textbox Management -->
                                <tbody>
                                    <td>Textbox Management</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/settings/general/edit/textbox-management')}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>
                                    </td>
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
