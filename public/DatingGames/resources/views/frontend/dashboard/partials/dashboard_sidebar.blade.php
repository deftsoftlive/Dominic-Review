<aside class="side-nav">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                   
                    <figure class="newedit">
                    <img class="user-logo" src=
                    @if(Auth::user()->profile_pic_status == 0) 
                    "/upload/images/{{Auth::user()->new_profile_picture}}"
                    @else
                    "/upload/images/{{Auth::user()->profile_picture}}"
                    @endif
                    alt=""/>
                    <div class="edit1">
                        <button type="button" class="btn btn-secondary edit_button" data-toggle="modal" data-target="#edit_profile_pic">
                        Edit
                                    </button>
                    </div>
                </figure>

                    <div class="text">
                        <h2>{{Auth::user()->fname}} {{Auth::user()->lname}}</h2>
                        </div>
                        <ul class="cust-nav">
                            <li class="active">
                              
                                <a href="{{ route('user.profile') }}";>
                                	<i class="fa fa-user" aria-hidden="true"></i>
                                    My Profile
                                </a>
                            </li>
                            <li>
                            <a href="{{route('user.myEvents')}}";>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                Events
                            </a>
                            </li>
                             <li>
								<a href="{{route('user.match')}}";>
								  <i class="fa fa-handshake-o" aria-hidden="true"></i>
									Matches
								</a>
                            </li>
							<li>
								<a href="{{ route('inbox') }}">
								  <i class="fa fa-envelope" aria-hidden="true"></i>
									Inbox @if(count(App\Message::where('to_id',Auth::user()->id)->where('status',1)->get())>0)
                                    ({{count(App\Message::where('to_id',Auth::user()->id)->where('status',1)->get())}})
                                    @endif
								</a>
                            </li>
                              <li>
                            <a  href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>
                                      Logout
                                  </a>
                            </li>
                             
                            <!--<li>
                            <a href="javascript:void(0)";>
                               <i class="fa fa-comments-o" aria-hidden="true"></i>
                                Feedback
                            </a>
                            </li> 
 -->                        </ul>

               </aside>
               

                
                <div class="custm-verify-msg new-msgs">
                    <div class="thanku-text">
                                <div class="cross">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </div>
                <p>You have successfully uploaded the image.</p>
                <p>You can see the image as your profile picture after admin's approval</p>
                </div>

                </div>

           <div class="modal" id="edit_profile_pic" tabindex="-1" role="dialog">
		    <form id="edit_profile_pic_form" enctype="multipart/form-data">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Upload New Profile Picture</h5>
							<button type="button" class="close custm-close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						   
							<input type="hidden" name="_token" value="{{ csrf_token()}}">
							<input type ="file" name="profile_pic" id="new_profile_pic" accept=".png, .jpg, .jpeg">
						  
						</div>
							<div class="modal-footer">
								<button id="{{Auth::user()->id}}" class="custm-btn confirm_button">Upload</button>
								<button type="button" class="btn btn-secondary custm-btn" data-dismiss="modal">Cancel</button>
							</div>
					</div>
				</div>
			</form>
        </div>
		
@section('customScripts')
<script type="text/javascript">

	

	$(document).ready( function(){
		$.validator.addMethod('filesize', function (value, element, param) {
			return this.optional(element) || (element.files[0].size <= param)
		}, 'File size must be less than {0}');

		$('#edit_profile_pic_form').validate({
			rules: {
				profile_pic: {
					required: true,
					filesize: 2048000,
				}
			},
			messages:{
				profile_pic: {
					required: "Please select an image to upload",
					filesize: "Please upload image of size smaller than 2MB",
				}
			},
			submitHandler:function(){
				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: "{{ route('user.editProfilePicture') }}",
					type: "post",
					dataType: "JSON",
					async:false,
					processData: false,
					contentType: false,
					data: new FormData($("#edit_profile_pic_form")[0]) ,
					success: function(data){
							 $('#edit_profile_pic').modal('hide');
							 var src1 = "/upload/images/";
							 var src2 = data;
							 var src = src1.concat(src2);
							 $('.pend-msg').css('display','block');
							 $('.user-logo').attr('src',src);
							$('.new-msgs').css('display','block');
					}
				});
			}
		});
		
		$('#edit_profile_pic').on('hidden.bs.modal', function () {
			$(this).find('form').trigger('reset');
		});
   
	});    
</script>
@endsection