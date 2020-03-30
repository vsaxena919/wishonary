<?php
/**
 * Gwangi_Grimlock_WooCommerce_Global_Customizer Class
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
 * The background image class for the Customizer.
 */
class Gwangi_Grimlock_WooCommerce_Global_Customizer {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'grimlock_global_customizer_content_background_color_elements', array( $this, 'add_content_background_color_elements' ), 10, 1 );
		add_filter( 'grimlock_global_customizer_content_background_color_outputs',  array( $this, 'add_content_background_color_outputs'  ), 10, 1 );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the content background color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the content background color.
	 *
	 * @return array           The updated array of CSS selectors for the content background color.
	 */
	public function add_content_background_color_elements( $elements ) {
		return array_merge( $elements, array(
			'#yith-quick-view-modal .yith-wcqv-main',
			'.woocommerce.post-type-archive-product .dropdown-wc-filters .dropdown-menu',
			'.woocommerce.post-type-archive-product .dropdown-wc-filters #woocommerce-filters',
			'.yith-ajaxsearchform-container .autocomplete-suggestions',
		) );
	}

	/**
	 * Add selectors and properties to the CSS rule-set for the content background color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $outputs The array of CSS selectors and properties for the content background color.
	 *
	 * @return array          The updated array of CSS selectors for the content background color.
	 */
	public function add_content_background_color_outputs( $outputs ) {
		return array_merge( $outputs, array(
			array(
				'element'  => implode( ',', array(
					'.shop_table.cart.wishlist_table tr',
				) ),
				'property' => 'border-color',
			),
			array(
				'element'  => implode( ',', array(
					'.woocommerce ul.products li.product:hover .product-buttons a',
					'.woocommerce-page ul.products li.product:hover .product-buttons a',
					'.woocommerce ul.products li.product .product-buttons a:before',
					'.woocommerce-page ul.products li.product .product-buttons a:before',
				) ),
				'property' => 'color',
			),
		) );
	}
}

return new Gwangi_Grimlock_WooCommerce_Global_Customizer();
