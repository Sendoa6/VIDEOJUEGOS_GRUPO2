<?php
    session_start();
    include '../../DataBase/conexiones.php';
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
        session_destroy();
        header("Location: inicio_sesion.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Tienda - Procesar</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estilosNuevoJuego.css">
    <link rel="icon" href="../../imagenes/favicon.png">
</head>
<body>

    <!-- HEADER -->
    <header class="bg-light border-bottom py-3 d-flex justify-content-between align-items-center px-4">
        <img src="../../imagenes/logoGame.png" alt="GAME" class="img-fluid" style="max-width: 10%;">
        <h1 class="text-center m-0">GESTIÓN DE TIENDAS</h1>
        <img src="../../imagenes/logoAltF4.png" alt="Alt+F4" class="img-fluid" style="max-width: 6%;">
    </header>

    <!-- BOTON VOLVER -->
    <div class="container my-4">
        <a href="nuevaTienda.php" class="btn hover-scale btn-light shadow rounded d-inline-flex align-items-center hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
                <path d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/>
            </svg>
            Volver
        </a>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="container p-5 my-5 text-center">
        <?php
            $direccion = $_POST["direccion"];

            $check = mysqli_query($conexion, "SELECT * FROM tienda WHERE direccion = '$direccion'");

            if (mysqli_num_rows($check) > 0) {
                echo "<div class='alert alert-warning shadow rounded'>
                        La tienda con dirección '<b>$direccion</b>' ya existe en la base de datos.
                      </div>";
            } else {
                $query = "INSERT INTO tienda (direccion) VALUES ('$direccion')";
                $ejecutar = mysqli_query($conexion, $query);

                if ($ejecutar) {
                    $idTienda = mysqli_insert_id($conexion);
                    echo "<div class='alert alert-success shadow rounded'>
                            Tienda registrada correctamente con ID: <b>$idTienda</b><br>
                            Dirección: <b>$direccion</b>
                          </div>";
                } else {
                    echo "<div class='alert alert-danger shadow rounded'>
                            Error al crear la tienda: " . mysqli_error($conexion) . "
                          </div>";
                }
            }

            mysqli_close($conexion);
        ?>
    </main>

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
