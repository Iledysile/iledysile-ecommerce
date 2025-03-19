<?php
// iledysile-ajax-remove-from-cart.php

// Función para eliminar un producto del carrito
function woocommerce_ajax_remove_from_cart() {
    if (isset($_POST['product_id'])) {
        $product_id = absint($_POST['product_id']);

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            if ($cart_item['product_id'] == $product_id) {
                WC()->cart->remove_cart_item($cart_item_key);
                wc_clear_notices();
                
                // Obtener el nuevo total de productos en el carrito
                $cart_count = WC()->cart->get_cart_contents_count();

                wp_send_json_success(array(
                    'cart_count' => $cart_count
                ));
                wp_die();
            }
        }

        wp_send_json_error(array('message' => 'El producto no está en el carrito.'));
    } else {
        wp_send_json_error(array('message' => 'ID de producto no válido.'));
    }
}
add_action('wp_ajax_woocommerce_ajax_remove_from_cart', 'woocommerce_ajax_remove_from_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_remove_from_cart', 'woocommerce_ajax_remove_from_cart');