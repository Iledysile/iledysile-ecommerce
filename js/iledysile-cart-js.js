// Función para ajustar la altura de la columna izquierda en la página del carrito
document.addEventListener("DOMContentLoaded", function () {

    function ajustarAltura() {

        const tablaCarrito = document.querySelector(".iledysile-cart-items");
        const columnaIzquierda = document.querySelector(".iledysile-col-left");

        if (!tablaCarrito) {
            setTimeout(ajustarAltura, 200); // Reintenta en 200ms
            return;
        }
        if (!columnaIzquierda) {
            return;
        }

        const alturaTabla = tablaCarrito.offsetHeight;
        const alturaVentana = window.innerHeight - 100; // 100px de margen

        if (alturaTabla > alturaVentana) {
            columnaIzquierda.style.height = "100%";
        } else {
            columnaIzquierda.style.height = "100vh";
        }
    }

    // Esperar a que .iledysile-cart-items esté disponible
    const observer = new MutationObserver(() => {
        if (document.querySelector(".iledysile-cart-items")) {
            observer.disconnect(); // Dejar de observar cuando lo encuentre
            ajustarAltura();
        }
    });

    observer.observe(document.body, { childList: true, subtree: true });

    // También ejecutar al redimensionar la ventana
    window.addEventListener("resize", function () {
        ajustarAltura();
    });

    // Observar cambios en la tabla para detectar eliminación de productos
    const carritoObserver = new MutationObserver(() => {
        ajustarAltura();
    });

    const tablaCarrito = document.querySelector(".iledysile-cart-items");
    if (tablaCarrito) {
        carritoObserver.observe(tablaCarrito, { childList: true, subtree: true });
    }
});

// Función para mostrar el spinner al cargar la página
window.addEventListener('load', function() {
    const spinner = document.getElementById('loading-spinner');
    setTimeout(() => {
        spinner.style.opacity = '0';
        setTimeout(() => {
            spinner.style.display = 'none'; 
        }, 300); // Tiempo para que ocurra la transición de opacidad
    }, 400); // Retardo de 500ms para asegurarnos de que la página cargue correctamente
});
