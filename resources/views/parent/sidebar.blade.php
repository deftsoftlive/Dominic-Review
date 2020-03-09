<div class="loader-bg">
   <div class="loader-track">
      <div class="loader-fill"></div>
   </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar">
   <div class="navbar-wrapper">
      <div class="navbar-brand header-logo">
        
            <div class="b-bg">
               <img src="{{url('/public/images/fav-icon.png')}}">
            </div>
            <span class="b-title">DRH</span>
         </a>
         <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
      </div>
      <div class="navbar-content scroll-div">
         <ul class="nav pcoded-inner-navbar">

            @if(\Auth::user()->role_id == '1')
               <li class="nav-item pcoded-menu-caption">
                  <label>Admin Dashboard</label>
               </li>
            @elseif(\Auth::user()->role_id == '2')
               <li class="nav-item pcoded-menu-caption">
                  <label>Parent Dashboard</label>
               </li>
            @elseif(\Auth::user()->role_id == '3')
               <li class="nav-item pcoded-menu-caption">
                  <label>Coach Dashboard</label>
               </li>
            @else
               <li class="nav-item pcoded-menu-caption">
                  <label>Child Dashboard</label>
               </li>
            @endif
            
            @if(Session::has('currentVendorLink') && Session::get('currentVendorLink') == 'e-shop')          
                 @include('parent.includes.e-shop')
            @else
                 @include('parent.includes.eventLink')
            @endif

         </ul>
      </div>
   </div>
</nav>
<!-- [ navigation menu ] end -->