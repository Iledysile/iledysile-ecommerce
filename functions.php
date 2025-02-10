<?php
add_filter('show_admin_bar', '__return_false');

require_once get_stylesheet_directory() . '/inc/iledysile-enqueue-scripts.php';
require_once get_stylesheet_directory() . '/inc/iledysile-enqueue-styles.php';
require_once get_stylesheet_directory() . '/inc/iledysile-google-fonts.php';
require_once get_stylesheet_directory() . '/inc/iledysile-hero-home.php';
require_once get_stylesheet_directory() . '/inc/iledysile-square-menu.php';
require_once get_stylesheet_directory() . '/inc/iledysile-product-functions.php';
require_once get_stylesheet_directory() . '/inc/iledysile-woocommerce-image-sizes.php';
