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
                                        <li class="breadcrumb-item">
                                            <a href="{{ url(route($addLink)) }}">Add</a>
                                        </li>
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
                                            <!-- <div class="cst-admin-filter">
                                                <a href="{{ url(route($addLink)) }}" class="btn btn-primary">Add</a>
                                            </div> -->
                                            <div class="cst-admin-filter">
                                                <a href="{{ url(route($addLink)) }}" class="btn btn-primary">Add</a>
                                                <a href="{{ route('admin.pay.go.course.list') }}" id="all_course_listing" class="btn btn-primary">All Courses</a>
                                                <a href="{{ route('admin.pay.go.course.in-active') }}" class="btn btn-primary">In-active Courses</a>
                                                <a href="{{ route('admin.pay.go.course.active') }}" class="btn btn-primary">Active Courses</a>
                                            </div>
                                            
                                            <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                        </div>

                                    <br/>

                                    <!-- Filter Section - Start -->
                                    <!-- <form action="{{route('admin.pay.go.course.list')}}" method="POST" class="cst-selection">
                                    @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                      <select id="people" name="type" class="form-control">
                                                    
                                                      <option value="" disabled="" selected="">Select Course Category</option>
                                                      @foreach($course_cat as $cour)
                                                        <option value="{{$cour->id}}">{{$cour->label}}</option>
                                                      @endforeach
                                                    </select>
                                                </div>
                                                    
                                                <div class="col-sm-3">
                                                      <select id="inputAge" name="subtype" class="form-control event-dropdown">
                                                        <option value="" selected="" disabled="">Select Age Group</option>
                                                      </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <select name="level" class="form-control">
                                                      <option value="" selected="" disabled="">Select Level</option>
                                                      <option value="Beginner">Beginner</option>
                                                      <option value="Intermediate">Intermediate</option>
                                                      <option value="Advanced">Advanced</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-sm-1" style="margin-right:10px;">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>

                                                <div class="col-sm-1" style="margin-left:10px;">
                                                    <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                                                </div>
                                            </div><br/>
                                        </div>
                                    </form> -->
                                    <!-- Filter Section - End -->

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
                                                    <th>Bookings</th>
                                                    <th width="150px">Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @foreach($course as $test)

                                                @php 
                                                    $cour_id = $test->id; 
                                                    $purchased_courses = DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$cour_id)->count();
                                                    $booked_courses = !empty($purchased_courses) ? $purchased_courses : '0';
                                                @endphp

                                                    <tr>
                                                    @if(count($course)> 0)
                                                        <td>{{$test->id}}</td>
                                                        <td><input type="text" id="update_pay_go_course_sort" data-id="{{$test->id}}" value="{{$test->sort}}" style="width:
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
                                                        <td>£ <input type="text" id="update_pay_go_course_price" data-id="{{$test->id}}" value="{{$test->price}}" style="width:
                                                        50px"></td> 
                                                        
                                                        <td>{{$booked_courses}}/{{$test->booking_slot}}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary">Action</button>
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                                                </button>

                                                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a href="{{url('admin/pay-go-course')}}/{{$test->slug}}" class="dropdown-item">Edit</a>
                                                                    <a href="{{url('admin/pay-go-course/duplicate')}}/{{$test->id}}" class="dropdown-item">Duplicate</a>
                                                                    <a href="{{url('admin/pay-go-course/delete')}}/{{$test->id}}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this pay go course?')" >Delete</a>
                                                                    <a href="{{route('admin.pay.go.course.status',$test->slug)}}" class="dropdown-item">
                                                                        @if($test->status == '1')
                                                                            In-active
                                                                        @else
                                                                            Active
                                                                        @endif
                                                                    </a>

                                                                    <!-- <a href="{{url('admin/view_test_score/excel')}}/season/{{$test->season}}/course/{{$test->id}}" class="dropdown-item">View Test Scores</a>


                                                                    @php 
                                                                        $check_excel = DB::table('test_scores')->where('season_id',$test->season)->where('course_id',$test->id)->first();  
                                                                    @endphp

                                                                    @if(!empty($check_excel))
                                                                        <a target="_blank" class="dropdown-item" href="{{URL::asset('/uploads/test-excel')}}/{{$check_excel->excel_file}}">Import Scores</a>
                                                                    @else
                                                                        <a href="{{url('admin/excel_export/excel')}}/season/{{$test->season}}/course/{{$test->id}}" class="dropdown-item">Export Test Score</a>
                                                                    @endif
                                                                    
                                                                    <a href="{{url('admin/register-template/course')}}/{{$test->id}}" class="dropdown-item">View Register</a> -->
                                                                    
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
                                        {{ $course->render() }}
                                    </div>
                                    <!-- </div> -->
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
            url:"https://www.drhsports.co.uk/admin/selectedCat/",
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

</script>
@endsection