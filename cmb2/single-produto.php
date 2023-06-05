<?php
add_action('cmb2_admin_init', 'cmb2_fields_single_product');

function cmb2_fields_single_product() {
    $cmb = new_cmb2_box([
        'id' => 'product_box', // id deve ser único
        'title' => 'Produto',
        'object_types' => ['produto'], // tipo de post
    ]);

    $cmb->add_field( array(
        'name' => 'Adicionar Thumbnails Adicionais do Produto',
        'desc' => '',
        'id'   => 'thumb_produtos',
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
        'name' => 'Descrição curta',
        'id' => 'small_description',
        'type' => 'textarea'
    ) );
    
}