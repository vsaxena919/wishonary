<?php
/**
 * Gwangi_WooCommerce Class
 *
 * @author   Themosaurus
 * @since    1.0.0
 * @package  gwangi
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Gwangi_WooCommerce' ) ) :
	/**
	 * The main Gwangi_WooCommerce class
	 */
	class Gwangi_WooCommerce {
		/**
		 * Setup class.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme',                             array( $this, 'setup'                        ), 10    );
			add_filter( 'gwangi_widget_areas',                           array( $this, 'add_widget_areas'             ), 10, 1 );

			remove_filter( 'woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories'  );
			add_filter( 'woocommerce_product_loop_start',    array( $this, 'maybe_show_product_categories' ) );

			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
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
			add_theme_support( 'wc-product-gallery-zoom'     );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider'   );
		}

		/**
		 * Add widget areas for the theme.
		 *
		 * @since 1.0.0
		 *
		 * @param  array $widget_areas The array of registered widget areas.
		 *
		 * @return array               The updated array of registered widget areas.
		 */
		public function add_widget_areas( $widget_areas ) {
			return array_merge( $widget_areas, array(
				array(
					'id'          => 'wc-filters-sidebar',
					'name'        => esc_html__( 'WooCommerce Filters', 'gwangi' ),
					'description' => esc_html__( 'The area for the filters displayed in WooCommerce pages.', 'gwangi' ),
				),
			) );
		}

		/**
		 * Display the product categories if needed
		 *
		 * @param string $loop_html The html for the products loop.
		 *
		 * @return string The modified html for the products loop.
		 */
		public function maybe_show_product_categories( $loop_html ) {
			if ( ! $GLOBALS['woocommerce_loop']['is_shortcode'] ) {

				$display_type = woocommerce_get_loop_display_mode();

				// If displaying categories, append to the loop.
				if ( 'subcategories' === $display_type || 'both' === $display_type ) {
					$parent_id  = is_product_category() ? get_queried_object_id() : 0;
					$categories = woocommerce_get_product_subcategories( $parent_id );

					if ( ! empty( $categories ) ) {
						$loop_html .= sprintf( '<li class="product-categories product-categories-count--%s w-100 d-block float-left clearfix"><ul>', count( $categories ) );
						$loop_html .= woocommerce_maybe_show_product_subcategories( $loop_html );
						$loop_html .= '</ul></li>';
					}
				}
			}

			return $loop_html;
		}
	}
endif;

return new Gwangi_WooCommerce();
