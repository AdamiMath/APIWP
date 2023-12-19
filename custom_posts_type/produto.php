<?php 

function regsitrar_cptp_produto(){
    register_post_type('produto', array(
        'label' => 'Produto',
        'description' => 'Produto',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'produto', 'with_front' => true),
        'query_var' => true,
        'supports' => array('custom-fields', 'author', 'title'),
        'publicy_queryable' => true

    ));
}
add_action('init', 'regsitrar_cptp_produto')
?>