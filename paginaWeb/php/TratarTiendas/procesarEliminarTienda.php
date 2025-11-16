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
    <title>Eliminar Tienda - Procesar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estilosEliminarJuego.css">
    <link rel="icon" href="../../imagenes/favicon.png">
</head>
<body>
    <header class="bg-light border-bottom py-3 d-flex align-items-center justify-content-center px-4 gap-3">
        <a href="../index.php"><img src="../../imagenes/logoGame.png" alt="GAME" class="img-fluid header-img"></a>

        <h1 class="text-center m-0 flex-grow-1">GESTIÓN DE VIDEOJUEGOS</h1>

        <a href="../Sessions/cerrar_sesion.php">
            <img src="../../imagenes/iconoCerrarSession.png" alt="Cerrar sesión" class="header-img-small">
        </a>
    </header>
    
    <div class="container my-4">
        <a href="eliminarTienda.php" class="btn btn-light hover-scale shadow rounded d-inline-flex align-items-center hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
                <path d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/>
            </svg>
            Volver
        </a>
    </div>
    <main class="container p-5 my-5 text-center">
        <?php
        $id = $_POST['idTienda'];
        // Obtiene el ID de la tienda que se quiere eliminar

        $registro = mysqli_query($conexion, "SELECT * FROM tienda WHERE id_tienda = '$id'");
        // Busca si la tienda existe en la base de datos

        if (mysqli_num_rows($registro) > 0) {
            // Si la tienda existe, primero elimina a los trabajadores relacionados
            $deleteTrabajadores = mysqli_query($conexion, "DELETE FROM trabajador WHERE id_tienda = '$id'");
            // Registra en el historial que se eliminaron trabajadores
            $deleteTrabajadoresHistorial = mysqli_query($conexion, 
                "INSERT INTO historial (concepto, fecha, id_trabajador) 
                VALUES ('Borrado de todos los trabajadores de la tienda $id', NOW(), '{$_SESSION['id_trabajador']}')");

            // Luego elimina la tienda
            $deleteTienda = mysqli_query($conexion, "DELETE FROM tienda WHERE id_tienda = '$id'");
            // Registra en el historial que se eliminó la tienda
            $deleteTiendaHistorial = mysqli_query($conexion, 
                "INSERT INTO historial (concepto, fecha, id_trabajador) 
                VALUES ('Borrado de la tienda $id', NOW(), '{$_SESSION['id_trabajador']}')");

            // Muestra mensaje de éxito o error según lo que pase al eliminar
            if ($deleteTienda) {
                echo "<div class='alert alert-success shadow rounded'>
                        La tienda con ID <strong>$id</strong> y todos sus trabajadores asociados 
                        han sido eliminados correctamente.
                    </div>";
            } else {
                echo "<div class='alert alert-danger shadow rounded'>
                        Error al eliminar la tienda: " . mysqli_error($conexion) . "
                    </div>";
            }

        } else {
            // Si la tienda no existe, muestra un aviso
            echo "<div class='alert alert-warning shadow rounded'>
                    No se encontró ninguna tienda con el ID <strong>$id</strong>.
                </div>";
        }

        mysqli_close($conexion);
        // Cierra la conexión a la base de datos
        ?>

    </main>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
