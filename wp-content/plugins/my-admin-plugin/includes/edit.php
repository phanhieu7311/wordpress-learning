<?php
function my_process_edit_user_menu() {
    add_submenu_page(
        null,
        'Process edit user',
        'Process edit user',
        'manage_options',
        'process-edit-user-page',
        'my_process_edit_user_contents'
    );
}

add_action( 'admin_menu', 'my_process_edit_user_menu' );
function my_process_edit_user_contents() {
    global $wpdb;

    $id = $_REQUEST['id'] ?? '';
    $username = $_REQUEST['username'] ?? '';
    $email = $_REQUEST['email'] ?? '';

    if (!check_admin_referer('edit_user_' . $_REQUEST['id'])) {
        echo 'yêu cầu không hợp lệ';
        die();
    }
    $wpdb->update($wpdb->users, ['user_nicename' => $username, 'user_email' => $email], ['id' => $id]);
    header("Location: /wp-admin/admin.php?page=first-admin-page");
}