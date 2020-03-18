@extends('users.checkout.index1')
@section('checkoutContent')



<fieldset>
      <div class="card-heading">
            <h3>Deal Details</h3>
        </div>
          <div class="multistep-body text-center">
              
              <div class="deal-review-card">

          		<div class="deals-card mini-deal-card">
				    <figure class="deal-img">
				      <img src="http://49.249.236.30:8654/images/vendors/deals/1575974893kxtKknJAD099cgwqhMzZapproved.jpg">
				      <figcaption class="discount-per"><span class="blink-text">
				                 50% 
				                <small> OFF</small></span> </figcaption>      
				    </figure>
				     <div class="detal-card-details">
				      <div class="dealls-dis-head">
				        <a href="http://49.249.236.30:8654/listing/photography/prateek-dua-photography#deals-sec"> <h4>50 Percent Off</h4></a>

				<p class="ser-text"> <span><i class="fas fa-calendar-alt"></i></span>
				                        <span class="deal-starting-date">Stating:<strong> 10-12-2019</strong></span> <span class="deal-starting-date">Ending:<strong> 31-12-2019</strong></span>
				           <!-- Expires on 2019-12-31 00:00:00 -->
				                </p>

				              </div>
				      <p class="deal-discription">
				                           50% OFF on my Packages. 
				        </p>
				     </div>

				  </div>
          		  

          		
          	</div>

             <div class="multistep-footer mt-4 text-right"> 

              @if(!empty($newStepUrl)) 
                <form method="post">
              	   @csrf
              @if(!empty($backStepUrl))
                 <a href="{{$backStepUrl}}" class="cstm-btn solid-btn previous_button">Back</a>
              @endif
              	     
                	 <button class="next cstm-btn solid-btn">Next</button>
                </form>               
              @endif
            </div>
           </div>

    </fieldset>



@endsection