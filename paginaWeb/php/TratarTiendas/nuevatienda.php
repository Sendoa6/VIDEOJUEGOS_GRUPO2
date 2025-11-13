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
    <title>Registro de Trabajador</title>
    <link rel="stylesheet" href="/paginaWeb/estilos/estilosRegistrarUsuarios.css">
</head>
<body>
    <div class="caja">
        <div class="caja-form">
            <h2>Registro de Trabajador</h2>

            <form action="tratarNuevaTienda.php" method="post">

                <label for="nombre">Direccion:</label>
                <input type="text" id="direccion" name="direccion" required>

                <button type="submit">Registrar</button>

                <p>Volver al <a href="Formulario1.php">inicio de sesión</a></p>
                <p>Volver a la <a href="index.php">página principal</a></p>

            </form>
        </div>
    </div>
</body>
</html>
