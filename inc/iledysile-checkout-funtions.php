<?php

// Función para establecer el país por defecto en la página de pago
add_action('woocommerce_add_to_cart' , 'set_country_befor_cart_page'); 

function set_country_befor_cart_page(){

    WC()->customer->set_billing_country('CH');
    WC()->customer->set_shipping_country('CH');
}