<?php
/**
 * Verifica se o WordPress está sendo carregado corretamente.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Sair se o WordPress não estiver sendo carregado corretamente.
}

/**
 * Adiciona o menu de administração do plugin.
 */
function mm_add_admin_menu() {
    // Ícone personalizado codificado em base64.
    $icon_url = 'data:image/svg+xml;base64,' . 'PHN2ZyB3aWR0aD0iNjgiIGhlaWdodD0iMzYiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwKSIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNi43NyAzNS43N0gzMWExLjkgMS45IDAgMDEtMS45LTEuOXYtMTRhMTAgMTAgMCAwMC05LjQtMTAuMDUgOS44IDkuOCAwIDAwLTEwLjE1IDkuOHYxNC44OWExLjI1IDEuMjUgMCAwMS0xLjI2IDEuMjZoLTdBMS4yNTkgMS4yNTkgMCAwMTAgMzQuNTFWMjBBMTkuNTkgMTkuNTkgMCAwMTE4LjkuMjZhMTkuMzYgMTkuMzYgMCAwMTE5Ljc3IDE5LjM1djE0LjI2YTEuOTEgMS45MSAwIDAxLTEuOSAxLjl6IiBmaWxsPSIjMzc2N0Y2Ii8+PHBhdGggZD0iTTY2Ljc1IDM1Ljc3aC03LjQ0YS45OTkuOTk5IDAgMDEtMS4wNS0xLjA1VjE5Ljg3YTEwIDEwIDAgMDAtOS40My0xMC4wNiA5LjgxIDkuODEgMCAwMC0xMC4xNSA5LjhWMzMuN2EyLjA3IDIuMDcgMCAwMS0yLjA2IDIuMDdoLTUuMzlhMi4xIDIuMSAwIDAxLTIuMDktMi4wOVYyMEExOS41OSAxOS41OSAwIDAxNDggLjI2YTE5LjM2IDE5LjM2IDAgMDExOS44IDE5LjM1djE1LjExYTEuMDYgMS4wNiAwIDAxLTEuMDUgMS4wNXoiIGZpbGw9IiNGNjM3NjciLz48cGF0aCBkPSJNMzguNjcgMTkuNjFjMC00LjItMi40MS05LjQ2LTQuNy0xMi42NCAwIDAtLjU1LjYzLTEuMDggMS4zOEExOS45MyAxOS45MyAwIDAwMjkuMTUgMjB2MTQuNDNhMS4zMyAxLjMzIDAgMDAxLjMzIDEuMzRoNi44NmExLjM0IDEuMzQgMCAwMDEuMzQtMS4zNFYxOS42MWgtLjAxeiIgZmlsbD0iIzIxNEJDNyIvPjwvZz48ZGVmcz48Y2xpcFBhdGggaWQ9ImNsaXAwIj48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMCAwaDY4djM2SDB6Ii8+PC9jbGlwUGF0aD48L2RlZnM+PC9zdmc+'; // Substitua '...' pela string codificada em base64.

    // Adiciona o menu principal.
    add_menu_page(
        'MM-API', // Título da página.
        'MM-API', // Título do menu.
        'manage_options', // Capacidade necessária para ver o menu.
        'mm_api', // Slug do menu.
        'mm_api_main_page', // Função que renderiza a página do menu.
        $icon_url, // Ícone do menu.
        20 // Posição no menu.
    );

    // Adiciona a subpágina 'Gerador de Produtos'.
    add_submenu_page(
        'mm_api', // Slug do menu pai.
        'Gerador de Produtos', // Título da página.
        'Gerador de Produtos', // Título do menu.
        'manage_options', // Capacidade necessária para ver o menu.
        'mm_api_product_generator', // Slug do menu.
        'mm_api_product_generator_page' // Função que renderiza a página do menu.
    );

    // Adiciona a subpágina 'Templates'.
    add_submenu_page(
        'mm_api', // Slug do menu pai.
        'Templates', // Título da página.
        'Templates', // Título do menu.
        'manage_options', // Capacidade necessária para ver o menu.
        'mm_api_templates', // Slug do menu.
        'mm_api_templates_page' // Função que renderiza a página do menu.
    );

    // Adiciona a subpágina 'Designers'.
    add_submenu_page(
        'mm_api', // Slug do menu pai.
        'Designers', // Título da página.
        'Designers', // Título do menu.
        'manage_options', // Capacidade necessária para ver o menu.
        'mm_api_designers', // Slug do menu.
        'mm_api_designers_page' // Função que renderiza a página do menu.
    );

    // Adiciona a subpágina 'Configurações'.
    add_submenu_page(
        'mm_api', // Slug do menu pai.
        'Configurações', // Título da página.
        'Configurações', // Título do menu.
        'manage_options', // Capacidade necessária para ver o menu.
        'mm_api_settings', // Slug do menu.
        'mm_api_settings_page' // Função que renderiza a página do menu.
    );
}
add_action( 'admin_menu', 'mm_add_admin_menu' );

/**
 * Renderiza a página principal do menu.
 */
function mm_api_main_page() {
    // Conteúdo da página principal.
}

/**
 * Renderiza a página 'Gerador de Produtos'.
 */
function mm_api_product_generator_page() {
    // Conteúdo da página 'Gerador de Produtos'.
}

/**
 * Renderiza a página 'Templates'.
 */
    // Conteúdo da página 'Templates'.
    include plugin_dir_path( __FILE__ ) . 'mm-templates-page.php';



/**
 * Renderiza a página 'Designers'.
 */
function mm_api_designers_page() {
    // Conteúdo da página 'Designers'.
}

/**
 * Renderiza a página 'Configurações'.
 */
function mm_api_settings_page() {
    // Verifica se o formulário foi submetido
    if (isset($_POST['mm_api_key'])) {
        // Atualiza a opção 'mm_api_key' com o valor submetido
        update_option('mm_api_key', sanitize_text_field($_POST['mm_api_key']));
    }

    // Obtém o valor atual da opção 'mm_api_key'
    $mm_api_key = get_option('mm_api_key', '');

    // Verifica se o botão de teste foi clicado
    if (isset($_POST['test_api'])) {
        // Faz a solicitação para a API
        $response = mm_test_api_connection();

        // Decodifica a resposta bruta
        $decoded_response = json_decode($response['raw_response']);

        // Verifica se a solicitação foi bem-sucedida
        if (isset($response['error']) || (isset($decoded_response->success) && $decoded_response->success === false)) {
            // Exibe uma mensagem de erro
            echo '<div class="notice notice-error"><p>Resposta: API Incorreta</p></div>';
        } else {
            // Exibe a mensagem de sucesso
            echo '<div class="notice notice-success"><p>Resposta: API correta!</p></div>';
        }
        // Exibe a chave da API enviada
        echo '<div class="notice notice"><p>Chave da API enviada: ' . esc_html($response['api_key_sent']) . '</p></div>';
    }

    ?>
    <div class="wrap">
        <h1>Configurações</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Chave da API</th>
                    <td>
                        <input type="text" name="mm_api_key" value="<?php echo esc_attr($mm_api_key); ?>" />
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
            <input type="submit" name="test_api" class="button button-secondary" value="Testar API" />
        </form>
    </div>
    <?php
}




/**
 * Testa a conexão com a API.
 */
function mm_test_api_connection() {
    // Obtém a chave da API
    $api_key = get_option('mm_api_key', '');

    // Define a URL base da API
    $base_url = "https://api.mediamodifier.com/mockups";

    // Inicializa a sessão cURL
    $ch = curl_init();

    // Define as opções para a sessão cURL
    curl_setopt_array($ch, array(
        CURLOPT_URL => $base_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "api_key: $api_key"
        ),
    ));

    // Executa a sessão cURL e obtém a resposta
    $response = curl_exec($ch);
    $err = curl_error($ch);

    // Fecha a sessão cURL
    curl_close($ch);

    // Verifica se a resposta foi bem-sucedida
    if ($err) {
        return array(
            'error' => "cURL Error #: " . $err,
            'api_key_sent' => $api_key
        );
    } else {
        return array(
            'raw_response' => $response,
            'api_key_sent' => $api_key
        );
    }
}




