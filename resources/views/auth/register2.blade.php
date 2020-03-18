@extends('layouts.home')

@section('title') {{ getAllValueWithMeta('meta_title', 'vendor-signup') }} @endsection
@section('description') {{ getAllValueWithMeta('meta_description', 'vendor-signup') }} @endsection
@section('keywords') {{ getAllValueWithMeta('meta_keyword', 'vendor-signup') }} @endsection

@section('content')

<!-- <app-header></app-header> -->
<section class="log-sign-banner aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000"" style="background:url({{ url('/uploads').'/'.getAllValueWithMeta('signup_background_image', 'vendor-signup')}});">
    <div class="container">
            <div class="page-title text-center">
                     <h1>{{ getAllValueWithMeta('signup_title', 'vendor-signup') }}</h1>
                </div>
            </div>    
        </section>
        <section class="form-sec aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">
                <div class="container">         
                  <div class="signUp-form-wrap mr-top sec-card">  
                        <div class="row no-gutters">          
                                 <div class="col-lg-12">
                                    <figure class="form-img-wrap vendorRegister-img">
                                        <img src="{{ url('/uploads').'/'.getAllValueWithMeta('signup_banner', 'vendor-signup') }}">
                                        <figcaption class="overlay-text">
                                          <div class="row">
                                            <div class="col-lg-6 offset-lg-3 j-c-c">
                                                <h1>{{ getAllValueWithMeta('heading', 'vendor-signup') }}</h1>
                                                <p>{{ getAllValueWithMeta('description', 'vendor-signup') }}</p>
                                              </div>
                                            </figcaption>
                                    </figure>
                                 </div>
                            <div class="col-lg-12">
                            <form class="signUp-form" action="{{url(route('ajax_register'))}}" method="POST"  id="registerVendorForm">
                              @csrf
                              <input type="hidden" name="type" value="1">
                               <div class="row">
                                   <div class="col-lg-6">                          
                                           <label>First Name</label>
                                       <div class="form-group">
                                           <input type="text" name="first_name" formControlName="firstName" placeholder="First Name" class="form-control" />
                                           <span class="input-icon"><i class="fas fa-user"></i></span>
                                       </div>                              
                                   </div>



                                   <div class="col-lg-6">                          
                                         <label>Last Name</label>
                                       <div class="form-group">
                                           <input type="text" name="last_name" formControlName="lastName" placeholder="Last Name" class="form-control"  />
                                              <span class="input-icon"><i class="fas fa-user"></i></span>
                                            
                                       </div>                              
                                   </div>



                                  <div class="col-lg-6">                          
                                         <label>Address</label>
                                       <div class="form-group">
                                           <input type="text" name="location" formControlName="location" placeholder="Location" class="form-control"  />
                                              <span class="input-icon"><i class="fas fa-map-marker"></i></span>
                                            
                                       </div>                              
                                   </div>
 


                                  <div class="col-lg-6">                          
                                         <label>Provide Your Business Website</label>
                                       <div class="form-group">
                                           <input type="text" name="website_url" placeholder="Provide External Website" class="form-control"  />
                                              <span class="input-icon"><i class="fas fa-link"></i></span>
                                            
                                       </div>                              
                                   </div>




                                  <div class="col-lg-6">                          
                                         <label>Phone Number</label>
                                       <div class="form-group">
                                           <input type="text" name="phone_number" formControlName="location" placeholder="Phone Number" class="form-control"/><span class="input-icon"><i class="fas fa-phone"></i></span>
                                            
                                       </div>                              
                                   </div>


                                   <div class="col-lg-6"> 
                                      <label>Provide EIN# or BS# 

                                        <div class="demo-app hasToggle"> 
                                            <i class="fas fa-info-circle"></i> 
                                            <span class="toggle-info-dropdown">
                                              <ul class="form-info-toggle">
                                                 <li><p>EIN# is tax registeration ID in the US For Businesses</p></li>
                                                 <li><p>BS# is tax registeration ID in the Canada For Businesses</p></li>
                                            </span>
                                        </div>
                                      </label>                         
                                       <div class="form-group">
                                            <input type="text" name="ein_bs_number" formControlName="email" placeholder="Provide EIN# or BS#" class="form-control"/>
                                            <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                        </div>                              
                                   </div>
                                   <div class="col-lg-6">                          
                                           <label>Age</label>
                                           <div class="form-group">
                                               <input type="date" id="age" name="age" formControlName="location" placeholder="Age" class="form-control"/>
                                               <span class="input-icon"><i class="fas fa-life-ring"></i></span>
                                           </div>                              
                                   </div>

                                   <div class="col-lg-6">                          
                                        <label>Provide your valid ID Proof.</label>
                                       <div class="form-group">
                                           <input type="file" name="id_proof" class="form-control"/>
                                              <span class="input-icon"><i class="fas fa-id-card"></i></span>
                                            
                                       </div>                              
                                   </div>

                                  <!--  <div class="col-lg-6">                          
                                        <label>2 x proof of business address </label>
                                       <div class="form-group">
                                           <input type="file" name="business_address_proof" formControlName="location" placeholder="Age" class="form-control"/>
                                              <span class="input-icon"><i class="fas fa-id-card"></i></span>
                                            
                                       </div>                              
                                   </div>

                                   <div class="col-lg-6">                          
                                        <label>Proof to show business is registered</label>
                                       <div class="form-group">
                                           <input type="file" name="business" formControlName="location" placeholder="Age" class="form-control"/>
                                              <span class="input-icon"><i class="fas fa-id-card"></i></span>
                                            
                                       </div>                              
                                   </div> -->
 
                                  <div class="col-lg-6">  
                                    <label>Choose Business Types</label>                        
                                       <div class="form-group">
                                        <?php $category = \App\Category::where('status',1)->where('parent',0)->orderBy('sorting','ASC')->get(); ?>                               
                                            <select class="form-control select2" multiple="multiple" name="categories[]" id="categories" data-placeholder="Select Categories">
                                              <option value="">Select Categories</option>
                                               @foreach($category as $cate)
                                                <option value="{{$cate->id}}">{{$cate->label}}</option>
                                               @endforeach
                                            </select>
                                              <span class="input-icon"><i class="fas fa-map-marker"></i></span>
                                            
                                       </div>                              
                                   </div>
                
                                  
                


                                    <div class="col-lg-6">  
                                      <label>Email Address</label>                        
                                       <div class="form-group">
                                           
                                           <input type="text" name="email" formControlName="email" placeholder="Email Address" class="form-control"  />
                                           <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                          
                                       </div>                              
                                   </div>
                
                                   <div class="col-lg-6">
                                     <label>Password</label>
                                       <div class="form-group">
                                        <input type="password" name="password" formControlName="password" placeholder="Password" id="password" class="form-control"  />
                                        <span class="input-icon"><i class="fas fa-key"></i></span>
                                        
                                       </div>
                                   </div>
              
                                 <div class="col-lg-6">
                                    <label>Confirm Password</label>
                                    <div class="form-group">
                                     <input type="password" name="password_confirmation" formControlName="confirm_password"  placeholder="Confirm Password" class="form-control" />
                                     <span class="input-icon"><i class="fas fa-key"></i></span>
                                    
                                    </div>
                                </div>  






     <!-- start  -->
                              <div class="col-md-12">
                                  <h3>Reference for Business</h3>
                                   <div class="row">

                                         <div class="col-lg-6">  
                                              <label>Choose Business Types</label>                        
                                                 <div class="form-group">
                                                      <?php $category = \App\Category::where('status',1)->where('parent',0)->orderBy('sorting','ASC')->get(); ?>                               
                                                          <select class="form-control select2" name="business_type"  data-placeholder="Select Categories">
                                                            <option value="">Select Business Type</option>
                                                             @foreach($category as $cate)
                                                              <option value="{{$cate->id}}">{{$cate->label}}</option>
                                                             @endforeach
                                                          </select>
                                                            <span class="input-icon"><i class="fas fa-map-marker"></i></span>
                                            
                                                 </div>                              
                                         </div>

                                       <div class="col-lg-6">  
                                              <label>Reference Business Name</label>                        
                                               <div class="form-group">
                                                    <input type="text" name="reference_business_name" formControlName="reference_business_name" placeholder="Business Name" class="form-control"  />
                                                   <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                                </div>                              
                                       </div>

                                       <div class="col-lg-6">  
                                              <label>Reference Email Address</label>                        
                                               <div class="form-group">
                                                    <input type="text" name="reference_email" formControlName="Reference email" placeholder="Email Address" class="form-control"  />
                                                   <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                              </div>                              
                                       </div>

                                       <div class="col-lg-6">  
                                              <label>Reference Contact Number</label>                        
                                               <div class="form-group">
                                                    <input type="text" name="reference_contact_number" formControlName="Reference Contact Number" placeholder="Contact Number" class="form-control"  />
                                                   <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                              </div>                              
                                       </div>


                                       <div class="col-lg-12">                          
                                              <label>Reference Business Address</label>
                                              <div class="form-group">
                                                  <input type="text" name="business_address" formControlName="location" placeholder="Reference Business Address" class="form-control"/>
                                                    <span class="input-icon"><i class="fas fa-map-marker"></i></span>
                                                  
                                             </div>                              
                                       </div>


                                   </div>
                              </div>
                              <!-- end  -->


















                               <div class="col-md-12">
                                    <div class="custom-control custom-checkbox mb-4">
                                      <input type="checkbox" class="custom-control-input" name="agree" value="1" id="customCheck1">
                                      <label class="custom-control-label" for="customCheck1">I agree to the Terms and Conditions. <div class="demo-app hasToggle"> 
                                            <i class="fas fa-info-circle"></i> 
                                            <span class="toggle-info-dropdown">
                                              <ul class="form-info-toggle">
                                                 <li><p>Allow us 48 hours to verify your business while you complete your profile and settle in. if we need any other information will shall be reaching out and if nothing else is needed you will be reviewing approving your business</p></li>
                                            </span>
                                        </div></label>
                                    </div>
                               </div>                                



                               </div>
                
                               
                                 
                                    <div class="form-group btn-wrap text-center">
                                        <button class="cstm-btn solid-btn register-Submit"><span><img src="{{url('200.gif')}}"></span>Register</button>
                                        
                                    </div>
                                    <div class="messages">
                                        </div>
                                    
                            </form>
                        </div>
                </div>
        </div> 
        </div>   
</section>

<section class="how-its-work-sec aos-init aos-animate" data-aos="fade-right" data-aos-duration="3000">
   <div class="container">
      <div class="sec-heading text-center">
         <h4>{{ getAllValueWithMeta('section1_title', 'vendor-signup') }}</h4>
         <h2>{{ getAllValueWithMeta('section1_tagline', 'vendor-signup') }}</h2>
      </div>
      <div class="row">
         <div class="col-lg-10 offset-lg-1">
            <div class="video-container">
               <figure>
                  <video class="video" id="bVideo" loop="" style="width: 100% !important;" height="100%" poster="{{ url('/uploads').'/'.getAllValueWithMeta('section1_video_poster', 'vendor-signup') }}">
                     <source src="{{ url('/uploads').'/'.getAllValueWithMeta('section1_video', 'vendor-signup') }}" type="video/mp4">
                  </video>
                  <div id="playButton" class="playButton" onclick="playPause()">
                     <span><i class="fas fa-play-circle"></i></span>
                  </div>
               </figure>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="testimonial">
   <div class="container aos-init" data-aos="fade-left" data-aos-duration="3000">
      <div class="sec-heading text-center">
         <h2>{{ getAllValueWithMeta('section2_title', 'vendor-signup') }}</h2>
      </div>
      <div class="test owl-carousel owl-theme owl-loaded owl-drag">
         
         
         
      <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-4480px, 0px, 0px); transition: all 0.25s ease 0s; width: 7840px;"><div class="owl-item cloned" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item cloned" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item active" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item cloned" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item cloned" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button></div></div>
   </div>
</section>

@endsection


@section('scripts')

<script type="text/javascript" src="{{url('/frontend/js/register.js')}}"></script>
 
<script type="text/javascript">
  $('#categories').select2({ 
    closeOnSelect: false
   });
</script> 

@endsection

