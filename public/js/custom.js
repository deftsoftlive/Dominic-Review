//Toolbox animation
$(document).ready(function() { 
  $(".toolbox").click(function(){
      $('#tool-nav ul li').addClass('cst-animate') ;
  }); 
  $(".nav-close-btn").click(function(){
      $('#tool-nav ul li').removeClass('cst-animate') ;
  });
});

//navigation js
$(".menu-toggle").click(function () {
    $(this).addClass("active");
    $("#main-navigation").addClass("active");
});

$(".nav-close-btn").click(function () {
    $("#main-navigation").removeClass("active");
    $(".menu-toggle").removeClass("active");
});

$(".toolbox").click(function () {
    $(this).addClass("active");
    $("#tool-nav").addClass("active");
});

$(".nav-close-btn").click(function () {
    $("#tool-nav").removeClass("active");
    $(".toolbox").removeClass("active");
});

// owl carousel js
$('.form-tab-slider').owlCarousel({
    loop: true,
    margin: 0,
    responsiveClass: true,
    autoplay: false,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        991: {
            items: 4,
        },
        1199: {
            items: 5,
        }
    }
});
$(".form-tab-slider .owl-prev").html('<i class="fas fa-chevron-left"></i>');
$(".form-tab-slider .owl-next").html('<i class="fas fa-chevron-right"></i>');
//packages slider
$('.packages-slider').owlCarousel({
    loop: true,
    margin: 0,
    responsiveClass: true,
    autoplay: false,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        991: {
            items: 3,
        }
    }
});
$(".form-tab-slider .owl-prev").html('<i class="fas fa-chevron-left"></i>');
$(".form-tab-slider .owl-next").html('<i class="fas fa-chevron-right"></i>');
//tabbing js
$(document).ready(function () {
    $('.tab-item a').click(function () {
        $('.tab-item a').removeClass('activelink');
        $(this).addClass('activelink');
        var tagid = $(this).data('tag');
        $('.tab-data').removeClass('active').addClass('hide');
        $('#' + tagid).addClass('active').removeClass('hide');
    });
});
//packages tabbing

$(document).ready(function () {
    $('.package-item a').click(function () {
        $('.package-item a').removeClass('activelink');
        $(this).addClass('activelink');
        var pkgid = $(this).data('tag');
        $('.tab-data').removeClass('active').addClass('hide');
        $('#' + pkgid).addClass('active').removeClass('hide');
    });
});

//packages tabbing
$(document).ready(function () {
    $('.clickme a').click(function () {
        $('.clickme a').removeClass('activelink');
        $(this).addClass('activelink');
        var tagid = $(this).data('tag');
        $('.list').removeClass('active').addClass('hide');
        $('#' + tagid).addClass('active').removeClass('hide');
    });
});
//how its work video
$('.video').parent().click(function () {
    if ($(this).children(".video").get(0).paused) {
        $(this).children(".video").get(0).play();
        $(this).children(".playButton").fadeOut();
    } else {
        $(this).children(".video").get(0).pause();
        $(this).children(".playButton").fadeIn();
    }
});

//sidenav toggle -innerpages
$(document).ready(function () {
    $(".checklist-wrap .fa-bars").click(function () {
        $(".eventside-bar").addClass("intro");
        $(".aside-toggle i.fa.fa-bars").css("display", "none");
        $(".aside-toggle i.fas.fa-times").css("display", "block");
    });
    $(".checklist-wrap .fa-times").click(function () {
        $(".eventside-bar").removeClass("intro");
        $(".aside-toggle i.fa.fa-bars").css("display", "block");
        $(".aside-toggle i.fas.fa-times").css("display", "none");
    });
});

//populareventslider -homepage
$('.event-slider').owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    autoplay: true,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 2,
        },
        600: {
            items: 2,
        },
        991: {
            items: 4,
        }
    }
});

//Banner-video for responsive
let video = document.querySelector('video');

const setVideoDimensions = () => {
    if (window.innerWidth / window.innerHeight > 16 / 9) {
        video.style.width = '100vw';
        video.style.height = 'calc(100vw * 9 / 16)';
    } else {
        video.style.width = 'calc(100vh * 16 / 9)';
        video.style.height = '100vh';
    }
};

window.onresize = setVideoDimensions;
setVideoDimensions();

//tabs for budget page
$(document).ready(function () {
    $('.clickme a').click(function () {
        $('.clickme a').removeClass('activelink');
        $(this).addClass('activelink');
        var tagid = $(this).data('tag');
        $('.list').removeClass('active').addClass('hide');
        $('#' + tagid).addClass('active').removeClass('hide');
    });
});

//testimonail slider start here

$('.test').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});




