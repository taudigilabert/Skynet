// ALERT AL CARGAR LA PAG
window.addEventListener('load', () => {
    const alertMsg = document.getElementById('alert-message');
    setTimeout(() => {
        alertMsg.style.opacity = '0';
    }, 4000);  // Espera 4 segundos antes de empezar a ocultar

    setTimeout(() => {
        alertMsg.style.display = 'none';
    }, 4800);  // Oculta completamente después de la transición
});


//HISTORIAL
function showHistory() {
    window.location.href = './DATA/data.php';
}

//INFO TEXT
document.addEventListener('DOMContentLoaded', () => {
    const infoBtn = document.getElementById('infoBtn');
    const infoText = document.getElementById('infoText');

    infoBtn.addEventListener('click', () => {
        const expanded = infoBtn.getAttribute('aria-expanded') === 'true';

        infoBtn.setAttribute('aria-expanded', !expanded);
        if (expanded) {
            infoText.classList.remove('visible');
            infoText.setAttribute('aria-hidden', 'true');
        } else {
            infoText.classList.add('visible');
            infoText.setAttribute('aria-hidden', 'false');
        }
    });
});


