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

// Función para cambiar el texto del label del campo de dirección de envío
document.addEventListener("DOMContentLoaded", function() {
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === "childList") {
                // Comprobar si el label está presente
                let label = document.querySelector('label[for="shipping-address_1"]');
                
                if (label) {
                    label.textContent = 'Adresse / Hausenummer';
                    observer.disconnect(); // Detenemos la observación una vez que el cambio ha sido realizado
                }
            }
        });
    });

    // Iniciar el observer para observar cambios en el body
    observer.observe(document.body, { childList: true, subtree: true });
});

// Función para añadir un mensaje de tiempo de entrega en la sección de envío del checkout
document.addEventListener("DOMContentLoaded", function () {
  const observer = new MutationObserver(function () {
    const items = document.querySelectorAll(".wc-block-components-totals-item");

    items.forEach(function (item) {
      const value = item.querySelector(".wc-block-components-totals-item__value");
      const shippingVia = item.querySelector(".wc-block-components-totals-shipping__via");

      if (
        shippingVia &&  // Si existe esta clase, es envío
        value &&
        !item.querySelector(".custom-delivery-time-message")
      ) {
        const message = document.createElement("div");
        message.className = "custom-delivery-time-message";
        message.textContent = "Die Lieferung kann zwischen 7 und 21 Tagen dauern";
        message.style.fontSize = "0.85rem";
        message.style.color = "#666";

        value.insertAdjacentElement("afterend", message);
        observer.disconnect();
      }
    });
  });

  observer.observe(document.body, { childList: true, subtree: true });
});



