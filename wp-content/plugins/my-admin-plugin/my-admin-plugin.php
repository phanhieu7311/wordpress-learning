<?php
/**
 * Plugin Name: My Admin Plugin
 * Plugin URI:http://wp-local.com
 * Description: This is the very first plugin I ever created.
 * Version: 1.0
 * Author: HieuPT
 * Author URI: http://wp-local.com/
 **/

function my_admin_menu() {
    add_menu_page(
        'My admin page',
        'My admin page',
        'manage_options',
        'sample-page',
        'my_admin_page_contents',
        'dashicons-schedule',
        null
    );
}

add_action( 'admin_menu', 'my_admin_menu' );
function my_admin_page_contents() {
    ?>
    <h1>
        <?php esc_html_e( 'Welcome to my custom admin page.', 'my-plugin-textdomain' ); ?>
    </h1>

    <form action="/wp-json/myplugin/v1/test-form" method="post">
        <label for="fname">Username:</label><br/>
        <input id="uname" name="uname" type="text" /><br/>
        <label for="lname">Password:</label><br/>
        <input id="password" name="password" type="text" /><br/>
        <label for="lname">Confirm password:</label><br/>
        <input id="cpassword" name="cpassword" type="text" /><br/>
        <input type="submit" value="Register" />
    </form>
    <?php
}