document.addEventListener("DOMContentLoaded", function () {
    const nav = document.querySelector(".storefront-primary-navigation");

    // Escucha el evento de scroll
    window.addEventListener("scroll", function () {
        if (window.scrollY > 125) { //El num. son los píxeles que hay que bajar para que cambie a scrolled
            nav.classList.add("scrolled");
        } else {
            nav.classList.remove("scrolled");
        }
    });
});