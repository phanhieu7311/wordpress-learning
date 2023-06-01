<?php
/*
* Display contact details
*/
?>

<div class="top-header py-2 text-center">
  <?php if( get_theme_mod( 'shopping_cart_woocommerce_topbar_text' ) != '' || get_theme_mod( 'shopping_cart_woocommerce_topbar_button_link' ) != '' || get_theme_mod( 'shopping_cart_woocommerce_topbar_button_text' ) != '') { ?>
    <p class="mb-0"><?php echo esc_html( get_theme_mod('shopping_cart_woocommerce_topbar_text','')); ?> <a href="<?php echo esc_url( get_theme_mod( 'shopping_cart_woocommerce_topbar_button_link','' ) ); ?>" class="register-btn"><?php echo esc_html( get_theme_mod( 'shopping_cart_woocommerce_topbar_button_text','' ) ); ?></a></p>
  <?php } ?>
</div>