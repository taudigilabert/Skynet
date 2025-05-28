<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>JUEGO POR TU VIDA</title>

    <!-- Estilos externos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../styles.css" />
    <link rel="icon" href="../Img/skynetLogoIcon.png" type="image/png" />
</head>

<body>
    <div id="main-content">

        <!-- Header con imagen -->
        <header>
            <img src="../Img/SkynetLogo.png" alt="Cargando..." class="img-fluid mx-auto d-block banner" />
        </header>

        <div class="container mt-4 text-center">

            <?php
            // ARRAY CON LAS OPCIONES
            $opciones = ['Piedra', 'Papel', 'Tijeras'];

            // FUNCIÓN PARA MOSTRAR ICONOS
            function mostrarIcono($opcion)
            {
                switch ($opcion) {
                    case 'Piedra':
                        return '<i class="fas fa-hand-rock fa-5x"></i>';
                    case 'Papel':
                        return '<i class="fas fa-hand-paper fa-5x"></i>';
                    case 'Tijeras':
                        return '<i class="fas fa-hand-scissors fa-5x"></i>';
                    default:
                        return '';
                }
            }

            // OBTENER OPCIÓN DEL HUMANO
            $opcion = $_POST['elemento'] ?? '';

            // VALIDAR OPCIÓN HUMANA
            if (!in_array($opcion, $opciones)) {
                echo "<div class='alert alert-outline-danger'>ELIGE UNA OPCION HUMANO! <br>Piedra, papel o tijeras?</div>";
                echo "<button class='btn btn-outline-danger mb-3' onclick='window.history.back()'>Vuelve a jugar, humano</button>";
                exit;
            }

            // OPCIÓN ALEATORIA DE SKYNET
            $opcionPC = $opciones[array_rand($opciones)];

            // LÓGICA DEL JUEGO
            if ($opcion === $opcionPC) {
                $resultado = "EMPATE";
                $mensajeSkynet = "- Tablas, eres un humano afortunado.";
            } elseif (
                ($opcion === 'Piedra' && $opcionPC === 'Tijeras') ||
                ($opcion === 'Papel' && $opcionPC === 'Piedra') ||
                ($opcion === 'Tijeras' && $opcionPC === 'Papel')
            ) {
                $resultado = "GANA EL HUMANO";
                $mensajeSkynet = "- Volveré...";
            } else {
                $resultado = "GANA SKYNET";
                $mensajeSkynet = "- Muere, humano.";
            }
            ?>

            <!-- Mostrar resultado -->
            <div class="container mt-2">
                <div class="row justify-content-center">

                    <h4 class="resultado-title text-center mb-4"><?php echo htmlspecialchars($resultado); ?></h4>

                    <!-- Opción humano -->
                    <div class="col-2 text-center">
                        <h5>HUMANO</h5>
                        <?php echo mostrarIcono($opcion); ?>
                        <p><?php echo $opcion; ?></p>
                    </div>

                    <!-- Opción Skynet -->
                    <div class="col-2 text-center">
                        <h5>SKYNET</h5>
                        <?php echo mostrarIcono($opcionPC); ?>
                        <p><?php echo $opcionPC; ?></p>
                    </div>
                </div>
            </div>

            <?php
            // Mensaje de resultado
            echo "<p>$mensajeSkynet</p>";

            // Guardar historial
            $fecha = date('Y-m-d H:i:s');
            $historial = "$fecha | HUMANO: $opcion | SKYNET: $opcionPC | RESULTADO: $resultado\n";
            file_put_contents('../DATA/historial.txt', $historial, FILE_APPEND);
            ?>

            <!-- Botones -->
            <div class="mt-4">
                <button class="btn btnCustom mb-3" onclick="window.history.back()"><span>Volver a jugar</span></button>
                <button class="btn btnCustom mb-3" onclick="window.location.href='../index.php'"><span>Volver al Menú</span></button>
            </div>

            <!-- Imagen inferior -->
            <img src="../Img/skynetdice.jpg" alt="Cargando T-800..." class="bottom-image"
                style="position: absolute; left: 20%; transform: translateX(-50%); bottom: 0; width: 500px; height: auto;" />
        </div>
    </div>

    <!-- Footer -->
    <footer id="site-footer">
        <p>
            &copy; 2025 taudigilabert. Todos los derechos reservados. |
            <a href="https://github.com/taudigilabert" target="_blank" rel="noopener noreferrer">GitHub</a> |
            <a href="mailto:taudigilabert@gmail.com">Contacto</a> |
            <a href="https://discord.gg/tu-invitacion" target="_blank" rel="noopener noreferrer">Discord</a>
        </p>
    </footer>

    <!-- Scripts -->
    <script src="../script.js"></script>
    <?php include __DIR__ . '/../INCLUDES/audioPlayer.php'; ?>
    <script src="../INCLUDES/btnSound.js"></script>
</body>

</html>