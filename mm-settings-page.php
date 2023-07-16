<?php

error_log('mm-settings-page.php foi carregado');

// Adiciona a página de configurações ao menu de administração.
function mm_add_settings_page() {
    add_submenu_page(
        'mm_api_menu', // Slug do menu principal.
        'Configurações', // Título da página.
        'Configurações', // Título do menu.
        'manage_options', // Capacidade necessária para ver o menu.
        'mm_api_settings', // Slug do menu.
        'mm_render_settings_page' // Função que renderiza a página do menu.
    );
}
add_action('admin_menu', 'mm_add_settings_page');




// Registra a configuração da chave da API.
function mm_register_api_key_setting() {
    register_setting('mm_api_settings', 'mm_api_key');
}
add_action('admin_init', 'mm_register_api_key_setting');




