<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'MM_API' ) ) :

class MM_API {

    /**
     * The single instance of the class.
     *
     * @var MM_API
     * @since 1.0
     */
    protected static $_instance = null;

    /**
     * Main MM_API Instance.
     *
     * Ensures only one instance of MM_API is loaded or can be loaded.
     *
     * @since 1.0
     * @static
     * @return MM_API - Main instance.
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * MM_API Constructor.
     */
    public function __construct() {
        $this->includes();
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
public function includes() {
    require_once plugin_dir_path( __FILE__ ) . '../mm-functions.php';
    require_once plugin_dir_path( __FILE__ ) . '../mm-settings.php';
    require_once plugin_dir_path( __FILE__ ) . '../mm-settings-page.php';
    require_once plugin_dir_path( __FILE__ ) . '../mm-table-create.php';

    
}




}

endif;

function MM_API() {
    return MM_API::instance();
}

