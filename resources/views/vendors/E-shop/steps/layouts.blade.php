@extends('layouts.admin')
 
@section('content')

             








    <div id="wizard" class="wizard">
        <div class="wizard__content">
          <header class="wizard__header" style="background-image: url('/frontend/images/shopping-banner.jpg');">
            <div class="wizard__header-overlay"></div>
            
            <div class="wizard__header-content">
              <h1 class="wizard__title" > Lorem Ipsum has been the industry's standard dummy text</h1>
              <p class="wizard__subheading">Start with <span>4</span> simple steps.</p>
            </div>
          </header>

            <!-- create shop steps -->

          <div class="wizard__steps">
              <nav class="steps">
              <div class="step {{!empty($completed) && $completed >= 1 ? '-completed' : ''}}">
                <div class="step__content">
                  <p class="step__number"><i class="fas fa-building"></i></p>
                  <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                  </svg>

                  <div class="lines">
                    <div class="line -start">
                    </div>
                    <div class="line -background">
                    </div>
                    <div class="line -progress">
                    </div>
                  </div> 
                   <h4>Shop Name</h4> 
                </div>
              </div>

              <div class="step {{!empty($completed) && $completed >= 2 ? '-completed' : ''}}">
                <div class="step__content">
                  <p class="step__number"><i class="fas fa-tags"></i></p>
                  <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                  </svg>
                  <div class="lines">
                    <div class="line -background">
                    </div>
                    <div class="line -progress">
                    </div>
                  </div> 
                   <h4>Product Category</h4>
                </div>
              </div>

              <div class="step {{!empty($completed) && $completed >= 3 ? '-completed' : ''}}">
                <div class="step__content">
                  <p class="step__number"><i class="fas fa-user-tag"></i></p>
                  <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                  </svg>
                  <div class="lines">
                    <div class="line -background">
                    </div>
                    <div class="line -progress">
                    </div>
                    <h4>Sub Category</h4>
                  </div> 
                </div>
              </div>
              <div class="step {{!empty($completed) && $completed >= 4 ? '-completed' : ''}}">
                <div class="step__content">
                  <p class="step__number"><i class="fas fa-wallet"></i></p>
                  <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                  </svg>
                  <div class="lines">
                    <div class="line -background">
                    </div>
                    <div class="line -progress">
                    </div>
                     <h4>Billing</h4>
                  </div> 
                </div>
              </div>
            </nav>
            </div>
         <!--  fdf -->

               


           <div class="panels">
              



              @yield('innerContent')

 
        </div>

    </div>
  </div>






@endsection

@section('scripts')


<script src="{{url('/js/validations/imageShow.js')}}"></script>
<script type="text/javascript" src="{{url('/admin-assets/js/shop.js')}}"></script>
@yield('jscripts')

@endsection