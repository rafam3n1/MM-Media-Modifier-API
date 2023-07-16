<?php
// Conteúdo da página 'Templates'.
function mm_api_templates_page() {
    // Obtenha a chave da API do MediaModifier das opções do WordPress.
    $api_key = get_option('mm_api_key');

    // URL da API do MediaModifier.
    $api_url = 'https://api.mediamodifier.com/mockups';

    // Inicialize uma sessão cURL.
    $ch = curl_init();
    
    // Verifique se um termo de pesquisa foi enviado.
    if (isset($_POST['search'])) {
        // Atualize a URL da API para incluir o termo de pesquisa.
        $api_url .= '/search?q=' . urlencode($_POST['search']);
    }

    // Defina as opções para a sessão cURL.
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'api_key: ' . $api_key
    ));

    // Execute a sessão cURL e obtenha a resposta.
    $response = curl_exec($ch);

    // Decodifique a resposta.
    $body = json_decode($response);

    // Exiba o formulário de pesquisa.
    echo '<form method="post">';
    echo '<input type="text" name="search" placeholder="Pesquisar mockups...">';
    echo '<input type="submit" value="Pesquisar">';
    echo '<input type="text" name="mockup_id" placeholder="ID do mockup personalizado...">';
    echo '<input type="submit" value="Adicionar">';
    echo '</form>';

    global $wpdb;

    // Nome da tabela para os mockups padrões.
    $standard_table_name = $wpdb->prefix . 'standard_mockups';

    // Nome da tabela para os mockups personalizados.
    $custom_table_name = $wpdb->prefix . 'custom_mockups';

    // Verifique se um ID de mockup personalizado foi enviado.
    if (isset($_POST['mockup_id'])) {
        // Feche a sessão cURL anterior.
        curl_close($ch);
        
        // Atualize a URL da API para obter o mockup personalizado.
        $api_url = 'https://api.mediamodifier.com/mockup/nr/' . urlencode($_POST['mockup_id']);

        // Inicialize uma nova sessão cURL.
        $ch_custom = curl_init();

        // Defina as opções para a sessão cURL.
        curl_setopt($ch_custom, CURLOPT_URL, $api_url);
        curl_setopt($ch_custom, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch_custom, CURLOPT_HTTPHEADER, array(
            'api_key: ' . $api_key
        ));

        // Execute a sessão cURL e obtenha a resposta.
        $response = curl_exec($ch_custom);

        // Decodifique a resposta.
        $custom_mockup = json_decode($response);

        // Verifique se a resposta contém o mockup.
        if (isset($custom_mockup->mockup)) {
            // Insira o mockup personalizado no banco de dados.
            $wpdb->insert(
                $custom_table_name,
                array(
                    'name' => $custom_mockup->mockup->name,
                    'image_url' => $custom_mockup->mockup->image,
                    'mockup_url' => 'https://mediamodifier.com/mockup/' . $custom_mockup->mockup->nr
                )
            );
        }
        
        // Feche a sessão cURL.
        curl_close($ch_custom);
    } else {
        // Insira os mockups padrões no banco de dados.
        foreach ($body->mockups as $mockup) {
            $wpdb->insert(
                $standard_table_name,
                array(
                    'name' => $mockup->name,
                    'preview_url' => $mockup->preview,
                    'mockup_url' => $mockup->url
                )
            );
        }
    }

    // Recupere os mockups do banco de dados.
    $standard_mockups = $wpdb->get_results("SELECT * FROM $standard_table_name");

    foreach ($standard_mockups as $mockup) {
        display_mockup($mockup);
    }

    $custom_mockups = $wpdb->get_results("SELECT * FROM $custom_table_name");

    foreach ($custom_mockups as $mockup) {
        display_custom_mockup($mockup);
    }
    
    // Feche a sessão cURL.
    curl_close($ch);
}

// Função para exibir um mockup padrão.
function display_mockup($mockup) {
    echo '<div style="border: 1px solid #ddd; padding: 10px; text-align: center;">';
    echo '<h2 style="margin-bottom: 20px;">' . esc_html($mockup->name) . '</h2>';
    echo '<img src="' . esc_url($mockup->preview_url) . '" alt="' . esc_attr($mockup->name) . '" style="width: 100%; height: auto;">';
    echo '<p><a href="' . esc_url($mockup->mockup_url) . '" target="_blank">Ver Mockup</a></p>';
    echo '</div>';
}

// Função para exibir um mockup personalizado.
function display_custom_mockup($mockup) {
    echo '<div style="border: 1px solid #ddd; padding: 10px; text-align: center;">';
    echo '<h2 style="margin-bottom: 20px;">' . esc_html($mockup->name) . '</h2>';
    echo '<img src="' . esc_url($mockup->image_url) . '" alt="' . esc_attr($mockup->name) . '" style="width: 100%; height: auto;">';
    echo '<p><a href="' . esc_url($mockup->mockup_url) . '" target="_blank">Ver Mockup</a></p>';
    echo '</div>';
}
?>
