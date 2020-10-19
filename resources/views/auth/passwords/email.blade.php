<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Change Password')

@section('content')

@php $base_url = \URL::to('/'); @endphp
<section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('reset_pass_banner', 'banners') }});">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="football-course-content">
          <h2 class="f-course-heading">Reset Password</h2>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="login-sec">   
<div class="container">
    <div class="row justify-content-center">
       <div class="col-lg-5 col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" id="passwordresetForm">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                               <!--  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Please enter your email address" required autocomplete="email" autofocus> -->

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Enter your Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 reset-form-btn ">
                                <button type="submit" class="cstm-btn main_button">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
