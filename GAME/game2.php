<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DÍA DEL JUICIO FINAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="icon" href="../Img/skynetLogoIcon.png" type="image/png">
  </head>

<body class="text-center">
    <header>
        <img src="../Img/SkynetLogo.png" alt="Cargando..." class="img-fluid mx-auto d-block">
    </header>

    <div class="container mt-4">
        <h4 class="mb-4 text-center" id="titulo1">ELIGE UNA OPCIÓN, HUMANO:</h4>

        <!-- FORMULARIO OPCIONES -->
        <form action="game2resultados.php" method="POST">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="icon-container">
                        <div class="icon" onclick="selectOption('Piedra')">
                            <i class="fas fa-hand-rock fa-1x"></i>
                        </div>
                        <div class="icon" onclick="selectOption('Papel')">
                            <i class="fas fa-hand-paper fa-1x"></i>
                        </div>
                        <div class="icon" onclick="selectOption('Tijeras')">
                            <i class="fas fa-hand-scissors fa-1x"></i>
                        </div>
                        <div class="icon" onclick="selectOption('Humanidad')">
                            <i class="fas fa-user fa-1x"></i>
                        </div>
                        <div class="icon" onclick="selectOption('Skynet')">
                            <i class="fas fa-robot fa-1x"></i>
                        </div>
                    </div>

                    <input type="hidden" id="elemento" name="elemento" value="" />
                </div>
            </div>
        </form>
        <!-- Botón para volver al menú -->
        <button class="btn btn-outline-danger w-50" onclick="window.history.back()">Volver al Menú</button>

        <!-- FUNCIÓN SELECCIONAR OPCIÓN -->
        <script>
            function selectOption(opcion) {
                document.getElementById("elemento").value = opcion;
                document.querySelector('form').submit();
            }
        </script>
</body>

</html>