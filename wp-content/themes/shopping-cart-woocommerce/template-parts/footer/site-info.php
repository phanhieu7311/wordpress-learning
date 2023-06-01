<?php
/**
 * Displays footer site info
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */

?>

<div class="site-info">
	<div class="container">
		<p><?php shopping_cart_woocommerce_credit();?> <?php echo esc_html(get_theme_mod('shopping_cart_woocommerce_footer_text',__('By Themespride','shopping-cart-woocommerce'))); ?></p>
	</div>
</div>
