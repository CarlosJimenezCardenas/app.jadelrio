;(function( window, document, $, undefined ) {
  "use strict";

  // Menu Toggle
  (function() {
    $(function() {

      var $toggle = $(".js-smm-toggle");
      var $container = $(".js-smm-container");

      if( ! $toggle.length || ! $container.length ) return;

      $toggle.click(function() {
        $toggle.toggleClass("smm__toggle--open2");
        $container.toggleClass("smm__container--open2");
      });
    });
  })();

})( window, document, jQuery );