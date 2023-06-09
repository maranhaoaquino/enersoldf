<div class="card card-produto" id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
    <div class="card-header">
        <a href="<?php the_permalink(); ?>" rel="bookmark">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="card-body">
        <div class="description-card text-center">
            <h3><?php the_title();?></h3>
        </div>
        <div class="orcamento-card">
            <a class="btn btn-primary card--btn" href="">Orçamento <ion-icon name="logo-whatsapp"></ion-icon></a>
        </div>
    </div>
</div>