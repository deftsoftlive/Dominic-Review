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
                        <h5>{{$title}}</h5>
                        <div class="cst-admin-filter">
                            <a href="{{ url(route('export_course_register_for_all')) }}" class="btn btn-primary">Export All Registers</a>
                            <a href="{{ url(route($addLink)) }}" class="btn btn-primary">Add</a>
                            <a href="{{ url('admin/course') }}" id="all_course_listing" class="btn btn-primary">All Courses</a>
                            <a href="{{ route('admin.course.in-active') }}" class="btn btn-primary">In-active Courses</a>
                            <a href="{{ route('admin.course.active') }}" class="btn btn-primary">Active Courses</a>
                        </div>
                    </div>

            <br/>

            @php 
                $sel_type = !empty(request()->get('type')) ? request()->get('type') : "";
                $sel_subtype = !empty(request()->get('subtype')) ? request()->get('subtype') : "";
                $sel_level = !empty(request()->get('level')) ? request()->get('level') : "";
                $sel_course_name = !empty(request()->get('course_name')) ? request()->get('course_name') : "";
                $sel_venue = !empty(request()->get('venue')) ? request()->get('venue') : "";
            @endphp

            <!-- Filter Section - Start -->
            <form action="{{route('admin.course.list')}}" class="cst-selection">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                              <select id="people" name="type" class="form-control">
                            
                              <option value="" disabled="" selected="">Select Course Category</option>
                              @foreach($course_cat as $cour)
                                <option value="{{$cour->id}}" {{ $sel_type == $cour->id ? "selected" : "" }}>{{$cour->label}}</option>
                              @endforeach
                            </select>
                        </div>
                        </div>
                            @php 
                                if(!empty($sel_type)){
                                    $sub_cat = \App\Models\Products\ProductCategory::where('parent',$sel_type)->where('subparent','0')->orderBy('label','desc')->get();
                                }
                            @endphp
                        <div class="col-sm-4">
                            <div class="form-group">
                              <select id="inputAge" name="subtype" class="form-control event-dropdown">
                                <option selected="" disabled="">Select Age Group</option>
                                @if(!empty($sub_cat))
                                    @foreach($sub_cat as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id == $sel_subtype ? "selected" : "" }}>{{ $cat->label }}</option>
                                    @endforeach
                                @endif
                              </select>
                          </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                            <select name="level" class="form-control">
                              <option selected="" disabled="">Select Level</option>
                              <option value="All" {{ $sel_level == "All" ? "selected" : "" }}>All</option>
                              <option value="Beginner" {{ $sel_level == "Beginner" ? "selected" : "" }}>Beginner</option>
                              <option value="Intermediate" {{ $sel_level == "Intermediate" ? "selected" : "" }}>Intermediate</option>
                              <option value="Advanced" {{ $sel_level == "Advanced" ? "selected" : "" }}>Advanced</option>
                            </select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <select id="SelectCourse" name="course_name" class="form-control event-dropdown">
                                <option selected="" disabled="">Select Course</option>
                                @foreach($course_filter as $cour_filter)
                                    <option value="{{$cour_filter->id}}" {{ $sel_course_name == $cour_filter->id ? "selected" : "" }}>{{$cour_filter->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <select id="SelectVenue" name="venue" class="form-control event-dropdown">
                                <option selected="" disabled="">Select Course Category (Venue)</option>
                                @foreach($venue_category as $venue)
                                    <option value="{{$venue->id}}" {{ $sel_venue == $venue->id ? "selected" : "" }}>{{$venue->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>

                        
                        <div class="col-sm-1" style="margin-right:10px;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <div class="col-sm-1" style="margin-left:10px">
                            <a href="{{ route('admin.course.list') }}" class="btn btn-primary">Reset</a>
                        </div>
                    </div><br/>
                </div>
            </form>
            <!-- Filter Section - End -->
                        
                        <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                    </div>
                    <div class="card-block table-border-style">
                    <div class="table-responsive">
                      @include('admin.error_message')
                         <table class="table table-hover">
                            <thead>
                            <tr> 
                                <th>Course ID</th>
                                <th>Sort</th>
                                <th>Name</th>
                                <th>Season</th>
                                <th>Price</th>
                                <th>Member Price</th>
                                <th>Bookings</th>
                                <th width="150px">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($course as $test)

                            @php 
                                $cour_id = $test->id; 
                                $purchased_courses = DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$cour_id)->where('type','order')->where('orderID','!=',NULL)->count();
                                $booked_courses = !empty($purchased_courses) ? $purchased_courses : '0';
                            @endphp
                                <tr>
                                @if(count($course)> 0)
                                    <td>{{$test->id}}</td>
                                    <td><input type="text" id="update_course_sort" data-id="{{$test->id}}" value="{{$test->sort}}" style="width:
                                    50px"></td>

                                    <td>
                                        @if($test->status == '1')
                                            <span class="cst_active"><i class="fas fa-check-circle"></i></span>
                                        @else
                                            <span class="cst_in-active"><i class="fas fa-times-circle"></i></span>
                                        @endif
                                        {{$test->title}}
                                    </td>

                                    
                                    <td>@php echo getSeasonname($test->season); @endphp</td>
                                    <td>£ <input type="text" id="update_course_price" data-id="{{$test->id}}" value="{{number_format((float)$test->price, 2, '.', '')}}" style="width: 50px"></td> 

                                    <td>£ <input type="text" id="update_course_membership_price" data-id="{{$test->id}}" value="{{number_format((float)$test->membership_price, 2, '.', '')}}" style="width: 50px"></td> 
                                    
                                    <td>{{$booked_courses}}/{{$test->booking_slot}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a href="{{url('admin/course')}}/{{$test->slug}}" class="dropdown-item">Edit</a>
                                                <a href="{{url('admin/course/duplicate')}}/{{$test->id}}" class="dropdown-item">Duplicate</a>
                                                <a href="{{url('admin/course/delete')}}/{{$test->id}}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this course?')" >Delete</a>
                                                <a href="{{route('admin.course.status',$test->slug)}}" class="dropdown-item">
                                                    @if($test->status == '1')
                                                        In-active
                                                    @else
                                                        Active
                                                    @endif
                                                </a>

                                                @if($test->status == '1')

                                                <a href="{{url('admin/view_test_score/excel')}}/season/{{$test->season}}/course/{{$test->id}}" class="dropdown-item">View Test Scores</a>


                                                @php 
                                                    $check_excel = DB::table('test_scores')->where('season_id',$test->season)->where('course_id',$test->id)->first();  
                                                @endphp

                                                @if(!empty($check_excel))
                                                    <a target="_blank" class="dropdown-item" href="{{URL::asset('/uploads/test-excel')}}/{{$check_excel->excel_file}}">Import Scores</a>
                                                @else
                                                    <a href="{{url('admin/excel_export/excel')}}/season/{{$test->season}}/course/{{$test->id}}" class="dropdown-item">Export Test Score</a>
                                                @endif

                                                @endif

                                                <!-- <a href="#" class="dropdown-item">View Register</a> -->

                                                <a href="{{url('admin/register-template/course')}}/{{$test->id}}" class="dropdown-item">View Register</a>

                                                <!-- <a href="#" class="dropdown-item">Manage Course</a> -->
                                            </div>
                                        </div>
                                    </td>
                                    @else
                                        <div class="no_result">
                                            <h3>No Results</h3>
                                        </div>
                                    @endif
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                    {{ $course->appends(['type' => $sel_type, 'subtype' => $sel_subtype, 'level' => $sel_level, 'course_name' => $sel_course_name, 'venue' => $sel_venue])->links() }}
                </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
function myFunction() {
        $("#all_course_listing")[0].click();
      }


$(document).ready(function(){
    $("select#people").change(function(){
        var selectedCat = $(this).children("option:selected").val();
        $.ajax({
            url:"<?php echo route('selectedCat') ?>",
            method:'GET',
            data:{selectedCat:selectedCat},
            dataType:'json',
            success:function(data)
            {   
                $('#inputAge').html(data.option);
            },      
        })
    });
    });

$("#SelectCourse").chosen({no_results_text: "Oops, nothing found!"}); 

</script>
@endsection