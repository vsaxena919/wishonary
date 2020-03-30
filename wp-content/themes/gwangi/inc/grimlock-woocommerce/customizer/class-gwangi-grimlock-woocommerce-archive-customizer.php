<?php
/**
 * Gwangi_Grimlock_WooCommerce_Archive_Customizer Class
 *
 * @author   Themosaurus
 * @since    1.0.0
 * @package grimlock
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The post archive page class for the Customizer.
 */
class Gwangi_Grimlock_WooCommerce_Archive_Customizer {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'grimlock_archive_customizer_elements',                       array( $this, 'add_elements'                       ), 10, 1 );
		add_filter( 'grimlock_archive_customizer_post_background_color_elements', array( $this, 'add_post_background_color_elements' ), 10, 1 );
		add_filter( 'grimlock_archive_customizer_post_background_color_outputs',  array( $this, 'add_post_background_color_outputs'  ), 10, 1 );
		add_filter( 'grimlock_archive_customizer_post_color_elements',            array( $this, 'add_post_color_elements'            ), 10, 1 );
		add_filter( 'grimlock_archive_customizer_post_color_outputs',             array( $this, 'add_post_color_outputs'             ), 10, 1 );
		add_filter( 'grimlock_archive_customizer_post_border_radius_elements',    array( $this, 'add_post_border_radius_elements'    ), 10, 1 );
	}

	/**
	 * Add CSS selectors from the array of CSS selectors for the archive post.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the archive post.
	 *
	 * @return array           The updated array of CSS selectors for the archive post.
	 */
	public function add_elements( $elements ) {
		return array_merge( $elements, array(
			'.woocommerce-form-login',
			'.woocommerce-ResetPassword',
			'.woocommerce #review_form #respond form',
			'.woocommerce form.checkout_coupon',
			'.woocommerce-cart .cart_totals',
			'.woocommerce-billing-fields__field-wrapper',
			'.woocommerce-shipping-fields__field-wrapper',
			'.woocommerce-additional-fields__field-wrapper',
			'#order_review',
		) );
	}

	/**
	 * Add CSS selectors from the array of CSS selectors for the archive post background color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the archive post background color.
	 *
	 * @return array           The updated array of CSS selectors for the archive post background color.
	 */
	public function add_post_background_color_elements( $elements ) {
		return array_merge( $elements, array(
			'.woocommerce .woocommerce-MyAccount-navigation > ul > li a',
			'.woocommerce-page .woocommerce-MyAccount-navigation > ul > li a',
		) );
	}

	/**
	 * Add CSS selectors from the array of CSS selectors for the archive post color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the archive post color.
	 *
	 * @return array           The updated array of CSS selectors for the archive post color.
	 */
	public function add_post_color_elements( $elements ) {
		return array_merge( $elements, array(
			'.woocommerce .woocommerce-MyAccount-navigation > ul > li',
			'.woocommerce-page .woocommerce-MyAccount-navigation > ul > li',
		) );
	}

	/**
	 * Add selectors and properties to the CSS rule-set for the archive post background color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $outputs The array of CSS selectors and properties for the archive post background color.
	 *
	 * @return array          The updated array of CSS selectors for the archive post background color.
	 */
	public function add_post_background_color_outputs( $outputs ) {
		return array_merge( $outputs, array(
			array(
				'element'  => implode( ',', array(
					'.woocommerce .woocommerce-MyAccount-navigation > ul > li.is-active a',
					'.woocommerce-page .woocommerce-MyAccount-navigation > ul > li.is-active a',
					'.woocommerce .woocommerce-MyAccount-navigation > ul > li a:hover',
					'.woocommerce-page .woocommerce-MyAccount-navigation > ul > li a:hover',
				) ),
				'property' => 'color',
			),
		) );
	}

	/**
	 * Add selectors and properties to the CSS rule-set for the archive post color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $outputs The array of CSS selectors and properties for the archive post color.
	 *
	 * @return array          The updated array of CSS selectors for the archive post color.
	 */
	public function add_post_color_outputs( $outputs ) {
		return array_merge( $outputs, array(
			array(
				'element'  => implode( ',', array(
					'.woocommerce .woocommerce-MyAccount-navigation > ul > li.is-active a',
					'.woocommerce-page .woocommerce-MyAccount-navigation > ul > li.is-active a',
					'.woocommerce .woocommerce-MyAccount-navigation > ul > li a:hover',
					'.woocommerce-page .woocommerce-MyAccount-navigation > ul > li a:hover',
				) ),
				'property' => 'background-color',
			),
		) );
	}

	/**
	 * Add CSS selectors from the array of CSS selectors for the archive post border radius.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the archive post border radius.
	 *
	 * @return array           The updated array of CSS selectors for the archive post border radius.
	 */
	public function add_post_border_radius_elements( $elements ) {
		return array_merge( $elements, array(
			'.main-navigation .navbar-nav.navbar-nav--woocommerce .sub-menu .widget_shopping_cart ul.cart_list li.mini_cart_item img',
			'.woocommerce ul.products li.product a.woocommerce-LoopProduct-link',
			'.woocommerce ul.products li.product a.woocommerce-LoopProduct-link img',
			'.woocommerce-page ul.products li.product a.woocommerce-LoopProduct-link img',
			'.woocommerce-cart .cart_totals',
		) );
	}
}

return new Gwangi_Grimlock_WooCommerce_Archive_Customizer();
