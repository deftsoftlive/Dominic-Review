@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ $title }}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="{{ route($addLink, ['type' => $type]) }}">View</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">Create</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

       <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
       @include('admin.error_message')
 
            <div class="card-body">



<div class="col-md-12">

  <form role="form" method="post" id="faqForm" enctype="multipart/form-data">
    @csrf

         {{textbox($errors, 'Question*', 'question')}}
         {{textarea($errors, 'Answer*', 'answer')}}

      <div class="card-footer">
        <button type="submit" id="faqFormBtn" class="btn btn-primary">Create</button>
      </div>
 </form>


</div>

            </div>
          </div>
        </div>
      </div>
    </section>

 
     
@endsection

@section('scripts')
<script src="{{ asset('/admin-assets/js/validations/faqValidation.js') }}"></script>
<script src="{{ asset('js/cke_config.js') }}"></script>

<script type="text/javascript">
   CKEDITOR.replace('answer', options);
</script>
@endsection
