<div class="package-card" id="package-sec">
   <div class="container">
      <div class="pannel-card1">
         <div class="card-heading">
            <h3>Packages</h3>
         </div>
         <div class="packages-content">
            <div class="packages-wrap">
               <div class="row">


        @foreach($packages as $key => $package)
                             <div class="col-lg-4" id="package_clone_{{$package->id}}">
                                   <div class="package-card">
                                    <div class="inn-card">
                                      
                                      <div class="title">    	
                                        <div class="icon">
                                          <i class="fas fa-hand-holding-usd"></i>
                                        </div>
                                        <span class="pkg-amount">{{custom_format($package->price,2)}}</span>
                                       <!--  <p class="priceType">{{$package->price_type == "per_person" ? "Per Person" : "Fixed Price"}}</p> -->
                                      </div>

                                      <div class="content">
                                        <div class="inn-card-body">
                                          <h3 class="price-table-heading">{{$package->title}}</h3>
                                           <div class="pricing-category">
                                               <div class="pkg-summary">
                                                  <label>Decription</label> 
                                                    <div class="card-text">
                                                      <?= $package->description ?>      
                                                     </div>
                                               </div>

                                               @if(!empty($package->menus))
                                               <div class="pkg-summary">
                                                  <label>Menus</label> 
                                                    <div class="card-text">
                                                      {!! $package->menus !!}      
                                                     </div>
                                               </div>
                                               @endif

                                           </div>

                                        <!-- rk package details start -->
                                           <div class="pricing-category border-tp-bt">
                                              <div class="row">
                                                 <div class="col-md-6 border-rt">
                                                       <label for="no_of_hours">Amenities</label>
                                                       <ul class="pkg-listing-grp">  
                                                            <?php $amenities = getPackageAmenities($package); ?>
                                                          @foreach($amenities as $amenity)
                                                            <li class="pkg-listing">{{$amenity->amenity->name}}</li>
                                                          @endforeach
                                                       </ul>       
                                                  </div>
                                                  <div class="col-md-6">
                                                         <label for="no_of_hours">Events</label>
                                                          <ul class="pkg-listing-grp">
                                                            <?php $packageEvents = getPackageEvents($package); ?>
                                                               @foreach($packageEvents as $amenity)
                                                                    <li class="pkg-listing">{{$amenity->event->name}}</li>
                                                                @endforeach
                                                          </ul>
                                                 </div>
                                                 <div class="col-md-6">
                                                         <label for="no_of_hours">Games</label>
                                               
                                                           <ul class="pkg-listing-grp">  
                                                            <?php $getPackageGames = getPackageGames($package); ?>
                                                            @foreach($getPackageGames as $game)
                                                               <li class="pkg-listing">{{$game->amenity->name}}</li>
                                                            @endforeach
                                                           </ul>
                                                 </div>
                                              </div>
                                            </div>

                                            @if(count($package->package_addons))
                                        <div class="pricing-category">
                                              <label for="add-ons">Add Ons</label>

                                              @foreach($package->package_addons as $package_addon)
                                                <div class="vendor-category">
                                                  <div class="category-checkboxes category-title">
                                                    {{$package_addon->key}} 
                                                    ${{$package_addon->key_value}}
                                                  </div>
                                                </div>
                                              @endforeach
                                        </div>
                                        @endif
                                        
                                  <table class="pricing-inn-table">
                                    <tbody>
                                          <tr>
                                           <th>Service Timing</th>
                                          <td>{{$package->no_of_hours}} {{$package->no_of_hours > 1 ? 'Hours' : 'Hour'}}</td>
                                        </tr>
                                        <tr>
                                           <th>Package For (In Days)</th>
                                           <td>{{$package->no_of_days}} {{$package->no_of_days > 1 ? 'Days' : 'Day'}}</td>
                                        </tr>
                                         
                                        <tr>
                                           <th>Number of Person</th>
                                           <td>({{$package->min_person}} - {{$package->max_person}}) Persons</td>
                                        </tr>
                                    </tbody>
                                  </table>
                                  </div>

                                 @if(empty($reviewing))
                                        <div class="btn-area inn-card-footer" id="buy-content">
                                          <!--  <a href="{{url(route('payWithPackage',$package->slug))}}" class="cstm-btn">Buy</a> -->

                                          <a href="javascript:void(0);"  data-toggle="modal" data-target="#cartModal" class="cstm-btn">Buy</a>
                                          
                                            <div class="custom-control custom-checkbox hide">
                                                <input type="checkbox" data-package="{{$package}}" class="custom-control-input" id="customCheck_{{$package->id}}">
                                                <label class="custom-control-label" for="customCheck_{{$package->id}}">Compare</label>
                                              </div>
                                             
                                        </div>
                                  @endif
                                       
                                 </div>

                              </div>
                            </div> 
                          </div>

@endforeach




               </div>
            </div>
         </div>
      </div>
   </div>
</div>




























