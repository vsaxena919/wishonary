<?php
/**
 * Search Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

// @codingStandardsIgnoreFile
// Allow plugin text domain in theme.
?>

<div class="card mt-3">

	<div class="bbp-forum-header p-3">

		<div class="bbp-meta">
			<span class="bbp-forum-post-date"><?php
				/* translators: %s: Forum last active time */
				printf( esc_html__( 'Last updated %s', 'bbpress' ), esc_html( bbp_get_forum_last_active_time() ) ); ?></span>
			<a href="<?php bbp_forum_permalink(); ?>" class="bbp-forum-permalink">#<?php bbp_forum_id(); ?></a>
		</div><!-- .bbp-meta -->

		<div class="bbp-forum-title">
			<?php do_action( 'bbp_theme_before_forum_title' ); ?>
			<h3><?php esc_html_e( 'Forum: ', 'bbpress' ); ?><a href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a></h3>
			<?php do_action( 'bbp_theme_after_forum_title' ); ?>
		</div><!-- .bbp-forum-title -->

	</div><!-- .bbp-forum-header -->

	<div class="p-3">
		<div id="post-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>
			<div class="bbp-forum-content">
				<?php do_action( 'bbp_theme_before_forum_content' ); ?>
				<?php bbp_forum_content(); ?>
				<?php do_action( 'bbp_theme_after_forum_content' ); ?>
			</div><!-- .bbp-forum-content -->
		</div><!-- #post-<?php bbp_forum_id(); ?> -->
	</div> <!-- .p-# -->

</div> <!-- .card -->
