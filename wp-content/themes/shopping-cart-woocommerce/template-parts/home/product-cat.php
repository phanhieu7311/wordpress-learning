<?php
/**
 * Template part for displaying categories
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */

?>

<div class="cat-sidebar">
    <?php if(class_exists('woocommerce')){ ?>  
        <div class="product_cat">
            <span><?php esc_html_e('ALL CATEGORIES','shopping-cart-woocommerce'); ?></span><span><i class="fas fa-angle-down"></i></span>
        </div>
        <?php
            $taxonomy     = 'product_cat';
            $orderby      = 'name';
            $show_count   = 0;      // 1 for yes, 0 for no
            $pad_counts   = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;      // 1 for yes, 0 for no
            $title        = '';
            $empty        = 0;

            $shopping_cart_woocommerce_args = array(
                'taxonomy'     => $taxonomy,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
            );
            $all_categories = get_categories( $shopping_cart_woocommerce_args );
                foreach ($all_categories as $cat) {
                if($cat->category_parent == 0) {
                $category_id = $cat->term_id;
                    echo '<p class="mb-0"><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'<i class="fas fa-long-arrow-alt-right"></i></a></p>';

                    $shopping_cart_woocommerce_args2 = array(
                            'taxonomy'     => $taxonomy,
                            'child_of'     => 0,
                            'parent'       => $category_id,
                            'orderby'      => $orderby,
                            'show_count'   => $show_count,
                            'pad_counts'   => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li'     => $title,
                            'hide_empty'   => $empty
                    );
                    $shopping_cart_woocommerce_sub_cats = get_categories( $shopping_cart_woocommerce_args2 );
                    if($shopping_cart_woocommerce_sub_cats) {
                        foreach($shopping_cart_woocommerce_sub_cats as $sub_category) {
                            echo  $sub_category->name ;
                        }
                    }
                }
            }
        ?>
    <?php } ?>
</div>