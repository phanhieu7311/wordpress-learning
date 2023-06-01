<?php
/**
 * Shopping Cart Woocommerce Theme Page
 *
 * @package Shopping Cart Woocommerce
 */

function shopping_cart_woocommerce_admin_scripts() {
	wp_dequeue_script('jquery-superfish');
	wp_dequeue_script('shopping-cart-woocommerce-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'shopping_cart_woocommerce_admin_scripts' );

if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_FREE_THEME_URL' ) ) {
	define( 'SHOPPING_CART_WOOCOMMERCE_FREE_THEME_URL', 'https://www.themespride.com/themes/free-shopping-cart-wordpress-theme/' );
}
if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_PRO_THEME_URL' ) ) {
	define( 'SHOPPING_CART_WOOCOMMERCE_PRO_THEME_URL', 'https://www.themespride.com/themes/wordpress-shopping-theme/' );
}
if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_DEMO_THEME_URL' ) ) {
	define( 'SHOPPING_CART_WOOCOMMERCE_DEMO_THEME_URL', 'https://www.themespride.com/woocommerce-shopping-cart/' );
}
if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_DOCS_THEME_URL' ) ) {
    define( 'SHOPPING_CART_WOOCOMMERCE_DOCS_THEME_URL', 'https://themespride.com/demo/docs/woocommerce-shopping-cart/' );
}
if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_DOCS_URL' ) ) {
    define( 'SHOPPING_CART_WOOCOMMERCE_DOCS_URL', 'https://themespride.com/demo/docs/woocommerce-shopping-cart/' );
}
if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_RATE_THEME_URL' ) ) {
    define( 'SHOPPING_CART_WOOCOMMERCE_RATE_THEME_URL', 'https://wordpress.org/support/theme/shopping-cart-woocommerce/reviews/#new-post' );
}
if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_SUPPORT_THEME_URL' ) ) {
    define( 'SHOPPING_CART_WOOCOMMERCE_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/shopping-cart-woocommerce/' );
}
if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_CHANGELOG_THEME_URL' ) ) {
    define( 'SHOPPING_CART_WOOCOMMERCE_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}

/**
 * Add theme page
 */
function shopping_cart_woocommerce_menu() {
	add_theme_page( esc_html__( 'About Theme', 'shopping-cart-woocommerce' ), esc_html__( 'About Theme', 'shopping-cart-woocommerce' ), 'edit_theme_options', 'shopping-cart-woocommerce-about', 'shopping_cart_woocommerce_about_display' );
}
add_action( 'admin_menu', 'shopping_cart_woocommerce_menu' );

/**
 * Display About page
 */
function shopping_cart_woocommerce_about_display() {
	$shopping_cart_woocommerce_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $shopping_cart_woocommerce_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$shopping_cart_woocommerce_description = explode( '. ', $shopping_cart_woocommerce_theme->get( 'Description' ) );

					array_pop( $shopping_cart_woocommerce_description );

					$shopping_cart_woocommerce_description = implode( '. ', $shopping_cart_woocommerce_description );

					echo esc_html( $shopping_cart_woocommerce_description . '.' );
				?></p>
				<p class="actions">
					<a target="_blank" href="<?php echo esc_url( SHOPPING_CART_WOOCOMMERCE_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'shopping-cart-woocommerce' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( SHOPPING_CART_WOOCOMMERCE_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'shopping-cart-woocommerce' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( SHOPPING_CART_WOOCOMMERCE_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'shopping-cart-woocommerce' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( SHOPPING_CART_WOOCOMMERCE_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'shopping-cart-woocommerce' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( SHOPPING_CART_WOOCOMMERCE_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'shopping-cart-woocommerce' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $shopping_cart_woocommerce_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'shopping-cart-woocommerce' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'shopping-cart-woocommerce-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'shopping-cart-woocommerce-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'shopping-cart-woocommerce' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'shopping-cart-woocommerce-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'shopping-cart-woocommerce' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'shopping-cart-woocommerce-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'shopping-cart-woocommerce' ); ?></a>
		</nav>

		<?php
			shopping_cart_woocommerce_main_screen();

			shopping_cart_woocommerce_changelog_screen();

			shopping_cart_woocommerce_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'shopping-cart-woocommerce' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'shopping-cart-woocommerce' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'shopping-cart-woocommerce' ) : esc_html_e( 'Go to Dashboard', 'shopping-cart-woocommerce' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function shopping_cart_woocommerce_main_screen() {
	if ( isset( $_GET['page'] ) && 'shopping-cart-woocommerce-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'shopping-cart-woocommerce' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'shopping-cart-woocommerce' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'shopping-cart-woocommerce' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'shopping-cart-woocommerce' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'shopping-cart-woocommerce' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( SHOPPING_CART_WOOCOMMERCE_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'shopping-cart-woocommerce' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'shopping-cart-woocommerce' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'shopping-cart-woocommerce' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary" onclick="shopping_cart_woocommerce_text_copyied()"><?php esc_html_e( 'GETPro20', 'shopping-cart-woocommerce' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function shopping_cart_woocommerce_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'shopping-cart-woocommerce' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'shopping_cart_woocommerce_changelog_file', SHOPPING_CART_WOOCOMMERCE_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = shopping_cart_woocommerce_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function shopping_cart_woocommerce_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function shopping_cart_woocommerce_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'shopping-cart-woocommerce' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'shopping-cart-woocommerce' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'shopping-cart-woocommerce' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'shopping-cart-woocommerce' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'shopping-cart-woocommerce' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'shopping-cart-woocommerce' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'shopping-cart-woocommerce' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'shopping-cart-woocommerce' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'shopping-cart-woocommerce' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'shopping-cart-woocommerce' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'shopping-cart-woocommerce' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'shopping-cart-woocommerce' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'shopping-cart-woocommerce' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'shopping-cart-woocommerce' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'shopping-cart-woocommerce' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url(SHOPPING_CART_WOOCOMMERCE_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'shopping-cart-woocommerce' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
