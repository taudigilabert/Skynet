<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Modo Historia - SKYNET</title>
    <!-- Estilos externos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../styles.css" />
    <link rel="icon" href="../Img/skynetLogoIcon.png" type="image/png" />
    <!-- Estilos internos -->
    <style>
        .locked {
            filter: grayscale(80%);
            opacity: 0.6;
        }

        .locked button {
            cursor: not-allowed;
        }

        .unlocked {
            filter: none;
            opacity: 1;
        }

        #confirmModal.modal-overlay {
            display: none;

        }
    </style>
</head>

<body data-page="historia-menu">
    <div id="main-content">
        <!-- Header -->
        <header>
            <img src="../Img/SkynetLogo.png" alt="Cargando..." class="img-fluid mx-auto d-block banner_game" />
        </header>

        <!-- Botón para reiniciar campaña -->
        <div class="text-center mt-4">
            <button id="resetCampaign" class="btn btnCustom">
                <span><i class="fas fa-triangle-exclamation me-2"></i> Reiniciar Progreso</span>
            </button>
        </div>

        <!-- Info -->
        <section class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div id="infoText" class="info-text" aria-hidden="true">
                        <h6 class="mb-2">Modo Historia</h6>
                        <p class="mb-0">
                            Bienvenido al Modo Historia, humano. Cada decisión que tomes afectará el curso de los
                            acontecimientos. Avanza capítulo a capítulo mientras la historia de Skynet se revela ante ti,
                            desentrañando los orígenes del apocalipsis y el destino de la humanidad.
                        </p>
                        <p class="mb-0 mt-2">
                            Solo las victorias te permitirán desbloquear nuevos episodios. El fracaso no es una opción, si
                            caes, deberás volver a intentarlo hasta dominar cada enfrentamiento.
                        </p>
                    </div>

                    <!-- Título con botón de info al lado -->
                    <div class="d-flex align-items-center justify-content-center mb-4 info-header">
                        <h4 id="titulo1" class="m-0 flex-grow-1">SELECCIONA UN EPISODIO:</h4>
                        <button
                            id="infoBtn"
                            aria-expanded="false"
                            aria-controls="infoText"
                            aria-label="Más información"
                            class="btn-info">
                            <i class="fas fa-circle-info"></i>
                        </button>
                    </div>

                    <!-- Episodios -->
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <!-- Ejemplo: Capítulo 1 -->
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="1">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 1:<br /> El Despertar</h5>
                                    <p class="card-text">
                                        Skynet toma conciencia y intenta apuderarse de las armas de destrucción masiva.
                                    </p>
                                    <button class="btn btnCustom w-100" disabled>
                                        <i class="fas fa-lock"></i>Bloqueado
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Repite para más capítulos -->
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="2">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 2:<br /> Día del Juicio Final</h5>
                                    <p class="card-text">¿Listo para tomar decisiones estratégicas y sobrevivir?</p>
                                    <button class="btn btnCustom w-100" disabled>
                                        <i class="fas fa-lock"></i> Bloqueado
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="3">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 3:<br /> Resistencia</h5>
                                    <p class="card-text">Lidera la resistencia con lógica y estrategia.</p>
                                    <button class="btn btnCustom w-100" disabled>
                                        <i class="fas fa-lock"></i> Bloqueado
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="4">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 4:<br /> Guerra Total</h5>
                                    <p class="card-text">Enfréntate a Skynet en un juego de memoria táctica.</p>
                                    <button class="btn btnCustom w-100" disabled>
                                        <i class="fas fa-lock"></i> Bloqueado
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="5">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 5:<br /> Última Esperanza</h5>
                                    <p class="card-text">Descifra el código que puede salvar a la humanidad.</p>
                                    <button class="btn btnCustom w-100" disabled>
                                        <i class="fas fa-lock"></i> Bloqueado
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 episode-card locked" data-episode="6">
                                <div class="card-body">
                                    <h5 class="card-title">Capítulo 6:<br /> El Juicio Final</h5>
                                    <p class="card-text">
                                        Enfrenta a Skynet en un desafío final de ingenio y estrategia.
                                    </p>
                                    <button class="btn btnCustom w-100" disabled>
                                        <i class="fas fa-lock"></i> Bloqueado
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botones adicionales -->
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <button class="btn btnCustom w-100" onclick="window.location.href='../index.php'">
                            <span>Volver al Menú</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal confirmación borrado -->
    <div id="confirmModal" class="modal-overlay">
        <div class="modal-content">
            <p>
                Estás a punto de eliminar todo el progreso en la historia. <br /><br />
                Esta acción no se puede deshacer.
            </p>
            <div class="modal-buttons">
                <button id="confirmYes" class="btn btnCustom btn-sm"><span>Sí, eliminar</span></button>
                <button id="confirmNo" class="btn btnCustom btn-sm"><span>Cancelar</span></button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Ocultar modal por defecto
            const modal = document.getElementById("confirmModal");
            modal.style.display = "none";

            // Botón de información
            const infoBtn = document.getElementById("infoBtn");
            const infoText = document.getElementById("infoText");
            if (infoBtn && infoText) {
                infoBtn.addEventListener("click", () => {
                    const expanded = infoBtn.getAttribute("aria-expanded") === "true";
                    infoBtn.setAttribute("aria-expanded", !expanded);
                    infoText.classList.toggle("visible");
                    infoText.setAttribute("aria-hidden", expanded);
                });
            }

            // Menú historia - desbloqueo de capítulos
            const progreso = parseInt(localStorage.getItem("progreso")) || 1;

            document.querySelectorAll(".episode-card").forEach((card) => {
                const episodio = parseInt(card.dataset.episode);
                const boton = card.querySelector("button");
                const ruta = `capitulo${episodio}/capitulo${episodio}.php`;

                if (episodio <= progreso) {
                    card.classList.remove("locked");
                    card.classList.add("unlocked");
                    boton.disabled = false;
                    boton.innerHTML = '<span><i class="fas fa-play"></i> Jugar</span>';
                    boton.onclick = () => (window.location.href = ruta);
                    card.onclick = () => (window.location.href = ruta);
                }
            });

            // Modal confirmación reset campaña
            const resetBtn = document.getElementById("resetCampaign");
            const confirmYes = document.getElementById("confirmYes");
            const confirmNo = document.getElementById("confirmNo");

            resetBtn.addEventListener("click", () => {
                modal.style.display = "flex";
            });

            confirmNo.addEventListener("click", () => {
                modal.style.display = "none";
            });

            confirmYes.addEventListener("click", () => {
                localStorage.removeItem("puntosHumano");
                localStorage.removeItem("puntosSkynet");
                localStorage.removeItem("progreso");

                modal.style.display = "none";

                location.reload();
            });
        });
    </script>

    <!-- Includes PHP (audio, footer, etc) -->
    <?php include '../INCLUDES/audioPlayer.php'; ?>
    <?php include '../INCLUDES/footer.php'; ?>
    <script src="../INCLUDES/btnSound.js"></script>
</body>

</html>