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

if ( ! class_exists( 'Gwangi_Paid_Memberships_Pro' ) ) :
	/**
	 * The Gwangi Grimlock integration class
	 */
	class Gwangi_Paid_Memberships_Pro {
		/**
		 * Setup class.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			require_once get_template_directory() . '/inc/paid-memberships-pro/customizer/class-gwangi-paid-memberships-pro-button-customizer.php';
			require_once get_template_directory() . '/inc/paid-memberships-pro/customizer/class-gwangi-paid-memberships-pro-archive-customizer.php';
			require_once get_template_directory() . '/inc/paid-memberships-pro/customizer/class-gwangi-paid-memberships-pro-table-customizer.php';
		}
	}
endif;

return new Gwangi_Paid_Memberships_Pro();
