<?php
/**
 * Shopping Cart Woocommerce: Customizer
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shopping_cart_woocommerce_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'shopping_cart_woocommerce_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'shopping-cart-woocommerce' ),
	    'description' => __( 'Description of what this panel does.', 'shopping-cart-woocommerce' ),
	) );

	//Sidebar Position
	$wp_customize->add_section('shopping_cart_woocommerce_tp_general_settings',array(
        'title' => __('TP General Option', 'shopping-cart-woocommerce'),
        'priority' => 2,
        'panel' => 'shopping_cart_woocommerce_panel_id'
    ) );

 	$wp_customize->add_setting('shopping_cart_woocommerce_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
 	$wp_customize->add_control('shopping_cart_woocommerce_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'shopping-cart-woocommerce'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'shopping-cart-woocommerce'),
		'section' => 'shopping_cart_woocommerce_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','shopping-cart-woocommerce'),
		'Container' => __('Container','shopping-cart-woocommerce'),
		'Container Fluid' => __('Container Fluid','shopping-cart-woocommerce')
		),
	) );

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('shopping_cart_woocommerce_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Sidebar Position', 'shopping-cart-woocommerce'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'shopping-cart-woocommerce'),
     'section' => 'shopping_cart_woocommerce_tp_general_settings',
     'choices' => array(
         'full' => __('Full','shopping-cart-woocommerce'),
         'left' => __('Left','shopping-cart-woocommerce'),
         'right' => __('Right','shopping-cart-woocommerce'),
         'three-column' => __('Three Columns','shopping-cart-woocommerce'),
         'four-column' => __('Four Columns','shopping-cart-woocommerce'),
         'grid' => __('Grid Layout','shopping-cart-woocommerce')
     ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('shopping_cart_woocommerce_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'shopping-cart-woocommerce'),
     'description'   => __('This option work for pages.', 'shopping-cart-woocommerce'),
     'section' => 'shopping_cart_woocommerce_tp_general_settings',
     'choices' => array(
         'full' => __('Full','shopping-cart-woocommerce'),
         'left' => __('Left','shopping-cart-woocommerce'),
         'right' => __('Right','shopping-cart-woocommerce')
     ),
	) );

	$wp_customize->add_setting('shopping_cart_woocommerce_preloader_show_hide',array(
		'default' => false,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
	));
 	$wp_customize->add_control('shopping_cart_woocommerce_preloader_show_hide',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Preloader Option','shopping-cart-woocommerce'),
		'section' => 'shopping_cart_woocommerce_tp_general_settings',
	));

	//TP Blog Option
	$wp_customize->add_section('shopping_cart_woocommerce_blog_option',array(
		'title' => __('TP Blog Option', 'shopping-cart-woocommerce'),
		'priority' => 1,
		'panel' => 'shopping_cart_woocommerce_panel_id'
	) );

    $wp_customize->add_setting('shopping_cart_woocommerce_remove_date',array(
       'default' => true,
       'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('shopping_cart_woocommerce_remove_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date Option','shopping-cart-woocommerce'),
       'section' => 'shopping_cart_woocommerce_blog_option',
    ));

    $wp_customize->add_setting('shopping_cart_woocommerce_remove_author',array(
       'default' => true,
       'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('shopping_cart_woocommerce_remove_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author Option','shopping-cart-woocommerce'),
       'section' => 'shopping_cart_woocommerce_blog_option',
    ));

    $wp_customize->add_setting('shopping_cart_woocommerce_remove_comments',array(
       'default' => true,
       'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('shopping_cart_woocommerce_remove_comments',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comment Option','shopping-cart-woocommerce'),
       'section' => 'shopping_cart_woocommerce_blog_option',
    ));

    $wp_customize->add_setting('shopping_cart_woocommerce_remove_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('shopping_cart_woocommerce_remove_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tags Option','shopping-cart-woocommerce'),
       'section' => 'shopping_cart_woocommerce_blog_option',
    ));

    $wp_customize->add_setting('shopping_cart_woocommerce_remove_read_button',array(
       'default' => true,
       'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('shopping_cart_woocommerce_remove_read_button',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Read More Button','shopping-cart-woocommerce'),
       'section' => 'shopping_cart_woocommerce_blog_option',
    ));

    $wp_customize->add_setting('shopping_cart_woocommerce_read_more_text',array(
		'default'=> __('Read More','shopping-cart-woocommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_read_more_text',array(
		'label'	=> __('Edit Button Text','shopping-cart-woocommerce'),
		'section'=> 'shopping_cart_woocommerce_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'shopping_cart_woocommerce_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'shopping_cart_woocommerce_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'shopping_cart_woocommerce_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Top Bar
	$wp_customize->add_section( 'shopping_cart_woocommerce_topbar', array(
    	'title'      => __( 'Header Details', 'shopping-cart-woocommerce' ),
    	'priority' => 4,
    	'description' => __( 'Add your contact details', 'shopping-cart-woocommerce' ),
		'panel' => 'shopping_cart_woocommerce_panel_id'
	) );

	$wp_customize->add_setting('shopping_cart_woocommerce_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_topbar_text',array(
		'label'	=> __('Topbar Text','shopping-cart-woocommerce'),
		'section'=> 'shopping_cart_woocommerce_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_topbar_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_topbar_button_text',array(
		'label'	=> __('Add Button Text','shopping-cart-woocommerce'),
		'section'=> 'shopping_cart_woocommerce_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_topbar_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_topbar_button_link',array(
		'label'	=> __('Add Button Link','shopping-cart-woocommerce'),
		'section'=> 'shopping_cart_woocommerce_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_about_us_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_about_us_text',array(
		'label'	=> __('My About Us Text','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_about_us_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_about_us_link',array(
		'label'	=> __('My About Us Page Link','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_my_account_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_my_account_text',array(
		'label'	=> __('My Account Text','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_my_account_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_my_account_link',array(
		'label'	=> __('My Account Page Link','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_wishlist_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_wishlist_text',array(
		'label'	=> __('My Wishlist Text','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_wishlist_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_wishlist_link',array(
		'label'	=> __('My Wishlist Page Link','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_checkout_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_checkout_text',array(
		'label'	=> __('My Checkout Text','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_checkout_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_checkout_link',array(
		'label'	=> __('My Checkout Page Link','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_phone_number_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_phone_number'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_phone_number_text',array(
		'label'	=> __('Add Phone Number','shopping-cart-woocommerce'),
		'section'=> 'shopping_cart_woocommerce_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_search_icon',array(
		'default' => false,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
	));
 	$wp_customize->add_control('shopping_cart_woocommerce_search_icon',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Search Option','shopping-cart-woocommerce'),
		'section' => 'shopping_cart_woocommerce_topbar',
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_user_icon',array(
		'default' => false,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
	));
 	$wp_customize->add_control('shopping_cart_woocommerce_user_icon',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide User Option','shopping-cart-woocommerce'),
		'section' => 'shopping_cart_woocommerce_topbar',
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_cart_icon',array(
		'default' => false,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
	));
 	$wp_customize->add_control('shopping_cart_woocommerce_cart_icon',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Cart Option','shopping-cart-woocommerce'),
		'section' => 'shopping_cart_woocommerce_topbar',
	));

	//home page slider
	$wp_customize->add_section( 'shopping_cart_woocommerce_slider_section' , array(
    	'title'      => __( 'Slider Section', 'shopping-cart-woocommerce' ),
    	'priority' => 6,
		'panel' => 'shopping_cart_woocommerce_panel_id'
	) );

	$wp_customize->add_setting('shopping_cart_woocommerce_slider_arrows',array(
		'default' => false,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_slider_arrows',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide slider','shopping-cart-woocommerce'),
		'section' => 'shopping_cart_woocommerce_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'shopping_cart_woocommerce_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'shopping_cart_woocommerce_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'shopping-cart-woocommerce' ),
			'description' => __('Image Size ( 1835 x 700 ) px','shopping-cart-woocommerce'),
			'section'  => 'shopping_cart_woocommerce_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	// Service Fields
    $wp_customize->add_section('shopping_cart_woocommerce_services_fields_section',array(
        'title' => __('Our Services','shopping-cart-woocommerce'),
        'description'   => __('Our Services Sections','shopping-cart-woocommerce'),
        'panel' => 'shopping_cart_woocommerce_panel_id',
        'priority' => 10,
    ));

	for ($i=1; $i <=4 ; $i++) {

        $wp_customize->add_setting('shopping_cart_woocommerce_services_fields_icon'.$i,array(
            'default' => '',
            'sanitize_callback'   => 'sanitize_text_field',
        ));
        $wp_customize->add_control('shopping_cart_woocommerce_services_fields_icon'.$i,array(
            'label' => __('Service Icon','shopping-cart-woocommerce'),
            'section' => 'shopping_cart_woocommerce_services_fields_section',
            'type'  => 'text'
        ));

        $wp_customize->add_setting('shopping_cart_woocommerce_services_fields_heading'.$i,array(
            'default' => '',
            'sanitize_callback'   => 'sanitize_text_field',
        ));
        $wp_customize->add_control('shopping_cart_woocommerce_services_fields_heading'.$i,array(
            'label' => __('Service Name','shopping-cart-woocommerce'),
            'section' => 'shopping_cart_woocommerce_services_fields_section',
            'type'  => 'text'
        ));

        $wp_customize->add_setting('shopping_cart_woocommerce_services_fields_text'.$i,array(
            'default'  => '',
            'sanitize_callback'    => 'sanitize_text_field',
        ));
        $wp_customize->add_control('shopping_cart_woocommerce_services_fields_text'.$i,array(
            'label' => __('Service Description','shopping-cart-woocommerce'),
            'section' => 'shopping_cart_woocommerce_services_fields_section',
            'type' => 'text'
        ));
    }

	// Product Section
	$wp_customize->add_section( 'shopping_cart_woocommerce_product_section' , array(
    	'title'      => __( 'Product Section', 'shopping-cart-woocommerce' ),
    	'priority' => 11,
		'panel' => 'shopping_cart_woocommerce_panel_id'
	) );

	$shopping_cart_woocommerce_args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'term_group',
	'order'                    => 'ASC',
	'hide_empty'               => false,
	'hierarchical'             => 1,
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false
	);
	$categories = get_categories( $shopping_cart_woocommerce_args );
	$shopping_cart_woocommerce_cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
				$default = $category->slug;
				$i++;
		}
		$shopping_cart_woocommerce_cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('shopping_cart_woocommerce_recent_product_category',array(
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_select',
	));
	$wp_customize->add_control('shopping_cart_woocommerce_recent_product_category',array(
		'type'    => 'select',
		'choices' => $shopping_cart_woocommerce_cats,
		'label' => __('Select Product Category','shopping-cart-woocommerce'),
		'section' => 'shopping_cart_woocommerce_product_section',
	));

	//footer
	$wp_customize->add_section('shopping_cart_woocommerce_footer_section',array(
		'title'	=> __('Footer Text','shopping-cart-woocommerce'),
		'description'	=> __('Add copyright text.','shopping-cart-woocommerce'),
		'panel' => 'shopping_cart_woocommerce_panel_id'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_footer_text',array(
		'label'	=> __('Copyright Text','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_return_to_header',array(
		'default' => true,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_return_to_header',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Return to header','shopping-cart-woocommerce'),
		'section' => 'shopping_cart_woocommerce_footer_section',
	));

   // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('shopping_cart_woocommerce_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_scroll_top_position',array(
     'type' => 'radio',
     'label'     => __('Scroll to top Position', 'shopping-cart-woocommerce'),
     'description'   => __('This option work for scroll to top', 'shopping-cart-woocommerce'),
     'section' => 'shopping_cart_woocommerce_footer_section',
     'choices' => array(
         'Right' => __('Right','shopping-cart-woocommerce'),
         'Left' => __('Left','shopping-cart-woocommerce'),
         'Center' => __('Center','shopping-cart-woocommerce')
     ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'shopping_cart_woocommerce_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'shopping_cart_woocommerce_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting('shopping_cart_woocommerce_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('shopping_cart_woocommerce_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','shopping-cart-woocommerce'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('shopping_cart_woocommerce_site_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('shopping_cart_woocommerce_site_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tagline','shopping-cart-woocommerce'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('shopping_cart_woocommerce_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_number_absint'
	));
	 $wp_customize->add_control('shopping_cart_woocommerce_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','shopping-cart-woocommerce'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_logo_settings',array(
		'default' => 'Different Line',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
   $wp_customize->add_control('shopping_cart_woocommerce_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'shopping-cart-woocommerce'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'shopping-cart-woocommerce'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','shopping-cart-woocommerce'),
            'Same Line' => __('Same Line','shopping-cart-woocommerce')
        ),
	) );

	$wp_customize->add_setting('shopping_cart_woocommerce_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_number_absint'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_per_columns',array(
		'label'	=> __('Product Per Row','shopping-cart-woocommerce'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_number_absint'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_product_per_page',array(
		'label'	=> __('Product Per Page','shopping-cart-woocommerce'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

    $wp_customize->add_setting('shopping_cart_woocommerce_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('shopping_cart_woocommerce_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Shop page sidebar','shopping-cart-woocommerce'),
       'section' => 'woocommerce_product_catalog',
    ));

    $wp_customize->add_setting('shopping_cart_woocommerce_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('shopping_cart_woocommerce_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product page sidebar','shopping-cart-woocommerce'),
       'section' => 'woocommerce_product_catalog',
    ));
}
add_action( 'customize_register', 'shopping_cart_woocommerce_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Shopping Cart Woocommerce 1.0
 * @see shopping_cart_woocommerce_customize_register()
 *
 * @return void
 */
function shopping_cart_woocommerce_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Shopping Cart Woocommerce 1.0
 * @see shopping_cart_woocommerce_customize_register()
 *
 * @return void
 */
function shopping_cart_woocommerce_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_PRO_THEME_NAME' ) ) {
	define( 'SHOPPING_CART_WOOCOMMERCE_PRO_THEME_NAME', esc_html__( 'Shopping Cart Pro', 'shopping-cart-woocommerce' ));
}
if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_PRO_THEME_URL' ) ) {
	define( 'SHOPPING_CART_WOOCOMMERCE_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/wordpress-shopping-theme/'));
}


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Shopping_Cart_Woocommerce_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Shopping_Cart_Woocommerce_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Shopping_Cart_Woocommerce_Customize_Section_Pro(
				$manager,
				'shopping_cart_woocommerce_section_pro',
				array(
					'priority'   => 9,
					'title'    => SHOPPING_CART_WOOCOMMERCE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'shopping-cart-woocommerce' ),
					'pro_url'  => esc_url( SHOPPING_CART_WOOCOMMERCE_PRO_THEME_URL, 'shopping-cart-woocommerce' ),
				)
			)
		);

		// Register sections.
	$manager->add_section(
		new Shopping_Cart_Woocommerce_Customize_Section_Pro(
			$manager,
			'shopping_cart_woocommerce_documentation',
			array(
				'priority'   => 500,
				'title'    => esc_html__( 'Theme Documentation', 'shopping-cart-woocommerce' ),
				'pro_text' => esc_html__( 'Click Here', 'shopping-cart-woocommerce' ),
				'pro_url'  => esc_url( SHOPPING_CART_WOOCOMMERCE_DOCS_URL, 'shopping-cart-woocommerce'),
			)
		)
	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'shopping-cart-woocommerce-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'shopping-cart-woocommerce-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Shopping_Cart_Woocommerce_Customize::get_instance();
