<?php
/**
 * Gwangi_Grimlock_WooCommerce_Navbar_Nav_Menu_Component Class
 *
 * @author   Themosaurus
 * @since    1.0.0
 * @package  grimlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Gwangi_Grimlock_WooCommerce_Navbar_Nav_Menu_Component' ) ) :
	/**
	 * Class Gwangi_Grimlock_WooCommerce_Navbar_Nav_Menu_Component
	 */
	class Gwangi_Grimlock_WooCommerce_Navbar_Nav_Menu_Component extends Grimlock_Component {
		/**
		 * Render the current component with props data on page.
		 *
		 * @since 1.0.0
		 */
		public function render() {
			?>
			<ul <?php $this->render_class(); ?>>
				<li class="menu-item menu-item-has-children">
					<?php grimlock_woocommerce_cart_link(); ?>
					<ul class="sub-menu">
						<li>
							<?php
							if ( class_exists( 'WC_Widget_Cart' ) ) :
								the_widget( 'WC_Widget_Cart', 'title=' );
							endif; ?>
							<?php if ( is_user_logged_in() ) : ?>
								<?php if ( class_exists( 'YITH_WCWL' ) ) : ?>
									<?php $wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
									<div class="widget_shopping_cart">
										<div class="woocommerce-mini-cart__buttons buttons">
											<a href="<?php echo esc_url( $wishlist_url ); ?>" class="button btn-xs w-100 rounded-0 text-center"><?php esc_html_e( 'My wishlist', 'gwangi' ); ?></a>
										</div>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						</li>
					</ul>
				</li>
			</ul>
			<?php
		}
	}
endif;
