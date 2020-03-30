<?php
/**
 * Gwangi_Grimlock_WooCommerce_Single_Product_Customizer Class
 *
 * @author  Themosaurus
 * @since   1.1.9
 * @package grimlock
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Customizer class for the WooCommerce single product.
 */
class Gwangi_Grimlock_WooCommerce_Single_Product_Customizer {
	/**
	 * Setup class.
	 *
	 * @since 1.1.9
	 */
	public function __construct() {
		add_filter( 'grimlock_custom_header_displayed', array( $this, 'has_custom_header_displayed' ), 10, 1 );
	}

	/**
	 * Check if the custom header is displayed or not.
	 *
	 * @since 1.1.9
	 *
	 * @return bool True if the custom header is displayed, false otherwise.
	 */
	public function has_custom_header_displayed( $default ) {
		return ! $this->is_template() && $default;
	}

	/**
	 * Check if the current template is the expected template.
	 *
	 * @since 1.1.9
	 *
	 * @return bool True when the template is the expected template, false otherwise.
	 */
	protected function is_template() {
		return is_singular( 'product' );
	}
}

return new Gwangi_Grimlock_WooCommerce_Single_Product_Customizer();
