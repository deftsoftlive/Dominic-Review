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
                    <li class="breadcrumb-item "><a href="{{ route($addLink) }}">View</a></li>
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

                      <form role="form" method="post" id="venueForm" enctype="multipart/form-data">
                        
                           @csrf
                          
                           {{textbox($errors,'Account Name<span class="cst-upper-star">*</span>','account_name')}}
                           {{textbox($errors,'Account Holder Name<span class="cst-upper-star">*</span>','acc_holder_name')}}
                           {{textbox($errors,'Secret Key<span class="cst-upper-star">*</span>','secret_key')}}
                           {{textbox($errors,'Public Key<span class="cst-upper-star">*</span>','public_key')}}
                           <!-- {{textbox($errors,'Client Key<span class="cst-upper-star">*</span>','client_key')}} -->
                          
                        <div class="card-footer pl-0">
                          <button type="submit" id="btnVanue" class="btn btn-primary">Submit</button>
                        </div>

                      </form>

                    </div>


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
<script src="{{url('/admin-assets/js/validations/valueValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>
<!-- <script type="text/javascript">
  $('#selImage').on('change', function (){
    $(this).parent().find('label').css('display', 'none');
  });
</script> -->
@endsection
