<?php
add_action('cmb2_admin_init', 'cmb2_fields_single_service');

function cmb2_fields_single_service() {
    $cmb = new_cmb2_box([
        'id' => 'service_box',
        'title' => 'Serviço',
        'object_types' => ['servico'],
    ]);

    $cmb->add_field([
        'name' => 'Imagem Destacada',
        'id' => 'img_destaque',
        'type' => 'file',
        'options' => [
            'url' => false,
        ],
    ]);

    $cmb->add_field( array(
        'name' => 'Chamada para orçamento',
        'id' => 'destaque_textarea',
        'type' => 'textarea'
    ));
}