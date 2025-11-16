<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de videojuegos</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../estilos/estilosIndex.css">
    <link rel="icon" href="../imagenes/favicon.png">
</head>

<body>

    <!-- HEADER -->
    <header class="bg-light border-bottom py-3 d-flex justify-content-between align-items-center px-4">
        <img src="../imagenes/logoGame.png" alt="GAME" class="img-fluid" style="max-width: 10%;">
        <h1 class="text-center m-0">GESTIÓN DE VIDEOJUEGOS</h1>
        <a href="/paginaWeb/php/Sessions/cerrar_sesion.php">
            <img src="../imagenes/iconoCerrarSession.png" 
                alt="Cerrar sesión" 
                class="img-fluid" 
                style="max-width: 6%; cursor: pointer;">
        </a>

    </header>

    <!-- TITULO -->
    <h2 class="text-center my-5"><i>¡Bienvenido!😉</i></h2>

    <!-- SECCIONES -->
    <div class="container my-5 p-5">
        <div class="row justify-content-center gap-4">
            <a href="TratarVideojuegos/indexVideojuegos.php" class="col-10 col-md-4 text-decoration-none text-dark mb-4">
                <div class="p-4 bg-light shadow rounded text-center hover-scale h-100 d-flex flex-column justify-content-center align-items-center">
                    <h3 class="mb-3">Gestionar videojuegos</h3>
                    <img src="../imagenes/iconoVideojuegos.png" class="img-fluid" style="width:100px; height:100px; object-fit:contain;">
                </div>
            </a>

            <a href="TratarCopias/indexCopias.php" class="col-10 col-md-4 text-decoration-none text-dark mb-4">
                <div class="p-4 bg-light shadow rounded text-center hover-scale h-100 d-flex flex-column justify-content-center align-items-center">
                    <h3 class="mb-3">Gestionar copias de videojuegos</h3>
                    <img src="../imagenes/iconoCopias.png" class="img-fluid" style="width:100px; height:100px; object-fit:contain;">
                </div>
            </a>

            <a href="TratarTrabajadores/indexTrabajadores.php" class="col-10 col-md-4 text-decoration-none text-dark mb-4">
                <div class="p-4 bg-light shadow rounded text-center hover-scale h-100 d-flex flex-column justify-content-center align-items-center">
                    <h3 class="mb-3">Gestionar trabajadores</h3>
                    <img src="../imagenes/iconoTrabajadores.png" class="img-fluid" style="width:100px; height:100px; object-fit:contain;">
                </div>
            </a>

            <a href="TratarTiendas/indexTiendas.php" class="col-10 col-md-4 text-decoration-none text-dark mb-4">
                <div class="p-4 bg-light shadow rounded text-center hover-scale h-100 d-flex flex-column justify-content-center align-items-center">
                    <h3 class="mb-3">Gestionar Tiendas</h3>
                    <img src="../imagenes/logoTienda.png" class="img-fluid" style="width:100px; height:100px; object-fit:contain;">
                </div>
            </a>

            <a href="TratarHistorial/indexHistorial.php" class="col-10 col-md-4 text-decoration-none text-dark mb-4">
                <div class="p-4 bg-light shadow rounded text-center hover-scale h-100 d-flex flex-column justify-content-center align-items-center">
                    <h3 class="mb-3">Gestionar Historial</h3>
                    <img src="../imagenes/historial.png" class="img-fluid" style="width:100px; height:100px; object-fit:contain;">
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

    <!--Por si se utiliza JavaScript, para adaptarlo a Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
