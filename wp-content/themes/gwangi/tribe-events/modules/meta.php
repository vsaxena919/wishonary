<?php
/**
 * Single Event Meta Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta.php
 *
 * @package TribeEventsCalendar
 */

// @codingStandardsIgnoreFile
// Allow plugin text domain in theme and unescaped template tags.

do_action( 'tribe_events_single_meta_before' );

// Do we want to group venue meta separately?
$set_venue_apart = apply_filters( 'tribe_events_single_event_the_meta_group_venue', false, get_the_ID() );

$event_tags = tribe_meta_event_tags( '<span></span>', ', ', false ); ?>

	<div class="tribe-clearfix widget">

		<?php
		do_action( 'tribe_events_single_event_meta_primary_section_start' );

		// If we have no map to embed and no need to keep the venue separate...
		if ( ! $set_venue_apart && ! tribe_embed_google_map() ) :
			tribe_get_template_part( 'modules/meta/venue' );
		elseif ( ! $set_venue_apart && ! tribe_has_organizer() && tribe_embed_google_map() ) :
			// If we have no organizer, no need to separate the venue but we have a map to embed...
			tribe_get_template_part( 'modules/meta/venue' );
			echo '<div class="tribe-events-meta-group tribe-events-meta-group-gmap">';
			tribe_get_template_part( 'modules/meta/map' );
			echo '</div>';
		else :
			// If the venue meta has not already been displayed then it will be printed separately by default.
			$set_venue_apart = true;
		endif; ?>

	</div>

<?php if ( tribe_has_organizer() ) : ?>
	<div class="tribe-clearfix widget">
		<?php tribe_get_template_part( 'modules/meta/organizer' ); ?>
	</div>
<?php endif; ?>

<?php if ( $set_venue_apart ) : ?>
	<div class="tribe-clearfix widget">
		<?php
		do_action( 'tribe_events_single_event_meta_secondary_section_start' );

		tribe_get_template_part( 'modules/meta/venue' );
		tribe_get_template_part( 'modules/meta/map' );

		do_action( 'tribe_events_single_event_meta_secondary_section_end' );
		?>
	</div>
<?php endif; ?>

<?php if ( ! empty( $event_tags ) ) : ?>
	<div class="tribe-clearfix widget">
		<h3 class="widget-title"><?php esc_html_e( 'Event tags', 'the-events-calendar' ); ?></h3>
		<dl>
			<?php echo wp_kses_post( $event_tags ); ?>
		</dl>
	</div> <!-- .widget -->
<?php endif; ?>

<?php do_action( 'tribe_events_single_meta_after' );
