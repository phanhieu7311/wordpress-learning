( function( window, document ) {
  function shopping_cart_woocommerce_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const shopping_cart_woocommerce_nav = document.querySelector( '.sidenav' );
      if ( ! shopping_cart_woocommerce_nav || ! shopping_cart_woocommerce_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...shopping_cart_woocommerce_nav.querySelectorAll( 'input, a, button' )],
        shopping_cart_woocommerce_lastEl = elements[ elements.length - 1 ],
        shopping_cart_woocommerce_firstEl = elements[0],
        shopping_cart_woocommerce_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && shopping_cart_woocommerce_lastEl === shopping_cart_woocommerce_activeEl ) {
        e.preventDefault();
        shopping_cart_woocommerce_firstEl.focus();
      }
      if ( shiftKey && tabKey && shopping_cart_woocommerce_firstEl === shopping_cart_woocommerce_activeEl ) {
        e.preventDefault();
        shopping_cart_woocommerce_lastEl.focus();
      }
    } );
  }
  shopping_cart_woocommerce_keepFocusInMenu();
} )( window, document );