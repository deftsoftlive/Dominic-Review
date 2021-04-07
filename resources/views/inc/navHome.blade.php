<!-- Nav menu start here -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/')}}">
                  <img src="{{ URL::asset('uploads')}}/{{ getAllValueWithMeta('website_logo', 'general-setting') }}">
                </a>
              </div>  
              <div class="header-right">
                <ul class="header-top">
                  <li>
                   <a href="javascript:void(0);" class="top-nav-link"><span><i class="fas fa-envelope"></i></span>{{ getAllValueWithMeta('website_email', 'general-setting') }}</a>
                  </li>
                  <li>
                    <a href="javascript:void(0);" class="top-nav-link"><span><i class="fas fa-mobile-alt"></i></span>{{ getAllValueWithMeta('website_phone_number', 'general-setting') }}</a>
                  </li>
                  <li>
                    <ul class="social-meadia-icons">
                      <li>
                        <a target="_blank" href="{{ getAllValueWithMeta('facebook_link', 'general-setting') }}" class="social-icon-link"><i class="fab fa-facebook-f"></i></a>
                      </li>
                      <li>
                        <a target="_blank" href="{{ getAllValueWithMeta('instagram_link', 'general-setting') }}" class="social-icon-link"><i class="fab fa-instagram"></i></a>
                      </li>
                      <li>
                        <a target="_blank" href="{{ getAllValueWithMeta('google_link', 'general-setting') }}" class="social-icon-link"><i class="fab fa-google-plus"></i></a>
                      </li>
                    </ul>
                  </li>
                </ul>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <div class="menu-title-wrap">
                    <a href="javascript:void(0);">menu</a>
                  </div>

                  <ul class="navbar-nav mr-auto">


                    @php 
                      $menus = DB::table('menus')->where('sub_menu',NULL)->where('type','header')->orderBy('sort','asc')->get();  
                      $current_url = \Request::url(); 
                    @endphp

                    @foreach($menus as $me)

                    @if(!empty($me->url))
                      <li><a href="{{$me->url}}" class="nav-link @if($me->url == url()->current()) active @endif">{{$me->title}}</a></li>
                    @endif

                    @if(empty($me->url))

                    @php
                      $linked_submenu = DB::table('menus')->where('sub_menu',$me->id)->get();   
                    @endphp

                    @if(count($linked_submenu)>0)
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                         {{$me->title}}<span >&nbsp;<i class="fas fa-caret-down"></i></span> </a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @foreach($linked_submenu as $sub_me)
                            <a class="dropdown-item" href="{{$sub_me->url}}">{{$sub_me->title}}</a>
                          @endforeach
                        </div>
                      </li>
                    @else
                      <li><a href="javascript::void(0);" class="nav-link @if($me->url == url()->current()) active @endif">{{$me->title}}</a></li>
                    @endif

                    @endif

                    @endforeach


                  </ul>


                  <ul class="serch-login-signup">
                    <li>
                      <!--   <div class="search-icon">
                <i class="fas fa-search"></i>
              </div> -->
              <!-- <input type="text" class="form-control search-field" placeholder="Search">
              <div class="responsive-search-icon">
                <input type="text" class="form-control search-field" placeholder="Search">
              </div> -->
                    </li>
                    
                    @if( Auth::user() && Auth::user()->role_id == '1')
                    <li>
                        <a href="{{url('admin')}}" class="cstm-btn">Account</a>
                    </li>


                    <li class="cst_cart_dropdown">
                       <div class="dropdown ">
                       <a href="javascript:void(0);" class="cart_icon_design cart-btn dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="top-filter-icon">
                               <i class="fas fa-cart-plus"></i>
                                   <span class="notification-icon">{{ShopCartCount()}}</span>
                           </span><p></p> 
                         </a>
                         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <div class="title_link">
                              <h3>SHOPPING CART</h3>
                              <a href="{{url('/shop/cart')}}">View Cart</a>
                            </div>


                        @foreach(Cart::getContent() as $item)
                          <?php

                              $Product_id = $item->attributes->product_id;
                             
                              $variation = \App\Models\Products\ProductAssignedVariation::find($item->attributes->variant_id);
                              $product = $item->attributes->variant_id > 0 ? App\Models\Products\Product::where('variant_id',$item->attributes->variant_id)->first() : \App\Models\Products\Product::find($Product_id);
                              $stock = $product->checkStock(); 
                              $TotalStock = $stock != null ? $stock->stock : 1;
                              $availableStock = $TotalStock > 0 ? ($TotalStock > $item->quantity ? ($TotalStock - $item->quantity) : 0) : 0;


                           ?>
                            <div class="cart_cs_details">
                              <a href="javascript:void(0);">{{$item->name}}</a>
                              @if($product->product_type == 1)
                                  <ul class="cart-table__options">
                                      @foreach($variation->hasVariationAttributes as $v)
                                      <li>{{$v->parentVariation->variations->name}}: <b class="bText">{{$v->parentVariation->name}}</b></li>
                                      @endforeach

                                  </ul>
                              @endif
                              <div class="basic_cart_details">
                                <p class="price cart_quantity">Quantity : {{$item->quantity}}</p>
                                <p class="price">£{{custom_format($item->price,2)}} </p>
                              </div>
                              <div class="price_btn cart_price">
                                <p class="price">£{{custom_format($item->getPriceSum(),2)}} </p>
                              </div>
                            </div>
                            
                            @endforeach
                            <div class="price_btn total_cart_price">
                              <a href="{{url('/shop/cart')}}" class="cstm-btn">View cart</a>
                            </div>
                        </div>
                    </li>

                    
                    
                    @elseif (Auth::user())
                    <li>
                        <a href="{{url('user')}}" class="cstm-btn">Account</a>
                    </li>

                    <li class="cst_cart_dropdown">
                       <div class="dropdown ">
                       <a href="javascript:void(0);" class="cart_icon_design cart-btn dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="top-filter-icon">
                               <i class="fas fa-cart-plus"></i>
                                   <span class="notification-icon">{{ShopCartCount()}}</span>
                           </span><p></p> 
                         </a>
                         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <div class="title_link">
                              <h3>SHOPPING CART</h3>
                              <a href="{{url('/shop/cart')}}">View Cart</a>
                            </div>

                        @php 
                          $cart = DB::table('shop_cart_items')->where('user_id',Auth::user()->id)->where('orderID', '=', NULL)->get();
                        @endphp

                      @if(!empty($cart))
                        @foreach($cart as $item)
                          @php
                            $product = DB::table('products')->where('id',$item->product_id)->first();
                          @endphp
                        
                            <div class="cart_cs_details">
                              @if($item->shop_type == 'product')
                                <a href="javascript:void(0);">{{$product->name}}</a>
                              @elseif($item->shop_type == 'course')
                              @php 
                                $course = DB::table('courses')->where('id',$item->product_id)->first();
                                $child = DB::table('users')->where('id',$item->child_id)->first();
                              @endphp
                                <a href="javascript:void(0);">{{isset($child->name) ? $child->name : ''}} : {{isset($course->title) ? $course->title : ''}}</a>
                                @elseif($item->shop_type == 'paygo-course')
                                @php 
                                  $payGoCourse = DB::table('pay_go_courses')->where('id',$item->product_id)->first();
                                  $child = DB::table('users')->where('id',$item->child_id)->first();
                                @endphp
                                  <a href="javascript:void(0);">{{isset($child->name) ? $child->name : ''}} : {{isset($payGoCourse->title) ? $payGoCourse->title : ''}}</a>
                              @elseif($item->shop_type == 'camp')
                              @php 
                                $camp = DB::table('camps')->where('id',$item->product_id)->first();
                                $child = DB::table('users')->where('id',$item->child_id)->first();
                                $week = json_decode($item->week);
                              @endphp
                                <a href="javascript:void(0);">{{isset($child->name) ? $child->name : 'No Child'}} : {{$camp->title}}</a>
                                <p>
                                @if(!empty($week))
                                	@foreach($week as $number=>$number_array)

									@foreach($number_array as $data=>$user_data)

										@foreach($user_data as $data1=>$user_data1)
											@php 
												$split = explode('-',$user_data1);
												$get_session = $split[2];
											@endphp
											@if($get_session == 'early')
												{{$number}} - {{$data1}} - Early Drop Off<br/>
											@elseif($get_session == 'mor')
												{{$number}} - {{$data1}} - Morning<br/>
											@elseif($get_session == 'noon')
												{{$number}} - {{$data1}} - Afternoon<br/>
											@elseif($get_session == 'lunch')
												{{$number}} - {{$data1}} - Lunch Club<br/>
											@elseif($get_session == 'late')
												{{$number}} - {{$data1}} - Late Pickup<br/>
											@elseif($get_session == 'full')
												{{$number}} - {{$data1}} - Full Day<br/>
											@endif
										@endforeach
									
								    @endforeach

								@endforeach
                                @endif
                            </p>
                              @endif
                             
                              <div class="basic_cart_details">
                                <p class="price cart_quantity">Quantity : {{$item->quantity}}</p>
                                <p class="price">£{{custom_format($item->price,2)}} </p>
                              </div>
                              <div class="price_btn cart_price">
                                <p class="price">£{{custom_format($item->total,2)}} </p>
                              </div>
                            </div>
                        @endforeach
                      @endif
                            <div class="price_btn total_cart_price">
                              <a href="{{url('/shop/cart')}}" class="cstm-btn">View cart</a>
                            </div>
                        </div>
                    </li>

                    
                    @else
                    <li>
                        <a href="{{route('login')}}" class="cstm-btn">Login</a>
                    </li>
                    <li>
                      <div class="dropdown show">
                        <a class="cstm-btn signup dropdown-toggle" href="{{route('register')}}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Sign UP
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="{{route('register')}}">Signup As Parent/Adult</a>
                          <a class="dropdown-item" href="{{route('register-as-coach')}}">Signup As Coach</a>
                        </div>
                      </div>
                    </li>

                    <!-- <li class="cst_cart_dropdown">
                       <div class="dropdown ">
                       <a href="javascript:void(0);" class="cart_icon_design cart-btn dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="top-filter-icon">
                               <i class="fas fa-cart-plus"></i>
                                   <span class="notification-icon">{{ShopCartCount()}}</span>
                           </span><p></p> 
                         </a>
                         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <div class="title_link">
                              <h3>SHOPPING CART</h3>
                              <a href="{{url('/shop/cart')}}">View Cart</a>
                            </div>


                        @foreach(Cart::getContent() as $item)
                          <?php

                              $Product_id = $item->attributes->product_id;
                             
                              $variation = \App\Models\Products\ProductAssignedVariation::find($item->attributes->variant_id);
                              $product = $item->attributes->variant_id > 0 ? App\Models\Products\Product::where('variant_id',$item->attributes->variant_id)->first() : \App\Models\Products\Product::find($Product_id);
                              $stock = $product->checkStock(); 
                              $TotalStock = $stock != null ? $stock->stock : 1;
                              $availableStock = $TotalStock > 0 ? ($TotalStock > $item->quantity ? ($TotalStock - $item->quantity) : 0) : 0;


                           ?>
                            <div class="cart_cs_details">
                              <a href="javascript:void(0);">{{$item->name}}</a>
                              @if($product->product_type == 1)
                                  <ul class="cart-table__options">
                                      @foreach($variation->hasVariationAttributes as $v)
                                      <li>{{$v->parentVariation->variations->name}}: <b class="bText">{{$v->parentVariation->name}}</b></li>
                                      @endforeach

                                  </ul>
                              @endif
                              <div class="basic_cart_details">
                                <p class="price cart_quantity">Quantity : {{$item->quantity}}</p>
                                <p class="price">£{{custom_format($item->price,2)}} </p>
                              </div>
                              <div class="price_btn cart_price">
                                <p class="price">£{{custom_format($item->getPriceSum(),2)}} </p>
                              </div>
                            </div>
                            
                            @endforeach
                            <div class="price_btn total_cart_price">
                              <a href="{{url('/shop/cart')}}" class="cstm-btn">View cart</a>
                            </div>
                        </div>
                    </li> -->
                    
                    @endif

                    
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="openNav()">              
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="icon-bar rotate_cross"></span>
                  <span class="icon-bar rotate_cross_2"></span>
                </button>           
             </nav>
             </div>
        </div>
    </div>
</header>
<!-- Nav menu end here-->