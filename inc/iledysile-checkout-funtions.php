<?php

// Función para establecer el país por defecto en la página de pago
add_action('woocommerce_add_to_cart' , 'set_country_befor_cart_page'); 
function set_country_befor_cart_page(){

    WC()->customer->set_billing_country('CH');
    WC()->customer->set_shipping_country('CH');
}

// Función para cambiar al finalizar pedido el texto de agradecimiento
add_filter( 'woocommerce_thankyou_order_received_text', 'custom_thankyou_text', 10, 2 );
function custom_thankyou_text( $thank_you_text, $order ) {
    // Versión tuteo del texto original:
    return 'Vielen Dank. Deine Bestellung ist eingegangen.';
}