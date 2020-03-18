@extends('users.layouts.layout')

@section('content')


<div class="page-header">
   <div class="page-block">
     <div class="row align-items-center">
		<div class="col-md-6">
			<div class="page-header-title">
			    <h5 class="m-b-10">Inviting Users</h5>
			</div>
		    <ul class="breadcrumb">
		        <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
		        <li class="breadcrumb-item "><a href="javascript:void(0);">Inviting Users</a></li>
		    </ul>
		</div>

	   <div class="col-md-6">
	     <div class="btn-wrap text-right mb-3">
	        <a href="{{ route('users.invite.newUser') }}" class="cstm-btn">Invite New User</a>
	      </div>
	   </div>

    </div>
  </div>
</div>
@include('admin.error_message')
   <section class="content">
 




<div class="row">
        <div class="col-xl-12 col-md-12 m-b-30">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="cart-items-wrap my-order-detail-card">
                                <div class="row no-gutters">
                                    <div class="col-lg-1 col-md-1">
                                        <div class="cart-col-wrap">
                                            <div class="cart-table-head">
                                                <h3>Sr No</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="cart-col-wrap">
                                            <div class="cart-table-head">
                                                <h3>Name</h3>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-4 col-md-4">
                                        <div class="cart-col-wrap">
                                            <div class="cart-table-head">
                                                <h3>Email</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5">
                                        <div class="cart-col-wrap">
                                            <div class="cart-table-head">
                                                <h3>Details</h3>
                                            </div>
                                        </div>
                                    </div>

                                     

                                    

                                </div>
                            </div>
                            <!-- start Heading -->

                      @if(@sizeof($vendors))
                        @foreach($vendors as $k => $v)
                        <div class="cart-items-wrap my-order-detail-card wow bounceInRight" data-wow-delay="{{100 * ($k + 0.5)}}ms" id="CartItems">
                                <div class="row no-gutters">
                                    <div class="col-lg-1 col-md-1">
                                        <div class="cart-col-wrap">

                                            <div class="car-col-body">
                                                <h4>{{$k + 1}}</h4>
                                            </div>

                                        </div>
                                    </div>
                                                                        

                                  
                                      <div class="col-lg-11 col-md-11">
                                        <div class="cart-col-wrap">
                                            <div class="car-col-body">
                                                <div class="invite-ven-det-table">
                                                  <h6><b><span class="table-icons"><i class="fas fa-user"></i></span> Name :</b> {{$v->name}}</h6>
                                                  <h6><b><span class="table-icons"><i class="fas fa-envelope"></i></span> Email :</b> {{$v->email}}</h6>
                                                  <h6><b><span class="table-icons"><i class="fas fa-phone"></i></span> Phone Number :</b> {{$v->phone_number}}</h6>
                                                  <p>{{$v->detail}}</p>
                                                  </div>
                                                </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                          @endforeach
                          {{$vendors->links()}}
                        @else
                          <div class="alert alert-info closer-step mb-3" role="alert">
                               <i class="fa fa-info-circle"></i> No Results Found
                          </div>                                                                            
                        @endif                                                                            
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>




    </section>















@endsection



@section('scripts')
@endsection
