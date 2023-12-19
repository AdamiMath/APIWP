<?php 

function regsitrar_cptp_transacao(){
    register_post_type('transacao', array(
        'label' => 'Transacao',
        'description' => 'Transacao',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'transacao', 'with_front' => true),
        'query_var' => true,
        'supports' => array('custom-fields', 'author', 'title'),
        'publicy_queryable' => true

    ));
}
add_action('init', 'regsitrar_cptp_transacao')
?>