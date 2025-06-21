<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CYBERDYNE SYSTEMS CORP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Google Fonts: Montserrat + Orbitron -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Orbitron:wght@500;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" href="Img/skynetLogoIcon.png" type="image/png">
</head>

<body data-page="main-menu">
    <div id="main-content">

        <!-- ALERTA INICIAL 
        <div id="alert-message" class="alert-message" role="alert" aria-live="assertive" aria-atomic="true">
            <h1>SKYNET</h1>
            <p>¿Listo para jugar por tu vida, humano?</p>
            <button id="alert-close" aria-label="Cerrar alerta">&times;</button>
        </div> -->


        <!-- IMAGEN -->
        <header>
            <img src="./Img/SkynetLogo.png" alt="Cargando..." class="img-fluid mx-auto d-block banner" />
        </header>

        <section class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <!-- Texto explicativo oculto -->
                    <div id="infoText" class="info-text" aria-hidden="true">
                        <h6>Selecciona tu destino, humano:</h6>

                        <p class="mb-3"><strong>Modo Historia</strong><br>Avanza en la historia, supera desafíos y enfréntate a Skynet mientras el mundo se desmorona.</p>

                        <p class="mb-3"><strong>Modo Arcade</strong><br> Juega libremente a los juegos desbloqueados y mejora tus habilidades.</p>

                        <p><strong>Historial de Partidas</strong><br> Consulta tus victorias, derrotas y estadísticas de juego.</p>
                    </div>


                    <!-- Título con botón de info al lado -->
                    <div class="d-flex align-items-center justify-content-center mb-4 info-header">
                        <h4 id="titulo1" class="m-0 flex-grow-1">ELIGE TU DESTINO, HUMANO:</h4>
                        <button id="infoBtn" aria-expanded="false" aria-controls="infoText"
                            aria-label="Mostrar más información" title="Más información" class="btn-info">
                            <i class="fas fa-circle-info"></i>
                        </button>
                    </div>

                    <!-- MENU OPCIONES -->
                    <div class="btn-group-vertical mb-4" style="width: 100%;">
                        <button type="button" class="btn btnCustom w-100 mb-2" data-text="Modo Historia">
                            <span>Modo Historia</span>
                        </button>
                        <button type="button" class="btn btnCustom w-100 mb-2" data-text="Modo Arcade">
                            <span>Modo Arcade</span>
                        </button>
                        <button type="button" class="btn btnCustom w-100 mb-2" data-text="Historial de Partidas">
                            <span>Historial de Partidas</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <!-- SCRIPTS / INCLUDES -->
    <script src="./script.js"></script>
    <?php include './INCLUDES/audioPlayer.php'; ?>
    <?php include './INCLUDES/footer.php'; ?>
    <script src="./INCLUDES/btnSound.js"></script>


</body>

</html>