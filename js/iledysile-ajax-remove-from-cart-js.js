// iledysile-ajax-remove-from-cart-js.js

// Función para eliminar producto del carrito con AJAX
jQuery(function($) {
    $(document).on('click', '.iledysile-remove-product', function(e) {
        e.preventDefault();

        var $button = $(this);
        var product_id = $button.data('product-id');

        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'woocommerce_ajax_remove_from_cart',
                product_id: product_id
            },
            beforeSend: function() {
                $button.prop('disabled', true).text('...');
            },
            success: function(response) {
                if (response.success) {
                    // Actualizar contador del carrito
                    $('#iledysile-cart-count').text(response.data.cart_count); 
                    // Ocultar el div flotante
                    $('.iledysile-container-product-added').removeClass('show');
                    // Si el carrito queda vacío, ocultar el botón del carrito
                    if (response.data.cart_count == 0) {
                        $('#iledysile-square-cart-button').hide();
                    }
                    // Actualizar el carrito sin recargar la página
                    $(document.body).trigger('wc_fragment_refresh');
                } else {
                    $button.prop('disabled', false).text('✖');
                }
            }
        });
    });
});
