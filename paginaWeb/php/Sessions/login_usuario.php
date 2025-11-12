<?php
session_start();

include '../../DataBase/conexiones.php';

// Recibir los datos del formulario y limpiarlos
$username_login =  $_POST['username_login'];
$password_login =  $_POST['password_login'];
$password_login = hash('sha512', $password_login);


$query = "SELECT * FROM trabajador WHERE usuario = '$username_login' AND contrasena_hash = '$password_login' LIMIT 1";

$result = mysqli_query($conexion, $query);

// Verificar si el usuario existe
if ($result && mysqli_num_rows($result) > 0) {
    $datos_usuario = mysqli_fetch_assoc($result);
    
    // Guardar datos del usuario en la sesión
    $_SESSION['id_trabajador'] = $datos_usuario['id_trabajador'];
    $_SESSION['usuario'] = $datos_usuario['usuario'];
    $_SESSION['admin'] = $datos_usuario['admin'];
    $_SESSION['id_tienda'] = $datos_usuario['id_tienda'];

    // Redirigir a la página de bienvenida
    header("location: index.html");
    exit();
} else {
    // Si el usuario no existe o la contraseña es incorrecta
    echo "<script type='text/javascript'>
        alert('Usuario o contraseña incorrectos. Intenta de nuevo.');
        window.location.href = 'inicio_sesion.php';
    </script>";
    exit();
}
?>
