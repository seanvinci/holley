// (function($) {

const $window = $('window');
const $body = $('body');
const $nav = $('.site-nav');


// Main nav

// Open and close main navigation
const toggleNav = () => {
  if ($body.hasClass('nav-open')) {
    $body.removeClass('nav-open no-scroll');
  } else {
    $body.addClass('nav-open no-scroll');
  }
}

const resetNav = () => {
  $body.removeClass('nav-open no-scroll');
}


// Smooth scrolling function for all hash links
function smoothScroll() {
  $('a[href*=\\#]:not([href=\\#])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 500);
        return false;
      }
    }
  });
}


// Execute on page load
$body.removeClass('preload');
smoothScroll();


// Execute functions after load
$window.on('load', function() {

  smoothScroll();

});


// Execute scrolling functions
// $window.on('scroll touchmove', function() {


// });


$(document).ready(function() {

  // Responsive videos
  // $(".video").fitVids();

  // Header Navigation

  // Open or close navigation when hamburger is clicked
  $('.site-nav-button').on('click', () => {
    toggleNav();
  });

  // Close navigation when ESC key is used
  $(document).on('keyup', (e) => {
    if (e.keyCode == 27) {
      resetNav();
    }
  });

  // Close navigation when anywhere in the webpage is clicked...
  $('.site-nav-container').on('click', () => {
    resetNav();
  });

});

// });