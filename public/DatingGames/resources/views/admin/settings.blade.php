@extends('layouts.admin')
@section('content')
<aside class="right-side">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         General Settings
      </h1>
   </section>
   @include('partials/removeMessage')
    @include('partials/message')
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-sm-12">
            <div class="box box-primary cust-setting">
               <form id="settings-form" role="form" action="{{ route('admin.update_settings') }}" enctype="multipart/form-data" method="POST">
                  @csrf           
                  <div class="box-body">
                     <div class="row">
                        <div class="col-xs-12 col-sm-6">
                              <div class="form-group">
                              <label>Email<span class="mandatory">*</span></label>
                              <input type="email" name="email" id="email" class="form-control" value="{{ $settings->email_id}}">
                           </div>
                        </div>

                        <div class="col-xs-12 col-sm-6">                       
                           <div class="form-group">
                              <label>Facebook Link<span class="mandatory">*</span></label>
                              <input type="text" name="fb_link" id="fb_link" class="form-control" value="{{ $settings->facebook_id }}">
                           </div> 
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-xs-12 col-sm-6">       
                           <div class="form-group">
                              <label>Twitter Link<span class="mandatory">*</span></label>
                              <input type="text" name="twitter_link" id="twitter_link" class="form-control" value="{{ $settings->twitter_id }}">
                           </div> 
                        </div>
                        <div class="col-xs-12 col-sm-6">       
                           <div class="form-group">
                              <label>Instagram Link<span class="mandatory">*</span></label>
                              <input type="text" name="insta_link" id="insta_link" class="form-control" value="{{ $settings->insta_id }}">
                           </div> 
                        </div>
                     </div>
                     
                     <div class="row">
                        <div class="col-xs-12 col-sm-6">
                           <div class="form-group">
                              <label>Contact Number<span class="mandatory">*</span></label>
                              <input type="text" name="contact_no" id="contact_no" class="form-control" value="{{ $settings->contact_no }}">
                           </div>  
                        </div>
                        <div class="col-xs-12 col-sm-6">                
                           <div class="form-group">
                              <label>Copyright Text<span class="mandatory">*</span></label>
                              <input type="text" name="copyright" id="copyright" class="form-control" value="{{ $settings->copyright_text }}">
                           </div>                                                     
                        </div>   
                     </div>
                     <div class="row">
                        <div class="col-xs-12 col-sm-6">
                           <div class="form-group custm-image">
                              <label>Website Logo</label>
                              <input type="file" name="header_logo" class="form-control" id="header_logo">
                                                                        
                           </div> 
                           <img id="home_image_result" src="{{asset('upload/images/'.$settings->header_logo)}}" style="height: 75px; width: 150px;">   
                        </div>
                     </div>         
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button id="submit-btn-settings" type="button" class="btn btn-primary">Update</button>
                  </div>
               </form>
            </div>
         </div>
            <!-- /.box -->
         <!-- /.col (right) -->
      </div>
      <!-- /.row -->                    
   </section>
   <!-- /.content -->
</aside>
<!-- /.right-side -->
@endsection