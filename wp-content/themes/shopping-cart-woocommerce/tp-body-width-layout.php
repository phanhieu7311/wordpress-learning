<?php

	$shopping_cart_woocommerce_tp_theme_css = "";

	$shopping_cart_woocommerce_theme_lay = get_theme_mod( 'shopping_cart_woocommerce_tp_body_layout_settings','Full');
    if($shopping_cart_woocommerce_theme_lay == 'Container'){
		$shopping_cart_woocommerce_tp_theme_css .='body{';
			$shopping_cart_woocommerce_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$shopping_cart_woocommerce_tp_theme_css .='}';
		$shopping_cart_woocommerce_tp_theme_css .='.page-template-front-page .menubar{';
			$shopping_cart_woocommerce_tp_theme_css .='position: static;';
		$shopping_cart_woocommerce_tp_theme_css .='}';
		$shopping_cart_woocommerce_tp_theme_css .='.scrolled{';
			$shopping_cart_woocommerce_tp_theme_css .='width: auto; left:0; right:0;';
		$shopping_cart_woocommerce_tp_theme_css .='}';
	}else if($shopping_cart_woocommerce_theme_lay == 'Container Fluid'){
		$shopping_cart_woocommerce_tp_theme_css .='body{';
			$shopping_cart_woocommerce_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$shopping_cart_woocommerce_tp_theme_css .='}';
		$shopping_cart_woocommerce_tp_theme_css .='.page-template-front-page .menubar{';
			$shopping_cart_woocommerce_tp_theme_css .='width: 99%';
		$shopping_cart_woocommerce_tp_theme_css .='}';		
		$shopping_cart_woocommerce_tp_theme_css .='.scrolled{';
			$shopping_cart_woocommerce_tp_theme_css .='width: auto; left:0; right:0;';
		$shopping_cart_woocommerce_tp_theme_css .='}';
	}else if($shopping_cart_woocommerce_theme_lay == 'Full'){
		$shopping_cart_woocommerce_tp_theme_css .='body{';
			$shopping_cart_woocommerce_tp_theme_css .='max-width: 100%;';
		$shopping_cart_woocommerce_tp_theme_css .='}';
	}

    $shopping_cart_woocommerce_scroll_position = get_theme_mod( 'shopping_cart_woocommerce_scroll_top_position','Right');
    if($shopping_cart_woocommerce_scroll_position == 'Right'){
        $shopping_cart_woocommerce_tp_theme_css .='#return-to-top{';
            $shopping_cart_woocommerce_tp_theme_css .='right: 20px;';
        $shopping_cart_woocommerce_tp_theme_css .='}';
    }else if($shopping_cart_woocommerce_scroll_position == 'Left'){
        $shopping_cart_woocommerce_tp_theme_css .='#return-to-top{';
            $shopping_cart_woocommerce_tp_theme_css .='left: 20px;';
        $shopping_cart_woocommerce_tp_theme_css .='}';
    }else if($shopping_cart_woocommerce_scroll_position == 'Center'){
        $shopping_cart_woocommerce_tp_theme_css .='#return-to-top{';
            $shopping_cart_woocommerce_tp_theme_css .='right: 50%;left: 50%;';
        $shopping_cart_woocommerce_tp_theme_css .='}';
    }