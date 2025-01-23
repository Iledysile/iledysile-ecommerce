<?php
// Optimizar la carga de Google Fonts
function iledysile_add_google_fonts_preconnect() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'iledysile_add_google_fonts_preconnect');

function iledysile_add_google_fonts() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Roboto+Slab:wght@100..900&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'iledysile_add_google_fonts');
