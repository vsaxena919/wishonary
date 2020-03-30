<?php
/**
 * Statistics Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// @codingStandardsIgnoreFile
// Allow plugin text domain in theme.

// Get the statistics.
$stats = bbp_get_statistics(); ?>

<?php do_action( 'bbp_before_statistics' ); ?>

	<div class="widget_display_stats">

		<div class="row stats_list">
			<div class="col-sm stats_list_item text-center mt-2 mt-sm-4">
				<div class="card p-4 h-100">
					<h3><?php echo esc_html( $stats['user_count'] ); ?></h3>
					<h5 class="text-muted text-uppercase small mb-0"><?php esc_html_e( 'Registered Users', 'bbpress' ); ?></h5>
				</div>
			</div>
			<div class="col-sm stats_list_item text-center mt-2 mt-sm-4">
				<div class="card p-4 h-100">
					<h3><?php echo esc_html( $stats['forum_count'] ); ?></h3>
					<h5 class="text-muted text-uppercase small mb-0"><?php esc_html_e( 'Forums', 'bbpress' ); ?></h5>
				</div>
			</div>
			<div class="col-sm stats_list_item text-center mt-2 mt-sm-4">
				<div class="card p-4 h-100">
					<h3><?php echo esc_html( $stats['topic_count'] ); ?></h3>
					<h5 class="text-muted text-uppercase small mb-0"><?php esc_html_e( 'Topics', 'bbpress' ); ?></h5>
				</div>
			</div>
			<div class="col-sm stats_list_item text-center mt-2 mt-sm-4">
				<div class="card p-4 h-100">
					<h3><?php echo esc_html( $stats['reply_count'] ); ?></h3>
					<h5 class="text-muted text-uppercase small mb-0"><?php esc_html_e( 'Replies', 'bbpress' ); ?></h5>
				</div>
			</div>
		</div>

		<?php if ( ! empty( $stats['empty_topic_tag_count'] ) || ! empty( $stats['topic_count_hidden'] ) || ! empty( $stats['reply_count_hidden'] ) ) : ?>
			<div class="row stats_list">
				<?php if ( ! empty( $stats['empty_topic_tag_count'] ) ) : ?>
					<div class="col-sm stats_list_item text-center mt-2 mt-sm-4">
						<div class="card p-4 h-100">
							<h3><?php echo esc_html( $stats['empty_topic_tag_count'] ); ?></h3>
							<h5 class="text-muted text-uppercase small mb-0"><?php esc_html_e( 'Empty Topic Tags', 'bbpress' ); ?></h5>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $stats['topic_count_hidden'] ) ) : ?>
					<div class="col-sm stats_list_item text-center mt-2 mt-sm-4">
						<div class="card p-4 h-100">
							<h3><?php echo esc_html( $stats['topic_count_hidden'] ); ?></h3>
							<h5 class="text-muted text-uppercase small mb-0"><?php esc_html_e( 'Hidden Topics', 'bbpress' ); ?></h5>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $stats['reply_count_hidden'] ) ) : ?>
					<div class="col-sm stats_list_item text-center mt-2 mt-sm-4">
						<div class="card p-4 h-100">
							<h3><?php echo esc_html( $stats['reply_count_hidden'] ); ?></h3>
							<h5 class="text-muted text-uppercase small mb-0"><?php esc_html_e( 'Hidden Replies', 'bbpress' ); ?></h5>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div><!-- .widget_display_stats -->

<?php do_action( 'bbp_after_statistics' ); ?>

<?php unset( $stats );
