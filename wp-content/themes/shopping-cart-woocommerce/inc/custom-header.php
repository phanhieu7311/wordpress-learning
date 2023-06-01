<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */

function shopping_cart_woocommerce_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'shopping_cart_woocommerce_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'shopping_cart_woocommerce_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'shopping_cart_woocommerce_custom_header_setup' );

if ( ! function_exists( 'shopping_cart_woocommerce_header_style' ) ) :
add_action( 'wp_enqueue_scripts', 'shopping_cart_woocommerce_header_style' );
function shopping_cart_woocommerce_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .header-box{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'shopping-cart-woocommerce-style', $custom_css );
	endif;
}
endif;