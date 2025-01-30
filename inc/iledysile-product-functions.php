<?php
require_once get_stylesheet_directory() . '/inc/iledysile-remove-img-zoom.php';
require_once get_stylesheet_directory() . '/inc/iledysile-remove-quantity-field.php';
/*require_once get_stylesheet_directory() . '/inc/iledysile-shortcode-range-selector.php';*/

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
