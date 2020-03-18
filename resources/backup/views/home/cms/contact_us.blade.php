@extends('layouts.home')
@section('content')
<section class="log-sign-banner" style="background:url('/frontend/images/banner-bg.png');">
    <div class="container">
        <div class="page-title text-center">
            <h1>Get in touch</h1>
        </div>
    </div>    
</section>
<section class="contact-us-sec">
   <div class="container">
      <div class="sec-card">      	
		<div class="row">
			<div class="col-lg-7">
			  <form class="contact-us">
			  	<div class="card-heading">
						<h3>send your message</h3>			
					</div>
					<div class="row">
					<div class="col-lg-6">
	                     <div class="form-group">
	                         <input type="text" id="" class="form-control" placeholder="First Name">
	                           <span class="input-icon"><i class="fas fa-user"></i></span>
	                     </div>
	                 </div>
	                 <div class="col-lg-6">
	                     <div class="form-group">
	                         <input type="text" id="" class="form-control" placeholder="Last Name">
	                           <span class="input-icon"><i class="fas fa-user"></i></span>
	                     </div>
	                 </div>
	                 <div class="col-lg-6">
	                     <div class="form-group">                                           
                            <input type="text" formcontrolname="email" name="email" required="" placeholder="Email Id" class="form-control">
                             <span class="input-icon"><i class="fas fa-envelope"></i></span>                                           
                         </div>
	                 </div>
	                 <div class="col-lg-6">
	                     <div class="form-group">
	                         <input type="text" id="" class="form-control" placeholder="Phone">
	                           <span class="input-icon"><i class="fas fa-phone"></i></span>
	                     </div>
	                 </div>
	                 <div class="col-lg-12">
	                     <div class="form-group">	                        
	                         <textarea rows="5" class="form-control" placeholder="Your Message"></textarea>	                           
	                     </div>
	                 </div>
	                 <div class="col-lg-12">
	                     <div class="form-group">	                        
	                         <a href="javascript:void(0);" class="cstm-btn solid-btn"> Send </a>                           
	                     </div>
	                 </div>
				</div>
			 </form>
		  </div>
		<div class="col-lg-5">
			<div class="contact-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50017129.747348726!2d-115.30606582615425!3d40.07979883502246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1574426579303!5m2!1sen!2sin"></iframe>
			</div>
		</div>
	    </div>
      	</div>
      </div>
  </section>









































@endsection