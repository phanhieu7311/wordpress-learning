<?php
/**
 * Plugin Name: First Plugin
 * Plugin URI: http://wp-local.com/
 * Description: This is the very first plugin I ever created.
 * Version: 1.0
 * Author: HieuPT
 * Author URI: http://wp-local.com/
 **/

//add_filter( 'tutsplus_lowercase_all', 'tutsplus_lowercase_all_callback', 10, 1 );
//function tutsplus_lowercase_all_callback( $content ) {
//    return strtolower( $content );
//}
//
//add_filter( 'the_content', 'tutsplus_the_content' );
//function tutsplus_the_content( $content ) {
//    return apply_filters( 'tutsplus_lowercase_all', $content );
//}

//add_filter('init', 'console_log_init');
function console_log_init() {
    ?>
    <script>
        console.log("Hello!!!");
    </script>
    <?php
}

//add_filter( 'the_content', 'change_button' );
function change_button($content) {
    ?>
        <style>
            .wp-block-button {
                color: #0099CC; /* Text color */
                background-color: transparent; /* Remove background color */
                border: 2px solid #0099CC; /* Border thickness, line style, and color */
                border-radius: 5px; /* Adds curve to border corners */
                text-transform: uppercase; /* Make letters uppercase */
            }
        </style>
    <?php
    return $content;
}

function hook_javascript() {
    global $wpdb;
    $posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='post' ORDER BY comment_count DESC");
    $posts = get_posts(
        array(
            'post_type'      => 'post',
            'post_status'    => array(
                'publish'
            ),
        ));
    echo json_encode($posts);
}
//add_action('wp_head', 'hook_javascript');

function get_user_by_id(WP_REST_Request $request) {
    global $wpdb;
    $sql = $wpdb->prepare("SELECT * FROM $wpdb->users WHERE id = %d", $request['id']);
    $user = $wpdb->get_results($sql);

    if ( empty( $user ) ) {
        return null;
    }

    return $user;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'myplugin/v1', '/user/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_user_by_id',
        'permission_callback' => '__return_true',
    ) );
} );

function get_user_by_id_v2(WP_REST_Request $request) {
    global $wpdb;
    $sql = $wpdb->prepare("SELECT * FROM $wpdb->users WHERE id = {$request['id']}");
    $user = $wpdb->get_results($sql);

    if ( empty( $user ) ) {
        return null;
    }

    return $user;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'myplugin/v2', '/user', array(
        'methods' => 'GET',
        'callback' => 'get_user_by_id_v2',
        'permission_callback' => '__return_true',
    ) );
} );

function get_user_by_id_v3(WP_REST_Request $request) {
    global $wpdb;
    $sql = $wpdb->prepare("SELECT * FROM $wpdb->users WHERE id = {$request['id']}");
    $user = $wpdb->get_results($sql);

    if ( empty( $user ) ) {
        return null;
    }

    return $user;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'myplugin/v3', '/user', array(
        'methods' => 'POST',
        'callback' => 'get_user_by_id_v3',
        'permission_callback' => '__return_true',
    ) );
} );

function updated_page_content( $content )
{
    return '<div class="custom_class">Whatever goes inside. </div>'. $content;
}
//add_filter( 'the_content', 'updated_page_content' );
