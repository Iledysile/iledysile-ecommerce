<?php
require_once get_stylesheet_directory() . '/inc/iledysile-remove-img-zoom.php';
require_once get_stylesheet_directory() . '/inc/iledysile-remove-quantity-field.php';
/*require_once get_stylesheet_directory() . '/inc/iledysile-shortcode-range-selector.php';*/

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

function resaltar_shop_y_categoria($classes, $item, $args) {
    if (is_product()) {
        $terms = get_the_terms(get_the_ID(), 'product_cat');
        if ($terms) {
            foreach ($terms as $term) {
                if ($item->object_id == $term->term_id) {
                    $classes[] = 'current-menu-item';
                }
            }
        }
        if ($item->ID == 242) { // Cambia 242 por el ID de "Shop"
            $classes[] = 'current-menu-item';
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'resaltar_shop_y_categoria', 10, 3);


