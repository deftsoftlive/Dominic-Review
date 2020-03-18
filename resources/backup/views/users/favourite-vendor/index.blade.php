@extends('users.layouts.layout')
@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Favourite Vendors</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">Favourite Vendors</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('admin.error_message')

<section class="content">
      <div class="row">
          <div class="col-xl-12 col-md-12 m-b-30">
                <div class="card">
                  <div class="card-body">
                    <div class="col-md-12">
                      @if(count($favourite_vendors) > 0)
                        @foreach($favourite_vendors as $favourite_vendor)

                        <?php

$facebook_url = getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id, 'basic_information', 'facebook_url');
$linkedin_url = getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id, 'basic_information', 'linkedin_url');
$twitter_url =  getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id, 'basic_information', 'twitter_url');
$instagram_url = getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id, 'basic_information', 'instagram_url');
$pinterest_url = getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id, 'basic_information', 'pinterest_url');

$followus = empty($facebook_url) && empty($linkedin_url) && empty($twitter_url) && empty($instagram_url) && empty($pinterest_url) ? 'hide' : '';
?>

                           <div class="detail-in-breif">
                                <div class="row">
                                    <div class="col-lg-4">
                                        
                                        <div class="custom-left-content">

                                           @if($favourite_vendor->business->category && $favourite_vendor->business->category->cover_type == 1)

                                            <img src="{{url(getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id,'basic_information','cover_photo'))}}">
                                           
                                           @else

                                                <div class="video-container custom-video-container">
                                                     <a href="javascript:void(0);" class="play-btn" 
                                                         data-toggle="modal"
                                                         data-video="{{url(getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id,'basic_information','cover_video'))}}"
                                                         data-target="Video-Modal-relation-{{$favourite_vendor->business->id}}">
                                                           <span><i class="far fa-play-circle"></i></span>
                                                        </a>

                                                       <img src="{{url(getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id,'basic_information','cover_video_image'))}}" draggable="false" class="Video-Modal-relation-{{$favourite_vendor->business->id}}">

                                                      <div class="video-screen" id="Video-Modal-relation-{{$favourite_vendor->business->id}}">
                                                                
                                                      </div>
                                              </div>
                                           @endif 
                                      </div>
                                         
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="right-content">
                                          <div class="listing-head">
                                    <a href="{{url( route('vendor_detail_page',[$favourite_vendor->business->category->slug,$favourite_vendor->business->business_url]))}}"> <h4 class="padding-rt">{{getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id,'basic_information','business_name')}}</h4></a>
                                           
                                           <ul class="listing-action-btns">
                                             <li><a href="tel:{{getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id,'basic_information','phone_number')}}" class="list-icon-btn"><i class="fas fa-phone"></i></a></li>
                                           </ul>

                                   <p class="ser-text"> {{$favourite_vendor->business->category->label}}</p>
                                            <ul class="rating">
                                                <li class="price-detail-wrap">
                                                  <div class="price-review-detail"><p>Starting From:</p> <span> ${{custom_format(getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id,'basic_information','min_price'),2)}} for {{getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id,'basic_information','min_guest')}} <i class="fa fa-users"></i> </span>
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
                                               @if($favourite_vendor->business->category->capacity == 1)
                                                 <li>
                                                  <p class=""><i class="fa fa-users"></i> <?= $favourite_vendor->business->sitting_capacity > 0 ? 'Sitting Capacity <b>'.$favourite_vendor->business->sitting_capacity.'</b></p></li>' : ''?> <li><p><?= $favourite_vendor->business->standing_capacity > 0 ? 'Standing Capacity<b>'.$favourite_vendor->business->standing_capacity.'</b>' : ''?></p>
                                                 </li>
                                                @endif
                                            </ul>
                                            <hr>

                                            <p class="detail">
                                                <?php $description = getBasicInfo($favourite_vendor->business->vendors->id, $favourite_vendor->business->category_id,'basic_information','short_description'); ?>
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
                                             
                                          <div class="mini-btn-wrap">
                                            <a onclick="deleteItem(this)" href="javascript:void(0)" data-delurl="{{ route('user_delete_favourite_vendors', $favourite_vendor->id) }}" data-toggle="tooltip" title="Delete"
                                             class="cstm-btn solid-btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                          </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-break">

                        @endforeach
                      @else
                         No Favourite Vendors
                      @endif
                    </div>
            </div>
          </div>
              {{ $favourite_vendors->links() }}
          </div>
      </div>
    </section>
@endsection



@section('scripts')
@endsection


