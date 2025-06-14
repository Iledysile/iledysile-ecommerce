<?php
/*require_once get_stylesheet_directory() . '/inc/iledysile-shortcode-range-selector.php';*/

// Reemplazar el texto de "Seleccionar opciones" en la página de producto por "XS S M L"
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', function( $args ) {
    if ( isset( $args['attribute'] ) && 'pa_slug_size' === $args['attribute'] ) {
        $args['show_option_none'] = 'Grösse';
    }
    return $args;
});

//Crear enlace a la tabla de tallas
function iledysile_single_grossen_tabelle() {
    $size_chart_url = site_url('/grossentabelle'); 
    echo '<div class="iledisyle-size-chart-button">';
    echo '<a href="' . esc_url($size_chart_url) . '" class="button" target="_blank" rel="noopener noreferrer">';
    echo 'Zur Grössentabelle';
    echo '</a>';
    echo '</div>';
}

// Reorganizar la página de producto visualmente
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5); // Título
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10); // Precio
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 15); // Descripción corta
add_action('woocommerce_before_add_to_cart_quantity', 'iledysile_single_grossen_tabelle');
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 25); // Añadir al carrito
add_action( 'woocommerce_single_product_summary', 'iledysile_move_product_description', 30 ); // Descripción
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 35); // Talla y categoría

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

// Add custom Iledysile image wrapper to WooCommerce product images
add_filter('woocommerce_single_product_image_thumbnail_html', function($html, $attachment_id) {
    // Carga el HTML en DOMDocument para manipularlo mejor
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
    libxml_clear_errors();

    $a_tags = $doc->getElementsByTagName('a');
    if ($a_tags->length > 0) {
        $a = $a_tags->item(0);
        $div = $doc->createElement('div');
        $div->setAttribute('class', 'iledysile-image-wrapper');

        // Clonar el enlace para moverlo al div
        $a_clone = $a->cloneNode(true);

        $div->appendChild($a_clone);

        // Reemplazar el enlace original por el div
        $a->parentNode->replaceChild($div, $a);

        // Obtener el nuevo HTML
        $body = $doc->getElementsByTagName('body')->item(0);
        $new_html = '';
        foreach ($body->childNodes as $child) {
            $new_html .= $doc->saveHTML($child);
        }

        return $new_html;
    }

    return $html;
}, 10, 2);