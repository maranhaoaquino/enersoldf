<section class="">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?>">
</section>
<section class="container my-5">
    <div class="row gy-4">
        <div class="title-blog">
            <h1><?php echo the_title(); ?></h1>
        </div>
        <div class="col-12">
            <?php echo the_content(); ?>
        </div>
    </div>
</section>