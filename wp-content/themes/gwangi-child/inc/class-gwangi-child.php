<?php
/**
 * Gwangi_Child Class
 *
 * @author  Themosaurus
 * @since   1.0.0
 * @package  gwangi
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The main Gwangi_Child class
 */
class Gwangi_Child {
	/**
	 * Setup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ), 10 );
		add_action( 'after_setup_theme',  array( $this, 'setup'              ), 20 );
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0.0
	 */
	public function setup() {
		/*
		 * Make child theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gwangi-child, use a find and replace
		 * to change 'gwangi-child' to the name of your theme in all the template files.
		 */
		load_child_theme_textdomain( 'gwangi', get_stylesheet_directory() . '/languages' );
	}

	/**
	 * Enqueue scripts and stylesheets.
	 *
	 * @since 1.0.0
	 */
	public function wp_enqueue_scripts() {
		/**
		 * Enqueue styles.
		 */
		wp_enqueue_style( 'gwangi-style', get_template_directory_uri() . '/style.css', array(), GWANGI_CHILD_VERSION );
		wp_enqueue_style( 'gwangi-child-style', get_stylesheet_uri(), array( 'gwangi-style' ), GWANGI_CHILD_VERSION );

		/**
		 * Enqueue scripts.
		 */
		wp_enqueue_script( 'gwangi-child', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), GWANGI_CHILD_VERSION, true );
	}
}

return new Gwangi_Child();
