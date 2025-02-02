document.addEventListener("DOMContentLoaded", function () {
    const nav = document.querySelector(".storefront-primary-navigation");
    const subMenu = document.querySelector(".primary-navigation .sub-menu");

    // Escucha el evento de scroll
    window.addEventListener("scroll", function () {
        if (window.scrollY > 125) { //El num. son los píxeles que hay que bajar para que cambie a scrolled
            nav.classList.add("scrolled");
            subMenu.classList.add("scrolled");
        } else {
            nav.classList.remove("scrolled");
            subMenu.classList.remove("scrolled");
        }
    });
});