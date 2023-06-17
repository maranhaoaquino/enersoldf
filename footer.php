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
	<section id="orcamento" class="pt-5">
		<div class="container">
			<div class="row gy-4">
				<div class="col-12 col-md-6 d-flex align-items-center">
					<div class="w-100">
						<h3 class="link-contrast-color">Solicite seu orçamento gratuito agora</h3>
						<?php echo odin_contact_form()->render(); ?>
					</div>
				</div>
				<div class="col-12 col-md-6 d-none d-md-block">
					<?php $imagem_form = get_page_by_path('contato')->ID; ?>
					<img  src="<?php the_field_cmb2('imagem_contact_form', $imagem_form) ?>">
				</div>
			</div>
		</div>
	</section>

	<footer id="footer" class="py-5" role="contentinfo">
		<div class="container">
			<div class="row gy-4">
				<div id="logo-footer" class="col-12 col-md-4 d-flex align-items-center">
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
				<div id="contato-footer" class="col-12 col-md-4">
					<h4 class="secondary--color">Informações</h4>
					<ul id="informacoes-contato">
						<?php $odin_contact_opts = get_option( 'odin_contact' ); ?>
						<li><ion-icon name="pin"></ion-icon><?php echo $odin_contact_opts['odin_endereco']; ?></li>
						<li><ion-icon name="logo-whatsapp"></ion-icon><?php echo $odin_contact_opts['odin_whatsapp']; ?></li>
						<li><ion-icon name="call-outline"></ion-icon><?php echo $odin_contact_opts['odin_telefone']; ?></li>
						<li><ion-icon name="mail-outline"></ion-icon><?php echo $odin_contact_opts['odin_email']; ?></li>
					</ul>
				</div>
				<div id="redes-sociais-footer" class="col-12 col-md-4">
					<h4 class="secondary--color">Redes Sociais</h4>
					<div id="redes-sociais">
						<?php $odin_contact_opts = get_option( 'odin_contact' ); ?>
						<?php if ($odin_contact_opts['odin_whatsapp']) :
							$whatsapp = str_replace('(', '', $odin_contact_opts['odin_whatsapp']);
							$whatsapp1 = str_replace(')', '', $whatsapp);
							$whatsapp2 = str_replace('-', '', $whatsapp1);
							$whatsapp3 = str_replace(' ', '', $whatsapp2);
						?>
						<?php endif; ?>
						<a href="https://wa.me/55<?php echo $whatsapp3;?>?text=Ola!%20Gostaria%20de%20um%20orçamento">
							<ion-icon name="logo-whatsapp"></ion-icon>
						</a>
						<a href="<?php echo $odin_contact_opts['odin_instagram']; ?>">
							<ion-icon name="logo-instagram"></ion-icon>
						</a>
						<a href="<?php echo $odin_contact_opts['odin_linkedin']; ?>">
							<ion-icon name="logo-linkedin"></ion-icon>
						</a>
						<a href="<?php echo $odin_contact_opts['odin_facebook']; ?>">
							<ion-icon name="logo-facebook"></ion-icon>
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<section id="powered-by" class="pt-2">
		<div class="container">
			<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'odin' ); ?> | <?php echo sprintf( __( 'Powered by the <a href="%s" rel="nofollow" target="_blank">Luketa.me</a> forces and <a href="%s" rel="nofollow" target="_blank">GC Midia</a>.', 'odin' ), 'http://luketa.me/', 'http://www.instagram.com/gutemberg.ads/' ); ?></p>
		</div>
	</section>

	<script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
	<script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"> </script>
	<?php wp_footer(); ?>
</body>
</html>
