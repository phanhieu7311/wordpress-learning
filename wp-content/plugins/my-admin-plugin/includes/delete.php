<?php
function my_delete_user_menu() {
    add_submenu_page(
        null,
        'Delete user',
        'Delete user',
        'manage_options',
        'delete-user-page',
        'my_delete_user_contents'
    );
}

add_action( 'admin_menu', 'my_delete_user_menu' );
function my_delete_user_contents() {
    global $wpdb;

    $id = $_REQUEST['id'] ?? '';

    if (!check_admin_referer('delete_user_' . $_REQUEST['id'])) {
        echo 'yêu cầu không hợp lệ';
        die();
    }

    $wpdb->delete($wpdb->users, ['id' => $id]);
    header("Location: /wp-admin/admin.php?page=first-admin-page");
}