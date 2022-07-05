<?php

require_once(TEKNIX_CORE_PATH . '/includes/setup/history.php');
require_once(TEKNIX_CORE_PATH . '/includes/setup/config.php');

function my_scripts_before()
{
    wp_enqueue_style('main', TEKNIX_CORE_PATH . 'assets/css/main.css', array(), null, 'all');

    //3rd party
    // wp_enqueue_script('tailwind', TEKNIX_CORE_PATH . '/assets/js/3rd/tailwind.js', array('jquery'), null, true);
    // main
    wp_enqueue_script('public', TEKNIX_CORE_PATH . 'assets/js/public.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_scripts_before');