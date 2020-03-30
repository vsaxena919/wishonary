<?php
/**
 * Gwangi_The_Events_Calendar Class
 *
 * @author   Themosaurus
 * @since    1.0.0
 * @package  gwangi
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Gwangi_The_Events_Calendar' ) ) :
	/**
	 * The main Gwangi_The_Events_Calendar class
	 */
	class Gwangi_The_Events_Calendar {
		/**
		 * Setup class.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'tribe_events_single_event_before_the_meta',     array( 'Tribe__Events__iCal', 'single_event_links'   ), 100   );

			global $gwangi_grimlock;
			add_filter( 'grimlock_the_events_calendar_customizer_custom_header_layout_field_args', array( $gwangi_grimlock, 'change_layout_field_args' ), 10, 2 );
		}
	}
endif;

return new Gwangi_The_Events_Calendar();
