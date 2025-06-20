<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Capítulo 1 - Día del Juicio Final</title>
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

<body>
    <div id="main-content">
        <!-- LOGO -->
        <header>
            <img src="../../Img/SkynetLogo.png" alt="Logo Skynet" class="img-fluid mx-auto d-block banner" />
        </header>

        <!-- CONTENIDO PRINCIPAL -->
        <div class="container mt-4 text-center col-md-6">
            <h4 id="titulo1" class="mb-4">CAPÍTULO 1</h4>
            <p>El programa destinado a nuestra proteción Skynet ha tonmado conciencia de si mismo y esta intentando tomar el control de nuestras armas de destruccion masiva, elige sabiamente y reza para que tu eleccion contrareste a la arma que la maquina eligira.</p>
            <p>Que arma de destrución masiva escogeras humano para plantar cara a la anquilación total, el desperatr de Skynet esta aqui, preparate.</p>
            <h6>ELIGE UNA OPCIÓN, HUMANO:</h6>

            <form action="capitulo1_resultado.php" method="POST">
                <div class="icon-container mb-3 d-flex justify-content-center gap-3">
                    <button type="button" class="iconGame btn-icon" onclick="seleccionar('Nuclear')" aria-label="Nuclear">
                        <img src="../../Img/iconosCapt1/nuclear.png" alt="Nuclear" />
                    </button>
                    <button type="button" class="iconGame btn-icon" onclick="seleccionar('Bio')" aria-label="Biológico">
                        <img src="../../Img/iconosCapt1/bio.png" alt="Peligro Biológico" />
                    </button>
                    <button type="button" class="iconGame btn-icon" onclick="seleccionar('EMP')" aria-label="EMP">
                        <img src="../../Img/iconosCapt1/pem.png" alt="EMP" />
                    </button>
                    <button type="button" class="iconGame btn-icon" onclick="seleccionar('Humanidad')" aria-label="Humanidad">
                        <img src="../../Img/iconosCapt1/humanidad.png" alt="Humanidad" />
                    </button>
                    <button type="button" class="iconGame btn-icon" onclick="seleccionar('Skynet')" aria-label="Skynet">
                        <img src="../../Img/iconosCapt1/skynet.png" alt="Skynet" />
                    </button>
                </div>
                <input type="hidden" name="elemento" id="elemento" />
            </form>


            <a href="../../index.php" class="btn btnCustom mt-4 w-50"><span>Volver al Menú</span></a>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include '../../INCLUDES/audioPlayer.php'; ?>
    <?php include '../../INCLUDES/footer.php'; ?>

    <!-- SCRIPTS -->
    <script src="../../INCLUDES/btnSound.js"></script>
    <script>
        function seleccionar(opcion) {
            document.getElementById('elemento').value = opcion;
            document.querySelector('form').submit();
        }
    </script>
</body>

</html>