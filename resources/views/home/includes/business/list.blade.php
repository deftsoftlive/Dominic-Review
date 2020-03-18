
@if($categoryCount == 0)
   @include('includes.not_found')
@endif
 
<div class="business-view" id="business-view">
 @foreach($businesses as $cate)    

 
<?php

$facebook_url = getBasicInfo($cate->vendors->id, $cate->category_id, 'basic_information', 'facebook_url');
$linkedin_url = getBasicInfo($cate->vendors->id, $cate->category_id, 'basic_information', 'linkedin_url');
$twitter_url =  getBasicInfo($cate->vendors->id, $cate->category_id, 'basic_information', 'twitter_url');
$instagram_url = getBasicInfo($cate->vendors->id, $cate->category_id, 'basic_information', 'instagram_url');
$pinterest_url = getBasicInfo($cate->vendors->id, $cate->category_id, 'basic_information', 'pinterest_url');

$followus = empty($facebook_url) && empty($linkedin_url) && empty($twitter_url) && empty($instagram_url) && empty($pinterest_url) ? 'hide' : '';
?>
       
                            <div class="detail-in-breif aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000">
                                <div class="row">
                                    <div class="col-lg-4">
                                        
                                        <div class="custom-left-content">

                                           @if($cate->category && $cate->category->cover_type == 1)

                                            <img src="{{url(getBasicInfo($cate->vendors->id, $cate->category_id,'basic_information','cover_photo'))}}">

                                           
                                           @else

                                                <div class="video-container custom-video-container">
                                                     <a href="javascript:void(0);" class="play-btn" 
                                                         data-toggle="modal"
                                                         data-video="{{url(getBasicInfo($cate->vendors->id, $cate->category_id,'basic_information','cover_video'))}}"
                                                         data-target="Video-Modal-relation-{{$cate->id}}">
                                                           <span><i class="far fa-play-circle"></i></span>
                                                        </a>

                                                       <img src="{{url(getBasicInfo($cate->vendors->id, $cate->category_id,'basic_information','cover_video_image'))}}" draggable="false" class="Video-Modal-relation-{{$cate->id}}">

                                                      <div class="video-screen" id="Video-Modal-relation-{{$cate->id}}">
                                                                
                                                      </div>
                                              </div>


                                           @endif

 
                                      </div>
                                         
                                    
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="right-content">
                                          <div class="listing-head">
                                    <a href="{{url( route('vendor_detail_page',[$cate->category->slug, $cate->business_url]))}}"> <h4 class="padding-rt">{{getBasicInfo($cate->vendors->id, $cate->category_id,'basic_information','business_name')}}</h4></a>
                                           
                                           <ul class="listing-action-btns">
                                             @if(Auth::check() && Auth::User()->role == 'user')
                                             <li><a id="fav_vendor_{{$cate->id}}" href="javascript:void(0)" data-url="{{ route('user_add_favourite_vendors', $cate->id) }}" class="list-icon-btn {{ fav_vendor($cate->id) }}"><i class="fa_heart fas fa-heart"></i></a>
                                             </li>
                                             @endif

                                             <li><a href="tel:{{getBasicInfo($cate->vendors->id, $cate->category_id,'basic_information','phone_number')}}" class="list-icon-btn"><i class="fas fa-phone-alt"></i></a></li>
                                           </ul>

                                   <p class="ser-text"> {{$cate->category->label}}</p>
 

                                            <ul class="rating">
                                                <li class="price-detail-wrap">
                                                  <div class="price-review-detail"><p>Starting From:</p> <span> ${{custom_format(getBasicInfo($cate->vendors->id, $cate->category_id,'basic_information','min_price'),2)}} for {{getBasicInfo($cate->vendors->id, $cate->category_id,'basic_information','min_guest')}} <i class="fa fa-users"></i> </span>
                                                  </div>
                                                </li>
                                                <li>
                                                <ul class="inner-list">
                                                    <li><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="far fa-star"></i></a>
                                                    </li>
                                                </ul>
                                              </li>
                                                <li>
                                                    <p class="review">0 Reviews</p>
                                                </li>
                                               
                                            </ul>
                                          </div>

                                            <ul class="sitting-capacity">
                                               @if($cate->category->capacity == 1)
                                                 <li>
                                                  <p class=""><i class="fa fa-users"></i> <?= $cate->sitting_capacity > 0 ? 'Sitting Capacity <b>'.$cate->sitting_capacity.'</b></p></li>' : ''?> <li><p><?= $cate->standing_capacity > 0 ? 'Standing Capacity<b>'.$cate->standing_capacity.'</b>' : ''?></p>
                                                 </li>
                                                @endif
                                            </ul>
                                            <hr>

                                            <p class="detail">
                                                <?php $description = getBasicInfo($cate->vendors->id, $cate->category_id,'basic_information','short_description'); ?>
                                               {{substr($description,0,100)}} {{strlen($description) > 100 ? '...' : ''}}
                                            </p>
                                            <ul class="social-links listing-social {{$followus}}">
                                              <li><p>Follow us:</p></li>

                                              <li class="{{empty($facebook_url) ? 'hide' : ''}}">
                                                <a href="<?= $facebook_url ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                              </li>
                                              <li class="{{empty($linkedin_url)? 'hide' : ''}}">
                                                <a href="<?= $linkedin_url ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                              </li>
                                              <li class="{{empty($twitter_url) ? 'hide' : ''}}">
                                                <a href="<?= $twitter_url ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                              </li>
                                              <li class="{{empty($instagram_url) ? 'hide' : ''}}">
                                                <a href="<?= $instagram_url ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                              </li>
                                              <li class="{{empty($pinterest_url) ? 'hide' : ''}}">
                                                <a href="<?= $pinterest_url ?>" target="_blank"><i class="fab fa-pinterest"></i></a>
                                              </li>
                                            </ul>

                                            <a href="javascript:void(0);" class="cstm-btn solid-btn detail-btn"><i class="fa fa-comment-dots"></i> Chat</a>
                                            <a href="javascript:void(0);"
                                             class="cstm-btn solid-btn detail-btn getQuote"
                                             data-id="{{$cate->id}}">Request A Qoute</a>

                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-break">

                       @endforeach 









                    <div class="pagination-container">
                         
                    </div>

                    <div class="invite-vendor-box">                  
                       <div class="warning-box space">
                                  <div class="shadow-box">                                  
                                      <div class="info-tab tip-icon" title="Useful Tips"><span class="fas fa-user-plus"> </span> <i></i></div>
                                      <div class="warning-text text-center" style="background: url('/frontend/images/invite-vendor-bg.png');">
                                        <h4>Invite Vendor</h4>
                                        <p>Is there a Vendor you have worked in the past and not listed here please click below Invite Button</p>
                                        <div class="btn-wrap mini-btn-wrap text-center mt-2">
                                          <a href="{{ route('users.invite.newVendor') }}" class="cstm-btn solid-btn">Invite Vendor</a>
                                        </div>
                                  </div>
                              </div>
                          </div>       
                    </div>

</div>



@include('home.includes.quotes')
 
<script type="text/javascript">

  setTimeout(() => {
    $('.invite-vendor-box').addClass('wow bounceInRight');
    new WOW().init();
  },2000);
   
   jQuery("body").on('click','.view-mapper',function(e){
        e.preventDefault();
        var val = jQuery( this ).attr('data-id');
        var valHide = jQuery( this ).attr('data-hide');
         jQuery(val).slideDown('slow');
         jQuery(valHide).slideUp('slow');
   });

$('a .fa_heart').click(function() {
  const url = $(this).parent().data('url');
  const fav_id = $(this).parent().attr('id');

  $.ajax({
     url : url,
     type: 'GET',   
     dataTYPE:'JSON',
     headers: {
       'X-CSRF-TOKEN': $('input[name=_token]').val()
     },
      beforeSend: function() {
          $("body").find('.custom-loading').show();
      },
      success: function (res) {
        let count = $('#fav_ven').text();
        count = parseInt(count);
        // console.log(res.message);
        if(res.status) {
          $(`#${fav_id}`).addClass('fav-active');
          $('#fav_ven').text(count + 1);
          $('#fav_ven2').text(count + 1);
        } else {
          $(`#${fav_id}`).removeClass('fav-active');
          $('#fav_ven').text(count - 1);
          $('#fav_ven2').text(count - 1);
        }
        $('#suc_show').show();
        $('#res_mess').html(res.message);

        setTimeout(function() {
            $('#suc_show').fadeOut('smooth');
        }, 3000);
     },
     complete: function() {
        $("body").find('.custom-loading').hide();
        window.scrollTo({top: 300, behavior: 'smooth'});
     },
     error: function (jqXhr, textStatus, errorMessage) {
          $('#err_show').show();
          $('#err_mess').html(JSON.parse(errorMessage.responseText).message);

          setTimeout(function() {
              $('#err_show').fadeOut('smooth');
          }, 3000);
     }

  });

});


 
</script>
