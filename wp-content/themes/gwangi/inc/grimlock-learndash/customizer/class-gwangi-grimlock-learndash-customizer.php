<?php
/**
 * Gwangi_Grimlock_LearnDash_Customizer Class
 *
 * @author  Themosaurus
 * @since   1.0.0
 * @package grimlock
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Gwangi Customizer class for LearnDash.
 */
class Gwangi_Grimlock_LearnDash_Customizer extends Grimlock_LearnDash_Customizer {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		parent::__construct();
		add_filter( 'grimlock_single_args', array( $this, 'change_single_args' ), 20, 1 );
	}

	/**
	 * Change post arguments using to customize the LearnDash course.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args The default arguments to render the post.
	 *
	 * @return array      The arguments to render the post.
	 */
	public function change_single_args( $args ) {
		if ( $this->is_template() ) {
			$args['post_thumbnail_displayed'] = false;
		}
		return $args;
	}
}

return new Gwangi_Grimlock_LearnDash_Customizer();
