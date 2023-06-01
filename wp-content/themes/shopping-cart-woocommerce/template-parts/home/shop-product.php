<?php
/**
 * Template part for displaying product section
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */

?>

<section id="product">
	<div class="container">
		<?php if(class_exists('woocommerce')){ ?> 
			<div class="product_kit">
	      <div class="row">
          <?php
            $shopping_cart_woocommerce_args = array(
              'post_type'      => 'product',
              'posts_per_page' => 10,
              'product_cat'    => get_theme_mod('shopping_cart_woocommerce_recent_product_category')
            );
            $loop = new WP_Query( $shopping_cart_woocommerce_args );
            while ( $loop->have_posts() ) : $loop->the_post();
						?>
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="product-box mb-4">
								 <?php
								global $product; ?>
								<div class="product-image">
									<?php echo woocommerce_get_product_thumbnail(); ?>
								</div>
								<div class="product-content p-2">
									<h3><?php echo esc_html(get_the_title()); ?></h3>
									<p class="mb-0"><?php echo $product->get_price_html(); ?></p>
								</div>
							</div>
							</div>
						<?php
							endwhile;
							wp_reset_query();
          	?>
	      </div>
			</div>
		<?php }?>
	</div>
</section>
