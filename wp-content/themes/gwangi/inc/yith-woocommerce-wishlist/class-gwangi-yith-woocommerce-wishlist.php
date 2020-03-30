<?php
/**
 * Gwangi Grimlock Class
 *
 * @package  gwangi
 * @author   Themosaurus
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Gwangi_Yith_WooCommerce_Wishlist' ) ) :
	/**
	 * The Gwangi Grimlock integration class
	 */
	class Gwangi_Yith_WooCommerce_Wishlist {
		/**
		 * Setup class.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'dequeue_scripts' ), 20 );
		}

		/**
		 * Remove stylesheets.
		 *
		 * @since 1.0.0
		 */
		public function dequeue_scripts() {
			wp_dequeue_style(    'yith-wcwl-font-awesome' );
			wp_deregister_style( 'yith-wcwl-font-awesome' );
		}
	}
endif;

return new Gwangi_Yith_WooCommerce_Wishlist();
