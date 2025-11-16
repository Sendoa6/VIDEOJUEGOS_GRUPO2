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
    <title>Consultar Videojuegos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estilosConsultarVideojuegos.css">
    <link rel="icon" href="../../imagenes/favicon.png">
</head>
<body>

    <!-- HEADER -->
    <header class="bg-light border-bottom py-3 d-flex justify-content-between align-items-center px-4">
        <img src="../../imagenes/logoGame.png" alt="GAME" class="img-fluid" style="max-width: 10%;">
        <h1 class="text-center m-0">GESTIÓN DE TRABAJADORES</h1>
        <img src="../../imagenes/logoAltF4.png" alt="Alt+F4" class="img-fluid" style="max-width: 6%;">
    </header>

    <!-- BOTON VOLVER -->
    <div class="container my-4">
        <a href="indexTrabajadores.php" class="btn hover-scale btn-light shadow rounded d-inline-flex align-items-center hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
                <path d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/>
            </svg>
            Volver
        </a>
    </div>

    <!-- TITULO -->
    <h2 class="text-center my-4"><i>Listado de trabajadores:</i></h2>

    <!-- TABLA -->
    <div class="container my-5">
        <div class="table-responsive shadow rounded">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Dni</th>
                        <th>Fecha de nacimiento</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Admin</th>
                        <th>Tienda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../../DataBase/conexiones.php';
                        $query = "SELECT t.id_trabajador, t.nombre, t.apellidos, t.dni, t.fecha_nacimiento, t.email, t.usuario, t.admin, ti.direccion AS direccion_tienda FROM trabajador t JOIN tienda ti ON t.id_tienda = ti.id_tienda ORDER BY t.id_trabajador ASC";

                        $result = mysqli_query($conexion, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['id_trabajador']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['apellidos']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['dni']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['fecha_nacimiento']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['usuario']) . "</td>";
                                echo "<td>" . ($row['admin'] == 1 ? 'Sí' : 'No') . "</td>";
                                echo "<td>" . htmlspecialchars($row['direccion_tienda']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9' class='text-center'>No hay trabajadores registrados.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
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
