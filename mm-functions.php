<?php


/**
 * Verifica se o WordPress está sendo carregado corretamente.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Sair se o WordPress não estiver sendo carregado corretamente.
}

/**
 * Função para obter a chave da API a partir das opções do WordPress.
 *
 * @return string Chave da API.
 */
function mm_get_api_key() {
    return get_option('mm_api_key');
}

/**
 * Função para fazer a conexão com a API do MediaModifier.
 *
 * @return object $response Resposta da API.
 */
function mm_connect_api() {
    // URL base da API do MediaModifier.
    $base_url = 'https://api.mediamodifier.com';

    // Chave da API.
    $api_key = mm_get_api_key();

    // Configurações do cabeçalho da requisição.
    $args = array(
        'headers' => array(
            'X-Api-Key' => $api_key
        )
    );

    // Faz a requisição para a API.
    $response = wp_remote_get( $base_url, $args );

    // Verifica se a requisição foi bem-sucedida.
    if ( is_wp_error( $response ) ) {
        // Se houve um erro, retorna o erro.
        return $response;
    } else {
        // Se a requisição foi bem-sucedida, retorna a resposta.
        return json_decode( wp_remote_retrieve_body( $response ) );
    }
}
