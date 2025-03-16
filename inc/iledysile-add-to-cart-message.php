<?php
add_filter('wc_add_to_cart_message', 'custom_add_to_cart_message', 10, 2);

function custom_add_to_cart_message($message, $product_id) {
    
    $product = wc_get_product($product_id); // Obtener el producto
    $product_name = $product->get_name(); // Obtener el nombre del producto
    $product_price = $product->get_price_html(); // Obtiene el precio con formato
    
    // Obtener la cantidad de productos en el carrito
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    
    $size = '';
    if ($product->is_type('variable')) {
        if (isset($_REQUEST['attribute_pa_slug_size'])) {
            $size = sanitize_text_field($_REQUEST['attribute_pa_slug_size']); // Obtiene el valor de la talla seleccionada
        }
    }

    // Obtener la imagen en miniatura del producto
    $thumbnail_url = get_the_post_thumbnail_url($product_id, 'thumbnail'); // Recupera la miniatura
    if (!$thumbnail_url) {
        $thumbnail_url = wc_placeholder_img_src(); // Imagen por defecto si no hay miniatura
    } else {
        $thumbnail_url = esc_url($thumbnail_url);
    } 

    $custom_message = '<div class="iledysile-container-product-added">';

    // Primera fila
    $custom_message .= '<div class="iledysile-first-row">';
    $custom_message .= '<div class="iledysile-col-left first">Col 1</div>';
    $custom_message .= '<div class="iledysile-col-right first"><button class="iledysile-close-btn">✖</button></div>';
    $custom_message .= '</div>';

    // Segunda fila con dos subrows
    $custom_message .= '<div class="iledysile-second-row">';
    $custom_message .= '<div class="iledysile-col-left second">Col 1</div>';
    $custom_message .= '<div class="iledysile-col-right second">';

        // Primera subrow con el mensaje de confirmación
        $custom_message .= '<div class="iledysile-subrow-message">';
        $custom_message .= '<span class="iledysile-tick">✔</span>';
        $custom_message .= '<span class="iledysile-message">ARTIKEL WURDE IN DEN WARENKORB GELEGT</span>';
        $custom_message .= '</div>';

        // Segunda subrow con detalles del producto
        $custom_message .= '<div class="iledysile-subrow-details">';

            // Primera subcolumna: imagen en miniatura
            $custom_message .= '<div class="iledysile-subcol-left">';
            $custom_message .= '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr($product->get_name()) . '" class="iledysile-product-thumbnail">';
            $custom_message .= '</div>';

            // Segunda subcolumna: información del producto
            $custom_message .= '<div class="iledysile-subcol-middle">';
            $custom_message .= '<span class="iledysile-product-name"><a href="' . get_permalink($product_id) . '">' . $product_name . '</a></span><br>';
            if ($size) {
                $custom_message .= '<span class="iledysile-product-size">Talla: ' . $size . '</span><br>';
            }
            $custom_message .= '<span class="iledysile-product-quantity">Cantidad: ' . $quantity . '</span><br>';
            $custom_message .= '<span class="iledysile-product-price">CHF ' . $product_price . '</span>';
            $custom_message .= '</div>';

            // Tercera subcolumna: botón de eliminar producto
            $custom_message .= '<div class="iledysile-subcol-right">';
            $custom_message .= '<span class="iledysile-remove-product">✖</span>';
            $custom_message .= '</div>';

        $custom_message .= '</div>'; // Cierre de la subrow de detalles

    $custom_message .= '</div>'; // Cierre de la columna derecha
    $custom_message .= '</div>'; // Cierre de la segunda fila

    // Tercera fila con enlaces de navegación
    $custom_message .= '<div class="iledysile-third-row">';
    $custom_message .= '<div class="iledysile-col-left third">Col 1</div>';
    $custom_message .= '<div class="iledysile-col-right third">';
    $custom_message .= '<a href="' . esc_url(home_url('/shop')) . '" class="iledysile-link">ZUM SHOP</a>'; // Página de la tienda
    $custom_message .= '<a href="' . esc_url(wc_get_cart_url()) . '" class="iledysile-link">WARENKORB</a>'; // Carrito
    $custom_message .= '<a href="' . esc_url(wc_get_checkout_url()) . '" class="iledysile-link">ZUR KASSE</a>'; // Checkout
    $custom_message .= '</div>';
    $custom_message .= '</div>';

$custom_message .= '</div>'; // Cierre del contenedor principal


return $custom_message;

}