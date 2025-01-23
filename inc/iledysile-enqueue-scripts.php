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
}
add_action('wp_enqueue_scripts', 'iledysile_enqueue_scripts');
