<?php
/**
 * Gwangi template hooks for WooCommerce.
 *
 * @package gwangi
 */

/**
 * Content wrapper hooks.
 *
 * @since 1.0.0
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper',            10 );
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end',        10 );
add_action(    'woocommerce_before_main_content', 'gwangi_woocommerce_output_content_wrapper',     10 );
add_action(    'woocommerce_after_main_content',  'gwangi_woocommerce_output_content_wrapper_end', 10 );

/**
 * Breadcrumb hooks.
 *
 * @since 1.0.0
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

/**
 * Sidebar hooks.
 *
 * @since 1.0.0
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
