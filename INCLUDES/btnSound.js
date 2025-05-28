// Definir sonido
const hoverSound = new Audio('/AUDIO/SOUNDS/sonido.mp3');

// Función para reproducir el sonido desde el inicio
function playSound() {
    hoverSound.currentTime = 0;
    hoverSound.play();
}

// Selecciona todos los elementos con la clase "btnCustom"
const botones = document.querySelectorAll('.btnCustom');

botones.forEach(boton => {
    boton.addEventListener('mouseover', playSound);
});

