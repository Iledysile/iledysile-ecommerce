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

document.addEventListener('DOMContentLoaded', () => {
  const isHome = window.location.pathname === '/' || window.location.pathname === '/index.php';
  if (!isHome) return;

  const hero1 = document.querySelector('.iledysile-hero-image');
  const hero2 = document.querySelector('.iledysile-hero-image-2');
  if (!hero1 || !hero2) return;

  // Obtener estado actual de la imagen mostrada
  const currentHero = sessionStorage.getItem('currentHero') || '1';

  if (currentHero === '1') {
    hero1.classList.remove('hidden');
    hero2.classList.add('hidden');
    sessionStorage.setItem('currentHero', '2');
  } else {
    hero1.classList.add('hidden');
    hero2.classList.remove('hidden');
    sessionStorage.setItem('currentHero', '1');
  }
});
