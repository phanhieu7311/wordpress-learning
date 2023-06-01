<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */
?>

<aside id="theme-sidebar" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'shopping-cart-woocommerce' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>