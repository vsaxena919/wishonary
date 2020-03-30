<?php
/**
 * Gwangi template functions for WooCommerce.
 *
 * @package gwangi
 */

if ( ! function_exists( 'gwangi_woocommerce_output_content_wrapper' ) ) {
	/**
	 * Output the start of the page wrapper.
	 *
	 * @since 1.0.0
	 */
	function gwangi_woocommerce_output_content_wrapper() {
		get_sidebar( 'left' ); ?>
		<div id="primary" class="content-area region__col region__col--2">
			<main id="main" class="site-main">
		<?php
	}
}

if ( ! function_exists( 'gwangi_woocommerce_output_content_wrapper_end' ) ) {
	/**
	 * Output the end of the page wrapper.
	 *
	 * @since 1.0.0
	 */
	function gwangi_woocommerce_output_content_wrapper_end() {
		?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
		get_sidebar( 'right' );
	}
}
