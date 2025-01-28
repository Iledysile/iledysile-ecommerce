<?php
// Cargar scripts personalizados
function iledysile_enqueue_scripts() {
    wp_enqueue_script(
        'iledysile-js',
        get_stylesheet_directory_uri() . '/js/iledysile-js.js',
        array(),
        null,
        true
    );

    if (is_product()) {
        wp_enqueue_script('iledysile-product-js', get_stylesheet_directory_uri() . '/js/iledysile-product-js.js', array('jquery'), '1.0', true);
    }
}
add_action('wp_enqueue_scripts', 'iledysile_enqueue_scripts');
