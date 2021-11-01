require('./bootstrap');

// Register $ global var for jQuery
import $ from 'jquery';
window.$ = window.jQuery = $;


var waitForEl = function(selector, callback) {
    
  if (jQuery(selector).length) {
    callback();
  } else {
    setTimeout(function() {
      waitForEl(selector, callback);
    }, 100);
  }
};

waitForEl("#g-recaptcha-response", function() {
  document.getElementById('g-recaptcha-response').required = true;
  // scan für andere
  jQuery('#g-recaptcha-response').each(function( index ) {
    $( this ).prop('required', true);
    $( this ).addClass('ajax-field');
  });
});

waitForEl(".g-recaptcha-response", function() {
  jQuery('.g-recaptcha-response').each(function( index ) {
    $( this ).prop('required', true);
    $( this ).addClass('ajax-field');
  });
});




require('@fancyapps/fancybox');
require('smooth-scroll');
require('simplebar');
require('list.js');
require('jarallax');
require('highlightjs');
require('../theme/src/assets/js/card');
require('../theme/src/assets/js/collapse');
require('../theme/src/assets/js/countdown');
require('../theme/src/assets/js/dropdown');
require('../theme/src/assets/js/form');
require('../theme/src/assets/js/highlight');
require('../theme/src/assets/js/img-comp');
require('../theme/src/assets/js/list');
require('../theme/src/assets/js/map');
require('../theme/src/assets/js/navbar');
require('../theme/src/assets/js/popover');
require('../theme/src/assets/js/rating');
require('../theme/src/assets/js/simplebar');
require('../theme/src/assets/js/smooth-scroll');
require('../theme/src/assets/js/theme');
require('../theme/src/assets/js/tooltip');
require('../theme/src/assets/js/vote');