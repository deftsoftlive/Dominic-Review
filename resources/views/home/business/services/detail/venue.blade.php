<!-- End here -->
<div class="venue-card" id="venue-sec">
	<div class="pannel-card">
		@if(!empty($types) && !empty($vendor->venueComment) && !empty($vendor->status))
		 <?= notoficationBusinessFlash($types, $vendor->venueComment, $vendor->status) ?>
		 @endif
		<div class="card-heading">
			<h3>Service Detail</h3>			
		</div>		
		<div class="venue-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="feature-wrap">
						
						<div class="feature-detail">
							<h4><span class="feature-icon">
							<i class="fas fa-clipboard-list"></i>
				          </span> Services:</h4>
							 <ul class="detail-listing">
							 	@foreach($services as $k => $service)

                                    <li>{{$service->category->label}}</li>

                                    
							 	@endforeach
							 </ul>
						</div>
					</div>
				</div>

 
				<div class="col-lg-12">
					<div class="feature-wrap">
						
					 
						<div class="feature-detail">
							<h4><span class="feature-icon">
							<i class="fas fa-sun"></i>
				                      </span> Styles:</h4>
							 <ul class="detail-listing">
							 	@foreach($styles as $k => $style)
                                   
                                    <li>{{$style->style->title}}</li>
                                   
                                    
							 	@endforeach
							 </ul>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="feature-wrap">						
						 
							<div class="feature-detail">
							<h4><span class="feature-icon">
							<i class="fas fa-calendar-check"></i>
				                      </span> Events:</h4>
							 <ul class="detail-listing">
							 	@foreach($VendorEvents as $k => $event)
							 	    @if(getSeasonOfBusiness($event->event_id,$event->category_id,'event') > 0)
                                    <li>{{$event->Event->name}}</li>    
                                    @endif                                
							 	@endforeach
							 </ul>
						</div>
					</div>
				</div>
				
				<div class="col-lg-12">
					<div class="feature-wrap">
						
						<div class="feature-detail">
							<h4><span class="feature-icon">
							<i class="fas fa-poo-storm"></i>
				                      </span> Seasons:</h4>
							 <ul class="detail-listing">
							 	 @foreach($seasons as $k => $season)
                                   @if(getSeasonOfBusiness($season->keyValue,$season->category_id,'seasons') > 0)
                                    <li>{{$season->season->name}}</li>
                                   @endif
                                 @endforeach
							 </ul>
						</div>
					</div>
				</div>

                @if($vendor->category->capacity == 1)
				<div class="col-lg-12">
					<div class="feature-wrap">
						
						<div class="feature-detail">
							<h4><span class="feature-icon">
							<i class="fas fa-users" style="font-size: 23px;"></i>
				                      </span> Guest Capacity:</h4>
							  <ul class="detail-listing">
							      @if($vendor->capacity_type == 1)
                                      <li>Sitting Capacity ({{$vendor->sitting_capacity}} Guest)</li>
							      @elseif($vendor->capacity_type == 2)
                                       <li>Standing Capacity ({{$vendor->standing_capacity}} Guest)</li>
							      @elseif($vendor->capacity_type == 3)
                                     <li>Sitting Capacity ({{$vendor->sitting_capacity}})</li> <li>Standing Capacity ({{$vendor->standing_capacity}})</li>
							      @endif
                                           
                                    
							  </ul>
						</div>
					</div>
				</div>

				@endif

				<div class="col-lg-12">
					<div class="map-wrap" id="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.6679305117195!2d76.68865401499058!3d30.699617894279218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390feef69353d285%3A0x6d3c38ef8c74065!2sDeftsoft!5e0!3m2!1sen!2sin!4v1574179093907!5m2!1sen!2sin" allowfullscreen=""></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>