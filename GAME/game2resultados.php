<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DÍA DEL JUICIO FINAL</title>

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
            // ARRAY DE OPCIONES
            $opciones = ['Piedra', 'Papel', 'Tijeras', 'Humanidad', 'Skynet'];

            // FUNCIÓN PARA MOSTRAR ICONOS
            function mostrarIcono($opcion)
            {
                return match ($opcion) {
                    'Piedra'    => '<i class="fas fa-hand-rock fa-5x"></i>',
                    'Papel'     => '<i class="fas fa-hand-paper fa-5x"></i>',
                    'Tijeras'   => '<i class="fas fa-hand-scissors fa-5x"></i>',
                    'Humanidad' => '<i class="fas fa-user fa-5x"></i>',
                    'Skynet'    => '<i class="fas fa-robot fa-5x"></i>',
                    default     => ''
                };
            }

            // OBTENER OPCIÓN DEL HUMANO
            $opcion = $_POST['elemento'] ?? '';

            // VALIDACIÓN
            if (!in_array($opcion, $opciones)) {
                echo "<div class='alert alert-outline-danger'>ELIGE UNA OPCIÓN VÁLIDA, HUMANO.</div>";
                echo "<button class='btn btn-outline-danger mb-3' onclick='window.history.back()'>Volver a jugar</button>";
                exit;
            }

            // OPCIÓN ALEATORIA DE SKYNET
            $opcionPC = $opciones[array_rand($opciones)];

            // LÓGICA DE RESULTADO
            if ($opcion === $opcionPC) {
                $resultado = "EMPATE";
                $mensajeSkynet = "- Tablas, eres un humano afortunado.";
            } elseif (
                ($opcion === 'Piedra' && ($opcionPC === 'Tijeras' || $opcionPC === 'Skynet')) ||
                ($opcion === 'Papel' && ($opcionPC === 'Piedra' || $opcionPC === 'Humanidad')) ||
                ($opcion === 'Tijeras' && ($opcionPC === 'Papel' || $opcionPC === 'Skynet')) ||
                ($opcion === 'Skynet' && ($opcionPC === 'Humanidad' || $opcionPC === 'Papel')) ||
                ($opcion === 'Humanidad' && ($opcionPC === 'Tijeras' || $opcionPC === 'Piedra'))
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

            <!-- Mostrar mensaje de Skynet -->
            <p><?php echo $mensajeSkynet; ?></p>

            <?php
            // HISTORIAL
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