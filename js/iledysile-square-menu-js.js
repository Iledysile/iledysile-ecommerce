document.addEventListener("DOMContentLoaded", function () {
    //Menu square con botón tipo iledysile-square-menu-button
    const iledysileSquareMenuButton = document.querySelector('.iledysile-square-menu-button');
    const squareMenu = document.getElementById('iledysile-square-menu');
    const squareMenuOverlay = document.getElementById('iledysile-square-menu-overlay');
    
    iledysileSquareMenuButton.addEventListener('click', () => {
        iledysileSquareMenuButton.classList.toggle('active');
        squareMenu.classList.toggle('active'); // Mostrar/ocultar el menú
        squareMenuOverlay.classList.toggle('active'); // Mostrar/ocultar el overlay
    })
});