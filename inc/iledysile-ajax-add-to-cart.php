<?php
// iledysile-ajax-add-to-cart.php

function add_ajax_cart_button() {
    global $product;
    echo '<button type="button" class="ajax_add_to_cart button alt" data-product_id="' . esc_attr($product->get_id()) . '">
        Añadir al carrito AJAX
    </button>
    <div class="ajax-response"></div>';
}
add_action('woocommerce_after_add_to_cart_button', 'add_ajax_cart_button');

function woocommerce_ajax_add_to_cart() {
    // Obtener el ID del producto
    $product_id = absint($_POST['product_id']);
    // Inicializar la talla por defecto
    $size = '';
    
    // Verificar si la talla ha sido seleccionada
    if (isset($_REQUEST['size'])) {
        $size = sanitize_text_field($_REQUEST['size']); // Obtiene la talla seleccionada
    }

    if ($product_id) {
        // Obtener el producto (variable o simple)
        $product = wc_get_product($product_id);
        
        // Verificar si el producto es de tipo variable
        if ($product->is_type('variable')) {
            // Obtener el ID de la variación según el atributo de talla
            $variation_id = get_matching_variation($product, $size);
            
            if ($variation_id) {
                // Si se encuentra la variación, se añade al carrito
                $added = WC()->cart->add_to_cart($product_id, 1, $variation_id); 
            } else {
                wp_send_json_error(array('message' => 'La talla seleccionada no es válida.'));
                wp_die();
            }
        } else {
            // Si el producto no es variable, añadirlo de la manera normal
            $added = WC()->cart->add_to_cart($product_id);
        }
        
        if ($added) {
            // Obtener el número de productos en el carrito
            $cart_count = WC()->cart->get_cart_contents_count();

            wp_send_json_success(array(
                'product_name'  => $product->get_name(),
                'product_size'  => $size,
                'product_image' => wp_get_attachment_image_src($product->get_image_id(), 'thumbnail')[0], // URL de la miniatura
                'cart_count'    => $cart_count,
            ));
        } else {
            wp_send_json_error(array('message' => 'No se pudo añadir el producto.'));
        }
    }

    wp_die();
}
add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart'); // Soporta usuarios no logueados

add_action('wp_footer', function() {
    echo '<div class="floating-cart-info" style="
        position: fixed; right: 20px; top: 20px; 
        background: #fff; padding: 15px; border: 1px solid #ddd; 
        display: none; box-shadow: 0px 4px 6px rgba(0,0,0,0.1);">
    </div>';
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
