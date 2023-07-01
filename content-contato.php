<section id="topo-img" style="background-image: url(<?php the_post_thumbnail_url(); ?>); position: relative">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div id="title-topo" class="col-8 text-center">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>
<section class="container my-5">
    <div class="row mb-4 gy-4">
        <?php $odin_contact_opts = get_option( 'odin_contact' ); ?>
		<?php if ($odin_contact_opts['odin_whatsapp']) :
			$whatsapp = str_replace('(', '', $odin_contact_opts['odin_whatsapp']);
			$whatsapp1 = str_replace(')', '', $whatsapp);
			$whatsapp2 = str_replace('-', '', $whatsapp1);
			$whatsapp3 = str_replace(' ', '', $whatsapp2);
		?>
		<?php endif; ?>
        <div class="col-6 col-md-3">
            <a class="icon-contato" href="https://wa.me/55<?php echo $whatsapp3;?>?text=Ola!%20Gostaria%20de%20um%20orçamento">
				<ion-icon name="logo-whatsapp"></ion-icon>
			</a>
        </div>
        <div class="col-6 col-md-3">
            <a class="icon-contato" href="<?php echo $odin_contact_opts['odin_instagram']; ?>">
				<ion-icon name="logo-instagram"></ion-icon>
			</a>
        </div>
        <div class="col-6 col-md-3">
            <a class="icon-contato" href="<?php echo $odin_contact_opts['odin_linkedin']; ?>">
				<ion-icon name="logo-linkedin"></ion-icon>
			</a>
        </div>
        <div class="col-6 col-md-3">
            <a class="icon-contato" href="<?php echo $odin_contact_opts['odin_facebook']; ?>">
				<ion-icon name="logo-facebook"></ion-icon>
			</a>
        </div>
    </div>
    <div class="row my-4 justify-content-center">
        <div id="map" class="col-12">
            <iframe src="<?php the_field_cmb2('map_contact'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>