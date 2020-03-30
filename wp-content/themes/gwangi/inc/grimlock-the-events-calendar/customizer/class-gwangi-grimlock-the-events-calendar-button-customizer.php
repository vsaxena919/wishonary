<?php
/**
 * Gwangi_Grimlock_The_Events_Calendar_Button_Customizer Class
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
 * The The Events Calendar class for the Customizer.
 */
class Gwangi_Grimlock_The_Events_Calendar_Button_Customizer {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'grimlock_button_customizer_elements',                                  array( $this, 'add_elements'                                  ), 10, 1 );
		add_filter( 'grimlock_button_customizer_primary_elements',                          array( $this, 'add_primary_elements'                          ), 10, 1 );
		add_filter( 'grimlock_button_customizer_primary_background_color_elements',         array( $this, 'add_primary_background_color_elements'         ), 10, 1 );
		add_filter( 'grimlock_button_customizer_primary_background_color_outputs',          array( $this, 'add_primary_background_color_outputs'          ), 10, 1 );
		add_filter( 'grimlock_button_customizer_primary_color_elements',                    array( $this, 'add_primary_color_elements'                    ), 10, 1 );
		add_filter( 'grimlock_button_customizer_primary_color_outputs',                     array( $this, 'add_primary_color_outputs'                     ), 10, 1 );
		add_filter( 'grimlock_button_customizer_secondary_elements',                        array( $this, 'add_secondary_elements'                        ), 10, 1 );
		add_filter( 'grimlock_button_customizer_secondary_color_elements',                  array( $this, 'add_secondary_color_elements'                  ), 10, 1 );
		add_filter( 'grimlock_button_customizer_secondary_hover_background_color_elements', array( $this, 'add_secondary_hover_background_color_elements' ), 10, 1 );
		add_filter( 'grimlock_button_customizer_border_radius_elements',                    array( $this, 'add_border_radius_elements'                    ), 10, 1 );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the button.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the button.
	 *
	 * @return array           The updated array of CSS selectors for the button.
	 */
	public function add_elements( $elements ) {
		return array_merge( $elements, array(
			'.tribe-block__event-website a',
			'.tribe-block__events-link .tribe-block__btn--link a',
			'.tribe-events-tickets .add-to-cart > a',
			'.tribe_community_edit .tribe-button.submit',
			'.tribe_community_list .tribe-button.submit',
			'.tribe_community_edit .button-primary',
			'.tribe_community_edit .tribe-button.tribe-button-primary',
			'.tribe_community_list .button-primary',
			'.tribe_community_list .tribe-button.tribe-button-primary',

			'.tribe_community_edit .button',
			'.tribe_community_edit #tribe-add-exclusion',
			'.tribe_community_edit .button-secondary',
			'.tribe_community_edit .tribe-add-recurrence.tribe-button',
			'.tribe_community_edit .tribe-button',
			'.tribe_community_list #tribe-add-exclusion',
			'.tribe_community_list .button',
			'.tribe_community_list .button-secondary',
			'.tribe_community_list .tribe-add-recurrence.tribe-button',
			'.tribe_community_list .tribe-button',

			'#tribe_panel_base button',
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the primary button.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the primary button.
	 *
	 * @return array           The updated array of CSS selectors for the primary button.
	 */
	public function add_primary_elements( $elements ) {
		return array_merge( $elements, array(
			'.type-tribe_events div.tribe-block__event-website a',
			'.tribe-block__events-link .tribe-block__btn--link a',
			'.tribe-events-tickets .add-to-cart > a',
			'.tribe_community_edit .tribe-button.submit',
			'.tribe_community_list .tribe-button.submit',
			'.tribe_community_edit .button-primary',
			'.tribe_community_edit .tribe-button.tribe-button-primary',
			'.tribe_community_list .button-primary',
			'.tribe_community_list .tribe-button.tribe-button-primary',
			'#tribe-community-events .tribe-events-community-footer input[type="submit"].button',
			'#tribe_panel_base button',
			'.tribe-community-events-content .tribe-nav .tribe-pagination .current',
			'.tribe-events-single-header .tribe-events-single-categories a:hover',
			'#tribe-events-content table.tribe-events-calendar .type-tribe_events.tribe-event-featured',
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the primary button color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the primary button color.
	 *
	 * @return array           The updated array of CSS selectors for the primary button color.
	 */
	public function add_primary_color_elements( $elements ) {
		return array_merge( $elements, array(
			'#tribe-events-content table.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]',
			'#tribe-events-content table.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-] > a',
			'.tribe-grid-allday .tribe-event-featured.tribe-events-week-allday-single a',
			'.tribe-grid-allday .tribe-event-featured.tribe-events-week-hourly-single a',
			'.tribe-grid-body .tribe-event-featured.tribe-events-week-allday-single a',
			'.tribe-grid-body .tribe-event-featured.tribe-events-week-hourly-single a',
			'.tribe-ui-datepicker.ui-datepicker a.ui-state-active',
			'#tribe-events .tribe-button-field.tribe-active',
			'.ui-timepicker-wrapper .ui-timepicker-list .ui-timepicker-selected',
			'li.ui-timepicker-selected, .ui-timepicker-list li:hover',
			'.ui-timepicker-list .ui-timepicker-selected:hover',
		) );
	}

	/**
	 * Add selectors and properties to the CSS rule-set for the primary button color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $outputs The array of CSS selectors and properties for the primary button color.
	 *
	 * @return array          The updated array of CSS selectors for the primary button color.
	 */
	public function add_primary_color_outputs( $outputs ) {
		return array_merge( $outputs, array(
			array(
				'element'  => implode( ',', array(
					'#tribe-events-content .tribe-events-calendar td.tribe-events-present.mobile-active:hover',
					'.tribe-events-calendar td.tribe-events-present.mobile-active',
					'.tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-]',
					'.tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-] a',
					'#tribe-events-content .tribe-events-calendar .mobile-active:hover',
					'#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active',
					'#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*=tribe-events-daynum-]',
					'#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*=tribe-events-daynum-] a',
					'.tribe-events-calendar .mobile-active div[id*=tribe-events-daynum-]',
					'.tribe-events-calendar .mobile-active div[id*=tribe-events-daynum-] a',
					'.tribe-events-calendar td.mobile-active',
				) ),
				'property' => 'background-color',
				'suffix'   => '!important',
			),
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the primary button background color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the primary button background color.
	 *
	 * @return array           The updated array of CSS selectors for the primary button background color.
	 */
	public function add_primary_background_color_elements( $elements ) {
		return array_merge( $elements, array(
			'#tribe-events-content table.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]',
			'#tribe-events-content table.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-] > a',
			'.tribe-grid-allday .tribe-event-featured.tribe-events-week-allday-single',
			'.tribe-grid-allday .tribe-event-featured.tribe-events-week-hourly-single',
			'.tribe-grid-body .tribe-event-featured.tribe-events-week-allday-single',
			'.tribe-grid-body .tribe-event-featured.tribe-events-week-hourly-single',
			'.datepicker table tr td.active.active',
			'.datepicker table tr td.active.disabled',
			'.datepicker table tr td.active.disabled.active',
			'.datepicker table tr td.active.disabled.disabled',
			'.datepicker table tr td.active.disabled:active',
			'.datepicker table tr td.active.disabled:hover',
			'.datepicker table tr td.active.disabled:hover.active',
			'.datepicker table tr td.active.disabled:hover.disabled',
			'.datepicker table tr td.active.disabled:hover:active',
			'.datepicker table tr td.active.disabled:hover:hover',
			'.datepicker table tr td.active.disabled:hover[disabled]',
			'.datepicker table tr td.active.disabled[disabled]',
			'.datepicker table tr td.active:active',
			'.datepicker table tr td.active:hover',
			'.datepicker table tr td.active:hover.active',
			'.datepicker table tr td.active:hover.disabled',
			'.datepicker table tr td.active:hover:active',
			'.datepicker table tr td.active:hover:hover',
			'.datepicker table tr td.active:hover[disabled]',
			'.datepicker table tr td.active[disabled]',
			'.tribe-ui-datepicker.ui-datepicker a.ui-state-active',
			'#tribe-events .tribe-button-field.tribe-active',
			'.ui-timepicker-wrapper .ui-timepicker-list .ui-timepicker-selected',
			'li.ui-timepicker-selected, .ui-timepicker-list li:hover',
			'.ui-timepicker-list .ui-timepicker-selected:hover',
		) );
	}

	/**
	 * Add selectors and properties to the CSS rule-set for the primary button background color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $outputs The array of CSS selectors and properties for the primary button background color.
	 *
	 * @return array          The updated array of CSS selectors for the primary button background color.
	 */
	public function add_primary_background_color_outputs( $outputs ) {
		return array_merge( $outputs, array(
			array(
				'element'  => implode( ',', array(
					'.tribe-event-featured .card',
				) ),
				'property' => 'border-bottom-color',
			),
			array(
				'element'  => implode( ',', array(
					'.select2-drop-active',
					'.tribe-dropdown.select2-container-active .select2-choice',
					'.tribe-ea-dropdown.select2-container-active .select2-choice',
					'#tribe-events .tribe-button-field.tribe-active',
				) ),
				'property' => 'border-color',
				'suffix'   => '!important',
			),
			array(
				'element'  => implode( ',', array(
					'.tribe-events-list .tribe-events-loop .type-tribe_events.tribe-event-featured .card',
					'.tribe-events-single-header .tribe-events-single-categories a',
				) ),
				'property' => 'border-color',
			),
			array(
				'element'  => implode( ',', array(
					'.tribe-events-list .tribe-events-loop .type-tribe_events.tribe-event-featured a:hover',
					'.tribe-events-list .tribe-events-loop .type-tribe_events.tribe-event-featured a:active',
					'.tribe-events-list .tribe-events-loop .type-tribe_events.tribe-event-featured a:focus',

				) ),
				'property' => 'color',
			),
			array(
				'element'  => implode( ',', array(
					'.recurringinfo .event-is-recurring',
				) ),
				'property' => 'color',
				'suffix'   => '!important',
			),
			array(
				'element'  => implode( ',', array(
					'#tribe-events-content .tribe-events-calendar td.tribe-events-present.mobile-active:hover',
					'.tribe-events-calendar td.tribe-events-present.mobile-active',
					'.tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-]',
					'.tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-] a',
					'#tribe-events-content .tribe-events-calendar .mobile-active:hover',
					'#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active',
					'#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*=tribe-events-daynum-]',
					'#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*=tribe-events-daynum-] a',
					'.tribe-events-calendar .mobile-active div[id*=tribe-events-daynum-]',
					'.tribe-events-calendar .mobile-active div[id*=tribe-events-daynum-] a',
					'.tribe-events-calendar td.mobile-active',
				) ),
				'property' => 'background-color',
				'suffix'   => '!important',
			),
			array(
				'element'  => implode( ',', array(
					'.tribe-community-events-content .tribe-nav .tribe-pagination .current',
				) ),
				'property' => 'background',
				'suffix'   => '!important',
			),
			array(
				'element'  => implode( ',', array(
					'.tribe-event__card',
					'#tribe-events-content .tribe-events-tooltip',
				) ),
				'property' => 'border-top-color',
			),
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the secondary button.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the secondary button.
	 *
	 * @return array           The updated array of CSS selectors for the secondary button.
	 */
	public function add_secondary_elements( $elements ) {
		return array_merge( $elements, array(
			'.tribe_community_edit .button',
			'.tribe_community_edit #tribe-add-exclusion',
			'.tribe_community_edit .button-secondary',
			'.tribe_community_edit .tribe-add-recurrence.tribe-button',
			'.tribe_community_edit .tribe-button',
			'.tribe_community_list #tribe-add-exclusion',
			'.tribe_community_list .button',
			'.tribe_community_list .button-secondary',
			'.tribe_community_list .tribe-add-recurrence.tribe-button',
			'.tribe_community_list .tribe-button',
			'.tribe-section .select2-container-multi .select2-choices .select2-search-choice',
			'#tribe-events .ed_button.button.button-small',
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the secondary button color.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the secondary button color.
	 *
	 * @return array           The updated array of CSS selectors for the secondary button color.
	 */
	public function add_secondary_color_elements( $elements ) {
		return array_merge( $elements, array(
			'.tribe-community-events-content .tribe-nav .my-events-display-options a.tribe-button-tertiary',
			'.tribe-community-events-content .tribe-nav .my-events-display-options a',
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the secondary button background color on hover.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the secondary button background color on hover.
	 *
	 * @return array           The updated array of CSS selectors for the secondary button background color on hover.
	 */
	public function add_secondary_hover_background_color_elements( $elements ) {
		return array_merge( $elements, array(
			'.tribe-community-events-content .tribe-nav .my-events-display-options a',
		) );
	}

	/**
	 * Add CSS selectors to the array of CSS selectors for the button border radius.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $elements The array of CSS selectors for the button border radius.
	 *
	 * @return array           The updated array of CSS selectors for the button border radius.
	 */
	public function add_border_radius_elements( $elements ) {
		return array_merge( $elements, array(
			'.tribe-events-day-time-slot',
			'.tribe-events-list-separator-month',
			'.tribe-grid-allday .tribe-event-featured.tribe-events-week-allday-single',
			'.tribe-grid-allday .tribe-event-featured.tribe-events-week-hourly-single',
			'.tribe-grid-body .tribe-event-featured.tribe-events-week-allday-single',
			'.tribe-grid-body .tribe-event-featured.tribe-events-week-hourly-single',
		) );
	}
}

return new Gwangi_Grimlock_The_Events_Calendar_Button_Customizer();
