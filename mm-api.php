<?php
/**
 * Plugin Name: MM Media Modifier API
 * Plugin URI: http://tornevirtual.com.br/
 * Description: Este plugin integra a API do MediaModifier com o WooCommerce para gerar mockups de produtos.
 * Version: 1.0
 * Author: rafam3n
 * Author URI: http://tornevirtual.com.br/
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Define MM_API_PLUGIN_FILE.
if ( ! defined( 'MM_API_PLUGIN_FILE' ) ) {
    define( 'MM_API_PLUGIN_FILE', __FILE__ );
}

// Include the main MM_API class.
if ( ! class_exists( 'MM_API' ) ) {
    include_once dirname( __FILE__ ) . '/includes/class-mm-api.php';
}

/**
 * Main instance of MM_API.
 *
 * Returns the main instance of MM_API to prevent the need to use globals.
 *
 * @since  1.0
 * @return MM_API
 */


// Global for backwards compatibility.
$GLOBALS['mm_api'] = MM_API();
