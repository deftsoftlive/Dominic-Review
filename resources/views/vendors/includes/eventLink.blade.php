  <li class="nav-item pcoded-menu-caption">
               <label>Event Management</label>
            </li>
            <li class="nav-item {{ \Request::route()->getName() === 'vendor_category_assign2'
               ? 'nav-item active' : 'nav-item' }}">
               <a href="{{ route('vendor_category_assign2') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">Add New Business</span></a>
            </li>            
            <li class="nav-item pcoded-hasmenu pcoded-trigger">
               <a href="javascript:" class="nav-link "><span class="pcoded-micon">
               <i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">My Business</span></a>
               <ul class="pcoded-submenu" style="display: block">
                  @if(Auth::User()->services->count() > 0) 
                  @foreach(Auth::User()->services as $cate)  
                  <li class="nav-item pcoded-hasmenu {{ ActiveRouteMenu($cate->category->slug, [], 'pcoded-trigger', 1)}}" >
                     <a href="javascript:" class="nav-link"  style="color: {{$cate->category->color}};" ><span class="pcoded-micon">
                     <i class="feather icon-box"></i></span><span class="pcoded-mtext">{{$cate->category->label}}</span></a>
                     <ul class="pcoded-submenu" style="display: {{ ActiveRouteMenu($cate->category->slug, [], 'block', 1)}}">
                        <li class="<?= ActiveRouteMenu($cate->category->slug, ['vendor_category_management', 'vendor_basic_category_management'], 'active')?>">
                           <a style="color: <?= ActiveRouteMenu($cate->category->slug, ['vendor_category_management', 'vendor_basic_category_management'], $cate->category->color)?>;" href="{{url(route('vendor_category_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Basic Information</a>
                        </li>


                         <li>
                           <a href="{{url(route('vendor.orders', $cate->category->slug))}}">
                              <span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                               Orders
                            </a>
                        </li>



                        <li class="<?= ActiveRouteMenu($cate->category->slug, ['vendor_category__image_management','vendor_category_add_image_management'],'active')?>">
                           <a style="color: <?= ActiveRouteMenu($cate->category->slug,['vendor_category__image_management','vendor_category_add_image_management'], $cate->category->color)?>;" href="{{url(route('vendor_category__image_management', $cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Photo Gallery</a>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_category_videos_management'
                           || \Request::route()->getName() === 'vendor_category_videos_add_management')) ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_category_videos_management'
                              || \Request::route()->getName() === 'vendor_category_videos_add_management'
                              || \Request::route()->getName() === 'vendor_category_videos_edit_management')) ? $cate->category->color : '' }}" href="{{url(route('vendor_category_videos_management',$cate->category->slug))}}"> <span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Video Gallery</a>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_faqs_management'
                           || \Request::route()->getName() === 'vendor_faqsadd_management'
                           || \Request::route()->getName() === 'vendor_faqsedit_management')) ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_faqs_management'
                              || \Request::route()->getName() === 'vendor_faqsadd_management'
                              || \Request::route()->getName() === 'vendor_faqsedit_management')) ? $cate->category->color : '' }}" href="{{url(route('vendor_faqs_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> FAQs</a>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_description_management'
                           || \Request::route()->getName() === 'vendor_descriptionadd_management')) ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_description_management'
                              || \Request::route()->getName() === 'vendor_descriptionadd_management')) ? $cate->category->color : '' }}" href="{{url(route('vendor_description_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Description</a>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_style_management'
                           || \Request::route()->getName() === 'vendor_styleadd_management')) ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_style_management'
                              || \Request::route()->getName() === 'vendor_styleadd_management')) ? $cate->category->color : '' }}" href="{{url(route('vendor_style_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Styles</a>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && \Request::route()->getName() === 'get_vendor_services_management') ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && \Request::route()->getName() === 'get_vendor_services_management') ? $cate->category->color : '' }}" href="{{url(route('get_vendor_services_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Services</a>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && \Request::route()->getName() === 'get_vendor_amenity_management') ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && \Request::route()->getName() === 'get_vendor_amenity_management') ? $cate->category->color : '' }}" href="{{url(route('get_vendor_amenity_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Amenites & Games</a>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && \Request::route()->getName() === 'get_vendor_event_management') ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && \Request::route()->getName() === 'get_vendor_event_management') ? $cate->category->color : '' }}" href="{{url(route('get_vendor_event_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Event Types </a>
                        </li>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && \Request::route()->getName() === 'get_vendor_season_management') ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && \Request::route()->getName() === 'get_vendor_season_management') ? $cate->category->color : '' }}" href="{{url(route('get_vendor_season_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Seasons</a>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_packages_management'
                           || \Request::route()->getName() === 'vendor_packagesadd_management'
                           || \Request::route()->getName() === 'vendor_packagesedit_management')) ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_packages_management'
                              || \Request::route()->getName() === 'vendor_packagesadd_management'
                              || \Request::route()->getName() === 'vendor_packagesedit_management')) ? $cate->category->color : '' }}" href="{{url(route('vendor_packages_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Packages</a>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_deals_management'
                           || \Request::route()->getName() === 'vendor_add_deals_management'
                           || \Request::route()->getName() === 'vendor_edit_deals_management')) ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_deals_management'
                              || \Request::route()->getName() === 'vendor_add_deals_management'
                              || \Request::route()->getName() === 'vendor_edit_deals_management')) ? $cate->category->color : '' }}" href="{{url(route('vendor_deals_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> 
                           Deal & Discounts</a>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'myCategoryChat')) ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'myCategoryChat'
                              )) ? $cate->category->color : '' }}" href="{{url(route('myCategoryChat',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> My Inbox <sup class="msg-count">{{$cate->UnreadBusinessMessages->count()}}</sup></a>
                        </li>
                        <li class="{{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_prohibtion_management' || \Request::route()->getName() === 'vendor_add_prohibtion_management')) ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_prohibtion_management'
                              || \Request::route()->getName() === 'vendor_add_prohibtion_management')) ? $cate->category->color : '' }}" href="{{url(route('vendor_prohibtion_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Prohibtion & Restrictions</a>
                        </li>
                        @if(Auth::User()->payment_type == '1')
                        <li class="{{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_cat_pay_management' || \Request::route()->getName() === 'vendor_add_prohibtion_management')) ? 'active' : '' }}">
                           <a style="color: {{ (Request::route('slug') === $cate->category->slug && (\Request::route()->getName() === 'vendor_cat_pay_management'
                              || \Request::route()->getName() === 'vendor_add_prohibtion_management')) ? $cate->category->color : '' }}" href="{{url(route('vendor_cat_pay_management',$cate->category->slug))}}"><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Payment Settings</a>
                        </li>
                        @endif
                        @if($cate->business_url != "" && $cate->description != null && $cate->prohibtion != null)
                        <li role="presentation">
                           <a style="color: {{$cate->category->color}}" target="_blank" class="preview-link" href="{{url(route('myBusinessView',[$cate->category->slug, $cate->business_url]))}}">
                           <span class="arrow-before"><i class="fas fa-eye"></i></span>
                           Preview Business
                           </a>
                        </li>
                        @endif
                     </ul>
                  </li>
                  @endforeach
                  @else
                  <li class="nav-item <?= ActiveMenu(['vendor_category_assign2'],'active') ?>">
                     <a href="{{url(route('vendor_category_assign2'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Add Your Business</span></a>
                  </li>
                  @endif
               </ul>
            </li>