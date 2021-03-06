<?php
/**
 * The template for displaying the homepage.
 *
 * Template Name: Homepage Template
 *
 * @package gwangi
 */

get_header(); ?>

	<div id="primary">
		<main id="main" class="site-main">

			<?php
			/**
			 * Functions hooked into gwangi_homepage action
			 *
			 * @hooked gwangi_grimlock_homepage - 10
			 */
			do_action( 'gwangi_homepage' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
