<?php
// Función para agregar el contador del carrito en el DOM
function iledysile_add_cart_count() {
    $cart_count = WC()->cart->get_cart_contents_count();
    ?>
        <a href="<?php echo esc_url(wc_get_cart_url()); ?>">
            <div id="iledysile-square-cart-button" class="iledysile-square-cart-button">
                <span id="iledysile-cart-count" class="iledysile-cart-count">
                    <?php echo esc_html($cart_count); ?>
                </span>
            </div>
        </a>
    <?php
}
add_action('storefront_header', 'iledysile_add_cart_count', 20);

// Función para agregar el script que actualiza el contador del carrito
function custom_cart_refresh_script_blocks() {
    ?>
    <script type="text/javascript">
        jQuery(function($){
            if ($('.iledysile-cart-count').text() > 0) {
                $('#iledysile-square-cart-button').show();
            } else {
                $('#iledysile-square-cart-button').hide();
            }
            if ( typeof wp !== 'undefined' && wp.data ) {
                // Escuchar cambios en el carrito con WooCommerce Blocks
                wp.data.subscribe( function() {
                    const cart = wp.data.select('wc/store/cart').getCartData();
                    if ( cart ) {

                        const cartCount = cart.items.reduce((total, item) => total + item.quantity, 0);

                        $('.iledysile-cart-count').text(cartCount);

                        if (cartCount > 0) {
                            $('#iledysile-square-cart-button').show();  
                        } else {
                            $('#iledysile-square-cart-button').hide(); 
                        }
                    }
                });
            }
        });
    </script>
    <?php
}
add_action('storefront_header', 'custom_cart_refresh_script_blocks');