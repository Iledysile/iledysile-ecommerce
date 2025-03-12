document.addEventListener("DOMContentLoaded", function () {
    const iledysileSquareMenuButton = document.querySelector('.iledysile-square-menu-button');
    const squareMenu = document.getElementById('iledysile-square-menu');
    const squareMenuOverlay = document.getElementById('iledysile-square-menu-overlay');
    const menuItems = document.querySelector('.iledysile-square-menu-items'); // Opcional, si quieres cerrar al hacer click en un item específico
    
    // Función para abrir/cerrar el menú cuando se hace clic en el botón
    iledysileSquareMenuButton.addEventListener('click', () => {
        iledysileSquareMenuButton.classList.toggle('active');
        squareMenu.classList.toggle('active'); // Mostrar/ocultar el menú
        squareMenuOverlay.classList.toggle('active'); // Mostrar/ocultar el overlay
    });

    // Cerrar el menú si se hace clic fuera de él
    document.addEventListener('click', function (event) {
        // Verificamos si el clic fue fuera del menú y fuera del botón
        if (!squareMenu.contains(event.target) && !iledysileSquareMenuButton.contains(event.target)) {
            // Cerrar el menú y el overlay
            squareMenu.classList.remove('active');
            squareMenuOverlay.classList.remove('active');
            iledysileSquareMenuButton.classList.remove('active');
        }
    });

    // Cerrar el menú al hacer clic en un item del menú (opcional)
    if (menuItems) {
        menuItems.addEventListener('click', () => {
            squareMenu.classList.remove('active');
            squareMenuOverlay.classList.remove('active');
            iledysileSquareMenuButton.classList.remove('active');
        });
    }
});
