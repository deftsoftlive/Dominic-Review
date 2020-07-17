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
                                            </div>
                                           
                                            <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                        
                                    </div>
                                        <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                          @include('admin.error_message')
                                            <table class="table table-hover">
                                                <thead>
                                                <tr> 
                                                    <th>Title</th>
                                                    <th>Linked Report Question</th>
                                                    <!-- <th>Image</th>  -->
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(!empty($reportquestionopt))
                                                @foreach($reportquestionopt as $test)
                                                @php 
                                                    $reportques = DB::table('report_questions')->   where('id',$test->report_question_id)->first(); 
                                                @endphp
                                                    <tr>
                                                        <td>{{$test->option_title}}</td>
                                                        <td>{{isset($reportques->title) ? $reportques->title : ''}}</td>
                                                       <!--  <td><img width="50px;" height="50px;" src="{{URL::asset('/uploads')}}/{{$test->image}}"></td> -->
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary">Action</button>
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                                                </button>

                                                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a href="{{url('admin/report-question-option')}}/{{$test->id}}" class="dropdown-item">Edit</a>

                                                                    <a onclick="return confirm('Are you sure you want to delete this test category?')" href="{{url('admin/report-question-option/delete')}}/{{$test->id}}" class="dropdown-item">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        @if(!empty($reportquestionopt))
                                        {{ $reportquestionopt->render() }}
                                        @endif
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>


@endsection