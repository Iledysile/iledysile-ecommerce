document.addEventListener("DOMContentLoaded", function () {
    //Menu mobile con botón tipo meatball
    const meatball = document.querySelector('.meatball');
    const mobileMenu = document.getElementById('iledysile-mobile-menu');
    const menuOverlay = document.getElementById('iledysile-mobile-menu-overlay');
    
    meatball.addEventListener('click', () => {
        meatball.classList.toggle('active');
        mobileMenu.classList.toggle('active'); // Mostrar/ocultar el menú
        menuOverlay.classList.toggle('active'); // Mostrar/ocultar el overlay
    })
});