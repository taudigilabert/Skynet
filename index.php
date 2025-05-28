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

<body>
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

        <!-- MENU OPCIONES -->
        <section class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <!-- Texto explicativo oculto inicialmente -->
                    <div id="infoText" class="info-text" aria-hidden="true">
                        ¿Te crees afortunado humano?<br>
                        - Juega por tu vida (piedra, papel o tijeras). Obtén la oportunidad de vivir si ganas.<br>
                        - Juega al día del juicio final y añade a las máquinas y los humanos como opciones de juego
                        adicionales.
                    </div>

                    <!-- Título con botón de info al lado -->
                    <div class="d-flex align-items-center justify-content-center mb-4 info-header">
                        <h4 id="titulo1" class="m-0 flex-grow-1">ELIGE UNA OPCIÓN, HUMANO:</h4>
                        <button id="infoBtn" aria-expanded="false" aria-controls="infoText"
                            aria-label="Mostrar más información" title="Más información" class="btn-info">
                            <i class="fas fa-circle-info"></i>
                        </button>
                    </div>

                    <div class="btn-group-vertical mb-4" style="width: 100%;">
                        <button type="button" class="btn btnCustom w-100 mb-2" data-text="Juega por tu vida"><span>Juega por tu vida</span></button>
                        <button type="button" class="btn btnCustom w-100 mb-2" data-text="Día del juicio final"><span>Día del juicio final</span></button>
                        <button type="button" class="btn btnCustom w-100 mb-2" data-text="Historial de Partidas"><span>Historial de Partidas</span></button>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <!-- FOOTER -->
    <footer id="site-footer">
        <p>
            &copy; 2025 taudigilabert. Todos los derechos reservados. |
            <a href="https://github.com/taudigilabert" target="_blank" rel="noopener noreferrer">GitHub</a> |
            <a href="mailto:taudigilabert@gmail.com">Contacto</a> |
            <a href="https://discord.gg/tu-invitacion" target="_blank" rel="noopener noreferrer">Discord</a>
        </p>
    </footer>


    <!-- SCRIPTS / INCLUDES -->
    <script src="./script.js"></script>
    <?php include './INCLUDES/audioPlayer.php'; ?>
    <script src="./INCLUDES/btnSound.js"></script>


</body>

</html>