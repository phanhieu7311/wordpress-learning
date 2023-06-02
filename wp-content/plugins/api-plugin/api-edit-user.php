<?php
function update_user(WP_REST_Request $request) {
    global $wpdb;

    $id = $request['id'] ?? '';
    $username = $request['username'] ?? '';
    $password = $request['password'] ?? '';

    $wpdb->update($wpdb->users, ['user_nicename' => $username, 'user_pass' => $password], ['id' => $id]);
    return new WP_REST_Response([
        'code' => 200,
        'message' => 'Success',
        'data' => null
    ]);
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'myplugin/v1', '/user/edit', array(
        'methods' => 'POST',
        'callback' => 'update_user',
        'permission_callback' => '__return_true'
    ) );
} );