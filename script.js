// FADE OUT + REDIRECCIÓN
function fadeAndRedirect(url) {
    document.body.classList.add('fade-out');
    setTimeout(() => {
        window.location.href = url;
    }, 400);
}

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

// EVENTOS AL CARGAR EL DOM
document.addEventListener("DOMContentLoaded", () => {
    const currentPage = document.body.getAttribute('data-page');
    switch (currentPage) {
        case 'main-menu':
            initMainMenu();
            break;
        case 'arcade-menu':
            initArcadeMenu();
            break;
        case 'historia-menu':
            initHistoriaMenu();
            break;
        default:
            console.warn('No se ha definido un data-page válido.');
    }

    // Botón de información (común a todas las páginas)
    const infoBtn = document.getElementById('infoBtn');
    const infoText = document.getElementById('infoText');

    if (infoBtn && infoText) {
        infoBtn.addEventListener('click', () => {
            const expanded = infoBtn.getAttribute('aria-expanded') === 'true';
            infoBtn.setAttribute('aria-expanded', expanded ? "false" : "true");
            infoText.classList.toggle('visible');
            infoText.setAttribute('aria-hidden', expanded.toString());
        });
    }
});

// MENÚ PRINCIPAL
function initMainMenu() {
    const btnHistoria = document.querySelector('[data-text="Modo Historia"]');
    const btnArcade = document.querySelector('[data-text="Modo Arcade"]');
    const btnHistorial = document.querySelector('[data-text="Historial de Partidas"]');

    if (btnHistoria) {
        btnHistoria.addEventListener("click", () => {
            window.location.href = './HISTORY/historyMode.php';
        });
    }
    if (btnArcade) {
        btnArcade.addEventListener("click", () => {
            window.location.href = './GAME/arcadeMode.php';
        });
    }
    if (btnHistorial) {
        btnHistorial.addEventListener("click", () => {
            window.location.href = './DATA/data.php';
        });
    }
}

// MENÚ ARCADE
function initArcadeMenu() {
    const btnGame1 = document.querySelector('[data-text="Juega por tu vida"]');
    const btnGame2 = document.querySelector('[data-text="Día del juicio final"]');

    if (btnGame1) {
        btnGame1.addEventListener("click", () => {
            window.location.href = './GAME/game.php';
        });
    }
    if (btnGame2) {
        btnGame2.addEventListener("click", () => {
            window.location.href = './GAME/game2.php';
        });
    }
}

// MENÚ HISTORIA (si lo usas en otra parte)
function initHistoriaMenu() {
    // Aquí puedes poner lógicas específicas si las necesitas
}
