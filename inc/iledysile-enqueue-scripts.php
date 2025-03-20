<?php
// Cargar scripts personalizados
function iledysile_enqueue_scripts() {
    wp_enqueue_script(
        'iledysile-square-menu-js',
        get_stylesheet_directory_uri() . '/js/iledysile-square-menu-js.js',
        array(),
        '1.0',
        true
    );

    if ( is_front_page()) {
        wp_enqueue_script( 
            'iledysile-hero-home-js', 
            get_stylesheet_directory_uri() . '/js/iledysile-hero-home-js.js', 
            array(), 
            '1.0', 
            true );
    }

    if (is_product()) {
        wp_enqueue_script(
            'iledysile-product-js', 
            get_stylesheet_directory_uri() . '/js/iledysile-product-js.js', 
            array('jquery'), 
            '1.0', 
            true);

        wp_enqueue_script(
            'iledysile-ajax-add-to-cart-js',
            get_stylesheet_directory_uri() . '/js/iledysile-ajax-add-to-cart-js.js', 
            array('jquery'), 
            '1.0', 
            true);
        wp_localize_script('iledysile-ajax-add-to-cart-js', 'wc_add_to_cart_params', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));

        // wp_enqueue_script(
        //     'iledysile-ajax-remove-from-cart-js',
        //     get_stylesheet_directory_uri() . '/js/iledysile-ajax-remove-from-cart-js.js', 
        //     array('jquery'), 
        //     '1.0', 
        //     true);
        // wp_localize_script('iledysile-ajax-remove-from-cart-js', 'wc_remove_from_cart_params', array(
        //     'ajax_url' => admin_url('admin-ajax.php')
        // ));   
    }

    if (is_cart()) { 
        wp_enqueue_script(
            'iledysile-cart-js', 
            get_stylesheet_directory_uri() . '/js/iledysile-cart-js.js', 
            array('jquery'),
            '1.0', 
            true);
    }
}
add_action('wp_enqueue_scripts', 'iledysile_enqueue_scripts');