<?php
/**
 * User Topics Created
 *
 * @package bbPress
 * @subpackage Theme
 */

// @codingStandardsIgnoreFile
// Allow plugin text domain in theme.

do_action( 'bbp_template_before_user_topics_created' ); ?>

<div id="bbp-user-topics-started" class="bbp-user-topics-started">
	<h2 class="entry-title sr-only"><?php esc_html_e( 'Forum Topics Started', 'bbpress' ); ?></h2>
	<div class="bbp-user-section">

		<?php if ( bbp_get_user_topics_started() ) : ?>

			<?php bbp_get_template_part( 'loop',       'topics' ); ?>

			<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

		<?php else : ?>

			<div class="alert alert-info">
				<?php bbp_is_user_home() ? esc_html_e( 'You have not created any topics.', 'bbpress' ) : esc_html_e( 'This user has not created any topics.', 'bbpress' ); ?>
			</div>

		<?php endif; ?>

	</div>
</div><!-- #bbp-user-topics-started -->

<?php do_action( 'bbp_template_after_user_topics_created' ); ?>
