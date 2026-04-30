jQuery.noConflict();
(function (jQuery) {
  "use strict";
  jQuery(document).ready(function () {

    jQuery(".demo2").bootstrapNews({
      newsPerPage: 4,
      autoplay: true,
      pauseOnHover: false,
      navigation: false,
      direction: "down",
      newsTickerInterval: 2500,
      onToDo: function () {},
    });

    /* 3 */
    jQuery(".slider").slick({
      infinite: true,
      dots: true,
      arrows: false,
      autoplay: true,
      rtl: true,
      autoplaySpeed: 3000,
      fade: true,
      fadeSpeed: 1000,
    });
    /* 5  */
    jQuery(".carousel").slick({
      dots: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
      rtl: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
          },
        },
      ],
    });

    /* 5  */
    jQuery(".carouselAraa").slick({
      dots: false,
      speed: 300,
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
      rtl: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
          },
        },
      ],
    });

    /* 2 */
    jQuery("#newsTicker2").breakingNews({
      direction: "rtl",
      radius: 1,
    });

    jQuery("#newsTicker15").breakingNews({
      position : 'fixed-bottom',
      height: 50,
      direction: "rtl",
      themeColor: '#ce2525',
      effect: 'slide-down'
    });

    /* 7 */
    jQuery(".slider-6").slick({
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      infinite: false,
      autoplay: true,
      rtl: true,
      autoplaySpeed: 3000,
      fade: true,
      fadeSpeed: 1000,
    });


  });
})(jQuery);







