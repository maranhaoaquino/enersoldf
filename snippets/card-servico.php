<div class="card card-servico" id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
    <div class="card-header">
        <a href="<?php the_permalink(); ?>" rel="bookmark">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="description-card">
        <h5><?php the_title();?></h5>
    </div>
</div>