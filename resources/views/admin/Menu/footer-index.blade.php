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
                            <a href="{{ route('admin.Menu.list') }}" class="btn btn-primary">Header Menu</a>
                            <a href="{{ route('admin.Menu.footer-list') }}" class="btn btn-primary">Footer Menu</a>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            @include('admin.error_message')
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="8%">Sort</th>
                                        <th>Name</th>
                                        <th>Menu Type</th>
                                        <th width="32%">URL</th>
                                        <!-- <th>Linked Sub-menu</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Menu as $test)
                                    <tr class="parent-row">
                                        <td><input type="text" id="update_menu_sort" data-id="{{$test->id}}" value="{{$test->sort}}" style="width:50px"></td>
                                        <td>{{$test->title}}</td>
                                        <td>@if($test->type == 'header') Header Menu @elseif($test->type == 'footer') Footer Menu @else - @endif</td>
                                        <td>{{isset($test->url) ? $test->url : '-'}}</td>
                                        <!-- @php
                                        $linked_submenu = DB::table('menus')->where('type','footer')->where('sub_menu',$test->id)->get();
                                        @endphp
                                        @if(count($linked_submenu)>0)
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-primary b-child"><i class="fa fa-plus-circle"></i></a>
                                        </td>
                                        @else
                                        <td>
                                            <span class="cst_in-active"><i class="fas fa-times-circle"></i></span>
                                        </td>
                                        @endif -->
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Action</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a href="{{url('admin/menu')}}/{{$test->id}}" class="dropdown-item">Edit</a>
                                                    <a href="{{url('admin/menu/delete')}}/{{$test->id}}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this menu?')" >Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @if(count($linked_submenu)>0)
                                    <tr class="child-row">
                                        <td colspan="5">
                                            <div class="child-container">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Menu Type</th>
                                                            <th width="45%">URL</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($linked_submenu as $test)
                                                    <tr>
                                                        <td><i class="fas fa-arrow-right"> </i>&nbsp;&nbsp; {{$test->title}}</td>
                                                        <td>@if($test->type == 'header') Header Menu @elseif($test->type == 'footer') Footer Menu @else - @endif</td>
                                                        <td>{{isset($test->url) ? $test->url : '-'}}</td>
                                                        @php
                                                        $linked_submenu = DB::table('menus')->where('sub_menu',$test->id)->get();
                                                        @endphp
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary">Action</button>
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                                                </button>
                                                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a href="{{url('admin/menu')}}/{{$test->id}}" class="dropdown-item">Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $Menu->render() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.parent-row .b-child').click(function(){
    $(this).toggleClass('minus');
    $(this).closest('.parent-row').next('.child-row').toggleClass('expanded');
   });
</script>
@endsection