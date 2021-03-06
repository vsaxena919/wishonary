<?php
/**
 * Gwangi_Grimlock_Hero_Customizer Class
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
 * The hero class for the Customizer.
 */
class Gwangi_Grimlock_Hero_Customizer extends Grimlock_Hero_Customizer {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		parent::__construct();
		add_filter( 'grimlock_hero_customizer_defaults',          array( $this, 'change_defaults'          ), 10, 1 );
		add_filter( 'grimlock_hero_customizer_layout_field_args', array( $this, 'change_layout_field_args' ), 10, 1 );
		add_filter( 'body_class',                                 array( $this, 'add_body_classes'         ), 10, 1 );

		add_filter( 'grimlock_hero_customizer_border_bottom_width_field_args', array( $this, 'change_border_bottom_fields_args' ), 10, 1 );
		add_filter( 'grimlock_hero_customizer_border_bottom_color_field_args', array( $this, 'change_border_bottom_fields_args' ), 10, 1 );
	}

	/**
	 * Register default values, settings and custom controls for the Theme Customizer.
	 *
	 * @since 1.0.0
	 */
	public function add_customizer_fields() {
		parent::add_customizer_fields();
		$this->defaults = apply_filters( 'gwangi_grimlock_hero_customizer_defaults', array_merge( $this->defaults, array(
			'hero_scroll_to_content_button_text'      => esc_attr__( 'Discover Gwangi', 'gwangi' ),
			'hero_scroll_to_content_button_displayed' => true,
			'hero_secondary_background_color'         => GWANGI_HERO_BACKGROUND_SECONDARY,
			'hero_form_color_scheme'                  => GWANGI_HERO_COLOR_SCHEME,
			'hero_bevel_displayed'                    => true,
		) ) );

		// @codingStandardsIgnoreStart
		// Allow associative array to be declared in a single line.
		$this->add_divider_field(                            array( 'priority' => 110 ) );
		$this->add_scroll_to_content_button_text_field(      array( 'priority' => 110 ) );
		$this->add_scroll_to_content_button_displayed_field( array( 'priority' => 120 ) );

		$this->add_divider_field(                            array( 'priority' => 381 ) );
		$this->add_secondary_background_color_field(         array( 'priority' => 381 ) );

		$this->add_bevel_displayed_field(                    array( 'priority' => 431 ) );
		// @codingStandardsIgnoreEnd
	}

	/**
	 * Add tabs to the Customizer to group controls.
	 *
	 * @param  array $js_data The array of data for the Customizer controls.
	 *
	 * @return array          The filtered array of data for the Customizer controls.
	 */
	public function add_customizer_controls_js_data( $js_data ) {
		$js_data['tabs'][ $this->section ][0]['controls'][] = "{$this->section}_divider_110";
		$js_data['tabs'][ $this->section ][0]['controls'][] = 'hero_scroll_to_content_button_text';
		$js_data['tabs'][ $this->section ][0]['controls'][] = 'hero_scroll_to_content_button_displayed';

		$js_data['tabs'][ $this->section ][2]['controls'][] = "{$this->section}_divider_381";
		$js_data['tabs'][ $this->section ][2]['controls'][] = 'hero_secondary_background_color';
		$js_data['tabs'][ $this->section ][2]['controls'][] = "{$this->section}_divider_382";
		$js_data['tabs'][ $this->section ][2]['controls'][] = 'hero_bevel_displayed';
		return $js_data;
	}

	/**
	 * Add a Kirki color field to set the background color in the Customizer.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args The array of arguments for the Kirki field.
	 */
	protected function add_secondary_background_color_field( $args = array() ) {
		if ( class_exists( 'Kirki' ) ) {
			$elements = apply_filters( 'gwangi_grimlock_hero_customizer_secondary_background_color_elements', array(
				'.grimlock-hero.region--6-6-cols-left:after',
				'.grimlock-hero.region--6-6-cols-left-reverse:after',
				'.grimlock-hero.region--12-cols-center-boxed .section__content',
			) );

			$outputs = apply_filters( 'gwangi_grimlock_hero_customizer_secondary_background_color_outputs', array(
				array(
					'element'  => implode( ',', $elements ),
					'property' => 'background-color',
				),
			) );

			$args = wp_parse_args( $args, array(
				'type'      => 'color',
				'label'     => esc_html__( 'Content Background Color', 'gwangi' ),
				'section'   => $this->section,
				'settings'  => 'hero_secondary_background_color',
				'default'   => $this->get_default( 'hero_secondary_background_color' ),
				'choices'   => array(
					'alpha'    => true,
					'palettes' => apply_filters( 'grimlock_color_field_palettes', array() ),
				),
				'priority'  => 10,
				'transport' => 'postMessage',
				'output'    => $outputs,
				'js_vars'   => $this->to_js_vars( $outputs ),
			) );

			Kirki::add_field( 'grimlock', apply_filters( 'gwangi_grimlock_hero_customizer_secondary_background_color_field_args', $args ) );
		}
	}

	/**
	 * Add a Kirki text field to set the scroll to content button label in the Customizer.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args The array of arguments for the Kirki field.
	 */
	protected function add_scroll_to_content_button_text_field( $args = array() ) {
		if ( class_exists( 'Kirki' ) ) {
			$elements = apply_filters( 'gwangi_grimlock_hero_customizer_scroll_to_content_button_text_elements', array(
				'#homepage-anchor span',
			) );

			$args = wp_parse_args( $args, array(
				'type'              => 'text',
				'label'             => esc_html__( 'Scroll To Content Button Text', 'gwangi' ),
				'section'           => $this->section,
				'settings'          => 'hero_scroll_to_content_button_text',
				'default'           => $this->get_default( 'hero_scroll_to_content_button_text' ),
				'priority'          => 10,
				'sanitize_callback' => 'wp_kses_post',
				'transport'         => 'postMessage',
				'js_vars'           => array(
					array(
						'function' => 'html',
						'element'  => implode( ',', $elements ),
					),
				),
			) );

			Kirki::add_field( 'grimlock', apply_filters( 'grimlock_hero_customizer_scroll_to_content_button_text_field_args', $args ) );
		}
	}

	/**
	 * Add a Kirki checkbox field to set the scroll to content button display in the Customizer.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args The array of arguments for the Kirki field.
	 */
	protected function add_scroll_to_content_button_displayed_field( $args = array() ) {
		if ( class_exists( 'Kirki' ) ) {
			$args = wp_parse_args( $args, array(
				'type'     => 'checkbox',
				'section'  => $this->section,
				'label'    => esc_html__( 'Display scroll to content button', 'gwangi' ),
				'settings' => 'hero_scroll_to_content_button_displayed',
				'default'  => $this->get_default( 'hero_scroll_to_content_button_displayed' ),
				'priority' => 10,
			) );

			Kirki::add_field( 'grimlock', apply_filters( 'gwangi_grimlock_hero_customizer_scroll_to_content_button_displayed_field_args', $args ) );
		}
	}

	/**
	 * Add a Kirki checkbox field to set the hero bevel display in the Customizer.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args The array of arguments for the Kirki field.
	 */
	protected function add_bevel_displayed_field( $args = array() ) {
		if ( class_exists( 'Kirki' ) ) {
			$args = wp_parse_args( $args, array(
				'type'     => 'checkbox',
				'section'  => $this->section,
				'label'    => esc_html__( 'Display Bottom Bevel', 'gwangi' ),
				'settings' => 'hero_bevel_displayed',
				'default'  => $this->get_default( 'hero_bevel_displayed' ),
				'priority' => 10,
			) );

			Kirki::add_field( 'grimlock', apply_filters( 'gwangi_grimlock_hero_customizer_bevel_displayed_field_args', $args ) );
		}
	}

	/**
	 * Change default values and control settings for the Customizer.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $defaults The array of default values for the Customizer controls.
	 *
	 * @return array           The updated array of default values for the Customizer controls.
	 */
	public function change_defaults( $defaults ) {
		// @codingStandardsIgnoreStart
		$allowed_html = array(
			'em'     => array( 'class' => array() ),
			'i'      => array( 'class' => array() ),
			'b'      => array( 'class' => array() ),
			'strong' => array( 'class' => array() ),
			'ins'    => array( 'class' => array() ),
			'del'    => array( 'class' => array() ),
			'span'   => array( 'class' => array() ),
			'br'     => array( 'class' => array() ),
			'a'      => array( 'href'  => array(), 'title' => array(), 'class' => array() ),
		);
		// @codingStandardsIgnoreEnd

		$hero_title    = wp_kses( __( GWANGI_HERO_TITLE,    'gwangi' ), $allowed_html );
		$hero_subtitle = wp_kses( __( GWANGI_HERO_SUBTITLE, 'gwangi' ), $allowed_html );
		$hero_text     = wp_kses( __( GWANGI_HERO_TEXT,     'gwangi' ), $allowed_html );

		$defaults['hero_full_screen_displayed'] = GWANGI_HERO_FULL_SCREEN_DISPLAYED;
		$defaults['hero_padding_y']             = GWANGI_HERO_PADDING_Y;

		$defaults['hero_background_image'] = get_stylesheet_directory_uri() . '/assets/images/hero/hero-default.jpg';
		$defaults['hero_background_color'] = GWANGI_HERO_BACKGROUND;

		$defaults['hero_title']           = $hero_title;
		$defaults['hero_title_font']      = array(
			'font-family'    => GWANGI_HERO_TITLE_FONT_FAMILY,
			'font-weight'    => GWANGI_HERO_TITLE_FONT_WEIGHT,
			'font-size'      => GWANGI_HERO_TITLE_FONT_SIZE,
			'line-height'    => GWANGI_HERO_TITLE_LINE_HEIGHT,
			'letter-spacing' => GWANGI_HERO_TITLE_LETTER_SPACING,
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => GWANGI_HERO_TITLE_TEXT_TRANSFORM,
		);
		$defaults['hero_title_color']     = GWANGI_HERO_TITLE_COLOR;
		$defaults['hero_title_displayed'] = GWANGI_HERO_TITLE_DISPLAYED;

		$defaults['hero_subtitle']           = $hero_subtitle;
		$defaults['hero_subtitle_font']      = array(
			'font-family'    => GWANGI_HERO_SUBTITLE_FONT_FAMILY,
			'font-weight'    => GWANGI_HERO_SUBTITLE_FONT_WEIGHT,
			'font-size'      => GWANGI_HERO_SUBTITLE_FONT_SIZE,
			'line-height'    => GWANGI_HERO_SUBTITLE_LINE_HEIGHT,
			'letter-spacing' => GWANGI_HERO_SUBTITLE_LETTER_SPACING,
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => GWANGI_HERO_SUBTITLE_TEXT_TRANSFORM,
		);
		$defaults['hero_subtitle_color']     = GWANGI_HERO_SUBTITLE_COLOR;
		$defaults['hero_subtitle_displayed'] = GWANGI_HERO_SUBTITLE_DISPLAYED;

		$defaults['hero_text']           = $hero_text;
		$defaults['hero_text_font']      = array(
			'font-family'    => GWANGI_HERO_TEXT_FONT_FAMILY,
			'font-weight'    => GWANGI_HERO_TEXT_FONT_WEIGHT,
			'font-size'      => GWANGI_HERO_TEXT_FONT_SIZE,
			'line-height'    => GWANGI_HERO_TEXT_LINE_HEIGHT,
			'letter-spacing' => GWANGI_HERO_TEXT_LETTER_SPACING,
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => GWANGI_HERO_TEXT_TRANSFORM,
		);
		$defaults['hero_text_color']     = GWANGI_HERO_TEXT_COLOR;
		$defaults['hero_text_displayed'] = GWANGI_HERO_TEXT_DISPLAYED;

		$defaults['hero_button_displayed']              = GWANGI_HERO_BUTTON_DISPLAYED;
		$defaults['hero_button_text']                   = esc_attr__( 'Find out more', 'gwangi' );
		$defaults['hero_button_color']                  = GWANGI_HERO_BUTTON_COLOR;
		$defaults['hero_button_background_color']       = GWANGI_HERO_BUTTON_BACKGROUND_COLOR;
		$defaults['hero_button_border_color']           = GWANGI_HERO_BUTTON_BORDER_COLOR;
		$defaults['hero_button_hover_background_color'] = GWANGI_HERO_BUTTON_HOVER_BACKGROUND_COLOR;
		$defaults['hero_button_hover_color']            = GWANGI_HERO_BUTTON_HOVER_COLOR;
		$defaults['hero_button_hover_border_color']     = GWANGI_HERO_BUTTON_HOVER_BORDER_COLOR;

		$defaults['hero_background_gradient_displayed']    = GWANGI_HERO_BACKGROUND_GRADIENT_DISPLAYED;
		$defaults['hero_background_gradient_first_color']  = GWANGI_HERO_BACKGROUND_GRADIENT_FIRST_COLOR;
		$defaults['hero_background_gradient_second_color'] = GWANGI_HERO_BACKGROUND_GRADIENT_SECOND_COLOR;
		$defaults['hero_background_gradient_direction']    = GWANGI_HERO_BACKGROUND_GRADIENT_DIRECTION;
		$defaults['hero_background_gradient_position']     = GWANGI_HERO_BACKGROUND_GRADIENT_POSITION;

		$defaults['hero_layout']           = GWANGI_HERO_LAYOUT;
		$defaults['hero_container_layout'] = GWANGI_HERO_CONTAINER_LAYOUT;
		$defaults['hero_mobile_displayed'] = true;

		$defaults['text_wpautoped'] = false;

		return $defaults;
	}

	/**
	 * Change thumbnails for Kirki field in the Customizer
	 *
	 * @since 1.0.0
	 *
	 * @param  array $args The array of arguments for the Kirki field.
	 *
	 * @return array       The updated array of arguments for the Kirki field.
	 */
	public function change_layout_field_args( $args ) {
		$args['choices'] = array(
			'12-cols-center-boxed'  => get_template_directory_uri() . '/assets/images/customizer/hero-12-cols-center-boxed.png',
			'12-cols-left'          => GRIMLOCK_HERO_PLUGIN_DIR_URL . 'assets/images/hero-12-cols-left.png',
			'12-cols-center'        => GRIMLOCK_HERO_PLUGIN_DIR_URL . 'assets/images/hero-12-cols-center.png',
			'12-cols-right'         => GRIMLOCK_HERO_PLUGIN_DIR_URL . 'assets/images/hero-12-cols-right.png',
			'6-6-cols-left'         => get_template_directory_uri() . '/assets/images/customizer/hero-6-6-cols-left.png',
			'6-6-cols-left-reverse' => get_template_directory_uri() . '/assets/images/customizer/hero-6-6-cols-left-reverse.png',
		);
		return $args;
	}

	/**
	 * Add arguments using theme mods to customize the hero component.
	 *
	 * @param array $args The default arguments to render the hero.
	 *
	 * @return array      The arguments to render the hero.
	 */
	public function add_args( $args ) {
		$args['scroll_to_content_button_displayed'] = $this->get_theme_mod( 'hero_scroll_to_content_button_displayed' );
		$args['scroll_to_content_button_text']      = $this->get_theme_mod( 'hero_scroll_to_content_button_text' );
		return $args;
	}

	/**
	 * Add custom classes to body to modify layout.
	 *
	 * @since 1.0.0
	 * @param $classes
	 *
	 * @return string
	 */
	public function add_body_classes( $classes ) {
		if ( ! empty( $this->get_theme_mod( 'hero_bevel_displayed' ) ) ) {
			$classes[] = 'grimlock--hero-bevel-displayed';
		}
		return $classes;
	}

	/**
	 * Change border bottom fields args
	 *
	 * @param array $args The Kirki field args
	 *
	 * @return array The modified Kirki field args
	 */
	public function change_border_bottom_fields_args( $args ) {
		$args['active_callback'] = array(
			array(
				'setting'  => 'hero_bevel_displayed',
				'operator' => '==',
				'value'    => false,
			),
		);
		return $args;
	}

	/**
	 * Add custom styles based on theme mods.
	 *
	 * @param string $styles The styles printed by Kirki
	 *
	 * @since 1.0.0
	 */
	public function add_dynamic_css( $styles ) {
		$hero_title_color = $this->get_theme_mod( 'hero_title_color' );
		$styles .= "
		#hero.grimlock-hero--full-screen-displayed + #homepage-anchor,
		body:not(.grimlock--hero-bevel-displayed) .grimlock-hero:not([data-parallax]).region--12-cols-center-boxed + #homepage-anchor {
			color: {$hero_title_color};
		}";

		return $styles;
	}
}

return new Gwangi_Grimlock_Hero_Customizer();
