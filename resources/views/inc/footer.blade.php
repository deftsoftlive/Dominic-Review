    <footer class="site-footer d-print-none">
      <div class="ftr-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="footer-links">
                <div class="footer-header">
                  <a class="footer-brand" href="{{url('/')}}">
                    <img src="{{ URL::asset('uploads')}}/{{ getAllValueWithMeta('website_logo', 'general-setting') }}">
                  </a>
                </div>
                <p class="ftr-text">{{ getAllValueWithMeta('footer_section1', 'general-setting') }}</p>
                <ul class="social-media">
                  <li>
                    <a href="{{ getAllValueWithMeta('facebook_link', 'general-setting') }}" class="s-link"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="{{ getAllValueWithMeta('instagram_link', 'general-setting') }}" class="s-link"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="{{ getAllValueWithMeta('google_link', 'general-setting') }}" class="s-link"><i class="fab fa-google-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-8">
              <div class="footer-links">
                <h2 class="footer-heading">USEFUL LINKS</h2>
                <div class="ftr-link-wrap">
                  <ul>
                    @php 
                      $left_menus = DB::table('menus')->where('sub_menu',NULL)->where('type','footer')->where('sort','<=',6)->orderBy('sort','asc')->get();  
                      $right_menus = DB::table('menus')->where('sub_menu',NULL)->where('type','footer')->where('sort','>',6)->orderBy('sort','asc')->get(); 
                    @endphp

                    @foreach($left_menus as $me)
                      <li>
                        <a href="{{$me->url}}" class="ftr-link">{{$me->title}}</a>
                      </li>
                    @endforeach
                  </ul>
                  <ul>
                    
                    @foreach($right_menus as $me)
                    <li>
                      <a href="{{$me->url}}" class="ftr-link">{{$me->title}}</a>
                    </li>
                    @endforeach

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-8">
              <div class="footer-links help">
                <h2 class="footer-heading">Newsletter</h2>
                <p>{{ getAllValueWithMeta('newsletter_content', 'general-setting') }}</p>

                <form id="newsletter" action="{{route('newsletter')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <input type="text" id="email" placeholder="Your Email Address" name="email" class="form-control">
                  </div>
                  <div class="ftr-submit-btn">
                    <button class="cstm-btn" id="submit-newsletter" type="submit">Submit</button>
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
                <p class="copyright-text">{{ getAllValueWithMeta('copyright_section', 'general-setting') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>

   <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/owl.carousel.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>  
    <script src="{{ URL::asset('js/new_custom.js') }}"></script>
    <script src="{{ URL::asset('js/timeCounter.js') }}"></script>
    <script src="{{ URL::asset('js/customValidation.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <!-- <script type="text/javascript" src="{{URL::asset('/js/jquery.flexslider-min.js')}}"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/jquery.flexslider.min.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>

    <script src="{{URL::asset('/e-shop/js/animation.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/e-shop/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/e-shop/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/e-shop/js/home/home.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/e-shop/js/products/wishlist.js')}}"></script>
    <script type="text/javascript" src="https://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    
<script type="text/javascript">
$(document).ready(function(){
  if(!$(".alert_msg").hasClass("shop_items") && !$(".alert_msg").hasClass("course_items") && !$(".alert_msg").hasClass("camp_items")){
      $("#childcare_btn").css('display','block');
  }
});
</script> 

<script type="text/javascript">

    function addnewsection(){
        //noOfattribute
        var number = parseInt($("#noOfQuetion").val());  
        var newnumber =number+1;                        
        $("#noOfQuetion").val(newnumber);

        var mainHtml='<tr class="timeslots slots'+newnumber+'" value="'+newnumber+'"><td><input type="file" name="match_chart['+newnumber+']"></td>';

        mainHtml+='<td class="remove_game_chart"><a href="javascript:void(0);" onclick="removeSection('+newnumber+');" class="cstm-btn">Delete</a></td></tr>';

        $(".add_on_services").append(mainHtml);
    }


    function removeSection(counter){
        //noOfattribute
        var number = parseInt($("#noOfQuetion").val()); 
        $(".slots"+counter).remove();
    }

</script>

<script type="text/javascript">
$(document).ready(function($){
    $("input[type='radio']").click(function(){
     // alert('click');
        var radioValue = $("input[type='radio']:checked").val();

        if(radioValue === 'Adult')
        {
          $('.child-selection-content').css('display','none');
          $('.adult-selection-content').css('display','block');
        }

        if(radioValue === 'Child')
        {
          $('.adult-selection-content').css('display','none');
          $('.child-selection-content').css('display','block');
        }
    });

  $("#add_match").click(function(){
      $('#add_new_match').css('display','block');
      $('#add_match').css('display','none');
  });

});

/*------------------------------
| player Goals
|-------------------------------*/ 
$(document).ready(function(){
  $("select#goal_player").change(function(){
      var player = $(this).children("option:selected").val();  
      $('.goal_player_name').val(player);
  });
  $("select#goal_type").change(function(){
      var goal_type = $(this).children("option:selected").val();    
      $('#pl_goal_type').val(goal_type);
  });
}); 

$("#money_amount").change(function(){

  var amt = $('#money_amount').val();
  $base_url = "http://49.249.236.30:8654/dominic-new/user";

  $.ajax({
      url:$base_url+"/stripe-wallet",
      method:'GET',
      data:{wallet_amount:amt},
      dataType:'json',
      success:function(data)
      {   
        $('#add_money_btn').css('display','none');
        $('.add_stripe_btn').append(data.output);
      },      
  });
});

// $(document).ready(function($){

//     $(".submit_sim_rep button").click(function(){
//         var player_id = $('#player_id').val(); 
//         var report_type = $('#rp_type').val();

//         $base_url = "http://49.249.236.30:8654/dominic-new/user";

//         $.ajax({
//             url:$base_url+"/sim_report_popup",
//             method:'GET',
//             data:{player_id:player_id,rp_type:rp_type},
//             dataType:'json',
//             success:function(data)
//             {   
//                 console.log(data);

//                 $('#pla_name').val(data.player_name);
//                 $('#pla_dob').val(data.player_dob);
//             },      
//         })
//     });

//     $("#close_sim_rp_popup").click(function()
//     {
//       location.reload(true);
//     });
    
// });


$(document).ready(function($){

  // Complex Report
    $("#submit_rep a").click(function(){
        var exist_player_id = $('#exist_player_id').val();
        var player_id = $('#playerID').val();
        var report_type = $('#report_type').val();

        $base_url = "http://49.249.236.30:8654/dominic-new/user";

        $.ajax({
            url:$base_url+"/report_popup",
            method:'GET',
            data:{exist_player_id:exist_player_id,player_id:player_id,report_type:report_type},
            dataType:'json',
            success:function(data)
            {   
                $('body').addClass('modal-open');
                $('#rp_popup').addClass('show');
                $('.modal.show').css('display','block');
                $('.modal.show').css('background', 'rgba(0,0,0,0.5)');

                $('#pl_name').val(data.player_name);
                $('#pl_dob').val(data.player_dob);
            },      
        })
    });

    $("#close_rp_popup").click(function()
    {
      location.reload(true);
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    }

    $(".nav-link").click(function(){
        window.onload = window.localStorage.clear();
    });
});
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
<script type="text/javascript">
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
        width: 200,
        height: 200,
        type: 'circle' //square
    },
    boundary: {
        width: 300,
        height: 300
    }
});
$('#image_file').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});
$('.upload-image').on('click', function (ev) {
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    html = '<img src="' + img + '" />';
    $("#preview-crop-image").html(html);
    $("#upload-success").html("Images cropped and uploaded successfully.");
    $("#upload-success").show();
    // $.ajax({
    //   url: "{{route('croppie.upload-image')}}",
    //   type: "POST",
    //   data: {"image":img},
    //   success: function (data) {
        
    //   }
    // });
  });
});
</script>

    <!-- Variation Selection -->
    <script>
    $(document).ready(function(){
      var selVariation = $('#sel-variation').val();
      var checkVariation = $('#imgid-'+selVariation).addClass('flex-active-slide');
    });

    $(window).on("load",function(){
         $(".design-loader").fadeOut("slow");
    });
    
  /*****************************
  | Update Tennis Club
  |*****************************/
    function fetch_tennis_club_data(tennis_club = '', user_id = '', shop_id = '')
    {
        $base_url = "http://49.249.236.30:8654/dominic-new";

        $.ajax({
            url:$base_url+"/user/update_tennis_club/"+tennis_club+"/"+user_id+"/"+shop_id,
            method:'GET',
            data:{tennis_club:tennis_club, user_id:user_id, shop_id:shop_id},
            dataType:'json',
            success:function(data)
            {   
                
            },      
        })
    }

    $(document).on('keyup', '#update_tennis_club',function(){
        var tennis_club = $(this).val(); 
        var user_id = $(this).attr("data-id");
        var shop_id = $(this).attr("data-shop");

        fetch_tennis_club_data(tennis_club,user_id,shop_id);
    });

  /*****************************
  | Child Image 
  |*****************************/
    function ImagePreviewURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#Image_Preview').attr('src', e.target.result);
            }
          reader.readAsDataURL(input.files[0]);
        }
    }

  </script>

  <!-- Validation on Date -->
    <script>
      $(function(){
          var dtToday = new Date();
          
          var month = dtToday.getMonth() + 1;
          var day = dtToday.getDate();
          var year = dtToday.getFullYear();
          if(month < 10)
              month = '0' + month.toString();
          if(day < 10)
              day = '0' + day.toString();
          
          var maxDate = year + '-' + month + '-' + day;
     
          $('#date_of_birth').attr('max', maxDate);
      });
    </script>

  <!-- Season & course selection filter -->
  <script type="text/javascript">
    $(document).ready(function(){
        $("select#season").change(function(){
            var selectedSeason = $(this).children("option:selected").val(); 
           
            $base_url = "http://49.249.236.30:8654/dominic-new";
            $.ajax({
                url:$base_url+"/user/selectedSeason/",
                method:'GET',
                data:{selectedSeason:selectedSeason},
                dataType:'json',
                success:function(data)
                {   
                    $('#course').html(data.option);
                },      
            })

            $('#selected_cat').val(selectedSeason);
        });
      });

        $(document).ready(function(){
          $("select#course").change(function(){
              var selectedSubCat = $(this).children("option:selected").val();    
              $('#selected_sub_cat').val(selectedSubCat);
            });
    }); 
  </script>

  <!-- Category-Subcategory Selection -->
  <script type="text/javascript">
    $(document).ready(function(){
        $("select#people").change(function(){
            var selectedCat = $(this).children("option:selected").val();  
           
            $base_url = "http://49.249.236.30:8654/dominic-new";
            $.ajax({
                url:$base_url+"/selectedCat/",
                method:'GET',
                data:{selectedCat:selectedCat},
                dataType:'json',
                success:function(data)
                {   
                    $('#subCategory').html(data.option);
                },      
            })

             $('#selected_cat').val(selectedCat);
        });
      });

        $(document).ready(function(){
          $("select#subCategory").change(function(){
              var selectedSubCat = $(this).children("option:selected").val();    
              $('#selected_sub_cat').val(selectedSubCat);
            });
    }); 

    </script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( document ).tooltip();
  } );
  </script>

    <script>
       function quickview(id) {  

        $("body").addClass("modal-open");

        var base_url = 'http://49.249.236.30:8654/dominic-new';
        
        $.ajax({
          url: base_url+"/shop/product/view/"+id,
          type: "get",
          success: function (response) {
           // console.log(response);
            $('#append-modal').html(response);
            $("#myModal1").addClass("show");
	        $("#myModal1").css('display','block');
	        $(".modal-backdrop").addClass('show');

	        (function($){
		        $(".cust_scroll").mCustomScrollbar();
		    })(jQuery);
            
	        // The slider being synced must be initialized first
	        $('#carousel').flexslider({
	          animation: "slide",
	          controlNav: false,
	          animationLoop: true,
	          slideshow: true,
	          itemWidth: 93,
	          itemMargin: 5,
	          asNavFor: '#slider'
	        });
	       
	        $('#slider').flexslider({
	          animation: "slide",
	          controlNav: false,
	          animationLoop: false,
	          slideshow: false,
	          sync: "#carousel"
	        });

          },
          error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
            }
        });

      }

      function closequickview() {
        $("body").removeClass("modal-open");
        $("#myModal1").removeClass("show");
        $("#myModal1").css('display','');
        $(".modal-backdrop").removeClass('show');
        $('.quick_view_modal').remove();
      } 
    </script>

  <!-- Sidebar for Mobile -->
  <script type="text/javascript">
    function closeSidebar() {
        $("#filters-sidebar").removeClass('active');
      }
  </script>

  <!-- Sidebar for Mobile -->
  <script type="text/javascript">
    function check_popup($this) {
        if($this == 1){ 
          console.log($this);
          
          $("body").addClass("modal-open");
          $("body").addClass("popup_box");
          $("body").css('padding-right','17px;');
          $(".dg_prod_sec").addClass("show");
          $(".dg_prod_sec").css('display','block');
          $(".dg_prod_sec").css('padding-right','17px;');
          $('.dg_prod_sec').after('<div class="modal-backdrop fade show"></div>');   
        }
      }

      function moreChild(){
        location.reload();
      }
  </script>

  <!-- Carousel -->
    <script type="text/javascript">

      $(window).load(function() {
        // The slider being synced must be initialized first
        $('#carousel').flexslider({
          animation: "slide",
          controlNav: false,
          animationLoop: true,
          slideshow: true,
          itemWidth: 93,
          itemMargin: 5,
          asNavFor: '#slider'
        });
       
        $('#slider').flexslider({
          animation: "slide",
          controlNav: false,
          animationLoop: false,
          slideshow: false,
          sync: "#carousel"
        });
      });


      //Coach Dashboard
      $('.menu-title').click(function(){
        $('.menu-title + nav').toggleClass('coach_dash');
      });
     $('.menu-title').click(function(){
        $('.menu-title').toggleClass('icon_dash');
      });

      // Camp Listing Page
      $( '.more-about-camp' ).click(function () {
        var id = $(this).attr("id");  
        if ( $( ".box-"+id ).first().is( ":hidden" ) ) {
          $( ".box-"+id ).parent().slideDown( "slow" );
        } 
        else {
          $( ".box-"+id ).parent().slideUp( "slow" );
        }
      });
      $( '.less-about-camp' ).click(function() {
        var id = $(this).attr("id"); 
        if ( $( ".box-"+id ).first().is( ":hidden" ) ) {
          $( ".box-"+id ).parent().show( "slow" );
        } else {
          $( ".box-"+id ).parent().slideUp();
        }
      });

    </script>
    <!-- Tab's Management(Camp Listing Page) - End Here -->

    <!-- Add/Edit Family Member Form JS - Start Here -->
    <script>
      $( document ).ready(function() {
        $('input[name=type]:radio').click(function(){
          var type = $(this).attr("data-type");
          $('.form_type').val(type);

          var blank_book_person = '';
          $('#book_person').val(blank_book_person);
          $('input[name=book_person_type]:radio').prop('checked',false);

          $('#medical_info').css('display','none');
          $('#child_section').css('display','none');
        });

        $('input[name=book_person_type]:radio').click(function(){
           var book_person_type = $(this).attr("id");
           $('#book_person').val(book_person_type);

           // change the form on the basis of child/adult selection and click on yes
            var type = $('.form_type').val();
            var book_person = $('#book_person').val(); 
               
              if(type == 'child' && book_person == 'book_person_yes'){
                  $('#medical_info').css('display','none');
                  $('#child_section').css('display','block');
              }else if(type == 'adult' && book_person == 'book_person_yes'){
                  $('#medical_info').css('display','block');
                  $('#child_section').css('display','none');
              }else if(book_person == 'book_person_no'){
                  $('#medical_info').css('display','none');
                  $('#child_section').css('display','none');
              }else if(type == 'child' && book_person == 'book_person_no'){
                  $('#medical_info').css('display','none');
                  $('#child_section').css('display','none');
              }else if(type == 'adult' && book_person == 'book_person_no'){
                  $('#medical_info').css('display','none');
                  $('#child_section').css('display','none');
              }
        });

        // $('input[name=football_type]:radio').click(function(){
        //    var football_type = $(this).attr("id");
        //    $('#football').val(football_type);
        // });

        $('input[name=language]:radio').click(function(){
           var lang = $(this).attr("id");
           $('#core_lang').val(lang); 
           var core_lang = $('#core_lang').val();

           if(core_lang == 'p-l-english-no')
           {
            $('#primary_lang').css('display','block');
           }else{
            $('#primary_lang').css('display','none');
           }
        });

        $('input[name=media_type]:radio').click(function(){
           var media_type = $(this).attr("id");
           $('#media').val(media_type);
        });

        $('input[name=beh_need_type]:radio').click(function(){
           var beh_need_type = $(this).attr("id");
           $('#beh_need').val(beh_need_type);
           var beh_need = $('#beh_need').val();

           if(beh_need == 'illness-or-injury-no')
           {
            $('#beh_info').css('display','block');
           }else{
            $('#beh_info').css('display','none');
           }
        });

        $('input[name=med_cond_type]:radio').click(function(){
           var med_cond_type = $(this).attr("id");
           $('#med_cond').val(med_cond_type);
           var med_cond = $('#med_cond').val();

           if(med_cond == 'confirm_accurate_yes')
           {
            $('#sec_med_con').css('display','block');
            $('#med_con_button').css('display','block');
            $('#med_cond_info').css('display','block');
           }else{
            $('#sec_med_con').css('display','none');
            $('#med_con_button').css('display','none');
            $('#med_cond_info').css('display','none');
           }
        });

        // Correct info
        $('input[name=correct_info_type]:radio').click(function(){
           var correct_info_type = $(this).attr("id");
           $('#correct_info').val(correct_info_type);
        });

        // Prescribed Medicine
        $('input[name=pres_med_type]:radio').click(function(){
           var pres_med_type = $(this).attr("id");
           $('#pres_med').val(pres_med_type);
           var pres_med = $('#pres_med').val();

           if(pres_med == 'confirm_accurate_yes')
           {
            $('#pres_med_info').css('display','block');
           }else{
            $('#pres_med_info').css('display','none');
           }
        });

        // Medical Requirement
        $('input[name=med_req_type]:radio').click(function(){
           var med_req_type = $(this).attr("id");
           $('#med_req').val(med_req_type);
        });

        // Allergies
        $('input[name=allergies_type]:radio').click(function(){
           var allergies_type = $(this).attr("id");
           $('#allergies').val(allergies_type);

           var allergies = $('#allergies').val();

           if(allergies == 'confirm_accurate_yes')
           {
            $('#sec_all').css('display','block');
            $('#allergies_info').css('display','block');
            $('#allergy_button').css('display','block');
           }else{
            $('#sec_all').css('display','none');
            $('#allergies_info').css('display','none');
            $('#allergy_button').css('display','none');
           }

        });

        //  Special needs
        $('input[name=special_needs_type]:radio').click(function(){
           var special_needs_type = $(this).attr("id");
           $('#special_needs').val(special_needs_type);

           var special_needs = $('#special_needs').val();

           if(special_needs == 'confirm_accurate_yes')
           {
            $('#special_needs_info').css('display','block');
           }else{
            $('#special_needs_info').css('display','none');
           }
        });

        // Gender
        $('input[name=gender_type]:radio').click(function(){
           var gender_type = $(this).attr("id");
           $('#gen').val(gender_type);
        });

        // Media Confirmation
        $('input[name=confirm_type]:radio').click(function(){
           var confirm_type = $(this).attr("result");
           $('#confirm').val(confirm_type);
        });

        // Toilet
        $('input[name=toilet_type]:radio').click(function(){
           var toilet_type = $(this).attr("id");
           $('#toilet').val(toilet_type);
        });

      });

      // $('#med_beh_to_next').click(function(){
      //     $('#media_consent').css('display','block');
      // });

      // Save first section of add family member form
      $('#add-family-mem').on('submit',function(event){ 
        event.preventDefault();

        // Common form
        user_id = $('#user_id_data').val();
        child_id = $('#child_id').val();
        role_id = $('#role_id').val();
        form_type = $('#form_type').val();  
        first_name = $('#first_name').val();
        last_name = $('#last_name').val();
        gender = $('#gen').val();
        date_of_birth = $('#date_of_birth').val();
        address = $('#address').val();
        town = $('#town').val();
        postcode = $('#postcode').val();
        county = $('#county').val();
        country = $('#country').val();
        relation = $('#relation').val();
        book_person = $('#book_person').val();
        tennis_club = $('#tennis_club').val();

        // Child form
        core_lang = $('#core_lang').val();
        primary_language = $('#primary_language').val();
        school = $('#school').val();
        preferences = $('#preferences').val();

        // Adult form
        beh_need = $('#beh_need').val();
        beh_info = $('#beh_info_data').val();
        em_first_name = $('#em_first_name').val();
        em_last_name = $('#em_last_name').val();
        em_phone = $('#em_phone').val();
        em_email = $('#em_email').val();
        correct_info = $('#correct_info').val();

        $.ajax({
          url: "/dominic-new/user/medical_info_to_next",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            child_id:child_id,
            user_id:user_id,
            role_id:role_id,
            form_type:form_type,
            first_name:first_name,
            last_name:last_name,
            gender:gender,
            date_of_birth:date_of_birth,
            address:address,
            town:town,
            postcode:postcode,
            county:county,
            country:country,
            relation:relation,
            book_person:book_person,
            tennis_club:tennis_club,

            core_lang:core_lang,
            primary_language:primary_language,
            school:school,
            preferences:preferences,

            beh_need:beh_need,
            beh_info:beh_info,
            em_first_name:em_first_name,
            em_last_name:em_last_name,
            em_phone:em_phone,
            em_email:em_email,
            correct_info:correct_info,
          },
          success:function(data){
            $('#mem_id').val(data.mem_detail_id);
            $('#child_contacts').css('display','block');
          }

          });
      });

      // Save child contacts
      $('#child-contacts').on('submit',function(event){ 
        event.preventDefault();

        mem_id = $('#mem_id').val();
        child_id = $('#child_id').val();
        con_first_name = $('#con_first_name').val();
        con_last_name = $('#con_last_name').val();
        con_phone = $('#con_phone').val();
        con_email = $('#con_email').val();
        con_relation = $('#con_relation').val();
        con_if_other = $('#con_if_other').val();

        // var con_first_name = $("input[name='con_first_name[]']") .map(function(){
        //   return $(this).val();
        // }).get();

        // var con_last_name = $("input[name='con_last_name[]']") .map(function(){
        //   return $(this).val();
        // }).get();

        // var con_phone = $("input[name='con_phone[]']") .map(function(){
        //   return $(this).val();
        // }).get();

        // var con_email = $("input[name='con_email[]']") .map(function(){
        //   return $(this).val();
        // }).get();

        // var con_relation = $("input[name='con_relation[]']") .map(function(){
        //   return $(this).val();
        // }).get();

        // var con_if_other = $("input[name='con_if_other[]']") .map(function(){
        //   return $(this).val();
        // }).get();


        // console.log(con_first_name);
        // console.log(con_last_name);
        // console.log(con_phone);
        // console.log(con_email);
        // console.log(con_relation);
        // console.log(con_if_other);

        $.ajax({
          url: "/dominic-new/user/child_cont_to_next",
          type:"POST",
          dataType: 'JSON',
          data:{
            "_token": "{{ csrf_token() }}",
            mem_id:mem_id,
            child_id:child_id,
            con_first_name:con_first_name,
            con_last_name:con_last_name,
            con_phone:con_phone,
            con_email:con_email,
            con_relation:con_relation,
            con_if_other:con_if_other,
          },
          success:function(data){
            $('#medical_beh').css('display','block');
          }

          });
      });

      // Save medical beh
      $('#med-beh').on('submit',function(event){ 
        event.preventDefault();

        mem_id = $('#mem_id').val();
        child_id = $('#child_id').val();
        med_cond = $('#med_cond').val();
        med_cond_info = $('#med_con_data').val();
        allergies = $('#allergies').val();
        allergies_info = $('#allergies_data').val();
        pres_med = $('#pres_med').val();
        pres_med_info = $('#pres_med_data').val();
        med_req = $('#med_req').val();
        med_req_info = $('#med_req_data').val();
        toilet = $('#toilet').val();
        special_needs = $('#special_needs').val();
        special_needs_info = $('#special_needs_data').val();
        situation = $('#situation').val();

        $.ajax({
          url: "/dominic-new/user/med_beh_to_next",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            mem_id:mem_id,
            child_id:child_id,
            med_cond:med_cond,
            med_cond_info:med_cond_info,
            allergies:allergies,
            allergies_info:allergies_info,
            pres_med:pres_med,
            pres_med_info:pres_med_info,  
            med_req:med_req,
            med_req_info:med_req_info,
            toilet:toilet,
            special_needs:special_needs,
            special_needs_info:special_needs_info,
            situation:situation,
          },
          success:function(data){
            $('#media_consent').css('display','block');
          }

          });
      });

      // Save media consent
      $('#media-consent').on('submit',function(event){ 
        event.preventDefault();

        mem_id = $('#mem_id').val();
        child_id = $('#child_id').val();
        media = $('#media').val();
        confirm = $('#confirm').val();

        console.log(mem_id, media, confirm);

        $.ajax({
          url: "/dominic-new/user/complete_registration",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            mem_id:mem_id,
            child_id:child_id,
            media:media,
            confirm:confirm,
          },
          success:function(data){
            console.log(data.confirm);

            setTimeout(function(){
              window.location.href="http://49.249.236.30:8654/dominic-new/user/my-family";
            },1000);
            
          }

          });
      });

      // $('#child_info_to_next').click(function(){
      //     $('#child_contacts').css('display','block');
      // });

      // $('#medical_info_to_next').click(function(){
      //     $('#child_contacts').css('display','block');
      // });

      // $('#child_cont_to_next').click(function(){
      //     $('#medical_beh').css('display','block');
      // });

      // $('#med_beh_to_next').click(function(){
      //     $('#media_consent').css('display','block');
      // });
    </script>
    <!-- Add/Edit Family Member Form JS - Start Here -->

    <!-- Datepicker -->
    <script>
      $( function() {
        $( "#datepicker" ).datepicker();
        
      } );
      
    </script>

    <!-- Category-Subcategory Selection -->
    <script>
      $("#people").change(function () {
        var course_name = $('.chosen-single span').html();
        $("#selected_course_name").val(course_name);
      });

      function myFunction() {
        $("#course_listing")[0].click();
      }
    </script>

  <!-- Coupon code submission -->
    <script type="text/javascript">
      // Save media consent
      $('#discount-coupon-form').on('submit',function(event){ 
        event.preventDefault();

        coupon_code = $('#coupon_code').val();

        $.ajax({
          url: "/dominic-new/submit-coupon",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            coupon_code:coupon_code,
          },
          success:function(data){ 
            $('#coupon_msg').html(data.output);
            setTimeout(function()
              { 
                location.reload(true); 
              }, 2000);
          }

        });
    });

/*****************************
| Course Booking
|*****************************/
$('#inputPlayer-3').on('change', function() 
{
    var childID = this.value;
    $('#child_id').val(childID);
});

// Save media consent
  $('#course-booking').on('submit',function(event){ 
    event.preventDefault();

    var child_id  = $('#child_id').val();
    var course_id = $('#course_id').val();

    $.ajax({
      url: "/dominic-new/user/course_booking",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        child_id:child_id,
        course_id:course_id,
      },
      success:function(data){
        if(data.output == 1){
          window.location.href="http://49.249.236.30:8654/dominic-new/shop/cart";
        }
      }

      });
  });
</script>

    <script>
        $('.banner-slider').owlCarousel({
        loop:true,
        margin:0,
    nav:true,
        dots:true,
        responsiveClass:true,
        navText: ["<img src='{{ URL::asset('images/slider-prev-img.png')}}'>","<img src='{{ URL::asset('images/slider-next-img.png')}}'>"],
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
        navText: ["<img src='{{ URL::asset('images/slider-prev-img.png')}}'>","<img src='{{ URL::asset('images/slider-next-img.png')}}'>"],
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

    <script>
function openNav() {
  //document.getElementById("navbarSupportedContent").style.width = "250px";
  $("#main").toggleClass("show");
  $("navbar-collapse collapse").removeClass("show");
}

// $('.search-icon').click(function(){
//     $('.search-icon').toggleClass("serch-field-active");
//      $(".search-icon").removeClass("serch-field-active");
// });

$('.search-icon').click(function(){
     $(".search-field").toggle();
});


  </script> 
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script> 
      $( function(){
    $(".nw_cstm_select").selectmenu();  
  });  
</script> -->
<script>
  $(document).ready(function () {
  $('#people').chosen();
});
</script>
<script>
        $('.owl-carousel2').owlCarousel({
            loop:false,
            margin: 7,
            nav: true,
            autoplay:false,
            dots:false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4

                },
                991: {
                    items: 4
                },
                1000: {
                    items: 8
                }
            }
        })

    </script>
    <script>

        $('.owl-carousel12').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1

                },
                991: {
                    items: 1
                },
                1000: {
                    items:1
                }
            }
        })

   
        $('.owl-carousel3').owlCarousel({
            loop:true,
            margin: 7,
            nav: true,
            autoplay:true,
            dots:false,
            nav:false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1

                },
                991: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    $('.owl-c-d').owlCarousel({
        loop:true,
        margin:0,
    nav:true,
        dots:false,
        responsiveClass:true,
        navText: ["<img src='http://49.249.236.30:8654/dominic-new/public/images/slider-prev-img.png'>","<img src='http://49.249.236.30:8654/dominic-new/public/images/slider-next-img.png'>"],
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
  $('.owl-c-d-testimonials').owlCarousel({
        loop:true,
        margin:30,
        dots:true,
        nav:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:1
            },
            1000:{
                items:2
            }
        }
    })
  $('#parent_detail').click(function(){
      $('#register-sec').css('display','block');

      setTimeout(function(){  
          document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
      }, 1000);
  });

  /*-----------------------------------------
  |
  |     Book a Camp - Table
  |
  |-----------------------------------------*/


function camp_checks(grid_input) {
    
    var col = grid_input.attr("class").match(/col[\w-]*\b/); 
   // console.log(col);
    col = col[0];

    var p = grid_input.attr("name").indexOf("Fullweek"); 
   
    
    // if full week is clicked then clear everything else in that column
    if ( p !== -1) {
      console.log("Full week clicked");
      if (grid_input.prop("checked")) { 

      
        // clear items in this column except full_week
        var ele = ".camp_grid input."+col;
        $(ele).not(".full_week").prop("checked",false);
        $(ele).not(".full_week").data("checked", false);
      }
    }
    else {
      // untick full week option for that column
      console.log("untick full week");
      var ele = ".camp_grid input.full_week."+col;
      $(ele).prop("checked",false);
      $(ele).removeAttr("checked");
      $(ele).data("checked", false);
    }
    
    // clear lunch club if full day is checked
    if ($(grid_input).hasClass("full_day")) {

      console.log("Full day clicked");
      // console.log( $(grid_input).closest("tr"));
      $(grid_input).closest("tr").find(".lunch_club").prop("checked",false);
      $(grid_input).closest("tr").find(".lunch_club").data("checked",false);
    }
    if ($(grid_input).hasClass("lunch_club")) {

      console.log("lunch club clicked");
      if ($(grid_input).closest("tr").find(".full_day").prop("checked")==true) {

        // console.log("and full day checked");
        $(grid_input).prop("checked",false);
        $(grid_input).data("checked",false);
      }
    }
    
}; // function camp_checks



$(".checkbox-style").click(function(){

  var total = 0;

  if ($(this).data("checked")) {
    $(this).removeAttr("checked");
    $(this).data("checked", false);
  } else {
    $(this).data("checked", true);
  }

 
// console.log($(this));

  camp_checks($(this));

  
  $("input.checkbox-style").each(function () {

    var checkboxID = $(this).attr("id");
    var checkboxValue = $(this).val();
    // console.log(checkboxID);
    // console.log(checkboxValue);
    if($("#"+checkboxID).is(":checked")) {
      total = total + parseFloat($("#pricing-"+checkboxValue).val()); 
    }
  });
  if(total > 0) {
    $("#total-form").text(total);
    $("#updated_price").val(total);
  }
  else {
    $("#total-form").text("");
  }
});


$("#submit-booking").click(function() {
  
  if($("#child-selection").val() == "") {
    alert("Please select a child");
    return false;
  }

  var chkChecked = "";
  $("input.checkbox-style").each(function () {

    var checkboxID = $(this).attr("id");

    if($("#"+checkboxID).is(":checked")) {
      chkChecked = 1;
    }
  });

  if(chkChecked != 1) {
    alert("Please choose booking options");
    return false;
  }
  
});

    </script>
  <!-- player info slider -->
      <script>
        $('.player-info-slider').owlCarousel({
            loop:false,
            margin: 0,
            nav: true,
            autoplay:false,
            dots:false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3

                },
                991: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
         $( ".player-info-slider .owl-prev").html('<i class="fas fa-arrow-circle-left"></i>');
 $( ".player-info-slider .owl-next").html('<i class="fas fa-arrow-circle-right"></i>');

    </script>
  </body>
</html>