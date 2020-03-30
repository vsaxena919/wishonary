<?php
/**
 * Gwangi_Grimlock_WooCommerce_Button_Customizer Class
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
class Gwangi_Grimlock_WooCommerce_Button_Customizer {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'grimlock_button_customizer_elements',                          array( $this, 'add_elements'                          ), 10, 1 );
		add_filter( 'grimlock_button_customizer_primary_elements',                  array( $this, 'add_primary_elements'                  ), 10, 1 );
		add_filter( 'grimlock_button_customizer_primary_color_elements',            array( $this, 'add_primary_color_elements'            ), 10, 1 );
		add_filter( 'grimlock_button_customizer_primary_background_color_elements', array( $this, 'add_primary_background_color_elements' ), 10, 1 );
		add_filter( 'grimlock_button_customizer_primary_background_color_outputs',  array( $this, 'add_primary_background_color_outputs'  ), 10, 1 );
		add_filter( 'grimlock_button_customizer_secondary_elements',                array( $this, 'add_secondary_elements'                ), 10, 1 );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the buttons.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the buttons.
	 *
	 * @return array           The updated array of CSS selectors for the buttons.
	 */
	public function add_elements( $elements ) {
		return array_merge( $elements, array(
			'li.product .product-buttons a',
			'.card--subscription-plan__sign-up .button',
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the primary buttons.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the primary buttons.
	 *
	 * @return array           The updated array of CSS selectors for the primary buttons.
	 */
	public function add_primary_elements( $elements ) {
		return array_merge( $elements, array(
			'.products .product .product-buttons a.button',

			'.woocommerce #review_form #respond .form-submit input',
			'.woocommerce-cart table.cart td.actions .add_to_cart input[type="submit"]',
			'.grimlock-query-section--woocommerce-subscriptions .grimlock-query-section__posts .product.featured .card--subscription-plan__footer .button',
			'.woocommerce form.checkout_coupon .button[type="submit"]',
			'.woocommerce .widget_price_filter .button',
			'.woocommerce-page .widget_price_filter .button',
			'.woocommerce-EditAccountForm .woocommerce-Button.button',
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the primary button color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the primary button color.
	 *
	 * @return array           The updated array of CSS selectors for the primary button color.
	 */
	public function add_primary_color_elements( $elements ) {
		return array_merge( $elements, array(
			'.grimlock-query-section--woocommerce-subscriptions .grimlock-query-section__posts .card--subscription-plan__footer .added_to_cart',
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the primary button background color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the primary button background color.
	 *
	 * @return array           The updated array of CSS selectors for the primary button background color.
	 */
	public function add_primary_background_color_elements( $elements ) {
		return array_merge( $elements, array(
			'.grimlock-query-section--woocommerce-subscriptions .grimlock-query-section__posts .card--subscription-plan__footer .added_to_cart',
		) );
	}

	/**
	 * Add selectors and properties to the CSS rule-set for the primary button background color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $outputs The array of CSS selectors and properties for the primary button background color.
	 *
	 * @return array          The updated array of CSS selectors for the primary button background color.
	 */
	public function add_primary_background_color_outputs( $outputs ) {
		return array_merge( $outputs, array(
			array(
				'element'  => implode( ',', array(
					'.grimlock-query-section--woocommerce-subscriptions .grimlock-query-section__posts .product.featured .card--subscription-plan',
					'.woocommerce .widget_price_filter .ui-slider .ui-slider-handle',
					'.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle',
					'.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle.ui-state-active',
				) ),
				'property' => 'border-color',
			),
			array(
				'element'  => implode( ',', array(
					'.grimlock-query-section--woocommerce-subscriptions .grimlock-query-section__posts .product .card--subscription-plan__price',
					'.woocommerce .products .yith-wcwl-add-to-wishlist a.add_to_wishlist:before',
					'.woocommerce-page .products .yith-wcwl-add-to-wishlist a.add_to_wishlist:before',
					'.woocommerce .yith-wcwl-add-to-wishlist .feedback:before',
					'.woocommerce-page .yith-wcwl-add-to-wishlist .feedback:before',
					'.woocommerce .products .yith-wcwl-add-to-wishlist',
					'.woocommerce-page .products .yith-wcwl-add-to-wishlist',
					'.woocommerce .star-rating',
					'.woocommerce-page .star-rating',

				) ),
				'property' => 'color',
			),
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for secondary buttons.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for secondary buttons.
	 *
	 * @return array           The updated array of CSS selectors for secondary buttons.
	 */
	public function add_secondary_elements( $elements ) {
		return array_merge( $elements, array(
			'.products .product .product-buttons a.added_to_cart',
		) );
	}
}

return new Gwangi_Grimlock_WooCommerce_Button_Customizer();
