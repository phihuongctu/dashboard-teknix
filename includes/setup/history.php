<?php

if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(array(  // Create Withdraw Menu
        'page_title'    => 'History',
        'menu_title'    => 'History',
        'menu_slug'     => 'history-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-database',
    ));

    // @Snippet Posttype Creating
    function create_history_post_type()
    {
        register_post_type(
            'donate-history',
            array(
                'labels' => array(
                    'name' => __('Donate History'),
                    'singular_name' => __('Donate History')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'donate-history'),
                'show_in_rest'  => true,
                'show_in_menu'  => 'edit.php?post_type=donate-history',
                'supports'      => array('title', 'author')
            )
        );

        register_post_type(
            'payout-history',
            array(
                'labels' => array(
                    'name' => __('Payout History'),
                    'singular_name' => __('Payout History')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'payout-history'),
                'show_in_rest'  => true,
                'show_in_menu'  => 'edit.php?post_type=payout-history',
                'supports'      => array('title', 'author')
            )
        );
    }
    add_action('init', 'create_history_post_type');

    // @Snippet Invest Submenu Creating
    function register_history_submenu()
    {
        add_submenu_page(
            'history-settings',
            'Donate History',
            'Donate',
            'manage_options',
            'edit.php?post_type=donate-history'
        );

        add_submenu_page(
            'history-settings',
            'Payout History',
            'Payout',
            'manage_options',
            'edit.php?post_type=payout-history'
        );
    }
    add_action('admin_menu', 'register_history_submenu');

}