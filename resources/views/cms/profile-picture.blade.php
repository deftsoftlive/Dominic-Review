@extends('inc.homelayout')
@section('title', 'DRH|Listing')
@section('content')

<div class="account-menu acc_sub_menu">
    <div class="container">
        <div class="menu-title">
            <span>Account</span> menu
        </div>
        <nav>
            <ul>
                @include('inc.parent-menu')
            </ul>
        </nav>
    </div>
</div>
<section class="profile_croper register-acc overview-sec ">
    <div class="container">
        <div class="pink-heading">
         <h2>Upload Your Profile Picture</h2>
         <p style="text-align:center;font-size: 18px;">Either select one of our icons as your profile picture, or you can upload your own. Any image that you choose only be seen by you and is not public. If you choose to upload your own image, please ensure that the image is appropriate and tennis related. Once you have selected the image, you can crop it to fit. </p>
         <br/>
      </div>
        <div class="inner-cont">
            <div class="img-wrap">
                <label>
                    <input type="radio" name="profile_image" value="no" checked>
                    <figure class="no_image">
                        <p>Upload <br/>profile Image</p>
                    </figure>
                </label>
                @foreach($icons as $icon)
                <label>
                    <input type="radio" name="profile_image" value="{{$icon->icon_image}}" >
                    <figure>
                        <img src="{{URL::asset('/uploads/icons')}}/{{$icon->icon_image}}"></figure>
                </label>
                @endforeach
            </div>
<!-- 
            <form action="{{url('crop-image')}}" method="POST">
            @csrf -->
            <input type="hidden" id="icon" name="icon" value="">
            <input type="hidden" id="profile_user" name="user_id" value="{{$user_id}}">
	            <div class="acc_outer_wrap">
	                <div id="accordion" class="parent_fam_mem">
	                    <div class="card">
	                        <div class="card-header family-tabs user_profile" id="headingo-One">
	                            <h5 class="mb-0 edit-family-member">
	                                <button class="btn btn-link upload_profile collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	                                    Upload Your Profile Picture
	                                </button>
	                                <!--   <a class="btn btn-primary" href="http://demo.drhsports.co.uk/admin/account-holder/overview/117&amp;sec=1">Edit</a> -->
	                            </h5>
	                        </div>

	                        <div id="collapseOne" class="collapse cropper_form show" aria-labelledby="headingo-One" data-parent="#accordion">
	                            <div class="card-body">
	                                <div class="register-sec form-register-sec family_mem ">
	                                    <div class="form-partition">
	                                        <div class="col-md-12 report_row">
	                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
	                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
	                                            <div class="panel panel-info">
	                                                <div class="panel-heading"></div>
	                                                <div class="panel-body">
	                                                    <div class="row">
	                                                        <div class="col-md-4 text-center">
	                                                            <div id="upload-demo"></div>
	                                                        </div>

	                                                        <div class="col-md-4 choose_pic" style="padding:5% 0;">
	                                                            <strong>Profile Image:</strong>
	                                                            <input type="file" id="image_file">
	                                                            
	                                                        </div>
	                                                        <div class="col-md-4">
	                                                            <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <br/>
	                <div class="alert alert-success" id="upload-success" style="display: none;margin-top:10px;"></div>
	                <div class="submit_btn">
	                  <button class="btn btn-primary btn-block upload-image main_button" style="margin-top:5%">Upload Image</button>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
</section>
<!-- Crop Functionality - End -->
@endsection