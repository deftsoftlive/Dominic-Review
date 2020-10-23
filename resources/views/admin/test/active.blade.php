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
                                                <a href="{{ url(route($addLink)) }}" class="btn btn-primary">Add</a>
                                                <a href="{{ url('/admin/test') }}" class="btn btn-primary">All Tests</a>
                                                <a href="{{ url('/admin/test/active') }}" class="btn btn-primary">Active Tests</a>
                                                <a href="{{ url('/admin/test/inactive') }}" class="btn btn-primary">In-active Tests</a>
                                            </div>
                                           
                                            <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                        
                                    </div>
                                    <br/>

                                    <!-- Filter Section - Start -->
                                <form action="{{route('admin.test.active')}}" method="POST" class="cst-selection">
                                @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <input type="text" name="test" class="form-control" placeholder="Enter Test Name" value="">
                                            </div>
                                            
                                            <div class="col-sm-1" style="margin-right:10px;">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                            <div class="col-sm-1" style="margin-left:10px">
                                                <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
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
                                                    <th>Title</th>
                                                    <th>Category</th> 
                                                    <th>Linked Course</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($test)>0)
                                                @foreach($test as $te)
                                                @php 
                                                $cat_id = $te->test_cat_id; 
                                                $test_cat = DB::table('test_categories')->where('id',$cat_id)->first(); 
                                                @endphp
                                                    <tr>
                                                        <td>{{$te->title}}</td>
                                                        <td>{{isset($test_cat->title) ? $test_cat->title : ''}}</td>
                                                        <td>
                                                            @if(!empty($te->courses))
                                                            @php 
                                                                $course_data = DB::table('courses')->where('id',$te->courses)->first(); 
                                                            @endphp
                                                            {{isset($course_data->title) ? $course_data->title : ''}} - {{isset($course_data->season) ? getSeasonname($course_data->season) : ''}}
                                                            @endif
                                                            <!-- @php 
                                                                $courses = explode(',',$te->courses); 
                                                                $course_name = array(); 
                                                            @endphp
                                                            @if(!empty($courses))
                                                            @foreach($courses as $cour)
                                                                @php 
                                                                    $course_data = DB::table('courses')->where('id',$cour)->first();  
                                                                @endphp
                                                                @if(!empty($course_data))
                                                                    @php $course_name[] = $course_data->title; @endphp
                                                                @endif
                                                                
                                                            @endforeach

                                                            @php 
                                                                $course = implode(' , ', $course_name); 
                                                                echo $course; 
                                                            @endphp

                                                            @else
                                                            -
                                                            @endif -->
                                                        </td>
                                                        <td>
                                                        @if($te->status == '1')
                                                            <span class="cst_active"><i class="fas fa-check-circle"></i></span>
                                                        @else
                                                            <span class="cst_in-active"><i class="fas fa-times-circle"></i></span>
                                                        @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary">Action</button>
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                                                </button>

                                                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a href="{{url('admin/test')}}/{{$te->slug}}" class="dropdown-item">Edit</a>

                                                                    <a href="{{route('admin.test.status',$te->slug)}}" class="dropdown-item">
                                                                        @if($te->status == '1')
                                                                            In-active
                                                                        @else
                                                                            Active
                                                                        @endif
                                                                    </a>

                                                                    <a href="{{url('admin/test/duplicate')}}/{{$te->id}}" class="dropdown-item">Duplicate</a>

                                                                    <!-- <a href="{{route('admin.test.status',$te->slug)}}" class="dropdown-item">
                                                                        @if($te->status == '1')
                                                                            In-active
                                                                        @else
                                                                            Active
                                                                        @endif
                                                                    </a> -->

                                                                   <!--  @php 
                                                                        $check_excel = DB::table('test_scores')->where('season_id',$te->season)->where('course_id',$te->courses)->where('test_id',$te->id)->where('test_cat_id',$te->test_cat_id)->first();
                                                                    @endphp

                                                                    @if(!empty($check_excel))
                                                                        <a target="_blank" class="dropdown-item" href="{{URL::asset('/uploads/test-excel')}}/{{$check_excel->excel_file}}">View Test Score</a>
                                                                    @else
                                                                        <a href="{{url('admin/excel_export/excel')}}/season/{{$te->season}}/course/{{$te->courses}}" class="dropdown-item">Export Score Data</a>
                                                                    @endif -->

                                                                    <a onclick="return confirm('Are you sure you want to delete this test?')" href="{{url('admin/test/delete')}}/{{$te->id}}" class="dropdown-item">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @else
                                                    <tr><td colspan="5">No Data Found</td></tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        @if(count($test)>0)
                                            {{ $test->render() }}
                                        @endif
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>


@endsection

<!-- @section('scripts')
<script type="text/javascript">
 
 
$(function() { 
        var i=1;
    $('#example2').DataTable({
         
        processing: true,
        serverSide: true,
        ajax: '<?= url(route('admin.venues.ajax_getVenues')) ?>',
        columns: [
             { data: 'title', name: 'title' },
             { data: 'description', name: 'description' },            
             { data: 'status', name: 'status' },
             { data: 'action', name: 'action' },
        ]
       
    });


});
 

</script>
     
@endsection -->
