document.addEventListener("DOMContentLoaded", function () {
    const nav = document.querySelector(".storefront-primary-navigation");
    const subMenu = document.querySelector(".primary-navigation .sub-menu");

    // Escucha el evento de scroll
    window.addEventListener("scroll", function () {
        if (window.scrollY > 125) { //El num. son los píxeles que hay que bajar para que cambie a scrolled
            nav.classList.add("scrolled");
            subMenu.classList.add("scrolled");
            console.log("Hola");
        } else {
            nav.classList.remove("scrolled");
            subMenu.classList.remove("scrolled");
        }
    });


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