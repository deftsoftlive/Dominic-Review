@extends('users.layouts.layout')

@section('content')


<div class="page-header">
   <div class="page-block">
     <div class="row align-items-center">
		<div class="col-md-6">
			<div class="page-header-title">
			    <h5 class="m-b-10">Inviting Vendors</h5>
			</div>
		    <ul class="breadcrumb">
		        <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
		        <li class="breadcrumb-item "><a href="javascript:void(0);">Inviting Vendors</a></li>
		    </ul>
		</div>

	   <div class="col-md-6">
	     <div class="btn-wrap text-right mb-3">
	        <a href="{{ route('user.inviting.vendors') }}" class="cstm-btn">View</a>
	      </div>
	   </div>

    </div>
  </div>
</div>
@include('admin.error_message')
   <section class="content">
       <div class="row">



  <div class="col-xl-12 col-md-12 m-b-30">
    	<div class="content-main-wrap">
         <h4>Enter Vendor Detail</h4>
         <form method="post">
    		<div class="row">
         
         <div class="col-md-6">
         	 {{textbox($errors,'Vendor Name','name')}}
         </div>
         <div class="col-md-6">
         	 {{select($errors,'Business Category','label',$categories)}}
         </div>


         <div class="col-md-6">
         	 {{textbox($errors,'Business Name','business_name')}}
         </div>

         <div class="col-md-6">
         	 {{textbox($errors,'Business Address','address')}}
         </div>

         <div class="col-md-6">
         	 {{textbox($errors,'Contact Number','phone_number')}}
         </div>

         <div class="col-md-6">
         	 {{textbox($errors,'Email','email')}}
         </div>

         
         <div class="col-md-12">
         	 {{textarea($errors,'Write Something About the vendor (Why are you inviting him ?)','detail')}}

         	 <div class="form-group">
                     <button class="btn cstm-btn">Submit</button> @csrf
         	 </div>
         </div>
         </div>
     </form>

      </div>
  </div>







       </div>
    </section>















@endsection



@section('scripts')
@endsection
