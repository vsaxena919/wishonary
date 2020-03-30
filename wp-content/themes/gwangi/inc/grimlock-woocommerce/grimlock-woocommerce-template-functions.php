<?php
/**
 * Gwangi template functions for Grimlock WooCommerce.
 *
 * @package gwangi
 */

if ( ! function_exists( 'gwangi_grimlock_woocommerce_content_product_cat_background_image' ) ) :
	/**
	 * Prints background image for grid layout in product cats.
	 *
	 * @param object $category The object of the product category.
	 */
	function gwangi_grimlock_woocommerce_content_product_cat_background_image( $category ) {
		if ( apply_filters( 'grimlock_woocommerce_content_product_cat_layout', 'layout_default' ) === 'layout_grid' ) {
			$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
			$image_url    = wp_get_attachment_url( $thumbnail_id );
			/* translators: %s: URL for the background image */
			printf( 'style="background-image:url(%s)"', esc_url( $image_url ) );
		}
	}
endif;
