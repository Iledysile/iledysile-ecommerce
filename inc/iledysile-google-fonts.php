<?php
function iledysile_add_google_fonts_preconnect() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">' . "\n";
}
add_action('wp_head', 'iledysile_add_google_fonts_preconnect');

function iledysile_add_google_fonts_preload() {
    echo '<link rel="preload" href="https://fonts.gstatic.com/s/bevietnampro/v11/QdVPSTAyLFyeg_IDWvOJmVES_Hw3BXo.woff2" as="font" type="font/woff2" crossorigin="anonymous">' . "\n";
}
add_action('wp_head', 'iledysile_add_google_fonts_preload');

function iledysile_add_google_fonts() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'iledysile_add_google_fonts');