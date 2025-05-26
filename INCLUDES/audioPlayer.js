// Lista de pistas con los nombres
const tracks = [
    { src: "AUDIO/terminator.mp3", title: "The Terminator" },
];

let currentTrackIndex = localStorage.getItem('currentTrackIndex') ? parseInt(localStorage.getItem('currentTrackIndex')) : 0;
let isPlaying = localStorage.getItem('isPlaying') === 'true';
let currentTime = localStorage.getItem('currentTime') ? parseFloat(localStorage.getItem('currentTime')) : 0;

const audioPlayer = document.getElementById("audio-player");
const playPauseButton = document.getElementById("playPause").getElementsByTagName('i')[0];
const audioTitle = document.getElementById("audio-title");
const audioControl = document.getElementById('audio-control');
const toggleBtn = document.getElementById('toggle-audio');
const toggleIcon = toggleBtn.querySelector('i');

// Cargar pista por índice
function loadTrack(index) {
    if (audioPlayer.src !== tracks[index].src) {
        audioPlayer.src = tracks[index].src;
        audioPlayer.load();
        audioTitle.textContent = tracks[index].title;

        if (isPlaying) {
            audioPlayer.play();
        }

        playPauseButton.classList.remove("fa-play", "fa-pause");
        playPauseButton.classList.add(isPlaying ? "fa-pause" : "fa-play");
    } else {
        audioPlayer.currentTime = currentTime;
    }
}

// Play/Pause toggle
function togglePlayPause() {
    if (audioPlayer.paused) {
        audioPlayer.play();
        isPlaying = true;
        playPauseButton.classList.remove("fa-play");
        playPauseButton.classList.add("fa-pause");
    } else {
        audioPlayer.pause();
        isPlaying = false;
        playPauseButton.classList.remove("fa-pause");
        playPauseButton.classList.add("fa-play");
    }
    localStorage.setItem('isPlaying', isPlaying);
}

// Siguiente pista
function nextTrack() {
    currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
    loadTrack(currentTrackIndex);
    localStorage.setItem('currentTrackIndex', currentTrackIndex);
}

// Pista anterior
function prevTrack() {
    currentTrackIndex = (currentTrackIndex - 1 + tracks.length) % tracks.length;
    loadTrack(currentTrackIndex);
    localStorage.setItem('currentTrackIndex', currentTrackIndex);
}

// Guardar posición actual
audioPlayer.ontimeupdate = function () {
    localStorage.setItem('currentTime', audioPlayer.currentTime);
};

// Evento para cuando termina la pista
audioPlayer.addEventListener('ended', () => {
    nextTrack();
});

// Botones
document.getElementById('playPause').addEventListener('click', togglePlayPause);
document.getElementById('next').addEventListener('click', nextTrack);
document.getElementById('prev').addEventListener('click', prevTrack);

// Toggle para mostrar/ocultar el reproductor
toggleBtn.addEventListener('click', () => {
    audioControl.classList.toggle('collapsed');
    if (audioControl.classList.contains('collapsed')) {
        toggleIcon.classList.remove('fa-chevron-left');
        toggleIcon.classList.add('fa-chevron-right');
    } else {
        toggleIcon.classList.remove('fa-chevron-right');
        toggleIcon.classList.add('fa-chevron-left');
    }
});

// Cargar estado al iniciar página
window.onload = function () {
    loadTrack(currentTrackIndex);
    audioPlayer.currentTime = currentTime;
    if (isPlaying) {
        audioPlayer.play();
    }

    // Asegura el estado del icono
    if (audioControl.classList.contains('collapsed')) {
        toggleIcon.classList.remove('fa-chevron-left');
        toggleIcon.classList.add('fa-chevron-right');
    } else {
        toggleIcon.classList.remove('fa-chevron-right');
        toggleIcon.classList.add('fa-chevron-left');
    }
};
