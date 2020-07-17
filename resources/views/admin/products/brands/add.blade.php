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
            <li class="breadcrumb-item "><a href="{{$addLink}}">View</a></li>             
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
              <form role="form" method="post" id="BrandForm" enctype="multipart/form-data">
                @csrf
                  {{textbox($errors, 'Name*', 'name')}}                          
                  <div class="card-footer pl-0">
                    <button type="submit" id="BrandFormBtn" class="btn btn-primary">Create</button>
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
<script type="text/javascript">
  $(document).ready(function(){
    $("#BrandForm").validate({
      rules: {
        name: {
          required: true,
        },
      },
    });
    
    $('#BrandFormBtn').click(function(){
      $(this).attr('disabled', true);
      if($('#BrandForm').valid()){
        $('#BrandForm').submit();
      }else{
        $(this).attr('disabled', false);
        return false;
      }   
    });
  });
</script>
@endsection
