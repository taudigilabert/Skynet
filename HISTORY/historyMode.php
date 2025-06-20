<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modo Historia - SKYNET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
    <link rel="icon" href="../Img/skynetLogoIcon.png" type="image/png">
    <style>
        .locked {
            filter: grayscale(80%);
            opacity: 0.6;
        }

        .locked button {
            cursor: not-allowed;
        }

        .unlocked {
            filter: none;
            opacity: 1;
        }
    </style>
</head>

<body data-page="historia-menu">
    <div id="main-content">
        <!-- Header -->
        <header>
            <img src="../Img/SkynetLogo.png" alt="Cargando..." class="img-fluid mx-auto d-block banner">
        </header>

        <!-- Info -->
        <section class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div id="infoText" class="info-text" aria-hidden="true">
                        Bienvenido al Modo Historia, humano.<br>
                        Avanza por cada episodio y demuestra tu valor contra Skynet.
                    </div>

                    <div class="d-flex align-items-center justify-content-center mb-4 info-header">
                        <h4 id="titulo1" class="m-0 flex-grow-1">SELECCIONA UN EPISODIO:</h4>
                        <button id="infoBtn" aria-expanded="false" aria-controls="infoText" aria-label="Más información" class="btn-info">
                            <i class="fas fa-circle-info"></i>
                        </button>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <!-- Card 1 -->
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="1">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 1:<br> El Despertar</h5>
                                    <p class="card-text">Skynet toma conciencia. Piedra, papel, tijeras… y humanidad vs máquinas.</p>
                                    <button class="btn btnCustom w-100" disabled><i class="fas fa-lock"></i>Bloqueado</button>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="2">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 2:<br> Día del Juicio Final</h5>
                                    <p class="card-text">¿Listo para tomar decisiones estratégicas y sobrevivir?</p>
                                    <button class="btn btnCustom w-100" disabled><i class="fas fa-lock"></i> Bloqueado</button>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="3">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 3:<br> Resistencia</h5>
                                    <p class="card-text">Lidera la resistencia con lógica y estrategia.</p>
                                    <button class="btn btnCustom w-100" disabled><i class="fas fa-lock"></i> Bloqueado</button>
                                </div>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="4">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 4:<br> Guerra Total</h5>
                                    <p class="card-text">Enfréntate a Skynet en un juego de memoria táctica.</p>
                                    <button class="btn btnCustom w-100" disabled><i class="fas fa-lock"></i> Bloqueado</button>
                                </div>
                            </div>
                        </div>
                        <!-- Card 5 -->
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="5">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 5:<br> Última Esperanza</h5>
                                    <p class="card-text">Descifra el código que puede salvar a la humanidad.</p>
                                    <button class="btn btnCustom w-100" disabled><i class="fas fa-lock"></i> Bloqueado</button>
                                </div>
                            </div>
                        </div>
                        <!-- Card 6 -->
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="6">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 6:<br> El Juicio Final</h5>
                                    <p class="card-text">Enfrenta a Skynet en un desafío final de ingenio y estrategia.</p>
                                    <button class="btn btnCustom w-100" disabled><i class="fas fa-lock"></i> Bloqueado</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BOTONES -->
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <button class="btn btnCustom w-50" onclick="window.location.href='../index.php'"><span>Volver al Menú</span></button>
                        <button class="btn btnCustom w-50" onclick="window.history.back()"><span>Volver</span></button>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- SCRIPTS -->
    <script>
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

        // MENÚ HISTORIA - desbloqueo de capítulos
        document.addEventListener('DOMContentLoaded', () => {
            const progreso = parseInt(localStorage.getItem('progreso')) || 1;

            document.querySelectorAll('.episode-card').forEach(card => {
                const episodio = parseInt(card.dataset.episode);
                const boton = card.querySelector('button');
                const ruta = `capitulo${episodio}/capitulo${episodio}.php`;

                if (episodio <= progreso) {
                    card.classList.remove('locked');
                    card.classList.add('unlocked');
                    boton.disabled = false;
                    boton.innerHTML = '<span><i class="fas fa-play"></i> Jugar</span>';
                    boton.onclick = () => window.location.href = ruta;
                    card.onclick = () => window.location.href = ruta;
                }
            });
        });
    </script>


    <?php include '../INCLUDES/audioPlayer.php'; ?>
    <?php include '../INCLUDES/footer.php'; ?>
    <script src="../INCLUDES/btnSound.js"></script>
</body>

</html>