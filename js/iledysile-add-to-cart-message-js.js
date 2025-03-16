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