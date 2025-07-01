<!-- /capitulos/capitulo1_resultado.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resultado - Capítulo 1</title>
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
        <header>
            <img src="../../Img/SkynetLogo.png" alt="Logo Skynet" class="img-fluid mx-auto d-block banner_game">
        </header>

        <div class="container mt-4 text-center">
            <?php
            $opciones = ['Nuclear', 'Bio', 'EMP', 'Humanidad', 'Skynet'];
            $opcion = $_POST['elemento'] ?? '';

            function mostrarIcono($opcion)
            {
                return match ($opcion) {
                    'Nuclear'   => '<img src="../../Img/iconosCapt1/nuclear.png" alt="Nuclear" style="width:60px">',
                    'Bio'       => '<img src="../../Img/iconosCapt1/bio.png" alt="Bio" style="width:60px">',
                    'EMP'       => '<img src="../../Img/iconosCapt1/pem.png" alt="EMP" style="width:60px">',
                    'Humanidad' => '<img src="../../Img/iconosCapt1/humanidad.png" alt="Humanidad" style="width:60px">',
                    'Skynet'    => '<img src="../../Img/iconosCapt1/skynet.png" alt="Skynet" style="width:60px">',
                    default     => ''
                };
            }

            if (!in_array($opcion, $opciones)) {
                echo "<div class='alert alert-danger'>Opción inválida. Intenta de nuevo.</div>";
                echo "<a href='capitulo1.php' class='btn btn-danger'>Volver</a>";
                exit;
            }

            $opcionPC = $opciones[array_rand($opciones)];

            // Reglas de combate adaptadas
            if ($opcion === $opcionPC) {
                $resultado = "EMPATE";
                $mensajeSkynet = "- Tablas, por ahora...";
            } elseif (
                ($opcion === 'Nuclear' && ($opcionPC === 'Skynet' || $opcionPC === 'Bio')) ||
                ($opcion === 'Bio'     && ($opcionPC === 'Humanidad' || $opcionPC === 'EMP')) ||
                ($opcion === 'EMP'     && ($opcionPC === 'Skynet' || $opcionPC === 'Nuclear')) ||
                ($opcion === 'Skynet'  && ($opcionPC === 'Bio' || $opcionPC === 'Humanidad')) ||
                ($opcion === 'Humanidad' && ($opcionPC === 'EMP' || $opcionPC === 'Nuclear'))
            ) {
                $resultado = "GANA EL HUMANO";
                $mensajeSkynet = "- Volveré...";
            } else {
                $resultado = "GANA SKYNET";
                $mensajeSkynet = "- Muere, humano.";
            }

            // Guardar historial
            $fecha = date('Y-m-d H:i:s');
            file_put_contents('../../DATA/historial.txt', "$fecha | HUMANO: $opcion | SKYNET: $opcionPC | RESULTADO: $resultado\n", FILE_APPEND);
            ?>

            <h2 class="mb-4 fw-bold text-uppercase"><?php echo $resultado; ?></h2>

            <div class="row justify-content-center align-items-center text-center mb-4" id="marcador">
                <div class="col-4">
                    <h5>Humano</h5>
                    <div id="humanoPuntos" class="marcador">0</div>
                    <div class="mt-2">
                        <?php echo mostrarIcono($opcion); ?>
                    </div>
                </div>
                <div class="col-1 d-flex align-items-center justify-content-center">
                    <p><span>VS</span></p>
                </div>
                <div class="col-4">
                    <h5>Skynet</h5>
                    <div id="skynetPuntos" class="marcador">0</div>
                    <div class="mt-2">
                        <?php echo mostrarIcono($opcionPC); ?>
                    </div>
                </div>
            </div>


            <p class="mb-4"><em><?php echo $mensajeSkynet; ?></em></p>

            <div id="botones"></div>

            <script>
                const resultado = "<?php echo $resultado; ?>";

                let puntosHumano = parseInt(localStorage.getItem("puntosHumano")) || 0;
                let puntosSkynet = parseInt(localStorage.getItem("puntosSkynet")) || 0;

                if (resultado === "GANA EL HUMANO") {
                    puntosHumano++;
                } else if (resultado === "GANA SKYNET") {
                    puntosSkynet++;
                }

                localStorage.setItem("puntosHumano", puntosHumano);
                localStorage.setItem("puntosSkynet", puntosSkynet);

                // Mostrar marcador
                document.getElementById("humanoPuntos").textContent = puntosHumano;
                document.getElementById("skynetPuntos").textContent = puntosSkynet;

                const botones = document.getElementById("botones");

                if (puntosHumano >= 4) {
                    alert("¡Victoria del Humano! Avanzarás al siguiente episodio.");
                    localStorage.removeItem("puntosHumano");
                    localStorage.removeItem("puntosSkynet");
                    guardarProgreso();
                } else if (puntosSkynet >= 4) {
                    alert("Skynet ha ganado esta vez. Intenta nuevamente.");
                    localStorage.removeItem("puntosHumano");
                    localStorage.removeItem("puntosSkynet");
                    window.location.href = "capitulo1.php";
                } else {
                    botones.innerHTML = `
            <a href="capitulo1.php" class="btn btnCustom me-2"><span>Jugar siguiente ronda</span></a>
            <a href="../../index.php" class="btn btnCustom"><span>Volver al Menú</span></a>
        `;
                }

                function guardarProgreso() {
                    const capituloActual = 1;
                    const progresoGuardado = parseInt(localStorage.getItem("progreso")) || 1;

                    if (progresoGuardado <= capituloActual) {
                        localStorage.setItem("progreso", capituloActual + 1);
                    }

                    window.location.href = "../historyMode.php";
                }
            </script>

        </div>
    </div>

    <!-- INCLUDES -->
    <?php include '../../INCLUDES/audioPlayer.php'; ?>
    <?php include '../../INCLUDES/footer.php'; ?>

    <!-- SCRIPTS -->
    <script src="../../script.js"></script>
    <script src="../../INCLUDES/btnSound.js"></script>
</body>

</html>