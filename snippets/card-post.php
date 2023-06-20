<div class="col-12">
    <a href="<?php the_permalink(); ?>" class="row">
        <div class="col-12 col-md-5">
            <div class="img-post" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
            </div>
        </div>
        <div class="col-12 col-md-7 d-flex align-items-center">
            <div class="content-post">
                <h3 class="title-post"><?php echo the_title(); ?></h3>
                <div class="excerpt-post"><?php the_excerpt(); ?></div>
            </div>
        </div>
    </a>
</div>