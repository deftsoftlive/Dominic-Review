@extends('layouts.admin')
 
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="mb-2">
    
            <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>       
        
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item "><a href="{{ url($addLink) }}">Add</a></li>
            </ol>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>
       <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
        
        @include('admin.error_message')
 
            <div class="card-body">
              <form role="form" method="post" id="BrandForm" enctype="multipart/form-data">
                @csrf
                  {{textbox($errors, 'Page Title*', 'title')}}                          
                  {{textarea($errors, 'Page Content*', 'content')}}                          
                  <div class="card-footer">
                    <button type="submit" id="BrandFormBtn" class="btn btn-primary">Create</button>
                  </div>
             </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
 @endsection

@section('scripts')   
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
   CKEDITOR.replace('content', options);
</script>
     
@endsection
