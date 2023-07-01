<?php
// functions.php
add_action('cmb2_admin_init', 'cmb2_fields_contato');

function cmb2_fields_contato() {
    $cmb = new_cmb2_box([
        'id' => 'contato_box',
        'title' => 'Contato',
        'object_types' => ['page'],
        'show_on' => [
          'key' => 'page-template',
          'value' => 'page-contato.php',
        ], 
    ]);

    $cmb->add_field([
        'name' => 'Imagem Fomulario de Contato',
        'id' => 'imagem_contact_form',
        'type' => 'file',
        'options' => [
            'url' => false,
        ],
    ]);

    $cmb->add_field([
        'name' => 'Link mapa',
        'id' => 'map_contact',
        'type' => 'text_url',
    ]);
}