<?php
// Cargar los estilos del tema principal (Storefront)
function storefront_child_enqueue_styles() {
    wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'storefront-child-style', get_stylesheet_uri(), array( 'storefront-style' ) );
}
add_action( 'wp_enqueue_scripts', 'storefront_child_enqueue_styles' );

// Añadir el shortcode del range selector entre el precio y el botón de añadir al carrito
function insertar_shortcode_input_range() {
    echo do_shortcode('[iledysile_range_selector]'); // Llama al shortcode de tu plugin
}

// Enganchar el shortcode al hook 'woocommerce_single_product_summary' con prioridad 15 (después del precio)
add_action( 'woocommerce_single_product_summary', 'insertar_shortcode_input_range', 15 );