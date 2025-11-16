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
    <title>Nuevo Trabajador - Procesar</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estilosNuevoJuego.css">
    <link rel="icon" href="../../imagenes/favicon.png">
</head>
<body>

<!-- HEADER -->
<header class="bg-light border-bottom py-3 d-flex align-items-center justify-content-center px-4 gap-3">
    <a href="../index.php"><img src="../../imagenes/logoGame.png" class="img-fluid header-img"></a>

    <h1 class="text-center m-0 flex-grow-1">GESTIÓN DE TRABAJADORES</h1>

    <a href="../Sessions/cerrar_sesion.php">
        <img src="../../imagenes/iconoCerrarSession.png" class="header-img-small">
    </a>
</header>

<!-- BOTÓN VOLVER -->
<div class="container my-4">
    <a href="nuevoTrabajador.php" class="btn hover-scale btn-light shadow rounded d-inline-flex align-items-center hover-scale">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
            <path d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/>
        </svg>
        Volver
    </a>
</div>

<!-- CONTENIDO PRINCIPAL -->
<main class="container p-5 my-5 text-center">
<?php

// ------------------
// TU CÓDIGO ORIGINAL
// ------------------

$nombre = $_POST["nombre"];
$apellido = $_POST["apellidos"];
$dni = strtoupper(trim($_POST['dni']));
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$email = $_POST["email"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$password = hash('sha256', $password);
$password2 = hash('sha256', $password2);
$admin = isset($_POST['admin']) ? 1 : 0;
$id_tienda = $_POST['id_tienda'];

// Validaciones
if ($password2 != $password){
    echo "<div class='alert alert-warning shadow rounded'>Error. Las contraseñas no coinciden.</div>";
    exit();
}

if (strpos($email, '@') == false && strpos($email, '.') == false) {
    echo "<div class='alert alert-warning shadow rounded'>Error. Correo electrónico inválido.</div>";
    exit();
}

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM trabajador WHERE usuario='$usuario' ");
if (mysqli_num_rows($verificar_usuario) > 0){
    echo "<div class='alert alert-warning shadow rounded'>Este usuario ya está en uso, intenta con uno diferente.</div>";
    exit();
}

$verificar_correo = mysqli_query($conexion, "SELECT * FROM trabajador WHERE email='$email' ");
if (mysqli_num_rows($verificar_correo) > 0){
    echo "<div class='alert alert-warning shadow rounded'>Este correo ya está en uso, intenta con uno diferente.</div>";
    exit();
}

// Validación DNI
$numero = substr($dni, 0, -1);
$letra = substr($dni, -1);
$letras_validas = "TRWAGMYFPDXBNJZSQVHLCKE";
$letra_correcta = $letras_validas[$numero % 23];

if (!is_numeric($numero) || strlen($numero) != 8) {
    echo "<div class='alert alert-warning shadow rounded'>Error. El DNI debe tener 8 números.</div>";
    exit();
}

if ($letra !== $letra_correcta) {
    echo "<div class='alert alert-warning shadow rounded'>Error. Letra del DNI incorrecta.</div>";
    exit();
}

$query = "INSERT INTO trabajador (nombre, apellidos, dni, fecha_nacimiento, email, usuario,contrasena_hash,admin,id_tienda) 
VALUES ('$nombre', '$apellido', '$dni', '$fecha_nacimiento', '$email', '$usuario', '$password2','$admin','$id_tienda')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar){
    $insertTrabajadorHistorial = mysqli_query(
        $conexion,
        "INSERT INTO historial (concepto, fecha, id_trabajador) VALUES ('Insert de el trabajador con nombre $nombre apellidos $apellido usuario $usuario', NOW(), '{$_SESSION['id_trabajador']}')"
    );

    echo "<div class='alert alert-success shadow rounded'>
            Usuario creado correctamente.<br><br>
            <b>Nombre:</b> $nombre <br>
            <b>Apellidos:</b> $apellido <br>
            <b>Usuario:</b> $usuario
          </div>";

} else {
    echo "<div class='alert alert-danger shadow rounded'>
            Error al insertar usuario: " . mysqli_error($conexion) . "
          </div>";
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
