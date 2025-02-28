function updateCartCount() {
    let cartCount = document.querySelector(".count");
    if (cartCount) {
        cartCount.textContent = cartCount.textContent.replace(/\D+/g, ""); // Deja solo los números
    }
}

// Ejecutar cuando la página carga
document.addEventListener("DOMContentLoaded", updateCartCount);

// Detectar cambios cuando WooCommerce actualiza el carrito con AJAX
jQuery(document.body).on("updated_wc_div updated_cart_totals added_to_cart removed_from_cart", function () {
    updateCartCount();
});
