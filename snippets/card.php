<div class="card card-produto" id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
    <div class="card-header">
        <a href="<?php the_permalink(); ?>" rel="bookmark">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="card-body">
        <div class="description-card text-center">
            <h3 class="title-card"><?php the_title();?></h3>
            <div class="description-card"><?php the_excerpt(); ?></div>
        </div>
        <div class="orcamento-card">
            <?php $odin_contact_opts = get_option( 'odin_contact' ); ?>
			<?php if ($odin_contact_opts['odin_whatsapp']) :
				$whatsapp = str_replace('(', '', $odin_contact_opts['odin_whatsapp']);
				$whatsapp1 = str_replace(')', '', $whatsapp);
				$whatsapp2 = str_replace('-', '', $whatsapp1);
				$whatsapp3 = str_replace(' ', '', $whatsapp2);
			?>
			<?php endif; ?>
            <?php
                $chamada = get_the_title();
                $chamada2 = str_replace(' ', '%20', $chamada);
            ?>
            <a class="btn btn-primary card--btn" href="https://wa.me/55<?php echo $whatsapp3;?>?text=Ola!%20Gostaria%20de%20um%20orçamento%20para%20<?php echo $chamada2; ?>">Orçamento <ion-icon name="logo-whatsapp"></ion-icon></a>
        </div>
    </div>
</div>