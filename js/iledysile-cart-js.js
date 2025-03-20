// Función para cambiar el texto del botón del carrito
document.addEventListener('DOMContentLoaded', function() {
    const observer = new MutationObserver(mutations => {
        mutations.forEach(mutation => {
            document.querySelectorAll('.wc-block-components-button__text').forEach(button => {
                if (button.innerText.trim()  === 'Weiter zum Bezahlen'|| button.innerText.trim() === 'Proceed to Checkout') {
                    button.innerText = 'ZUR KASSE';
                }
            });
        });
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
});