<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUEGO POR TU VIDA</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Favicon -->
    <link rel="icon" href="../Img/skynetLogoIcon.png" type="image/png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="main-content">
        <!-- IMAGEN -->
        <header>
            <img src="../Img/SkynetLogo.png" alt="Cargando..." class="img-fluid mx-auto d-block banner" />
        </header>

        <!-- Contenido principal -->
        <div class="container mt-4">


            <!-- Formulario opciones -->
            <form action="game1resultados.php" method="POST">

                <div class="row justify-content-center">
                    <div class="col-md-6">
                    <h4 class="mb-4" id="titulo1">ELIGE UNA OPCIÓN, HUMANO:</h4>
                        <div class="icon-container">
                            <!-- Botones con íconos -->
                            <div class="icon-container">
                                <button type="button" class="iconGame" onclick="selectOption('Piedra')" aria-label="Seleccionar Piedra">
                                    <i class="fas fa-hand-rock"></i>
                                </button>
                                <button type="button" class="iconGame" onclick="selectOption('Papel')" aria-label="Seleccionar Papel">
                                    <i class="fas fa-hand-paper"></i>
                                </button>
                                <button type="button" class="iconGame" onclick="selectOption('Tijeras')" aria-label="Seleccionar Tijeras">
                                    <i class="fas fa-hand-scissors"></i>
                                </button>
                            </div>

                        </div>
                        <!-- Campo oculto para enviar la selección -->
                        <input type="hidden" id="elemento" name="elemento" value="" />
                    </div>
                </div>
            </form>
            <div class="align-align-items-center text-center">
                <!-- Botón de regreso al menú -->
                <a href="../index.php" class="btn btnCustom w-50 mt-3"><span>Volver al Menú</span></a>
            </div>
        </div>

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
    <script src="../script.js"></script>
    <?php include __DIR__ . '/../INCLUDES/audioPlayer.php'; ?>
    <script src="../INCLUDES/btnSound.js"></script>

</body>

</html>