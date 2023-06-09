<section id="faq-page" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <img  src="<?php the_field_cmb2('imagem_faq') ?>">
            </div>
            <div class="col-12 col-md-8">
                <span>Tire suas duvidas</span>
                <h2>Perguntas Frequentes</h2>
                <?php $faq = get_field_cmb2('faq'); ?>
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