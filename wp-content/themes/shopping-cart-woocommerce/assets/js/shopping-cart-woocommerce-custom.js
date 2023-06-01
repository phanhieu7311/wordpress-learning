/**
  * Theme Js file.
**/

jQuery(function($){
  "use strict";

  jQuery('.search-box button').click(function(){
    jQuery(".search_outer").toggle();
  });

  jQuery('.search_inner input.search-field').on('keydown', function (e) {
    if (jQuery("this:focus") && (e.which === 9)) {
      e.preventDefault();
      jQuery(this).blur();
      jQuery('.search_inner button.search-submit').focus();
    }
  });

  jQuery('.search_inner .search-submit').on('keydown', function (e) {
    if (jQuery("this:focus") && (e.which === 9)) {
      e.preventDefault();
      jQuery(this).blur();
      jQuery('button.search_btn').focus();
    }
  });
});

// ===== Mobile responsive Menu ====

function shopping_cart_woocommerce_menu_open_nav() {
  jQuery(".sidenav").addClass('open');
}
function shopping_cart_woocommerce_menu_close_nav() {
  jQuery(".sidenav").removeClass('open');
}