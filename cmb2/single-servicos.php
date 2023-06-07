<?php
add_action('cmb2_admin_init', 'cmb2_fields_single_service');

function cmb2_fields_single_service() {
    $cmb = new_cmb2_box([
        'id' => 'service_box',
        'title' => 'Serviço',
        'object_types' => ['servico'],
    ]);

    $cmb->add_field([
        'name' => 'Imagem Topo',
        'id' => 'img_destaque',
        'type' => 'file',
        'options' => [
            'url' => false,
        ],
    ]);

    $cmb->add_field( array(
        'name' => 'Carrossel',
        'desc' => '',
        'id'   => 'thumb_servico',
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => 'Adicionar Imagens', // default: "Add or Upload Files"
            'remove_image_text' => 'Replacement', // default: "Remove Image"
            'file_text' => 'Replacement', // default: "File:"
            'file_download_text' => 'Replacement', // default: "Download"
            'remove_text' => 'Replacement', // default: "Remove"
        ),
    ) );

    $cmb->add_field( array(
        'name' => 'Chamada para orçamento',
        'id' => 'destaque_textarea',
        'type' => 'textarea'
    ));
}