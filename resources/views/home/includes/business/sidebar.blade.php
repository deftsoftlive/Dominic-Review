<div class="col-lg-3 range eventside-bar">
    <form id="BusinessListingFilter" action="{{url(route('get_all_businesses'))}}">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                                        category
                                    </a>
                                </div>


                                @if(Request::has('category_id') && Request::get('category_id') > 0)
                                    <input type="hidden" name="vendors[]" value="{{Request::get('category_id')}}">
                                @endif
 
                              


                                 @if(Request::has('event_type') && !empty(Request::get('event_type')))
                                     
                                     @foreach(Request::get('event_type') as $e)
                                        <input type="hidden" name="event_type[]" value="{{$e}}">

                                     @endforeach

                                @endif


                                @if(Request::has('amenities') && !empty(Request::get('amenities')))
                                     
                                     @foreach(Request::get('amenities') as $a)
                                        <input type="hidden" name="amenities[]" value="{{$a}}">

                                     @endforeach

                                @endif


                                <div id="collapseOne" class="collapse" data-parent="#accordion">

                                 @foreach($categories as $category)
                                     <div class="card-body listing sub-head">
                                         <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input businesses" name="vendors[]" id="customCheck{{$category->id}}" value="{{$category->id}}"
                                            {{checkCategoryWithRequest('vendors',$category->id)}}>
                                            <label class="custom-control-label" for="customCheck{{$category->id}}">{{$category->label}}</label>
                                          </div>
                                    </div>
                                    <div class="sub-cat-wrap">
                                   @foreach($category->subcategory as $subcategory)
                                  
                                     <div class="card-body listing">
                                           
                                          <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input businesses" name="vendors[]" value="{{$subcategory->id}}" id="customCheck{{$subcategory->id}}"  >
                                            <label class="custom-control-label" for="customCheck{{$subcategory->id}}">{{$subcategory->label}}</label>
                                          </div>

                                    </div>

                                    @endforeach
                                </div>
                                 @endforeach
                                   
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                        Availability
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body listing">
                                        <div class="form-group">
                                            <input type="text" id="" class="form-control available" placeholder="Select Date">
                                            <span class="input-icon date"><i class="far fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapsefour">
                                        Price Range
                                    </a>
                                </div>
                                <div id="collapsefour" class="collapse" data-parent="#accordion">
                                    <div class="card-body listing">
                                        <div class="wrap1">
                                            <div class="checkboxwrap">
                                                   

                                                    <div class="form-group">
                                                        <input type="radio" id="cb11" name="price_range" value="0-1000" class="businesses">
                                                        <label for="cb11"> Under $1,000</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="cb2" name="price_range" value="1000-2000" class="businesses">
                                                        <label for="cb2"> $1,000 - $1,999</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="cb3" name="price_range" value="2000-3000" class="businesses">
                                                        <label for="cb3"> $2,000 - $2,999</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="cb4" name="price_range" value="3000-4000" class="businesses">
                                                        <label for="cb4"> $3,000 - $3,999</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="cb5" name="price_range" value="0-100000000" class="businesses">
                                                        <label for="cb5"> $4,000+</label>
                                                    </div>

                                                    <div class="form-group mini-btn-wrap text-right">
                                                        <a href="javascript::void(0)" 
                                                           class="resetRadio cstm-btn solid-btn">Reset</a> 
                                                   </div>
                                                 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="card">
                                <div class="card-header">                                
                                     <a class="collapsed card-link" data-toggle="collapse" href="#collapsefive">
                                      Guest Capacity 
                                    </a>
                                </div>
                                 <div id="collapsefive" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        
                                            <div class="inn-form-group">
                                                <label>Sitting</label>
                                               
                                                <input type="range" data-id="#sitting_capacitys" id="sitting_capacity" class="Capacity"
                                                 min="0"     
                                                max="1000000" 
                                                step="50"
                                                value="{{Request::has('guest_capacity') && !empty(Request::get('guest_capacity')) ? Request::get('guest_capacity') : 0}}">
                                                <input type="hidden" name="sitting_capacity" id="sitting_capacitys" value="{{Request::has('guest_capacity') && !empty(Request::get('guest_capacity')) ? Request::get('guest_capacity') : 0}}">
                                            </div>

                                             <div class="inn-form-group">
                                                <label>Standing</label>
                                              
                                                <input type="range" 
                                                data-id="#standing_capacitys" id="standing_capacity" 
                                                class="Capacity" 
                                                min="0"     
                                                max="1000000" 
                                                step="50"
                                                value="0">

                                                <input type="hidden" name="standing_capacity" id="standing_capacitys">

                                            </div>
                                            
                                         
                                    </div>
                                </div>
                               
                            </div>


                              <div class="card">
                                <div class="card-header">                                
                                     <a class="collapsed card-link" data-toggle="collapse" href="#collapseSix">
                                     Location
                                    </a>
                                </div>
                                 <div id="collapseSix" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        
                                           <div class="form-group">  
                                                <input type="search" name="address" id="address" value="" class="form-control" placeholder="Location">

                                                  
                                                       <input type="hidden" name="latitude" id="latitude" value="{{(Request::has('latitude') && Request::get('latitude') != "") ? Request::get('latitude') : ''}}">
                                                   
                                                   
                                                    <input type="hidden" name="longitude" id="longitude" value="{{(Request::has('longitude') && Request::get('longitude') != "") ? Request::get('longitude') : ''}}">
                                                   
                                           </div>
                                            
                                    </div>
                                </div>
                               
                            </div>





                             








                        </div>
                    </form>
                    </div>