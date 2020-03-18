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
				         @if(session('success'))
				         <div class="alert alert-success">
				            {{ session('success') }}
				         </div>
				         @endif
                         @if(session('error'))
                         <div class="alert alert-danger">
                            {{ session('error') }}
                         </div>
                         @endif
				     </div>
                    <div class="box-header">
                        <h3 class="box-title">Change Password</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" id ="user-password-edit" action="{{ route('user.updatePassword') }}" 
                    name="changePassword" class="needs-validation">
                        @csrf
                        <div class="box-body">
                        	<div class="">
                            <div class="form-group">
                                <label for="current_password">Current Password<span class="mandatory">*</span></label>
                            <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Current Password">
                            
                            </div>
                            <div class="form-group">
                                <label for="password">New Password<span class="mandatory">*</span></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password<span class="mandatory">*</span></label>
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                            </div>

                        </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="changePassword" type="submit" class="btn custm-btn">Submit</button>
                        </div>
                    </form>
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

