<?php
// Função para criar as tabelas.
function create_mockup_tables() {
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();

    // Nome da tabela para os mockups padrões.
    $standard_table_name = $wpdb->prefix . 'standard_mockups';

    // SQL para criar a tabela de mockups padrões.
    $standard_sql = "CREATE TABLE $standard_table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name text NOT NULL,
        preview_url text NOT NULL,
        mockup_url text NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    // Nome da tabela para os mockups personalizados.
    $custom_table_name = $wpdb->prefix . 'custom_mockups';

    // SQL para criar a tabela de mockups personalizados.
    $custom_sql = "CREATE TABLE $custom_table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name text NOT NULL,
        image_url text NOT NULL,
        mockup_url text NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    // Crie as tabelas.
    dbDelta($standard_sql);
    dbDelta($custom_sql);
}

// Registre a função para ser chamada quando o plugin for ativado.
register_activation_hook(__FILE__, 'create_mockup_tables');
