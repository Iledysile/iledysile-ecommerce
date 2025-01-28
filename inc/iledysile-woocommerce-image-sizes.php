<?php
// Cambiar el tamaño de la imagen de la galería en WooCommerce
add_filter('woocommerce_get_image_size_gallery_thumbnail', 'iledysile_custom_gallery_thumbnail_size');
function iledysile_custom_gallery_thumbnail_size($size) {
    return array(
        'width'  => 300, 
        'height' => 300, 
        'crop'   => 0
    );
}

// Cambiar el tamaño de las miniaturas de productos
add_filter('woocommerce_get_image_size_thumbnail', 'iledysile_custom_thumbnail_size');
function iledysile_custom_thumbnail_size($size) {
    return array(
        'width'  => 1500, 
        'height' => 1992, 
        'crop'   => 0
    );
}

// Cambiar el tamaño de las imágenes de productos individuales
add_filter('woocommerce_get_image_size_single', 'iledysile_custom_single_image_size');
function iledysile_custom_single_image_size($size) {
    return array(
        'width'  => 1500, 
        'height' => 1992,
        'crop'   => 0
    );
}
