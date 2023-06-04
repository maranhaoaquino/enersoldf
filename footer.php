<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

		</div>
	</div>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<h3>Solicite seu orçamento gratuito agora</h3>
				</div>
				<div class="col-12 col-md-6"></div>
			</div>
		</div>
	</section>

	<footer id="footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<?php if(has_custom_logo()){ ?>
						<?php odin_the_custom_logo(); ?>
					<?php } else { ?>
						<div class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</div>
					<?php } ?>
				</div>
				<div class="col-12 col-md-3">
					<h3>Informações</h3>
				</div>
				<div class="col-12 col-md-3">
					<h3>Redes Sociais</h3>
				</div>
			</div>
		</div>
	</footer>
	<section>
		<div class="container">
			<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'odin' ); ?> | <?php echo sprintf( __( 'Powered by the <a href="%s" rel="nofollow" target="_blank">Luketa.me</a> forces and <a href="%s" rel="nofollow" target="_blank">GC Midia</a>.', 'odin' ), 'http://luketa.me/', 'http://wordpress.org/' ); ?></p>
		</div>
	</section>

	<?php wp_footer(); ?>
</body>
</html>
