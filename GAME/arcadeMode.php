<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modo Arcade - SKYNET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../styles.css" />
    <link rel="icon" href="../Img/skynetLogoIcon.png" type="image/png">
</head>

<body data-page="arcade-menu">

    <div id="main-content">
        <!-- IMAGEN -->
        <header>
            <img src="../Img/SkynetLogo.png" alt="Cargando..." class="img-fluid mx-auto d-block banner" />
        </header>

        <!-- SECCIÓN PRINCIPAL -->
        <section class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <!-- Texto explicativo -->
                    <div id="infoText" class="info-text" aria-hidden="true">
                        Selecciona el minijuego que quieras jugar, humano.<br>
                        - Juega por tu vida: piedra, papel o tijeras.<br>
                        - Día del juicio final: ¡ahora las máquinas y humanos están en juego!
                    </div>

                    <!-- Título con botón de info -->
                    <div class="d-flex align-items-center justify-content-center mb-4 info-header">
                        <h4 id="titulo1" class="m-0 flex-grow-1">SELECCIONA UN JUEGO:</h4>
                        <button id="infoBtn" aria-expanded="false" aria-controls="infoText"
                            aria-label="Mostrar más información" title="Más información" class="btn-info">
                            <i class="fas fa-circle-info"></i>
                        </button>
                    </div>

                    <div class="btn-group-vertical mb-4" style="width: 100%;">
                        <button type="button" class="btn btnCustom w-100 mb-2" data-text="Juega por tu vida">
                            <span>Juega por tu vida</span>
                        </button>
                        <button type="button" class="btn btnCustom w-100 mb-2" data-text="Día del juicio final">
                            <span>Día del juicio final</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- SCRIPTS -->
    <script src="../script.js"></script>
    <?php include '../INCLUDES/audioPlayer.php'; ?>
    <?php include '../INCLUDES/footer.php'; ?>
    <script src="../INCLUDES/btnSound.js"></script>

</body>

</html>