<div class="col-12">
    <a href="<?php the_permalink(); ?>" class="row">
        <div class="col-6">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?>" width="100%">
        </div>
        <div class="col-6">
            <h3><?php echo the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p>
        </div>
    </a>
</div>