<div class="col-12">
    <a href="<?php the_permalink(); ?>" class="row">
        <div class="col-12 col-md-6">
            <div class="img-post" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
            </div>
        </div>
        <div class="col-12 col-md-6 d-flex align-items-center">
            <div class="content-post">
                <h3><?php echo the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
            </div>
        </div>
    </a>
</div>