<?php
/*
* Display Logo and nav
*/
?>

<div class="container">
  <div class="headerbox">
    <div class="row">
      <div class="col-lg-6 col-md-6 align-self-center text-center text-md-left">
        <?php if(get_theme_mod('shopping_cart_woocommerce_about_us_link' ) != '' || get_theme_mod('shopping_cart_woocommerce_about_us_text') != ""){?>
        <a href="<?php echo esc_url( get_theme_mod('shopping_cart_woocommerce_about_us_link','') ); ?>"> <?php echo esc_html( get_theme_mod('shopping_cart_woocommerce_about_us_text','') ); ?></a>
        <?php } ?>
        <?php if(get_theme_mod('shopping_cart_woocommerce_my_account_link' ) != '' || get_theme_mod('shopping_cart_woocommerce_my_account_text') != ""){?>
        <a href="<?php echo esc_url( get_theme_mod('shopping_cart_woocommerce_my_account_link','') ); ?>"> <?php echo esc_html( get_theme_mod('shopping_cart_woocommerce_my_account_text','') ); ?></a>
        <?php } ?>
        <?php if(get_theme_mod('shopping_cart_woocommerce_wishlist_link' ) != '' || get_theme_mod('shopping_cart_woocommerce_wishlist_text') != ""){?>
        <a href="<?php echo esc_url( get_theme_mod('shopping_cart_woocommerce_wishlist_link','') ); ?>"> <?php echo esc_html( get_theme_mod('shopping_cart_woocommerce_wishlist_text','') ); ?></a>
        <?php } ?>
        <?php if(get_theme_mod('shopping_cart_woocommerce_checkout_link' ) != '' || get_theme_mod('shopping_cart_woocommerce_checkout_text') != ""){?>
        <a href="<?php echo esc_url( get_theme_mod('shopping_cart_woocommerce_checkout_link','') ); ?>"> <?php echo esc_html( get_theme_mod('shopping_cart_woocommerce_checkout_text','') ); ?></a>
      </div>
      <?php } ?>
      <div class="col-lg-6 col-md-6 align-self-center text-center text-md-right">
        <?php if( get_theme_mod( 'shopping_cart_woocommerce_phone_number_text' ) != '') { ?>
          <p class="mb-0 phone-info"><span><i class="fas fa-phone mr-2"></i></span><span class="no-text"><?php esc_html_e('Need help? Call us: ','shopping-cart-woocommerce'); ?></span><span class="phone-no"><?php echo esc_html( get_theme_mod('shopping_cart_woocommerce_phone_number_text','')); ?></span></p>
        <?php } ?>
      </div>
    </div>
  </div>
</div>