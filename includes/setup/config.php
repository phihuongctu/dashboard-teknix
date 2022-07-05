<?php 

if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(array(  // Create Withdraw Menu
        'page_title'    => 'Management',
        'menu_title'    => 'Management',
        'menu_slug'     => 'management-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-admin-settings',
    ));

    // @Snippet Posttype Creating
    function create_management_post_type()
    {
        register_post_type(
            'qr-management',
            array(
                'labels' => array(
                    'name' => __('QR Management'),
                    'singular_name' => __('QR Management')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'qr-management'),
                'show_in_rest'  => true,
                'show_in_menu'  => 'edit.php?post_type=qr-management',
                'supports'      => array('title', 'author')
            )
        );

        register_post_type(
            'location-management',
            array(
                'labels' => array(
                    'name' => __('Location management'),
                    'singular_name' => __('Location management')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'location-management'),
                'show_in_rest'  => true,
                'show_in_menu'  => 'edit.php?post_type=location-management',
                'supports'      => array('title', 'author')
            )
        );
        register_post_type(
            'pool-management',
            array(
                'labels' => array(
                    'name' => __('Pool management'),
                    'singular_name' => __('Pool management')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'pool-management'),
                'show_in_rest'  => true,
                'show_in_menu'  => 'edit.php?post_type=pool-management',
                'supports'      => array('title', 'author')
            )
        );
        register_post_type(
            'payout-management',
            array(
                'labels' => array(
                    'name' => __('Payout management'),
                    'singular_name' => __('Payout management')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'payout-management'),
                'show_in_rest'  => true,
                'show_in_menu'  => 'edit.php?post_type=payout-management',
                'supports'      => array('title', 'author')
            )
        );
    }
    add_action('init', 'create_management_post_type');

    // @Snippet Invest Submenu Creating
    function register_management_submenu()
    {
        add_submenu_page(
            'management-settings',
            'QR Management',
            'QR Management',
            'manage_options',
            'edit.php?post_type=qr-management'
        );
        add_submenu_page(
            'management-settings',
            'Location Management',
            'Location Management',
            'manage_options',
            'edit.php?post_type=location-management'
        );
 
        add_submenu_page(
            'management-settings',
            'Pool Management',
            'Pool Management',
            'manage_options',
            'edit.php?post_type=pool-management'
        );
        add_submenu_page(
            'management-settings',
            'Payout Management',
            'Payout Management',
            'manage_options',
            'edit.php?post_type=payout-management'
        );
    }
    add_action('admin_menu', 'register_management_submenu');

}