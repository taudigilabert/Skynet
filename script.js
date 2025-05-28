/*
window.addEventListener('DOMContentLoaded', () => {
    const alertMsg = document.getElementById('alert-message');
    const alertClose = document.getElementById('alert-close');

    function hideAlert() {
        alertMsg.classList.add('hidden');
        setTimeout(() => {
            alertMsg.style.display = 'none';
        }, 800); // tiempo de transición CSS
    }

    if (!localStorage.getItem('alertShown')) {
        localStorage.setItem('alertShown', 'true');
        alertMsg.style.display = 'block';
        alertMsg.style.opacity = '1';

        // Ocultar tras 5 segundos
        setTimeout(() => {
            hideAlert();
        }, 5000);
    } else {
        alertMsg.style.display = 'none';
    }

    // Cerrar manual
    alertClose.addEventListener('click', () => {
        hideAlert();
    });
});
*/



// FADE OUT + REDIRECCIÓN
function fadeAndRedirect(url) {
    document.body.classList.add('fade-out');
    setTimeout(() => {
        window.location.href = url;
    }, 400);
}

// EVENTOS AL CARGAR EL DOM
document.addEventListener("DOMContentLoaded", () => {
    // Botones de juego
    const btn1 = document.querySelector('[data-text="Juega por tu vida"]');
    const btn2 = document.querySelector('[data-text="Día del juicio final"]');
    const btn3 = document.querySelector('[data-text="Historial de Partidas"]');

    if (btn1) btn1.addEventListener("click", () => window.location.href = 'GAME/game.php');
    if (btn2) btn2.addEventListener("click", () => window.location.href = 'GAME/game2.php');
    if (btn3) btn3.addEventListener("click", () => window.location.href = './DATA/data.php');

    // Botón de información
    const infoBtn = document.getElementById('infoBtn');
    const infoText = document.getElementById('infoText');
    if (infoBtn && infoText) {
        infoBtn.addEventListener('click', () => {
            const expanded = infoBtn.getAttribute('aria-expanded') === 'true';
            infoBtn.setAttribute('aria-expanded', !expanded);
            infoText.classList.toggle('visible');
            infoText.setAttribute('aria-hidden', expanded);
        });
    }
});

// FUNCION PARA SELECCIONAR OPCIÓN Y ENVIAR FORMULARIO
function selectOption(opcion) {
    const elementoInput = document.getElementById("elemento");
    if (opcion && elementoInput) {
        elementoInput.value = opcion;
        const form = document.querySelector('form');
        if (form) form.submit();
    } else {
        alert("Por favor, selecciona una opción.");
    }
}
