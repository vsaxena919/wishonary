<?php
/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

// @codingStandardsIgnoreFile
// Allow plugin text domain in theme and unescaped template tags.
?>

<div class="card mb-3">

	<div class="card-body p-3" id="post-<?php bbp_reply_id(); ?>">

		<div <?php bbp_reply_class( '', array( 'row' ) ); ?>>

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

				<div class="bg-black-faded p-3 rounded">

					<?php do_action( 'bbp_theme_before_reply_content' ); ?>

					<?php bbp_reply_content(); ?>

					<?php do_action( 'bbp_theme_after_reply_content' ); ?>

				</div>

			</div><!-- .bbp-reply-content -->

		</div> <!-- .reply -->

	</div> <!-- .card-body -->

	<div class="card-footer p-3">

		<div class="bbp-reply-header mb-0 p-0">

			<div class="bbp-meta">

				<span class="bbp-reply-post-date"><?php bbp_reply_post_date(); ?></span>

				<?php if ( bbp_is_single_user_replies() ) : ?>

					<span class="bbp-header"><?php esc_html_e( 'in reply to: ', 'bbpress' ); ?><a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a></span>

				<?php endif; ?>

				<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>

				<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

				<?php bbp_reply_admin_links(); ?>

				<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>

			</div><!-- .bbp-meta -->

		</div><!-- #post-<?php bbp_reply_id(); ?> -->

	</div>  <!-- .card-footer -->

</div>  <!-- .card -->
