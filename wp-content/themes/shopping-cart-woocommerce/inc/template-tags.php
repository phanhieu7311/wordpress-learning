<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function shopping_cart_woocommerce_categorized_blog() {
	$shopping_cart_woocommerce_category_count = get_transient( 'shopping_cart_woocommerce_categories' );

	if ( false === $shopping_cart_woocommerce_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$shopping_cart_woocommerce_category_count = count( $categories );

		set_transient( 'shopping_cart_woocommerce_categories', $shopping_cart_woocommerce_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $shopping_cart_woocommerce_category_count > 1;
}

if ( ! function_exists( 'shopping_cart_woocommerce_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since shopping_cart_woocommerce
 */
function shopping_cart_woocommerce_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in shopping_cart_woocommerce_categorized_blog.
 */
function shopping_cart_woocommerce_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'shopping_cart_woocommerce_categories' );
}
add_action( 'edit_category', 'shopping_cart_woocommerce_category_transient_flusher' );
add_action( 'save_post',     'shopping_cart_woocommerce_category_transient_flusher' );