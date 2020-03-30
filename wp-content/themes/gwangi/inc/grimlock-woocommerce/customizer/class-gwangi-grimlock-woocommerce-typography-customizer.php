<?php
/**
 * Gwangi_Grimlock_WooCommerce_Typography_Customizer Class
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
 * The typography class for the Customizer.
 */
class Gwangi_Grimlock_WooCommerce_Typography_Customizer {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'grimlock_typography_customizer_text_color_elements',            array( $this, 'add_text_color_elements'            ), 10, 1 );
		add_filter( 'grimlock_typography_customizer_text_color_outputs',             array( $this, 'add_text_color_outputs'             ), 10, 1 );
		add_filter( 'grimlock_typography_customizer_heading_color_outputs',          array( $this, 'add_heading_color_outputs'          ), 10, 1 );
		add_filter( 'grimlock_typography_customizer_text_font_outputs',              array( $this, 'add_text_font_outputs'              ), 10, 1 );
		add_filter( 'grimlock_typography_customizer_heading_font_outputs',           array( $this, 'add_heading_font_outputs'           ), 10, 1 );
		add_filter( 'grimlock_typography_customizer_link_color_elements',            array( $this, 'add_link_color_elements'            ), 10, 1 );
	}

	/**
	 * Add selectors and properties to the CSS rule-set for the heading color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $outputs The array of CSS selectors and properties for the heading color.
	 *
	 * @return array          The updated array of CSS selectors for the heading color.
	 */
	public function add_heading_color_outputs( $outputs ) {
		return array_merge( $outputs, array(
			array(
				'element'  => implode( ',', array(
					'.woocommerce div.product .woocommerce-tabs ul.tabs li a:after',
					'.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:after',
				) ),
				'property' => 'background-color',
			),
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the link color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the link color.
	 *
	 * @return array           The updated array of CSS selectors for the link color.
	 */
	public function add_link_color_elements( $elements ) {
		return array_merge( $elements, array(
			'.woocommerce .widget_layered_nav ul li:before',
			'.woocommerce .widget_layered_nav ul li:hover:before',
			'.woocommerce .widget_layered_nav_filters ul li:before',
			'.woocommerce .widget_layered_nav_filters ul li:hover:before',
			'.woocommerce .widget_product_categories ul li:before',
			'.woocommerce .widget_product_categories ul li:hover:before',
			'.woocommerce-page .widget_layered_nav ul li:before',
			'.woocommerce-page .widget_layered_nav ul li:hover:before',
			'.woocommerce-page .widget_layered_nav_filters ul li:before',
			'.woocommerce-page .widget_layered_nav_filters ul li:hover:before',
			'.woocommerce-page .widget_product_categories ul li:before',
			'.woocommerce-page .widget_product_categories ul li:hover:before',
			'.woocommerce .widget_layered_nav ul li .count',
			'.woocommerce .widget_layered_nav_filters ul li .count',
			'.woocommerce .widget_product_categories ul li .count',
			'.woocommerce-page .widget_layered_nav ul li .count',
			'.woocommerce-page .widget_layered_nav_filters ul li .count',
			'.woocommerce-page .widget_product_categories ul li .count',
			'.woocommerce-page .widget_product_categories ul li.current-cat:before',
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the text color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the text color.
	 *
	 * @return array           The updated array of CSS selectors for the text color.
	 */
	public function add_text_color_elements( $elements ) {
		return array_merge( $elements, array(
			'.woocommerce #yith-quick-view-modal #yith-quick-view-close:before',
			'.yith-ajaxsearchform-container .autocomplete-suggestions',
		) );
	}

	/**
	 * Add selectors and properties to the CSS rule-set for the text color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $outputs The array of CSS selectors and properties for the text color.
	 *
	 * @return array          The updated array of CSS selectors for the text color.
	 */
	public function add_text_color_outputs( $outputs ) {
		return array_merge( $outputs, array(
			array(
				'element'  => implode( ',', array(
					'.woocommerce ul.products li.product:hover .product-buttons a',
					'.woocommerce-page ul.products li.product:hover .product-buttons a',
				) ),
				'property' => 'background-color',
			),
			array(
				'element'  => implode( ',', array(
					'.woocommerce .yith-wcqv-button .blockUI.blockOverlay',
				) ),
				'property' => 'background-color',
				'suffix'   => '!important',
			),
			array(
				'element'  => implode( ',', array(
					'.woocommerce div.quantity.buttons_added .minus',
					'.woocommerce div.quantity.buttons_added .plus',
					'.woocommerce-page div.quantity.buttons_added .minus',
					'.woocommerce-page div.quantity.buttons_added .plus',
				) ),
				'property' => 'border-color',
			),
			array(
				'element'  => implode( ',', array(
					'.woocommerce div.product .woocommerce-tabs ul.tabs li.active a',
				) ),
				'property' => 'border-bottom-color',
			),
		) );
	}

	/**
	 * Add selectors and properties to the CSS rule-set for the text font.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $outputs The array of CSS selectors and properties for the text font.
	 *
	 * @return array          The updated array of CSS selectors for the text font.
	 */
	public function add_text_font_outputs( $outputs ) {
		return array_merge( $outputs, array(
			array(
				'element'  => implode( ',', array(
					'.main-navigation .navbar-nav.navbar-nav--woocommerce .menu-item > a.cart-contents .amount',
					'.main-navigation .navbar-nav.navbar-nav--woocommerce .menu-item > a.cart-contents .count',
				) ),
				'property' => 'font-family',
				'choice'   => 'font-family',
			),
		) );
	}

	/**
	 * Add selectors and properties to the CSS rule-set for the heading font.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $outputs The array of CSS selectors and properties for the heading font.
	 *
	 * @return array          The updated array of CSS selectors for the heading font.
	 */
	public function add_heading_font_outputs( $outputs ) {
		$elements_headings = array(
			'.dropdown-wc-filters .dropdown-toggle',
			'.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price',
			'.woocommerce div.product span.price',
			'.woocommerce div.product p.price',
			'.woocommerce-page div.product span.price',
			'.woocommerce-page div.product p.price',
			'.product_list_widget li del',
			'.product_list_widget li ins',
		);

		return array_merge( $outputs, array(
			array(
				'element'  => implode( ',', $elements_headings ),
				'property' => 'font-family',
				'choice'   => 'font-family',
			),
			array(
				'element'  => implode( ',', $elements_headings ),
				'property' => 'text-transform',
				'choice'   => 'text-transform',
			),
			array(
				'element'  => implode( ',', $elements_headings ),
				'property' => 'font-weight',
				'choice'   => 'font-weight',
			),
			array(
				'element'  => implode( ',', $elements_headings ),
				'property' => 'font-style',
				'choice'   => 'font-style',
			),
		) );
	}
}

return new Gwangi_Grimlock_WooCommerce_Typography_Customizer();
