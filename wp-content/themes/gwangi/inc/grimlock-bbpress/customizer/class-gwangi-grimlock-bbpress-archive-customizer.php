<?php
/**
 * Gwangi_Grimlock_bbPress_Archive_Customizer Class
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
 * The post archive page class for the Customizer.
 */
class Gwangi_Grimlock_bbPress_Archive_Customizer {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'grimlock_archive_customizer_elements', array( $this, 'add_elements' ), 10, 1 );
	}

	/**
	 * Add CSS selectors from the array of CSS selectors for the archive post.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the archive post.
	 *
	 * @return array           The updated array of CSS selectors for the archive post.
	 */
	public function add_elements( $elements ) {
		return array_merge( $elements, array(
			'#bbpress-forums ul.bbp-forums li.bbp-body ul.forum',
			'#bbpress-forums ul.bbp-topics li.bbp-body ul.topic',
			'ul.bbp-topics-widget li',
			'ul.bbp-replies-widget li',
			'#bbpress-forums #new-post .bbp-template-notice + div:not(.bbp-template-notice)',
			'#bbpress-forums #new-post legend + div:not(.bbp-template-notice)',
		) );
	}
}

return new Gwangi_Grimlock_bbPress_Archive_Customizer();
