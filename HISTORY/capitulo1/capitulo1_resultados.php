<!-- /capitulos/capitulo1_resultado.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resultado - Capítulo 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
    <link rel="icon" href="../Img/skynetLogoIcon.png" type="image/png">
</head>

<body>
    <header>
        <img src="../Img/SkynetLogo.png" alt="Logo Skynet" class="img-fluid mx-auto d-block banner">
    </header>

    <div class="container mt-4 text-center">
        <?php
        $opciones = ['Piedra', 'Papel', 'Tijeras', 'Humanidad', 'Skynet'];
        $opcion = $_POST['elemento'] ?? '';

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

        if (!in_array($opcion, $opciones)) {
            echo "<div class='alert alert-danger'>Opción inválida. Intenta de nuevo.</div>";
            echo "<a href='capitulo1.php' class='btn btn-danger'>Volver</a>";
            exit;
        }

        $opcionPC = $opciones[array_rand($opciones)];

        if ($opcion === $opcionPC) {
            $resultado = "EMPATE";
            $mensajeSkynet = "- Tablas, por ahora...";
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

        $fecha = date('Y-m-d H:i:s');
        file_put_contents('../DATA/historial.txt', "$fecha | HUMANO: $opcion | SKYNET: $opcionPC | RESULTADO: $resultado\n", FILE_APPEND);
        ?>

        <h3 class="mb-3"><?php echo $resultado; ?></h3>

        <div class="row justify-content-center mb-4">
            <div class="col-3">
                <h5>Humano</h5>
                <?php echo mostrarIcono($opcion); ?>
                <p><?php echo $opcion; ?></p>
            </div>
            <div class="col-3">
                <h5>Skynet</h5>
                <?php echo mostrarIcono($opcionPC); ?>
                <p><?php echo $opcionPC; ?></p>
            </div>
        </div>

        <p class="mb-4"><em><?php echo $mensajeSkynet; ?></em></p>

        <?php if ($resultado === "GANA EL HUMANO"): ?>
            <button class="btn btn-success me-2" onclick="guardarProgreso()">Continuar al siguiente episodio</button>
        <?php else: ?>
            <a href="capitulo1.php" class="btn btnCustom me-2">Volver a jugar</a>
        <?php endif; ?>
        <a href="../index.php" class="btn btnCustom">Volver al Menú</a>

        <script>
            function guardarProgreso() {
                const capituloActual = 1;
                const progresoGuardado = parseInt(localStorage.getItem("progreso")) || 1;

                if (progresoGuardado <= capituloActual) {
                    localStorage.setItem("progreso", capituloActual + 1); // Guarda 2
                }

                // Ir al menú historia
                window.location.href = "../historyMode.php";
            }
        </script>

    </div>

    <!-- SCRIPTS -->
    <?php include '../INCLUDES/audioPlayer.php'; ?>
    <?php include '../INCLUDES/footer.php'; ?>
    <script src="../INCLUDES/btnSound.js"></script>

</body>

</html>