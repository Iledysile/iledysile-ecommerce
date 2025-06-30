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

// Función para añadir un mensaje personalizado en el bloque de Totales de Entrega
document.addEventListener("DOMContentLoaded", function () {
  const observer = new MutationObserver(function (mutations, obs) {
    // Seleccionamos el contenedor personalizado
    const deliveryWrapper = document.querySelector(".iledysile-delivery");

    if (deliveryWrapper) {
      const totalsItem = deliveryWrapper.querySelector(".wc-block-components-totals-item");
      if (totalsItem && !totalsItem.querySelector(".custom-delivery-time-message")) {
        const valueDiv = totalsItem.querySelector(".wc-block-components-totals-item__value");
        if (valueDiv) {
          const messageDiv = document.createElement("div");
          messageDiv.className = "custom-delivery-time-message";
          messageDiv.textContent = "Die Lieferung kann zwischen 7 und 21 Tagen dauern";

          valueDiv.insertAdjacentElement("afterend", messageDiv);
          obs.disconnect();
        }
      }
    }
  });

  observer.observe(document.body, { childList: true, subtree: true });
});
