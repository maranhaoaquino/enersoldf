<?php
/**
 * The template for displaying Category pages.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<main tabindex="-1" role="main">

			<?php if ( have_posts() ) : ?>

				<section class="container mt-5">
					<div class="row">
						<div class="col-12 text-center">
							<h1><?php single_term_title(); ?></h1>
						</div>
						<div class="col-12 text-center">
							<?php echo term_description(); ?>
						</div>
					</div>
				</section>

				<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'category' );

						endwhile;

						// Page navigation.
						odin_paging_nav();

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

				endif;
			?>
	</main>

<?php
get_footer();
