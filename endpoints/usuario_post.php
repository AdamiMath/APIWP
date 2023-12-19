<?php 

function api_usuario_post($request){
    $params = $request->get_params();

    $response = array();

    $campos = array('nome', 'email', 'senha', 'rua', 'cep', 'bairro', 'cidade', 'numero');

    foreach ($campos as $campo) {
        if ($campo === 'email') {
            // Utiliza sanitize_email() para o campo de e-mail
            $response[$campo] = isset($params[$campo]) ? sanitize_email($params[$campo]) : '';
        } else {
            // Utiliza sanitize_text_field() para os outros campos
            $response[$campo] = isset($params[$campo]) ? sanitize_text_field($params[$campo]) : '';
        }
    }

    $user_exists = username_existis($email);
    $email_exists = email_existis($email);

    if(!$user_exists && !$email_exists && $email && $senha){
        $user_id = wp_create_user($email, $senha, $email);

        $response = array(
            'ID' => $user_id,
            'display_name' => $nome,
            'first_name' => $nome,
            'role' => 'subscriber'
        );

        wp_update_user($response);
    }

    return rest_ensure_response($response);
}

function register_api_user_post(){
    register_rest_route('api', '/usuario', array(
        array(
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => 'api_usuario_post'
        )
    ));
}

add_action('rest_api_init', 'register_api_user_post');

?>