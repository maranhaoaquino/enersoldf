<?php $slide_principal = get_field_cmb2('slide_principal');  if(!empty($slide_principal)) { ?>
    <section id="carousel" class="d-none d-md-block">
        <div id="slide-principal" class="owl-carousel owl-theme">
            <?php foreach($slide_principal as $slide) { ?>
                <?php if(!empty($slide['img_slide']) || !empty($slide['video_link'])) { ?>
                    <div class="item">
                        <?php if (!empty($slide['video_link'])) { ?>
                            <iframe class="img-slides" width="100%" height="100%" src="<?php echo $slide['video_link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <?php } else { ?>
                            <a href="<?php if(!empty($slide['link_slide'])) { ?><?php echo $slide['link_slide'] ?><?php } ?>">
                                <img class="img-slides" src="<?php echo $slide['img_slide'] ?>">
                                <div id="grid-slider" class="container">
                                    <div id="grid-text">
                                        <?php if(!empty($slide['title_slide'])) { ?><h2><?php echo $slide['title_slide'] ?></h2><?php } ?>
                                        <?php if(!empty($slide['subtitle_slide'])) { ?><p><?php echo $slide['subtitle_slide'] ?></p><?php } ?>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </section>
    <section id="carousel-mobile" class="d-block d-md-none">
        <div id="slide-principal-mobile" class="owl-carousel owl-theme">
            <?php foreach($slide_principal as $slide) { ?>
                <?php if(!empty($slide['img_mobile_slide']) || !empty($slide['video_link'])) { ?>
                    <div class="item">
                        <?php if (!empty($slide['video_link'])) { ?>
                            <iframe class="img-slides" width="100%" height="100%" src="<?php echo $slide['video_link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <?php } else { ?>
                            <a href="<?php if(!empty($slide['link_slide'])) { ?><?php echo $slide['link_slide'] ?><?php } ?>">
                                <img class="img-slides" src="<?php echo $slide['img_mobile_slide'] ?>">
                                <div id="grid-slider" class="container">
                                    <div id="grid-text">
                                        <?php if(!empty($slide['title_slide'])) { ?><h2><?php echo $slide['title_slide'] ?></h2><?php } ?>
                                        <?php if(!empty($slide['subtitle_slide'])) { ?><p><?php echo $slide['subtitle_slide'] ?></p><?php } ?>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </section>
    <script>
        $('#slide-principal').owlCarousel({
            loop:false,
            nav:true,
            items: 1,
            dots: false,
            video: true,
            merge:true,
            navText: [
                "<i class='fa fa-chevron-left'></i>",
                "<i class='fa fa-chevron-right'></i>"
            ],
        });
        $('#slide-mobile').owlCarousel({
            loop:false,
            nav:true,
            items: 1,
            dots: false,
            video: true,
            merge:true,
            navText: [
                "<i class='fa fa-chevron-left'></i>",
                "<i class='fa fa-chevron-right'></i>"
            ],
        });
    </script>
<?php } ?>
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
<?php if(!empty($the_query)){ ?>
<section id="servicos" class="py-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12 text-center">
                <span class="secondary--color">Conheça nossas soluções</span>
                <h2>Energia solar para todos</h2>
            </div>
            <div class="col-12">
                <div class="row">
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
            <div class="col-12 d-flex justify-content-center">
                <a class="btn btn-primary btn-principal" href="/categoria-servico/todos-servicos/">Conheça nossos serviços</a>
            </div>
        </div>
    </div>
</section>
<?php } ?>
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
<?php if(!empty($the_query)){ ?>
<section id="produtos" class="py-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12 text-center">
                <h2 class="link-contrast-color">Nossos Produtos</h2>
            </div>
            <div class="col-12">
                <div class="row">
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
            <div class="col-12 d-flex justify-content-center">
                <a class="btn btn-primary btn-principal" href="/categoria-produtos/todos-produtos/">Veja todos os produtos</a>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php $vantagens = get_field_cmb2('vantagens');  if(!empty($vantagens)) { ?>
<section id="vantagens" class="py-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12 col-md-4">
                <?php if(!empty(get_field_cmb2('img_vantagens'))) { ?>
                    <img  src="<?php the_field_cmb2('img_vantagens') ?>">
                <?php } ?>
            </div>
            <div class="col-12 col-md-8 d-flex align-items-center">
                <?php 
                    $title_session_vantagens = get_field_cmb2('title_session_vantagens');
                    if(!empty($title_session_vantagens)){ 
                ?>
                        <h2> <?php the_field_cmb2('title_session_vantagens'); ?></h2>
                <?php } else { ?>
                    <h2>Economize até <span class="primary--color">95%</span> do valor da sua conta de energia com sua própria usina solar fotovoltaica.</h2>
                <?php } ?>
            </div>
        </div>
        <div class="row gy-4 mt-4">
            <?php foreach($vantagens as $vantagem) { ?>
                <div class="col-6 col-md-4">
                    <div class="item-vantagem">
                        <img class="img-slides" src="<?php echo $vantagem['img_vantagem']; ?>">
                        <h6><?php echo $vantagem['title_vantagem']; ?></h6>
                        <p><?php echo $vantagem['description_vantagem']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>
<?php $perguntas = get_page_by_path('perguntas-frequentes')->ID; ?>
<?php $faq = get_field_cmb2('faq', $perguntas); if(!empty($faq)) {?>
<section id="faq-home" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <img  src="<?php the_field_cmb2('imagem_faq', $perguntas) ?>">
            </div>
            <div class="col-12 col-md-8">
                <span class="secondary--color"><?php $subtitle_faq = get_field_cmb2('subtitle_faq_home', $perguntas); if(empty($title_faq)){echo "Tire suas dúvidas";}else{the_field_cmb2('subtitle_faq_home', $perguntas);}?></span>
                <h2 class="link-contrast-color"><?php $title_faq = get_field_cmb2('title_faq_home', $perguntas); if(empty($title_faq)){echo "Perguntas Frequentes";}else{the_field_cmb2('title_faq_home', $perguntas);}?></h2>
                <div id="faq-box">
                    <?php foreach($faq as $pergunta) { ?>
                        <details class="details-faq">
                            <summary><?php echo $pergunta['pergunta_faq'] ?></summary>
                            <p><?php echo $pergunta['resposta_faq'] ?></p>
                        </details>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php
    $args = array (
        'post_type' => 'post',
        'orderby' => 'ID',
        'order'   => 'DESC',
        'nopaging' => false,
        'posts_per_page' => '3',
        'post_status' => 'publish'
    );
    $the_query = new WP_Query ( $args );
?>
<?php if(!empty($the_query)){ ?>
<section id="blog" class="py-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12 text-center">
                <h2>Explorar mais assuntos</h2>
            </div>
            <div class="col-12">
                <div class="row gy-4">
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php include(TEMPLATEPATH . "/snippets/card-post.php"); ?>
                    <?php endwhile; else: endif; ?>
                    <?php wp_reset_query(); wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<script type="text/javascript">
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