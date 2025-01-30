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
    $('.woocommerce-product-gallery').append('<div class="gallery-nav prev">❮</div><div class="gallery-nav next">❯</div>');

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
