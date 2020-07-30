@extends('inc.homelayout')

@section('title', 'DRH')

@section('content')
 
<section class="success-warning-msg">
    <div class="HomeInner">

      @if(isset($isSubscribed))
      @if($isSubscribed == false)

      	<div class="success--msg">
      		<div class="warning-icon">
               <span style="border:none;"><?xml version="1.0" encoding="iso-8859-1"?> 
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 52 52" style="enable-background:new 0 0 52 52;height: 80px;width: 80px;fill:#8ca903;" xml:space="preserve"><g><path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M26,50C12.767,50,2,39.233,2,26 S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z"/><path d="M38.252,15.336l-15.369,17.29l-9.259-7.407c-0.43-0.345-1.061-0.274-1.405,0.156c-0.345,0.432-0.275,1.061,0.156,1.406 l10,8C22.559,34.928,22.78,35,23,35c0.276,0,0.551-0.114,0.748-0.336l16-18c0.367-0.412,0.33-1.045-0.083-1.411 C39.251,14.885,38.62,14.922,38.252,15.336z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
              </span>
             </div>
            <p>You are successfully subscribed to our newsletter.</p>
            <a href="{{url('/')}}">Continue</a>
      	</div>

      @else

      	<div class="warning--msg" >
      		<div class="warning-icon">
               <span style="border:none;"><?xml version="1.0" encoding="iso-8859-1"?> 
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 52 52" style="enable-background:new 0 0 52 52;fill:#de0712;height: 80px;width: 80px;" xml:space="preserve"><g>
  				<path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M26,50C12.767,50,2,39.233,2,26
  					S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z"/>
  				<path d="M26,10c-0.552,0-1,0.447-1,1v22c0,0.553,0.448,1,1,1s1-0.447,1-1V11C27,10.447,26.552,10,26,10z"/>
  				<path d="M26,37c-0.552,0-1,0.447-1,1v2c0,0.553,0.448,1,1,1s1-0.447,1-1v-2C27,37.447,26.552,37,26,37z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>

              </span>
             </div>
            <p>This email is already subscribed.</p>
            <a href="{{url('/')}}">Continue</a>
      	</div>

      @endif
      @endif

    </div>
</section>
@endsection