<?php
// Edit user
function my_edit_user_menu() {
    add_submenu_page(
        null,
        'Edit user',
        'Edit user',
        'manage_options',
        'edit-user-page',
        'my_edit_user_contents'
    );
}

add_action( 'admin_menu', 'my_edit_user_menu' );
function my_edit_user_contents() {
    ?>
    <h1>
        <?php esc_html_e( 'Edit user', 'my-plugin-textdomain' ); ?>
    </h1>

    <form action="/wp-admin/admin.php?page=process-edit-user-page" method="POST">
        <label for="fname">Username:</label><br/>
        <input id="username" name="username" type="text" /><br/>
        <label for="lname">Email:</label><br/>
        <input id="email" name="email" type="text" /><br/>
        <input type='hidden' id="id" name="id" value="<?php echo $_REQUEST['id']?>" /><br/>
        <?php wp_nonce_field( 'edit_user_' . $_REQUEST['id'] );?>
        <input type="submit" value="Update" />
    </form>
    <?php
}
