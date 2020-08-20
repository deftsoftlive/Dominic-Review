@extends('inc.homelayout')

@section('title', 'DRH')

@section('content')
 
<br/><br/><br/><br/>
<section class="newsletter-msg">
	<div class="container">
    <div class="HomeInner">

      @if(!empty($existing_email))
      <div class="inner-wrap error-msg ">
     
      <span><i class="fas fa-times"></i></span>
        <p>This email is already subscribed.</p>
    </div>
      @elseif(!empty($entered_email))
       <div class="inner-wrap success-msg">
       <span><i class="fas fa-check"></i></span>
        <p>Email has been registered successfully.</p></div>
      @endif

    </div>
</div>
</section>
@endsection