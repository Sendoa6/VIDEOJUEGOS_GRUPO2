<?php
    session_start();
    include '../../DataBase/conexiones.php';
    if (!isset($_SESSION['id_trabajador'])) {
        session_destroy();
        header("Location: ../Sessions/inicio_sesion.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Videojuego</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estilosNuevoJuego.css">
    <link rel="icon" href="../../imagenes/favicon.png">
</head>

<body>

    <!-- HEADER -->
    <header class="bg-light border-bottom py-3 d-flex justify-content-between align-items-center px-4">
        <img src="../../imagenes/logoGame.png" alt="GAME" class="img-fluid" style="max-width: 10%;">
        <h1 class="text-center m-0">GESTIÓN DE VIDEOJUEGOS</h1>
        <img src="../../imagenes/logoAltF4.png" alt="Alt+F4" class="img-fluid" style="max-width: 6%;">
    </header>

    <!-- BOTON VOLVER -->
    <div class="container my-4">
        <a href="indexVideojuegos.php" class="btn hover-scale btn-light shadow rounded d-inline-flex align-items-center hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
                <path d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/>
            </svg>
            Volver
        </a>
    </div>

    <!-- TITULO -->
    <h2 class="text-center my-4"><i>Ingrese los datos del videojuego:</i></h2>

    <!-- FORMULARIO -->
    <div class="container d-flex justify-content-center my-5">
        <div class="card p-4 shadow rounded w-100" style="max-width: 600px;">
            <form action="insertarNuevoVideojuego.php" method="post" class="row g-3">

                <div class="col-12">
                    <label for="titulo" class="form-label">Nombre del videojuego:</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" required>
                </div>

                <div class="col-12">
                    <label for="precio_nuevo" class="form-label">Precio:</label>
                    <input type="number" step="0.01" name="precio_nuevo" id="precio_nuevo" class="form-control" required>
                </div>

                <div class="col-12">
                    <label for="precio_seminuevo" class="form-label">Precio seminuevo:</label>
                    <input type="number" step="0.01" name="precio_seminuevo" id="precio_seminuevo" class="form-control" required>
                </div>

                <div class="col-12">
                    <label for="ano_publicacion" class="form-label">Año de publicación:</label>
                    <input type="number" name="ano_publicacion" id="ano_publicacion" class="form-control" required>
                </div>

                <div class="col-12">
                    <label for="estudio_desarrollo" class="form-label">Estudio de desarrollo:</label>
                    <input type="text" name="estudio_desarrollo" id="estudio_desarrollo" class="form-control" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Plataforma del videojuego:</label>
                    <div class="d-flex flex-wrap gap-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="pc" id="pc">
                            <label class="form-check-label" for="pc">PC</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="ps5" id="ps5">
                            <label class="form-check-label" for="ps5">PS5</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="ps4" id="ps4">
                            <label class="form-check-label" for="ps4">PS4</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="ps3" id="ps3">
                            <label class="form-check-label" for="ps3">PS3</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="ps2" id="ps2">
                            <label class="form-check-label" for="ps2">PS2</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="psVr2" id="psVr2">
                            <label class="form-check-label" for="psVr2">PS VR 2</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="xboxSeriesX" id="xboxSeriesX">
                            <label class="form-check-label" for="xboxSeriesX">Xbox Series X</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="xboxOne" id="xboxOne">
                            <label class="form-check-label" for="xboxOne">Xbox One</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="nintendoSwitch" id="nintendoSwitch">
                            <label class="form-check-label" for="nintendoSwitch">Nintendo Switch</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="wiiU" id="wiiU">
                            <label class="form-check-label" for="wiiU">Wii U</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="wii" id="wii">
                            <label class="form-check-label" for="wii">Wii</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="plataforma" value="3DS" id="3DS">
                            <label class="form-check-label" for="3DS">3DS</label>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">Enviar</button>
                </div>

            </form>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-white mt-5 p-5">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="mb-3">
                <p class="mb-1">2025 GAME. Todos los derechos reservados</p>
                <p class="mb-1">
                    <a href="https://www.facebook.com/?locale=es_ES" class="text-white text-decoration-underline">Facebook</a><br>
                    <a href="https://www.instagram.com/" class="text-white text-decoration-underline">Instagram</a><br>
                    <a href="https://x.com/?lang=es" class="text-white text-decoration-underline">Twitter</a>
                </p>
                <p class="mb-1">
                    <a href="https://www.google.com/maps" class="text-white text-decoration-underline">📍Localización</a><br>
                    <a href="https://workspace.google.com/intl/es/gmail/" class="text-white text-decoration-underline">📩Contáctanos</a>
                </p>
            </div>
            <div class="text-end">
                <img src="../../imagenes/creativeCommons.png" alt="Creative Commons" class="img-fluid" style="width: 40%;">
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
