<?php
/**
 * Gwangi_Grimlock_WooCommerce_Table_Customizer Class
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
 * The WooCommerce class for the Customizer.
 */
class Gwangi_Grimlock_WooCommerce_Table_Customizer {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'grimlock_table_customizer_striped_background_color_elements', array( $this, 'add_striped_background_color_elements'    ), 10,  1 );
		add_filter( 'grimlock_table_customizer_striped_background_color_elements', array( $this, 'remove_striped_background_color_elements' ), 10,  1 );
		add_filter( 'grimlock_table_customizer_striped_background_color_outputs',  array( $this, 'add_striped_background_color_outputs'     ), 10, 1 );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the table striped background color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the table striped background color.
	 *
	 * @return array           The updated array of CSS selectors for the table striped background color.
	 */
	public function add_striped_background_color_elements( $elements ) {
		return array_merge( $elements, array(
			'.woocommerce-cart .cart_totals',
			'.woocommerce .widget_layered_nav ul li .count',
			'.woocommerce .widget_layered_nav_filters ul li .count',
			'.woocommerce .widget_product_categories ul li .count',
			'.woocommerce-page .widget_layered_nav ul li .count',
			'.woocommerce-page .widget_layered_nav_filters ul li .count',
			'.woocommerce-page .widget_product_categories ul li .count',
			'.woocommerce div.product .woocommerce-tabs ul.tabs:before',
			'.woocommerce-page div.product .woocommerce-tabs ul.tabs:before',
			'.woocommerce #reviews #comments ol.commentlist li .comment-text',
			'.woocommerce-page #reviews #comments ol.commentlist li .comment-text',
			'.woocommerce table.shop_attributes .alt td',
			'.woocommerce table.shop_attributes .alt th',
			'.woocommerce-page table.shop_attributes .alt td',
			'.woocommerce-page table.shop_attributes .alt th',
			'.woocommerce .widget_shopping_cart .buttons > .button',
			'.woocommerce-page .widget_shopping_cart .buttons > .button',
			'.woocommerce-checkout #payment div.payment_box',
			'#add_payment_method #payment div.payment_box',
			'.woocommerce table.cart td.actions .input-text',
			'.woocommerce-page #content table.cart td.actions .input-text',
			'.woocommerce-page table.cart td.actions .input-text',
			'.woocommerce .woocommerce-customer-details address',
			'.woocommerce-terms-and-conditions',
			'.woocommerce ul.products li.product a.woocommerce-LoopProduct-link',
			'.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content',
			'.topic-tag .bbp-breadcrumb',
			'.shop_table.cart.wishlist_table tr',
			'.shop_table .order-total',
		) );
	}

	/**
	 * Remove CSS selectors from the array of CSS selectors for the table striped background color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the table striped background color.
	 *
	 * @return array           The updated array of CSS selectors for the table striped background color.
	 */
	public function remove_striped_background_color_elements( $elements ) {
		$keys = array(
			array_search( '.woocommerce table.shop_table',                           $elements, true ),
			array_search( '.woocommerce-page table.shop_table',                      $elements, true ),
			array_search( '.woocommerce table.shop_table tbody tr:nth-of-type(odd)', $elements, true ),
		);

		foreach ( $keys as $key ) {
			if ( false !== $key ) {
				unset( $elements[ $key ] );
			}
		}
		return $elements;
	}

	/**
	 * Add selectors and properties to the CSS rule-set for the striped table row background color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $outputs The array of CSS selectors and properties for the striped table row background color.
	 *
	 * @return array          The updated array of CSS selectors for the striped table row background color.
	 */
	public function add_striped_background_color_outputs( $outputs ) {
		return array_merge( $outputs, array(
			array(
				'element'  => implode( ',', array(
					'.woocommerce table.shop_attributes',
					'.woocommerce-page table.shop_attributes',
				) ),
				'property' => 'border-color',
			),
			array(
				'element'  => implode( ',', array(
					'.woocommerce table.shop_attributes tr',
					'.woocommerce-page table.shop_attributes tr',
					'.woocommerce-checkout #payment ul.payment_methods',
					'#add_payment_method #payment ul.payment_methods',
					'.woocommerce-checkout #payment div.payment_box:before',
					'#add_payment_method #payment div.payment_box:before',
				) ),
				'property' => 'border-bottom-color',
			),
			array(
				'element'  => implode( ',', array(
					'.dropdown-wc-filters #woocommerce-filters .widget + .widget',
					'.woocommerce .widget_shopping_cart .total',
					'.woocommerce-page .widget_shopping_cart .total',
				) ),
				'property' => 'border-top-color',
			),
			array(
				'element'  => implode( ',', array(
					'.woocommerce ul.product_list_widget li dl.variation',
					'.woocommerce-page ul.product_list_widget li dl.variation',
				) ),
				'property' => 'border-left-color',
			),
			array(
				'element'  => implode( ',', array(
					'.woocommerce table.shop_attributes th',
					'.woocommerce-page table.shop_attributes th',
				) ),
				'property' => 'border-right-color',
			),
		) );
	}
}

return new Gwangi_Grimlock_WooCommerce_Table_Customizer();
