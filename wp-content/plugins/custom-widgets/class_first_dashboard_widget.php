<?php

/**
 * Plugin Name: First Dashboard Widget
 * Plugin URI: http://wp-local.com/
 * Description: This is the very first plugin I ever created.
 * Version: 1.0
 * Author: HieuPT
 * Author URI: http://wp-local.com/
 **/

add_action( 'wp_dashboard_setup', 'register_first_custom_dashboard_widget' );
function register_first_custom_dashboard_widget() {
    wp_add_dashboard_widget(
        'my_first_custom_dashboard_widget',
        'My Custom Dashboard Widget',
        'my_first_custom_dashboard_widget_display'
    );
}

function my_first_custom_dashboard_widget_display() {
    echo 'Hello, I am Mr. Widget';
}