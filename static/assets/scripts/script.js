// (function($) {

const $body = $('body');
const $nav = $('.site-nav');


// Main nav

// Open and close main navigation
const toggleNav = () => {
  if ($body.hasClass('nav-open')) {
    $body.removeClass('nav-open');
  } else {
    $body.addClass('nav-open');
  }
}

const resetNav = () => {
  $body.removeClass('nav-open');
}


$(document).ready(function() {

  // Responsive videos
  if ($body.hasClass('media')) {
    $(".video").fitVids();
  }

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