<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by product category.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<main tabindex="-1" role="main">
		<section class="container mt-5">
			<div class="row gy-4">
				<div class="col-12 text-center">
					<h1><?php single_term_title(); ?></h1>
				</div>
				<div class="col-12 text-center">
					<?php echo term_description(); ?>
				</div>
			</div>
		</section>
		<section class="conteiner mt-3 mb-5">
			<div class="row gy-4">
				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();
						get_template_part( 'content', 'taxonomy' );
					endwhile;
				?>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();