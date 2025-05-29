<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Audio Player</title>

    <!-- FontAwesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        /* ==================== CONTROL DE AUDIO ==================== */
        #audio-control {
            position: fixed;
            top: 120px;
            left: 0;
            width: 200px;
            background-color: transparent;
            padding: 15px 20px;
            color: var(--color-white, #fff);
            font-family: Arial, sans-serif;
            font-weight: 400;
            z-index: 1000;
            text-align: center;
            transition: transform 0.3s ease;
            border-radius: 0px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 10px;
            overflow: visible;
        }

        #audio-control.collapsed {
            transform: translateX(-220px);
        }

        #audio-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        #audio-buttons button {
            background: none;
            border: none;
            color: #ff0000;
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        #audio-buttons button:hover {
            color: #cc0000;
        }

        #audio-control #toggle-audio {
            position: absolute;
            top: 50%;
            right: -55px;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background-color: none;
            border-radius: 0px;
            color: #ff0000;
            font-size: 20px;
            cursor: pointer;
            outline: none;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            border-left: none;
        }

        #audio-control #toggle-audio:hover {
            color: #cc0000;
        }

        #audio-title {
            font-size: 14px;
            margin-bottom: 3%;
            color: #ccc;
        }
    </style>
</head>

<body>

    <!-- AUDIO PLAYER -->
    <div id="audio-control">
        <div id="audio-title">Cargando...</div>

        <div id="audio-buttons">
            <button id="prev" title="Anterior"><i class="fa fa-backward"></i></button>
            <button id="playPause" title="Play/Pause"><i class="fa fa-play"></i></button>
            <button id="next" title="Siguiente"><i class="fa fa-forward"></i></button>
        </div>

        <button id="toggle-audio" title="Mostrar/Ocultar"><i class="fa fa-chevron-left"></i></button>
    </div>

    <audio id="audio-player" style="display: none;">
        <source id="audio-source" type="audio/mp3" />
        Tu navegador no soporta el audio.
    </audio>

    <script>
        const tracks = [{
            src: "/AUDIO/terminator.mp3",
            title: "The Terminator"
        }];

        let currentTrackIndex = localStorage.getItem('currentTrackIndex') ? parseInt(localStorage.getItem('currentTrackIndex')) : 0;
        let isPlaying = localStorage.getItem('isPlaying') === 'true';

        let currentTime = localStorage.getItem('currentTime') ? parseFloat(localStorage.getItem('currentTime')) : 0;
        let isFirstLoad = localStorage.getItem('currentTime') === null;

        const audioPlayer = document.getElementById("audio-player");
        const playPauseButton = document.getElementById("playPause").getElementsByTagName('i')[0];
        const audioTitle = document.getElementById("audio-title");
        const audioControl = document.getElementById('audio-control');
        const toggleBtn = document.getElementById('toggle-audio');
        const toggleIcon = toggleBtn.querySelector('i');

        function loadTrack(index) {
            if (!audioPlayer.src.endsWith(tracks[index].src)) {
                audioPlayer.src = tracks[index].src;
                audioPlayer.load();
                audioTitle.textContent = tracks[index].title;

                if (isFirstLoad) {
                    currentTime = 0;
                    localStorage.setItem('currentTime', 0);
                    isFirstLoad = false;
                }

                audioPlayer.currentTime = currentTime;

                if (isPlaying) {
                    audioPlayer.play();
                }

                playPauseButton.classList.remove("fa-play", "fa-pause");
                playPauseButton.classList.add(isPlaying ? "fa-pause" : "fa-play");
            } else {
                audioPlayer.currentTime = currentTime;
            }
        }

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

        function nextTrack() {
            currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
            loadTrack(currentTrackIndex);
            localStorage.setItem('currentTrackIndex', currentTrackIndex);
            currentTime = 0;
            localStorage.setItem('currentTime', 0);
        }

        function prevTrack() {
            currentTrackIndex = (currentTrackIndex - 1 + tracks.length) % tracks.length;
            loadTrack(currentTrackIndex);
            localStorage.setItem('currentTrackIndex', currentTrackIndex);
            currentTime = 0;
            localStorage.setItem('currentTime', 0);
        }

        audioPlayer.ontimeupdate = function() {
            if (!audioPlayer.paused) {
                localStorage.setItem('currentTime', audioPlayer.currentTime);
            }
        };

        audioPlayer.addEventListener('ended', () => {
            nextTrack();
        });

        document.getElementById('playPause').addEventListener('click', togglePlayPause);
        document.getElementById('next').addEventListener('click', nextTrack);
        document.getElementById('prev').addEventListener('click', prevTrack);

        toggleBtn.addEventListener('click', () => {
            audioControl.classList.toggle('collapsed');
            const isCollapsed = audioControl.classList.contains('collapsed');

            // Guardar en localStorage el estado del panel
            localStorage.setItem('audioControlCollapsed', isCollapsed);

            // Cambiar el icono
            toggleIcon.classList.toggle('fa-chevron-left', !isCollapsed);
            toggleIcon.classList.toggle('fa-chevron-right', isCollapsed);
        });

        window.onload = function() {
            loadTrack(currentTrackIndex);

            if (isPlaying) {
                audioPlayer.play();
            }

            const savedCollapsedState = localStorage.getItem('audioControlCollapsed') === 'true';
            if (savedCollapsedState) {
                audioControl.classList.add('collapsed');
                toggleIcon.classList.remove('fa-chevron-left');
                toggleIcon.classList.add('fa-chevron-right');
            } else {
                audioControl.classList.remove('collapsed');
                toggleIcon.classList.remove('fa-chevron-right');
                toggleIcon.classList.add('fa-chevron-left');
            }
        };
    </script>

</body>

</html>