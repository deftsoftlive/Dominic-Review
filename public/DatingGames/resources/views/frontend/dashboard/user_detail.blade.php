@extends('layouts.frontend')
@section('content')

 <!--main section starts Here-->

        <section class="dash-wrapper" id="myprofile">
            <div class="container">
                <div class="ham">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
                @include('frontend/dashboard/partials/dashboard_sidebar')
      		<div class="right-nav">
      		<aside class="right-side">
   
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                	<div id="msgs">
                        <div class="alert alert-success" id="success_msg" style="display:none;">
                            User has been removed successfully.
                        </div>
                        <div class="alert alert-error" id="success_msg" style="display:none;">
                            Error occured.
                        </div>
				         @if(session('success'))
				         <div class="alert alert-success">
				            {{ session('success') }}
				         </div>
				         @endif
				     </div>
                     <div class="box-header">
                        <h3 class="box-title">User Details</h3>
                    </div><!-- /.box-header -->

                    <div class="user-details">
                        <div class="details-box">
                        <figure>
                            <img src="/upload/images/{{$user->profile_picture}}" />
                        </figure>
                        <div class="details">
                            <h3>Name <span>{{$user->fname}} {{$user->lname}}</span></h3>
                            <h3>Email Address <span>{{$user->email}}</span></h3>
                            <h3>Contact Number <span>{{$user->contact_no}}</span></h3>
                            <a href="{{route('inbox-user-detail',['slug' => $user->slug])}}" class="btn custm-btn width-custm1">Send Message</a>
                          </div>
                      </div>
                    </div>



                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside>
      		</div>
        </div>
       </section>
@endsection

