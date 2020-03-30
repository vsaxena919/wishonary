<?php
/**
 * Gwangi_Grimlock_Jetpack Class
 *
 * @package gwangi
 * @author  Themosaurus
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Gwangi Grimlock Jetpack integration class.
 */
class Gwangi_Grimlock_Jetpack {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		require_once get_template_directory() . '/inc/grimlock-jetpack/customizer/class-gwangi-grimlock-jetpack-global-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-jetpack/customizer/class-gwangi-grimlock-jetpack-typography-customizer.php';
	}
}

return new Gwangi_Grimlock_Jetpack();
