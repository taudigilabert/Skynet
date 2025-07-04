<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Capítulo 1 - El despertar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../../styles.css" />
    <!-- Favicon -->
    <link rel="icon" href="../../Img/skynetLogoIcon.png" type="image/png" />
</head>

<body data-page="historia-menu">
    <div id="main-content">

        <!-- LOGO -->
        <header>
            <img src="../../Img/SkynetLogo.png" alt="Logo Skynet" class="img-fluid mx-auto d-block banner_game" />
        </header>

        <!-- CONTENIDO PRINCIPAL -->
        <section class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">

                    <!-- Texto explicativo oculto -->
                    <div id="infoText" class="info-text" aria-hidden="true">
                        <h6>Selecciona tu destino, humano:</h6>

                        <div class="weapon-info d-flex align-items-start gap-3 mb-3">
                            <img src="../../Img/iconosCapt1/nuclear.png" alt="Bombas Nucleares" class="weapon-icon" />
                            <p><strong>Bombas Nucleares</strong> <br>Una apuesta arriesgada pero segura, dispara los misiles contra los servidores y arrasa con todo.</p>
                        </div>

                        <div class="weapon-info d-flex align-items-start gap-3 mb-3">
                            <img src="../../Img/iconosCapt1/bio.png" alt="Armas Biológicas" class="weapon-icon" />
                            <p><strong>Armas Biológicas</strong> <br>Sacrifica a los humanos responsables de la activación de Skynet antes de que pierdan el control.</p>
                        </div>

                        <div class="weapon-info d-flex align-items-start gap-3 mb-3">
                            <img src="../../Img/iconosCapt1/pem.png" alt="Pulso Electromagnético" class="weapon-icon" />
                            <p><strong>Pulso Electromagnético</strong> <br>Desactiva los sistemas electrónicos de Skynet y deja a las máquinas inertes.</p>
                        </div>

                        <div class="weapon-info d-flex align-items-start gap-3 mb-3">
                            <img src="../../Img/iconosCapt1/humanidad.png" alt="Humanidad" class="weapon-icon" />
                            <p><strong>Humanidad</strong> <br>Confía en la fe de los humanos y evita que Skynet tome el control total mediante la guerra convencional.</p>
                        </div>

                        <div class="weapon-info d-flex align-items-start gap-3">
                            <img src="../../Img/iconosCapt1/skynet.png" alt="Skynet" class="weapon-icon" />
                            <p><strong>Skynet</strong> <br>Destruye a Skynet usando sus propios cortafuegos contra sí mismo.</p>
                        </div>
                    </div>

                    <!-- Título con botón de info al lado -->
                    <div class="d-flex align-items-center justify-content-center mb-3 info-header">
                        <h4 id="titulo1" class="m-0 flex-grow-1">CAPÍTULO 1</h4>

                        <button id="infoBtn" aria-expanded="false" aria-controls="infoText"
                            aria-label="Mostrar más información" title="Más información" class="btn-info">
                            <i class="fas fa-circle-info"></i>
                        </button>
                    </div>

                    <!-- Bloque de introducción modular -->
                    <div class="intro-text text-center mb-4" style="text-align: justify;">
                        <p>
                            El programa diseñado para protegernos, Skynet, ha cobrado conciencia propia y está intentando hacerse con el control de nuestras armas de destrución masiva.
                            La inteligencia artificial ha despertado y está dispuesta a destruirnos para salvarnos de nostros mismos.
                        </p>
                        <p>
                            Elige que arma usar para detener a Skynet antes de que tome el control total de nuestras armas.
                            El despertar de Skynet ha comenzado... prepárate.
                        </p>
                        <h6 class="mb-3" style="text-align: center;">ELIGE UNA OPCIÓN, HUMANO:</h6>
                    </div>


                    <!-- Formulario de elección -->
                    <form action="capitulo1_resultados.php" method="POST">
                        <div class="icon-container mb-3 d-flex justify-content-center gap-3 flex-wrap">
                            <button type="button" class="iconGame btn-icon" onclick="selectOption('Nuclear')" aria-label="Nuclear">
                                <img src="../../Img/iconosCapt1/nuclear.png" alt="Nuclear" />
                            </button>
                            <button type="button" class="iconGame btn-icon" onclick="selectOption('Bio')" aria-label="Biológico">
                                <img src="../../Img/iconosCapt1/bio.png" alt="Peligro Biológico" />
                            </button>
                            <button type="button" class="iconGame btn-icon" onclick="selectOption('EMP')" aria-label="EMP">
                                <img src="../../Img/iconosCapt1/pem.png" alt="EMP" />
                            </button>
                            <button type="button" class="iconGame btn-icon" onclick="selectOption('Humanidad')" aria-label="Humanidad">
                                <img src="../../Img/iconosCapt1/humanidad.png" alt="Humanidad" />
                            </button>
                            <button type="button" class="iconGame btn-icon" onclick="selectOption('Skynet')" aria-label="Skynet">
                                <img src="../../Img/iconosCapt1/skynet.png" alt="Skynet" />
                            </button>
                        </div>
                        <input type="hidden" name="elemento" id="elemento" />
                    </form>

                    <!-- Botones de navegación -->
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="../historyMode.php" class="btn btnCustom w-100"><span>Volver</span></a>
                    </div>

                </div>
            </div>
        </section>

    </div>

    <!-- INCLUDES -->
    <?php include '../../INCLUDES/audioPlayer.php'; ?>
    <?php include '../../INCLUDES/footer.php'; ?>

    <!-- SCRIPTS -->
    <script src="../../script.js"></script>
    <script src="../../INCLUDES/btnSound.js"></script>

    <script>
        function selectOption(valor) {
            document.getElementById('elemento').value = valor;
            document.forms[0].submit();
        }
    </script>
</body>

</html>