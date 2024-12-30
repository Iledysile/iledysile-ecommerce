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

function enqueue_custom_scripts() {
    wp_enqueue_script(
        'iledysile-js', // Identificador único para el script
        get_stylesheet_directory_uri() . '/iledysile-js.js', // Ruta al archivo JS
        array(), // Dependencias (por ejemplo, 'jquery' si necesitas jQuery)
        null, // Versión (puedes usar 'null' o un número de versión)
        true // Cargar en el footer (true = optimización, el script se carga después del contenido)
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

//Optimizar carga de fuentes de google fonts
function add_google_fonts_preconnect() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'add_google_fonts_preconnect');

function add_google_fonts() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'add_google_fonts');