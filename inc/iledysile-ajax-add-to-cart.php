<?php
// iledysile-ajax-add-to-cart.php

function add_ajax_cart_button() {
    global $product;
    echo '<button type="button" class="ajax_add_to_cart button alt" data-product_id="' . esc_attr($product->get_id()) . '">
        In den Warkenkorb (AJAX)
    </button>
    <div class="ajax-response"></div>';
}
add_action('woocommerce_after_add_to_cart_button', 'add_ajax_cart_button');

function woocommerce_ajax_add_to_cart() {
    // Obtener el ID del producto desde POST
    $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;
    $size = isset($_POST['size']) ? sanitize_text_field($_POST['size']) : '';
    $quantity = isset($_POST['quantity']) ? absint($_POST['quantity']) : 1;

    if (!$product_id || $quantity < 1) {
        wp_send_json_error(array('message' => 'Datos inválidos.'));
        wp_die();
    }

    // Obtener el producto (variable o simple)
    $product = wc_get_product($product_id);

    if (!$product) {
        wp_send_json_error(array('message' => 'Producto no encontrado.'));
        wp_die();
    }

    if ($product->is_type('variable')) {
        $variation_id = get_matching_variation($product, $size);
        
        if ($variation_id) {
            $added = WC()->cart->add_to_cart($product_id, $quantity, $variation_id);
        } else {
            wp_send_json_error(array('message' => 'La talla seleccionada no es válida.'));
            wp_die();
        }
    } else {
        $added = WC()->cart->add_to_cart($product_id, $quantity);
    }

    if ($added) {
        $cart_count = WC()->cart->get_cart_contents_count();

        // Obtener las URLs de las páginas de WooCommerce
        $shop_url = esc_url(wc_get_page_permalink('shop'));
        $cart_url = esc_url(wc_get_cart_url());
        $checkout_url = esc_url(wc_get_checkout_url());

        wp_send_json_success(array(
            'product_name'  => $product->get_name(),
            'product_size'  => $size,
            'product_image' => wp_get_attachment_image_src($product->get_image_id(), 'thumbnail')[0],
            'product_quantity' => $quantity,
            'cart_count'    => $cart_count,
            'shop_url'         => $shop_url,
            'cart_url'         => $cart_url,
            'checkout_url'     => $checkout_url,
            'product_id' => $product_id
        ));
    } else {
        wp_send_json_error(array('message' => 'No se pudo añadir el producto.'));
    }

    wp_die();
}
add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');


add_action('wp_footer', function() {
    echo '<div class="iledysile-container-product-added"></div>';
});

// Función para obtener la variación basada en la talla seleccionada
function get_matching_variation($product, $size) {
    $variations = $product->get_available_variations();
    
    foreach ($variations as $variation) {
        $attributes = $variation['attributes'];

        // Compara si la talla seleccionada coincide con la talla del producto
        if (isset($attributes['attribute_pa_slug_size']) && $attributes['attribute_pa_slug_size'] === $size) {
            return $variation['variation_id']; // Devuelve el ID de la variación
        }
    }

    return false; // Si no se encuentra ninguna coincidencia
}