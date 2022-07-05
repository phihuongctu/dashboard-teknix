<?php
/*
Plugin Name: Teknix core
Version: 1.0
Description: Core
Author:
*/

if (!defined('ABSPATH'))
    exit;

if (!class_exists('TeknixCore')) {
    class TeknixCore
    {
        function __construct()
        {
            if (!defined('TEKNIX_CORE_FILE')) {
                define('TEKNIX_CORE_FILE', __FILE__);
                define('TEKNIX_CORE_PATH', plugin_dir_path(TEKNIX_CORE_FILE));
                define('TEKNIX_CORE_URL', plugin_dir_url(TEKNIX_CORE_FILE));
                // define('TEKNIX_CORE_ASSETS', TEKNIX_CORE_URL . 'assets');
            }

            // @ini_set('display_errors', 1);
            require_once(TEKNIX_CORE_PATH . 'includes/setup.php');
            require_once(TEKNIX_CORE_PATH . 'includes/functions.php');
            require_once(TEKNIX_CORE_PATH . 'includes/shortcode.php');
        }
    }
}


function teknix_core_load()
{
    global $teknix_core;
    if (!session_id()) {
        session_start();
    }
    $teknix_core = new TeknixCore();
}
add_action('plugins_loaded', 'teknix_core_load');