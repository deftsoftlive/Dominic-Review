    <footer class="site-footer">
      <div class="ftr-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="footer-links">
                <div class="footer-header">
                  <a class="footer-brand" href="index.html">
                    <img src="{{ URL::asset('public/images/site-footer-logo.png')}}">
                  </a>
                </div>
                <p class="ftr-text">DRH Sports , the best in sports coaching!</p>
                <ul class="social-media">
                  <li>
                    <a href="javascript:void(0);" class="s-link"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="javascript:void(0);" class="s-link"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="javascript:void(0);" class="s-link"><i class="fab fa-google-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-8">
              <div class="footer-links">
                <h2 class="footer-heading">USEFUL LINKS</h2>
                <div class="ftr-link-wrap">
                  <ul>
                    <li>
                      <a href="javascript:void(0);" class="ftr-link">Home</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="ftr-link">About Us</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="ftr-link">Shop</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="ftr-link">Courses</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="ftr-link">Camps</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="ftr-link">FAQs</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="ftr-link">Contact Us</a>
                    </li>
                  </ul>
                  <ul>
                    <li>
                      <a href="{{route('register-as-coach')}}" class="ftr-link">Register As Coach</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="ftr-link">Privacy Policy</a>
                   </li>
                    <li>
                      <a href="javascript:void(0);" class="ftr-link">Terms and Conditions</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-8">
              <div class="footer-links help">
                <h2 class="footer-heading">Newsletter</h2>
                <p>Subscribe to Our Newsletter to get Important News, Amazing Offers & Inside Scoops:</p>
                <form>
                  <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email Address">
                  </div>
                  <div class="ftr-submit-btn">
                    <a href="javascript:void(0);" class="cstm-btn">Submit</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="copy-right">
                <p class="copyright-text">Copyright © 2020 - All Rights Reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('public/js/owl.carousel.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>  
    <script src="{{ URL::asset('public/js/customValidation.js') }}"></script>


<!-- Home page - Slider -->
    <script>
        $('.banner-slider').owlCarousel({
        loop:true,
        margin:0,
    nav:true,
        dots:true,
        responsiveClass:true,
        navText: ["<img src='{{ URL::asset('public/images/slider-prev-img.png')}}'>","<img src='{{ URL::asset('public/images/slider-next-img.png')}}'>"],
        responsive:{
            0:{
                items:1,
        nav:false
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
        $('.activity-slider').owlCarousel({
        loop:false,
        margin:0,
        dots:false,
        nav:true,
        responsiveClass:true,
        navText: ["<img src='{{ URL::asset('public/images/slider-prev-img.png')}}'>","<img src='{{ URL::asset('public/images/slider-next-img.png')}}'>"],
        responsive:{
            0:{
                items:1,
                nav:false,
                dots:true
            },
            768:{
                items:2,
                margin:10,
                
            },
            1000:{
                items:3,
                nav:true
            }
        }
    })
        $('.testimonial-slider').owlCarousel({
        loop:true,
        margin:0,
        dots:true,
        nav:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:2
            },
            1000:{
                items:3
            }
        }
    })
    </script>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script> 
      $( function(){
    $(".nw_cstm_select").selectmenu();  
  });  
</script>

<!-- Website Menu -->
  <script>
  function openNav() {
    $("#main").toggleClass("show");
    $("navbar-collapse collapse").removeClass("show");
  }

  $('.search-icon').click(function(){
       $(".search-field").toggle();
  });
  </script>

  </body>
</html>