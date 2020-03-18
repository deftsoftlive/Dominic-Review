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
         <a href="{{url(route('vendor_dashboard'))}}" class="b-brand">
            <div class="b-bg">
               <img src="/frontend/images/logo.svg">
            </div>
            <span class="b-title">Envisiun Vendor</span>
         </a>
         <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
      </div>
      <div class="navbar-content scroll-div">
         <ul class="nav pcoded-inner-navbar">
            <li class="nav-item pcoded-menu-caption">
               <label>Dashboard</label>
            </li>

          
 
 @if(Session::has('currentVendorLink') && Session::get('currentVendorLink') == 'e-shop')          
     @include('vendors.includes.e-shop')
 @else
     @include('vendors.includes.eventLink')
 @endif










            <li class="nav-item pcoded-menu-caption">
               <label>Settings</label>
            </li>
            <li class="nav-item pcoded-hasmenu <?= ActiveMenu(['vendor_profile', 'vendor_password', 'vendor_payment'],'pcoded-trigger') ?>" >
               <a href="javascript:" class="nav-link "><span class="pcoded-micon">
               <i class="feather icon-settings"></i></span><span class="pcoded-mtext">Settings</span></a>
               <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['vendor_profile', 'vendor_password', 'vendor_payment'],'block') ?>;">
                  <li class="<?= ActiveMenu(['vendor_profile'],'active') ?>">
                     <a href="{{ route('vendor_profile') }}" class="">Profile Settings</a>
                  </li>
                  <li class="<?= ActiveMenu(['vendor_payment'],'active') ?>">
                     <a href="{{ route('vendor_payment') }}" class="">Payment Settings</a>
                  </li> 
                  <li class="<?= ActiveMenu(['stripeSettings'],'active') ?>">
                     <a href="{{ route('stripeSettings') }}" class="">Stripe Settings</a>
                  </li>
                  <li class="<?= ActiveMenu(['vendor_password'],'active') ?>">
                     <a href="{{ route('vendor_password') }}" class="">Password Settings</a>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>
<!-- [ navigation menu ] end -->