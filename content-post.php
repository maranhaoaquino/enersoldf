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
    <div class="row gy-4">
        <div class="col-12">
            <?php echo the_content(); ?>
        </div>
    </div>
</section>