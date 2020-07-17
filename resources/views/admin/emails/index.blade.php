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
                    <li class="breadcrumb-item "><a href="javascript:void(0);">List</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('admin.error_message')

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">                                          
           <h5>Email Mangement</h5>    
          </div>
        <div class="card-body">
          <div class="col-md-12">
           <form class="row email-temp-row" method="post">
              @csrf
               <div class="col-md-3"><label class="control-label">Enter Email Template Title</label></div>
               <div class="col-md-4"><input type="text" name="title" class="form-control" required></div>
               <div class="col-md-2"><button class="btn btn-primary">Submit</button></div>
           </form>
          </div>
          <div class="col-md-12">

       
           

            <div class="table-responsive">
            <table class="table cstm-admin-table">
                 <tr>
                     <th>Template ID</th>
                     <th>Title</th>
                     <th>Action</th>
                 </tr>

                 @foreach($emails as $email)

                       <tr>
                         <td>{{$email->id}}</td>
                         <td>{{$email->title}}</td>
                         <td>
                           <a href="{{url(route('admin.emails.update',$email->id))}}" class="btn btn-danger">Edit</a>
                         </td>
                       </tr>

                 @endforeach
            </table>
          </div>






 
          </div>
        </div>
      </div>
    </div>


 

 

  </div>
</section>

 
@endsection

@section('scripts')
<script src="{{url('/admin-assets/js/validations/emailValidation.js')}}"></script>
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
   CKEDITOR.replace('body', options);
   CKEDITOR.replace('body1', options);
   CKEDITOR.replace('body2', options);
</script>
@endsection
