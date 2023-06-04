<?php

function get_field_cmb2($key, $page_id = 0){
    $id = $page_id !== 0 ? $page_id : get_the_ID();
    return get_post_meta($id, $key, true);
}
  
function the_field_cmb2($key, $page_id = 0){
    echo get_field_cmb2($key, $page_id);
}

require_once get_template_directory() . '/cmb2/home.php';

?>