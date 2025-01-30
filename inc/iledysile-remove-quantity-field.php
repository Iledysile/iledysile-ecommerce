<?php
function remove_quantity_field($return, $product) {
    return true;
}
add_filter('woocommerce_is_sold_individually', 'remove_quantity_field', 10, 2);
