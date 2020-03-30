<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/organizer.php
 *
 * @package TribeEventsCalendar
 * @version 4.4
 */

// @codingStandardsIgnoreFile
// Allow plugin text domain in theme.
$organizer_ids = tribe_get_organizer_ids();
$multiple      = count( $organizer_ids ) > 1;
$phone         = tribe_get_organizer_phone();
$email         = tribe_get_organizer_email();
$website       = tribe_get_organizer_website_link();
$label         = tribe_get_organizer_label(); ?>

<div class="tribe-events-meta-group tribe-events-meta-group-organizer">

	<h3 class="tribe-events-single-section-title mt-2 mb-3 widget-title"><?php echo esc_html( tribe_get_organizer_label( ! $multiple ) ); ?></h3>

	<?php
	do_action( 'tribe_events_single_meta_organizer_section_start' );

	foreach ( $organizer_ids as $organizer ) :
		if ( ! $organizer ) :
			continue;
		endif;

		$organizer_post    = get_post( $organizer );
		$organizer_content = apply_filters( 'the_content', $organizer_post->post_content ); ?>

		<div class="tribe-organizer card mb-2 <?php if ( ! $multiple ) : ?>tribe-organizer-one<?php endif; ?>">

			<a class="full-link" href="<?php echo esc_url( get_the_permalink( $organizer ) ); ?>"></a>

			<div class="media m-0 p-3">

				<div class="tribe-organizer-img d-flex mr-2">
					<a href="<?php echo esc_url( get_the_permalink( $organizer ) ); ?>">
						<?php if ( has_post_thumbnail( $organizer ) ) : ?>
							<?php
							$post_thumbnail_attrs = array(
								'class' => 'img-fluid rounded-circle d-inline-block',
							);
							echo get_the_post_thumbnail( $organizer, array( 60, 60 ), $post_thumbnail_attrs ); ?>
						<?php else : ?>
							<img class="img-fluid rounded-circle d-inline-block" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/avatars/user-avatar-thumb-square.png' ); ?>" alt="<?php esc_html_e( 'avatar', 'the-events-calendar' ); ?>" />
						<?php endif; ?>
					</a>
				</div> <!-- .tribe-organizer-img -->

				<div class="tribe-organizer-body media-body">

					<h6 class="mb-0 tribe-organizer-title"><?php echo get_the_title( $organizer ); ?></h6>

					<?php if ( ! empty( $label ) ) : ?>
						<span class="badge badge-primary tribe-organizer-badge mt-2"><?php
							// @codingStandardsIgnoreStart
							echo tribe_get_organizer_label( $organizer );
							// @codingStandardsIgnoreEnd ?></span>
					<?php endif; ?>

					<?php if ( ! $multiple ) : ?>
						<?php if ( ! empty( $organizer_content ) ) : ?>
							<div class="mt-2 tribe-organizer-content">
								<?php echo wp_kses_post( $organizer_content ); ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>

				</div> <!-- .tribe-organizer-body -->

			</div> <!-- .media -->

			<?php
			if ( ! $multiple ) : ?>
				<div class="card-footer p-3 text-center">
					<?php
					if ( ! empty( $phone ) ) : ?>
						<span class="tribe-organizer-tel"><?php echo esc_html( $phone ); ?></span>
						<?php
					endif;

					if ( ! empty( $email ) ) : ?>
						<span class="tribe-organizer-email"><?php echo esc_html( $email ); ?></span>
						<?php
					endif;

					if ( ! empty( $website ) ) : ?>
						<div class="tribe-organizer-url">
							<?php
							echo wp_kses( $website, array(
								'a' => array(
									'href'   => true,
									'class'  => true,
									'target' => true,
								),
							) ); ?>
						</div>
						<?php
					endif; ?>
				</div> <!-- .card-footer -->
			<?php
			endif; ?>

		</div> <!-- .tribe-organizer -->
		<?php
	endforeach;

	do_action( 'tribe_events_single_meta_organizer_section_end' ); ?>

</div>
