@extends('layouts.home')
@section('content')
<section class="log-sign-banner" style="background:url('/frontend/images/banner-bg.png');">
    <div class="container">
        <div class="page-title text-center">
            <h1>Reset Password</h1>
        </div>
    </div>    
</section> 
  <section class="form-sec">
      <div class="container">         
        <div class="signUp-form-wrap mr-top sec-card">                
                 <div class="form-card">
                    <div class="row no-gutters">          
                        <div class="col-lg-6">
                            <figure class="form-img-wrap">
                                <img src="/frontend/images/login-image.png">
                                <figcaption class="overlay-text">
                                    <h1>Welcome </h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse scelerisque turpis in lacus feugiat tristique</p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-lg-6">



                    <form method="POST" class="signUp-form" id="resetForm" action="{{ route('password.email') }}">
                        @csrf
                                @include('vendors.errors')

                               <div class="row">                  
                
                                   <div class="col-lg-12">
                                       <div class="form-group">
                                        <input type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}"/>
                                        
                                        <span class="input-icon"><i class="fas fa-envelope"></i></span>

                                            <label class="error" for="email">
                                        {{($errors->has('email'))? $errors->first('email') : ''}}
                                            </label>
                                       
                                       </div>
                                   </div>
                
                               </div>
                
                             
                                    <div class="btn-wrap">
                                            <button class="cstm-btn solid-btn"> {{ __('Send Password Reset Link') }}</button>

                                             <img  class="pl-3 loading hide" src="{{url('/images/small-loader.gif')}}" style="display: none;" />
                                            

                                            <div class="messages"></div>
                                           
                                        </div>
                            </form>
                        </div>                    
                </div>  
                </div>
                </div>
                </div>
</section>  






























@endsection

@section('scripts')

<script type="text/javascript">
 


$('#resetForm').validate({
onfocusout: function (valueToBeTested) {
  $(valueToBeTested).valid();
},

highlight: function(element) {
  $('element').removeClass("error");
},

rules: {
  
  
  'email': {
      required: true,
      customemail: true,
  },

  valueToBeTested: {
      required: true,
  }

},
});

</script>
@endsection
