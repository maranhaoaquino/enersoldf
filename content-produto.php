<section class="container my-5">
    <div class="row gy-4">
        <div class="col-12 col-md-6">
            <div class="xzoom-container">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="" width="100%" class="xzoom" id="xzoom-default">
                <div class="xzoom-thumbs owl-carousel owl-theme">
                    <a href="<?php the_post_thumbnail_url(); ?>">
                        <img src="<?php the_post_thumbnail_url(); ?>" class="xzoom-gallery">
                    </a>
                    <?php $thumbs = get_field_cmb2('thumb_produtos'); ?>
                    <?php foreach($thumbs as $thumb){ ?>
                        <a href="<?php echo $thumb; ?>">
                            <img src="<?php echo $thumb; ?>" class="xzoom-gallery">
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div id="product-description">
                <h1><?php the_title(); ?></h1>
                <p><?php the_field_cmb2('small_description'); ?></p>
                <div class="orcamento-card">
                    <a class="btn btn-primary card--btn" href="">Orçamento <ion-icon name="logo-whatsapp"></ion-icon></a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="descricao-product">
                <details open>
                    <summary>
                        <h2>Descrição</h2>
                    </summary>
                    <p><?php the_content(); ?></p>
                </details>
            </div>
        </div>
        <?php
            $args = array (
                'post_type' => 'produto',
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
                    <h2>Conheça outros produtos</h2>
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
<script type="text/javascript">
    $("#xzoom-default, .xzoom-gallery").xzoom();

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

    $('.xzoom-thumbs').owlCarousel({
        loop:false,
        nav:true,
        margin: 10,
        responsive:{
            0:{
                items:2
            },
            712:{
                items:3
            }
        }
    });
</script>