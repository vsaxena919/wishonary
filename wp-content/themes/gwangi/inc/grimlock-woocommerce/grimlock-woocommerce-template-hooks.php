<?php
/**
 * Gwangi template Hooks for Grimlock WooCommerce.
 *
 * @package gwangi
 */

/**
 * Background Image for product cat hook.
 *
 * @see gwangi_grimlock_woocommerce_content_product_cat_background_image()
 *
 * @since 1.0.0
 */
add_action( 'gwangi_content_product_cat_background_image', 'gwangi_grimlock_woocommerce_content_product_cat_background_image', 10 );
