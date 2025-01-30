document.addEventListener('DOMContentLoaded', function () {
    const range1 = document.getElementById('range1');
    const value1 = document.getElementById('value1');
    const range2 = document.getElementById('range2');
    const value2 = document.getElementById('value2');
    const talla = document.getElementById('talla');

    function actualizar() {
        value1.textContent = range1.value;
        value2.textContent = range2.value;
        const suma = parseInt(range1.value) + parseInt(range2.value);

        if (suma < 100) {
            talla.textContent = "S";
        } else if (suma >= 100 && suma <= 150) {
            talla.textContent = "M";
        } else {
            talla.textContent = "L";
        }
    }

    range1.addEventListener('input', actualizar);
    range2.addEventListener('input', actualizar);
    actualizar();
});