<?php
require_once get_stylesheet_directory() . '/inc/iledysile-remove-img-zoom.php';
/*require_once get_stylesheet_directory() . '/inc/iledysile-shortcode-range-selector.php';*/

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

function resaltar_shop_y_categoria($classes, $item, $args) {
    if (is_product()) {
        $terms = get_the_terms(get_the_ID(), 'product_cat');
        if ($terms) {
            foreach ($terms as $term) {
                if ($item->object_id == $term->term_id) {
                    $classes[] = 'current-menu-item';
                }
            }
        }
        if ($item->ID == 242) { // Cambia 242 por el ID de "Shop"
            $classes[] = 'current-menu-item';
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'resaltar_shop_y_categoria', 10, 3);

add_filter( 'woocommerce_dropdown_variation_attribute_options_args', function( $args ) {
    // Verifica si el atributo es el correcto: 'attribute_size'
    if ( isset( $args['attribute'] ) && 'pa_slug_size' === $args['attribute'] ) {
        // Cambia el texto de la opción por defecto
        $args['show_option_none'] = 'XS S M L';
    }
    return $args;
});


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5); // Título
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 15); // Precio
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20); // Añadir al carrito
add_action( 'woocommerce_single_product_summary', 'iledysile_move_product_description', 25 ); // Descripción
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 30); // Talla y categoría



function iledysile_move_product_description() {
    do_action( 'iledysile_single_product_description' ); // Disparamos nuestro hook personalizado
}

// Enganchamos la función que muestra la descripción a nuestro hook
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
