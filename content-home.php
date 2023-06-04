<section id="carousel"></section>
<section id="servicos" class="py-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12 text-center">
                <span>Conheça nossas soluções</span>
                <h2>Energia solar para todos</h2>
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
                <div class="row">
                    <div class="owl-carousel owl-theme slide--card">
                        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="item">
                                <?php include(TEMPLATEPATH . "/snippets/card-servico.php"); ?>
                            </div>
                        <?php endwhile; else: endif; ?>
                        <?php wp_reset_query(); wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="produtos" class="py-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12 text-center">
                <h2>Nossos Produtos</h2>
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
                <div class="row">
                    <div class="owl-carousel owl-theme slide--card">
                        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="item">
                                <?php include(TEMPLATEPATH . "/snippets/card-product.php"); ?>
                            </div>
                        <?php endwhile; else: endif; ?>
                        <?php wp_reset_query(); wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="vantagens" class="py-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12 col-md-4"></div>
            <div class="col-12 col-md-8">
                <h2>Economize até <span>95%</span> do valor da sua conta de energia com sua própria usina solar fotovoltaica.</h2>
            </div>
        </div>
    </div>
</section>
<section id="faq" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4"></div>
            <div class="col-12 col-md-8">
                <span>Tire suas duvidas</span>
                <h2>Perguntas Frequentes</h2>
            </div>
        </div>
    </div>
</section>
<section id="blog" class="py-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12 text-center">
                <h2>Explorar mais assuntos</h2>
            </div>
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
            <div class="col-12">
                <div class="row">
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php include(TEMPLATEPATH . "/snippets/card-post.php"); ?>
                    <?php endwhile; else: endif; ?>
                    <?php wp_reset_query(); wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
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