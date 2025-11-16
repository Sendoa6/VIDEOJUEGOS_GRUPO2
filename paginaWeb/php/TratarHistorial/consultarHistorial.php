<?php
session_start();
include '../../DataBase/conexiones.php';

// Solo los administradores pueden acceder
if (!isset($_SESSION['id_trabajador']) || $_SESSION['admin'] != 1) {
    echo "
    <script>
        alert('Acceso restringido. Solo los administradores pueden entrar en esta sección.\\n\\nSi necesitas permisos, por favor habla con el encargado o un administrador autorizado.');
        window.location.href = '/paginaWeb/php/index.php';
    </script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Historial</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estilosConsultarVideojuegos.css">
    <link rel="icon" href="../../imagenes/favicon.png">
</head>
<body>

    <!-- HEADER -->
    <header class="bg-light border-bottom py-3 d-flex align-items-center justify-content-center px-4 gap-3">
        <a href="../index.php"><img src="../../imagenes/logoGame.png" alt="GAME" class="img-fluid header-img"></a>

        <h1 class="text-center m-0 flex-grow-1">GESTIÓN DE HISTORIAL</h1>

        <a href="../Sessions/cerrar_sesion.php">
            <img src="../../imagenes/iconoCerrarSession.png" alt="Cerrar sesión" class="header-img-small">
        </a>
    </header>

    <!-- BOTÓN VOLVER -->
    <div class="container my-4">
        <a href="indexHistorial.php" class="btn btn-light shadow rounded d-inline-flex align-items-center hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
                <path d="m7.825 12 3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0 3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/>
            </svg>
            Volver
        </a>
    </div>

    <!-- TÍTULO -->
    <h2 class="text-center my-4"><i>Historial de acciones:</i></h2>

    <!-- TABLA -->
    <div class="container my-5">
        <div class="table-responsive shadow rounded">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Concepto</th>
                        <th>Fecha</th>
                        <th>ID Trabajador</th>
                        <th>Trabajador</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../../DataBase/conexiones.php';

                        // JOIN para obtener el nombre del trabajador
                        $query = "
                            SELECT h.id_historial, h.concepto, h.fecha, h.id_trabajador,
                                   t.nombre, t.apellidos
                            FROM historial h
                            LEFT JOIN trabajador t ON h.id_trabajador = t.id_trabajador
                            ORDER BY h.id_historial DESC
                        ";

                        $result = mysqli_query($conexion, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['id_historial']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['concepto']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['fecha']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['id_trabajador']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['nombre'] . ' ' . $row['apellidos']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No hay registros en el historial.</td></tr>";
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
                <img src="../../imagenes/creativeCommons.png" alt="Creative Commons" class="img-fluid" style="width: 40%;">
            </div>

        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
