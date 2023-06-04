<section id="carousel"></section>
<section id="servicos" class="row py-5 gy-4">
    <div class="col-12 text-center">
        <span>Conheça nossas soluções</span>
        <h2>Energia solar para todos</h2>
    </div>
</section>
<section id="produtos" class="row py-5 gy-4">
    <div class="col-12 text-center">
        <h2>Nossos Produtos</h2>
    </div>
    <?php
        $args = array (
            'post_type' => 'product',
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
            <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php include(TEMPLATEPATH . "/snippets/card-post.php"); ?>
            <?php endwhile; else: endif; ?>
            <?php wp_reset_query(); wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<section id="vantagens" class="row py-5 gy-4">
    <div class="col-12 col-md-4"></div>
    <div class="col-12 col-md-8">
        <h2>Economize até <span>95%</span> do valor da sua conta de energia com sua própria usina solar fotovoltaica.</h2>
    </div>
</section>
<section id="faq" class="row py-5">
    <div class="col-12 col-md-4"></div>
    <div class="col-12 col-md-8">
        <span>Tire suas duvidas</span>
        <h2>Perguntas Frequentes</h2>
    </div>
</section>
<section id="blog" class="row py-5 gy-4">
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
</section>