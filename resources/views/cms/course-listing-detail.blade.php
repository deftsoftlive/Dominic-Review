<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')
<section class="football-course-sec" style="background: url(http://49.249.236.30:8654/dominic-new/public/uploads/1583997335banner_image.png);">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="football-course-content">
    					<h2 class="f-course-heading">{{$course->title}}</h2>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
<section class="course-list-detail ">
	<div class="container">
		<div class="row">
          <div class="col-md-12 sports-text">
            <ul class="events-wrap">
              <li>
                <div class="event-card">
                  <div class="event-card-heading">
                      <h3>{{$course->term}} - {{$course->day_time}}</h3>
                                </div>
                                <!-- <div class="event-info">
                                  <p><span>Age :</span>{{$course->age}}</p>
                                  <p><span>Session dates (12 weeks) :</span>{{$course->session_date}}</p>
                                  <p><span>Location :</span>{{$course->location}}</p>
                                  <p><span>Day/Time :</span> {{$course->day_time}}</p>
                                  <p>There will be no coaching during half term(Monday Feb 13th - Sunday
                                    Feb 23rd 2020)</p>
                                </div> -->
                                <div class="event-outer-wrap">
                                <div class="event-info-dt">
                                   <p>Age</p>
                                   <span>{{$course->age}}</span>
                                </div>
                                <div class="event-info-dt">
                                   <p>Location</p>
                                   <span>{{$course->location}}</span>
                                </div>
                                <div class="event-info-dt">
                                   <p>Day & Time</p>
                                   <span>{{$course->day_time}}</span>
                                </div>
                                <div class="event-info-dt">
                                   <p>Level</p>
                                   <span>Begineer</span>
                                </div>
                              </div>

                                <ul class="day-list">
                                  <li><a href="javascript:void(0);" class="cstm-btn days-btn disable-btn">march 1</a></li>
                                  <li><a href="javascript:void(0);" class="cstm-btn days-btn disable-btn">march 2</a></li>
                                  <li><a href="javascript:void(0);" class="cstm-btn days-btn">march 3</a></li>
                                  <li><a href="javascript:void(0);" class="cstm-btn days-btn">march 4</a></li>
                                  <li><a href="javascript:void(0);" class="cstm-btn days-btn">march 5</a></li>
                                  <li><a href="javascript:void(0);" class="cstm-btn days-btn">march 6</a></li>
                                  <li><a href="javascript:void(0);" class="cstm-btn days-btn">march 7</a></li> 
                                  <li><a href="javascript:void(0);" class="cstm-btn days-btn">march 8</a></li>
                                  

                                </ul>
                                <div class="event-text">
                                  <h4>{{$course->description}}</h4>
                                  <p>{{$course->more_info}}</p>
                                </div>
                                <!-- <div id="accordion-1" class="myaccordion">
                  <div class="card">
                    <div class="card-header" id="headingFirst">
                      <h2 class="mb-0">
                        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFirst" aria-expanded="false" aria-controls="collapseFirst">
                         {{$course->description}}
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFirst" class="collapse" aria-labelledby="headingFirst" data-parent="#accordion-1">
                      <div class="card-body">
                        <ul>
                          {{$course->more_info}}
                        </ul>
                      </div>
                    </div>
                  </div>
                </div> -->
                <div class="event-card-form">
                    <form>
                      <div class="form-group">
                                          <label for="inputPlayer-3">Select Player</label>
                                          <select id="inputPlayer-3" class="form-control event-dropdown">
                                            <option selected="">Player 1</option>
                                            <option>...</option>
                                          </select>                                                               
                                        </div>                                  
                    </form>
                  </div>
                <div class="event-booking">
                  <h1 class="event-booking-price"><span>£</span>{{$course->price}}</h1>
                  <a href="javascript:void(0);" class="cstm-btn">Book Now</a>
                </div>
                </div>
              </li>
            </ul>
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
        		   	    <img src="http://49.249.236.30:8654/dominic-new/public/images/click-btn-img.png">
        			  </figure>
        		  	</li>
        		  	<li>
        		  		<a href="" class="cstm-btn">Click Here</a>
        		  	</li>
        		  	<li>
        	          <figure>
        		   	    <img src="http://49.249.236.30:8654/dominic-new/public/images/click-btn-img.png">
        			  </figure>
        		  	</li>
        		    </ul>
        		</div>
        	</div>
         
        </div>
      </div>
    </section>
@endsection