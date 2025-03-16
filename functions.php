<?php

// Función para encolar los estilos del tema padre y del tema hijo
function storefront_child_enqueue_styles() {
    // Encolar el estilo del tema padre
    wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css' );

    // Encolar el estilo del tema hijo
    wp_enqueue_style( 'storefront-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'storefront-style' ) );
}
add_action( 'wp_enqueue_scripts', 'storefront_child_enqueue_styles' );

add_filter('show_admin_bar', '__return_false');

// Incluir los archivos personalizados del tema hijo
require_once get_stylesheet_directory() . '/inc/iledysile-enqueue-scripts.php';
require_once get_stylesheet_directory() . '/inc/iledysile-enqueue-styles.php';
require_once get_stylesheet_directory() . '/inc/iledysile-google-fonts.php';
require_once get_stylesheet_directory() . '/inc/iledysile-hero-home.php';
require_once get_stylesheet_directory() . '/inc/iledysile-square-menu.php';
require_once get_stylesheet_directory() . '/inc/iledysile-cart-link.php';
require_once get_stylesheet_directory() . '/inc/iledysile-product-functions.php';
require_once get_stylesheet_directory() . '/inc/iledysile-woocommerce-image-sizes.php';
require_once get_stylesheet_directory() . '/inc/iledysile-add-to-cart-message.php';