<?php
// List Users
function my_first_admin_menu() {
    add_menu_page(
        'List users',
        'List users',
        'manage_options',
        'first-admin-page',
        'my_first_admin_contents',
        'dashicons-schedule',
        null
    );
}

add_action( 'admin_menu', 'my_first_admin_menu' );
function my_first_admin_contents() {
    ?>
    <h1>
        <?php esc_html_e( 'List users', 'my-plugin-textdomain' ); ?>
    </h1>

    <?php
    $no = 2;// total no of author to display

    $paged = $_REQUEST['paged'] ?? 1;
    if($paged == 1){
        $offset = 0;
    }else {
        $offset = ($paged - 1) * $no;
    }

    $user_query = new WP_User_Query( array('number' => $no, 'offset' => $offset ) );
    if ( ! empty( $user_query->results ) ) {
        ?>

        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Username nicename</th>
                <th>Email</th>
                <th>Registered time</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ( $user_query->results as $user ) {
                ?>
                <tr>
                    <td><?php echo $user->ID ?></td>
                    <td><?php echo $user->user_login ?></td>
                    <td><?php echo $user->user_nicename ?></td>
                    <td><?php echo $user->user_email ?></td>
                    <td><?php echo $user->user_registered ?></td>
                    <td><a href="/wp-admin/admin.php?page=edit-user-page&id=<?php echo $user->ID ?>">Edit</a></td>
                    <td><a href="<?php echo wp_nonce_url('/wp-admin/admin.php?page=delete-user-page&id=' . $user->ID, 'delete_user_' . $user->ID)?>">Delete</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } else {
        echo 'No users found.';
    }

    $total_user = $user_query->total_users;
    $total_pages=ceil($total_user/$no);

    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '&paged=%#%',
        'current' => $paged,
        'total' => $total_pages,
        'prev_text' => 'Previous',
        'next_text' => 'Next',
        'type'     => 'list',
    ));
}
?>