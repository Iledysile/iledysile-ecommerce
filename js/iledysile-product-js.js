//Agrega flechas de navegación al carrusel de imágenes
jQuery(document).ready(function ($) {
    let currentIndex = 0;
    const images = $('.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image');
    const totalImages = images.length;

    // Si solo hay una imagen, no mostrar las flechas
    if (totalImages <= 1) {
        return;
    }

    function updateGallery(index) {
        images.hide();
        images.eq(index).fadeIn();
    }

    // Agregar flechas de navegación
    $('.woocommerce-product-gallery').append('<div class="gallery-nav prev"></div><div class="gallery-nav next"></div>');

    $('.gallery-nav.next').click(function () {
        if (currentIndex < totalImages - 1) {
            currentIndex++;
        } else {
            currentIndex = 0; // Vuelve a la primera imagen si está en la última
        }
        updateGallery(currentIndex);
    });

    $('.gallery-nav.prev').click(function () {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = totalImages - 1; // Vuelve a la última imagen si está en la primera
        }
        updateGallery(currentIndex);
    });

    updateGallery(currentIndex);
});

//En el seleccionable de tallas, oculta la primera opción que contiene "XS S M L"
jQuery(document).ready(function($) {
    var selectElement = $('#pa_slug_size');

    var firstOption = selectElement.find('option:first-child');
    firstOption.attr('disabled', 'disabled').attr('selected', 'selected').hide();

    selectElement.on('focus', function() {
        selectElement.find('option:first-child').hide();
    });

    selectElement.on('blur', function() {
        selectElement.find('option:first-child').hide();
    });

    selectElement.on('change', function() {
        var selectedOption = selectElement.val();
        if (selectedOption !== "") {
            selectElement.find('option:first-child').hide();
        } else {
            selectElement.find('option:first-child').show();
        }
    });
});

// Oculta el logo del menú al hacer scroll hacia abajo y lo muestra al hacer scroll hacia arriba
jQuery(function($) {
    const $logo = $('.iledysile-square-menu-logo');

    $(window).on('scroll', function() {
        const scrollTop = $(this).scrollTop();

        if (scrollTop > 20) {
            $logo.addClass('hidden');
        } else if (scrollTop === 0) {
            $logo.removeClass('hidden');
        }
    });
});

// Actualiza el punto activo del carrusel de imágenes en la página del producto
// para que coincida con la imagen activa del carrusel
document.addEventListener('DOMContentLoaded', () => {

  function updateActivePoint() {
    const points = document.querySelectorAll('.flex-control-nav.flex-control-thumbs li');
    points.forEach(li => {
      const img = li.querySelector('img');
      if (img && img.classList.contains('flex-active')) {
        li.classList.add('flex-active');
      } else {
        li.classList.remove('flex-active');
      }
    });
  }

  function initObserver() {
    const points = document.querySelectorAll('.flex-control-nav.flex-control-thumbs li');
    if (points.length === 0) return false; // No hay puntos, esperar

    points.forEach(li => {
      const img = li.querySelector('img');
      if (img) {
        const observer = new MutationObserver(() => {
          updateActivePoint();
        });
        observer.observe(img, { attributes: true, attributeFilter: ['class'] });
      }
    });

    // Ejecutamos la primera actualización
    updateActivePoint();
    return true;
  }

  // Esperar que los puntos existan usando MutationObserver en body
  const bodyObserver = new MutationObserver((mutations, obs) => {
    if (initObserver()) {
      obs.disconnect();
    }
  });
  bodyObserver.observe(document.body, { childList: true, subtree: true });
});