<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

    <section class="football-course-sec">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="football-course-content">
    					<h2 class="f-course-heading">FOOTBALL COURSES</h2>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <section class="services-sec">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-7">
    				<ul class="services-description">
    					<li>
    						<h2>FOOTBALL COACHING WITH DRH</h2>
    						<p>DRH Sports has teamed up with the MK City Colts FC to offer not just fantastic junior football coaching, but to provide a seamless link into teams and competition</p>
    					</li>
    					<li>
    						<h2>OUR FOOTBALL COACHES</h2>
    						<p>At DRH Sports all our football coaches are fully FA qualified, insured, DBS checked and First Aid Trained. Collectively they have a great amount of experience and expertise and they all share a passion for football and coaching. Each and every one of our coaches brings energy and enthusiasm on court - they all love what they do, and we have been told that it shows!</p>
    					</li>
    					<li>
    						<h2>OUR COURSES & CLASSES EXPLAINED</h2>
    						<p>We currently only offer a Tadpoles coaching class which is for boys and girls aged 5 and 6 years old. The aim of the class is to create the next under 7s MK City Colts team which will be lead and manged by one of the parents.</p>
    					</li>
    				</ul>
    			</div>
    			<div class="col-md-5">
    			  <div class="demo-form">	
    			  	<h1 class="demo-form-heading">Request For Free Demo</h1>
    				<form>
    			      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Enter Phone Number">
                      </div>
                      <div class="form-group">
                         <input type="email" class="form-control" placeholder="Enter Email Address">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Enter Subject">
                      </div>
                      <div class="form-group">
                        <textarea class="form-control demo-textarea" rows="3" placeholder="Enter Message"></textarea>
                      </div>
                      <button type="submit" class="cstm-btn">Request Demo</button>
    				</form>
    			  </div>
    			</div>
    			<div class="col-md-12">
    			  <div class="demo-slider owl-carousel owl-theme">
	                <div class="item">
	                  <figure class="demo-slider-img">
	                  	<img src="{{ URL::asset('public/images/demo-img-1.png')}}">
	                  </figure>
	                </div>
	                <div class="item">
	                  <figure class="demo-slider-img">
	                  	<img src="{{ URL::asset('public/images/demo-img-2.png')}}">
	                  </figure>
	                </div>
	                <div class="item">
	                  <figure class="demo-slider-img">
	                  	<img src="{{ URL::asset('public/images/demo-img-3.png')}}">
	                  </figure>
	                </div>
	                <div class="item">
	                  <figure class="demo-slider-img">
	                  	<img src="{{ URL::asset('public/images/demo-img-1.png')}}">
	                  </figure>
	                </div>
	                <div class="item">
	                  <figure class="demo-slider-img">
	                  	<img src="{{ URL::asset('public/images/demo-img-2.png')}}">
	                  </figure>
	                </div>
	                <div class="item">
	                  <figure class="demo-slider-img">
	                  	<img src="{{ URL::asset('public/images/demo-img-3.png')}}">
	                  </figure>
	                </div>
	              </div>
    			</div>
    		</div>
    	</div>
    </section>
    <sectiion class="events-sec">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    			  <form>
    			  <div class="form-row">
    			  	<div class="form-group col-md-4">
                      <label for="inputCity">Search Course</label>
                      <input type="text" class="form-control" id="inputCity" placeholder="Course A">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputAge">Select Age Group</label>
                      <select id="inputAge" class="form-control event-dropdown">
                        <option selected>14+</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputLevel">Select Level</label>
                      <select id="inputLevel" class="form-control event-dropdown">
                        <option selected>Level </option>
                        <option>...</option>
                      </select>
                    </div>
                  </div>
                  </form>
    			</div>
    			<div class="col-md-12">
    				<div class="event-sec-heading">
    					<h1>Early Bird Discount</h1>
    				</div>
    			</div>
    			<div class="col-md-8 offset-md-2">
    				<div class="Countdown-timer-content">
    				    <h2 class="Countdown-heading">Prices Go Up When The Timer Hits Zero!</h2>
    				    <div class="Countdown-timer-wrap">
    				      <ul class="Countdown-timer">
                            <li><span id="days"></span>Days</li>
                            <li><span id="hours"></span>Hrs</li>
                            <li><span id="minutes"></span>Mins</li>
                            <li><span id="seconds"></span>Secs</li>
                          </ul>
                        </div>
                    </div>
    			</div>
    			<div class="col-md-6">
            <ul class="events-wrap">
              <li>
                <div class="event-card">
                  <div class="event-card-heading">
                      <h3>TADPOLES - SAT 9-10AM - SPRING 2020</h3>
                                </div>
                                <div class="event-info">
                                  <p><span>Age :</span>School foundation and year 1</p>
                                  <p><span>Session dates (12 weeks) :</span>Jan 11th, 18th, 25th – Feb 1st,  8th, 15th, 29th - Mar 7th, 14th, 21st, 28th – Apr 4th</p>
                                  <p><span>Location :</span>NDOORS at Oakgrove Leisure Centre, MK10 9JQ</p>
                                  <p><span>Day/Time :</span> Saturday 9-10am</p>
                                  <p>There will be no coaching during half term(Monday Feb 13th - Sunday
                                    Feb 23rd 2020)</p>
                                </div>
                                <div id="accordion-1" class="myaccordion">
                  <div class="card">
                    <div class="card-header" id="headingFirst">
                      <h2 class="mb-0">
                        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFirst" aria-expanded="false" aria-controls="collapseFirst">
                         For More Information
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFirst" class="collapse" aria-labelledby="headingFirst" data-parent="#accordion-1">
                      <div class="card-body">
                        <ul>
                          <li>Computer Science</li>
                          <li>Economics</li>
                          <li>Sociology</li>
                          <li>Nursing</li>
                          <li>English</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="event-card-form">
                    <form>
                      <div class="form-group">
                                          <label for="inputPlayer-3">Select Player</label>
                                          <select id="inputPlayer-3" class="form-control event-dropdown">
                                            <option selected>Player 1</option>
                                            <option>...</option>
                                          </select>                                                               
                                        </div>                                  
                    </form>
                  </div>
                <div class="event-booking">
                  <h1 class="event-booking-price"><span>£</span>42.00</h1>
                  <a href="javascript:void(0);" class="cstm-btn">Book Now</a>
                </div>
                </div>
              </li>
            </ul>
          </div>
    			<div class="col-md-6">
    				<ul class="events-wrap">
    					<li>
    						<div class="event-card">
    							<div class="event-card-heading">
    							    <h3>TADPOLES - SAT 9-10AM - SPRING 2020</h3>
                                </div>
                                <div class="event-info">
                                	<p><span>Age :</span>School foundation and year 1</p>
                                	<p><span>Session dates (12 weeks) :</span>Jan 11th, 18th, 25th – Feb 1st,  8th, 15th, 29th - Mar 7th, 14th, 21st, 28th – Apr 4th</p>
                                	<p><span>Location :</span>NDOORS at Oakgrove Leisure Centre, MK10 9JQ</p>
                                	<p><span>Day/Time :</span> Saturday 9-10am</p>
                                	<p>There will be no coaching during half term(Monday Feb 13th - Sunday
                                    Feb 23rd 2020)</p>
                                </div>
                                <div id="accordion-2" class="myaccordion">
								  <div class="card">
								    <div class="card-header" id="headingTwo">
								      <h2 class="mb-0">
								        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								         For More Information
								        </button>
								      </h2>
								    </div>
								    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-2">
								      <div class="card-body">
								        <ul>
								          <li>Computer Science</li>
								          <li>Economics</li>
								          <li>Sociology</li>
								          <li>Nursing</li>
								          <li>English</li>
								        </ul>
								      </div>
								    </div>
								  </div>
								</div>
								<div class="event-card-form">
								    <form>
									    <div class="form-group">
                                          <label for="inputPlayer-2">Select Player</label>
                                          <select id="inputPlayer-2" class="form-control event-dropdown">
                                            <option selected>Player 1</option>
                                            <option>...</option>
                                          </select>                                                               
                                        </div>                                  
								    </form>
							    </div>
								<div class="event-booking">
									<h1 class="event-booking-price"><span>£</span>42.00</h1>
									<a href="javascript:void(0);" class="cstm-btn">Book Now</a>
								</div>
    						</div>
    					</li>
    				</ul>
    			</div>
    			<div class="col-md-6">
    				<ul class="events-wrap">
    					<li>
    						<div class="event-card">
    							<div class="event-card-heading">
    							    <h3>TADPOLES - SAT 9-10AM - SPRING 2020</h3>
                                </div>
                                <div class="event-info">
                                	<p><span>Age :</span>School foundation and year 1</p>
                                	<p><span>Session dates (12 weeks) :</span>Jan 11th, 18th, 25th – Feb 1st,  8th, 15th, 29th - Mar 7th, 14th, 21st, 28th – Apr 4th</p>
                                	<p><span>Location :</span>NDOORS at Oakgrove Leisure Centre, MK10 9JQ</p>
                                	<p><span>Day/Time :</span> Saturday 9-10am</p>
                                	<p>There will be no coaching during half term(Monday Feb 13th - Sunday
                                    Feb 23rd 2020)</p>
                                </div>
                                <div id="accordion-3" class="myaccordion">
								  <div class="card">
								    <div class="card-header" id="headingThree">
								      <h2 class="mb-0">
								        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								         For More Information
								        </button>
								      </h2>
								    </div>
								    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion-3">
								      <div class="card-body">
								        <ul>
								          <li>Computer Science</li>
								          <li>Economics</li>
								          <li>Sociology</li>
								          <li>Nursing</li>
								          <li>English</li>
								        </ul>
								      </div>
								    </div>
								  </div>
								</div>
								<div class="event-card-form">
								    <form>
									    <div class="form-group">
                                          <label for="inputPlayer-3">Select Player</label>
                                          <select id="inputPlayer-3" class="form-control event-dropdown">
                                            <option selected>Player 1</option>
                                            <option>...</option>
                                          </select>                                                               
                                        </div>                                  
								    </form>
							    </div>
								<div class="event-booking">
									<h1 class="event-booking-price"><span>£</span>42.00</h1>
									<a href="javascript:void(0);" class="cstm-btn">Book Now</a>
								</div>
    						</div>
    					</li>
    				</ul>
    			</div>
    			<div class="col-md-6">
    				<ul class="events-wrap">
    					<li>
    						<div class="event-card">
    							<div class="event-card-heading">
    							    <h3>TADPOLES - SAT 9-10AM - SPRING 2020</h3>
                                </div>
                                <div class="event-info">
                                	<p><span>Age :</span>School foundation and year 1</p>
                                	<p><span>Session dates (12 weeks) :</span>Jan 11th, 18th, 25th – Feb 1st,  8th, 15th, 29th - Mar 7th, 14th, 21st, 28th – Apr 4th</p>
                                	<p><span>Location :</span>NDOORS at Oakgrove Leisure Centre, MK10 9JQ</p>
                                	<p><span>Day/Time :</span> Saturday 9-10am</p>
                                	<p class="">There will be no coaching during half term(Monday Feb 13th - Sunday
                                    Feb 23rd 2020)</p>
                                </div>
                                <div id="accordion-4" class="myaccordion">
								  <div class="card">
								    <div class="card-header" id="headingFour">
								      <h2 class="mb-0">
								        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								         For More Information
								        </button>
								      </h2>
								    </div>
								    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion-4">
								      <div class="card-body">
								        <ul>
								          <li>Computer Science</li>
								          <li>Economics</li>
								          <li>Sociology</li>
								          <li>Nursing</li>
								          <li>English</li>
								        </ul>
								      </div>
								    </div>
								  </div>
								</div>
								<div class="event-card-form">
								    <form>
									    <div class="form-group">
                                          <label for="inputPlayer-4">Select Player</label>
                                          <select id="inputPlayer-4" class="form-control event-dropdown">
                                            <option selected>Player 1</option>
                                            <option>...</option>
                                          </select>                                                               
                                        </div>                                  
								    </form>
							    </div>
								<div class="event-booking">
									<h1 class="event-booking-price"><span>£</span>42.00</h1>
									<a href="javascript:void(0);" class="cstm-btn">Book Now</a>
								</div>
    						</div>
    					</li>
    				</ul>
    			</div>
    		</div>
    	</div>
    </sectiion>
    <section class="testimonial-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="testimonial-heading text-center">
            	<div class="section-heading">
                  <h1 class="sec-heading">Testimonials</h1>
                </div>
            </div>  	
          </div>
          <div class="col-md-12">
            <div class="testimonial-slider owl-carousel owl-theme">
	          <div class="item">
	          	<div class="testimonial-card">
	              <figure class="testimonial-img-wrap">
	         		<img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
	       		  </figure>
	              <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                      	<img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>RIA HANNAH</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
	          	</div>
	          </div>
	          <div class="item">
	          	<div class="testimonial-card alt-testimonial-card">
	              <figure class="testimonial-img-wrap">
	         		<img src="{{ URL::asset('public/images/testimonial-card-img-2.png')}}">
	       		  </figure>
	              <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                      	<img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>MARBEL FREYTAG</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
	          	</div>
	          </div>
	          <div class="item">
	          	<div class="testimonial-card">
	              <figure class="testimonial-img-wrap">
	         		<img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
	       		  </figure>
	              <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                      	<img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>NIKKI ROGERS</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
	          	</div>
	          </div>
	          <div class="item">
	          	<div class="testimonial-card">
	              <figure class="testimonial-img-wrap">
	         		<img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
	       		  </figure>
	              <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                      	<img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>RIA HANNAH</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
	          	</div>
	          </div>
	          <div class="item">
	          	<div class="testimonial-card alt-testimonial-card">
	              <figure class="testimonial-img-wrap">
	         		<img src="{{ URL::asset('public/images/testimonial-card-img-2.png')}}">
	       		  </figure>
	              <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                      	<img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>MARBEL FREYTAG</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
	          	</div>
	          </div>
	          <div class="item">
	          	<div class="testimonial-card">
	              <figure class="testimonial-img-wrap">
	         		<img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
	       		  </figure>
	              <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                      	<img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>NIKKI ROGERS</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
	          	</div>
	          </div>
	          <div class="item">
	          	<div class="testimonial-card">
	              <figure class="testimonial-img-wrap">
	         		<img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
	       		  </figure>
	              <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                      	<img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>RIA HANNAH</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
	          	</div>
	          </div>
	          <div class="item">
	          	<div class="testimonial-card alt-testimonial-card">
	              <figure class="testimonial-img-wrap">
	         		<img src="{{ URL::asset('public/images/testimonial-card-img-2.png')}}">
	       		  </figure>
	              <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                      	<img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>MARBEL FREYTAG</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
	          	</div>
	          </div>
	          <div class="item">
	          	<div class="testimonial-card">
	              <figure class="testimonial-img-wrap">
	         		<img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
	       		  </figure>
	              <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                      	<img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>NIKKI ROGERS</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
	          	</div>
	          </div>
	        </div>
          </div>
        </div>
      </div>
    </section>
    <section class="click-here-sec">
      <div class="container">
        <div class="row">
        	<div class="col-md-8 offset-md-2">
        		<div class="click-sec-content">
        		  <h2 class="click-sec-tagline">Need help with kids camps or our coaching courses?</h2>
        	  	  <ul class="click-btn-content">
        	  	    <li>
        	          <figure>
        		   	    <img src="{{ URL::asset('public/images/click-btn-img.png')}}">
        			  </figure>
        		  	</li>
        		  	<li>
        		  		<a href="javascript:void(0);" class="cstm-btn">click here</a>
        		  	</li>
        		  	<li>
        	          <figure>
        		   	    <img src="{{ URL::asset('public/images/click-btn-img.png')}}">
        			  </figure>
        		  	</li>
        		    </ul>
        		</div>
        	</div>
        </div>
      </div>
    </section>

@endsection
<!-- Footer Section-->