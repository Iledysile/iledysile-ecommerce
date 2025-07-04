<?php

// Función para establecer el país por defecto en la página de pago
add_action('woocommerce_add_to_cart' , 'set_country_befor_cart_page'); 

function set_country_befor_cart_page(){

    WC()->customer->set_billing_country('CH');
    WC()->customer->set_shipping_country('CH');
}

// Función para cambiar el texto al realizar el pedido
add_filter( 'gettext', 'custom_thank_you_message', 20, 3 );
function custom_thank_you_message( $translated_text, $text, $domain ) {
    if ( $domain === 'woocommerce' && $text === 'Vielen Dank. Ihre Bestellung ist eingegangen.' ) {
        $translated_text = 'VIELEN DANK. DEINE BESTELLUNG IST EINGEGANGEN.';
    }
    return $translated_text;
}
