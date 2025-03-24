// Función para ajustar la altura de la columna izquierda en la página del carrito
document.addEventListener("DOMContentLoaded", function () {

    function adjustHeight() {

        const cartTable = document.querySelector(".iledysile-cart-items");
        const leftColumn = document.querySelector(".iledysile-col-left");

        if (!cartTable) {
            setTimeout(adjustHeight, 200); // Reintenta en 200ms
            return;
        }
        if (!leftColumn) {
            return;
        }

        const tableHeight = cartTable.offsetHeight;
        const windowHeight = window.innerHeight - 100; // 100px de margen

        if (tableHeight > windowHeight) {
            leftColumn.style.height = "100%";
        } else {
            leftColumn.style.height = "100vh";
        }
    }

    // Esperar a que .iledysile-cart-items esté disponible
    const observer = new MutationObserver(() => {
        if (document.querySelector(".iledysile-cart-items")) {
            observer.disconnect(); // Dejar de observar cuando lo encuentre
            adjustHeight();
        }
    });

    observer.observe(document.body, { childList: true, subtree: true });

    // También ejecutar al redimensionar la ventana
    window.addEventListener("resize", function () {
        adjustHeight();
    });

    // Observar cambios en la tabla para detectar eliminación de productos
    const cartObserver = new MutationObserver(() => {
        adjustHeight();
    });

    const cartTable = document.querySelector(".iledysile-cart-items");
    if (cartTable) {
        cartObserver.observe(cartTable, { childList: true, subtree: true });
    }
});

// Función para agregar un placeholder al campo de cupón
document.addEventListener("DOMContentLoaded", function() {
    var observer = new MutationObserver(function() {
        var couponInput = document.querySelector('#wc-block-components-totals-coupon__input-0');
        if (couponInput) {
            couponInput.setAttribute('placeholder', 'CODE EINFÜGEN');
        }
    });

    // Observar el cuerpo del documento para detectar cambios
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
});


// Función para mostrar el spinner al cargar la página
window.addEventListener('load', function() {
    const spinner = document.getElementById('loading-spinner');
    setTimeout(() => {
        spinner.style.opacity = '0';
        setTimeout(() => {
            spinner.style.display = 'none'; 
        }, 300); // Tiempo para que ocurra la transición de opacidad
    }, 600); // Retardo en ms para asegurarnos de que la página cargue correctamente
});
