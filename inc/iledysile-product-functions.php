<?php
/*require_once get_stylesheet_directory() . '/inc/iledysile-shortcode-range-selector.php';*/

// Reemplazar el texto de "Seleccionar opciones" en la página de producto por "XS S M L"
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', function( $args ) {
    if ( isset( $args['attribute'] ) && 'pa_slug_size' === $args['attribute'] ) {
        $args['show_option_none'] = 'XS S M L';
    }
    return $args;
});

// Reorganizar la página de producto visualmente
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5); // Título
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 15); // Precio
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20); // Añadir al carrito
add_action( 'woocommerce_single_product_summary', 'iledysile_move_product_description', 25 ); // Descripción
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 30); // Talla y categoría

// Mover la descripción del producto
function iledysile_move_product_description() {
    do_action( 'iledysile_single_product_description' ); 
}
add_action( 'iledysile_single_product_description', 'iledysile_render_product_description' );

function iledysile_render_product_description() {
    global $post;
    $product = wc_get_product( $post->ID );

    if ( $product->get_description() ) {
        echo '<div class="iledysile-product-description">';
        echo wp_kses_post( wpautop( $product->get_description() ) );
        echo '</div>';
    }
}

function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );