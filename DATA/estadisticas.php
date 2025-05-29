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

<body>
    <div id="main-stats">
        <!-- BANNER -->
        <div id="banner-stats" class="mb-4">
            <img src="../Img/SkynetLogo.png" alt="Skynet Logo" class="img-fluid" style="max-height: 200px;">
        </div>

        <!-- ESTADISTICAS -->
        <h4 id="titulo1" class="mt-3">ESTADÍSTICAS</h4>
        <p class="text-center">Aquí puedes ver las estadísticas de las partidas jugadas.</p>
        <div class="container py-4" id="cajaEstadisticas">

            <?php
            $opciones = ["Piedra", "Papel", "Tijeras", "Humanidad", "Skynet"];
            $humanoOpciones = array_fill_keys($opciones, 0);
            $skynetOpciones = array_fill_keys($opciones, 0);
            $totalPartidas = 0;

            $archivo = 'historial.txt';
            if (file_exists($archivo) && filesize($archivo) > 0) {
                $historial = file($archivo);

                foreach ($historial as $linea) {
                    $totalPartidas++;

                    preg_match('/HUMANO: (\w+)/', $linea, $humanoMatch);
                    preg_match('/SKYNET: (\w+)/', $linea, $skynetMatch);

                    if (isset($humanoMatch[1]) && in_array($humanoMatch[1], $opciones)) {
                        $humanoOpciones[$humanoMatch[1]]++;
                    }
                    if (isset($skynetMatch[1]) && in_array($skynetMatch[1], $opciones)) {
                        $skynetOpciones[$skynetMatch[1]]++;
                    }
                }
            }

            function calcularPorcentaje($cantidad, $total)
            {
                return $total > 0 ? round(($cantidad / $total) * 100, 2) . '%' : '0%';
            }

            if ($totalPartidas > 0) {
                echo '<div class="stats-panel">';
                foreach ($opciones as $opcion) {
                    $porcentajeHumano = round(($humanoOpciones[$opcion] / $totalPartidas) * 100, 2);
                    $porcentajeSkynet = round(($skynetOpciones[$opcion] / $totalPartidas) * 100, 2);

                    echo "<div class='stat-item'>
                        <div class='stat-title'>$opcion</div>
                        <div class='stat-bar-container'>
                            <div class='stat-bar-human' style='width: {$porcentajeHumano}%'>{$porcentajeHumano}%</div>
                            <div class='stat-bar-skynet' style='width: {$porcentajeSkynet}%'>{$porcentajeSkynet}%</div>
                        </div>
                        <div class='stat-labels'>
                            <span>HUMANO</span>
                            <span>SKYNET</span>
                        </div>
                      </div>";
                }
                echo '</div>';
            } else {
                echo '<div class="alert alert-warning text-center">No hay partidas registradas para calcular estadísticas.</div>';
            }
            ?>
        </div>
        <!-- BOTONES -->
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button class="btn btnCustom" onclick="window.location.href='../index.php'"><span>Volver al Menú</span></button>
            <button class="btn btnCustom" onclick="window.history.back()"><span>Volver</span></button>
        </div>

        <!-- FOOTER -->
        <footer id="site-footer-stats">
            <p>
                &copy; 2025 taudigilabert. Todos los derechos reservados. |
                <a href="https://github.com/taudigilabert" target="_blank" rel="noopener noreferrer">GitHub</a> |
                <a href="mailto:taudigilabert@gmail.com">Contacto</a> |
                <a href="https://discord.gg/tu-invitacion" target="_blank" rel="noopener noreferrer">Discord</a>
            </p>
        </footer>
    </div>




    <!-- Scripts -->
    <script src="../script.js"></script>
    <?php include __DIR__ . '/../INCLUDES/audioPlayer.php'; ?>
    <script src="../INCLUDES/btnSound.js"></script>
</body>

</html>