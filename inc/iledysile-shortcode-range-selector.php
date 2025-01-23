<?php
// Añadir el shortcode del selector de rango en la página del producto
function iledysile_insert_shortcode_input_range() {
    echo do_shortcode('[iledysile_range_selector]');
}
add_action('woocommerce_single_product_summary', 'iledysile_insert_shortcode_input_range', 15);
