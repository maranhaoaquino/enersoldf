<?php
// functions.php
add_action('cmb2_admin_init', 'cmb2_fields_faq');

function cmb2_fields_faq() {
    $cmb = new_cmb2_box([
        'id' => 'faq_box',
        'title' => 'Faq',
        'object_types' => ['page'],
        'show_on' => [
          'key' => 'page-template',
          'value' => 'page-faq.php',
        ], 
    ]);

    $cmb->add_field([
        'name' => 'Imagem do Faq',
        'id' => 'imagem_faq',
        'type' => 'file',
        'options' => [
            'url' => false,
        ],
    ]);

    $cmb->add_field([
        'name' => 'Titulo Pergutas Frequentes Home',
        'id' => 'title_faq_home',
        'type' => 'text',
    ]);
    $cmb->add_field([
        'name' => 'Subtitulo Pergutas Frequentes Home',
        'id' => 'subtitle_faq_home',
        'type' => 'text',
    ]);

    $faq = $cmb->add_field([
        'name' => 'Faq',
        'id' => 'faq',
        'type' => 'group',
        'repeatable' => true,
        'options' => [
          'sortable' => true,
          'add_button' => 'Adicionar',
          'remove_button' => 'Remover',
        ],
    ]);

    $cmb->add_group_field($faq, [
        'name' => 'Pergunta',
        'id' => 'pergunta_faq',
        'type' => 'text',
    ]);

    $cmb->add_group_field($faq, [
        'name' => 'Resposta',
        'id' => 'resposta_faq',
        'type' => 'textarea_small',
    ]);
}