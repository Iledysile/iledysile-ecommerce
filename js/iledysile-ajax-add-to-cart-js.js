// iledysile-ajax-add-to-cart-js.js

document.addEventListener("DOMContentLoaded", function() {
    let notification = document.querySelector(".iledysile-container-product-added");
    let closeButton = document.querySelector(".iledysile-close-btn");

    // Función para mostrar el div
    function showNotification() {
        notification.classList.add("show");

        // Ocultarlo después de 5 segundos
        setTimeout(() => {
            notification.classList.remove("show");
        }, 5000);
    }

    // Función para cerrar al hacer clic en la X
    closeButton.addEventListener("click", function() {
        notification.classList.remove("show");
    });

    // Simulación de agregar producto al carrito (ejecutar cuando sea necesario)
    showNotification();
});

jQuery(function ($) {
    $('.ajax_add_to_cart').on('click', function (e) {
        e.preventDefault();

        var $button = $(this);
        var product_id = $button.data('product_id');

        // Obtener la talla seleccionada
        var size = $('select[name="attribute_pa_slug_size"]').val(); // Asegúrate de que el nombre del atributo coincida con el slug

        // Verificar si se ha seleccionado una talla
        if (!size) {
            //TODO
            alert('Por favor, selecciona una talla.');
            return;
        }

        console.log('Talla ' + size);

        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            // Pasamos los datos necesarios al servidor
            data: {
                action: 'woocommerce_ajax_add_to_cart',
                product_id: product_id,
                size: size 
            },
            beforeSend: function () {
                $button.prop('disabled', true).text('Añadiendo...');
            },
            success: function (response) {
                if (response.success) {
                    $button.text('Añadido ✅').delay(2000).queue(function (next) {
                        $(this).text('Añadir al carrito').prop('disabled', false);
                        next();
                    });

                    console.log(response);

                    // Mostrar div flotante con imagen, nombre, precio y talla
                    $('.floating-cart-info').html(
                        '<img src="' + response.data.product_image + '" style="width: 50px; height: auto; margin-right: 10px; float: left; border-radius: 5px;">' +
                        '<p><strong>' + response.data.product_name + '</strong></p>' +
                        '<p>Precio: ' + response.data.product_price + '</p>' +
                        '<p>Talla: ' + response.data.product_size + '</p>' // Mostrar talla
                    ).fadeIn().delay(3000).fadeOut();

                    // Actualizamos el contador
                    $('#iledysile-cart-count').text(response.data.cart_count); // Actualizar el contador con la respuesta del servidor

                    // **Comprobamos si el carrito tiene productos y mostramos el botón si es necesario**
                    if (response.data.cart_count > 0) {
                        $('#iledysile-square-cart-button').show(); // Mostrar el carrito si hay productos
                    } else {
                        $('#iledysile-square-cart-button').hide(); // Ocultar el carrito si no hay productos
                    }

                    // Actualizar el carrito en el header sin recargar la página
                    $(document.body).trigger('wc_fragment_refresh');
                } else {
                    $button.prop('disabled', false).text('Añadir al carrito');
                }
            }
        });
    });
});

