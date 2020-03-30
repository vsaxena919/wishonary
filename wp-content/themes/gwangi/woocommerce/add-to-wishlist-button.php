<?php
/**
 * Add to wishlist button template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.8
 */

// @codingStandardsIgnoreFile
// Allow plugin text domain in theme and unescaped template tags.

// Exit if accessed directly.
if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
}

global $product;
?>

<span class="ajax-loading">
	<i class="fa fa-circle-o-notch fa-spin"></i>
</span>

<a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $product_id ) ); ?>" rel="nofollow" data-product-id="<?php echo esc_attr( $product_id ); ?>" data-product-type="<?php echo esc_attr( $product_type ); ?>" class="<?php echo esc_attr( $link_classes ); ?>">
	<?php echo wp_kses_post( $icon ); ?>
	<?php echo wp_kses_post( $label ); ?>
</a>

