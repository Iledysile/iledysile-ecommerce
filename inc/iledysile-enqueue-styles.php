<?php
// Cargar los estilos del tema principal (Storefront) y otros estilos específicos por página
function iledysile_enqueue_styles() {
    wp_enqueue_style('storefront-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('storefront-child-style', get_stylesheet_uri(), array('storefront-style'));
    wp_enqueue_style('iledysile-menu-mobile-style', get_stylesheet_directory_uri() . '/css/iledysile-menu-mobile.css', ['storefront-child-style']);

    // Estilos específicos para la página de shop
    if (is_shop() || is_product_category()) {
        wp_enqueue_style(
            'iledysile-shop-style',
            get_stylesheet_directory_uri() . '/css/iledysile-shop.css',
            array(),
            '1.0',
            'all'
        );
    }

    // Estilos específicos para la página de producto
    if (is_product()) {
        wp_enqueue_style(
            'iledysile-product-style',
            get_stylesheet_directory_uri() . '/css/iledysile-product.css',
            array(),
            '1.0',
            'all'
        );
    }
}
add_action('wp_enqueue_scripts', 'iledysile_enqueue_styles');
