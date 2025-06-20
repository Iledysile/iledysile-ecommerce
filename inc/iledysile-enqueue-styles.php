<?php
// Cargar los estilos del tema principal (Storefront) y otros estilos específicos por página
function iledysile_enqueue_styles() {
    wp_enqueue_style('storefront-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('storefront-child-style', get_stylesheet_uri(), array('storefront-style'));
    wp_enqueue_style('iledysile-square-menu-style', get_stylesheet_directory_uri() . '/css/iledysile-square-menu.css', ['storefront-child-style']);
    wp_enqueue_style('iledysile-footer-style', get_stylesheet_directory_uri() . '/css/iledysile-footer.css', ['storefront-child-style']);
    wp_enqueue_style('iledysile-cart-count-style', get_stylesheet_directory_uri() . '/css/iledysile-cart-count.css', ['storefront-child-style']);

    /* Los CSS que NO dependen de una condición se declaran en el style.css raíz 
     (Ej: idy-main.cs, idy-main-hide-elements.css) */

    if (is_front_page()) { 
        wp_enqueue_style(
            'iledysile-home-style', 
            get_stylesheet_directory_uri() . '/css/iledysile-home.css', 
            array(), '1.0', 
            'all');
    }
    if (is_shop() || is_product_category()) {
        wp_enqueue_style(
            'iledysile-shop-style',
            get_stylesheet_directory_uri() . '/css/iledysile-shop.css',
            array(),
            '1.0',
            'all'
        );
    }
    if (is_product()) {
        wp_enqueue_style(
            'iledysile-product-style',
            get_stylesheet_directory_uri() . '/css/iledysile-product.css',
            array(),
            '1.0',
            'all'
        );

        wp_enqueue_style(
            'iledysile-ajax-add-to-cart-style',
            get_stylesheet_directory_uri() . '/css/iledysile-ajax-add-to-cart.css',
            array(),
            '1.0',
            'all'
        );
    }
    if (is_page('kontakt')) {
        wp_enqueue_style(
            'iledysile-kontakt-style',
            get_stylesheet_directory_uri() . '/css/iledysile-kontakt.css',
            array(),
            '1.0',
            'all'
        );
    }
    if (is_page('uber')) {
        wp_enqueue_style(
            'iledysile-uber-style',
            get_stylesheet_directory_uri() . '/css/iledysile-uber.css',
            array(),
            '1.0',
            'all'
        );
    }
    if (is_cart()) {
        wp_enqueue_style(
            'iledysile-cart-style',
            get_stylesheet_directory_uri() . '/css/iledysile-cart.css',
            array(),
            '1.0',
            'all'
        );
    }
    if (is_checkout()) {
        wp_enqueue_style(
            'iledysile-checkout-style',
            get_stylesheet_directory_uri() . '/css/iledysile-checkout.css',
            array(),
            '1.0',
            'all'
        );
    }
    if (is_page('grossentabelle')) {
        wp_enqueue_style(
            'iledysile-grossentabelle-style',
            get_stylesheet_directory_uri() . '/css/iledysile-grossentabelle.css',
            array(),
            '1.0',
            'all'
        );
    }
    if (is_page('agb')) {
        wp_enqueue_style(
            'iledysile-agb-style',
            get_stylesheet_directory_uri() . '/css/iledysile-agb.css',
            array(),
            '1.0',
            'all'
        );
    }
    if (is_page('datenschutz')) {
        wp_enqueue_style(
            'iledysile-datenschutz-style',
            get_stylesheet_directory_uri() . '/css/iledysile-datenschutz.css',
            array(),
            '1.0',
            'all'
        );
    }
    if (is_page('cookie-richtlinie')) {
        wp_enqueue_style(
            'iledysile-cookierichtlinie-style',
            get_stylesheet_directory_uri() . '/css/iledysile-cookierichtlinie.css',
            array(),
            '1.0',
            'all'
        );
    }
}

add_action('wp_enqueue_scripts', 'iledysile_enqueue_styles');
