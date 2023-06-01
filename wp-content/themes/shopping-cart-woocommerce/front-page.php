<?php
/**
 * The front page template file
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */

get_header(); ?>

<main id="tp_content" role="main">
	<div class="py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<?php get_template_part( 'template-parts/home/product-cat' ); ?>
					<?php do_action( 'shopping_cart_woocommerce_after_product-cat' ); ?>
    			</div>
				<div class="col-lg-9 col-md-9">
					<?php do_action( 'shopping_cart_woocommerce_before_slider' ); ?>

					<?php get_template_part( 'template-parts/home/slider' ); ?>
					<?php do_action( 'shopping_cart_woocommerce_after_slider' ); ?>

					<?php get_template_part( 'template-parts/home/services' ); ?>
					<?php do_action( 'shopping_cart_woocommerce_after_services' ); ?>
				</div>
			</div>
		</div>
	</div>
	<?php get_template_part( 'template-parts/home/shop-product' ); ?>
	<?php do_action( 'shopping_cart_woocommerce_after_shop-product' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'shopping_cart_woocommerce_after_home_content' ); ?>
</main>
<?php get_footer();
