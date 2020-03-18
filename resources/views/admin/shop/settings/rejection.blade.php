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
                    <li class="breadcrumb-item"><a href="">listing</a></li>
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
                                            <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                              @include('admin.error_message')
                                             


                                                    <div class="col-md-12">

                                                       <form method="post">
                                                            @csrf
                                                            {{textarea($errors,'Reasons','reasons')}}
                                                            <button class="btn btn-primary">Submit</button>
                                                       </form>
                                                    </div>
 

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>

@endsection

@section('scripts')
<script src="{{url('/admin-assets/js/validations/cmsPageValidation.js')}}"></script>
<script type="text/javascript">
   var options = {
         filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
         filebrowserWindowWidth  : 800,
         filebrowserWindowHeight : 500,
         uiColor: '#eda208',
         removePlugins: 'save, newpage',
         allowedContent:true,
         fillEmptyBlocks:true,
         extraAllowedContent:'div, a, span, section, img'
       };
   CKEDITOR.replace('reasons', options);
</script>
@endsection