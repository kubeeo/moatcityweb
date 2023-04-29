$(document).ready(function () { 
  $('.navbar-collapse ul li.menu-item-has-children').append('<i class="fa fa-angle-down" aria-hidden="true"></i>'); 
  $('.navbar-collapse ul li.menu-item-has-children i').click(function(){
    $(this).parent().children('.sub-menu').slideToggle();
    $(this).parent().toggleClass('menuarrow');
  }) 
  wow = new WOW(
    {
    boxClass:     'wow',     
    animateClass: 'animated',
    offset:       0,     
    mobile:       false,
    live:         true     
  }
  )
  wow.init();
  
  var scrollTop = $(".go-top"); 
  $(window).scroll(function() { 
    var topPos = $(this).scrollTop(); 
    if (topPos > 300) {
      $(scrollTop).css("opacity", "1");

    } else {
      $(scrollTop).css("opacity", "0");
    }
  });
  $(scrollTop).click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 0);
    return false;

  });
  /*-------------------------------------STICKY_NAV--GO_TO_TOP-------------------------*/
  if ($("header").length) {
    var previousScroll = 0,
      headMainHeight = $('header').height(),
      headerOrgOffset = $('header').offset().top + headMainHeight;

    $(window).scroll(function () {
      var currentScroll = $(this).scrollTop();

      if (currentScroll > headerOrgOffset) {
        $('body').addClass('sticky fixed');
      }
      else
        $('body').removeClass('sticky fixed');
    });
  }

  $('.home-slider').owlCarousel({
    items: 1,
    loop: true,
    margin: 20,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    autoplayTimeout: 4500,
    smartSpeed: 4000,
    nav: false,
    dots: true,
    navText: [
      "<i class='fa fa-long-arrow-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    autoplay: true,
    autoplayHoverPause: false,
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
  }) 
  $('.client-slider').owlCarousel({
    items: 6,
    loop: true,
    margin: 20,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    autoplayTimeout: 4500,
    smartSpeed: 4000,
    nav: false,
    dots: false,
    navText: [
      "<i class='fa fa-long-arrow-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    autoplay: true,
    autoplayHoverPause: false,
    responsive: {
      0: {
        items: 3
      },
      600: {
        items: 5
      },
      1000: {
        items: 6
      }
    }
  }) 
  
  $('.others-section .owl-carousel').owlCarousel({
    items: 4,
    loop: false,
    margin: 20,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    autoplayTimeout: 3500,
    smartSpeed: 3000,
    nav: false,
    dots: true,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    autoplay: false,
    autoplayHoverPause: false,
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      600: {
        items: 2
      },
      992: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  }) 
})  