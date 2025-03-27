// Función para mostrar el spinner al cargar la página
window.addEventListener('load', function() {
    const spinner = document.getElementById('loading-spinner');
    setTimeout(() => {
        spinner.style.opacity = '0';
        setTimeout(() => {
            spinner.style.display = 'none'; 
        }, 300); // Tiempo para que ocurra la transición de opacidad
    }, 600); // Retardo en ms para asegurarnos de que la página cargue correctamente
});

document.addEventListener("DOMContentLoaded", function() {
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === "childList") {
                // Comprobar si el label está presente
                let label = document.querySelector('label[for="shipping-address_1"]');
                
                if (label) {
                    label.textContent = 'Addresse / Hausenummer';
                    observer.disconnect(); // Detenemos la observación una vez que el cambio ha sido realizado
                }
            }
        });
    });

    // Iniciar el observer para observar cambios en el body
    observer.observe(document.body, { childList: true, subtree: true });
});
