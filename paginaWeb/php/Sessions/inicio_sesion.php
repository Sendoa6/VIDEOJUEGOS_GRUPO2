<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/muskizlogo.png" type="image/x-icon">
    <title>Inicio sesion - Biblioteca</title>
    <link rel="stylesheet" href="../estilos/estilosInicioSesion.css">
</head>
<body>
    <div class="caja"> <!-- Para reservar el espacio para el formulario -->
        <div class="caja-form"> <!-- Para la estructura de la caja -->
            <h2>Inicio de Sesión</h2>
            <form action="login_usuario.php" method="post"> 

                <label for="username_login">Nombre de Usuario:</label>
                <input type="text" id="username_login" name="username_login" required>  

                <label for="password_login">Contraseña:</label>
                <input type="password" id="password_login" name="password_login" required>  ç
                <button  type="submit">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>