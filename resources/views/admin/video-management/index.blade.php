@extends('layouts.admin')

@section('content')

<div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                      
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('admin.create.video') }}">Add</a></li>
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

                                           
                                            <div class="cst-admin-filter">
                                                <a href="{{ route('admin.create.video') }}" class="btn btn-primary">Add</a>
                                            </div>
                                           
                                            <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                        
                                    </div>
                                        <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                          @include('admin.error_message')
                                            <table class="table table-hover cstm-table">
                                                <thead>
                                                <tr> 
	                                                <th>Title</th>
                                                    <th>Assigned To</th>
	                                                <th>Iframe</th>
	                                                <th>Description</th> 
	                                                <th>Status</th>
	                                                <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($videos as $video)
                                                    <tr>
                                                        <td>{{$video->title}}</td>
                                                        <td>
                                                            @if(strcmp($video->users, 'all') == 0) @php echo "All Users";   @endphp
                                                            @elseif(strcmp($video->users, 'users') == 0) @php echo "Individual Users"; @endphp
                                                            @elseif(strcmp($video->users, 'seasons') == 0) @php echo "Seasons"; @endphp   
                                                            @endif
                                                        </td>                                 
                                                        <td>{{$video->url}}</td>
                                                        <td>@php $des = $video->description; echo $des; @endphp</td>
                                                        <td>
                                                        @if($video->status == '1')
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
                                                                    <a href="{{route('admin.edit.video',$video->id) }}" class="dropdown-item">Edit</a>

                                                                    <a href="{{route('admin.status.video', $video->id )}}" class="dropdown-item">
                                                                        @if($video->status == '1')
                                                                            In-active
                                                                        @else
                                                                            Active
                                                                        @endif
                                                                    </a>

                                                                    <a onclick="return confirm('Are you sure you want to delete this season?')" href="{{ route('admin.remove.video' ,$video->id )}}" class="dropdown-item">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

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
