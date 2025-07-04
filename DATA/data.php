<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HISTORIAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../Img/skynetLogoIcon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>

<body data-page="main-menu">
    <div id="main-content">
        <!-- IMAGEN -->
        <header>
            <img src="../Img/SkynetLogo.png" alt="Cargando..." class="img-fluid mx-auto d-block bannerHistorial" />
        </header>
        <!-- TITULO HISTORIAL -->
        <div class="container table-container position-relative text-center mb-0" style="max-width: 800px; margin: 0 auto;">
            <h4 id="titulo1" class="d-inline-block mx-auto position-relative">
                HISTORIAL DE PARTIDAS
            </h4>
            <a href="#"
                class="btn btn-link position-absolute"
                style="right: 1rem; top: 50%; transform: translateY(-50%); color: red;"
                onclick="limpiarHistorial()"
                aria-label="Borrar historial de partidas">
                <i class="fas fa-exclamation-triangle me-1"></i> Borrar Historial
            </a>

        </div>
    </div>

    <div class="container mt-0 mb-4 text-center table-container">

        <?php
        $archivo = 'historial.txt';

        if (file_exists($archivo) && filesize($archivo) > 0) {
            $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            echo "<table class='table-custom'>";
            echo "<thead><tr><th>Fecha</th><th>Humano</th><th>Skynet</th><th>Resultado</th></tr></thead><tbody>";

            foreach ($lineas as $linea) {
                $partes = explode('|', $linea);
                if (count($partes) === 4) {
                    $fecha = trim($partes[0]);
                    $humano = trim(str_replace('HUMANO:', '', $partes[1]));
                    $skynet = trim(str_replace('SKYNET:', '', $partes[2]));
                    $resultado = trim(str_replace('RESULTADO:', '', $partes[3]));

                    echo "<tr>";
                    echo "<td>$fecha</td>";
                    echo "<td>$humano</td>";
                    echo "<td>$skynet</td>";
                    echo "<td>$resultado</td>";
                    echo "</tr>";
                }
            }
            echo "</tbody></table>";
        } else {
            echo "<p>Historial de partidas vacío.</p>";
        }
        ?>
    </div>

    <!-- BOTONES -->
    <div class="container mt-2 text-center">
        <button class="btn btnCustom w-25" onclick="window.history.back()"><span>Volver al Menú</span></button>
        <button class="btn btnCustom w-25" onclick="window.location.href='estadisticas.php'"><span>Ver
                Estadísticas</span></button>
    </div>

    </div>

    <!-- FUNCION BORRAR HISTORIAL + FUNCION VER ESTADISTICAS -->
    <!-- Modal confirmación borrado -->
    <div id="confirmModal" class="modal-overlay" style="display:none;">
        <div class="modal-content">
            <p>Estás a punto de eliminar todo el registro de partidas. <br><br>
                Esta acción no se puede deshacer.</p>
            <div class="modal-buttons">
                <button id="confirmYes" class="btn btnCustom btn-sm"><span>Sí, eliminar</span></button>
                <button id="confirmNo" class="btn btnCustom btn-sm"><span>Cancelar</span></button>
            </div>
        </div>
    </div>

    <!-- Script para manejar el modal de confirmación -->
    <script>
        function limpiarHistorial() {
            document.getElementById('confirmModal').style.display = 'flex';
        }

        document.getElementById('confirmYes').addEventListener('click', function() {
            window.location.href = 'limpiarHistorial.php';
        });

        document.getElementById('confirmNo').addEventListener('click', function() {
            document.getElementById('confirmModal').style.display = 'none';
        });

        document.getElementById('confirmModal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });
    </script>

    <!-- Scripts -->
    <script src="../script.js"></script>
    <?php include __DIR__ . '/../INCLUDES/audioPlayer.php'; ?>
    <?php include '../INCLUDES/footer.php'; ?>
    <script src="../INCLUDES/btnSound.js"></script>
</body>




</html>