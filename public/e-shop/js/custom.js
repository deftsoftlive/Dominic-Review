// filter category toggle js 
$("#FilterCategoryToggle").click(function(){
    $("#filters-sidebar").addClass("active");
}); 
$("#CloseFilterCategory").click(function(){
    $("#filters-sidebar").removeClass("active");
}) 


// owl carousel js
$('.featured-product-slider').owlCarousel({
    loop: true,
    margin: 20,
    responsiveClass: true,
    autoplay: false,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1,
           
        },
        767: {
            items: 2,
        },
        991: {
            items: 3,

        },
        1199: {
            items: 4,
        }
    }
});
$(".owl-carousel .owl-prev").html('<i class="fas fa-chevron-left"></i>');
$(".owl-carousel .owl-next").html('<i class="fas fa-chevron-right"></i>');

$('.related-product-slider').owlCarousel({
    loop: true,
    margin: 20,
    responsiveClass: true,
    autoplay: false,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1,
           
        },
        767: {
            items: 2,
        },
        991: {
            items: 3,

        },
        1199: {
            items: 3,
        }
    }
});

// Product flex slider
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