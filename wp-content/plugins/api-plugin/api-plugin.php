<?php
/**
 * Plugin Name: API Plugin
 * Plugin URI: http://wp-local.com/
 * Description: This is the very first plugin I ever created.
 * Version: 1.0
 * Author: HieuPT
 * Author URI: http://wp-local.com/
 **/

// API get list product
function list_product(WP_REST_Request $request) {
    global $wpdb;

    $orderBy = $request['order_by'] ?? 'post_date';
    $sort = $request['sort'] ?? 'desc';
    $limit = $request['limit'] ?? 10;

    $sql = $wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_type = 'product' AND post_status = 'publish' 
                ORDER BY {$orderBy} {$sort} LIMIT %d", $limit);
    $products = $wpdb->get_results($sql);

    if ( empty( $products ) ) {
        return null;
    }

    return $products;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'myplugin/v1', '/product/list', array(
        'methods' => 'GET',
        'callback' => 'list_product',
        'permission_callback' => '__return_true',
    ) );
} );


// API test form
function test_form(WP_REST_Request $request) {
    global $wpdb;
    $username = $request['uname'] ?? '';
    $password = $request['password'] ?? '';

    $wpdb->insert( $wpdb->users, [
        'user_login' => $username,
        'user_pass' => $password,
        'user_nicename' => $username,
        'user_email' => $username,
        'display_name' => $username
    ]);

    // Create the response object
    $response = new WP_REST_Response([
        'code' => 200,
        'message' => 'Success',
        'data' => null
    ]);
    return $response;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'myplugin/v1', '/test-form', array(
        'methods' => 'POST',
        'callback' => 'test_form',
        'args' => [
            'uname' => [
                'validate_callback' => 'is_required'
            ],
            'password' => [
                'validate_callback' => 'is_required'
            ],
            'cpassword' => [
                'validate_callback' => function($param, $request, $key) {
                    if (!is_required($param, $request, $key)) {
                        return false;
                    }
                    if ($param != $request['password']) {
                        return false;
                    }
                    return true;
                }
            ]
        ],
        'permission_callback' => function () {
            return true;
        }
    ) );
} );

function is_required($param, $request, $key)
{
    return !empty($param);
}