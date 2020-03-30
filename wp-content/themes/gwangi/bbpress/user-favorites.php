<?php
/**
 * User Favorites
 *
 * @package bbPress
 * @subpackage Theme
 */

// @codingStandardsIgnoreFile
// Allow plugin text domain in theme.
?>

<?php do_action( 'bbp_template_before_user_favorites' ); ?>

<div id="bbp-user-favorites" class="bbp-user-favorites">
	<h2 class="entry-title sr-only"><?php esc_html_e( 'Favorite Forum Topics', 'bbpress' ); ?></h2>
	<div class="bbp-user-section">

		<?php if ( bbp_get_user_favorites() ) : ?>

			<?php bbp_get_template_part( 'loop',       'topics' ); ?>

			<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

		<?php else : ?>

			<div class="alert alert-info">
				<?php bbp_is_user_home() ? esc_html_e( 'You currently have no favorite topics.', 'bbpress' ) : esc_html_e( 'This user has no favorite topics.', 'bbpress' ); ?>
			</div>

		<?php endif; ?>

	</div>
</div><!-- #bbp-user-favorites -->

<?php do_action( 'bbp_template_after_user_favorites' ); ?>
