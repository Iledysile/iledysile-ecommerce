 // iledysile-uber-js.js
 document.addEventListener('DOMContentLoaded', () => {
    const containers = document.querySelectorAll('.background-text');

    function highlightRandomText() {
      containers.forEach(el => el.classList.remove('active')); // reset todos

      const randomIndex = Math.floor(Math.random() * containers.length);
      const selected = containers[randomIndex];

      selected.classList.add('active');

      setTimeout(() => {
        selected.classList.remove('active');
      }, 2000); // después de 2s vuelve al color base
    }

    setInterval(highlightRandomText, 2000);
  });