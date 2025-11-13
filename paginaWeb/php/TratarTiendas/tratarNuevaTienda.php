<?php
session_start();
include '../../DataBase/conexiones.php';
if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
    session_destroy();
    header("Location: inicio_sesion.php");
    exit();
}

$direccion = $_POST["direccion"];

$check = mysqli_query($conexion, "SELECT * FROM tienda WHERE direccion = '$direccion'");

if (mysqli_num_rows($check) > 0) {
    echo "<script type='text/javascript'>
            alert('La tienda ya existe en la base de datos');
            window.location.href = 'index.php';
          </script>";
} else {
    $query = "INSERT INTO tienda (direccion) VALUES ('$direccion')";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar){
        echo "<script type='text/javascript'>
                alert('Tienda creada correctamente');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Error al crear la tienda: ".mysqli_error($conexion)."');
                window.location.href = 'index.php';
              </script>";
    }
}

mysqli_close($conexion);
?>
