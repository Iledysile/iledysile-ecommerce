<?php

// Evitar acceso directo
if (!defined('ABSPATH')) exit;

// Registrar el shortcode del selector de rango
function iledysile_range_selector_shortcode() {
    ob_start();
    ?>
    <div class="iledysile-range-selector">
        <h2>Selecciona los valores para determinar tu talla</h2>

        <label for="range1">Rango 1:</label>
        <input type="range" id="range1" name="range1" min="0" max="100" value="50" step="1">
        <span id="value1">50</span>

        <br><br>

        <label for="range2">Rango 2:</label>
        <input type="range" id="range2" name="range2" min="0" max="100" value="50" step="1">
        <span id="value2">50</span>

        <br><br>

        <p><strong>Talla recomendada: <span id="talla">S</span></strong></p>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('iledysile_range_selector', 'iledysile_range_selector_shortcode');


// Añadir el shortcode del selector de rango en la página del producto
function iledysile_insert_shortcode_input_range() {
    echo do_shortcode('[iledysile_range_selector]');
}
add_action('woocommerce_single_product_summary', 'iledysile_insert_shortcode_input_range', 15);
