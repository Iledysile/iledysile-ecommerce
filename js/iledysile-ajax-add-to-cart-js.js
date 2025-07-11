// iledysile-ajax-add-to-cart-js.js

// Función para agregar al carrito con AJAX
jQuery(function($) {
    var hideWindowTimeout = 20000;
    var hideMessageTimeout = 30000;
    var timeoutId;

    $('.ajax_add_to_cart').on('click', function(e) {
        e.preventDefault();

        var $button = $(this);
        var product_id = $button.data('product_id');

        var $sizeSelect = $('select[name="attribute_pa_slug_size"]');
        var size = $sizeSelect.val();
        var $tdValue = $sizeSelect.closest('td.value');

        // Si no hay talla seleccionada
        if (!size) {
            // Si no existe el mensaje aún, lo agregamos debajo del td.value
            if ($tdValue.next('.size-warning').length === 0) {
                $tdValue.after('<tr class="size-warning"><td colspan="2" style="color: rgb(176, 0, 32);">Bitte wähle eine Grösse aus</td></tr>');
            }

            // Mostrar el mensaje
            $('.size-warning').show();

            // Limpiar cualquier timeout anterior
            clearTimeout(timeoutId);

            // Ocultar mensaje después de hideTimeout
            timeoutId = setTimeout(function() {
                $('.size-warning').fadeOut();
            }, hideMessageTimeout);

            return;
        }

        // Si hay mensaje visible y ya eligieron talla, ocultarlo
        $('.size-warning').fadeOut();

        // Obtener cantidad
        var quantity = $('input[name="quantity"]').val();
        if (!quantity || quantity < 1) {
            quantity = 1;
        }

        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'woocommerce_ajax_add_to_cart',
                product_id: product_id,
                size: size,
                quantity: quantity
            },
            beforeSend: function() {
                $button.prop('disabled', true).text('Wird hinzugefügt...');
            },
            success: function(response) {
                if (response.success) {
                    $button.text('Hinzugefügt ✅').delay(2000).queue(function(next) {
                        $(this).text('In den Warenkorb').prop('disabled', false);
                        next();
                    });

                    $('.iledysile-container-product-added').html(updateFloatingCartInfo(response.data));
                    $('.iledysile-container-product-added').addClass('show');

                    setTimeout(function() {
                        $('.iledysile-container-product-added').removeClass('show');
                    }, hideWindowTimeout);

                    $('#iledysile-cart-count').text(response.data.cart_count);

                    if (response.data.cart_count > 0) {
                        $('#iledysile-square-cart-button').show();
                    } else {
                        $('#iledysile-square-cart-button').hide();
                    }

                    $(document.body).trigger('wc_fragment_refresh');
                } else {
                    $button.prop('disabled', false).text('Añadir al carrito');
                }
            }
        });
    });

    // Al cambiar la talla, ocultar el mensaje si está visible
    $('select[name="attribute_pa_slug_size"]').on('change', function() {
        $('.size-warning').fadeOut();
    });
});


// Función para actualizar el HTML del div flotante
function updateFloatingCartInfo(data) {
    return '' +
            // Primera fila
            '<div class="iledysile-first-row">' +
                '<div class="iledysile-col-left first"></div>' +
                '<div class="iledysile-col-right first">' +
                    '<button class="iledysile-close-btn">✖</button>' +
                '</div>' +
            '</div>' +

            // Segunda fila con dos subrows
            '<div class="iledysile-second-row">' +
                '<div class="iledysile-col-left second"></div>' +
                '<div class="iledysile-col-right second">' +

                    // Primera subrow con el mensaje de confirmación
                    '<div class="iledysile-subrow-message">' +
                        '<span class="iledysile-tick">✔</span>' +
                        '<span class="iledysile-message">ARTIKEL WURDE IN DEN WARENKORB GELEGT</span>' +
                    '</div>' +

                    // Segunda subrow con detalles del producto
                    '<div class="iledysile-subrow-details">' +

                        // Primera subcolumna: imagen en miniatura
                        '<div class="iledysile-subcol-left">' +
                            '<img src="' + data.product_image + '" alt="' + data.product_name + '" class="iledysile-product-thumbnail">' +
                        '</div>' +

                        // Segunda subcolumna: información del producto
                        '<div class="iledysile-subcol-middle">' +
                            '<span class="iledysile-product-name"><a href="' + data.product_url + '">' + data.product_name.toUpperCase() + '</a></span><br>' +
                            '<span class="iledysile-product-size">GRÖSSE: ' + data.product_size.toUpperCase() + '</span><br>' +
                            '<span class="iledysile-product-quantity">MENGE: ' + data.product_quantity + '</span>' +
                        '</div>' +

                        // // Tercera subcolumna: botón de eliminar producto
                        // '<div class="iledysile-subcol-right">' +
                        //     '<button class="iledysile-remove-product" data-product-id="' + data.product_id + '">✖</button>' +
                        // '</div>' +

                    '</div>' + // Cierre de la subrow de detalles
                '</div>' + // Cierre de la columna derecha
            '</div>' + // Cierre de la segunda fila

            // Tercera fila con enlaces de navegación
            '<div class="iledysile-third-row">' +
                '<div class="iledysile-col-left third"></div>' +
                '<div class="iledysile-col-right third">' +
                    '<a href="' + data.shop_url + '" class="iledysile-link first">ZUM SHOP</a>' + 
                    '<a href="' + data.cart_url + '" class="iledysile-link second">WARENKORB</a>' + 
                    '<a href="' + data.checkout_url + '" class="iledysile-link third">ZUR KASSE</a>' + 
                '</div>' +
            '</div>';
}

// Cerrar el div con el botón de cerrar
jQuery(document).on("click", ".iledysile-close-btn", function () {
    jQuery(".iledysile-container-product-added").removeClass("show");
});