<section>
    <img src="<?php the_field_cmb2('img_destaque'); ?>" alt="">
</section>
<section class="container my-5">
    <div class="row gy-4">
        <div class="col-12 text-center">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="col-12">
            <?php the_content(); ?>
        </div>
        <div class="col-12">
            <div class="row gy-4">
                <div class="col-12 col-md-6">
                    <div id="slide-servico" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="<?php the_post_thumbnail_url(); ?>">
                            <?php $thumbs = get_field_cmb2('thumb_servico'); ?>
                            <?php if(!empty($thumbs)){foreach($thumbs as $thumb){ ?>
                                <div class="item">
                                    <img src="<?php echo $thumb; ?>">
                                </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div id="product-description">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_field_cmb2('destaque_textarea'); ?></p>
                        <div class="orcamento-card">
                            <a class="btn btn-primary card--btn" href="">Orçamento <ion-icon name="logo-whatsapp"></ion-icon></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $args = array (
                'post_type' => 'servico',
                'orderby' => 'ID',
                'order'   => 'DESC',
                'nopaging' => false,
                'posts_per_page' => '12',
                'post_status' => 'publish'
            );
            $the_query = new WP_Query ( $args );
        ?>
        <div class="col-12">
            <div class="row gy-3">
                <div class="col-12 text-center">
                    <h2>Conheça nossos serviços</h2>
                </div>
                <div class="owl-carousel owl-theme slide--card">
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="item">
                            <?php include(TEMPLATEPATH . "/snippets/card.php"); ?>
                        </div>
                    <?php endwhile; else: endif; ?>
                    <?php wp_reset_query(); wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('#slide-servico').owlCarousel({
        loop:false,
        nav:true,
        items: 1,
        dots: true,
        video: true,
        merge:true,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ],
    });

    $('.slide--card').owlCarousel({
        loop:false,
        nav:true,
        responsive:{
            0:{
                items:2,
                margin: 10
            },
            712:{
                items:3,
                margin: 20
            },
            1023:{
                items:3,
                margin: 30
            }
        }
    });
</script>