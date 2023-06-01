<?php

get_template_part('../shopping-cart-woocommerce/sidebar');
?>

<aside id="theme-sidebar" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar1', 'shopping-cart-woocommerce' ); ?>">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
