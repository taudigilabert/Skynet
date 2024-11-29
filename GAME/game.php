<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUEGO POR TU VIDA</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Favicon -->
    <link rel="icon" href="../Img/skynetLogoIcon.png" type="image/png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
</head>

<body class="text-center">
    <!-- Encabezado -->
    <header>
        <img src="../Img/SkynetLogo.png" alt="Logo de Skynet" class="img-fluid mx-auto d-block">
    </header>

    <!-- Contenido principal -->
    <div class="container mt-4">
        <h4 class="mb-4 text-center" id="titulo1">ELIGE UNA OPCIÓN, HUMANO:</h4>

        <!-- Formulario opciones -->
        <form action="game1resultados.php" method="POST">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="icon-container">
                        <!-- Botones con íconos -->
                        <div class="icon" onclick="selectOption('Piedra')" aria-label="Seleccionar Piedra">
                            <i class="fas fa-hand-rock fa-2x"></i>
                        </div>
                        <div class="icon" onclick="selectOption('Papel')" aria-label="Seleccionar Papel">
                            <i class="fas fa-hand-paper fa-2x"></i>
                        </div>
                        <div class="icon" onclick="selectOption('Tijeras')" aria-label="Seleccionar Tijeras">
                            <i class="fas fa-hand-scissors fa-2x"></i>
                        </div>
                    </div>
                    <!-- Campo oculto para enviar la selección -->
                    <input type="hidden" id="elemento" name="elemento" value="" />
                </div>
            </div>
        </form>

        <!-- Botón de regreso al menú -->
        <button class="btn btn-outline-danger w-50 mt-3" onclick="window.history.back()">Volver al Menú</button>
    </div>

    <!-- Script para seleccionar opción -->
    <script>
        function selectOption(opcion) {
            const elementoInput = document.getElementById("elemento");
            if (opcion) {
                elementoInput.value = opcion;
                document.querySelector('form').submit();
            } else {
                alert("Por favor, selecciona una opción.");
            }
        }
    </script>
</body>

</html>