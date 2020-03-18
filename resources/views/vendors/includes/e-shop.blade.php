
            <li class="nav-item pcoded-menu-caption">
               <label>E-Shop</label>
            </li>

           

           <li class="nav-item pcoded-hasmenu">
                <a href="javascript:" class="nav-link">
                   <span class="pcoded-micon"> <i class="feather icon-briefcase"></i></span>
                   <span class="pcoded-mtext">E-Shop</span>
                </a>
               <ul class="pcoded-submenu">
                   
                  @if(Auth::user()->shop->count() > 0)  
                  <li class="nav-item pcoded-hasmenu">
                     <a href="javascript:" class="nav-link">
                        <span class="pcoded-micon"> <i class="feather icon-box"></i></span>
                        <span class="pcoded-mtext">Products</span>
                     </a>
                     <ul class="pcoded-submenu" >
                        <li role="presentation">
                           <a  class="nav-link" href="{{url(route('vendor.shop.products.index'))}}">
                           <span class="arrow-before"><i class="fas fa-eye"></i></span>
                               Products
                           </a>
                        </li>
                     </ul>
                  </li>

                   <li class="nav-item">
                     <a href="{{url(route('vendor.shop.orders'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-clock"></i></span><span class="pcoded-mtext">Shop Orders</span></a>
                  </li>  
                  @endif
                   <li class="nav-item">
                     <a href="{{url(route('vendor.shop'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-clock"></i></span><span class="pcoded-mtext">Shop Settings</span></a>
                  </li>  
                </ul>
         </li>