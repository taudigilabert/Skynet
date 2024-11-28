<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HISTORIAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="Img/skynetLogoIcon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <img src="./Img/SkynetLogo.png" alt="Cargando..." class="img-fluid mx-auto d-block">
    </header>

    <div class="container mt-4 text-center">
        <h4 id="titulo1" class="mb-4">HISTORIAL DE PARTIDAS</h4>
        <pre style="text-align: center;  justify-content:center ; color: #bcbcbc; padding: 10px;">
            <?php
            // LEER ARCHIVO
            $archivo = 'historial.txt';
            if (file_exists($archivo)) {
                echo file_get_contents($archivo);
            } else {
                echo "Imposible recuperar el Historial.";
            }
            if (filesize($archivo) == 0) {
                echo "Historial de partidas vacío humano.";
            }
            ?>
        </pre>

        <!-- BOTONES -->
        <div class="container mt-4 text-center">
            <button class="btn btn-outline-danger w-45" onclick="window.history.back()">Volver al Menú</button>
            <button class="btn btn-outline-danger w-45" onclick="window.location.href='estadisticas.php'">Ver
                Estadísticas</button>
        </div>

        <!-- Enlace para borrar el historial -->
        <a href="#" class="btn btn-link" style="color: #8b0000;" onclick="limpiarHistorial()">Borrar Historial</a>

    </div>

    <!-- FALTA POR HACER. FUNCION BORRAR HISTORIAL + FUNCION VER ESTADISTICAS -->
    <script>
        function limpiarHistorial() {
            if (confirm("¿Estás seguro que quieres borrar el historial humano?")) {
                window.location.href = 'limpiarHistorial.php';
            }
        }
    </script>
</body>




</html>