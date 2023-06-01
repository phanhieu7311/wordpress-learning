<?php
/**
 * Template part for displaying slider section
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */

?>

<?php if( get_theme_mod( 'shopping_cart_woocommerce_slider_arrows') != '') { ?>
  <section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $shopping_cart_woocommerce_slide_pages = array();
      for ( $count = 1; $count <= 4; $count++ ) {
        $mod = intval( get_theme_mod( 'shopping_cart_woocommerce_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $shopping_cart_woocommerce_slide_pages[] = $mod;
        }
      }
      if( !empty($shopping_cart_woocommerce_slide_pages) ) :
        $shopping_cart_woocommerce_args = array(
          'post_type' => 'page',
          'post__in' => $shopping_cart_woocommerce_slide_pages,
          'orderby' => 'post__in'
        );
        $shopping_cart_woocommerce_query = new WP_Query( $shopping_cart_woocommerce_args );
        if ( $shopping_cart_woocommerce_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $shopping_cart_woocommerce_query->have_posts() ) : $shopping_cart_woocommerce_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <div class="more-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('SHOP NOW','shopping-cart-woocommerce'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
