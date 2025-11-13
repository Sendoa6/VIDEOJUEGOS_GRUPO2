<?php

    session_start();
    include '../../DataBase/conexiones.php';
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
        session_destroy();
        header("Location: inicio_sesion.php");
        exit();
    }

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $password = hash('sha512', $password);
    $password2 = hash('sha512', $password2);
    $admin = isset($_POST['admin']) ? 1 : 0;
    $id_tienda = $_POST['id_tienda'];

    if ($password2 != $password){
        echo "<script type='text/javascript'>alert('Error. Las contraseñas no coinciden.');</script>";
        header("Refresh: 0.1; url=nuevoTrabajador.php");
        exit;
    }
    if (strpos($email, '@') == false && strpos($email, '.') == false) {
        echo "<script type='text/javascript'>alert('Error. Correo electrónico inválido.');</script>";
        header("Refresh: 0.1; url=nuevoTrabajador.php");
        exit;
    }
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM trabajador WHERE usuario='$usuario' ");
    if (mysqli_num_rows($verificar_usuario) > 0){
        echo "<script type='text/javascript'>alert('Este usuario ya está en uso, intenta con uno diferente');</script>";
        header("Refresh: 0.1; url=nuevoTrabajador.php");
        exit();
    }    
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM trabajador WHERE email='$email' ");
    if (mysqli_num_rows($verificar_correo) > 0){
        echo "<script type='text/javascript'>alert('Este correo ya está en uso, intenta con uno diferente');</script>";
        header("Refresh: 0.1; url=nuevoTrabajador.php");
        exit();
    } 
    
    
    $query = "INSERT INTO trabajador (nombre, apellidos, dni, fecha_nacimiento, email, usuario,contrasena_hash,admin,id_tienda) VALUES ('$nombre', '$apellido', '$dni', '$fecha_nacimiento', '$email', '$usuario', '$password2','$admin','$id_tienda')";
    
    $ejecutar = mysqli_query($conexion, $query);

    
    if ($ejecutar){
        echo "<script type='text/javascript'>alert('Usuario creado correctamente');</script>";
        header("Refresh: 0.1; url=index.php");
    }

    mysqli_close($conexion);

?>