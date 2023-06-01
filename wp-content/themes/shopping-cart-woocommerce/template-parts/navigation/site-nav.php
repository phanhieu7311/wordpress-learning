<?php
/*
* Display Theme menus
*/
?>


<div class="innermenuboxupper">
	<div class="container">
		<div class="innermenubox">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-sm-12 col-12 align-self-center">
	        <?php $shopping_cart_woocommerce_logo_settings = get_theme_mod( 'shopping_cart_woocommerce_logo_settings','Different Line');
	        if($shopping_cart_woocommerce_logo_settings == 'Different Line'){ ?>
	          <div class="logo mb-md-0 text-center text-lg-left">
	            <?php if( has_custom_logo() ) shopping_cart_woocommerce_the_custom_logo(); ?>
	            <?php if(get_theme_mod('shopping_cart_woocommerce_site_title',true) != ''){ ?>
	              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	            <?php }?>
	            <?php $description = get_bloginfo( 'description', 'display' );
	            if ( $description || is_customize_preview() ) : ?>
	              <?php if(get_theme_mod('shopping_cart_woocommerce_site_tagline',true) != ''){ ?>
	                <p class="site-description mb-0"><?php echo esc_html($description); ?></p>
	              <?php }?>
	            <?php endif; ?>
	          </div>
	        <?php }else if($shopping_cart_woocommerce_logo_settings == 'Same Line'){ ?>
	          <div class="logo logo-same-line mb-md-0 text-center text-lg-left">
	            <div class="row">
	              <div class="col-lg-5 col-md-5 align-self-md-center">
	                <?php if( has_custom_logo() ) shopping_cart_woocommerce_the_custom_logo(); ?>
	              </div>
	              <div class="col-lg-7 col-md-7 align-self-md-center">
	                <?php if(get_theme_mod('shopping_cart_woocommerce_site_title',true) != ''){ ?>
	                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	                <?php }?>
	                <?php $description = get_bloginfo( 'description', 'display' );
	                if ( $description || is_customize_preview() ) : ?>
	                  <?php if(get_theme_mod('shopping_cart_woocommerce_site_tagline',true) != ''){ ?>
	                    <p class="site-description mb-0"><?php echo esc_html($description); ?></p>
	                  <?php }?>
	                <?php endif; ?>
	              </div>
	            </div>
	          </div>
	        <?php }?>
	      </div>
				<div class="col-lg-7 col-md-2 col-sm-5 col-3 align-self-center">
					<?php if(has_nav_menu('primary-menu')){ ?>
							<div class="toggle-nav mobile-menu">
							<button onclick="shopping_cart_woocommerce_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','shopping-cart-woocommerce'); ?></span></button>
							</div>
					<?php }?>
					<div id="mySidenav" class="nav sidenav">
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'shopping-cart-woocommerce' ); ?>">
			      	<?php if(has_nav_menu('primary-menu')){
		          	wp_nav_menu( array(
	                'theme_location' => 'primary-menu',
	                'container_class' => 'main-menu clearfix' ,
	                'menu_class' => 'clearfix',
	                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
	                'fallback_cb' => 'wp_page_menu',
		          	) );
			      	} ?>
							<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="shopping_cart_woocommerce_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','shopping-cart-woocommerce'); ?></span></a>
						</nav>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-7 col-9 search-box align-self-center text-lg-right text-md-right">
					<?php if(get_theme_mod('shopping_cart_woocommerce_search_icon','') != ''){ ?>
          	<button class="search_btn"><i class="fas fa-search"></i></button>
        	<?php }?>
					<?php if(get_theme_mod('shopping_cart_woocommerce_user_icon','') != ''){ ?>
						<?php if(class_exists('woocommerce')){ ?>
							<?php if (is_user_logged_in()) : ?>
							  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-sign-out-alt"></i></a>
							<?php else : ?>
							  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="far fa-user"></i></a>
							<?php endif;?>
						<?php } ?>
					<?php }?>
					<?php if(get_theme_mod('shopping_cart_woocommerce_cart_icon','') != ''){ ?>
						<?php if(class_exists('woocommerce')){ ?>
							<span><i class="fas fa-shopping-basket"></i></span>
	              <p class="cart_no infotext mb-0">
	                <?php global $woocommerce; ?>
	                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','shopping-cart-woocommerce' ); ?>"></a>
	              </p>
	              <p class="cart-value simplep"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count()));?></p>
	        	<?php } ?>
					<?php } ?>
      </div>
    </div>
    <div class="search_outer">
      <div class="search_inner">
        <?php get_search_form(); ?>
      </div>
		</div>
			</div>
		</div>
	</div>
</div>
