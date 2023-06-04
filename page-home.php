<?php
/**
 * Template Name: Home
 *
 * The template for displaying pages with sidebar.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<main tabindex="-1" role="main">

			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'content', 'home' );

				endwhile;
			?>

	</main>
<?php
get_footer();
