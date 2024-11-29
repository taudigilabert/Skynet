<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESTADÍSTICAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../Img/skynetLogoIcon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="stats">


    <div class="container text-center col-6" id="cajaEstadisticas">
        <img src="../Img/SkynetLogo.png" alt="Cargando..." class="img-fluid mx-auto d-block">
        <h4 id="titulo1" class="mb-4">ESTADÍSTICAS</h4>

        <?php
        $opciones = ["Piedra", "Papel", "Tijeras", "Humanidad", "Skynet"];
        $humanoOpciones = ['Piedra' => 0, 'Papel' => 0, 'Tijeras' => 0, 'Humanidad' => 0, 'Skynet' => 0];
        $skynetOpciones = ['Piedra' => 0, 'Papel' => 0, 'Tijeras' => 0, 'Humanidad' => 0, 'Skynet' => 0];
        $totalPartidas = 0;

        $archivo = 'historial.txt';
        if (file_exists($archivo) && filesize($archivo) > 0) {
            $historial = file($archivo);

            foreach ($historial as $linea) {
                $totalPartidas++;

                preg_match('/HUMANO: (\w+)/', $linea, $humanoMatch);
                preg_match('/SKYNET: (\w+)/', $linea, $skynetMatch);

                // Contar las opciones del humano
                if (isset($humanoMatch[1]) && in_array($humanoMatch[1], $opciones)) {
                    $humanoOpciones[$humanoMatch[1]]++;
                }

                // Contar las opciones de Skynet
                if (isset($skynetMatch[1]) && in_array($skynetMatch[1], $opciones)) {
                    $skynetOpciones[$skynetMatch[1]]++;
                }
            }
        }

        function calcularPorcentaje($cantidad, $total)
        {
            return $total > 0 ? round(($cantidad / $total) * 100, 2) . '%' : '0%';
        }

        // Mostrar estadísticas
        if ($totalPartidas > 0) {
            echo "<div class='table-container'";
            echo "<table class='table'>";
            echo "<thead><tr><th>Opción</th><th>Humano (%)</th><th>Skynet (%)</th></tr></thead>";
            echo "<tbody>";
            foreach ($opciones as $opcion) {
                echo "<tr>";
                echo "<td>$opcion</td>";
                echo "<td>" . calcularPorcentaje($humanoOpciones[$opcion], $totalPartidas) . "</td>";
                echo "<td>" . calcularPorcentaje($skynetOpciones[$opcion], $totalPartidas) . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<div class='alert alert-outline-danger'>No hay partidas registradas para calcular estadísticas.</div>";
        }


        ?>


        <!-- BOTONES -->
        <button class="btn btn-outline-danger w-45" onclick="window.location.href='../index.html'">Volver al Menú</button>
        <button class="btn btn-outline-danger w-45" onclick="window.history.back()">Volver</button>
    </div>
    </div>


</body>




</html>