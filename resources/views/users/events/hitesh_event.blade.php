@extends('users.layouts.layout')
@section('content')
<div class="main-header">
   <div class="main-header__intro-wrapper">
      <div class="main-header__welcome">
         <div class="main-header__welcome-title text-light">Welcome, <strong>John</strong></div>
         <div class="main-header__welcome-subtitle text-light">How are you today?</div>
      </div>
      <div class="quickview">
         <div class="quickview__item">
            <div class="quickview__item-total">41</div>
            <div class="quickview__item-description">
               <i class="far fa-calendar-alt"></i>
               <span class="text-light">Events</span>
            </div>
         </div>
         <div class="quickview__item">
            <div class="quickview__item-total">64</div>
            <div class="quickview__item-description">
               <i class="far fa-comment"></i>
               <span class="text-light">Messages</span>
            </div>
         </div>
         <div class="quickview__item">
            <div class="quickview__item-total">27°</div>
            <div class="quickview__item-description">
               <i class="fas fa-map-marker-alt"></i>
               <span class="text-light">Austin</span>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="order-status-row mb-4">
   <article class="media order shadow delivered wow bounceInRight" data-wow-delay="350ms">
      <figure class="media-left">
         <i class="fas fa-thumbs-up"></i>
      </figure>
      <div class="media-content">
         <div class="content">
            <h3>
               <strong>24 event Completed</strong>
               <br>
               <small>There are many variations of passages of Lorem Ipsum available
               </small>
            </h3>
         </div>
      </div>
      <div class="media-right">
         <div class="tags has-addons">
            <span class="tag is-light">Status:</span>
            <span class="tag is-delivered">Completed</span>
         </div>
      </div>
   </article>
</div>

<div class="row">
  <div class="col-lg-6">
    <div class="cstm-pkg-card"  style="background: url('/frontend/images/status-info-bg.jpg');">
      <div class="cstm-pkg-btn"><span class="blink-text">Custom Package</span></div>
       <div class="cstm-pkg-heading">Birthday Bash Party</div>
       <div class="cstm-pkg-inn-detail">
         <ul>
           <li>DJ/Entertainment/MC</li>
           <li><i class="fa fa-users"></i> Sitting Capacity <b>500</b></li>
           <li>2-3 Games with Prizes</li>
           <li>Sadh for Bride</li>
           <li><h1 class="cstmpkg-price">$125/ PERSON</h1></li>
         </ul>
       </div>
       <ul class="button-grp-wrap mt-3">
                        <li>
                          <a href="http://49.249.236.30:8654/listing/photography/prateek-dua-photography#deals-sec" data-toggle="tooltip" title="More Detail" class="icon-btn"><i class="fa fa-eye"></i>
                          </a>
                        </li>                       
                        
        </ul>
    </div>
  </div>
</div>
<script>
   var type = 1, //circle type - 1 whole, 0.5 half, 0.25 quarter
     radius = '15em', //distance from center
     start = -90, //shift start from 0
     $elements = $('.event-planning-navigation li:not(:first-child)'),
     numberOfElements = (type === 1) ?  $elements.length : $elements.length - 1, //adj for even distro of elements when not full circle
     slice = 360 * type / numberOfElements;
   
   $elements.each(function(i) {
     var $self = $(this),
         rotate = slice * i + start,
         rotateReverse = rotate * -1;
     
     $self.css({
         'transform': 'rotate(' + rotate + 'deg) translate(' + radius + ') rotate(' + rotateReverse + 'deg)'
     });
   });
</script>
@endsection
@section('scripts')
@endsection