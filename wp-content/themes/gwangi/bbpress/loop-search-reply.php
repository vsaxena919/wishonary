<?php
/**
 * Search Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

// @codingStandardsIgnoreFile
// Allow plugin text domain in theme and unescaped template tags.
?>

<div class="card mt-3">

	<div class="bbp-reply-header p-3">

		<div class="bbp-meta">
			<span class="bbp-reply-post-date"><?php bbp_reply_post_date(); ?></span>
			<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>
		</div><!-- .bbp-meta -->

		<div class="bbp-reply-title">
			<h3><?php esc_html_e( 'In reply to: ', 'bbpress' ); ?>
				<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a></h3>
		</div><!-- .bbp-reply-title -->

	</div><!-- .bbp-reply-header -->

	<div class="p-3">
		<div id="post-<?php bbp_reply_id(); ?>" <?php bbp_reply_class( '', array('row') ); ?>>
			<div class="bbp-list-author col-12 col-sm-3 col-md-2 text-left text-sm-center">

				<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>

				<div class="d-flex d-sm-block bbp-list-author-holder">
					<div class="col-2 col-sm-12 p-0 mr-2 mr-sm-0 bbp-list-author-avatar">
						<?php bbp_reply_author_link( array( 'sep' => '', 'show_role' => false, 'type' => 'avatar' ) ); ?>
					</div>
					<div class="bbp-list-author-meta">
						<?php bbp_reply_author_link( array( 'sep' => '', 'show_role' => true, 'type' => 'name' ) ); ?>

						<?php if ( bbp_is_user_keymaster() ) : ?>

							<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>

							<div class="bbp-reply-ip d-none d-sm-inline-block"><?php bbp_author_ip( bbp_get_reply_id() ); ?></div>

							<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>

						<?php endif; ?>
					</div>
				</div>

				<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>

			</div><!-- .bbp-list-author -->
			<div class="col-12 col-sm-9 col-md-10 pl-sm-0">

				<?php do_action( 'bbp_theme_before_reply_content' ); ?>

				<?php bbp_reply_content(); ?>

				<?php do_action( 'bbp_theme_after_reply_content' ); ?>

			</div><!-- .bbp-reply-content -->
		</div><!-- #post-<?php bbp_reply_id(); ?> -->
	</div> <!-- .p-3 -->

</div> <!-- .card -->

