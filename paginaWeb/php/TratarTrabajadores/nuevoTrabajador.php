<?php
session_start();
include '../../DataBase/conexiones.php';

// Solo los administradores pueden acceder
if (!isset($_SESSION['id_trabajador']) || $_SESSION['admin'] != 1) {
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
    <title>Registrar Trabajador</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../../imagenes/favicon.png">
</head>
<body>

    <!-- HEADER -->
    <header class="bg-light border-bottom py-3 d-flex justify-content-between align-items-center px-4">
        <img src="../../imagenes/logoGame.png" alt="GAME" class="img-fluid" style="max-width: 10%;">
        <h1 class="text-center m-0">GESTIÓN DE VIDEOJUEGOS</h1>
        <img src="../../imagenes/logoAltF4.png" alt="Alt+F4" class="img-fluid" style="max-width: 6%;">
    </header>

    <!-- BOTÓN VOLVER -->
    <div class="container my-4">
        <a href="../TratarTrabajadores/indexTrabajadores.php" class="btn btn-light shadow rounded d-inline-flex align-items-center hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
                <path d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/>
            </svg>
            Volver
        </a>
    </div>

    <!-- TÍTULO -->
    <h2 class="text-center my-4"><i>Registrar nuevo trabajador</i></h2>

    <!-- FORMULARIO -->
    <div class="container d-flex justify-content-center my-5">
        <div class="card p-4 shadow rounded w-100" style="max-width: 600px;">
            <form action="../TratarTrabajadores/procesarNuevoTrabajador.php" method="post" class="row g-3">

                <!-- Nombre -->
                <div class="col-12 col-md-6">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>

                <!-- Apellidos -->
                <div class="col-12 col-md-6">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                </div>

                <!-- DNI -->
                <div class="col-12 col-md-6">
                    <label for="dni" class="form-label">DNI:</label>
                    <input type="text" id="dni" name="dni" maxlength="9" class="form-control" required>
                </div>

                <!-- Fecha nacimiento -->
                <div class="col-12 col-md-6">
                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" required>
                </div>

                <!-- Email -->
                <div class="col-12">
                    <label for="email" class="form-label">Correo electrónico:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <!-- Usuario -->
                <div class="col-12 col-md-6">
                    <label for="usuario" class="form-label">Nombre de usuario:</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" required>
                </div>

                <!-- Contraseña -->
                <div class="col-12 col-md-6">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <!-- Repetir contraseña -->
                <div class="col-12 col-md-6">
                    <label for="password2" class="form-label">Repite la contraseña:</label>
                    <input type="password" id="password2" name="password2" class="form-control" required>
                </div>

                <!-- Admin -->
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="admin" name="admin" value="1">
                        <label class="form-check-label" for="admin">¿Es administrador?</label>
                    </div>
                </div>

                <!-- Tienda -->
                <div class="col-12">
                    <label for="id_tienda" class="form-label">Selecciona una tienda:</label>
                    <select id="id_tienda" name="id_tienda" class="form-select" required>
                        <option value=""></option>
                        <?php 
                        $query = "SELECT id_tienda, direccion FROM tienda";
                        $result = mysqli_query($conexion, $query);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id_tienda'] . '">' . htmlspecialchars($row['direccion']) . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <!-- Botón -->
                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary px-5">Registrar</button>
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
