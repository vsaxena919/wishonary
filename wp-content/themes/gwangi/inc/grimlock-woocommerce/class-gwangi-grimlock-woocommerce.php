<?php
/**
 * Gwangi_Grimlock_WooCommerce Class
 *
 * @package  gwangi
 * @author   Themosaurus
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Gwangi Grimlock Hero integration class.
 */
class Gwangi_Grimlock_WooCommerce {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		require_once get_template_directory() . '/inc/grimlock-woocommerce/customizer/class-gwangi-grimlock-woocommerce-button-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-woocommerce/customizer/class-gwangi-grimlock-woocommerce-table-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-woocommerce/customizer/class-gwangi-grimlock-woocommerce-archive-product-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-woocommerce/customizer/class-gwangi-grimlock-woocommerce-single-product-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-woocommerce/customizer/class-gwangi-grimlock-woocommerce-archive-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-woocommerce/customizer/class-gwangi-grimlock-woocommerce-global-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-woocommerce/customizer/class-gwangi-grimlock-woocommerce-navigation-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-woocommerce/customizer/class-gwangi-grimlock-woocommerce-typography-customizer.php';

		add_action( 'after_switch_theme', array( $this, 'image_dimensions' ), 10, 1 );

		// Remove some headings on WooCommerce product single post.
		add_filter( 'woocommerce_product_description_heading',            '__return_null' );
		add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );

		require_once get_template_directory() . '/inc/grimlock-woocommerce/component/class-gwangi-grimlock-woocommerce-navbar-nav-menu-component.php';

		global $grimlock_woocommerce;
		remove_action( 'grimlock_woocommerce_navbar_nav_menu', array( $grimlock_woocommerce, 'navbar_nav_menu' ), 10    );
		add_action(    'grimlock_woocommerce_navbar_nav_menu', array( $this,                 'navbar_nav_menu' ), 10, 1 );

		global $gwangi_grimlock;
		add_filter( 'grimlock_archive_product_customizer_custom_header_layout_field_args', array( $gwangi_grimlock, 'change_layout_field_args' ), 10, 2 );

	}

	/**
	 * Change catalog default image size on theme activation.
	 *
	 * @since 1.0.0
	 */
	public function image_dimensions() {
		global $pagenow;
		if ( ! isset( $_GET['activated'] ) || 'themes.php' !== $pagenow ) {
			return;
		}

		$catalog = array(
			'width'  => '400',
			'height' => '400',
			'crop'   => 1,
		);

		$single = array(
			'width'  => '650',
			'height' => '650',
			'crop'   => 1,
		);

		update_option( 'shop_catalog_image_size', $catalog );
		update_option( 'shop_single_image_size', $single );
	}

	/**
	 * Display the Grimlock WooCommerce Cart Component for the Navbar.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args The array of arguments for the Kirki field.
	 */
	public function navbar_nav_menu( $args = array() ) {
		$args      = apply_filters( 'grimlock_woocommerce_navbar_nav_menu_args', wp_parse_args( $args, array(
			'id' => 'woocommerce-navbar_nav_menu',
		) ) );
		$component = new Gwangi_Grimlock_WooCommerce_Navbar_Nav_Menu_Component( $args );
		$component->render();
	}
}

return new Gwangi_Grimlock_WooCommerce();
