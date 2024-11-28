<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUEGO POR TU VIDA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="Img/skynetLogoIcon.png" type="image/png">
</head>

<body>
    <header>
        <img src="./Img/SkynetLogo.png" alt="Cargando..." class="img-fluid mx-auto d-block">
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

        // VERIFICAR SI HAY OPCIÓN DEL HUMANO
        $opcion = $_POST['elemento'] ?? '';

        // VERIFICAR OPCIÓN VALIDA (por huevos todo tiene que ser opción valida asi que no tiene mucho sentido que esto exista.)
        if (!in_array($opcion, $opciones)) {
            echo "<div class='alert alert-outline-danger'>ELIGE UNA OPCION HUMANO! <br>Piedra, papel o tijeras?</div>"; //REVISAR
            echo "<button class='btn btn-outline-danger mb-3' onclick='window.history.back()'>Vuelve a jugar, humano</button>";
            exit;
        }

        // OPCION RANDOM PARA SKYNET
        $opcionPC = $opciones[array_rand($opciones)];


        // LÓGICA DE JUEGO
        // Empate
        if ($opcion === $opcionPC) {
            $resultado = "EMPATE";
            $mensajeSkynet = "- Tablas, eres un humano afortunado.";

            // Victoria Humano
        } elseif (
            ($opcion === 'Piedra' && $opcionPC === 'Tijeras')
            || ($opcion === 'Papel' && $opcionPC === 'Piedra')
            || ($opcion === 'Tijeras' && $opcionPC === 'Papel')
        ) {
            $resultado = "GANA EL HUMANO";
            echo "<br>";
            $mensajeSkynet = "- Volveré...";
        } else {
            $resultado = "GANA SKYNET";
            echo "<br>";
            $mensajeSkynet = "- Muere, humano.";
        }
        ?>

        <!--MOSTRAR OPCIONES SELECCIONADAS-->
        <div class="container mt-4">
            <div class="row justify-content-center">
                <p style="font-family: 'Montserrat', sans-serif; font-weight: 500; color: #bcbcbc; font-size: 24px;">
                    <?php echo htmlspecialchars($resultado); ?>
                </p>
                <!-- Opción del Humano -->
                <div class="col-2 text-center">
                    <p><strong>HUMANO</strong></p>
                    <?php echo mostrarIcono($opcion); ?> <!-- Icono del Humano -->
                    <p><?php echo $opcion; ?></p> <!-- Nombre de la opción del Humano -->
                </div>

                <!-- Opción de Skynet -->
                <div class="col-2 text-center">
                    <p><strong>SKYNET</strong></p>
                    <?php echo mostrarIcono($opcionPC); ?> <!-- Icono de Skynet -->
                    <p><?php echo $opcionPC; ?></p> <!-- Nombre de la opción de Skynet -->
                </div>
            </div>
        </div>


        <?php
        // MOSTRAR RESULTADO
        echo "<p>$mensajeSkynet</p>";

        // HISTORIAL DE PARTIDAS
        $fecha = date('Y-m-d H:i:s');
        $historial = "$fecha | HUMANO: $opcion | SKYNET: $opcionPC | RESULTADO: $resultado\n";

        // GUARDAR REGISTRO
        file_put_contents('historial.txt', $historial, FILE_APPEND);
        ?>


        <!-- BOTONES Y  IMAGEN INFERIOR -->
        <div>
            <button class="btn btn-outline-danger mb-3" onclick="window.history.back()">Volver a jugar, humano</button>
            <button class="btn btn-outline-danger mb-3" onclick="window.location.href='index.html'">Volver al
                Menú</button>
        </div>
        <img src="./Img/skynetdice.jpg" alt="Cargando T-800..." class="bottom-image"
            style="position: absolute; left: 25%; transform: translateX(-50%); bottom: 0; width: 500px; height: auto;">

    </div>

    </div>
    </div>
</body>

</html>