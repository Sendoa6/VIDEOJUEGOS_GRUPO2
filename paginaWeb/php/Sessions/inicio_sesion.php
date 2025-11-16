<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/muskizlogo.png" type="image/x-icon">
    <title>Inicio sesión - Biblioteca</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estilosInicioSesion.css">
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="card p-4" style="max-width: 400px; width: 100%;">
            <h2 class="text-center mb-4">Inicio de Sesión</h2>

            <form action="login_usuario.php" method="post">
                <div class="mb-3">
                    <label for="username_login" class="form-label">Nombre de Usuario:</label>
                    <input type="text" id="username_login" name="username_login" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_login" class="form-label">Contraseña:</label>
                    <input type="password" id="password_login" name="password_login" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
