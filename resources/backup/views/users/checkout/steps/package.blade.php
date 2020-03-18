@extends('users.checkout.index1')
@section('checkoutContent')




<fieldset>
<div class="checkout-step">
    <!--  <h4><i class="fa fa-th"></i> Package </h4> -->
     <div class="card-heading">
      <h3> Package</h3>          
    </div>
                     
     <div class="description-package text-left">
            <h4>{{$package->title}}</h4>
            <p><?= $package->description ?> </p>
           

            

                <div class="pkg-ser-list">
                    <div class="row">

@if(count($package->amenities) > 0)
			             <div class="col-lg-4 col-md-6">
                    <div class="amt-list-wrap">
			               <label for="no_of_hours">Amenities</label>
			               <ul class="pkg-listing-grp">  
			                  @foreach($package->amenities as $amenity)
			                    <li class="pkg-listing">{{$amenity->amenity->name}}</li>
			                  @endforeach
			               </ul>
                   </div>
			            </div>
                  @endif

@if(count($package->events) > 0)
			            <div class="col-lg-4 col-md-6">
                    <div class="amt-list-wrap">
			                <label for="no_of_hours">Events</label>
                                               
                           <ul class="pkg-listing-grp">  
                            @foreach($package->events as $amenity)
                               <li class="pkg-listing">{{$amenity->event->name}}</li>
                            @endforeach
                           </ul>
			            </div>
                </div>
                @endif

                @if(count($package->games) > 0)
                    <div class="col-lg-4 col-md-6">
                      <div class="amt-list-wrap">
                             <label for="no_of_hours">Games</label>
                   
                               <ul class="pkg-listing-grp">  
                                @foreach($package->games as $game)
                                   <li class="pkg-listing">{{$game->amenity->name}}</li>
                                @endforeach
                               </ul>
                     </div>
                   </div>
                   @endif

                   <!--   <div class="col-md-12">
                      <div class="amt-list-wrap">
		                      <label for="no_of_hours">Summery</label>
		                      <ul class="pkg-listing-grp row">
				            	<li class="pkg-listing col-lg-4 col-md-6"><span>Service Timing</span> {{$package->no_of_hours}} {{$package->no_of_hours > 1 ? 'Hours' : 'Hour'}}</li>
				            	<li class="pkg-listing col-lg-4 col-md-6"><span>Package For (In Days)</span> {{$package->no_of_days}} {{$package->no_of_days > 1 ? 'Days' : 'Day'}}</li>
				            	<li class="pkg-listing col-lg-4 col-md-6"><span>Number of Person</span> ({{$package->min_person}} - {{$package->max_person}}) Persons</li>
				            </ul>
                     </div>
                   </div> -->

                   </div>
                 </div>


                    <form method="post" class="row">
                     <div class="col-md-12">

                            
                                      @if(count($package->package_addons))
                                        
                                              <label for="add-ons">Choose Add Ons <i data-toggle="tooltip" data-placement="top" title="Choose Add Ons listed below for this package" class="fas fa-info-circle"></i></label>
                                              <ul class="row">
                                           @foreach($package->package_addons as $package_addon)
                                                <li class="col-lg-6">
                                                     <div class="checkbox-input-wrap">
                                                          <div class="category-checkboxes category-title">
                                                          <input type="checkbox" name="addons[]" class="checkboxess" data-value="{{$package_addon->key_value}}" value="{{$package_addon->id}}" id="add-ons{{$package_addon->id}}" <?= in_array($package_addon->id,$addons) ? 'checked' : ''?>>
                                                              <label for="add-ons{{$package_addon->id}}"><b>{{$package_addon->key}} </b> <span>${{$package_addon->key_value}}</span></label>
                                     
                                                        </div>
                                                   </div>
                                                </li>
                                                @endforeach

                                              </ul> 

                                              <!-- @foreach($package->package_addons as $package_addon)
                                               <li>
                                               	<input {{in_array($package_addon->id,$addons) ? 'checked' : ''}} type="checkbox" name="addons[]" class="checkboxess" data-value="{{$package_addon->key_value}}" value="{{$package_addon->id}}" id="add-ons{{$package_addon->id}}" />
                                               	<label for="add-ons{{$package_addon->id}}"><b>{{$package_addon->key}} </b> <span>${{$package_addon->key_value}}</span></label>
                                               </li>
                                              @endforeach -->
                                        
                                        @endif


                     </div>

                     <!-- <div class="col-md-12">
                     	     <table>
                     	     	<tr>
                     	     		<th>Price</th><td>$<span id="packagePrice">{{$package->price}}</span></td>
                     	     	</tr>
                     	     </table>
                     </div> -->

                     <div class="col-md-12"> 
                      @csrf
	                     	    <!-- <button class="cstm-btn solid-btn">Continue</button> -->

                            <div class="multistep-footer mt-4 text-right"> 
                              @if(!empty($backStepUrl))
                                 <a href="{{$backStepUrl}}" class="cstm-btn solid-btn previous_button">Back</a>
                              @endif

                            
                               <button class="next cstm-btn solid-btn">Next</button>
                              
                            </div>

                     </div>



                     </form>
     </div>

</div>
</fieldset>



@endsection

@section('scripts')

<script type="text/javascript">
 
 $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

   function getpriceWithAddons(packagePrice="<?= $package->price ?>") {
   	            var price = parseInt(packagePrice);
   	            $(".checkboxess:checked").each(function() {
                     price = (price + parseInt($(this).attr('data-value')));
                });
          
          $("body").find('#packagePrice').text(price);



   }

   $("body").on('change','.checkboxess',function(){
            getpriceWithAddons();
   });

</script>


@endsection