jQuery(document).ready(function($){



  $('.slider').slick({

    draggable: true,

    autoplay: true,

    autoplaySpeed:4000,

    arrows: false,

		dots: true,



    fade: true,

    speed: 500,

    infinite: true,

    cssEase: 'ease-in-out',

    touchThreshold: 100

  })
  $(window).scroll(function(){
    if ($(this).scrollTop() > 50) {
       $('header').addClass('newClass');
    } else {
       $('header').removeClass('newClass');
    }
});
  });

  