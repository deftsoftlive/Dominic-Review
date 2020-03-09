<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH')

@section('content')

    <section class="site-banner">   
      <div class="banner-slider owl-carousel owl-theme">
        <div class="item">
          <div class="container">
            <div class="banner-content">
                <p class="banner-tag-line">Football Coaching in Milton Kenyes</p>
              <h1 class="banner-heading">DRH Sports</h1>
              <h1 class="banner-sub-heading">Football <span>Coaching</span></h1>
              <p class="banner-text">In Partnership with MK City Colts FC.</p>
              <a href="javascript:void(0);" class="cstm-btn">kNow More</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="container">
            <div class="banner-content">
                <p class="banner-tag-line">Football Coaching in Milton Kenyes</p>
              <h1 class="banner-heading">DRH Sports</h1>
              <h1 class="banner-sub-heading">Football <span>Coaching</span></h1>
              <p class="banner-text">In Partnership with MK City Colts FC.</p>
              <a href="javascript:void(0);" class="cstm-btn">kNow More</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="container">
            <div class="banner-content">
                <p class="banner-tag-line">Football Coaching in Milton Kenyes</p>
              <h1 class="banner-heading">DRH Sports</h1>
              <h1 class="banner-sub-heading">Football <span>Coaching</span></h1>
              <p class="banner-text">In Partnership with MK City Colts FC.</p>
              <a href="javascript:void(0);" class="cstm-btn">kNow More</a>
            </div>
          </div>
        </div>            
      </div>
    </section>
    <section class="about-us-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="about-us-heading">
                <div class="section-heading">
                  <h1 class="sec-heading">About Us</h1>
                </div>
            </div>      
          </div>
          
          <div class="col-md-6">
            <div class="about-us-left">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
              <p>orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem</p>
              <div class="know-more-btn-wrap">
                <a href="javascript:void(0);" class="cstm-btn"><span></span>Read More</a>
              </div>
            </div>  
          </div>
          <div class="col-md-6">
            <figure class="about-us-img-wrap">
                <img src="{{ URL::asset('public/images/about-us-sec-img.png')}}">
            </figure>
          </div>
        </div>
      </div>
    </section>
    <section class="drh-activity-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="drh-activity-heading text-center">
                <div class="section-heading">
                  <h1 class="sec-heading">DRH ACTIVITIES</h1>
                </div>
            </div>      
          </div>
          <div class="col-md-12">
            <div class="activity-slider owl-carousel owl-theme">
              <div class="item">
                <div class="activity-card text-center">
                  <figure class="activity-card-img">
                    <img src="{{ URL::asset('public/images/drh-activity-img-1.png')}}">
                  </figure>
                  <figcaption class="activity-caption"> 
                    <h2>Tennis Coaching Courses</h2>
                    <p>Courses for all ages & abilities</p>
                    <a href="javascript:void(0);" class="book-now-link">Book Now</a>    
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="activity-card text-center">
                  <figure class="activity-card-img">
                    <img src="{{ URL::asset('public/images/drh-activity-img-2.png')}}">
                  </figure>
                  <figcaption class="activity-caption"> 
                    <h2>Football coaching</h2>
                    <p>Coming soon!</p>
                    <a href="javascript:void(0);" class="book-now-link">Book Now</a>    
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="activity-card text-center">
                  <figure class="activity-card-img">
                    <img src="{{ URL::asset('public/images/drh-activity-img-3.png')}}">
                  </figure>
                  <figcaption class="activity-caption"> 
                    <h2>Camp Go!</h2>
                    <p>Holidays camps for kids</p>
                    <a href="javascript:void(0);" class="book-now-link">Book Now</a>    
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="activity-card text-center">
                  <figure class="activity-card-img">
                    <img src="{{ URL::asset('public/images/drh-activity-img-1.png')}}">
                  </figure>
                  <figcaption class="activity-caption"> 
                    <h2>Tennis Coaching Courses</h2>
                    <p>Courses for all ages & abilities</p>
                    <a href="javascript:void(0);" class="book-now-link">Book Now</a>    
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="activity-card text-center">
                  <figure class="activity-card-img">
                    <img src="{{ URL::asset('public/images/drh-activity-img-2.png')}}">
                  </figure>
                  <figcaption class="activity-caption"> 
                    <h2>Football coaching</h2>
                    <p>Coming soon!</p>
                    <a href="javascript:void(0);" class="book-now-link">Book Now</a>    
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="activity-card text-center">
                  <figure class="activity-card-img">
                    <img src="{{ URL::asset('public/images/drh-activity-img-3.png')}}">
                  </figure>
                  <figcaption class="activity-caption"> 
                    <h2>Camp Go!</h2>
                    <p>Holidays camps for kids</p>
                    <a href="javascript:void(0);" class="book-now-link">Book Now</a>    
                  </figcaption>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="testimonial-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="testimonial-heading text-center">
                <div class="section-heading">
                  <h1 class="sec-heading">Testimonials</h1>
                </div>
            </div>      
          </div>
          <div class="col-md-12">
            <div class="testimonial-slider owl-carousel owl-theme">
              <div class="item">
                <div class="testimonial-card">
                  <figure class="testimonial-img-wrap">
                    <img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
                  </figure>
                  <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>RIA HANNAH</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-card alt-testimonial-card">
                  <figure class="testimonial-img-wrap">
                    <img src="{{ URL::asset('public/images/testimonial-card-img-2.png')}}">
                  </figure>
                  <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>MARBEL FREYTAG</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-card">
                  <figure class="testimonial-img-wrap">
                    <img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
                  </figure>
                  <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>NIKKI ROGERS</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-card">
                  <figure class="testimonial-img-wrap">
                    <img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
                  </figure>
                  <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>RIA HANNAH</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-card alt-testimonial-card">
                  <figure class="testimonial-img-wrap">
                    <img src="{{ URL::asset('public/images/testimonial-card-img-2.png')}}">
                  </figure>
                  <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>MARBEL FREYTAG</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-card">
                  <figure class="testimonial-img-wrap">
                    <img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
                  </figure>
                  <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>NIKKI ROGERS</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-card">
                  <figure class="testimonial-img-wrap">
                    <img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
                  </figure>
                  <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>RIA HANNAH</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-card alt-testimonial-card">
                  <figure class="testimonial-img-wrap">
                    <img src="{{ URL::asset('public/images/testimonial-card-img-2.png')}}">
                  </figure>
                  <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>MARBEL FREYTAG</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-card">
                  <figure class="testimonial-img-wrap">
                    <img src="{{ URL::asset('public/images/testimonial-card-img-1.png')}}">
                  </figure>
                  <figcaption class="testimonial-caption">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('public/images/round-arrow-img.png')}}">
                      </div>
                      <h3>NIKKI ROGERS</h3>
                      <span><i class="fas fa-user-circle"></i></span>   
                    </div>
                  </figcaption>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="click-here-sec">
      <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="click-sec-content">
                  <h2 class="click-sec-tagline">Need help with kids camps or our coaching courses?</h2>
                  <ul class="click-btn-content">
                    <li>
                      <figure>
                        <img src="{{ URL::asset('public/images/click-btn-img.png')}}">
                      </figure>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="cstm-btn">click here</a>
                    </li>
                    <li>
                      <figure>
                        <img src="{{ URL::asset('public/images/click-btn-img.png')}}">
                      </figure>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </section>

@endsection
<!-- Footer Section-->