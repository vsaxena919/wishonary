<?php
/**
 * Gwangi_Grimlock_The_Events_Calendar Class
 *
 * @package  gwangi
 * @author   Themosaurus
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Gwangi Grimlock integration class for The Events Calendar
 */
class Gwangi_Grimlock_The_Events_Calendar {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		require_once get_template_directory() . '/inc/grimlock-the-events-calendar/customizer/class-gwangi-grimlock-the-events-calendar-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-the-events-calendar/customizer/class-gwangi-grimlock-the-events-calendar-button-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-the-events-calendar/customizer/class-gwangi-grimlock-the-events-calendar-archive-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-the-events-calendar/customizer/class-gwangi-grimlock-the-events-calendar-control-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-the-events-calendar/customizer/class-gwangi-grimlock-the-events-calendar-global-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-the-events-calendar/customizer/class-gwangi-grimlock-the-events-calendar-navigation-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-the-events-calendar/customizer/class-gwangi-grimlock-the-events-calendar-table-customizer.php';
		require_once get_template_directory() . '/inc/grimlock-the-events-calendar/customizer/class-gwangi-grimlock-the-events-calendar-typography-customizer.php';
	}
}

return new Gwangi_Grimlock_The_Events_Calendar();
