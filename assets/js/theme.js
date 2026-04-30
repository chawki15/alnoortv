(function ($) {
    "use strict";
  
    var bn = {
      /**
      * ------------------------------------------------------------------------
      * Launch Functions
      * ------------------------------------------------------------------------
      */
      Launch: function () {
        bn.Back_to_top();
        bn.Showbacktop();
        bn.Block_loadcontent();
        bn.Suggestion_post();
        bn.Hamburger();
        bn.Dropdown_submenu();
        bn.Vertical_tabs();
        bn.Dropdown_animate();
        bn.Sticky();
        bn.Progress_scroll();
        bn.Mobile_menu();
        bn.Bootstrap_module();
        bn.Custom();
      },
      /**
      * ------------------------------------------------------------------------
      * Back to top function
      * ------------------------------------------------------------------------
      */
      Back_to_top: function (){
          // browser window scroll (in pixels) after which the "back to top" link is shown
          var offset = 300,
          //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
          offset_opacity = 1200,
          //grab the "back to top" link
          $back_to_top = $('.back-top');
          //hide or show the "back to top" link
          $(window).scroll(function(){
              ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('backtop-is-visible') : $back_to_top.removeClass('backtop-is-visible backtop-fade-out');
              if( $(this).scrollTop() > offset_opacity ) { 
                  $back_to_top.addClass('backtop-fade-out');
              }
          });
          // Material-scrolltop
          function mScrollTop(element, settings) {
              var _ = this,
                  breakpoint;
              var scrollTo = 0;
              _.btnClass = '.material-scrolltop';
              _.revealClass = 'reveal';
              _.btnElement = $(_.btnClass);
              _.initial = {
                  revealElement: 'body',
                  revealPosition: 'top',
                  padding: 0,
                  duration: 600,
                  easing: 'swing',
                  onScrollEnd: false
              }
              _.options = $.extend({}, _.initial, settings);
              _.revealElement = $(_.options.revealElement);
              breakpoint = _.options.revealPosition !== 'bottom' ? _.revealElement.offset().top : _.revealElement.offset().top + _.revealElement.height();
              scrollTo = element.offsetTop + _.options.padding;
              $(document).scroll(function() {
                  if (breakpoint < $(document).scrollTop()) {
                      _.btnElement.addClass(_.revealClass);
                  } else {
                      _.btnElement.removeClass(_.revealClass);
                  }
              });
              _.btnElement.click(function() {
                  var trigger = true;
                  $('html, body').animate({
                      scrollTop: scrollTo
                  }, _.options.duration, _.options.easing, function() {
                      if (trigger) { // Fix callback triggering twice on chromium
                          trigger = false;
                          var callback = _.options.onScrollEnd;
                          if (typeof callback === "function") {
                              callback();
                          }
                      }
                  });
                  return false;
              });
          }
          $.fn.materialScrollTop = function() {
              var _ = this,
                  opt = arguments[0],
                  l = _.length,
                  i = 0;
              if (typeof opt == 'object' || typeof opt == 'undefined') {
                  _[i].materialScrollTop = new mScrollTop(_[i], opt);
              }
              return _;
          };
          $('body').materialScrollTop({   // Scroll to the top of <body> element ...
              revealElement: 'header',    // Reveal button when scrolling over <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> ...
              revealPosition: 'bottom',   // ... and do it at the end of </header> element
              duration: 1000,              // Animation will run 1000 ms
          });
      },
      /**
      * ------------------------------------------------------------------------
      * Show the navbar when the page is scrolled up function
      * ------------------------------------------------------------------------
      */
      Showbacktop: function() {
        var minscreen = 992;
  
        //primary navigation slide-in effect
        if ($(window).width() > minscreen) {
          var headerHeight = $('#showbacktop').height();
          $(window).on('scroll', {
              previousTop: 0
            },
            function() {
              var currentTop = $(window).scrollTop();
              var min_header = 120;
              //check if user is scrolling up
              if (currentTop < this.previousTop) {
                //if scrolling up...
                if (currentTop > min_header && $('#showbacktop').hasClass('is-fixed')) {
                  $('#showbacktop').addClass('is-visible');
                } else {
                  $('#showbacktop').removeClass('is-visible is-fixed');
                }
              } else if (currentTop > this.previousTop) {
                //if scrolling down...
                $('#showbacktop').removeClass('is-visible');
                if (currentTop > headerHeight && !$('#showbacktop').hasClass('is-fixed')) $('#showbacktop').addClass('is-fixed');
              } 
              this.previousTop = currentTop;
            });
        }
      },
      /**
      * ------------------------------------------------------------------------
      * Ajax load content function
      * ------------------------------------------------------------------------
      */
      Block_loadcontent: function() {
          $(document).ready(function(){
              $('#carouselmega, #featured').carousel({
                interval:false // remove interval for manual sliding
              });
              $(".nav-block-link li a, .nav-block-link1 li a, .nav-block-link2 li a, .nav-block-link3 li a, .nav-block-link4 li a, .nav-block-link5 li a, .nav-block-link6 li a, .nav-block-link7 li a").click(function() {
                  $(this).parent().addClass('active').siblings().removeClass('active');
              });
              $('[data-toggle="tabajax"]').click(function(e) {
                  e.preventDefault();
                  var loadurl = $(this).attr('href');
                  var targ = $(this).attr('data-target');
                  $.get(loadurl, function(data) {
                      $.ajax({
                         beforeSend: function(){
                          // Before load
                          $(targ).html('<p class="loaders"><i class="fa fa-spinner fa-spin"></i></p>');
                         },
                         complete: function(){
                          // Content Loaded
                          $(targ).html(data);
                         }
                       });
                  });
                  $(this).tab('show');
              });
          });
      },
      /**
      * ------------------------------------------------------------------------
      * Suggestion function
      * ------------------------------------------------------------------------
      */
      Suggestion_post: function() {
          var minscreen = 992;
          //primary navigation slide-in effect
          if ($(window).width() > minscreen) {
              var offset = 2000,
              offset_opacity = 2000,
              $suggestion_box = $('.suggestion-box');
              $(window).scroll(function(){
                  ( $(this).scrollTop() > offset ) ? $suggestion_box.addClass('hide') : $suggestion_box.removeClass('hide show');
                  if( $(this).scrollTop() > offset_opacity ) { 
                      $suggestion_box.addClass('show');
                  }
              });
              // close suggestion
              $('#close-suggestion').click(function()  {
                  $suggestion_box.addClass('close');
              });
          }
      },
      /**
      * ------------------------------------------------------------------------
      * Hamburger function
      * ------------------------------------------------------------------------
      */
      Hamburger: function() {
          $('.nav-hamburger').on('click', function () {
              // hamburger animation
              $('.hamburger-icon').toggleClass('open');
          });
      },
      /**
      * ------------------------------------------------------------------------
      * Dropdown submenu function
      * ------------------------------------------------------------------------
      */
      Dropdown_submenu: function() {
          $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
              if (!$(this).next().hasClass('show')) {
                  $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
              }
              var $subMenu = $(this).next(".dropdown-menu");
              $subMenu.toggleClass('show');
              
              $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                  $('.dropdown-submenu .show').removeClass("show");
                  $('.dropdown-menu .show').removeClass("show");
              });
              
              return false;
          });
          $('.dropdown-menu > li > a.dropdown-toggle').on('click', function(e) {
                  $(this).parent().toggleClass('show');
          });
          // sidenav
          $(".sidenav-menu ul").addClass("border-bottom-last-0");
          $(".sidenav-menu ul li a").addClass("list-group-item");
          // if dropdown offscreen
          $(".dropdown li").on('mouseenter mouseleave', function (e) {
                if ($('.dropdown-menu', this).length) {
                    var elm = $('.dropdown-menu', this);
                    var off = elm.offset();
                    var l = off.left;
                    var w = elm.width();
                    var docW = $(window).width();
        
                    var isEntirelyVisible = (l + w <= docW);
        
                    if (!isEntirelyVisible) {
                        $(elm).addClass('dropdown-reverse');
                    } else {
                        $(elm).removeClass('dropdown-reverse');
                    }
                }
          });
      },
      /**
      * ------------------------------------------------------------------------
      * Vertical Tabs function
      * ------------------------------------------------------------------------
      */
      Vertical_tabs: function() {
          // tabs in mega menu
          $('.dropdown-menu a[data-toggle="tab"]').click(function (e) {
              e.stopPropagation();      
              $(this).tab('show');
          });
      },
      /**
      * ------------------------------------------------------------------------
      * Dropdown animate function
      * ------------------------------------------------------------------------
      */
      Dropdown_animate: function() {
          // dropdown animate css
          $('.dropdown, .mega-dropdown, .dropdown-menu').on('show.bs.dropdown', function () {
                $(this).children('.dropdown-menu').addClass('animations slideInUp');
          });
          $('.dropdown, .mega-dropdown, .dropdown-menu').on('hide.bs.dropdown', function () {
                $(this).children('.dropdown-menu').removeClass('animations slideInUp');
          });
          // screens 
          var screens = 992;
          // Hover animate css only on desktop
          if ( $(window).width() > screens ) {
               $(function () {
                  // dropdown animate on hover mode
                  $('.hover-mode a.dropdown-toggle').hover(function() {
                      $('.navbar-nav>li>.dropdown-menu').addClass('animations slideInUp');
                  });
  
                  // Hover tabs
                  $('.mega-hovers').off('click.bs.tab.data-api', '[data-hover="tab"]');
                  $('.mega-hovers').on('mouseenter.bs.tab.data-api', '[data-toggle="tab"], [data-hover="tab"]', function () {
                    $(this).tab('show');
                  });
  
              });
          }
      },
      /**
      * ------------------------------------------------------------------------
      * Sticky function
      * ------------------------------------------------------------------------
      */
      Sticky: function() {
          $(".sticky-nav").stick_in_parent();
          // if have scroll top
          var myNav = document.getElementById("showbacktop");
          if(myNav){
            $(".sticky").stick_in_parent({offset_top: 70});
          } else {
            $(".sticky").stick_in_parent({offset_top: 10});
         }
      },
      /**
      * ------------------------------------------------------------------------
      * Progress scroll line function
      * ------------------------------------------------------------------------
      */
      Progress_scroll: function () {
          // progress line
          $(window).scroll(function () {
              var s = $(window).scrollTop(),
                  d = $(document).height(),
                  c = $(window).height();
              var scrollPercent = (s / (d-c)) * 100;
              var position = scrollPercent;
              $("#progress-bar").attr('value', position);
          });
      },
      /**
      * ------------------------------------------------------------------------
      * Mobile Menu function
      * ------------------------------------------------------------------------
      */
      Mobile_menu: function () {
          // Push mobile menu
          $('.back-menu').click(function() {
              $('.menu-mobile').removeClass('pushleft-open pushright-open');
              $('body').removeClass('sidenav-left-open sidenav-right-open');
          });
          // push menu to left
          $('#showLeftPush').click(function () {
              $('body').toggleClass('sidenav-left-open');
              $('.push-left').toggleClass('pushleft-open');
          });
          // push menu to right
          $('#showRightPush').click(function () {
              $('body').toggleClass('sidenav-right-open');
              $('.push-right').toggleClass('pushright-open');
          });
      },
      /**
      * ------------------------------------------------------------------------
      * Bootstrap function
      * ------------------------------------------------------------------------
      */
      Bootstrap_module: function() {
          // popover
          $('[data-toggle="popover"]').popover();
          
          // tooltips
          $('[data-toggle="tooltip"]').tooltip();
      
          // scrollspy
          $('body').scrollspy({ target: '#navbar-scroll' });
          $('main').scrollspy({ target: '#main-scroll' });
      },
      /**
      * ------------------------------------------------------------------------
      * Custom JS function
      * ------------------------------------------------------------------------
      */
      Custom: function () {
          // Insert your custom javascript in here
      }
    };
  
    $(document).ready(function () {
      bn.Launch();
    });
})(jQuery);