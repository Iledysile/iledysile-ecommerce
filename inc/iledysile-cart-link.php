<?php
// Función para agregar el contador del carrito en el DOM
function iledysile_add_cart_count() {
    // Obtener el número de productos en el carrito
    $cart_count = WC()->cart->get_cart_contents_count();

    // Solo mostrar el span si el contador es mayor a cero
    if ($cart_count > 0) {
        ?>
        <span id="iledysile-cart-count" class="iledysile-cart-count">
            <?php echo $cart_count; ?> <!-- Muestra el número de productos en el carrito -->
        </span>
        <?php
    }
}

// Agregar la función al encabezado
add_action('storefront_header', 'iledysile_add_cart_count', 20); // Prioridad 20



function custom_cart_refresh_script_blocks() {
    ?>
    <script type="text/javascript">
        jQuery(function($){
            if ( typeof wp !== 'undefined' && wp.data ) {
                // Escuchar cambios en el carrito con WooCommerce Blocks
                wp.data.subscribe( function() {
                    const cart = wp.data.select('wc/store/cart').getCartData();
                    if ( cart ) {
                        const cartCount = cart.items.reduce((total, item) => total + item.quantity, 0);

                        // Actualizar el texto del contador en el DOM
                        $('.iledysile-cart-count').text(cartCount);

                        // Mostrar u ocultar el span según el valor de cartCount
                        if (cartCount > 0) {
                            $('#iledysile-cart-count').show();  // Mostrar el span
                        } else {
                            $('#iledysile-cart-count').hide();  // Ocultar el span si es 0
                        }
                    }
                });
            }
        });
    </script>
    <?php
}
add_action('wp_footer', 'custom_cart_refresh_script_blocks');


