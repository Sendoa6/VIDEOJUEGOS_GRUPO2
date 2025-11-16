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
    <title>Gestión de videojuegos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estilosIndexVideojuegos.css">
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
        <a href="../index.php" class="hover-scale btn btn-light shadow rounded d-inline-flex align-items-center hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
                <path d="M7 20q-.825 0-1.412-.587T5 18v-7.15l-2 1.525q-.35.25-.75.213T1.6 12.2t-.2-.75t.4-.65l8.975-6.875q.275-.2.588-.3t.637-.1t.638.1t.587.3L16 6.05V5.5q0-.625.438-1.062T17.5 4t1.063.438T19 5.5v2.85l3.2 2.45q.325.25.388.65t-.188.75t-.65.388t-.75-.213l-2-1.525V18q0 .825-.587 1.413T17 20h-1q-.825 0-1.412-.587T14 18v-2q0-.825-.587-1.412T12 14t-1.412.588T10 16v2q0 .825-.587 1.413T8 20zm3-9.975h4q0-.8-.6-1.313T12 8.2t-1.4.513t-.6 1.312"/>
            </svg>
            Volver
        </a>
    </div>

    <!-- TITULO -->
    <h2 class="text-center my-5"><i>Elige una opción:</i></h2>

    <!-- SECCIONES -->
    <div class="container my-5 p-5">
        <div class="row justify-content-center gap-4">

            <a href="nuevaTienda.php" class="col-10 col-md-4 text-decoration-none text-dark mb-4">
                <div class="p-4 bg-light hover-scale shadow rounded text-center hover-scale h-100 d-flex flex-column justify-content-center align-items-center">
                    <h3 class="mb-3">Nueva Tienda</h3>
                    <img src="../../imagenes/logoAñadir.png" class="img-fluid" style="width:100px; height:100px; object-fit:contain;">
                </div>
            </a>

            <a href="eliminarTienda.php" class="col-10 col-md-4 text-decoration-none text-dark mb-4">
                <div class="p-4 bg-light hover-scale shadow rounded text-center hover-scale h-100 d-flex flex-column justify-content-center align-items-center">
                    <h3 class="mb-3">Eliminar Tienda</h3>
                    <img src="../../imagenes/logoEliminar.png" class="img-fluid" style="width:100px; height:100px; object-fit:contain;">
                </div>
            </a>

            <a href="consultarTiendas.php" class="col-10 col-md-4 text-decoration-none text-dark mb-4">
                <div class="p-4 bg-light hover-scale shadow rounded text-center hover-scale h-100 d-flex flex-column justify-content-center align-items-center">
                    <h3 class="mb-3">Consultar Tienda</h3>
                    <img src="../../imagenes/logoListar.png" class="img-fluid" style="width:100px; height:100px; object-fit:contain;">
                </div>
            </a>

        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-white mt-5 p-5">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">

            <div class="mb-3">
                <p class="mb-1">2025 GAME. Todos los derechos reservados</p>

                <p class="mb-1">
                    <a href="https://www.game.es/" class="text-white text-decoration-underline">Página Oficial de GAME</a><br>
                    <a href="https://workspace.google.com/intl/es/gmail/" class="text-white text-decoration-underline">Contacto de GAME</a><br>
                </p>
            </div>
            <div class="mb-3">
                <p class="mb-1"><i>Sitio web desarrollado por ALT+F4</i></p>
                <p class="mb-1">
                    <a href="https://workspace.google.com/intl/es/gmail/" class="text-white text-decoration-underline">📲Contacto</a><br>
                    <a href="https://www.google.com/maps" class="text-white text-decoration-underline">🌍Localización</a>
                </p>
            </div>

            <div class="text-end">
                <img src="../imagenes/creativeCommons.png" alt="Creative Commons" class="img-fluid" style="width: 40%;">
            </div>

        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
