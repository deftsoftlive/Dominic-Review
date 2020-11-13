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
                    <a target="_blank" href="{{ getAllValueWithMeta('facebook_link', 'general-setting') }}" class="s-link"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a target="_blank" href="{{ getAllValueWithMeta('instagram_link', 'general-setting') }}" class="s-link"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a target="_blank" href="{{ getAllValueWithMeta('google_link', 'general-setting') }}" class="s-link"><i class="fab fa-google-plus"></i></a>
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

<script src="{{ URL::asset('js/circle-progress.min.js')}}"></script>

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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() { 
          $("#season_ID").select2();
          $("#season").select2();
          $("#active_seasons").select2();
        });
    

    $(document).ready(function() {
        $('.print_report').click(function() {
            //window.print();
        var report_id = $(this).data("id"); 
            
            $('.pl_rp_data').addClass('d-print-none');
            $('.player-reports-'+report_id).removeClass('d-print-none'); 
            window.print();
        });

      });
    

      $(document).ready(function() {
        $('#print_all_rps').click(function() {
          $('.pl_rp_data').removeClass('d-print-none');
        });
      });
    </script> 
  
<script type="text/javascript">
$(document).ready(function(){
  if(!$(".alert_msg").hasClass("shop_items") && !$(".alert_msg").hasClass("course_items") && !$(".alert_msg").hasClass("camp_items")){
      $("#childcare_btn").css('display','block');
  }

// Upload profile & icon images
  $('input[name=profile_image]').change(function(){
    var value = $( 'input[name=profile_image]:checked' ).val();

    $('#icon').val(value);

    if(value != 'no')
    {
      $('.upload_profile').addClass('collapsed');
      $(".upload_profile").attr("aria-expanded","false");
      $('.collapse.cropper_form').removeClass('show');
      $('.upload_profile').prop("disabled", true);
      $('.profile_pic_save').css('display','block');
      $('.user_profile').css('display','none');
    }else{
      $('.upload_profile').removeClass('collapsed');
      $(".upload_profile").attr("aria-expanded","true");
      $('.collapse.cropper_form').addClass('show');
      $('.upload_profile').prop("disabled", false);
      $('.profile_pic_save').css('display','none');
      $('.user_profile').css('display','block');
    }
  });

});
</script> 

<script type="text/javascript">

    function addnewsection(){
        //noOfattribute
        var number = parseInt($("#noOfQuetion").val());  
        var newnumber =number+1;                        
        $("#noOfQuetion").val(newnumber);

        var mainHtml='<tr class="timeslots slots'+newnumber+'" value="'+newnumber+'"><td><input type="file" name="match_chart['+newnumber+']"></td>';

        mainHtml+='<td class="remove_game_chart"><a href="javascript:void(0);" onclick="removeSection('+newnumber+');" class="cstm-btn main_button">Delete</a></td></tr>';

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

    $(".ah_medical_cond").change(function(){
       var result = $('input[name="med_cond"]:checked').val();

       if(result == 'no')
       {  
          $('#ah_medical_cond1').css('display','none');
          $('.ah_medi').css('display','none');
          $('.ah_medi_button').css('display','none');
          $('.ah_another_medical').parent().css('display','none');
       }
       else
       {
          $('#ah_medical_cond1').css('display','block');
          $('.ah_medi').css('display','block');
          $('.ah_medi_button').css('display','block');
          $('.ah_another_medical').parent().css('display','block');
       }

     });


    $(".medical_cond").change(function(){
       var result = $('input[name="med_cond"]:checked').val();
       var u_type = $('#u_type').val();   

       if(result == 'no')
       {  
          $('#medical_cond1').css('display','none');
          $('.medi').css('display','none');
          $('.medi_button').css('display','none');
          $('.another_medical').parent().css('display','none');
       }
       else if(result == 'yes' && u_type == 'Child') 
       {  
          $('#medical_cond1').css('display','block');
          $('.medi1').css('display','block');
          $('.medi_button').css('display','block');
          $('.another_medical').parent().css('display','block');
       }
       else if(result == 'yes' && u_type == 'Adult') 
       {  
          $('#medical_cond1').css('display','block');
          $('.medi').css('display','block');
          $('.medi_button').css('display','block');
          $('.another_medical').parent().css('display','block');
       }

       var result1 = $('input[name="med_cond1"]:checked').val();

       if(result1 == 'no')
       {
          $('#medical_cond').css('display','none');
          $('.medi').css('display','none');
          $('.medi_button').css('display','none');
          $('.another_medical').parent().css('display','none');
       }
       else if(result1 == 'yes') 
       {
          $('#medical_cond').css('display','block');
          $('.medi').css('display','block');
          $('.medi_button').css('display','block');
          $('.another_medical').parent().css('display','block');
       }
    });

    $(".allergy_cond").change(function(){
       var result = $('input[name="allergies"]:checked').val();

       if(result == 'no')
       {
          $('#sec_all').css('display','none');
          $('.aller').css('display','none');
          $('.another_allergy').parent().css('display','none');
       }
       else if(result == 'yes') 
       {
          $('#sec_all').css('display','block');
          $('.aller').css('display','block');
          $('.another_allergy').parent().css('display','block');
       }
    });


    $(".beh_cond").change(function(){
       var result = $('input[name="beh_need"]:checked').val();

       if(result == 'no')
       {
          $('.beh_info').css('display','none');
       }
       else if(result == 'yes') 
       {
          $('.beh_info').css('display','block');
       }
    });


    $(".pre_med").change(function(){
       var result = $('input[name="pres_med"]:checked').val();

       if(result == 'no')
       {
          $('.pre_info').css('display','none');
       }
       else if(result == 'yes') 
       {
          $('.pre_info').css('display','block');
       }
    });


    $(".med_req").change(function(){
       var result = $('input[name="med_req"]:checked').val();

       if(result == 'no')
       {
          $('.med_req_info').css('display','none');
       }
       else if(result == 'yes') 
       {
          $('.med_req_info').css('display','block');
       }
    });


    $(".eng_que").change(function(){
       var result = $('input[name="language1"]:checked').val();

       if(result == 'yes')
       {
          $('.pri_lang').css('display','none');
       }
       else if(result == 'no') 
       {
          $('.pri_lang').css('display','block');
       }
    });

    $(".eng_que1").change(function(){
       var result = $('input[name="language"]:checked').val();

       if(result == 'yes')
       {
          $('.pri_lang1').css('display','none');
       }
       else if(result == 'no') 
       {
          $('.pri_lang1').css('display','block');
       }
    });


    $("input[type='radio']").click(function(){
      
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

  $.ajax({
      url:"http://49.249.236.30:8654/dominic-new/user/stripe-wallet",
      method:'GET',
      data:{wallet_amount:amt},
      dataType:'json',
      success:function(data)
      {   
        $('#add_money_btn').css('display','none');
        $('.add_stripe_btn').html(data.output);
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

        $.ajax({
            url:"http://49.249.236.30:8654/dominic-new/user/report_popup",
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

  var profile_user = $('#profile_user').val();
  var icon = $('#icon').val(); 
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    html = '<img src="' + img + '" />';
    $("#preview-crop-image").html(html);
    $("#upload-success").html("Profile picture uploaded successfully.");
    $("#upload-success").show();
    $.ajax({
      url: "{{route('croppie.upload-image')}}",
      type: "POST",
      data: {"image":img,"user_id":profile_user,"icon":icon},
      success: function (data) {
          setTimeout(function(){ window.location = "http://49.249.236.30:8654/dominic-new/user/badges"; }, 800);
      }
    });
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

    // $(document).ready(function(){
    //   $("#childcare_form").on("submit", function(){
    //       $("body").addClass('processing');
    //   });
    //   });
    // });
    
  /*****************************
  | Update Tennis Club
  |*****************************/
    function fetch_tennis_club_data(tennis_club = '', user_id = '', shop_id = '')
    {
        $.ajax({
            url:"http://49.249.236.30:8654/dominic-new"+"/user/update_tennis_club/"+tennis_club+"/"+user_id+"/"+shop_id,
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

            $.ajax({
                url:"http://49.249.236.30:8654/dominic-new/user/selectedSeason/",
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

            $.ajax({
                url:"http://49.249.236.30:8654/dominic-new/selectedCat/",
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

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( '.player-achie-disable-list' ).tooltip();
  } );
  </script>

    <script>
       function quickview(id) {  

        $("body").addClass("modal-open");
        
        $.ajax({
          url: "http://49.249.236.30:8654/dominic-new/shop/product/view/"+id,
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

        // $('input[name=language]:radio').click(function(){
        //    var lang = $(this).attr("id");
        //    $('#core_lang').val(lang); 
        //    var core_lang = $('#core_lang').val();

        //    if(core_lang == 'no')
        //    {
        //     $('#primary_lang').css('display','block');
        //    }else{
        //     $('#primary_lang').css('display','none');
        //    }
        // });

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
        $('input[name=toilet]:radio').click(function(){
           var toilet_type = $(this).attr("id");
           $('#toilet').val(toilet_type);
        });

        $("input[name=toilet]:radio").change(function(){
           var result = $('input[name="toilet"]:checked').val();

           if(result == 'no')
           {
              $('#toilet').addClass('show');
              $('.modal.fade.show').css('padding-right', '15px');
              $('.modal.fade.show').css('display', 'block');
              $('body').addClass('modal-open');
              $('.modal-open').addClass('toilet-modal-open');
              $('.toilet_modal_back').addClass('show');
           }
           else if(result == 'yes') 
           {
              $('#toilet').removeClass('show');
              $('.modal.fade.show').css('padding-right', '0px');
              $('.modal.fade.show').css('display', 'none');
              $('.modal-open').removeClass('toilet-modal-open');
              $('body').removeClass('modal-open');
              $('.toilet_modal_back').removeClass('show');
           }
        });

        $('.close_toilet').click(function(){
              $('.modal.fade.show').css('padding-right', '0px');
              $('.modal.fade.show').css('display', 'none');
              $('#toilet').removeClass('show');
              $('.modal-open').removeClass('toilet-modal-open');
              $('body').removeClass('modal-open');
              $('.toilet_modal_back').removeClass('show');
        });

        $('.toilet_modal_back').click(function(){
              $('.modal.fade.show').css('padding-right', '0px');
              $('.modal.fade.show').css('display', 'none');
              $('#toilet').removeClass('show');
              $('.modal-open').removeClass('toilet-modal-open');
              $('body').removeClass('modal-open');
              $('.toilet_modal_back').removeClass('show');
        });

      });

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
  // $('#course-booking').on('submit',function(event){ 
  //   event.preventDefault();

  //   var child_id  = $('#child_id').val();
  //   var course_id = $('#course_id').val();

  //   $.ajax({
  //     url: "/dominic-new/user/course_booking",
  //     type:"POST",
  //     data:{
  //       "_token": "{{ csrf_token() }}",
  //       child_id:child_id,
  //       course_id:course_id,
  //     },
  //     success:function(data){
  //       if(data.output == 1){
  //         window.location.href="http://49.249.236.30:8654/dominic-new/shop/cart";
  //       }
  //     }

  //     });
  // });
</script>

    <script>
        $('.banner-slider').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:true,
        autoplay:true,
        autoplayTimeout:5000,
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
            margin:0,
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
    autoplay:true,
    autoplayTimeout: 5000,  
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
                items:1
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
                700: {
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



<script>
function score(el){

  $(el).circleProgress({
    fill: { gradient: ["#1279db", "#1279db"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'%');
    });  
};
score('#Score');

function score1(el){

  $(el).circleProgress({
    fill: { gradient: ["#4eb86c", "#4eb86c"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'%');
    });  
};
score1('#Score-1');

function score2(el){

  $(el).circleProgress({
    fill: { gradient: ["#1279db", "#1279db"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'%');
    });  
};
score2('#Score-2');

function score3(el){

  $(el).circleProgress({
    fill: { gradient: ["#4eb86c", "#4eb86c"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'%');
    });  
};
score3('#Score-3');

function score4(el){

  $(el).circleProgress({
    fill: { gradient: ["#1279db", "#1279db"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'%');
    });  
};
score4('#Score-4');

function score5(el){

  $(el).circleProgress({
    fill: { gradient: ["#4eb86c", "#4eb86c"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'');
    });  
};
score5('#Score-5');

function score6(el){

  $(el).circleProgress({
    fill: { gradient: ["#1279db", "#1279db"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'');
    });  
};
score6('#Score-6');

function score7(el){

  $(el).circleProgress({
    fill: { gradient: ["#4eb86c", "#4eb86c"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'');
    });  
};
score7('#Score-7');

function score8(el){

  $(el).circleProgress({
    fill: { gradient: ["#4eb86c", "#4eb86c"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'%');
    });  
};
score8('#Score-8');

function score9(el){

  $(el).circleProgress({
    fill: { gradient: ["#4eb86c", "#4eb86c"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'%');
    });  
};
score9('#Score-9');

function score10(el){

  $(el).circleProgress({
    fill: { gradient: ["#1279db", "#1279db"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'%');
    });  
};
score10('#Score-10');

function score11(el){

  $(el).circleProgress({
    fill: { gradient: ["#4eb86c", "#4eb86c"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'%');
    });  
};
score11('#Score-11');

function score12(el){

  $(el).circleProgress({
    fill: { gradient: ["#1279db", "#1279db"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(2)).substr(2)+'%');
    });  
};
score12('#Score-12');

function score13(el){

  $(el).circleProgress({
    fill: { gradient: ["#1279db", "#1279db"] },
     startAngle: -Math.PI/2,
     emptyFill: { color: "#fff" },
     reverse: true,
      emptyFill: 'transparent'
  })
    .on('circle-animation-progress', function(event, progress, stepValue){
     $(this).find('.progress-value > span').text(String(stepValue.toFixed(3)).substr(2)+'');
    });  
};
score13('#Score-13');
</script>
  </body>
</html>