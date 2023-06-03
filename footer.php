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

		</div><!-- .row -->
	</div><!-- #wrapper -->

	<footer id="footer" role="contentinfo">
		<div class="container">
			<div class="col-12 col-md-3"></div>
			<div class="col-12 col-md-3"></div>
			<div class="col-12 col-md-3"></div>
			<div class="col-12 col-md-3"></div>
		</div>
		<div class="container">
			<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'odin' ); ?> | <?php echo sprintf( __( 'Powered by the <a href="%s" rel="nofollow" target="_blank">Luketa.me</a> forces and <a href="%s" rel="nofollow" target="_blank">GC Midia</a>.', 'odin' ), 'http://luketa.me/', 'http://wordpress.org/' ); ?></p>
		</div><!-- .container -->
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>
