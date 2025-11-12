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
    <link rel="icon" href="media/muskizlogo.png" type="image/x-icon">
    <title>Registro de Trabajador</title>
    <link rel="stylesheet" href="/paginaWeb/estilos/estilosRegistrarUsuarios.css">
</head>
<body>
    <div class="caja">
        <div class="caja-form">
            <img src="media/muskizlogo.png" alt="BibliotecaMuskiz">
            <h2>Registro de Trabajador</h2>

            <form action="../Sessions/procesar_registrar_usuarios.php" method="post">

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required>

                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" maxlength="9" required>

                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="usuario">Nombre de Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <label for="password2">Repite la contraseña:</label>
                <input type="password" id="password2" name="password2" required>

                <label for="admin">¿Es administrador?</label>
                <input type="checkbox" id="admin" name="admin" value="1">

                <label for="id_tienda">Selecciona una tienda (dirección):</label>
                    <select id="id_tienda" name="id_tienda" required>
                        <?php 
                        include '../../DataBase/conexiones.php';
                            $query = "SELECT id_tienda,direccion FROM tienda";
                            $result = mysqli_query($conexion, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                    
                        ?>
                            <option value="<?= $row['id_tienda']; ?>"><?= $row['direccion']; ?></option>
                        <?php }} ?>
                    </select>

                

                <button type="submit">Registrar</button>

                <p>Volver al <a href="Formulario1.php">inicio de sesión</a></p>
                <p>Volver a la <a href="index.php">página principal</a></p>

            </form>
        </div>
    </div>
</body>
</html>
